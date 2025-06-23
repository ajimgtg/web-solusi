@extends('layouts.app')

@section('title', 'Pengelola')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/manajemen.css') }}" />
@endsection

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Pengelola</h1>
        <p class="desc-jumb">Sertifikasi dan Pelatihan Kami Diisi Oleh Orang Expert & Berpengalaman Dibidangnya.</p>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Team -->
    <section style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 style="color: #0369b6; font-weight: 900">Struktur Organisasi</h3>
                    <hr />
                    <br />
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4 text-center" style="padding-bottom: 50px">
                @foreach ($strukturs as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="storage/{{ $item->image }}" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-text satu">{{ $item->position }}</h6>
                                <a href="{{ $item->link_linkedin }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-linkedin fa-lg"
                                        style="color: #0e76a8; font-size: 34px; margin-top: 20px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col">
                    <h3 style="color: #0369b6; font-weight: 900">Asessor / Pemateri</h3>
                    <hr />
                    <br />
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 text-center" style="padding-bottom: 50px">
                @foreach ($asesors as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="storage/{{ $item->image }}" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-text satu">{{ $item->position }}</h6>
                                <a href="{{ $item->link_linkedin }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-linkedin fa-lg"
                                        style="color: #0e76a8; font-size: 34px; margin-top: 20px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Akhir Team -->
@endsection
