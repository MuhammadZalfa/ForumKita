<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/scss/app.scss')
        @vite('resources/js/app.js')

    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container flex justify-content-between">
              <a class="navbar-link" href="{{ route('home') }}">
                <img class="h-32px" src="{{ url('assets/images/ForumKita.png') }}" alt="Forum Logo">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-0 mx-lg-3">
                  <li class="nav-item d-block d-lg-none d-xl-block">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>
                    <a class="nav-link" href="">Diskusi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-nowrap" href="">Tentang Kita</a>
                  </li>
                </ul>
                <form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="" method="GET">
                  <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" id="basic-addon1">
                      <img src="{{ url('assets/images/magnifier.png')}}" alt="search">
                    </span>
                    <input class="form-control border-start-0 ps-0" type="search" placeholder="Search" aria-label="Search  name="" value="">
                  </div>
                </form>
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                  <li class="nav-item my-auto">
                    <a class="nav-link text-nowrap" href="">Log in</a>
                  </li>
                  <li class="nav-item ps-1 pe-0">
                    <a class="btn btn-primary-white" href="">Log in</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <section class="container hero">
            <div class="row align-items-center h-100">
              <div class="col-12 col-lg-6">
                  <h1>The Developer <br> Community Forum</h1>
                  <p>Tempat berkumpulnya para profesional IT untuk berbagi pengetahuan, mendiskusikan teknologi terbaru, dan menyelesaikan tantangan yang dihadapi dalam dunia digital.</p>
                  <a href="" class="btn btn-primary me-2 mb-lg-0"> Sign Up</a>
                  <a href="" class="btn btn-secondary mb-2 mb-lg-0">Join Diskusi</a>
              </div>
              <div class="col-12 col-lg-6 h-315px order-first order-lg-last mb-3 mb-lg-0">
                <img class="hero-image float-lg-end" src="{{ url('assets/images/Hero.png') }}" alt="hero">
              </div>
            </div>
          </section>

          <section class="container min-h-372px">
            <div class="row">
              <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png') }}" alt="discussions">
                <h2>Discussions</h2>
                <p class="fs-3">2343</p>
              </div>
              <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png') }}" alt="answers">
                <h2>Answers</h2>
                <p class="fs-3">3255</p>
              </div>
              <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/users.png') }}" alt="users">
                <h2>Users</h2>
                <p class="fs-3">12312</p>
              </div>
          </section>

          <section class="bg-gray">
            <div class="container py-80px">
              <h2 class="text-center mb-5">Help Others</h2>
              <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                  <div class="card">
                    <a href="#">
                      <h3>Cara menambah validasi custom di Laravel 11?</h3>
                    </a>
                    <div>
                      <p class="mb-5">Saya sedang mengerjakan aplikasi blog di Laravel 8. Ada 4 peran pengguna, di antaranya ...</p>
                      <div class="row">
                        <div class="col me-1 me-lg-2">
                          <a href=""><span class="badge rounded-pill text-bg-light ">Eloquent</span></a>
                        </div>
                        <div class="col-5 col-lg-7">
                          <div class="avatar-sm-wrapper d-inline-block">
                            <a href="" class="me-1">
                              <img src="{{ url('assets/images/avatar.png') }}" class="avatar rounded-circle" alt="">
                            </a>
                          </div>
                          <span class="fs-12px">
                            <a href="" class="me-1 fw-bold">Faza  Radit</a>
                            <span class="color-gray">7 hours ago</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 mb-3">
                  <div class="card">
                    <a href="#">
                      <h3>Cara menambah validasi custom di Laravel 11?</h3>
                    </a>
                    <div>
                      <p class="mb-5">Saya sedang mengerjakan aplikasi blog di Laravel 8. Ada 4 peran pengguna, di antaranya ...</p>
                      <div class="row">
                        <div class="col me-1 me-lg-2">
                          <a href=""><span class="badge rounded-pill text-bg-light ">Eloquent</span></a>
                        </div>
                        <div class="col-5 col-lg-7">
                          <div class="avatar-sm-wrapper d-inline-block">
                            <a href="" class="me-1">
                              <img src="{{ url('assets/images/avatar.png') }}" class="avatar rounded-circle" alt="">
                            </a>
                          </div>
                          <span class="fs-12px">
                            <a href="" class="me-1 fw-bold">Faza  Radit</a>
                            <span class="color-gray">7 hours ago</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 mb-3">
                  <div class="card">
                    <a href="#">
                      <h3>Cara menambah validasi custom di Laravel 11?</h3>
                    </a>
                    <div>
                      <p class="mb-5">Saya sedang mengerjakan aplikasi blog di Laravel 8. Ada 4 peran pengguna, di antaranya ...</p>
                      <div class="row">
                        <div class="col me-1 me-lg-2">
                          <a href=""><span class="badge rounded-pill text-bg-light ">Eloquent</span></a>
                        </div>
                        <div class="col-5 col-lg-7">
                          <div class="avatar-sm-wrapper d-inline-block">
                            <a href="" class="me-1">
                              <img src="{{ url('assets/images/avatar.png') }}" class="avatar rounded-circle" alt="">
                            </a>
                          </div>
                          <span class="fs-12px">
                            <a href="" class="me-1 fw-bold">Faza  Radit</a>
                            <span class="color-gray">7 hours ago</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>
