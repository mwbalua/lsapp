@extends('layouts.app')
@section('content')
    <div class="relative isolate p-6 lg:px-8 pt-14 lg:px-8">
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Welcome to Laravel
                </h1>
                <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">This is the Laravel application
                    from the &apos;Laravel From Scratch&apos; Youtube series</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/posts"
                        class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 duration-300">View
                        Posts</a>

                    @guest
                        <a href="/register"
                            class="text-sm/6 font-semibold text-gray-900 hover:text-blue-600 hover:underline">Create
                            an account <span aria-hidden="true">→</span></a>
                    @endguest

                </div>
            </div>
        </div>
    </div>
@endsection
