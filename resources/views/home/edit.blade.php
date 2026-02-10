<x-main-layout>
    @if (session('success'))
        <p class="bg-green-200 px-4 py-2 text-red-800 font-bold text-2xl text-center">{{ session('success') }}</p>
    @endif

    <div class="flex justify-center items-center h-screen">
        <form class="bg-yellow-300 w-fit rounded-xl shadow-lg shadow-red-500  p-5"
            action="{{ route('home.update', $home) }}" method="post">
            @method('PUT')
            @csrf
            <div class="flex flex-col gap-2">
                <input type="text" name="location" value="{{ $home->location }}" placeholder="Location">
                @error('location')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="number" name="price" value="{{ $home->price }}" placeholder="Enter price">
                @error('price')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <select name="type" id="">
                    <option value="">Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" @selected(old('type', $home->type) === $type)>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="tel" name="phone_number" value="{{ $home->phone_number }}"
                    placeholder="Enter your phone number">
                @error('phone_number')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <select name="owner" id="">
                    <option value="">Select an option</option>

                    @foreach ($owner as $item)
                        <option value="{{ $item }} " @selected(old('owner', $home->owner) === $item)>
                            {{ $item }}</option>
                    @endforeach
                </select>
                @error('owner')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="number" name="area" value="{{ $home->area }}" placeholder="Enter an area size"
                    id="">
                @error('area')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror

                <textarea name="description" id="" cols="30" rows="10">{{ $home->description }}</textarea>
                @error('description')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
</x-main-layout>
