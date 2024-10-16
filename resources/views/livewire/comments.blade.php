<div class="flex-grow">
    @if ($comments->isEmpty())
        <div class="flex items-center justify-center h-full">
            <p class="text-lg font-semibold text-primary">Tidak ada komentar di sini</p>
        </div>
    @else
        <div class="space-y-2">
            @foreach ($comments as $comment)
                <div class="flex items-start p-3 mb-2 bg-gray-300 rounded-lg shadow-sm">
                    <div class="ml-3">
                        <p class="text-primary">
                            <a href="/u/{{ $comment->user->username }}"
                                class="font-semibold hover:underline">{{ $comment->user->username }}</a>
                        </p>
                        <p class="text-gray-700">{{ $comment->comment }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->setTimezone('Asia/Jakarta')->format('d M Y, g:i a') }}</p>
                        @if (Auth::user()->id === $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
