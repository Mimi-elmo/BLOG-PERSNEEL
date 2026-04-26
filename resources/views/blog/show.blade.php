@extends('layouts.app')

@section('title', $article->title . ' - DevBlog')

@section('content')
<article class="min-h-screen">
    <div class="bg-gradient-to-b from-indigo-50 to-stone-50 pb-12">
        <div class="max-w-3xl mx-auto px-6 pt-12 pb-8">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center text-stone-500 hover:text-indigo-600 mb-8 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to articles
            </a>

            <header class="mb-8">
                <div class="flex items-center gap-3 mb-6">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700">
                        {{ $article->category->name }}
                    </span>
                    <span class="text-stone-500">
                        {{ $article->published_at->format('F d, Y') }}
                    </span>
                    <span class="text-stone-300">•</span>
                    <span class="text-stone-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ App\Http\Controllers\ArticleController::calculateReadingTime($article->content) }} min read
                    </span>
                </div>

                <h1 class="font-display text-4xl md:text-5xl font-bold text-stone-900 leading-tight">
                    {{ $article->title }}
                </h1>
            </header>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-6 pb-16 -mt-4">
        <div class="bg-white rounded-2xl p-8 md:p-12 shadow-xl border border-stone-100">
            <div class="prose prose-stone prose-lg max-w-none prose-headings:font-display prose-headings:font-bold prose-a:text-indigo-600 prose-a:no-underline hover:prose-a:underline">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>

        <div class="mt-10 pt-8 border-t border-stone-200 flex items-center justify-between">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-700 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to all articles
            </a>

            <div class="flex items-center gap-4">
                <span class="text-sm text-stone-500">Share this article:</span>
                <div class="flex items-center gap-2">
                    <button class="p-2 text-stone-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Copy link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</article>
@endSection