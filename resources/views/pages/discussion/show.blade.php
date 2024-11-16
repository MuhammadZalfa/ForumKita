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
                    <h2 class="mb-0">{{ $discussion->title }}</h2>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                        <div class="card card-discussions mb-5">
                            <div class="row align-items-center">
                                <div
                                    class="col-1 d-inline-flex flex-column justify-content-start align-items-center text-center align-self-start"
                                >
                                    <a
                                        id="discussion-like"
                                        href="javascript:;"
                                        data-liked="{{ $discussion->liked() }}"
                                    >
                                        <img
                                            src="{{ $discussion->liked() ? $likedImage : $notLikedImage }}"
                                            alt="like"
                                            id="discussion-like-icon"
                                            class="like-icon mb-1"
                                        />
                                    </a>
                                    <span class="color-gray mb-1" id="discussion-like-count">
                                        {{ $discussion->likeCount }}
                                    </span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        {!! $discussion->content !!}
                                    </p>
                                    <div class="mb-3">
                                        <a href="{{ route('diskusi.kategori.show', $discussion->category->slug) }}">
                                            <span class="badge rounded-pill text-bg-light">
                                                {{ $discussion->category->name }}
                                            </span>
                                        </a>
                                    </div>
                                    <div class="row align-item-start justify-content-between">
                                        <div class="col">
                                            <span class="color-gray">
                                                <a href="javascript:;" id="share-discussion"><small>Share</small></a>
                                                <input
                                                    type="text"
                                                    value="{{ route('diskusi.show', $discussion->slug) }}"
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
                                                <img
                                                    src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL) ? $discussion->user->picture : Storage::url($discussion->user->picture) }}"
                                                    alt=""
                                                    class="gambar"
                                                />
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="" class="fw-bold d-flex align-item-start text-break mb-1">
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
                                <a href="{{ route('auth.login.login') }}" class="text-primary">Log In</a>
                                atau
                                <a href="{{ route('auth.sign-up.sign-up') }}" class="text-primary">buat akun</a>
                                untuk berpatisipasi dalam disksi ini.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <h3>Semua Kategori</h3>
                            <div class="">
                                @foreach ($categories as $category)
                                    <a href="{{ route('diskusi.kategori.show', $category->id) }}">
                                        <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                                    </a>
                                @endforeach
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
            $('#share-discussion').click(function () {
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

        $('#discussion-like').click(function () {
            var isLiked = $(this).data('liked')
            var likeRoute = isLiked
                ? '{{ route('diskusi.like.unlike', $discussion->slug) }}'
                : '{{ route('diskusi.like.like', $discussion->slug) }}' // Tambahkan else route

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            })
                .done(function (res) {
                    if (res.status === 'success') {
                        $('#discussion-like-count').text(res.data.likeCount)

                        if (isLiked) {
                            $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}')
                        } else {
                            $('#discussion-like-icon').attr('src', '{{ $likedImage }}')
                        }
                        $('#discussion-like').data('liked', !isLiked) // Tambahkan tanda #
                    }
                })
                .fail(function () {
                    alert('Terjadi kesalahan. Coba lagi nanti.')
                })
        })
    </script>
@endsection
