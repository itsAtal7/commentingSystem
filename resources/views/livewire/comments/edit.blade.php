<form wire:submit.prevent="update" class="space-y-2">
    <textarea wire:model.defer="content" rows="3" class="w-full border p-2 rounded"></textarea>

    @error('content')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <div class="flex space-x-2">
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Save</button>
        <button type="button" @click="$dispatch('cancel-edit')" class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400">Cancel</button>
    </div>
</form>
