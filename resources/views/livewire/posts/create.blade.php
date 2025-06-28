<form wire:submit.prevent="save">
    <div>
        <label class="block text-sm font-medium">Title</label>
        <input
            type="text"
            wire:model.defer="title"
            placeholder="Post title"
            class="w-full border rounded p-2"
        />
        @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Body</label>
        <textarea
            wire:model.defer="content"
            rows="4"
            placeholder="Post body"
            class="w-full border rounded p-2"
        ></textarea>
        @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="text-right">
        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
            type="submit"
        >
            Create Post
        </button>
    </div>
</form>
