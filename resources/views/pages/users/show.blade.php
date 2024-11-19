@extends('layouts.app')

@section('body')
    <section class="bg-grayy pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="d-flex mb-4">
                        <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink-0 me-4">
                            <img src="{{ $picture }}" alt="" class="avatar" />
                        </div>
                        <div class="">
                            <div class="mb-4">
                                <div class="fs-2 fw-bold mb-1 lh-1 text-break">{{ $user->username }}</div>
                                <div class="color-gray">Member since {{ $user->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <!-- Input URL yang akan dicopy -->
                        <input type="text" id="current-url" value="{{ request()->url() }}" class="d-none" />

                        <!-- Tombol Share -->
                        <a href="javascript:;" id="share-profile" class="btn btn-primary me-4">Share</a>

                        @auth
                            @if ($user->id === auth()->id())
                                <a href="{{ route('users.edit', $user->username) }}">Edit Profile</a>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="mb-5">
                        <h2 class="mb-3">My Discussions</h2>
                        <div>
                            @forelse ($discussions as $discussion)
                                <div class="card card-discussions">
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end"
                                        >
                                            <div class="text-nowrap me-2 me-lg-0">
                                                {{ $discussion->likeCount . ' ' . Str::plural('like', $discussion->likeCount) }}
                                            </div>
                                            <div class="text-nowrap color-gray">
                                                {{
                                                    $discussion->answers->count() .
                                                        ' ' .
                                                        Str::plural('answer', $discussion->answers->count())
                                                }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-10">
                                            <a href="{{ route('diskusi.show', $discussion->slug) }}">
                                                <h3>{{ $discussion->title }}</h3>
                                            </a>
                                            <p>
                                                {!! Str::limit($discussion->content, 90) !!}
                                            </p>
                                            <div class="row">
                                                <div class="col me-1 me-lg-2">
                                                    <a
                                                        href="{{ route('diskusi.kategori.show', $discussion->category->slug) }}"
                                                    >
                                                        <span class="badge rounded-pill text-bg-light">
                                                            {{ $discussion->category->name }}
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-5 col-lg-4">
                                                    <div class="avatar-sm-wrapper d-inline-block">
                                                        <a
                                                            href="{{ route('users.show', $discussion->user->username) }}"
                                                            class="me-1"
                                                        >
                                                            <img
                                                                src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL) ? $discussion->user->picture : Storage::url($discussion->user->picture) }}"
                                                                class="avatar rounded-circle"
                                                                alt="{{ $discussion->user->username }}"
                                                            />
                                                        </a>
                                                    </div>
                                                    <span class="fs-12px">
                                                        <a
                                                            href="{{ route('users.show', $discussion->user->username) }}"
                                                            class="me-1 fw-bold"
                                                        >
                                                            {{ $discussion->user->username }}
                                                        </a>
                                                        <span class="color-gray">
                                                            {{ $discussion->created_at->diffForHumans() }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card card-discussions">Currently there are no discussions</div>
                            @endforelse
                            {{ $discussions->appends(['answers' => $answers->currentPage()])->links() }}
                        </div>
                    </div>
                    <div class="">
                        <h2 class="mb-3">My Answers</h2>
                        <div class="">
                            @forelse ($answers as $answer)
                                <div class="card card-discussions">
                                    <div class="row align-items-center">
                                        <div class="col-2 col-lg-1 text-center">{{ $answer->likeCount }}</div>
                                        <div class="col">
                                            <span>Replied to</span>
                                            <span class="fw-bold text-primary">
                                                <a href="{{ route('diskusi.show', $answer->discussion->slug) }}">
                                                    {{ $answer->discussion->title }}
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card card-discussions">Currently there are no answers yet</div>
                            @endforelse
                            {{ $answers->appends(['discussions' => $discussions->currentPage()])->links() }}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Tampilkan SweetAlert jika ada pesan sukses
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
            })
        @endif
    </script>
@endsection
