<div x-data="{ showModal: false }">
    <button
        @click="showModal = true"
        class="block px-4 py-2 hover:bg-gray-100 text-left w-full text-red-600"
    >
        Delete
    </button>

    <div
        x-show="showModal"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div
            x-show="showModal"
            x-transition.scale
            class="bg-white rounded-lg shadow p-6 w-80"
        >
            <h3 class="text-lg font-semibold mb-2">Delete Comment</h3>
            <p class="text-gray-700 mb-4">Are you sure you want to delete this comment? This will also delete all its replies.</p>
            <div class="flex justify-end space-x-2">
                <button
                    @click="showModal = false"
                    class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 text-sm"
                >Cancel</button>
                <button
                    @click="$wire.confirmDelete(); showModal = false"
                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm"
                >Delete</button>
            </div>
        </div>
    </div>
</div>
