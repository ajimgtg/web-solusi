<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\PelatihanData;

class PelatihanController extends Controller
{
    /**
     * Show the pelatihan form.
     */
    public function index()
    {
        $data = PelatihanData::first();

        return view('pelatihan', compact('data'));
    }

    /**
     * Handle form submission and save to database.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_whatsapp' => 'required|numeric',
            'pelatihan' => 'required|string',
        ]);

        // Save the data to the database
        Pelatihan::create([
            'nama' => $request->input('nama_lengkap'),
            'whatsapp' => $request->input('nomor_whatsapp'),
            'pelatihan' => $request->input('pelatihan'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ajuan Berhasil Dikirim, Informasi Selanjutnya Akan Kami Kirim via WhatsApp.');
    }
}