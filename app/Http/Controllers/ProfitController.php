<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockLog;
use Carbon\Carbon;

class ProfitController extends Controller
{
    public function index(Request $request)
    {
        // Ambil rentang tanggal dari request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Jika rentang tanggal tidak ada, gunakan rentang default
        if (!$startDate || !$endDate) {
            $startDate = now()->subMonth()->toDateString();
            $endDate = now()->toDateString();
        }

        // Ambil semua transaksi dari stock_logs sesuai rentang tanggal
        $transactions = StockLog::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();

        // Inisialisasi array untuk menyimpan data profit bersih dan barang terjual
        $profitData = [];
        $soldProducts = [];

        // Buat array untuk semua tanggal dalam rentang
        $allDates = [];
        $currentDate = Carbon::parse($startDate);
        $endDateCarbon = Carbon::parse($endDate);
        while ($currentDate->lte($endDateCarbon)) {
            $allDates[] = $currentDate->format('Y-m-d');
            $currentDate->addDay();
        }

        // Proses setiap transaksi
        foreach ($transactions as $transaction) {
            // Validasi data transaksi
            if (!$transaction->created_at || !$transaction->product_id) {
                continue;
            }

            $product = Product::withTrashed()->find($transaction->product_id);
            if ($product) {
                $productType = $product->type ?? 'Unknown';

                // Inisialisasi tipe produk jika belum ada
                if (!isset($profitData[$productType])) {
                    $profitData[$productType] = [];
                    $soldProducts[$productType] = [];
                }

                // Ambil tanggal transaksi
                $date = Carbon::parse($transaction->created_at)->format('Y-m-d');

                // Inisialisasi tanggal jika belum ada
                if (!isset($profitData[$productType][$date])) {
                    $profitData[$productType][$date] = 0;
                    $soldProducts[$productType][$date] = 0;
                }

                // Tambahkan profit dan jumlah barang terjual
                $profitData[$productType][$date] += $transaction->profit ?? 0;
                $soldProducts[$productType][$date] += $transaction->change ?? 0;
            }
        }

        // Pastikan semua tanggal memiliki nilai default 0 untuk semua tipe produk
        foreach ($allDates as $date) {
            foreach ($profitData as $type => $profits) {
                if (!isset($profitData[$type][$date])) {
                    $profitData[$type][$date] = 0;
                }
            }
            foreach ($soldProducts as $type => $sold) {
                if (!isset($soldProducts[$type][$date])) {
                    $soldProducts[$type][$date] = 0;
                }
            }
        }

        // Kembalikan view 'profit' dengan data
        return view('profit', compact('profitData', 'soldProducts', 'startDate', 'endDate', 'allDates'));
    }
}
