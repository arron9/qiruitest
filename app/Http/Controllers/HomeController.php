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
    public function sovle(Request $request, $articleId = 0) 
    {
        $data = [];
        return view('home/solve', $data);
    }

    /*
     * 产品展示
     */
    public function product(Request $request, $articleId = 0) 
    {
        $data = [];
        return view('home/product', $data);
    }

    /*
     * 技术支持
     */
    public function service(Request $request, $articleId = 0) 
    {
        $data = [];
        return view('home/service', $data);
    }

    /*
     * 新闻中心
     */
    public function news(Request $request, $articleId = 0) 
    {
        $data = [];
        return view('home/news', $data);
    }

    /*
     * 关于我们
     */
    public function about(Request $request, $articleId = 0) 
    {
        $data = [];
        return view('home/about', $data);
    }
}


