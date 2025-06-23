@extends('layouts.app')

@section('title', 'Sewa Lab')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/sewa.css') }}" />
@endsection

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Sewa LAB</h1>
        <p class="desc-jumb">Laboratorium kami juga siap digunakan untuk berbagai acara seperti workshop, penelitian, dan
            lain-lain.</p>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Sewa -->
    <section class="sewa">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4 penjelasan" style="padding-top: 50px; padding-bottom: 50px">
                <div class="col koldes">
                    <h5>
                        @if ($data)
                            {{ $data->title }}
                        @else
                            <span>Tidak ada judul yang tersedia.</span>
                        @endif
                    </h5>
                    <p style="font-weight: 500">
                        @if ($data)
                            {!! $data->description !!}
                        @else
                            <span>Tidak ada deskripsi yang tersedia.</span>
                        @endif
                    </p>
                    <br />
                    <p style="text-align: left;">
                        @if ($data)
                            {!! nl2br(e($data->list_1)) !!}
                        @else
                            <span>Tidak ada list yang tersedia.</span>
                        @endif
                    </p>
                    <br />
                    <p style="text-align: left;">
                        @if ($data)
                            {!! nl2br(e($data->list_2)) !!}
                        @else
                            <span>Tidak ada list yang tersedia.</span>
                        @endif
                    </p>
                </div>
                <div class="col">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('sewa-lab.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputNama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleInputNama" name="nama_lengkap"
                                placeholder="Nama Anda" required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputWa" class="form-label">Nomor WhatsApp</label>
                            <input type="number" class="form-control" id="exampleInputWa" name="nomor_whatsapp"
                                placeholder="12 Digit Nomor WhatsApp Aktif" required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPerusahaan" class="form-label">Perusahaan (Opsional)</label>
                            <input type="text" class="form-control" id="exampleInputPerusahaan" name="perusahaan"
                                placeholder="Isi Nama Perusahaan Anda" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputLayanan" class="form-label">Tujuan Sewa LAB</label>
                            <input type="text" class="form-control" id="exampleInputLayanan" name="tujuan"
                                placeholder="Informasikan Tujuan Anda Menyewa LAB" required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputHari" class="form-label">Hari Sewa LAB</label>
                            <input type="text" class="form-control" id="exampleInputHari" name="hari"
                                placeholder="Senin - Jum'at" required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTanggal" class="form-label">Tanggal Sewa LAB</label>
                            <input type="date" class="form-control" id="exampleInputTanggal" name="tanggal" required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputJamMulai" class="form-label">Jam Mulai Sewa LAB (07.00-15.00)</label>
                            <input type="time" class="form-control" id="exampleInputJamMulai" name="jam_mulai"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputJamBerakhir" class="form-label">Jam Berakhir Sewa LAB (08.00-16.00)</label>
                            <input type="time" class="form-control" id="exampleInputJamBerakhir" name="jam_berakhir"
                                required />
                        </div>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </form>
                </div>
            </div>
            <div class="row" style="padding-bottom: 50px">
                <div class="col text-center">
                    <h5>JADWAL PENGGUNAAN LAB INSYDE</h5>
                    <br />
                    <div class="table-responsive" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5); border-radius: 10px">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Sesi</th>
                                    <th rowspan="2">Jam</th>
                                    <th colspan="5">Hari</th>
                                </tr>
                                <tr>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jum'at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $sesi => $data)
                                    <tr>
                                        <td>Sesi {{ $sesi }}</td>
                                        <td>{{ $data->first()->jam }}</td>
                                        @foreach ([1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => "Jum'at"] as $hari => $namaHari)
                                            @php
                                                $status = $data->where('hari', $hari)->first();
                                            @endphp
                                            <td class="{{ $status && $status->status == 1 ? 'used' : '' }}">
                                                {{ $status && $status->status == 1 ? 'Digunakan' : '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted mt-3">
                        Last updated: {{ $lastUpdated ? $lastUpdated->format('l, d M Y H:i') : 'Belum ada data' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Sewa -->
@endsection
