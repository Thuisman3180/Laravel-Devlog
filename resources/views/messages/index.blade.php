<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="text-center mt-4 text-gray-200">
            {{ session('success') }}
        </div>
    @endif
    <main class="flex-1 p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-200">
        {{-- Newest posts first --}}
        @foreach($messages->sortByDesc('created_at') as $message)
            @csrf

            <div class="rounded-lg border border-gray-400 flex flex-col h-[32rem] overflow-hidden bg-gray-800">

                {{-- Scrollable post content --}}
                <div class="flex-1 p-4 overflow-auto scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-gray-700 whitespace-pre-line">
                    <h2 class="text-lg font-semibold mb-2 border-2 rounded-md text-center border-black">{{ $message->name }}</h2>
                    <h3 class="text-lg font-semibold mb-2 border-2 rounded-md text-center border-black">{{ $message->email }}</h3>
                    <p class="border-2 border-black rounded-md flex-1 p-4 overflow-y-auto whitespace-pre-wrap break-words">{{ $message->message }}</p>
                </div>

                {{-- Sticky buttons at bottom --}}
                <div class="flex justify-between items-center p-4 bg-gray-900 sticky bottom-0 z-10">
                    <form action="{{ route('messages.destroy', $message->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
