@extends('layouts.master')

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/defaultBackground.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">{{ $post_category->name }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" disabled="disabled">Berita & Artikel</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs__area pt-70 pb-50">
        <div class="container">
            <div class="row">
                <div class="row">
                    @foreach ($posts as $post)
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
                {{ $posts->links('layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
