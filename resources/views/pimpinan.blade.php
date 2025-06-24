@extends('layouts.app')

@section('title', 'Pimpinan')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/pimpinan.css') }}" />
@endsection
@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Anggota Lab Solusi</h1>
        <p class="desc-jumb">Sistem Informasi - Fakultas Ilmu Komputer - UPN "Veteran" Jawa Timur</p>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Pimpinan Fakultas -->
    <section style="margin-top: 50px">
        <div class="container">
            <div class="row text-center" style="padding-bottom: 50px">
                <div class="col"></div>
                <div class="col-xs-12 col-md-4">
                    <div class="card h-100">
                        @if ($leaders->count() > 0)
                            <img src="storage/{{ $leaders[0]->image }}" class="card-img-top" alt="..." />
                        @else
                            No information available.
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[0]->name }}
                                @else
                                    No information available.
                                @endif
                            </h5>
                            <h6 class="card-text satu">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[0]->position }}
                                @else
                                    No information available.
                                @endif
                            </h6>
                            <p class="card-text">
                                <i class="fas fa-user" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[0]->nip }}
                                @else
                                    No information available.
                                @endif
                            </p>
                            <p class="card-text tiga">
                                <i class="fas fa-envelope" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[0]->email }}
                                @else
                                    No information available.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row text-center" style="padding-bottom: 50px">
                <div class="col-xs-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($leaders->count() > 0)
                            <img src="storage/{{ $leaders[1]->image }}" class="card-img-top" alt="..." />
                        @else
                            No information available.
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[1]->name }}
                                @else
                                    No information available.
                                @endif
                            </h5>
                            <h6 class="card-text satu">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[1]->position }}
                                @else
                                    No information available.
                                @endif
                            </h6>
                            <p class="card-text">
                                <i class="fas fa-user" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[1]->nip }}
                                @else
                                    No information available.
                                @endif
                            </p>
                            <p class="card-text tiga">
                                <i class="fas fa-envelope" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[1]->email }}
                                @else
                                    No information available.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($leaders->count() > 0)
                            <img src="storage/{{ $leaders[2]->image }}" class="card-img-top" alt="..." />
                        @else
                            No information available.
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[2]->name }}
                                @else
                                    No information available.
                                @endif
                            </h5>
                            <h6 class="card-text satu">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[2]->position }}
                                @else
                                    No information available.
                                @endif
                            </h6>
                            <p class="card-text">
                                <i class="fas fa-user" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[2]->nip }}
                                @else
                                    No information available.
                                @endif
                            </p>
                            <p class="card-text tiga">
                                <i class="fas fa-envelope" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[2]->email }}
                                @else
                                    No information available.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($leaders->count() > 0)
                            <img src="storage/{{ $leaders[3]->image }}" class="card-img-top" alt="..." />
                        @else
                            No information available.
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[3]->name }}
                                @else
                                    No information available.
                                @endif
                            </h5>
                            <h6 class="card-text satu">
                                @if ($leaders->count() > 0)
                                    {{ $leaders[3]->position }}
                                @else
                                    No information available.
                                @endif
                            </h6>
                            <p class="card-text">
                                <i class="fas fa-user" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[3]->nip }}
                                @else
                                    No information available.
                                @endif
                            </p>
                            <p class="card-text tiga">
                                <i class="fas fa-envelope" style="color: #0369b6; margin-right: 5px"></i>
                                @if ($leaders->count() > 0)
                                    {{ $leaders[3]->email }}
                                @else
                                    No information available.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Pimpinan Fakultas -->
@endsection
