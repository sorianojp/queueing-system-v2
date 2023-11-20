<?php

namespace App\Http\Controllers;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    public function livequeues()
    {
        $queues = Queue::where('called_by', null)->orderBy('created_at')->get();
        return view('partials.livequeues', compact('queues'))->render();
    }
    public function liveservings()
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
        return view('partials.liveservings', compact('registrars'))->render();
    }
}
