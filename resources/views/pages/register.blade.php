@extends('layouts.app')
@section('content')
    <div class="mt-5 border rounded shadow bg-white text-zinc-900 p-5 lg:p-10 space-y-5 lg:w-[520px] mx-auto">
        <h1 class="text-3xl text-center font-semibold">Create your Account</h1>

        <form action="/register" method="POST" class="space-y-5">
            @csrf
            @method('POST')

            <div>
                <label for="name" class="block text-sm/6 font-medium">Name</label>
                <div class="mt-2 flex flex-col gap-1">
                    <input type="text" name="name" id="name"
                        class="px-5 py-3 border border-zinc-300 rounded w-full text-black" placeholder="Enter your name" />
                    @error('name')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm/6 font-medium">Email</label>
                <div class="mt-2 flex flex-col gap-1">
                    <input type="email" name="email" id="email"
                        class="px-5 py-3 border border-zinc-300 rounded w-full text-black" placeholder="Enter your email" />
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
                        placeholder="Enter a secure password" />
                    @error('password')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm/6 font-medium">Confirm password</label>
                <div class="mt-2 flex flex-col gap-1">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="px-5 py-3 border border-zinc-300 rounded w-full text-black"
                        placeholder="Enter a secure password" />
                    @error('password_confirmation')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="border rounded bg-zinc-900 hover:bg-zinc-800 text-white px-5 py-3 font-semibold duration-300 w-full">
                Sign up
            </button>

            <p class="text-center">
                Already have an account? <a href="/login" class="text-blue-600 hover:underline">Sign in</a> here.
            </p>
        </form>
    </div>
@endsection
