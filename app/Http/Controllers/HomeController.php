<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller 
{
    /*
     * 首页
     */
    public  function index(Request $request, $pageId = 4, $categoryId = 5) 
    {
        $data = [];
        return view('home/index', $data);
    }


    /*
     * 解决方案
     */
    public function solve(Request $request, $articleId = 0) 
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 4);

        $content = '';
        if ($articleId == 0) {
            //TODO 获取当前大类下权重最大的分类id
            $articleId = 5; 
        }

        $article = Article::where('category_id', $articleId)
            ->first();
        if ($article) {
            $content = $article->content;
        }

        $data = [
            'topic' => 'solve',
            'categories' => $treeCategories,
            'content' => $content,
            'categoryId' => $articleId,
        ];

        return view('home/solve', $data);
    }

    /*
     * 产品展示
     */
    public function product(Request $request, $articleId = 0) 
    {
        $data = [
            'topic' => 'product'
        ];
        return view('home/product', $data);
    }

    /*
     * 技术支持
     */
    public function service(Request $request, $articleId = 0) 
    {
        $data = [
            'topic' => 'service'
        ];
        return view('home/service', $data);
    }

    /*
     * 新闻中心
     */
    public function news(Request $request, $articleId = 0) 
    {
        $data = [
            'topic' => 'news'
        ];
        return view('home/news', $data);
    }

    /*
     * 关于我们
     */
    public function about(Request $request, $articleId = 0) 
    {
        $data = [
            'topic' => 'about'
        ];
        return view('home/about', $data);
    }
}


