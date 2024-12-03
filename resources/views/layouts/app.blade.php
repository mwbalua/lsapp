<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--  TailwindCSS  --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{--  CKEditor  --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.0.0/ckeditor5.css" />
    <style>
        /* This selector targets the editable element (excluding comments). */
        .ck-editor__editable_inline:not(.ck-comment__input *) {
            height: 300px;
            overflow-y: auto;
        }
    </style>

    <title>{{ config('app.name', 'LSAPP') }}</title>
</head>

<body class="h-full bg-neutral-100 text-black">

    @include('inc.navbar')

    @yield('content')

    <script>
        function closeModal() {
            const modal = document.querySelector('#navbar-modal')
            modal.style.display = 'none'
        }

        function openModal() {
            const modal = document.querySelector('#navbar-modal')
            modal.style.display = 'block'
        }

        function toggleOptionDropdown() {
            const dropdown = document.getElementById('option-dropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/44.0.0/ckeditor5.umd.js"></script>

    <script>
        const ckeditorkey = "{{ config('app.ckeditor_key') }}"
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } = CKEDITOR;

        ClassicEditor
            .create(document.querySelector('#editor'), {
                licenseKey: ckeditorkey,
                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
</body>

</html>
