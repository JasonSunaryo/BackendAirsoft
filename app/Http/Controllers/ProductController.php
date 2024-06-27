<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockLog;
use App\Models\Comment;

class ProductController extends Controller
{
    // Fungsi untuk menampilkan daftar produk
    public function index()
    {
        // Mengambil semua produk dari database, diurutkan berdasarkan tanggal pembuatan terbaru
        $products = Product::orderBy('created_at', 'DESC')->get();
        // Mengembalikan view 'product.index' dengan data produk
        return view('product.index', compact('products'));
    }

    // Fungsi untuk menampilkan formulir pembuatan produk baru
    public function create()
    {
        // Mengembalikan view 'product.create'
        return view('product.create');
    }

    // Fungsi untuk menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'stock' => 'required|integer',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        // Jika ada file gambar yang diupload, simpan ke penyimpanan dan tambahkan path ke data produk
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/products');
            $data['image'] = $path;
        }

        // Buat produk baru dengan data yang telah divalidasi
        Product::create($data);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Fungsi untuk menampilkan detail produk
    public function show(string $id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan akan menghasilkan 404
        $product = Product::findOrFail($id);
        // Mengembalikan view 'product.show' dengan data produk
        return view('product.show', compact('product'));
    }

    // Fungsi untuk menampilkan formulir edit produk
    public function edit(string $id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan akan menghasilkan 404
        $product = Product::findOrFail($id);
        // Mengembalikan view 'product.edit' dengan data produk
        return view('product.edit', compact('product'));
    }

    // Fungsi untuk memperbarui produk
    public function update(Request $request, string $id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan akan menghasilkan 404
        $product = Product::findOrFail($id);

        // Validasi data yang diterima dari request
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'stock' => 'required|integer',
            'type' => 'required',
            'description' => 'required',
            'image' => 'sometimes|image|max:2048',
        ]);

        // Jika ada file gambar yang diupload, simpan ke penyimpanan dan tambahkan path ke data produk
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/products');
            $data['image'] = $path;
        }

        // Perbarui produk dengan data yang telah divalidasi
        $product->update($data);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Fungsi untuk menghapus produk
    public function destroy(string $id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan akan menghasilkan 404
        $product = Product::findOrFail($id);
        // Hapus produk
        $product->delete();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }

    // Fungsi untuk menampilkan menu utama dengan daftar produk dan komentar
    public function menu()
    {
        // Mengambil semua produk dari database, diurutkan berdasarkan tanggal pembuatan terbaru
        $products = Product::orderBy('created_at', 'DESC')->get();
        // Mengambil semua komentar beserta data pengguna yang terkait
        $comments = Comment::with('user')->get();
        // Mengembalikan view 'index' dengan data produk dan komentar
        return view('index', compact('products', 'comments'));
    }

    // Fungsi untuk menambah stok produk
    public function increaseStock($id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan akan menghasilkan 404
        $product = Product::findOrFail($id);
        if ($product) {
            // Tambah stok produk
            $product->stock += 1;
            $product->save();

            // Catat perubahan stok di log stok
            StockLog::create([
                'product_id' => $product->id,
                'change' => 1,
            ]);

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Stok berhasil ditambah.');
        }
        // Jika produk tidak ditemukan, redirect dengan pesan error
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    // Fungsi untuk mengurangi stok produk
    public function decreaseStock($id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan akan menghasilkan 404
        $product = Product::findOrFail($id);
        if ($product) {
            // Kurangi stok produk
            $product->stock -= 1;
            $product->save();

            // Hitung profit dari penjualan
            $profit = $product->price - $product->cost_price;

            // Catat perubahan stok di log stok
            StockLog::create([
                'product_id' => $product->id,
                'change' => -1,
                'profit' => $profit,
            ]);

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Stok berhasil dikurangi.');
        }
        // Jika produk tidak ditemukan, redirect dengan pesan error
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    // Fungsi untuk menghapus semua log stok
    public function clearStockLogs()
    {
        // Hapus semua log stok
        StockLog::truncate();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Riwayat stok berhasil dihapus');
    }
}
