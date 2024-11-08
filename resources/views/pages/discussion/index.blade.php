@extends('layouts.app')

@section('body')
<section class="bg-grayy pt-4 pb-5">
    <div class="container">
        <div class="mb-4">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h2 class="me-4 mb-0">
                    Semua Diskusi
                </h2>
                <div class="">
                    51,000 Diskusi
                </div>
            </div>
            <a href="" class="btn btn-primary">Log in untuk membuat diskusi</a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                <div class="card card-discussions">
                    <div class="row">
                        <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                            <div class="text-nowrap me-2 me-lg-0">
                                3 suka
                            </div>
                            <div class="text-nowrap color-gray">
                                9 balasan
                            </div>
                        </div>
                        <div class="col-12 col-lg-10">
                            <a href="{{ route('detail')}}">
                                <h3>
                                    Cara menambahkan custom validation in laravel 11?
                                </h3>
                            </a>
                            <p>Gwa lagi mengerjakan aplikasi blog di Laravel 11. Ada 4 peran pengguna, di antaranya, "...</p>
                            <div class="row">
                                <div class="col me-1 me-lg-2">
                                    <a href="">
                                        <span class="badge rounded-pill text-bg-light">Programming & Coding</span>
                                    </a>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="" class="me-1">
                                            <img src="{{ url('assets/images/avatar.png') }}" class="avatar rounded-circle" alt="">
                                        </a>
                                    </div>
                                    <span class="fs-12px">
                                        <a href="" class="me-1 fw-bold">
                                            Agung Rahayu
                                        </a>
                                        <span class="color-gray">7 hours ago</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-discussions">
                    <div class="row">
                        <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                            <div class="text-nowrap me-2 me-lg-0">
                                3 suka
                            </div>
                            <div class="text-nowrap color-gray">
                                9 balasan
                            </div>
                        </div>
                        <div class="col-12 col-lg-10">
                            <a href="{{ route('detail')}}">
                                <h3>
                                    Cara menambahkan custom validation in laravel 11?
                                </h3>
                            </a>
                            <p>Gwa lagi mengerjakan aplikasi blog di Laravel 11. Ada 4 peran pengguna, di antaranya, "...</p>
                            <div class="row">
                                <div class="col me-1 me-lg-2">
                                    <a href="">
                                        <span class="badge rounded-pill text-bg-light">Programming & Coding</span>
                                    </a>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="" class="me-1">
                                            <img src="{{ url('assets/images/avatar.png') }}" class="avatar rounded-circle" alt="">
                                        </a>
                                    </div>
                                    <span class="fs-12px">
                                        <a href="" class="me-1 fw-bold">
                                            Agung Rahayu
                                        </a>
                                        <span class="color-gray">7 hours ago</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-discussions">
                    <div class="row">
                        <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                            <div class="text-nowrap me-2 me-lg-0">
                                3 suka
                            </div>
                            <div class="text-nowrap color-gray">
                                9 balasan
                            </div>
                        </div>
                        <div class="col-12 col-lg-10">
                            <a href="{{ route('detail')}}">
                                <h3>
                                    Cara menambahkan custom validation in laravel 11?
                                </h3>
                            </a>
                            <p>Gwa lagi mengerjakan aplikasi blog di Laravel 11. Ada 4 peran pengguna, di antaranya, "...</p>
                            <div class="row">
                                <div class="col me-1 me-lg-2">
                                    <a href="">
                                        <span class="badge rounded-pill text-bg-light">Programming & Coding</span>
                                    </a>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="" class="me-1">
                                            <img src="{{ url('assets/images/avatar.png') }}" class="avatar rounded-circle" alt="">
                                        </a>
                                    </div>
                                    <span class="fs-12px">
                                        <a href="" class="me-1 fw-bold">
                                            Agung Rahayu
                                        </a>
                                        <span class="color-gray">7 hours ago</span>
                                    </span>
                                </div>
                            </div>
                        </div>
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
                            <span class="badge rounded-pill text-bg-light">Data Science & Machine Learning</span>
                            <span class="badge rounded-pill text-bg-light">Cloud Computing</span>
                            <span class="badge rounded-pill text-bg-light">Hardware & Gadgets</span>
                            <span class="badge rounded-pill text-bg-light">Game Development</span>
                            <span class="badge rounded-pill text-bg-light">Artificial Intelligence & Robotics</span>
                            <span class="badge rounded-pill text-bg-light">Tech News & Trend</span>
                            <span class="badge rounded-pill text-bg-light">Project Shwowcase</span>
                            <span class="badge rounded-pill text-bg-light">Career & Learning Resources</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection