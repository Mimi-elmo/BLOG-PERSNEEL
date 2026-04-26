@extends('layouts.app')

@section('title', 'Blog - DevBlog')

@section('content')
<div class="min-h-screen">
    <div class="bg-gradient-to-b from-indigo-50 to-stone-50 pb-16">
        <div class="max-w-6xl mx-auto px-6 pt-16 pb-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 text-sm font-medium rounded-full mb-4">Technical Blog</span>
                <h1 class="font-display text-5xl md:text-6xl font-bold text-stone-900 mb-4 tracking-tight">Latest Articles</h1>
                <p class="text-lg text-stone-600 max-w-2xl mx-auto">Explore in-depth articles on Laravel, PHP, DevOps, and JavaScript development</p>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 -mt-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <aside class="lg:w-72 flex-shrink-0">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-stone-100 sticky top-24">
                    <form method="GET" action="{{ route('blog.index') }}" class="space-y-6">
                        <div>
                            <label for="search" class="block text-sm font-semibold text-stone-800 mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Search
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    name="search"
                                    id="search"
                                    value="{{ request('search') }}"
                                    placeholder="Search articles..."
                                    class="w-full pl-10 pr-4 py-2.5 border border-stone-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm bg-stone-50/50"
                                >
                                <svg class="w-5 h-5 text-stone-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-stone-800 mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Categories
                            </label>
                            <div class="space-y-1.5">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input
                                        type="radio"
                                        name="category"
                                        value=""
                                        {{ !request('category') ? 'checked' : '' }}
                                        class="w-4 h-4 text-indigo-600 border-stone-300 focus:ring-indigo-500"
                                    >
                                    <span class="text-sm text-stone-600 group-hover:text-indigo-600 transition-colors">All Categories</span>
                                </label>
                                @foreach($categories as $category)
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input
                                        type="radio"
                                        name="category"
                                        value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'checked' : '' }}
                                        class="w-4 h-4 text-indigo-600 border-stone-300 focus:ring-indigo-500"
                                    >
                                    <span class="text-sm text-stone-600 group-hover:text-indigo-600 transition-colors">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white py-2.5 px-4 rounded-lg font-medium hover:from-indigo-700 hover:to-indigo-800 transition-all shadow-md hover:shadow-lg">
                            Apply Filters
                        </button>

                        @if(request('category') || request('search'))
                        <a href="{{ route('blog.index') }}" class="block text-center text-sm text-stone-500 hover:text-indigo-600 underline decoration-dashed">
                            Clear filters
                        </a>
                        @endif
                    </form>
                </div>
            </aside>

            <div class="flex-1">
                @if($articles->isEmpty())
                <div class="bg-white rounded-2xl p-12 shadow-sm border border-stone-100 text-center">
                    <div class="w-20 h-20 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-stone-700 mb-2">No articles found</h3>
                    <p class="text-stone-500">Try adjusting your filters or search terms</p>
                </div>
                @else
                <div class="space-y-6">
                    @foreach($articles as $article)
                    <article class="bg-white rounded-2xl p-8 shadow-sm border border-stone-100 hover:shadow-xl hover:border-indigo-100 transition-all duration-300 group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700">
                                {{ $article->category->name }}
                            </span>
                            <span class="text-sm text-stone-500">
                                {{ $article->published_at->format('M d, Y') }}
                            </span>
                            <span class="text-stone-300">•</span>
                            <span class="text-sm text-stone-500 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ App\Http\Controllers\ArticleController::calculateReadingTime($article->content) }} min read
                            </span>
                        </div>

                        <h2 class="font-display text-2xl font-bold text-stone-900 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
                            <a href="{{ route('blog.show', $article) }}" class="block">
                                {{ $article->title }}
                            </a>
                        </h2>

                        <p class="text-stone-600 leading-relaxed mb-5 line-clamp-2">
                            {{ Str::limit(strip_tags($article->content), 180) }}
                        </p>

                        <a href="{{ route('blog.show', $article) }}" class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-700 transition-colors duration-200 group/arrow">
                            Read article
                            <svg class="w-4 h-4 ml-2 transform group-hover/arrow:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </article>
                    @endforeach
                </div>

                @if($articles->hasPages())
                <div class="mt-10">
                    <nav class="flex items-center justify-center gap-2">
                        @if($articles->onFirstPage())
                        <span class="px-4 py-2 text-stone-400 cursor-not-allowed">← Previous</span>
                        @else
                        <a href="{{ $articles->previousPageUrl() }}" class="px-4 py-2 bg-white text-stone-700 rounded-lg border border-stone-200 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition-all">← Previous</a>
                        @endif

                        <span class="px-4 py-2 text-stone-600">Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</span>

                        @if($articles->hasMorePages())
                        <a href="{{ $articles->nextPageUrl() }}" class="px-4 py-2 bg-white text-stone-700 rounded-lg border border-stone-200 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition-all">Next →</a>
                        @else
                        <span class="px-4 py-2 text-stone-400 cursor-not-allowed">Next →</span>
                        @endif
                    </nav>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endSection