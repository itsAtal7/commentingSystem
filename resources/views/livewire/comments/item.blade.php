<li wire:key="comment-{{ $comment->id }}"
    x-data="{ menu: false, editing: false, deleting: false }"
    x-init="
    window.addEventListener('comment-updated', e => {
        if(e.detail.id == '{{ $comment->id }}') editing = false;
    });
    window.addEventListener('cancel-edit', () => editing = false);
"
    @cancel-delete.window="deleting = false"
    x-cloak
    class="relative border p-2 rounded bg-white"
>
    <div class="flex justify-between items-start gap-2">
        <div class="flex-1">
            <template x-if="!editing && !deleting">
                <div>{{ $comment->content }}</div>
            </template>

            <template x-if="editing">
                <div class="mt-2">
                    <livewire:comments.edit :comment="$comment" :key="'edit-' . $comment->id" />
                </div>
            </template>

            <template x-if="deleting">
                <div class="mt-2">
                    <livewire:comments.delete :comment="$comment" :key="'delete-' . $comment->id" />
                </div>
            </template>
        </div>

        <div class="relative shrink-0">
            <button @click="menu = !menu" class="text-gray-500 px-2">⋮</button>
            <div x-show="menu" @click.away="menu = false"
                class="absolute right-0 mt-2 w-28 bg-white border rounded shadow z-10">
                <button @click="editing = true; menu = false"
                    class="block w-full text-left px-3 py-1 hover:bg-gray-100">Edit</button>
                <button @click="deleting = true; menu = false"
                    class="block w-full text-left px-3 py-1 text-red-600 hover:bg-red-100">Delete</button>
            </div>
        </div>
    </div>

    @if ($comment->canReply())
        <div class="mt-2">
            <livewire:comments.create :parent="$comment" :post="$comment->post" :key="'reply-' . $comment->id" />
        </div>
    @endif

    @if ($comment->childrenRecursive->count())
        <ul class="ml-4 space-y-4">
            @foreach ($comment->childrenRecursive as $child)
                <livewire:comments.item :comment="$child" :key="'comment-'.$child->id" />
            @endforeach
        </ul>
    @endif
</li>
