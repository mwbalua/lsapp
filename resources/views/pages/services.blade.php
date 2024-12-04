@extends('layouts.app')
@section('content')
    <div class="max-w-screen-md mx-auto p-6 lg:px-8 mt-24 space-y-3">
        <h1 class="text-4xl">{{ $title }}</h1>
        <p class="text-md">This is the Services page</p>

        <p class="text-md">Services offered:</p>

        @if (count($services) > 0)
            <ul class="border divide-y rounded">
                @foreach ($services as $service)
                    <li class="p-3 hover:bg-neutral-200 cursor-pointer">{{ $service }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
