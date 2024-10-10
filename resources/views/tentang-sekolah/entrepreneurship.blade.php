@extends('layouts.master')

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/' . $entrepreneurship->background) }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">Struktur Organisasi</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" disabled="disabled">Tentang Kecamatan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
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
                        {!! $entrepreneurship->content !!}
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
                                                <h5><span><a href="{{ route('visi-misi') }}">Visi & Misi</a></span></h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('serviam') }}">Informasi Pelayanan</a></span></h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="content__info-item">
                                                <h5><span><a href="{{ route('entrepreneurship') }}" class="selected">Struktur Organisasi</a></span></h5>
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
