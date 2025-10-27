<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-gray-500 rounded-2xl mt-10 p-8">
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data" class="flex flex-col space-y-4">
            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ old('title', $post->title) }}"
                placeholder="Title"
                class="w-full p-2 rounded-md"
            >
            @error('title')
            <span>{{ $message }}</span>
            @enderror

            <textarea
                name="body"
                rows="6"
                placeholder="Body"
                class="w-full p-2 rounded-md"
            >{{ old('body', $post->body) }}</textarea>
            @error('body')
            <span>{{ $message }}</span>
            @enderror

            <input
                type="file"
                name="image"
                class="w-full p-2 rounded-md"
            >
            @error('image')
            <span>{{ $message }}</span>
            @enderror

            @if($post->image)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-auto h-128 object-cover rounded-md mt-2">
                </div>
            @endif

            <div class="flex justify-center bg-white p-2 w-auto h-auto rounded-md text-center">
                <button
                    type="submit"
                    class="px-6 py-2 rounded-md"
                >
                    Bewerken
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
