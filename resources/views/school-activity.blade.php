@extends('layouts.master')

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/' . $school_activity->background) }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">{{ $school_activity->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content__area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <div class="content__wrapper">
                        {!! $school_activity->content !!}
                    </div>
                </div>
            </div>
    </section>
@endsection
