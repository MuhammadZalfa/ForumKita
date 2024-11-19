@extends('layouts.app')

@section('body')

<section class="container hero" id="#about">
  <div class="row align-items-center h-100">
    <div class="col-12 col-lg-6">
        <h1>The Developer <br> Community Forum</h1>
        <p>Tempat berkumpulnya para profesional IT untuk berbagi pengetahuan, mendiskusikan teknologi terbaru, dan menyelesaikan tantangan yang dihadapi dalam dunia digital.</p>
        <a href="{{ route('auth.sign-up.sign-up') }}" class="btn btn-primary me-2 mb-lg-0">Sign Up</a>
        <a href="{{ route('auth.sign-up.sign-up') }}" class="btn btn-secondary mb-2 mb-lg-0">Join Diskusi</a>
    </div>
    <div class="col-12 col-lg-6 h-315px order-first order-lg-last mb-3 mb-lg-0">
      <img class="hero-image float-lg-end img-fluid" src="{{ url('assets/images/Hero.png') }}" alt="hero">
    </div>    
  </div>
</section>

<section class="container min-h-372px">
  <div class="row">
    <div class="col-12 col-lg-4 text-center">
      <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png') }}" alt="discussions">
      <h2>{{ Str::plural('Discussion', $discussionCount) }}</h2>
<p class="fs-3">{{ $discussionCount }}</p>
    </div>
    <div class="col-12 col-lg-4 text-center">
      <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png') }}" alt="answers">
      <h2>{{ Str::plural('Answer', $answerCount) }}</h2>
      <p class="fs-3">{{ $answerCount }}</p>
    </div>
    <div class="col-12 col-lg-4 text-center">
      <img class="promote-icon mb-2" src="{{ url('assets/images/users.png') }}" alt="users">
      <h2>{{ Str::plural('User', $userCount) }}</h2>
      <p class="fs-3">{{ $userCount }}</p>
    </div>
</section>

<section class="bg-red">
  <div class="container py-80px">
    <h2 class="text-center mb-5 text-white">Help Others</h2>
    <div class="row">
      @forelse ($latestDiscussions as $itemLatestDiscussion)
        <div class="col-12 col-lg-4 mb-3">
          <div class="card">
            <a href="{{ route('diskusi.show', $itemLatestDiscussion->slug)}}">
              <h3>{{ $itemLatestDiscussion->title }}</h3>
            </a>
            <div>
              <p class="mb-5">{{ Str::limit($itemLatestDiscussion->content_preview, 35) }}</p>
              <div class="row">
                <div class="col me-1 me-lg-2">
                  <a href="{{ route('diskusi.kategori.show', $itemLatestDiscussion->category->slug) }}">
                    <span class="badge rounded-pill text-bg-light ">{{ $itemLatestDiscussion->category->name }}</span>
                  </a>
                </div>
              </div>
              <!-- Menambahkan username, created_at dan foto profil di bawah kategori -->
              <div class="row mt-3">
                <div class="col-12 d-flex align-items-center">
                  <div class="avatar-sm-wrapper d-inline-block">
                    <a href="" class="me-1">
                      <img src="{{ filter_var($itemLatestDiscussion->user->picture, FILTER_VALIDATE_URL) ? $itemLatestDiscussion->user->picture : Storage::url($itemLatestDiscussion->user->picture) }}" class="avatar rounded-circle" alt="">
                    </a>
                  </div>
                  <span class="fs-12px ms-2">
                    <a href="{{ route('users.show', $itemLatestDiscussion->user->username)}}" class="me-1 fw-bold">{{ $itemLatestDiscussion->user->username }}</a>
                    <span class="color-gray">{{ $itemLatestDiscussion->created_at->diffForHumans() }}</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p>No discussions available.</p>
      @endforelse
    </div>
  </div>
</section>


<section class="container min-h-372px d-flex flex-column align-items-center justify-content-center">
  <h2>Ready to contribute?</h2>
  <p class="mb-4">Want to make a big impact?</p>
  <div class="text-center">
    <a href="{{ route('auth.sign-up.sign-up') }}" class="btn btn-primary me-2 mb-lg-0"> Sign Up</a>
    <a href="{{ route('auth.sign-up.sign-up') }}" class="btn btn-secondary mb-2 mb-lg-0">Join Diskusi</a>
  </div>
</section>

@endsection
