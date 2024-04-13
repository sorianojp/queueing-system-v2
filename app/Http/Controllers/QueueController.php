<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;
use Illuminate\Http\Request;
use App\Events\NewEvent;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Department;

class QueueController extends Controller
{
    public function queues()
    {
        $today = Carbon::now('Asia/Manila');;
        $nowServing = Queue::where('served', false)->where('called_by', Auth::id())->orderBy('updated_at')->get()->last();
        $queues = Queue::whereDate('created_at', $today)->where('called_by', null)->where('dept', Auth::user()->dept)->orderBy('created_at')->get();
        return view('queues', compact('queues', 'nowServing'));
    }
    public function live()
    {
        $today = Carbon::now('Asia/Manila');;
        $users = User::all();
        foreach ($users as $user) {
            $latestQueue = Queue::where('served', false)
                ->where('called_by', $user->id)
                ->orderBy('updated_at', 'desc') // Sort by updated_at in descending order
                ->first(); // Fetch the latest queue

            $user->currentQueue = $latestQueue;
        }
        // Sort the $users collection by currentQueue's updated_at timestamp
        $users = $users->sortByDesc(function ($user) {
            return optional($user->currentQueue)->updated_at;
        });
        $queues = Queue::whereDate('created_at', $today)->where('called_by', null)->orderBy('created_at')->get();
        return view('live', compact('queues', 'users'));
    }
    public function served(Queue $queue)
    {
        $queue->update(['served' => true]);
        return redirect()->route('queues');
    }
    public function callQueue()
    {
        $today = Carbon::now('Asia/Manila');;
        $nextQueue = Queue::whereDate('created_at', $today)->where('called_by', null)->where('dept', Auth::user()->dept)->orderBy('created_at')->first();
        if ($nextQueue) {
            $nextQueue->update(['called_by' => Auth::id()]);
            event(new NewEvent($nextQueue->name.'-'.$nextQueue->number. 'Please Proceed to '. Auth::user()->name));
        }
        return redirect()->route('queues');
    }
    public function notify()
    {
        $nowServing = Queue::where('served', false)->where('called_by', Auth::id())->orderBy('updated_at')->get()->last();
        event(new NewEvent($nowServing->name.'-'.$nowServing->number. 'Please Proceed to '. Auth::user()->name));
        return redirect()->route('queues');
    }
    public function queueForm()
    {
        $departments = Department::all();
        return view('queueForm', compact('departments'));
    }
    public function getQueue(Request $request)
    {
        $today = Carbon::now('Asia/Manila');
        $dept = $request->dept;
       // Check if there are any unserved queues
       $lastUnservedQueue = Queue::whereDate('created_at', $today)->where('served', false)->where('number', 'like', $dept[0] . '%')->max('number');
       if ($lastUnservedQueue !== null) {
           // Extract the numeric part of the last unserved queue number and increment it
           $lastNumber = (int)substr($lastUnservedQueue, 1); // Extract the numeric part after the department prefix
           $nextNumber = $lastNumber + 1;
       } else {
           // If all queues have been served, reset the queue number to '00'
           $nextNumber = 1;
       }
       // Generate the new queue number by combining the department and the incremented number
       $queueNumber = $dept[0] . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);



        Queue::create([
            'number' => $queueNumber,
            'called_by' => null,
            'name' => $request->name,
            'dept' => $request->dept
        ]);
        event(new NewEvent('Queue Added'));
        $data = [
            'name' => $request->name,
            'number' => $queueNumber,
            'created_at' => $today,
        ];
        return view('print')->with('data', $data);
    }

    public function reset()
    {
        // Get yesterday's date
        $yesterday = Carbon::yesterday();
        // Fetch unserved queues created on the previous day
        $unservedQueuesYesterday = Queue::where('served', false)
            ->whereDate('created_at', $yesterday)
            ->orderBy('created_at')
            ->get();
        return view('reset', compact('unservedQueuesYesterday'));
    }
    public function destroyunserve(Queue $queue)
    {
        $queue->delete();
        return redirect()->route('reset');
    }
}
