<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller 
{
    public  function index(Request $request, $pageId = 4, $categoryId = 5) 
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();
        

        $treeCategories = buildTree($categories, $pageId);

        $article = Article::where('category_id', $categoryId)
            ->first();
        if (!empty($article)) {
            $article = $article->toArray();
        }

        $data = [
            'categories' => $treeCategories,
            'content' => $article['content']??'',
            'pageId' => $pageId,
            'categoryId' => $categoryId,
        ]; 

        return view('home/index', $data);
    }
}


