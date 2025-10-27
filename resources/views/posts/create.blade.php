<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    @csrf

    <div class="max-w-md mx-auto bg-gray-500 rounded-2xl my-10 p-8">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col space-y-4">
            @csrf

            <input
                type="text"
                name="title"
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
            ></textarea>
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

            <div class="flex justify-center bg-white p-2 w-auto h-auto rounded-md text-center">
                <button
                    type="submit"
                    class="px-6 py-2 rounded-md"
                >
                    Aanmaken
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
