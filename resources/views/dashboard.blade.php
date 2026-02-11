<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div>
                        @if (auth()->user()->photo)
                            <div style="display: flex;justify-content:space-between">
                                <img style="width: 100px;height:100px" src="{{ Storage::url(auth()->user()->photo) }}"
                                    alt="">
                                <h2 style="font-size: 30px;color:red;margin-top:20px">{{ auth()->user()->name }}</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('home.index') }}">Home page</a>
    <div>

        @if (auth()->user()->unreadNotifications->count() > 0)
            <h2 class="text-red-500 font-bold text-2xl">you have {{ auth()->user()->unreadNotifications->count() }}
                messages</h2>
            <form action="{{ route('read.all') }}" method="post">
                @csrf
                <button class="bg-yellow-500 px-4 py-1">Read all</button>
            </form>
            @foreach (auth()->user()->unreadNotifications as $item)
                <form action="{{ route('read.one', $item) }}" method="post">
                    @csrf
                    <button class="text-blue-800">{{ $item->data['message'] }}
                        {{ $item->data['unique_id'] ?? '' }}</button>
                </form>
            @endforeach
        @endif



    </div>

    <div class="bg-zinc-500 p-20 ">
        <h2 class="text-red-800 text-2xl font-bold">Old Notifications</h2>
        @forelse (auth()->user()->notifications as $item)
            <p class="text-white">{{ $item->data['message'] }} which have ID: {{ $item->data['unique_id' ] ?? ''}}</p>
        @empty
            <p>There is no messages</p>
        @endforelse
    </div>

</x-app-layout>
