<x-main-layout>
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
</x-main-layout>
