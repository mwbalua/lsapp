@extends('layouts.app')
@section('content')
    <div class="max-w-screen-md mx-auto p-6 lg:px-8 mt-28 space-y-3">
        <div class="flex justify-between">
            <a href="/posts" class="text-blue-600 hover:underline">Back to Posts</a>

            @auth
                @if (Auth::user()->id == $post->user_id)
                    <div class="flex gap-1">
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="p-3 py-1.5 bg-red-600 hover:bg-red-700 duration-300 text-white font-semibold">Delete
                            </button>
                        </form>

                        <a href='/posts/{{ $post->id }}/edit'
                            class="block p-3 py-1.5 bg-blue-600 hover:bg-blue-700 duration-300 text-white font-semibold">
                            Edit
                        </a>
                    </div>
                @endif
            @endauth

        </div>

        @if (session('success'))
            <div class="p-3 border border-green-500 rounded-lg bg-green-500/10 text-green-500 italic">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center gap-x-4">
            <img src="https://picsum.photos/200?random={{ $post->id }}" alt=""
                class="size-10 rounded-full bg-gray-50">
            <div class="text-sm/6">
                <p class="font-semibold text-gray-900">
                    {{ $post->user->name }}
                </p>
                <p class="text-gray-600">Author</p>
            </div>
        </div>

        <div class="flex items-center gap-x-4 text-xs mt-4">
            <time datetime="2020-03-16"
                class="text-gray-500">{{ $post->created_at->setTimezone('Asia/Manila')->format('F j, Y g:i a') }}</time>
        </div>

        <h3 class="mt-4 text-4xl font-semibold">
            {{ $post['title'] }}
        </h3>

        <p class="mt-5 line-clamp-3 text-sm">
            {!! $post['body'] !!}
        </p>
    </div>
@endsection
