<?php

namespace App\Http\Controllers;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RealtimeController extends Controller
{
    public function deptqueues()
    {
        $today = Carbon::now('Asia/Manila');
        $queues = Queue::whereDate('created_at', $today)->where('called_by', null)->where('dept', Auth::user()->dept)->orderBy('created_at')->get();
        return view('partials.deptqueues', compact('queues'))->render();
    }
    public function livequeues()
    {
        $today = Carbon::now('Asia/Manila');
        $queues = Queue::whereDate('created_at', $today)->where('called_by', null)->orderBy('created_at')->get();
        return view('partials.livequeues', compact('queues'))->render();
    }
    public function liveservings()
    {
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
        return view('partials.liveservings', compact('users'))->render();
    }
}
