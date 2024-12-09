@extends('layouts.app')
@section('content')
    <h1 class="text-4xl">{{ $title }}</h1>

    <form class="space-y-3" method="POST" action="/posts" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <label for="title" class="block text-sm/6 font-medium">Title</label>
            <div class="mt-2 flex flex-col gap-1">
                <input type="text" name="title" id="title"
                    class="px-5 py-3 border border-zinc-300 rounded w-full text-black" placeholder="Post title" />
                @error('title')
                    <small class="text-red-500 italic">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div>
            <label for="basic-example" class="block text-sm/6 font-medium">Body</label>
            <div class="mt-2 flex flex-col gap-1 w-full rounded text-black">
                <textarea name="body" id="basic-example"></textarea>
                @error('body')
                    <small class="text-red-500 italic">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div>
            <label for="cover_image" class="block text-sm/6 font-medium">Cover Image</label>
            <input id="cover_image" type="file" name="cover_image"
                class="block w-full border border-zinc-300 rounded text-sm text-black bg-white
                file:mr-4 file:py-3 file:px-5 file:border-0
                file:text-sm file:font-semibold
                file:bg-zinc-200 file:text-black
                hover:file:bg-zinc-100 file:duration-300" />
        </div>

        <div class="pt-3 flex justify-between">
            <a href="/posts" class="block bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2">Cancel</a>

            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 duration-300 text-white font-semibold">Post</button>
        </div>

    </form>
@endsection
