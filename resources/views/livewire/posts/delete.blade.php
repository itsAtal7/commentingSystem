<div x-data="{ showModal: false }">
    <button
        @click="showModal = true"
        class="text-sm text-red-500 hover:underline ml-2"
    >
        Delete Post
    </button>

    <div
        x-show="showModal"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div
            x-show="showModal"
            x-transition.scale
            class="bg-white rounded-lg shadow p-6 w-80"
        >
            <h3 class="text-lg font-semibold mb-2">Delete Post</h3>
            <p class="text-gray-700 mb-4 text-sm">Are you sure you want to delete this post? This action cannot be undone.</p>
            <div class="flex justify-end space-x-2">
                <button
                    @click="showModal = false"
                    class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 text-sm"
                >Cancel</button>
                <button
                    @click="$wire.delete(); showModal = false"
                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm"
                >Delete</button>
            </div>
        </div>
    </div>
</div>
