<form action="{{ route('like', $home) }}" method="post">
    @csrf
    <button>
        {{ $home->isLikedByUser(auth()->user()) ? '❤️' : '🤍' }}
        {{ $home->likes()->count() }}
    </button>
</form>
