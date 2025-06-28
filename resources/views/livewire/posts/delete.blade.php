<div>
    <button
        wire:click="delete"
        onclick="return confirm('Are you sure you want to delete this post?')"
        class="text-sm text-red-500 hover:underline ml-2"
    >
        Delete Post
    </button>
</div>
