@extends('layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/full-featured-rbox/jquery-rbox.css') }}">
@endpush

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/defaultBackground.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">Fasilitas Kecamatan</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="galeries__area pt-70 pb-50">
        <div class="container">
            <div class="row">
                @foreach ($facilities as $facility)
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="galeries__item white-bg mb-30 transition-3 fix">
                            <div class="galeries__thumb w-img fix mb-3">
                                <a href="{{ asset('upload/' . $facility->image) }}" class="images" data-rbox-image="{{ asset('upload/' . $facility->image) }}" data-rbox-caption="{{ $facility->title }}">
                                    <img class="lazy" data-src="{{ asset('upload/' . $facility->image) }}" alt="{{ $facility->title }}">
                                </a>
                            </div>
                            <div class="galeries__content">
                                <h3 class="galeries__title text-justify">
                                    {{ $facility->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendor/full-featured-rbox/jquery-rbox.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $(".images").rbox({
            'type': 'image',
        });
    </script>
@endpush
