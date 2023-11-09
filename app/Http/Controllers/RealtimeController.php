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
            $registrar->currentQueue = Queue::where('served', false)
                ->where('called_by', $registrar->id)
                ->orderBy('updated_at')
                ->get()
                ->last();
        }
        return view('partials.liveservings', compact('registrars'))->render();
    }
}
