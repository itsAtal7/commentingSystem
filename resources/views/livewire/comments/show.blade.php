<ul class="ml-4 space-y-4">
    @foreach ($comments as $comment)
        <li class="border p-2 rounded">
            @livewire('comments.edit', ['comment' => $comment], key('edit-'.$comment->id))


            @if ($comment->canReply())
                @livewire('comments.create', ['parent' => $comment, 'post' => $comment->post], key('reply-'.$comment->id))
            @endif

            @if ($comment->childrenRecursive->count())
                @include('livewire.partials.comment-children', ['children' => $comment->childrenRecursive])
            @endif
        </li>
    @endforeach
</ul>
