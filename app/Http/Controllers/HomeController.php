<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller 
{
    public  function index(Request $request) 
    {
        $pageId = $request->query('pageId', 4);
        $categoryId = $request->query('categoryId', 5);
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, $pageId);

        $article = Article::where('category_id', $categoryId)
            ->first()->toArray();

        return view('home/index', ['categories' => $treeCategories, 'content' => htmlspecialchars_decode($article['content'])]);
    }
}


