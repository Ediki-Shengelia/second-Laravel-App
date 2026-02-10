<x-main-layout>
    <div class=" flex justify-center items-center h-screen">
        <form class="bg-green-500 w-fit rounded-xl shadow-lg shadow-red-500  p-5" action="{{ route('home.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2">
                <input type="text" name="location" value="{{ old('location') }}" required placeholder="Location">
                @error('location')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="number" name="price" value="{{ old('price') }}" required placeholder="Enter price">
                @error('price')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <select name="type" id="" required>
                    <option value="">Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="tel" name="phone_number" value="{{ old('phone_number') }}" required
                    placeholder="Enter your phone number">
                @error('phone_number')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <select name="owner" id="" required>
                    <option value="">Select an option</option>
                    @foreach ($owner as $item)
                        <option value="{{ $item }} " {{ old('owner') === $item ? 'selected' : '' }}>
                            {{ $item }}</option>
                    @endforeach
                </select>
                @error('owner')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="number" name="area" value="{{ old('area') }}" placeholder="Enter an area size"
                    required id="">
                @error('area')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <input type="file" name="home_image" id="" required>
                @error('home_image')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
</x-main-layout>
