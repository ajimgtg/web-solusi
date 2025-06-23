@extends('layouts.app')

@section('title', 'Contact Us')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/Contact.css') }}" />
@endsection

@section('content')a
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 46px">
        <h1 class="display-4">Kontak</h1>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Content -->
    <div class="container">
        <div class="row" style="margin-top: 60px; margin-bottom: 100px">
            <div class="col-md-12 col-lg-3">
                <div class="card" style="height: fit-content; border-radius: 15px; border-color: #d9d9d9">
                    <div class="card-body" style="margin-right: 5px; margin-left: 5px">
                        <p style="color: #0369b6; font-weight: 900">HUBUNGI KAMI</p>
                        <h3 style="margin-top: -15px; font-weight: 900">Mari Bekerja Sama</h3>
                        <p class="card-text" style="font-size: 14px; font-weight: 600; text-align: left">Terima kasih
                            atas ketertarikan anda terhadap layanan kami, Kami sangat senang mendengar kabar dari anda.</p>
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-phone" style="color: #0369b6; margin-top: 15px; margin-left: 10px"></i>
                            </div>
                            <div class="col-10">
                                <p style="font-weight: 600">Telp</p>
                                @if (empty($phone))
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        Tidak ada data tersedia
                                    </p>
                                @else
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        {{ $phone }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-envelope" style="color: #0369b6; margin-top: 15px; margin-left: 10px"></i>
                            </div>
                            <div class="col-10">
                                <p style="font-weight: 600">Email</p>
                                @if ($email)
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        {{ $email }}
                                    </p>
                                @else
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        Email tidak tersedia.
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-map-marker-alt"
                                    style="color: #0369b6; margin-top: 15px; margin-left: 10px"></i>
                            </div>
                            <div class="col-10">
                                <p style="font-weight: 600">Alamat</p>
                                @if ($address)
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        {{ $address }}
                                    </p>
                                @else
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        Alamat tidak tersedia.
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-clock" style="color: #0369b6; margin-top: 15px; margin-left: 10px"></i>
                            </div>
                            <div class="col-10">
                                <p style="font-weight: 600">Jam Operasional</p>
                                @if ($hari && $jam)
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        {{ $hari }}<br /> {{ $jam }}
                                    </p>
                                @else
                                    <p style="margin-top: -17px; color: #0369b6; font-weight: bold">
                                        Jam operasional tidak tersedia.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                @if ($link_maps)
                    <iframe style="border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)" src="{{ $link_maps }}"
                        width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                @else
                    <div class="alert alert-danger" role="alert">
                        Link Maps tidak tersedia.
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Akhir Content -->
@endsection
