<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;
use Illuminate\Http\Request;
use App\Events\NewEvent;
use Illuminate\Support\Str;


class QueueController extends Controller
{
    public function queues()
    {
        $nowServing = Queue::where('served', false)->where('called_by', Auth::id())->orderBy('updated_at')->get()->last();
        $queues = Queue::where('called_by', null)->where('dept', Auth::user()->dept)->orderBy('created_at')->get();
        return view('queues', compact('queues', 'nowServing'));
    }
    public function live()
    {
        $registrars = User::all();
        foreach ($registrars as $registrar) {
            $latestQueue = Queue::where('served', false)
                ->where('called_by', $registrar->id)
                ->orderBy('updated_at', 'desc') // Sort by updated_at in descending order
                ->first(); // Fetch the latest queue

            $registrar->currentQueue = $latestQueue;
        }
        // Sort the $registrars collection by currentQueue's updated_at timestamp
        $registrars = $registrars->sortByDesc(function ($registrar) {
            return optional($registrar->currentQueue)->updated_at;
        });
        $queues = Queue::where('called_by', null)->orderBy('created_at')->get();
        return view('live', compact('queues', 'registrars'));
    }
    public function served(Queue $queue)
    {
        $queue->update(['served' => true]);
        return redirect()->route('queues');
    }
    public function callQueue()
    {
        $nextQueue = Queue::where('called_by', null)->where('dept', Auth::user()->dept)->orderBy('created_at')->first();
        if ($nextQueue) {
            $nextQueue->update(['called_by' => Auth::id()]);
            event(new NewEvent($nextQueue->name.' Queue '.$nextQueue->number. 'Please Proceed to '. Auth::user()->name));
        }

        return redirect()->route('queues');
    }
    public function queueForm()
    {
        return view('queueForm');
    }
    public function getQueue(Request $request)
    {
        $tickerNumber = Str::random(3);
        $dept = $request->dept;
        $queueNumber =  $dept[0].'-'.$tickerNumber;
        Queue::create([
            'number' => $queueNumber,
            'called_by' => null,
            'name' => $request->name,
            'dept' => $request->dept
        ]);
        event(new NewEvent('Queue Added'));
        return view('print', [
            'name' => $request->name,
            'queueNumber' => $queueNumber
        ]);
    }
}
