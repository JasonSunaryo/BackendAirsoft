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

    public function updateDate(Request $request, $id)
{
    $request->validate([
        'date' => 'required|date',
    ]);

    $log = StockLog::findOrFail($id);
    $log->created_at = $request->date;
    $log->save();

    return redirect()->route('stocklogs.index')->with('success', 'Date updated successfully.');
}

}
