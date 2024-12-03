@extends('layouts.app')
@section('content')
    <div class="max-w-screen-md mx-auto p-6 lg:px-8 mt-28 space-y-3">
        <h1 class="text-4xl">Edit Post: {{ $post->title }}</h1>

        <form class="space-y-3" action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="title" class="block text-sm/6 font-medium">Title</label>
                <div class="mt-2 flex flex-col gap-1">
                    <input type="text" name="title" id="title"
                        class="px-5 py-3 border border-zinc-300 rounded w-full text-black" value="{{ $post->title }}" />
                    @error('title')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                <label for="basic-example" class="block text-sm/6 font-medium">Body</label>
                <div class="mt-2 flex flex-col gap-1 w-full rounded text-black">
                    <textarea name="body" id="basic-example">{{ $post->body }}</textarea>
                    @error('body')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="pt-3 flex justify-between">

                <a href="/posts/{{ $post->id }}"
                    class="block bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2">Cancel</a>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 duration-300 text-white font-semibold">Save</button>
            </div>

        </form>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea#description',
                menubar: false,
                plugins: 'code table lists image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
            });
        </script>
    @endpush
@endsection
