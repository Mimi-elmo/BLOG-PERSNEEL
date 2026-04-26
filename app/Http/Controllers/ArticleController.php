<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'published')
            ->with('category')
            ->latest('published_at');

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        $articles = $query->paginate(6);
        $categories = Category::all();

        return view('blog.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        if ($article->status !== 'published') {
            abort(404);
        }

        return view('blog.show', compact('article'));
    }

    public static function calculateReadingTime($content): int
    {
        $wordCount = str_word_count(strip_tags($content));

        return (int) ceil($wordCount / 200);
    }
}
