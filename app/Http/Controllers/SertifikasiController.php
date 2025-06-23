<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikasi;
use App\Models\SertifikasiData;

class SertifikasiController extends Controller
{
    /**
     * Show the sertifikasi form.
     */
    public function index()
    {
        $data = SertifikasiData::first();

        return view('sertifikasi', compact('data'));
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
            'skema_sertifikasi' => 'required|string',
        ]);

        // Save the data to the database
        Sertifikasi::create([
            'nama' => $request->input('nama_lengkap'),
            'whatsapp' => $request->input('nomor_whatsapp'),
            'skema' => $request->input('skema_sertifikasi'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ajuan Berhasil Dikirim, Informasi Selanjutnya Akan Kami Kirim via WhatsApp.');
    }
}