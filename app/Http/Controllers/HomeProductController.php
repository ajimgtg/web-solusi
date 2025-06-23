<?php

namespace App\Http\Controllers;

use App\Models\HomeProduct;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function index()
    {
        $products = HomeProduct::all();
        return view('descriptions.index', compact('products'));
    }

    public function create()
    {
        return view('descriptions.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'price', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_products', 'public');
        }

        HomeProduct::create($data);

        return redirect()->route('dashboard.descriptions')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = HomeProduct::findOrFail($id);
        return view('descriptions.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $product = HomeProduct::findOrFail($id);
        $data = $request->only('name', 'price', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_products', 'public');
        }

        $product->update($data);

        return redirect()->route('dashboard.descriptions')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        HomeProduct::destroy($id);
        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
