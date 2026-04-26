<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Blog')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config.theme.extend.fontFamily = {
            'display': ['Playfair Display', 'serif'],
            'sans': ['Inter', 'sans-serif'],
        }
    </script>
    <style>
        .prose code {
            background-color: #f5f5f4;
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-size: 0.875em;
        }
        .prose pre {
            background-color: #1c1917;
            color: #e7e5e4;
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1.5rem 0;
        }
        .prose pre code {
            background: none;
            padding: 0;
            color: inherit;
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased min-h-screen flex flex-col">
    <header class="bg-white/80 backdrop-blur-md border-b border-stone-200/50 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6">
            <nav class="flex items-center justify-between h-16">
                <a href="{{ route('blog.index') }}" class="font-display text-2xl font-semibold text-stone-900 hover:text-indigo-600 transition-colors duration-300">
                    Dev<span class="text-indigo-600">Blog</span>
                </a>

                <div class="flex items-center gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-stone-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200">
                            Login
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-stone-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-stone-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    @endguest
                </div>
            </nav>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-stone-900 to-stone-800 text-stone-300 py-12 mt-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="font-display text-2xl font-bold text-white">
                        Dev<span class="text-indigo-400">Blog</span>
                    </div>
                    <div class="w-px h-6 bg-stone-600"></div>
                    <p class="text-sm text-stone-400">Crafted with care for developers</p>
                </div>
                <div class="flex items-center gap-6 text-sm text-stone-400">
                    <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Articles</a>
                    <span class="text-stone-600">|</span>
                    <p>&copy; {{ date('Y') }} DevBlog. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>