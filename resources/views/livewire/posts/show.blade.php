<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold flex items-center space-x-2">
            <span>{{ $post->title }}</span>

            @livewire('posts.delete', ['post' => $post], key('post-delete-'.$post->id))
        </h1>

        <a href="{{ route('home') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            ← Go to Homepage
        </a>
    </div>

    <p class="mb-6">{{ $post->content }}</p>

    @livewire('comments.create', ['post' => $post])

    <hr class="my-6">

    @livewire('comments.show', ['post' => $post])
</div>
