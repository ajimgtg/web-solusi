@extends('layouts.app')

@section('title', 'Lab Insyde')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/index.css') }}" />
@endsection

@section('content')
    <!-- Carousel -->
    <section class="banner" style="margin-top: 56px">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            @if ($sliders->isNotEmpty())
                <div class="carousel-indicators">
                    @foreach ($sliders as $index => $item)
                        <button type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($sliders as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $item->image) }}" class="d-block w-100" alt="..." />
                            <div class="carousel-caption">
                                <h1>{{ $item->judul }}</h1>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @else
                <div class="text-center py-5">
                    <h3>Tidak ada data slider untuk ditampilkan.</h3>
                </div>
            @endif
        </div>
    </section>
    <!-- Akhir Carousel -->

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

    <!-- Layanan -->
    <section class="layanan" style="background-color: #0369b6">
        <div class="container">
            <div class="row">
                <h1 style="font-weight: 800; color: #fff; text-align: center; margin-top: 33px; margin-bottom: 10px">
                    Layanan Kami</h1>
            </div>
            <div class="row" style="padding-bottom: 50px">
                <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if ($layanans)
                            @foreach ($layanans as $index => $item)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="card text-center h-100">
                                        <div class="img-wrapper">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="..." />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                            <p class="card-text">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-5">
                                <h3>Tidak ada layanan yang tersedia.</h3>
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            </div>
        </div>
    </section>
    <!-- Akhir Layanan -->

    <!-- Pertanyaan yg sering diajukan -->
    <section class="FaQ">
        <div class="container">
            <div class="row">
                <h1 style="font-weight: 800; color: #0369b6; text-align: center; margin-top: 33px">Pertanyaan yang Sering
                    Diajukan</h1>
            </div>
            <div class="row" style="margin-top: 25px; padding-bottom: 80px">
                <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                    @if ($faqs)
                        @foreach ($faqs as $index => $item)
                            <div class="accordion-item rounded-3 mb-2">
                                <h2 class="accordion-header" id="panelsStayOpen-heading{{ $index }}">
                                    <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }} rounded-3"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="panelsStayOpen-collapse{{ $index }}">
                                        {{ $item->pertanyaan }}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="panelsStayOpen-heading{{ $index }}">
                                    <div class="accordion-body">
                                        {{ $item->jawaban }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5">
                            <h3>Tidak ada pertanyaan yang tersedia.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Pertanyaan -->
@endsection

@section('my-js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/custom/index.js') }}"></script>
@endsection
