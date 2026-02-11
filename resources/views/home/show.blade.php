<x-main-layout>
    <a href="{{ route('home.edit', $home) }}">
        <div class="flex mt-20  justify-center">
            <div class="flex gap-20">
                <div>
                    <img src="{{ Storage::url($home->home_image) }}" style="width: 600px;height:600px;object-fit:cover"
                        alt="">
                </div>
                <div class="bg-gray-400 h-fit flex flex-col gap-4 p-5 rounded-xl">
                    <h2 class="text-3xl text-white font-bold">{{ number_format($home->price) }}$</h2>
                    <h3 class="text-3xl text-white font-bold">{{ $home->location }}</h3>

                    <p class="text-3xl text-white font-bold">{{ $home->owner }}</p>
                    <p class="text-2xl text-yellow-600">{{ $home->phone_number }}</p>
                    <div class="flex gap-2">
                        <span class="text-3xl text-white font-bold">{{ $home->type }}</span>
                        <span class="text-3xl text-white font-bold"> {{ $home->area }} m2</span>
                    </div>
                    <div class="mt-20">
                        <p class="text-sm text-red-100 font-bold">{{ $home->created_at->diffForHumans() }}</p>
                        <p class="text-sm text-red-800 font-bold">ID: {{ $home->unique_id }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center text-4xl mt-10">{{ $home->description }}</div>

    </a>
    <div>
        <span class="text-center text-blue-800 text-2xl">comments </span>

        @forelse($home->comments as $comment)
            <div class="mt-2 border p-2">
                {{ $comment->comment }}
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse
    </div>
    <div class="flex justify-center">
        <form action="{{ route('comment.store', $home) }}" class="bg-yellow-100 p-4" method="post">
            @csrf
            <textarea name="comment" id="" cols="30" rows="2">{{ old('comment') }}</textarea>
            @error('comment')
                <p>{{ $message }}</p>
            @enderror
            <button class="bg-green-200 px-4 py-1">Add comment</button>
        </form>
    </div>
</x-main-layout>
