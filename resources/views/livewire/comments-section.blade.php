<ul class="ml-4 space-y-4">
    @foreach ($comments as $comment)
        <li class="border p-2 rounded">
            <div>{{ $comment->content }}</div>

            @if ($comment->canReply())
                @livewire('comment-form', ['parent' => $comment, 'post' => $comment->post], key('reply-'.$comment->id))
            @endif

            {{-- Recursive Blade partial --}}
            @if ($comment->childrenRecursive->count())
                @include('livewire.partials.comment-children', ['children' => $comment->childrenRecursive])
            @endif
        </li>
    @endforeach
</ul>
