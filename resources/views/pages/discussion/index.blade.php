@extends('layouts.app')

@section('body')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
            })
        </script>
    @endif

    <section class="bg-grayy pt-4 pb-5">
        <div class="container">
            <div class="mb-4">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h2 class="me-4 mb-0">
                        @if (isset($category))
                            {{ "Search result for '{$category->name}'" }}
                        @elseif (isset($search) && $search !== '')
                            {{ "Search result for \"$search\"" }}
                        @else
                            {{ 'All Discussions' }}
                        @endif
                    </h2>
                    <div class="">
                        {{
                            $discussions->total() .
                                ' ' .
                                Str::plural('discussion', $discussions->total())
                        }}
                    </div>
                </div>
                @auth
                    <a href="{{ route('diskusi.create') }}" class="btn btn-primary">Create Discussion</a>
                @endauth

                @guest
                    <a href="{{ route('auth.login.show') }}" class="btn btn-primary">Log In to Create Discussion</a>
                @endguest
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    @forelse ($discussions as $discussion)
                        <div class="card card-discussions">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end"
                                >
                                    <div class="text-nowrap me-2 me-lg-0">3 suka</div>
                                    <div class="text-nowrap color-gray">9 balasan</div>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <a href="{{ route('diskusi.show', $discussion->slug) }}">
                                        <h3>{{ $discussion->title }}</h3>
                                    </a>
                                    <p>
                                        {!! Str::limit($discussion->content_preview, 90) !!}
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
                                                    href="{{ route('profile', $discussion->user->username) }}"
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
                                                    href="{{ route('profile', $discussion->user->username) }}"
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
                        <div class="card card-dicussions">Currently there is no discussion</div>
                    @endforelse

                    {{ $discussions->links() }}
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
    </section>
@endsection
