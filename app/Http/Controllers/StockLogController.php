<?php

namespace App\Http\Controllers;

use App\Models\StockLog;
use Illuminate\Http\Request;

class StockLogController extends Controller
{
    public function index()
    {
        $stockLogs = StockLog::with('product')->latest()->get();
        return view('history', compact('stockLogs'));
    }
}
