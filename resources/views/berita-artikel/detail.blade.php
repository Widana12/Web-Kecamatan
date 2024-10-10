@extends('layouts.master-post')

@section('content')
    <section class="page__title-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8">
                    <div class="page__title-content mb-25 pr-40">
                        <h5 class="page__title-3">{{ $post->title }}</h5>
                    </div>
                    <div class="page__meta d-sm-flex mb-20">
                        <div class="page__update mb-10 mr-80">
                            <h5>Tanggal Post</h5>
                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</p>
                        </div>
                        <div class="page__update mb-10 mr-80">
                            <h5>Author</h5>
                            <a href="#">{{ $post->user_create->name }}</a>
                        </div>
                        <div class="page__update">
                            <h5>Kategori</h5>
                            <a href="#">{{ $post->post_category->name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content__area pb-50 pt-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="content__thumb mb-35 w-img">
                        <img class="lazy" data-src="{{ asset('upload/' . $post->image) }}" alt="{{ $post->slug }}">
                    </div>
                    <div class="content__wrapper">
                        {!! $post->content !!}
                        <div class="content__line"></div>
                        <div class="content__meta d-sm-flex justify-content-end align-items-center">
                            <div class="content__social d-flex align-items-center">
                                <h4>Share:</h4>
                                {!! Share::page(request()->fullUrl())->facebook()->twitter('Your share text can be placed here')->whatsapp() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="content__sidebar pl-70">
                        <div class="content__sidebar-widget white-bg mb-20">
                            <div class="content__sidebar-widget-head mb-15">
                                <h3 class="content__sidebar-widget-title">Berita & Artikel Terbaru</h3>
                            </div>
                            <div class="content__sidebar-widget-content">
                                <div class="content__sidebar-post-wrapper">
                                    @foreach ($posts->take(5) as $sb_post)
                                        <div class="content__sidebar-post d-flex align-items-center">
                                            <div class="content__sidebar-post-thumb mr-20">
                                                <a href="{{ route('post.detail', $sb_post->slug) }}">
                                                    <img src="{{ asset('upload/' . $sb_post->image) }}" alt="Blob">
                                                </a>
                                            </div>
                                            <div class="content__sidebar-post-content">
                                                <div class="content__sidebar-post-meta">
                                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sb_post->created_at)->isoFormat('DD MMMM Y') }}</span>
                                                </div>
                                                <h6 class="content__sidebar-post-title">
                                                    <a href="{{ route('post.detail', $sb_post->slug) }}">
                                                        {{ $sb_post->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="content__sidebar-widget white-bg mb-20">
                            <div class="content__sidebar-widget-head mb-15">
                                <h3 class="content__sidebar-widget-title">Kategori Berita & Artikel</h3>
                            </div>
                            <div class="content__sidebar-widget-content">
                                <div class="content__sidebar-category">
                                    <ul>
                                        @foreach ($post_categories as $sb_post_category)
                                            <li><a href="{{ route('post.category', $sb_post_category->slug) }}">{{ $sb_post_category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content__sidebar-widget white-bg mb-20">
                            <div class="content__sidebar-widget-head mb-15">
                                <h3 class="content__sidebar-widget-title">Galeri Foto Terbaru</h3>
                            </div>
                            <div class="content__sidebar-widget-content">
                                <div class="content__sidebar-post-wrapper">
                                    @foreach ($galleries->take(3) as $sb_gallery)
                                        <div class="content__sidebar-post d-flex align-items-center">
                                            <div class="content__sidebar-post-thumb mr-20">
                                                <a href="{{ route('gallery.detail', $sb_gallery->slug) }}">
                                                    <img src="{{ asset('upload/' . $sb_gallery->image) }}" alt="Blob">
                                                </a>
                                            </div>
                                            <div class="content__sidebar-post-content">
                                                <div class="content__sidebar-post-meta">
                                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sb_gallery->created_at)->isoFormat('DD MMMM Y') }}</span>
                                                </div>
                                                <h6 class="content__sidebar-post-title">
                                                    <a href="{{ route('gallery.detail', $sb_gallery->slug) }}">
                                                        {{ $sb_gallery->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="content__sidebar-widget white-bg mb-20">
                            <div class="content__sidebar-widget-head mb-15">
                                <h3 class="content__sidebar-widget-title">Kategori Galeri Foto</h3>
                            </div>
                            <div class="content__sidebar-widget-content">
                                <div class="content__sidebar-category">
                                    <ul>
                                        @foreach ($gallery_categories as $sb_gallery_category)
                                            <li><a href="{{ route('gallery.category', $sb_gallery_category->slug) }}">{{ $sb_gallery_category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
