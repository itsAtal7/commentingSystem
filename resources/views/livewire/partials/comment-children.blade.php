<ul class="ml-4 space-y-4">
    @foreach ($children as $comment)
        @include('livewire.partials.comment-item', [
            'comment' => $comment,
            'key' => 'comment-' . $comment->id
        ])
    @endforeach
</ul>
