@extends('layouts.app')

@section('title', 'Login - DevBlog')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <a href="{{ route('blog.index') }}" class="inline-block font-display text-4xl font-bold text-stone-900 hover:text-indigo-600 transition-colors mb-3">
                Dev<span class="text-indigo-600">Blog</span>
            </a>
            <h1 class="font-display text-2xl font-bold text-stone-900 mb-2">Welcome Back</h1>
            <p class="text-stone-600">Sign in to manage your blog</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-xl border border-stone-100">
            <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                @csrf

                @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl text-sm">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">Invalid credentials</span>
                    </div>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div>
                    <label for="email" class="block text-sm font-semibold text-stone-800 mb-2">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 border border-stone-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors bg-stone-50/50"
                        placeholder="you@example.com"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-stone-800 mb-2">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-3 border border-stone-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors bg-stone-50/50"
                        placeholder="Enter your password"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white py-3.5 px-4 rounded-xl font-semibold hover:from-indigo-700 hover:to-indigo-800 transition-all shadow-lg hover:shadow-xl"
                >
                    Sign In
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-stone-100 text-center">
                <p class="text-sm text-stone-500">
                    Demo credentials:
                    <span class="font-semibold text-stone-700">john@example.com</span>
                    <span class="text-stone-400 mx-1">/</span>
                    <span class="font-semibold text-stone-700">password</span>
                </p>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center text-sm text-stone-500 hover:text-indigo-600 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to blog
            </a>
        </div>
    </div>
</div>
@endSection