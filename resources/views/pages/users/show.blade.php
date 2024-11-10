@extends('layouts.app')

@section('body')
    <section class="bg-grayy pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="d-flex mb-4">
                        <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink-0 me-4">
                            <img src="{{ url('assets/images/avatar-2.png') }}" alt="" class="avatar" />
                        </div>
                        <div class="">
                            <div class="mb-4">
                                <div class="fs-2 fw-bold mb-1 lh-1 text-break">Faza Raditya Hamzah</div>
                                <div class="color-gray">Member since 1 year ago</div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <!-- Input URL yang akan dicopy -->
                        <input type="text" id="current-url" value="{{ request()->url() }}" class="d-none" />

                        <!-- Tombol Share -->
                        <a href="javascript:;" id="share-profile" class="btn btn-primary me-4">Share</a>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="mb-5">
                        <h2 class="mb-3">My Discussions</h2>
                        <div class="card card-discussions">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end"
                                >
                                    <div class="text-nowrap me-2 me-lg-0">3 suka</div>
                                    <div class="text-nowrap color-gray">9 balasan</div>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <a href="{{ route('detail') }}">
                                        <h3>Cara menambahkan custom validation in laravel 11?</h3>
                                    </a>
                                    <p>
                                        Gwa lagi mengerjakan aplikasi blog di Laravel 11. Ada 4 peran pengguna, di
                                        antaranya, "...
                                    </p>
                                    <div class="row">
                                        <div class="col me-1 me-lg-2">
                                            <a href="">
                                                <span class="badge rounded-pill text-bg-light">
                                                    Programming & Coding
                                                </span>
                                            </a>
                                        </div>
                                        <div class="col-5 col-lg-4">
                                            <div class="avatar-sm-wrapper d-inline-block">
                                                <a href="" class="me-1">
                                                    <img
                                                        src="{{ url('assets/images/avatar.png') }}"
                                                        class="avatar rounded-circle"
                                                        alt=""
                                                    />
                                                </a>
                                            </div>
                                            <span class="fs-12px">
                                                <a href="" class="me-1 fw-bold">Faza Raditya</a>
                                                <span class="color-gray">7 hours ago</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-discussions">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end"
                                >
                                    <div class="text-nowrap me-2 me-lg-0">3 suka</div>
                                    <div class="text-nowrap color-gray">9 balasan</div>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <a href="{{ route('detail') }}">
                                        <h3>Cara menambahkan custom validation in laravel 11?</h3>
                                    </a>
                                    <p>
                                        Gwa lagi mengerjakan aplikasi blog di Laravel 11. Ada 4 peran pengguna, di
                                        antaranya, "...
                                    </p>
                                    <div class="row">
                                        <div class="col me-1 me-lg-2">
                                            <a href="">
                                                <span class="badge rounded-pill text-bg-light">
                                                    Programming & Coding
                                                </span>
                                            </a>
                                        </div>
                                        <div class="col-5 col-lg-4">
                                            <div class="avatar-sm-wrapper d-inline-block">
                                                <a href="" class="me-1">
                                                    <img
                                                        src="{{ url('assets/images/avatar.png') }}"
                                                        class="avatar rounded-circle"
                                                        alt=""
                                                    />
                                                </a>
                                            </div>
                                            <span class="fs-12px">
                                                <a href="" class="me-1 fw-bold">Faza Raditya</a>
                                                <span class="color-gray">7 hours ago</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="mb-3">My Answers</h2>
                        <div class="">
                            <div class="card card-discussions">
                                <div class="row align-items-center">
                                    <div class="col-2 col-lg-1 text-center">12</div>
                                    <div class="col">
                                        <span>Replied to</span>
                                        <span class="fw-bold text-primary">
                                            <a href="">How to add custom validation in laravel 11</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-discussions">
                                <div class="row align-items-center">
                                    <div class="col-2 col-lg-1 text-center">12</div>
                                    <div class="col">
                                        <span>Replied to</span>
                                        <span class="fw-bold text-primary">
                                            <a href="">How to add custom validation in laravel 11</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $(document).ready(function () {
            $('#share-profile').click(function () {
                var copyText = $('#current-url')

                // Pilih teks pada input
                copyText[0].select()
                copyText[0].setSelectionRange(0, 99999) // Select seluruh teks
                navigator.clipboard.writeText(copyText.val()) // Copy teks

                // SweetAlert untuk konfirmasi berhasil copy
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Link profil berhasil dicopy ke clipboard!',
                    icon: 'success',
                    confirmButtonText: 'Oke',
                })
            })
        })
    </script>
@endsection
