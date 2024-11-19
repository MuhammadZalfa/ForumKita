@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container">
            <div class="row pt-5 justify-content-center">
                <div class="col-12 col-lg-6 my-auto mb-5 mb-lg-auto me-0">
                    <div class="d-none d-lg-block">
                        <h2>Ayo Join ForumKita</h2>
                        <p>
                            <ul>
                                <li>Stuck di error? diskusikan di ForumKita</li>
                                <li>Dapatkan Jawab dari developer yang berpengalaman dari seluruh dunia</li>
                                <li>Berkontribusi dengan menjawab pertanyaan</li>
                            </ul>
                        </p>
                    </div>
                    <div class="d-block d-lg-none fs-4 text-center">
                        Buat akunmu dalan semenit, dan dapatkan banyak manfaat secara gratis.
                    </div>
                </div>
                <div class="col-12 col-lg-3 h-100">
                    <a href="" class="nav-link mb-5 text-center">
                        <img src="{{ url('assets/images/ForumKita.png') }}" alt="" class="h-32px">
                    </a>
                    <div class="cardd mb-5">
                        <form action="{{ route('auth.sign-up.sign-up') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="name@example.com"
                                autocomplete="off"
                                autofocus
                                value="{{ old('email') }}"
                            />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                />
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control border-end-0 pe-0 rounded-0 rounded-start @error('password') is-invalid @enderror"
                                        aria-describedby="basic-addon2"
                                        id="password"
                                        name="password"
                                    />
                                    <span class="input-group-text bg-white border-start-0 pe-auto">
                                        <a href="javascript:;" id="password-toggle">
                                            <img src="{{ url('assets/images/eye-slash.png') }}" alt="password-toggle" id="password-toggle-image">
                                        </a>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary rounded-2">Sign Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        Already have an account? <a href="{{ route('auth.login.login') }}"><u>Log In</u></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        var passwordToggle = document.getElementById('password-toggle');
        var passwordToggleImage = document.getElementById('password-toggle-image');
        passwordToggle.addEventListener('click', function() {
            if (passwordToggleImage.src.includes('eye-slash')) {
                passwordToggleImage.src = "{{ url('assets/images/eye.png') }}";
                document.getElementById('password').setAttribute('type', 'text');
            } else {
                passwordToggleImage.src = "{{ url('assets/images/eye-slash.png') }}";
                document.getElementById('password').setAttribute('type', 'password');
            }
        });
    </script>
@endsection