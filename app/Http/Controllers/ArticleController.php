<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category; 


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }

    public function create()
    {
        return view('article.create');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

        public function index()
{
    $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
    return view('article.index', compact('articles'));
}


public function byCategory(Category $category)
{
    $articles = $category->articles->where('is_accepted', true);
    return view('article.byCategory', compact('articles', 'category'));
}
}