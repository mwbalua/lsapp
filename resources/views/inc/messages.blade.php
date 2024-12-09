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
