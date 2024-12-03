<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--  TailwindCSS  --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{--  CKEditor  --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
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
        function closeDropdown() {
            const dropdownMenu = document.querySelector('#navbar-modal')
            dropdownMenu.style.display = 'none'
        }

        function openDropdown() {
            const dropdownMenu = document.querySelector('#navbar-modal')
            dropdownMenu.style.display = 'block'
        }
    </script>

    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#basic-example'), {
                height: '500px',
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    {{--  <!-- A friendly reminder to run on a server, remove this during the integration. -->  --}}
    <script>
        window.onload = function() {
            if (window.location.protocol === "file:") {
                alert("This sample requires an HTTP server. Please serve this file with a web server.");
            }
        };
    </script>
</body>

</html>