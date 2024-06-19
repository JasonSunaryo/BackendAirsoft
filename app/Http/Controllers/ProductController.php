<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockLog;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'stock' => 'required|integer',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048', // Validasi untuk gambar
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/products');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product added successfully');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'stock' => 'required|integer',
            'type' => 'required',
            'description' => 'required',
            'image' => 'sometimes|image|max:2048', // Validasi untuk gambar
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/products');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

    public function menu()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('index', compact('product'));
    }

    public function increaseStock($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->stock += 1;
            $product->save();
    
            StockLog::create([
                'product_id' => $product->id,
                'change' => 1, // 1 karena stok ditambah 1
            ]);
    
            return redirect()->back()->with('success', 'Stock increased successfully.');
        }
        return redirect()->back()->with('error', 'Product not found.');
    }
    
    public function decreaseStock($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->stock -= 1;
            $product->save();
    
            // Hitung profit dari penjualan
            $profit = $product->price - $product->cost_price;
    
            StockLog::create([
                'product_id' => $product->id,
                'change' => -1, // Minus karena mengurangi stok
                'profit' => $profit, // Simpan profit dari penjualan
            ]);
    
            return redirect()->back()->with('success', 'Stock decreased successfully.');
        }
        return redirect()->back()->with('error', 'Product not found.');
    }
    
    
    public function clearStockLogs()
    {
        StockLog::truncate(); // Menghapus semua data dari tabel stock_logs
    
        return redirect()->route('product.index')->with('success', 'Stock history cleared successfully');
    }
}
