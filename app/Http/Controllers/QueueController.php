<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;
use Illuminate\Http\Request;
use App\Events\NewEvent;

class QueueController extends Controller
{
    public function queues()
    {
        $nowServing = Queue::where('served', false)->where('called_by', Auth::id())->orderBy('updated_at')->get()->last();
        $queues = Queue::where('called_by', null)->orderBy('created_at')->get();
        return view('queues', compact('queues', 'nowServing'));
    }
    public function live()
    {
        $registrars = User::all();
        foreach ($registrars as $registrar) {
            $registrar->currentQueue = Queue::where('served', false)
                ->where('called_by', $registrar->id)
                ->orderBy('updated_at')
                ->get()
                ->last();
        }
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
        $nextQueue = Queue::where('called_by', null)->orderBy('created_at')->first();
        if ($nextQueue) {
            $nextQueue->update(['called_by' => Auth::id()]);
        }
        event(new NewEvent('Queue '.$nextQueue->number. 'Please Proceed to'. Auth::user()->name));
        return redirect()->route('queues');
    }
    public function queueForm()
    {
        return view('queueForm');
    }
    public function getQueue()
    {
        $lastUnservedQueue = Queue::where('served', false)->max('number');
        $queueNumber = $lastUnservedQueue !== null ? $lastUnservedQueue + 1 : 1;
        Queue::create(['number' => $queueNumber, 'called_by' => null,]);
        event(new NewEvent('Queue Added'));
        return redirect()->route('queueForm');
    }
}
