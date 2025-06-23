<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * **Frontend** - Tampilkan About Us untuk pengunjung.
     */

    public function show()
    {
        $aboutUs = AboutUs::first(); // Ambil data pertama dari tabel
        return view('aboutus', compact('aboutUs'));
    }

    public function index()
    {
        $aboutUs = AboutUs::first(); // Ambil data pertama
        return view('aboutus.index', compact('aboutUs'));
    }

    public function dashboardIndex()
    {
        $aboutUs = AboutUs::first();
        return view('aboutus.index', compact('aboutUs')); // Pastikan file ini ada di /resources/views/dashboard/aboutus/
    }

    /**
     * **Dashboard** - Form Tambah About Us
     */
    public function create()
    {
        return view('aboutus.create');
    }

    /**
     * **Dashboard** - Simpan Data Baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only('description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about_us', 'public');
        }

        AboutUs::create($data);

        return redirect()->route('dashboard.aboutus')->with('success', 'About Us berhasil disimpan.');
    }

    /**
     * **Dashboard** - Form Edit About Us
     */
    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('aboutus.edit', compact('aboutUs'));
    }

    /**
     * **Dashboard** - Update Data About Us
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only('description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about_us', 'public');
        }

        AboutUs::findOrFail($id)->update($data);

        return redirect()->route('dashboard.aboutus')->with('success', 'About Us berhasil diperbarui.');
    }

    /**
     * **Dashboard** - Hapus About Us
     */
    public function destroy($id)
    {
        AboutUs::destroy($id);
        return redirect()->route('dashboard.aboutus')->with('success', 'About Us berhasil dihapus.');
    }
}