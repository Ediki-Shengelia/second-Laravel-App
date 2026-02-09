<x-main-layout>
    <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="location" required placeholder="Location">
        <br>
        <input type="number" name="price" required placeholder="Enter price">
        <br>
        <select name="type" id="" required>
            <option value="">Select type</option>
            @foreach ($types as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
        <input type="tel" name="phone_number" required placeholder="Enter your phone number">
        <br>
        <select name="owner" id="" required>
            <option value="">Select an option</option>
            @foreach ($owner as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
        <br>
        <input type="number" name="area" placeholder="Enter an area size" required id="">
        <br>
        <input type="file" name="home_image" id="" required>
        <br>
        <button type="submit">Add</button>
    </form>
</x-main-layout>
