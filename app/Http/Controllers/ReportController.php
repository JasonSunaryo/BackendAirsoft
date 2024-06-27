<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\StockLog;
use App\Models\Product;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->get();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        // Menggunakan Carbon untuk menyesuaikan waktu
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();
    
        // Ambil semua StockLog dalam rentang waktu yang sudah disesuaikan
        $stockLogs = StockLog::whereBetween('created_at', [$startDate, $endDate])
                             ->where('change', '<', 0) // hanya transaksi keluar (stok berkurang)
                             ->with('product') // load data produk terkait
                             ->get();
        // Hitung total profit dari StockLog
        $totalProfit = 0;
        foreach ($stockLogs as $log) {
            // Pastikan product tidak null sebelum mengambil price dan cost_price
            if ($log->product) {
                $productPrice = $log->product->price ?? 0;
                $costPrice = $log->product->cost_price ?? 0;
                $totalProfit += abs($log->change) * ($productPrice - $costPrice);
            }
        }
    
        // Simpan data laporan baru
        $report = Report::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_profit' => $totalProfit,
        ]);
    
        // Redirect ke halaman daftar laporan dengan pesan sukses
        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat');
    }
    
    

    public function show($id)
    {
        try {
            $report = Report::findOrFail($id);
            $endDate = Carbon::parse($report->end_date)->endOfDay();

            $stockLogs = StockLog::where('created_at', '>=', $report->start_date)
                                 ->where('created_at', '<=', $endDate)
                                 ->where('change', '<', 0)
                                 ->with('product')
                                 ->get();

            $totalItems = $stockLogs->where('change', '<', 0)->sum(function ($log) {
                return abs($log->change);
            });

            return view('reports.show', compact('report', 'stockLogs', 'totalItems'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $report = Report::findOrFail($id);
            $stockLogs = StockLog::whereBetween('created_at', [$report->start_date, $report->end_date])
                                 ->where('change', '<', 0)
                                 ->with('product')
                                 ->get();

            return view('reports.edit', compact('report', 'stockLogs'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        try {
            // Ambil laporan yang akan diupdate
            $report = Report::findOrFail($id);
    
            // Menggunakan Carbon untuk menyesuaikan waktu
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
    
            // Ambil semua StockLog dalam rentang waktu yang sudah disesuaikan
            $stockLogs = StockLog::whereBetween('created_at', [$startDate, $endDate])
                                 ->where('change', '<', 0)
                                 ->with('product')
                                 ->get();
    
            // Hitung total profit dari StockLog yang didapat
            $totalProfit = 0;
            foreach ($stockLogs as $log) {
                if ($log->product) {
                    $productPrice = $log->product->price ?? 0;
                    $costPrice = $log->product->cost_price ?? 0;
                    $totalProfit += abs($log->change) * ($productPrice - $costPrice);
                }
            }
    
            // Update data laporan
            $report->update([
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_profit' => $totalProfit,
            ]);
    
            // Redirect ke halaman daftar laporan dengan pesan sukses
            return redirect()->route('reports.index')->with('success', 'Laporan berhasil diupdate');
    
        } catch (\Exception $e) {
            // Tangani jika terjadi exception
            return redirect()->back()->with('error', 'Gagal mengupdate laporan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus');
    }

    public function detail($id)
    {
        $report = Report::findOrFail($id);
        $stockLogs = StockLog::whereBetween('created_at', [$report->start_date, $report->end_date])
                             ->where('change', '<', 0)
                             ->with('product')
                             ->get();

        $totalItems = $stockLogs->where('change', '<', 0)->sum(function ($log) {
            return abs($log->change);
        });

        return view('reports.detail', compact('report', 'stockLogs', 'totalItems'));
    }
}