@extends('layouts.app')

@section('title', 'Visi Misi')

@section('my-css')
    <link rel="stylesheet" href="{{ asset('css/custom/visimisi.css') }}" />
@endsection

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-top: 56px">
        <h1 class="display-4">Visi & Misi</h1>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Visi Misi -->
    <section class="visimisi">
        <div class="container">
            <div class="row barisvisimisi">
                <div class="col-xs-12 col-md-6 mb-4">
                    <h1 class="jdl">Visi</h1>
                    <p class="visi">
                        @if ($visions->isEmpty())
                            <div class="text-center py-5">
                                <h3>Tidak ada data yang tersedia.</h3>
                            </div>
                        @else
                            {{ $visions[0]['vision'] }}
                        @endif
                        {{-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the
                        printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem
                        Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever
                        since the 1500s. --}}
                    </p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <h1 class="jdl">Misi</h1>
                    @if ($visions->isEmpty())
                        <div class="text-center py-5">
                            <h3>Tidak ada data yang tersedia.</h3>
                        </div>
                    @else
                        <p style="text-align: left">
                            {!! nl2br(e($visions['0']['mission'])) !!}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Visi Misi -->
@endsection
