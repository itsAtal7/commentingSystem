
<form wire:submit.prevent="save" class="space-y-4">
    <div>
        <label class="block text-sm font-medium">Title</label>
        <input wire:model.defer="title" type="text" class="w-full border p-2 rounded" />
        @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Body</label>
        <textarea wire:model.defer="content" rows="4" class="w-full border p-2 rounded"></textarea>
        @error('content') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Update Post
    </button>
</form>


