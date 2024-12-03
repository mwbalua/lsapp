@extends('layouts.app')
@section('content')
    <div class="min-h-screen w-full p-6 lg:px-8 flex flex-col justify-center items-center">

        @if (session('success'))
            <div class="p-3 mb-1 border border-green-500 rounded-lg bg-green-500/10 text-green-500 italic w-[520px]">
                {{ session('success') }}
            </div>
        @endif

        <div class="border rounded shadow bg-white text-zinc-900 p-10 space-y-5 w-full sm:w-[520px]">
            <h1 class="text-3xl text-center font-semibold">Sign in with your Account</h1>

            <form action="/login" method="POST" class="space-y-5">
                @csrf
                @method('POST')

                <div>
                    <label for="email" class="block text-sm/6 font-medium">Email</label>
                    <div class="mt-2 flex flex-col gap-1">
                        <input type="email" name="email" id="email"
                            class="px-5 py-3 border border-zinc-300 rounded w-full text-black"
                            placeholder="Enter your email" />
                        @error('email')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm/6 font-medium">Password</label>
                    <div class="mt-2 flex flex-col gap-1">
                        <input type="password" name="password" id="password"
                            class="px-5 py-3 border border-zinc-300 rounded w-full text-black"
                            placeholder="Enter your password" />
                        @error('password')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="border rounded bg-zinc-900 hover:bg-zinc-800 text-white px-5 py-3 font-semibold duration-300 w-full">
                    Sign in
                </button>

                <p class="text-center">
                    Don&apos;t have an account yet? <a href="/register" class="text-blue-600 hover:underline">Sign up</a>
                    here.
                </p>

            </form>
        </div>

    </div>
@endsection
