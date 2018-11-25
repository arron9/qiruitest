<?php

namespace App\Http\Controllers;
use App\Models\Position;
use App\Models\Recommend;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller 
{
    private $id;
    private $routeInfo;
    private $treeCategories;
    private $topic;
    private $positionItem;
    private $position;

    public function __construct(Request $request) 
    {
        $this->position = new Position;

        $topic = $request->segment(1);
        if (!$topic) {
            $this->topic = 'index';
        } else {
            $this->topic = str_replace('.html', '', $topic);

            $this->positionItem = $this->position->getPositionByKey($this->topic.'-banner');

            $category       = new Category;
            $parentCategory = $category->getCategoryByKey($this->topic);
            $parentId = $parentCategory->id;

            $secondParam = $request->segment(2);
            if ($secondParam == null) {
                $this->route = $category->getCategoryByPid($parentId);
            } else {
                preg_match("/[a-z]+([0-9]+).html$/", $secondParam, $urlInfo);
                $this->route = $category->getCategoryById($urlInfo[1]);
            } 

            $this->id = $this->route->id;

            $this->treeCategories = $category->getTreeCategoryByPid($parentId);
        }
    }

    /*
     * 首页
     */
    public  function index(Request $request) 
    {
        $topic = 'index';
        $parentPosition = $this->position->getPositionByKey($topic);
        $positionItems = $this->position->getPositionsByPid($parentPosition->id);

        $recommend = new Recommend;
        $recommendItems = $recommend->getRecommendsByPositionIds(array_keys($positionItems));
        $data = [];
        foreach($recommendItems as $recommendItem) {
            $positionId = $recommendItem->position_id;
            $key = $positionItems[$positionId]->key;
            $data[$key][] = $recommendItem;
        }

        $positions = [];
        foreach($positionItems as $positionItem) {
            $positions[$positionItem->key] = $positionItem;
        }

        $data = [
            'topic' => $topic,
            'data' => $data,
            'positions' => $positions,
        ];

        return view('home/index', $data);
    }

    /*
     * 解决方案类型
     */
    public function solve(Request $request, $id = 0) 
    {
        $id = $this->id;
        $data = [];
        $article = Article::where('category_id', $id)
            ->first();

        if ($article) {
            $data = $article->toArray();
        }

        $type = 'parent';
        $routeTopic = 'solve';
        if (str_replace('solve/', '', $request->path()) == "s{$id}.html") {
            $type = 'child';
            $routeTopic = 's';
        }

        $data = [
            'topic' => 'solve',
            'topicName' => '解决方案',
            'categories' => $this->treeCategories,
            'data' => $data,
            'categoryId' => $id,
            'position' => $this->positionItem,
            'type' => $type,
            'route' => $this->route,
            'routeTopic' => $routeTopic,
        ];

        return view('home/solve', $data);
    }

    /*
     * 产品展示
     */
    public function product(Request $request, $id = 0) 
    {
        $id = $this->id;
        $limit = 1;
        $page = $request->input('page', 1);
        if ($page <= 0) {
            $page = 1;
        }

        $data = [];
        $totalCount = 0;
        if (str_replace('product/', '', $request->path()) == "type{$id}.html") {
            $type = 'type';
            $article = Article::where('category_id', $id)
                ->first();
        } else if (str_replace('product/', '', $request->path()) == "detail{$id}.html"){
            $type = 'detail';
            $article = Article::where('id', $id)
                ->first();
        } else {
            $type = 'product';
            $article = Article::where('category_id', $id)
                ->offset(($page - 1) * $limit)
                ->limit($limit)
                ->get();

            $totalCount = Article::where('category_id', $id)
                ->count();
        } 

        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'product',
            'topicName' => '产品展示',
            'categories' => $this->treeCategories,
            'data' => $data,
            'position' => $this->positionItem,
            'type' => $type,
            'categoryId' => $id,
            'route' => $this->route,
            'pages' => $totalCount/$limit,
            'currentpage' => $page,
        ];

        return view('home/product', $data);
    }


    /*
     * 技术支持
     */
    public function service(Request $request, $id = 0) 
    {
        $id = $this->id;

        $article = Article::where('category_id', $id)
            ->first();
        $data = [];
        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'service',
            'topicName' => '技术支持',
            'categories' => $this->treeCategories,
            'data' => $data,
            'categoryId' => $id,
            'position' => $this->positionItem,
            'route' => $this->route,
        ];

        return view('home/service', $data);
    }

    /*
     * 新闻中心
     */
    public function news(Request $request, $id = 0) 
    {
        $id = $this->id;
        $limit = 1;
        $page = $request->input('page', 1);
        if ($page <= 0) {
            $page = 1;
        }

        $data = [];
         if (str_replace('news/', '', $request->path()) == "detail{$id}.html"){
            $type = 'detail';
            $article = Article::where('id', $id)
                ->first();
        } else {
            $type = 'news';
            $article = Article::where('category_id', $id)
                ->offset(($page - 1) * $limit)
                ->limit($limit)
                ->get();

            $totalCount = Article::where('category_id', $id)
                ->count();
        } 

        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'news',
            'topicName' => '新闻中心',
            'categories' => $this->treeCategories,
            'data' => $data,
            'type' => $type,
            'categoryId' => $this->id,
            'position' => $this->positionItem,
            'route' => $this->route,
            'pages' => $totalCount/$limit,
            'currentpage' => $page,
        ];

        return view('home/news', $data);
    }

    /*
     * 关于我们
     */
    public function about(Request $request, $id = 0) 
    {
        $id = $this->id;
        $article = Article::where('category_id', $id)
            ->first();
        $data = [];
        if ($article) {
            $data = $article->toArray();
        }

        $data = [
            'topic' => 'about',
            'topicName' => '关于我们',
            'categories' => $this->treeCategories,
            'data' => $data,
            'categoryId' => $id,
            'position' => $this->positionItem,
            'route' => $this->route,
        ];

        return view('home/about', $data);
    }

}


