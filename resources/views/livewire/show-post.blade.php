<div class="p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
    <p class="mb-6">{{ $post->content }}</p>

    @livewire('comment-form', ['post' => $post])
    <hr class="my-6">
    @livewire('comments-section', ['post' => $post])
</div>
