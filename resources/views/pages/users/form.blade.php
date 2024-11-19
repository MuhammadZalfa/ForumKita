@extends('layouts.app')

@section('body')
    <section class="bg-grayy pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <form
                        action="{{ route('users.update', $user->username) }}"
                        enctype="multipart/form-data"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column flex-lg-row mb-4">
                            <div class="edit-avatar-wrapper mb-3 mb-md-0 mx-auto mx-md-0">
                                <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink-0 me-4">
                                    <img id="avatar" src="{{ $picture }}" alt="" class="avatar" />
                                </div>
                                <label for="picture" class="btn p-0 edit-avatar-show">
                                    <img src="{{ url('assets/images/edit-circle.png') }}" alt="Edit circle" />
                                </label>
                                <input type="file" class="d-none" id="picture" name="picture" accept="image/*" />
                            </div>
                            <div>
                                @error('picture')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input
                                        type="text"
                                        class="form-control @error('username') is-invalid @enderror"
                                        id="username"
                                        name="username"
                                        value="{{ old('username', $user->username) }}"
                                        autofocus
                                    />
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password"
                                        name="password"
                                    />
                                    <div class="fs-12px color-grayy">
                                        Empty this if you don't want to change your password
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input
                                        type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                    />
                                    <div class="fs-12px color-grayy">
                                        Empty this if you don't want to change your password
                                    </div>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn btn-primary me-4" type="submit">Save</button>
                            <a href="{{ route('users.show', $user->username) }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $('#picture').on('change', function (event) {
            var output = $('#avatar')
            output.attr('src', URL.createObjectURL(event.target.files[0]))
            output.onload = function () {
                URL.revokeObjectURL(output.attr('src'))
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const form = document.querySelector('form[action="{{ route('users.update', $user->username) }}"]')

        form.addEventListener('submit', function (event) {
            event.preventDefault() // Stop form submission

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to update your profile?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit() // Lanjutkan proses submit jika konfirmasi
                }
            })
        })
    </script>
@endsection
