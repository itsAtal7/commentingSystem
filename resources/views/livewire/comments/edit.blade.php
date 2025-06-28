<div x-data="{ open: false }" class="relative">
    <div class="flex justify-between items-start">
        <div class="flex-1">
            @if ($editing)
                <textarea wire:model.defer="content" class="w-full border p-2 rounded"></textarea>
                @error('content')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <div class="mt-2 space-x-2">
                    <button wire:click="save" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Save</button>
                    <button wire:click="cancelEditing" class="bg-gray-300 text-black px-2 py-1 rounded hover:bg-gray-400">Cancel</button>
                </div>
            @else
                <div>{{ $comment->content }}</div>
            @endif
        </div>

        <button @click="open = !open" class="ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6-2a2 2 0 100 4 2 2 0 000-4zm6 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </button>

        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-6 w-28 bg-white border rounded shadow z-10">
            <button wire:click="startEditing" class="block px-4 py-2 hover:bg-gray-100 text-left w-full">Edit</button>
        </div>
    </div>
</div>
