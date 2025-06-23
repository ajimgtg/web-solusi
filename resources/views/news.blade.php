@extends('layouts.app')

@section('title', 'Berita')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/News.css') }}" />
@endsection

@php use Illuminate\Support\Str; @endphp
@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Kegiatan</h1>
        <p class="desc-jumb">Laboratorium Solusi mempunyai banyak aktivitas dan kegiatan yang membantu<br>mahasiswa dalam mengembangkan kompetensinya.</p>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Berita -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-4" style="margin-top: 35px; padding-bottom: 35px;">
            @foreach ($news as $item)
                @php
                    \Carbon\Carbon::setLocale('id');
                    $formattedDate = \Carbon\Carbon::parse($item->date)->translatedFormat('l, d F Y');
                @endphp
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <p class="tgl">{{ $formattedDate }}</p>
                            <h5 class="card-title

                            ">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($item->description), 70, '...') }}</p>
                            <a class="dtl" href="{{ route('news.show', $item->id) }}"
                                style="text-decoration: none; color: #f43b22">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="custom-pagination">
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Berita -->
@endsection
