<div x-data
     x-init="
         window.addEventListener('close-post-modal', () => {
             $dispatch('close-modal'); // optional custom event
             document.querySelector('[x-data]').__x.$data.showPostModal = false;
         });
     "
     class="space-y-4">

    <form wire:submit.prevent="save">
        <div>
            <input type="text" wire:model.defer="title" placeholder="Post title"
                   class="w-full border rounded p-2" />
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <textarea wire:model.defer="content" rows="4" placeholder="Post body"
                      class="w-full border rounded p-2"></textarea>
            @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="text-right">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Create Post
            </button>
        </div>
    </form>
</div>
