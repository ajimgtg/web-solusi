@extends('layouts.app')

@section('title', 'News Detail')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/Detail_Berita.css') }}" />
@endsection

@php
    \Carbon\Carbon::setLocale('id');
    $formattedDate = \Carbon\Carbon::parse($newsItem->date)->translatedFormat('l, d F Y');
@endphp

@section('content')
    <!DOCTYPE html>
    <!-- Detail Berita -->
    <div class="container">
        <div class="row" style="margin-top: 56px">
            <div class="col text-center">
                <h1 class="jdl">{{ $newsItem->title }}</h1>
                <p class="tgl">{{ $formattedDate }}</p>
            </div>
        </div>
        <div class="row gbr text-center">
            <div class="col">
                <img src="../storage/{{ $newsItem->image }}" class="img-fluid" alt="..."
                    style="border-radius: 15px; width: 1000px; height: fit-content" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="desc">
                    {{ $newsItem->description }}
                </p>
            </div>
        </div>

        <hr />
        <div class="row">
            <div class="col">
                <a href="{{ route('news') }}" class="btn btn-outline-danger"
                    style="margin-top: 20px; margin-bottom: 35px; background-color: #0369b6; color: white; width: fit-content; border-radius: 7px">Kembali</a>
            </div>
        </div>
    </div>
    <!-- Akhir Berita -->
@endsection
