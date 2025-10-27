<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="text-center mt-4 text-gray-200">
            {{ session('success') }}
        </div>
    @endif

    {{-- Create new post button --}}
    <div class="w-full py-6 text-center">
        <a href="{{ route('posts.create') }}"
           class="px-8 py-3 text-lg font-bold rounded-md bg-green-500 text-white hover:bg-green-600 transition">
            Create New Post
        </a>
    </div>

    <main class="flex-1 p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-200">
        {{-- Newest posts first --}}
        @foreach($posts->sortByDesc('created_at') as $post)
            @csrf

            <div class="rounded-lg border border-gray-400 flex flex-col h-[32rem] overflow-hidden bg-gray-800">

                {{-- Sticky image at top --}}
                <div class="sticky top-0 z-10">
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-48 object-cover rounded-t-md">
                </div>

                {{-- Scrollable post content --}}
                <div class="flex-1 p-4 overflow-auto scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-gray-700 whitespace-pre-line">
                    <h2 class="text-lg font-semibold mb-2">{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                </div>

                {{-- Sticky buttons at bottom --}}
                <div class="flex justify-between items-center p-4 bg-gray-900 sticky bottom-0 z-10">
                    <a href="{{ route('posts.edit', $post->id) }}"
                       class="px-3 py-1 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                        Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('delete')
                        <button class="px-3 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </main>
</x-app-layout>
