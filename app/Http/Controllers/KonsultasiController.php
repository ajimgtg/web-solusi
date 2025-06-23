<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\KonsultasiData;

class KonsultasiController extends Controller
{
    /**
     * Show the konsultasi form.
     */
    public function index()
    {
        $data = KonsultasiData::first();

        return view('konsultasi', compact('data'));
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
            'perusahaan' => 'nullable|string|max:255',
            'layanan_yang_dibutuhkan' => 'required|string',
        ]);

        // Save the data to the database
        Konsultasi::create([
            'nama' => $request->input('nama_lengkap'),
            'whatsapp' => $request->input('nomor_whatsapp'),
            'perusahaan' => $request->input('perusahaan'),
            'layanan_yang_dibutuhkan' => $request->input('layanan_yang_dibutuhkan'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ajuan Berhasil Dikirim, Informasi Selanjutnya Akan Kami Kirim via WhatsApp.');
    }
}