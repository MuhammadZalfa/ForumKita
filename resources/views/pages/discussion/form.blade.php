@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <h2 class="fs-2 fw-bold color-gray mb-0">
                    {{ isset($discussion) ? 'Edit Question' : 'Ask a Question' }}
                </h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5">
                    <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12">
                                <form
                                    action="{{ isset($discussion) ? route('diskusi.update', $discussion->slug) : route('diskusi.store') }}"
                                    method="POST"
                                >
                                    @csrf
                                    @isset($discussion)
                                        @method('PUT')
                                    @endisset

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input
                                            type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            id="title"
                                            name="title"
                                            autofocus
                                            value="{{ $discussion->title ?? old('title') }}"
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
                                                    @if (($discussion->category_slug ?? old('category_slug')) === $category->slug) {{ 'selected' }} @endif
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
{{ $discussion->content ?? old('content') }}</textarea
                                        >
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button class="btn btn-primary me-4" type="submit">Submit</button>
                                        <a href="{{ route('diskusi.index') }}" class="btn btn-secondary">Cancel</a>
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
            $('.note-editable').css('background-color', '#ffffff')
        })
    </script>
@endsection
