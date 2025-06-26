<form wire:submit.prevent="save" class="mt-2 space-y-2">
    <textarea wire:model.defer="content" rows="2" class="w-full border p-2 rounded" placeholder="Add a comment..."></textarea>
    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Post</button>
</form>
