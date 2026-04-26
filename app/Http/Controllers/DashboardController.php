<?php

namespace App\Http\Controllers;

use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->latest()
            ->get();

        $publishedCount = $articles->where('status', 'published')->count();
        $draftCount = $articles->where('status', 'draft')->count();

        return view('dashboard.index', compact('articles', 'publishedCount', 'draftCount'));
    }
}
