@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-item-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">Ask a Question</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('diskusi.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input
                                            type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            id="title"
                                            name="title"
                                            autofocus
                                            value="{{ old('title') }}"
                                        />
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_slug" class="form-label">Category</label>
                                        <select
                                            class="form-select @error('category_slug') is-invalid @enderror"
                                            name="category_slug"
                                            id="category_slug"
                                        >
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->slug }}"
                                                    @if (old('category_slug') === $category->slug) {{ 'selected' }} @endif
                                                >
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Question</label>
                                        <textarea
                                            class="form-control @error('content') is-invalid @enderror"
                                            id="content"
                                            name="content"
                                        >
{{ old('content') }}</textarea
                                        >
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary me-4" type="submit">Submit</button>
                                        <a href="{{ route('diskusi.index') }}">Cancel</a>
                                    </div>
                                </form>
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
            $('#content').summernote({
                placeholder: 'The details of your problem, What did you try, What you were expecting and so on...',
                tabsize: 2,
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
            })

            // CSS custom buat background jadi putih
            $('.note-editable').css('background-color', '#ffffff')
            $('.note-toolbar').css('background-color', '#ffffff').css('border', '1px solid #ddd')
            $('.note-toolbar button').css('color', '#2e236c')
            $('span.note-icon-caret').css('color', '#2e236c')
        })
    </script>
    <script>
        $(document).ready(function () {
            // SweetAlert on success message
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                });
            @endif
        });
    </script>
@endsection
