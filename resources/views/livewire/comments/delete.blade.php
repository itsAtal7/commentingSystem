<div x-data>
    <button
        @click="
            if (confirm('Are you sure you want to delete this comment?')) {
                $wire.confirmDelete()
            }
        "
        class="block px-4 py-2 hover:bg-gray-100 text-left w-full text-red-600">
        Delete
    </button>
</div>
