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

        $route = $this->getRouteInfo($categories, $articleId);

        $data = [];
        $article = Article::where('category_id', $articleId)
            ->first();
        if ($article) {
            $data = $article->toArray();
        }

        $type = 'parent';
        $routeTopic = 'solve';
        if (str_replace('solve/', '', $request->path()) == "s{$articleId}.html") {
            $type = 'child';
            $routeTopic = 's';
        }

        $data = [
            'topic' => 'solve',
            'topicName' => '解决方案',
            'categories' => $treeCategories,
            'data' => $data,
            'categoryId' => $articleId,
            'type' => $type,
            'route' => $route,
            'routeTopic' => $routeTopic,
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

        $route = $this->getRouteInfo($categories, $articleId);
        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'product',
            'topicName' => '解决方案',
            'categories' => $treeCategories,
            'data' => $data,
            'type' => $type,
            'categoryId' => $articleId,
            'route' => $route,
        ];

        return view('home/product', $data);
    }


    /*
     * 技术支持
     */
    public function service(Request $request, $articleId = 0) 
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 3);

        $content = '';
        if ($articleId == 0) {
            //TODO 获取当前大类下权重最大的分类id
            $articleId = 5; 
        }

        $route = $this->getRouteInfo($categories, $articleId);
        $article = Article::where('category_id', $articleId)
            ->first();
        $data = [];
        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'service',
            'topicName' => '技术支持',
            'categories' => $treeCategories,
            'data' => $data,
            'categoryId' => $articleId,
            'route' => $route,
        ];

        return view('home/service', $data);
    }

    /*
     * 新闻中心
     */
    public function news(Request $request, $articleId = 0) 
    {

        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 4);

        if ($articleId == 0) {
            //TODO 获取当前大类下权重最大的分类id
            $articleId = 5; 
        }

        $data = [];
         if (str_replace('news/', '', $request->path()) == "detail{$articleId}.html"){
            $type = 'detail';
            $article = Article::where('id', $articleId)
                ->first();
        } else {
            $type = 'news';
            $article = Article::where('category_id', $articleId)
                ->get();
        } 

        if ($article) {
            $data = $article->toArray();
        }

        $route = $this->getRouteInfo($categories, $articleId);

        $data = [
            'topic' => 'news',
            'topicName' => '新闻中心',
            'categories' => $treeCategories,
            'data' => $data,
            'type' => $type,
            'categoryId' => $articleId,
            'route' => $route
        ];

        return view('home/news', $data);
    }

    /*
     * 关于我们
     */
    public function about(Request $request, $articleId = 0) 
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = buildTree($categories, 8);

        $content = '';
        if ($articleId == 0) {
            //TODO 获取当前大类下权重最大的分类id
            $articleId = 5; 
        }

        $article = Article::where('category_id', $articleId)
            ->first();
        $data = [];
        if ($article) {
            $data = $article->toArray();
        }

        $route = $this->getRouteInfo($categories, $articleId);
        $data = [
            'topic' => 'about',
            'topicName' => '关于我们',
            'categories' => $treeCategories,
            'data' => $data,
            'categoryId' => $articleId,
            'route' => $route,
        ];

        return view('home/about', $data);
    }

    private function getRouteInfo($categories, $categoryId)
    {
        $id = $title = '';
        foreach($categories as $category) {
            if ($category['id'] == $categoryId) {
                $id    = $category['id'];
                $title = $category['name'];
            }
        }

        return [
            'id' => $id,
            'title' => $title,
        ];
    }
}


