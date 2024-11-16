@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container h-100 pt-5">
            <div class="row justify-content-center h-100">
                <div class="col-12 col-lg-3">
                    <a href="" class="nav-link mb-5 text-center">
                        <img class="h-32px" src="{{ url('assets/images/LogoForumKitaa.png') }}" alt="Logo ForumKita" />
                    </a>
                    <div class="cardd mb-5">
                        <form action="{{ route('auth.login.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror @error('credentials') is-invalid @enderror"
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

                                @error('credentials')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
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
                                    <span
                                        class="input-group-text bg-white border-start-0 pe-auto @error('password') border-danger rounded-end @enderror"
                                    >
                                        <a href="javascript:;" id="password-toggle">
                                            <img
                                                src="{{ url('assets/images/eye-slash.png') }}"
                                                alt="password-toggle"
                                                id="password-toggle-image"
                                            />
                                        </a>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    @error('credentials')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary rounded-2">Log in</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        Don't have an account?
                        <a href="{{ route('sign-up') }}" class="text-underline"><u>Sign Up</u></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        var passwordToggle = document.getElementById('password-toggle')
        var passwordToggleImage = document.getElementById('password-toggle-image')
        passwordToggle.addEventListener('click', function () {
            if (passwordToggleImage.src.includes('eye-slash')) {
                passwordToggleImage.src = '{{ url('assets/images/eye.png') }}'
                document.getElementById('password').setAttribute('type', 'text')
            } else {
                passwordToggleImage.src = '{{ url('assets/images/eye-slash.png') }}'
                document.getElementById('password').setAttribute('type', 'password')
            }
        })
    </script>
@endsection
