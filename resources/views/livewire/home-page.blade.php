
<div x-data="{ showPostModal: false }" class="space-y-6 p-6">

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">All Posts</h1>

        <button @click="showPostModal = true"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Create Post
        </button>
    </div>

    <div x-show="showPostModal"
         x-transition
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">

        <div @click.outside="showPostModal = false"
             class="bg-white w-full max-w-xl p-6 rounded shadow-lg relative">
             
            <h2 class="text-lg font-semibold mb-4">New Post</h2>

            @livewire('post-form', key('post-form'))

            <button @click="showPostModal = false"
                    class="absolute top-2 right-2 text-gray-500 hover:text-black text-2xl leading-none">
                &times;
            </button>
        </div>
    </div>

    @forelse($posts as $post)
        <div class="p-4 border rounded hover:shadow transition bg-white">
            <a href="{{ url('/posts/'.$post->id) }}"
               class="text-lg font-semibold text-blue-600 hover:underline">
                {{ $post->title }}
            </a>
            <p class="text-sm text-gray-600 mt-1">
                {{ \Illuminate\Support\Str::limit($post->body, 100) }}
            </p>
        </div>
    @empty
        <p class="text-gray-500">No posts yet. Be the first to create one!</p>
    @endforelse
</div>
