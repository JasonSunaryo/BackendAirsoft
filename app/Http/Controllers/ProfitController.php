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

    // Inisialisasi array untuk menyimpan data profit bersih
    $profitData = [];

    // Inisialisasi array untuk menyimpan data barang terjual (stock keluar)
    $soldProducts = [];

    foreach ($transactions as $transaction) {
        // Ambil produk berdasarkan product_id dari stock_log
        $product = Product::find($transaction->product_id);

        if ($product) {
            // Ambil tanggal transaksi dengan format Y-m-d
            $date = Carbon::parse($transaction->created_at)->format('Y-m-d');

            // Jika transaksi adalah "out", tambahkan ke data barang terjual (stock keluar)
            if ($transaction->change < 0) {
                // Simpan jumlah barang terjual (stock keluar) berdasarkan change
                if (!isset($soldProducts[$product->type][$date])) {
                    $soldProducts[$product->type][$date] = 0;
                }
                $soldProducts[$product->type][$date] += abs($transaction->change);
            }

            // Hitung profit bersih hanya jika transaksi adalah "out"
            if ($transaction->change < 0) {
                // Hitung profit bersih
                $profit = $product->price - $product->cost_price;

                // Simpan profit bersih berdasarkan tipe barang
                if (!isset($profitData[$product->type])) {
                    $profitData[$product->type] = [];
                }

                // Inisialisasi profit untuk tanggal tersebut jika belum ada
                if (!isset($profitData[$product->type][$date])) {
                    $profitData[$product->type][$date] = 0;
                }

                // Tambahkan profit ke dalam data profit bersih
                $profitData[$product->type][$date] += $profit;
            }
        }
    }

    // Kembalikan view 'profits.index' dengan data profitData, soldProducts, dan rentang tanggal
    return view('profit', compact('profitData', 'soldProducts', 'startDate', 'endDate'));
}


}
