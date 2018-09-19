<?php

namespace App\Http\Controllers;

class HomeController extends Controller 
{
    public  function index() 
    {
        return view('home/index', ['title' => '测试标题']);
    }
}


