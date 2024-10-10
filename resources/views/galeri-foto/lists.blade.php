@extends('layouts.master')

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/defaultBackground.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">Galeri Foto</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="galeries__area pt-70 pb-50">
        <div class="container">
            <div class="row">
                @foreach ($galleries as $gallery)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="galeries__item white-bg mb-30 transition-3 fix">
                            <div class="galeries__thumb w-img fix">
                                <a href="{{ route('gallery.detail', $gallery->slug) }}">
                                    <img class="lazy" data-src="{{ asset('upload/' . $gallery->image) }}" alt="Foto Utama">
                                </a>
                            </div>
                            <div class="galeries__content">
                                <div class="galeries__meta d-flex align-items-center justify-content-between">
                                    <div class="galeries__tag">
                                        <a href="{{ route('gallery.category', $gallery->gallery_category->slug) }}">{{ $gallery->gallery_category->name }}</a>
                                    </div>
                                    <div class="galeries__date d-flex align-items-center">
                                        <i class="fal fa-clock"></i>
                                        <span>
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y') }}
                                        </span>
                                    </div>
                                </div>
                                <h3 class="galeries__title">
                                    <a href="{{ route('gallery.detail', $gallery->slug) }}">{{ $gallery->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
