<?php

namespace App\Http\Controllers;

use App\Models\HomeService;
use App\Models\HomeDescription;
use App\Models\HomeProduct;
use Illuminate\Http\Request;

class HomeServiceController extends Controller
{
    // Method ini sebenarnya gak terlalu dipakai karena semua ditampilkan di descriptions.index
    // Tapi kalau mau pakai, pastikan view-nya ada
    public function index()
    {
        $homeDescriptions = HomeDescription::all();
        $services = HomeService::all();
        $products = HomeProduct::all();

        return view('descriptions.index', compact('homeDescriptions', 'services', 'products'));
    }

    public function create()
    {
        return view('descriptions.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->only(['title', 'description']);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
    
        HomeService::create($data);
    
        return redirect()->route('dashboard.descriptions')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $service = HomeService::findOrFail($id);
        return view('descriptions.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $service = HomeService::findOrFail($id);

    $data = [
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $request->filled('icon') ? $request->icon : null, // <--- ini kuncinya
    ];

    // Cek kalau user upload image baru
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('services', 'public');
    }

    $service->update($data);

    return redirect()->route('dashboard.descriptions')->with('success', 'Layanan berhasil diperbarui.');
}

    public function destroy($id)
    {
        HomeService::destroy($id);
        return redirect()->route('dashboard.descriptions')->with('success', 'Layanan berhasil dihapus.');
    }
}
