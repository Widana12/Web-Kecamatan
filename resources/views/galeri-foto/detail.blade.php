@extends('layouts.master-gallery')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/simple-lightbox/simple-lightbox.min.css') }}">
@endpush

@section('content')
    <section class="page__title-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8">
                    <div class="page__title-content mb-25 pr-40">
                        <h5 class="page__title-3">{{ $gallery->title }}</h5>
                    </div>
                    <div class="page__meta d-sm-flex mb-20">
                        <div class="page__update mb-10 mr-80">
                            <h5>Tanggal Post</h5>
                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y') }}</p>
                        </div>
                        <div class="page__update">
                            <h5>Kategori</h5>
                            <p><a href="{{ route('gallery.category', $gallery->gallery_category->slug) }}">{{ $gallery->gallery_category->name }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content__area pb-50 pt-20">
        <div class="container">
            <div class="row gallery">
                @foreach ($images as $image)
                    <div class="col-sm-6 col-lg-3 galery__image mb-10 pt-10 pb-10">
                        <a href="{{ asset('storage/photos/shares/' . $image->image) }}">
                            <img src="{{ asset('storage/photos/shares/' . $image->image) }}" title="{{ $gallery->title }}" class="w-img">
                        </a>
                    </div>
                @endforeach
            </div>
    </section>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendor/simple-lightbox/simple-lightbox.jquery.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        var gallery = $('.gallery .galery__image a').simpleLightbox({
            navText: ['&lsaquo;', '&rsaquo;']
        });
    </script>
@endpush
