@extends('layouts.app')

@section('title', 'Studio Detail')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/studio_detail.css') }}" />
@endsection

@section('content')
    <!-- Detail Produk -->
    <div class="container">
        <div class="row" style="margin-top: 56px">
            <div class="col-lg-6">
                <img src="../storage/{{ $studioItem->gambar_produk }}" class="img-fluid gmbr" alt="..."
                    style="border-radius: 15px; width: 700px; height: fit-content; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)" />
            </div>
            <div class="col-lg-6 deskrip">
                <h1 class="jdl">{{ $studioItem->nama_produk }}</h1>
                @if (!empty($studioItem->harga_produk > 0))
                <p class="hrg">Rp. {{ number_format($studioItem->harga_produk, 0, ',', '.') }}</p>
                @endif
                <p class="desc">
                    {!! nl2br(e($studioItem->deskripsi_produk)) !!}
                </p>
                @if (!empty($studioItem->link_shopee))
                <a href="{{ $studioItem->link_shopee }}" target="_blank" class="btn btn-outline-danger"
                    style="margin-top: 20px; margin-bottom: 35px; background-color: #f43b22; color: white; width: fit-content; border-radius: 7px">Beli
                    Di Shopee</a>
                    @endif
                @if (!empty($studioItem->link_tokped))
                <a href="{{ $studioItem->link_tokped }}" target="_blank" class="btn btn-outline-success"
                    style="margin-top: 20px; margin-bottom: 35px; background-color: #0ba700; color: white; width: fit-content; border-radius: 7px">Beli
                    Di Tokopedia</a>
                    @endif
            </div>
        </div>

        <hr />
        <div class="row">
            <div class="col">
                <a href="{{ route('studio') }}" class="btn btn-outline-danger"
                    style="margin-top: 20px; margin-bottom: 35px; background-color: #0369b6; color: white; width: fit-content; border-radius: 7px">Kembali</a>
            </div>
        </div>
    </div>
    <!-- Akhir Produk -->
@endsection
@section('my-js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollreveal/4.0.7/scrollreveal.min.js"></script>
@endsection
