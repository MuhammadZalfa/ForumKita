@extends('layouts.app')

@section('body')
    <section class="bg-grayy pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-item-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0"><h2>Diskusi</h2></div>
                        <div class="fs-2 fw-bold color-primary me-2 mb-0">></div>
                    </div>
                    <h2 class="mb-0">Cara menambah custom validation di laravel 11?</h2>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                        <div class="card card-discussions mb-5">
                            <div class="row align-items-center">
                                <div
                                    class="col-1 d-inline-flex flex-column justify-content-start align-items-center text-center align-self-start"
                                >
                                    <a href="">
                                        <img
                                            src="{{ url('assets/images/like.png') }}"
                                            alt="like"
                                            class="like-icon mb-1"
                                        />
                                    </a>
                                    <span class="color-gray mb-1">12</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        Saya sedang mengerjakan aplikasi blog di Laravel 8. Ada 4 peran pengguna, di
                                        antaranya, Saya sedang mengerjakan aplikasi blog di Laravel 8. Ada 4 peran
                                        pengguna, di antaranya, Saya sedang mengerjakan aplikasi blog di Laravel 8. Ada
                                        4 peran pengguna, di antaranya, Saya sedang mengerjakan aplikasi blog di Laravel
                                        8. Ada 4 peran pengguna, di antaranya, Saya sedang mengerjakan aplikasi blog di
                                        Laravel 8. Ada 4 peran pengguna, di antaranya, Saya sedang mengerjakan aplikasi
                                        blog di Laravel 8. Ada 4 peran pengguna, di antaranya, Saya sedang mengerjakan
                                        aplikasi blog di Laravel 8. Ada 4 peran pengguna, di antaranya, Saya sedang
                                        mengerjakan aplikasi blog di Laravel 8. Ada 4 peran pengguna, di antaranya, Saya
                                        sedang mengerjakan aplikasi blog di Laravel 8. Ada 4 peran pengguna, di
                                        antaranya,
                                    </p>
                                    <div class="mb-3">
                                        <a href="">
                                            <span class="badge rounded-pill text-bg-light">Progamming & Coding</span>
                                        </a>
                                    </div>
                                    <div class="row align-item-start justify-content-between">
                                        <div class="col">
                                            <span class="color-gray">
                                                <a href="javascript:;" id="share-discussion"><small>Share</small></a>
                                                <input
                                                    type="text"
                                                    value="{{ url('diskusi/lorem') }}"
                                                    id="current-url"
                                                    class="d-none"
                                                />
                                            </span>
                                        </div>
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a
                                                href=""
                                                class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1"
                                            >
                                                <img src="{{ url('assets/images/avatar-2.png') }}" alt="" />
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="" class="fw-bold d-flex align-item-start text-break mb-1">
                                                        Faza Raditya Hamzah
                                                    </a>
                                                    <span class="color-gray">7 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-5">2 Jawaban</h3>

                        <div class="mb-5">
                            <div class="card card-discussions mb-5">
                                <div class="row align-items-center">
                                    <div
                                        class="col-1 d-inline-flex flex-column justify-content-start align-items-center text-center align-self-start"
                                    >
                                        <a href="">
                                            <img
                                                src="{{ url('assets/images/like.png') }}"
                                                alt="like"
                                                class="like-icon mb-1"
                                            />
                                        </a>
                                        <span class="color-gray mb-1">12</span>
                                    </div>
                                    <div class="col-11">
                                        <p>
                                            lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet
                                            contecsturlorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet
                                            contecstur
                                        </p>
                                        <div class="row align-item-end justify-content-end">
                                            <div class="col-5 col-lg-3 d-flex">
                                                <a
                                                    href=""
                                                    class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1"
                                                >
                                                    <img src="{{ url('assets/images/avatar-2.png') }}" alt="" />
                                                </a>
                                                <div class="fs-12px lh-1">
                                                    <span class="text-primary">
                                                        <a
                                                            href=""
                                                            class="fw-bold d-flex align-item-start text-break mb-1"
                                                        >
                                                            Faza Raditya Hamzah
                                                        </a>
                                                        <span class="color-gray">7 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-discussions mb-5">
                                <div class="row align-items-center">
                                    <div
                                        class="col-1 d-inline-flex flex-column justify-content-start align-items-center text-center align-self-start"
                                    >
                                        <a href="">
                                            <img
                                                src="{{ url('assets/images/like.png') }}"
                                                alt="like"
                                                class="like-icon mb-1"
                                            />
                                        </a>
                                        <span class="color-gray mb-1">12</span>
                                    </div>
                                    <div class="col-11">
                                        <p>
                                            lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet
                                            contecsturlorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet
                                            contecstur
                                        </p>
                                        <div class="row align-item-end justify-content-end">
                                            <div class="col-5 col-lg-3 d-flex">
                                                <a
                                                    href=""
                                                    class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1"
                                                >
                                                    <img src="{{ url('assets/images/avatar-2.png') }}" alt="" />
                                                </a>
                                                <div class="fs-12px lh-1">
                                                    <span class="text-primary">
                                                        <a
                                                            href=""
                                                            class="fw-bold d-flex align-item-start text-break mb-1"
                                                        >
                                                            Faza Raditya Hamzah
                                                        </a>
                                                        <span class="color-gray">7 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fw-bold text-center">
                                Please
                                <a href="" class="text-primary">Log In</a>
                                atau
                                <a href="" class="text-primary">buat akun</a>
                                untuk berpatisipasi dalam disksi ini.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <h3>Semua Kategori</h3>
                            <div class="">
                                <a href="">
                                    <span class="badge rounded-pill text-bg-light">Progamming & Coding</span>
                                    <span class="badge rounded-pill text-bg-light">Mobile Development</span>
                                    <span class="badge rounded-pill text-bg-light">Web Development</span>
                                    <span class="badge rounded-pill text-bg-light">
                                        Data Science & Machine Learning
                                    </span>
                                    <span class="badge rounded-pill text-bg-light">Cloud Computing</span>
                                    <span class="badge rounded-pill text-bg-light">Hardware & Gadgets</span>
                                    <span class="badge rounded-pill text-bg-light">Game Development</span>
                                    <span class="badge rounded-pill text-bg-light">
                                        Artificial Intelligence & Robotics
                                    </span>
                                    <span class="badge rounded-pill text-bg-light">Tech News & Trend</span>
                                    <span class="badge rounded-pill text-bg-light">Project Shwowcase</span>
                                    <span class="badge rounded-pill text-bg-light">Career & Learning Resources</span>
                                </a>
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
            $('#share-discussionf').click(function () {
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
