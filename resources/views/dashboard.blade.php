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
</x-app-layout>
