@extends('layouts.app')

@section('title', 'Pelatihan')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/pelatihan.css') }}" />
@endsection

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Pelatihan</h1>
        <p class="desc-jumb">Upgrade skill anda dengan mengikuti pelatihan di LAB INSYDE</p>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Pelatihan -->
    <section class="pelatihan">
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
                    <p>
                        @if ($data)
                            {!! nl2br(e($data->list)) !!}
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
                    <form action="{{ route('pelatihan.store') }}" method="POST">
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
                            <label for="exampleInputLayanan" class="form-label">Pelatihan Yang Ingin Anda Ikuti</label>
                            <input type="text" class="form-control" id="exampleInputLayanan"
                                name="pelatihan" placeholder="Informasikan Pelatihan Yang Ingin Anda Ikuti"
                                required />
                        </div>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Konsultasi -->
@endsection
