<form action="{{ route('user.photo.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="photo">Upload your photo</label>
    <div class="flex gap-2">
        <input type="file" name="user_photo" id="">
        <button type="submit">Upload</button>
    </div>
</form>
