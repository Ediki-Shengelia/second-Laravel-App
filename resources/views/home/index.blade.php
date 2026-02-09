<x-main-layout>
    @if (session('success'))
        <p class="bg-green-200 px-4 py-2 text-red-800 font-bold text-2xl text-center">{{ session('success') }}</p>
    @endif
    <a href="{{ route('home.create') }}">create</a>
    <div class="flex flex-wrap gap-4">
        @forelse ($AllHome as $home)
            <a href="{{ route('home.show', $home) }}">
                <div class=" flex flex-col gap-2  bg-gray-200 p-4 rounded-lg shadow-lg shadow-red-400">
                    <img class="object-fit w-20 h-20" src="{{ Storage::url($home->home_image) }}" alt="">
                    <h2 class="text-2xl">{{ number_format($home->price) }}$</h2>
                    <h3 class="text-2xl">{{ $home->location }}</h3>
                    <p class="text-sm">{{ $home->created_at->diffForHumans() }}</p>
                </div>
            </a>
        @empty
            <p>There is no home yet</p>
        @endforelse
    </div>
</x-main-layout>
