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
        $data = [
            'topic' => '',
        ];
        return view('home/index', $data);
    }


    /*
     * 解决方案类型
     */
    public function solve(Request $request, $articleId = 0) 
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 2);

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

        $type = 'parent';
        if (str_replace('solve/', '', $request->path()) == "s{$articleId}.html") {
            $type = 'child';
        }

        $data = [
            'topic' => 'solve',
            'categories' => $treeCategories,
            'content' => $content,
            'categoryId' => $articleId,
            'type' => $type,
        ];

        return view('home/solve', $data);
    }

    /*
     * 子解决方案类型
     */
    public function s(Request $request, $articleId = 0) 
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 2);

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
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 1);

        if ($articleId == 0) {
            //TODO 获取当前大类下权重最大的分类id
            $articleId = 5; 
        }

        $data = [];
        if (str_replace('product/', '', $request->path()) == "type{$articleId}.html") {
            $type = 'type';
            $article = Article::where('category_id', $articleId)
                ->first();
        } else if (str_replace('product/', '', $request->path()) == "detail{$articleId}.html"){
            $type = 'detail';
            $article = Article::where('id', $articleId)
                ->first();
        } else {
            $type = 'product';
            $article = Article::where('category_id', $articleId)
                ->get();
        } 

        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'product',
            'categories' => $treeCategories,
            'data' => $data,
            'type' => $type,
            'categoryId' => $articleId,
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


