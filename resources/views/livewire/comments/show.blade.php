<ul class="ml-4 space-y-4">
    @foreach ($comments as $comment)
        <livewire:comments.item :comment="$comment" :key="'comment-'.$comment->id" />
    @endforeach
</ul>
