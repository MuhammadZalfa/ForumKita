<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Laravel</title>
<style>
    /* Buat body menjadi kontainer fleksibel vertikal */
    html,
    body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* Kontainer utama di dalam body */
    body > #app,
    body > div {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* Section konten utama yang diperluas */
    section.bg-grayy {
        flex: 1;
    }

    /* Footer di bagian bawah */
    footer {
        margin-top: auto;
    }
</style>
@vite('resources/scss/app.scss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/js/app.js')
