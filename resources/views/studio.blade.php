@extends('layouts.app')

@section('title', 'Insyde Studio')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/Product.css') }}" />
@endsection

@php use Illuminate\Support\Str; @endphp

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Insyde Studio</h1>
        <p class="lead" style="font-weight: 400">Pantau terus halaman ini, untuk informasi insyde studio terbaru dari kami.</p>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Produk -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-4" style="margin-top: 35px; padding-bottom: 35px;">
            @foreach ($studios as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $item->gambar_produk) }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($item->deskripsi_produk), 70, '...') }}</p>
                            <a class="dtl" href="{{ route('studio.show', $item->id) }}"
                                style="text-decoration: none; color: #f43b22">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="custom-pagination">
                    {{ $studios->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Produk -->
@endsection
