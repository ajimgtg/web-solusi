<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeDescription;
use App\Models\BerandaLayananKami;

class HomeDescriptionController extends Controller
{
    /**
     * Tampilkan daftar Home Description.
     */
    public function index()
    {
        $homeDescriptions = HomeDescription::first();
        $services = BerandaLayananKami::all();
        $products = \App\Models\HomeProduct::all();

        return view('descriptions.index', compact('homeDescriptions', 'services', 'products'));
    }


    /**
     * Tampilkan form untuk membuat Home Description baru.
     */
    public function create()
    {
        return view('descriptions.create');
    }

    /**
     * Simpan Home Description baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048', // maksimal 2MB
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            // Simpan gambar di folder "home_descriptions" pada disk "public"
            $data['image'] = $request->file('image')->store('home_descriptions', 'public');
        }

        HomeDescription::create($data);

        return redirect()->route('dashboard.descriptions')->with('success', 'Home Description berhasil disimpan.');
    }

    /**
     * Tampilkan detail dari Home Description tertentu.
     */
    public function show(HomeDescription $homeDescription)
    {
        return view('home_descriptions.show', compact('homeDescription'));
    }

    /**
     * Tampilkan form untuk mengedit Home Description.
     */
    public function edit($id)
    {
        $homeDescriptions = HomeDescription::findOrFail($id);
        return view('descriptions.edit', compact('homeDescriptions'));
    }

    /**
     * Update Home Description di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_descriptions', 'public');
        }

        HomeDescription::findOrFail($id)->update($data);

        return redirect()->route('dashboard.descriptions')->with('success', 'Home Description berhasil diperbarui.');
    }

    /**
     * Hapus Home Description dari database.
     */
    public function destroy($id)
    {
        HomeDescription::destroy($id);

        return redirect()->back()->with('success', 'Home Description berhasil dihapus.');
    }
}