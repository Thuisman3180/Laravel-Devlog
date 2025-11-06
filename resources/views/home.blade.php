<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900">

<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
<div class="bg-gray-900 min-h-screen flex flex-col">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="flex items-center justify-between p-2 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img src="/Images/Copilot_20251015_132248.png" alt="" class="h-16 w-auto" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <div x-data="{ open: false }" class="relative group inline-block">
                    <a
                        @click="open = !open"
                        href="#contact us"
                        class="text-sm/6 font-semibold text-white cursor-pointer"
                    >
                        Contact Us
                    </a>

                    <!-- Animated dropdown -->
                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute min-w-64 left-1/2 -translate-x-1/2 mt-2 bg-gray-800 text-white text-xs p-2 px-3 py-1 rounded-md shadow-lg"
                        x-cloak
                    >
                        <form
                            method="POST"
                            action="{{ route('messages.store') }}"
                            class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-4 text-white"
                        >
                            @csrf

                            <input
                                type="text"
                                name="name"
                                placeholder="Full Name"
                                class="w-full p-2 rounded-md bg-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >

                            <input
                                type="email"
                                name="email"
                                placeholder="Email Address"
                                class="w-full p-2 rounded-md bg-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >

                            <textarea
                                name="message"
                                rows="6"
                                placeholder="Message"
                                class="w-full p-2 rounded-md bg-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            ></textarea>

                            <button
                                type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition"
                            >
                                Submit
                            </button>

                            <!-- Phone number section -->
                            <div class="flex items-center justify-center space-x-2 text-sm text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 3.75c0-1.243 1.007-2.25 2.25-2.25h2.173c.982 0 1.857.63 2.15 1.566l1.23 3.9a2.25 2.25 0 01-.518 2.237l-1.154 1.154a15.971 15.971 0 006.364 6.364l1.154-1.154a2.25 2.25 0 012.237-.518l3.9 1.23a2.25 2.25 0 011.566 2.15V19.5a2.25 2.25 0 01-2.25 2.25H18c-8.837 0-16-7.163-16-16V3.75z" />
                                </svg>
                                <span><span class="font-medium text-white">{{ $phone ?? '67-67676767' }}</span></span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="relative group inline-block">
                    <a href="" class="text-sm font-semibold text-white">Forum</a>
                    <div class="absolute left-1/2 -translate-x-1/2 mt-2 hidden group-hover:block bg-gray-800 text-white text-xs px-3 py-1 rounded-md shadow-lg">
                        Not coming soon
                    </div>
                </div>
                <a href="{{ route('making') }}" class="text-sm/6 font-semibold text-white">The Making Of</a>
                <a href="#" class="text-sm/6 font-semibold text-white">Company</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-6">
                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" class="text-sm/6 font-semibold text-white">
                        Dashboard <span aria-hidden="true">&rarr;</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-white">
                        Log in <span aria-hidden="true">&rarr;</span>
                    </a>
                    <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-white">
                        Register <span aria-hidden="true">&rarr;</span>
                    </a>
                @endif
            </div>

        </nav>
    </header>
    <main class="bg-gray-900">
            <div>

                <img src="Images/background-img.jpg" alt="" class="w-full h-screen object-cover">
                <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-b from-transparent to-gray-900"></div>
            </div>
            <br><br>
            <div>
                <p class="text-gray-200 ml-12 text-3xl">The Path to Power Begins Here</p>
                <div class="border-2 border-gray-600 text-gray-200 mr-12 ml-12 rounded-md mb-12">
                    <p class="font-bold">Arcane Ascension – A Journey Through Magic and Mastery</p>
                    <br><br>
                    Arcane Ascension is a 2D pixel-art action RPG that invites players into a mystical world brimming with danger, magic, and discovery. You take the role of a young wizard who has lost their powers after a cataclysmic event. To restore balance to the world, you must travel through enchanted realms, defeat elemental bosses, and reclaim your arcane abilities one by one.
                    <br><br>
                    Each realm—ranging from the fiery Ember Grove to the shadowy Abyss—is filled with unique enemies, hidden secrets, and powerful relics waiting to be uncovered. Customize your playstyle with a variety of weapons, spells, and abilities, from dashing through lightning storms to unleashing devastating ultimate attacks.
                    <br><br>
                    With its blend of fast-paced platforming, strategic spell combat, and deep progression systems, Arcane Ascension challenges players to rise above the chaos and master the ancient forces of magic. Will you reclaim your power… or be consumed by it?
                </div>
            </div>
            <h1 class="ml-6 text-5xl text-gray-200 w-128">Patch Notes</h1>
            <div class="flex-1 p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-200 border-2 border-gray-600 rounded-md">
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

                    </div>
                @endforeach
            </div>

        <br><br><br>

        </main>

</div>
</body>
</html>
