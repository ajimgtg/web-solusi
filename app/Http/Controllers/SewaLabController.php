<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sewalab;
use App\Models\JadwalLab;
use App\Models\SewalabData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SewaLabController extends Controller
{
    /**
     * Show the sewa lab form.
     */
    public function index()
    {
        // Ambil data dari model JadwalLab
        $jadwal = JadwalLab::select('sesi', 'jam', 'hari', 'status')
            ->get()
            ->groupBy('sesi');


        // Ambil waktu terakhir diperbarui dan konversi ke Asia/Jakarta
        $lastUpdated = DB::table('jadwal_lab')
            ->max('updated_at'); // Ambil waktu terakhir diperbarui tanpa konversi

        $lastUpdated = $lastUpdated ? Carbon::parse($lastUpdated)->timezone('Asia/Jakarta') : null;

        $data = SewalabData::first();

        return view('sewa-lab', compact('jadwal', 'lastUpdated', 'data'));
    }

    /**
     * Handle form submission and save to database.
     */
    public function store(Request $request)
    {
        // Validate the form input
        // $request->validate([
        //     'nama_lengkap' => 'required|string|max:255',
        //     'nomor_whatsapp' => 'required|numeric',
        //     'perusahaan' => 'nullable|string|max:255',
        //     'tujuan' => 'required|string',
        //     'hari' => 'required|string',
        //     'tanggal' => 'required|date',
        //     'jam_mulai' => 'required|date_format:H:i',
        //     'jam_berakhir' => 'required|date_format:H:i|after:jam_mulai',
        // ]);

        // Save the data to the database
        $createSewa = Sewalab::create([
            'nama' => $request->input('nama_lengkap'),
            'whatsapp' => $request->input('nomor_whatsapp'),
            'perusahaan' => $request->input('perusahaan'),
            'tujuan' => $request->input('tujuan'),
            'hari' => $request->input('hari'),
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_berakhir' => $request->input('jam_berakhir'),
        ]);

        Log::info('Sewa berhasil ' . $createSewa);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ajuan Berhasil Dikirim, Informasi Selanjutnya Akan Kami Kirim via WhatsApp.');
    }
}