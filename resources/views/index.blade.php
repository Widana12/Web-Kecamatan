@extends('layouts.master')

@section('content')
<!--Halaman Awal-->
    <section class="slider__area p-relative">
        <div class="slider__wrapper swiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="single-slider swiper-slide slider__height slider__overlay d-flex align-items-center" data-background="{{ asset('upload/' . $slider->background) }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-8 col-lg-9 col-md-10 col-sm-10">
                                    <div class="slider__content">
                                        <span class="text-uppercase fw-bolder">{{ $slider->sub_title1 }}</span>
                                        <h3 class="slider__title">
                                            {{ $slider->title }}
                                        </h3>
                                        <p>{{ $slider->sub_title2 }}</p>
                                        <a href="{{ $slider->button_link }}" class="e-btn slider__btn">{{ $slider->button_name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-container slider__nav d-none d-md-block">
            <div class="swiper-wrapper"></div>
        </div>
    </section>
    <!--Kata Opening-->
    <section class="opening__area pt-70 pb-30 grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="opening__slider">
                        <div class="opening__slider-wrapper swiper-container opening-text mb-35">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="opening__item">
                                        <p>
                                            {!! $opening_headmaster->opening_content !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Sambutan Kepala Kecamatan -->
    <section class="headmaster__area pt-70 pb-50 grey-bg-10">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6">
                    <div class="headmaster__thumb-wrapper">
                        <div class="headmaster__thumb ml-100">
                            <img class="lazy" data-src="{{ asset('upload/' . $opening_headmaster->headmaster_image) }}" alt="Kepala Camat">
                            <div class="headmaster__list mt--210">
                                <ul>
                                    <li class="d-flex align-items-center">{{ $opening_headmaster->headmaster_name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="headmaster__content pl-70 pt-0 pr-60">
                        <div class="headmaster__title-wrapper mb-25">
                            <h2 class="headmaster__title text-center">
                                Sambutan Kepala Camat Payangan
                            </h2>
                            <p class="headmaster__content">
                                {!! $opening_headmaster->headmaster_content !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Perangkat Kasi-->
    <section class="image-slider-area pt-70 pb-50">
        <div class="container">
            <div class="col-xxl-12">
                <div class="image-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial__item swiper-slide text-center">
                                <div class="swiper-slide">
                                    <img class="lazy" data-src="{{ asset('upload/' . $testimonial->image) }}" alt="testimonial" />
                                </div>
                                <div class="testimonial__content">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <h5>{{ $testimonial->content }}</h5>
                                    <div class="testimonial__info">
                                        
                                        <h5>{{ $testimonial->sub_name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation Arrows -->
                    <div class="swiper-button-next swiper-nav"><i class="far fa-arrow-right"></i></div>
                    <div class="swiper-button-prev swiper-nav"><i class="far fa-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Swiper Initialization -->
    <script>
        var swiper = new Swiper('.image-slider', {
            slidesPerView: 3,          // Number of slides per view
            spaceBetween: 30,          // Space between slides
            loop: true,                // Loop the slides
            autoplay: {                // Auto slide configuration
                delay: 1000,           // Delay between slides (5 seconds)
                disableOnInteraction: false, // Keep autoplay even when user interacts
            },
            navigation: {              // Navigation arrows
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <!-- <section class="testimonial__area testimonial__overlay pt-70 pb-50" data-background="{{ asset('upload/defaultBackground.jpg') }}">
        <div class="container">
            <div class="col-xxl-12">
                <div class="testimonial__slider swiper">
                    <div class="testimonial__slider-inner swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial__item swiper-slide text-center">
                                <div class="testimonial__thumb">
                                    <img class="lazy" data-src="{{ asset('upload/' . $testimonial->image) }}" alt="Testimonial">
                                </div>
                                <div class="testimonial__content">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <h5>{{ $testimonial->content }}</h5>
                                    <div class="testimonial__info">
                                        
                                        <h5>{{ $testimonial->sub_name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next swiper-nav"><i class="far fa-arrow-right"></i></div>
                    <div class="swiper-button-prev swiper-nav"><i class="far fa-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Berita dan Artikel-->
    <section class="blogs__area pt-70 pb-50">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <div class="section__title-wrapper mb-30">
                        <h2 class="section__title text-uppercase">Berita & Artikel Terbaru</h2>
                        <p>Klik <a href="{{ route('posts') }}" class="fw-bolder">DISINI</a> Untuk Melihat Berita & Artikel Lainnya</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts->take(3) as $post)
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                        <div class="blogs__item white-bg mb-30 fix">
                            <div class="blogs__thumb w-img p-relative fix">
                                <a href="{{ route('post.detail', $post->slug) }}">
                                    <img class="lazy" data-src="{{ asset('upload/' . $post->image) }}" alt="Gambar Utama">
                                </a>
                                <div class="blogs__tag">
                                    <a href="{{ route('post.category', $post->post_category->slug) }}">{{ $post->post_category->name }}</a>
                                </div>
                            </div>
                            <div class="blogs__content">
                                <h3 class="blogs__title">
                                    <a href="{{ route('post.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <div class="blogs__meta d-flex align-items-center justify-content-between">
                                    <div class="blogs__clock">
                                        <span>
                                            <i class="far fa-clock"></i>
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}
                                        </span>
                                    </div>
                                    <div class="blogs__user">
                                        <a href="{{ route('post.author', $post->user_create->slug) }}">
                                            <span>
                                                <i class="far fa-user"></i>
                                                {{ $post->user_create->name }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="blogs__summary">
                                    <p>
                                        {{ strip_tags(Illuminate\Support\Str::limit($post->content, 150)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Galeri Foto -->
    <section class="galeries__area pt-70 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <div class="section__title-wrapper mb-30">
                        <h2 class="section__title text-uppercase">Galeri Foto & Video</h2>
                        <p>Klik <a href="{{ route('galleries') }}" class="fw-bolder">DISINI</a> Untuk Melihat Galeri Lainnya</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($galleries->take(3) as $gallery)
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
