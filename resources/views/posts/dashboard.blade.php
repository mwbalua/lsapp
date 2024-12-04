@extends('layouts.app')
@section('content')
    <div class="max-w-screen-xl mx-auto p-6 lg:px-8 py-24 lg:py-28 space-y-3 text-sm">
        @if (session('success'))
            <div class="p-3 border border-green-500 rounded-lg bg-green-500/10 text-green-500 italic">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-3 border border-red-500 rounded-lg bg-red-500/10 text-red-500 italic">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-between items-center">
            <h1 class="text-4xl">{{ $title }}</h1>

            @auth
                <a href='/posts/create' class="block p-3 bg-blue-600 hover:bg-blue-700 duration-300 text-white font-semibold">
                    New Post
                </a>
            @endauth
        </div>

        @if (count($posts) > 0)
            <div class="py-5">
                <table class="table-auto w-full">
                    <thead class="border-b">
                        <tr>
                            <th class="text-start pb-3 px-5">Title</th>
                            <th class="text-start pb-3">Published</th>
                            <th class="text-end pb-3 px-5">Options</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($posts as $post)
                            <tr class="hover:bg-zinc-200">
                                <td class="font-semibold">
                                    <a href="/posts/{{ $post->id }}"
                                        class="block px-5 py-4 hover:text-blue-600">{{ $post->title }}</a>
                                </td>
                                <td>
                                    {{ $post->created_at->setTimezone('Asia/Manila')->format('F j, Y g:i a') }}
                                </td>
                                <td class="flex justify-end gap-1 py-3 px-5">
                                    <a href='/posts/{{ $post->id }}/edit'
                                        class="block p-3 py-1.5 bg-green-600 hover:bg-green-700 duration-300 text-white font-semibold">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="/posts/{{ $post->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-3 py-1.5 bg-red-600 hover:bg-red-700 duration-300 text-white font-semibold"><i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        @endif
    </div>
@endsection
