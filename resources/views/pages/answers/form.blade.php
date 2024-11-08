@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-item-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">Answer a Question</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="answer" class="form-label">Answer</label>
                                        <textarea class="form-control" id="answer" name="answer"></textarea>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary me-4" type="submit">Submit</button>
                                        <a href="">Cancel</a>
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
            $('#answer').summernote({
                placeholder: 'Your Solution',
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
@endsection
