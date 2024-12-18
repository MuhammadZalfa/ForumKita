@extends('layouts.app')

@section('body')
    <section class="bg-grayy pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-item-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">
                            <h2>
                                Diskusi
                                <span class="color-grayy">></span>
                            </h2>
                        </div>
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
                                    <div>
                                        {!! $discussion->content !!}
                                    </div>
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

                                            @if ($discussion->user_id == auth()->id())
                                                <span class="color-gray">
                                                    <a href="{{ route('diskusi.edit', $discussion->slug) }}">
                                                        <small>Edit</small>
                                                    </a>
                                                    <input
                                                        type="text"
                                                        value="{{ route('diskusi.show', $discussion->slug) }}"
                                                        id="current-url"
                                                        class="d-none"
                                                    />
                                                </span>
                                                <span class="color-gray">
                                                    <!-- Link Hapus dengan konfirmasi SweetAlert -->
                                                    <a href="javascript:;" id="delete-discussion">
                                                        <small>Hapus</small>
                                                    </a>
                                                </span>

                                                <form
                                                    id="delete-form"
                                                    action="{{ route('diskusi.destroy', $discussion->slug) }}"
                                                    method="POST"
                                                    style="display: none"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
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

                        @php
                            $answerCount = $discussion->answers->count();
                        @endphp

                        <h3 class="mb-5">{{ $answerCount . '' . Str::plural(' Answers', $answerCount) }}</h3>

                        <div class="mb-5">
                            @forelse ($discussionAnswers as $answer)
                                <div class="card card-discussions mb-5">
                                    <div class="row align-items-center">
                                        <div
                                            class="col-1 d-inline-flex flex-column justify-content-start align-items-center text-center align-self-start"
                                        >
                                            <a
                                                href="javascript:;"
                                                data-id="{{ $answer->id }}"
                                                data-liked="{{ $answer->liked() }}"
                                                class="answer-like"
                                            >
                                                <img
                                                    src="{{ $answer->liked() ? $likedImage : $notLikedImage }}"
                                                    alt="like"
                                                    class="answer-like-icon mb-1"
                                                />
                                            </a>
                                            <span class="asnwer-like-count color-gray mb-1">
                                                {{ $answer->likeCount }}
                                            </span>
                                        </div>
                                        <div class="col-11">
                                            <div>
                                                {!! $answer->answer !!}
                                            </div>
                                            <div class="row align-item-end justify-content-end">
                                                <div class="col">
                                                    @if ($answer->user_id === auth()->id())
                                                        <span class="color-gray me-2">
                                                            <a href="{{ route('answers.edit', $answer->id) }}">
                                                                <span>Edit</span>
                                                            </a>
                                                        </span>
                                                        <span class="color-gray me-2">
                                                            <a
                                                                href="javascript:;"
                                                                data-id="{{ $answer->id }}"
                                                                class="delete-answer"
                                                            >
                                                                <span>Delete</span>
                                                            </a>
                                                        </span>
                                                        <form
                                                            id="delete-answer-form-{{ $answer->id }}"
                                                            action="{{ route('answers.destroy', $answer->id) }}"
                                                            method="POST"
                                                            style="display: none"
                                                        >
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endif
                                                </div>
                                                <div class="col-5 col-lg-3 d-flex">
                                                    <a
                                                        href=""
                                                        class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1"
                                                    >
                                                        <img
                                                            src="{{ filter_var($answer->user->picture, FILTER_VALIDATE_URL) ? $discussion->user->picture : Storage::url($discussion->user->picture) }}"
                                                            alt="{{ $answer->user->username }}"
                                                            class="gambar"
                                                        />
                                                    </a>
                                                    <div class="fs-12px lh-1">
                                                        <span
                                                            class="{{ $answer->user->username === $discussion->user->username ? 'text-primary' : '' }}"
                                                        >
                                                            <a
                                                                href=""
                                                                class="fw-bold d-flex align-item-start text-break mb-1"
                                                            >
                                                                {{ $answer->user->username }}
                                                            </a>
                                                            <span class="color-gray">7 hours ago</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card card-discussions">Currently there is no answer</div>
                            @endforelse

                            {{ $discussionAnswers->links() }}

                            @auth
                                <h3 class="mb-5">Your Answer</h3>

                                <div class="card card-discussions">
                                    <form action="{{ route('answer.store', $discussion->slug) }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="answer">Answer:</label>
                                            <textarea id="answer" name="answer" required></textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            @endauth

                            @guest
                                <div class="fw-bold text-center">
                                    Please
                                    <a href="{{ route('auth.login.login') }}" class="text-primary">Log In</a>
                                    atau
                                    <a href="{{ route('auth.sign-up.sign-up') }}" class="text-primary">buat akun</a>
                                    untuk berpatisipasi dalam disksi ini.
                                </div>
                            @endguest
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <h3>Semua Kategori</h3>
                            <div class="">
                                @foreach ($categories as $category)
                                    <a href="{{ route('diskusi.kategori.show', $category->slug) }}">
                                        <span class="badge rounded-pill text-bg-light">
                                            {{ $category->name }}
                                        </span>
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
                    title: 'Berhas; il!',
                    text: 'Link profil berhasil dicopy ke clipboard!',
                    icon: 'success',
                    confirmButtonText: 'Oke',
                })
            })
        })

        $('#answer').summernote({
            height: 220,
            placeholder: 'Your Solution',
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        })

        $('span.note-icon-caret').remove()
        $('.note-editable').css('background-color', '#ffffff')

        $('#discussion-like').click(function () {
            var $this = $(this) // Ambil elemen yang diklik
            var isLiked = $this.data('liked') // Ambil status liked
            var likeRoute = isLiked
                ? '{{ route('diskusi.unlike', $discussion->slug) }}' // Rute unlike
                : '{{ route('diskusi.like', $discussion->slug) }}' // Rute like

            // Kirim permintaan AJAX
            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            })
                .done(function (res) {
                    if (res.status === 'success') {
                        // Perbarui like count
                        $('#discussion-like-count').text(res.data.likeCount)

                        // Perbarui ikon like
                        if (isLiked) {
                            $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}')
                        } else {
                            $('#discussion-like-icon').attr('src', '{{ $likedImage }}')
                        }

                        // Perbarui data liked
                        $this.data('liked', !isLiked) // Perbaikan di sini
                    } else if (res.status === 'not_logged_in') {
                        // Tampilkan pesan login
                    }
                })
                .fail(function () {
                    // Tampilkan pesan error
                    Swal.fire({
                        icon: 'warning',
                        title: 'Login Diperlukan',
                        text: 'Anda harus login untuk memberikan like.',
                        confirmButtonText: 'Login Sekarang',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('auth.login.login') }}'
                        }
                    })
                })
        })

        $('#delete-discussion').click(function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna memilih untuk menghapus, submit form penghapusan
                    document.getElementById('delete-form').submit()
                }
            })
        })
        // Tambahkan event listener untuk tombol hapus
        $(document).on('click', '.delete-answer', function (e) {
            e.preventDefault() // Mencegah perilaku default dari link
            const id = $(this).data('id') // Ambil ID dari elemen
            const formId = `delete-answer-form-${id}` // Formulir penghapusan yang sesuai

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form penghapusan setelah konfirmasi
                    document.getElementById(formId).submit()
                }
            })
        })

        $(document).on('click', '.answer-like', function () {
            var $this = $(this) // Mengambil elemen yang diklik
            var id = $this.data('id') // Mengambil data-id dari elemen
            var isLiked = $this.data('liked') // Mengambil data-liked dari elemen
            var likeRoute = isLiked
                ? '{{ url('') }}/answers/' + id + '/unlike'
                : '{{ url('') }}/answers/' + id + '/like'

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            })
                .done(function (res) {
                    if (res.status === 'success') {
                        // Update like count dan ikon
                        $this.data('liked', !isLiked)
                        $this
                            .find('.answer-like-icon')
                            .attr('src', isLiked ? '{{ $notLikedImage }}' : '{{ $likedImage }}')
                        $this.siblings('.asnwer-like-count').text(res.data.likeCount) // Perbaikan manipulasi DOM
                    } else if (res.status === 'not_logged_in') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Login Diperlukan',
                            text: 'Anda harus login untuk memberikan like.',
                            confirmButtonText: 'Login Sekarang',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route('auth.login.login') }}'
                            }
                        })
                    }
                })
                .fail(function () {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Login Diperlukan',
                        text: 'Anda harus login untuk memberikan like.',
                        confirmButtonText: 'Login Sekarang',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('auth.login.login') }}'
                        }
                    })
                })
        })
    </script>
@endsection
