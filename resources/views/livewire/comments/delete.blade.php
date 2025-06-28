<div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded mt-2">
    <p>Are you sure you want to delete this comment?</p>

    <div class="mt-2 flex space-x-2">
        <button wire:click="confirmDelete"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
            Yes, Delete
        </button>

        <button @click="$dispatch('cancel-delete')"
                class="text-sm text-gray-600 hover:underline">
            Cancel
        </button>
    </div>
</div>
