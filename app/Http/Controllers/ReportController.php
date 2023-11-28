<?php

namespace App\Http\Controllers;
use App\Models\Queue;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reports()
    {
        $qToday = Queue::whereDate('created_at', date('Y-m-d'))->count();
        $qFinished = Queue::whereDate('created_at', date('Y-m-d'))->where('served', true)->count();
        $qPending = Queue::whereDate('created_at', date('Y-m-d'))->where('served', false)->count();

        $RqToday = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'Registrar')->count();
        $RqFinished = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'Registrar')->where('served', true)->count();
        $RqPending = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'Registrar')->where('served', false)->count();

        $CqToday = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'Cashier')->count();
        $CqFinished = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'Cashier')->where('served', true)->count();
        $CqPending = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'Cashier')->where('served', false)->count();

        $SqToday = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'SAO')->count();
        $SqFinished = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'SAO')->where('served', true)->count();
        $SqPending = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'SAO')->where('served', false)->count();

        $AqToday = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'ACAD')->count();
        $AqFinished = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'ACAD')->where('served', true)->count();
        $AqPending = Queue::whereDate('created_at', date('Y-m-d'))->where('dept', 'ACAD')->where('served', false)->count();

        return view('reports',
        compact(
            'qToday', 'qFinished', 'qPending',
            'RqToday', 'RqFinished', 'RqPending',
            'CqToday', 'CqFinished', 'CqPending',
            'SqToday', 'SqFinished', 'SqPending',
            'AqToday', 'AqFinished', 'AqPending'
            )
        );
    }
}
