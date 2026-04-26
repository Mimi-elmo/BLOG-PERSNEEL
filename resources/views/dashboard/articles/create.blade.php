@extends('layouts.app')

@section('title', 'Create Article - DevBlog')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-stone-50 to-white">
    <div class="max-w-3xl mx-auto px-6 py-12">
        <div class="mb-8">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-stone-500 hover:text-indigo-600 mb-4 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
            <h1 class="font-display text-4xl font-bold text-stone-900">Create New Article</h1>
            <p class="text-stone-600 mt-1">Write and publish a new article</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-xl border border-stone-100">
            <form method="POST" action="{{ route('articles.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-stone-800 mb-2">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full px-4 py-3 border border-stone-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors bg-stone-50/50"
                        placeholder="Enter article title"
                    >
                    @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-stone-800 mb-2">Category</label>
                        <select
                            name="category_id"
                            id="category_id"
                            required
                            class="w-full px-4 py-3 border border-stone-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors bg-stone-50/50"
                        >
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-stone-800 mb-2">Status</label>
                        <select
                            name="status"
                            id="status"
                            required
                            class="w-full px-4 py-3 border border-stone-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors bg-stone-50/50"
                        >
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-semibold text-stone-800 mb-2">Content</label>
                    <textarea
                        name="content"
                        id="content"
                        rows="18"
                        required
                        class="w-full px-4 py-3 border border-stone-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors bg-stone-50/50 font-mono text-sm"
                        placeholder="Write your article content here..."
                    >{{ old('content') }}</textarea>
                    @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button
                        type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-xl font-medium hover:from-indigo-700 hover:to-indigo-800 transition-all shadow-lg hover:shadow-xl"
                    >
                        Create Article
                    </button>
                    <a href="{{ route('dashboard') }}" class="px-6 py-3 text-stone-600 font-medium hover:text-stone-900 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endSection