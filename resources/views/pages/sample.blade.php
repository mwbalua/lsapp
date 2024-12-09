@extends('layouts.app')
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-4xl">{{ $title }}</h1>

        @auth
            <a href='/posts/create' class="block p-3 bg-blue-600 hover:bg-blue-700 duration-300 text-white font-semibold">
                New Post
            </a>
        @endauth
    </div>

    {{--  render blog sections  --}}
    @if (count($posts) > 0)
        <div
            class="mx-auto mt-10 pb-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

            @foreach ($posts as $post)
                {{--  @dd($post)  --}}
                <article class="max-w-xl flex flex-col justify-start">
                    <div class="w-full flex justify-between">
                        <div class="flex items-center gap-x-4">
                            <img src="https://picsum.photos/200?random={{ $post['id'] }}" alt="{{ $post['userId'] }}"
                                class="size-10 rounded-full bg-gray-50">
                            <div class="text-sm/6">
                                <p class="font-semibold text-gray-900">
                                    {{ $post['userId'] }}
                                </p>
                                <p class="text-gray-600">Author</p>
                            </div>
                        </div>

                        <a href="/posts/{{ $post['id'] }}" class="hover:underline">View post
                            <span aria-hidden="true">&rarr;</span></a>
                        </a>
                    </div>

                    {{--  <div class="flex items-center gap-x-4 text-xs mt-4">
                            <time datetime="2020-03-16"
                                class="text-gray-500">{{ $post->created_at->setTimezone('Asia/Manila')->format('F j, Y g:i a') }}</time>
                        </div>  --}}

                    <div class="group relative">
                        <a href="/posts/{{ $post['id'] }}">
                            <h3 class="mt-4 text-lg/6 font-semibold text-gray-900 group-hover:text-blue-600 duration-300">
                                {{ $post['title'] }}
                            </h3>

                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">
                                @if (strlen($post['body']) > 300)
                                    {!! substr(strip_tags($post['body']), 0, 300) . '...' !!}
                                @else
                                    {!! $post['body'] !!}
                                @endif

                            </p>
                        </a>
                    </div>

                </article>
            @endforeach
        </div>

        {{--  {{ $posts->links() }}  --}}
    @else
        <h3 class="mt-3 text-lg font-semibold text-gray-900">
            No posts available yet. Please check again later.
        </h3>
    @endif
    </div>
@endsection
