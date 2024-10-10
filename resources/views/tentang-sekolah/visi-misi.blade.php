@extends('layouts.master')

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/' . $vision->background) }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">Visi Misi</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" disabled="disabled">Tentang Kecamatan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Visi Misi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content__area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="content__wrapper">
                        {{-- <img src="{{ asset('upload/' . $vision->image) }}" alt="Image"> --}}
                        <h1>Visi Kecamatan</h1>
                        {!! $vision->content !!}
                        <h1>Misi Kecamatan</h1>
                        <div class="row mb-20">
                            @foreach ($missions as $mission)
                                <div class="col-sm-12">
                                    <div class="list__item transition-3 d-flex align-items-center mb-20">
                                        <div class="list__content">
                                            <h4 class="list__title mb-2">{{ $mission->name }}</h4>
                                            <p>{{ $mission->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h1>Value Proposition</h1>
                        <div class="row">
                            @foreach ($values as $value)
                                <div class="col-sm-12">
                                    <div class="list__item transition-3 d-flex align-items-center mb-20">
                                        <div class="list__content">
                                            <h4 class="list__title mb-2">{{ $value->name }}</h4>
                                            <p>{{ $value->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="content__sidebar pl-70">
                        <div class="content__sidebar-widget white-bg mb-20">
                            <div class="content__info">
                                <div class="content__info-content">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('profil') }}">Profil Kecamatan</a></span></h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('sejarah') }}">Sejarah Kecamatan</a></span></h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('visi-misi') }}" class="selected">Visi & Misi</a></span></h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('serviam') }}">Informasi Pelayanan</a></span></h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('entrepreneurship') }}">Struktur Organisasi</a></span></h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
