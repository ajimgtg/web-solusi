@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/aboutus.css') }}" />
@endsection

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Tentang Kami</h1>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Tentang Kami -->
    <section class="tentang">
        <div class="container">
            <div class="row rw1">
                <div class="col-lg-6">
                    @if ($aboutUs)
                        <img src="{{ asset('storage/' . $aboutUs->image1) }}" class="img-fluid" alt="..."
                            style="border-radius: 15px; width: auto; height: auto; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5); filter: brightness(60%)" />
                    @else
                        <div class="text-center py-5">
                            <h3>Gambar tidak tersedia.</h3>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 td1">
                    @if ($aboutUs)
                        <h1 class="jdl-abt" style="color: #0369b6; font-weight: 800">
                            {{ $aboutUs->judul1 }}
                        </h1>
                        <p class="des-abt" style="text-align: justify">
                            {{ $aboutUs->description1 }}
                        </p>
                    @else
                        <div class="text-center py-5">
                            <h3>Data tidak tersedia.</h3>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row rw2">
                <div class="col-lg-6 td2">
                    @if ($aboutUs)
                        <h1 class="jdlabt2" style="color: #0369b6; font-weight: 800">
                            {{ $aboutUs->judul2 }}
                        </h1>
                        <p class="desabt2" style="text-align: justify">
                            {{ $aboutUs->description2 }}
                        </p>
                    @else
                        <div class="text-center py-5">
                            <h3>Data tidak tersedia.</h3>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if ($aboutUs)
                        <iframe style="border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)"
                            src="{{ $aboutUs->link_yutub }}" width="100%" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @else
                        <div class="text-center py-5">
                            <h3>Link YouTube tidak tersedia.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Tentang Kami -->
@endsection
