@extends('layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="{{ asset('upload/' . $contact->background) }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-100">
                        <h3 class="page__title text-uppercase">Kontak</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact__area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6">
                    <div class="contact__wrapper">
                        <div class="contact__form">
                            <form action="{{ route('kontak.kirim-pesan') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="contact__form-input">
                                            <input type="text" placeholder="Nama Lengkap" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="contact__form-input">
                                            <input type="email" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6">
                                        <div class="contact__form-input">
                                            <input type="text" placeholder="Judul" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6">
                                        <div class="contact__form-input">
                                            <input type="text" placeholder="No. Handphone (WA)" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <textarea placeholder="Tuliskan Pesanmu Disini" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__btn">
                                            <button type="submit" class="e-btn">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                    <div class="contact__info white-bg p-relative z-index-1">
                        <div class="contact__info-inner white-bg">
                            <ul>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="map" viewBox="0 0 24 24">
                                                <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z" />
                                                <circle class="st0" cx="12" cy="10" r="3" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Kantor Kecamatan Payangan</h4>
                                            <p>
                                                <a target="_blank" href="{{ $contact->address_link }}">
                                                    {{ $contact->address }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="mail" viewBox="0 0 24 24">
                                                <path class="st0" d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z" />
                                                <polyline class="st0" points="22,6 12,13 2,6 " />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Email</h4>
                                            <p>
                                                <a href="mailto: #">
                                                    <span class="__cf_email__" data-cfemail="62111712120d10162207061701030e4c010d0f">
                                                        {{ $contact->email }}
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="call" viewBox="0 0 24 24">
                                                <path class="st0"
                                                    d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Phone</h4>
                                            <p><a href="tel:{{ $contact->phone1 }}">{{ $contact->phone1 }}</a></p>
                                            <p><a href="tel:{{ $contact->phone2 }}">{{ $contact->phone2 }}</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('plugins-js')
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(function() {
            'use strict';
            @if (session()->has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Terima Kasih',
                    text: '{{ session('success') }}',
                })
            @endif
        });
    </script>
@endpush
