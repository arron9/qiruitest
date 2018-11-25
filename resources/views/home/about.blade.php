@section('title', '关于我们')
@section('Keywords', '关于我们')
@section('description', '关于我们')
@extends('layouts.layout')
@section('content')
    <div class="banner">
        <img src="/uploads/{{$position->cover}}" alt="">
    </div>
    <div class="banner-bg"></div>
    <div class="content">

        <div class="navigation line40 bg">
            @foreach($categories as $category)
                    <a href="/about/about{{$category['id']}}.html" data-id="{{$category['id']}}">
                <div class="title {{$category['id'] == $categoryId?'active':''}}">
                            <span>{{$category['name']}}</span>
                        </div>
                    </a>
                @endforeach
        </div>


        <div class="product-content">
            <p class="route">
            <img class="icon1" src="../image/icon/home.png" alt="">
            <a href="/">首页</a>
            <img class="icon1" src="../image/icon/next.png" alt="">
            <a href="/about.html">{{$topicName}}</a>
            <img class="icon1" src="../image/icon/next.png" alt="">
            <a href="/about/about{{$route->id}}.html" class="text">{{$route->name}}</a>
            </p>
            <div class="about-content">
                <div class="company-profile">
                    <!--<h3>Company profile</h3>-->
                    <div class="title">
                        <img src="../image/about/title.png" alt="">
                    </div>
                    <div class="company-line"></div>
                    <!--<h1>2013</h1>-->
                    <img src="../image/QR_code.jpg" alt="" class="QR_code">
                    <img src="../image/about/year.png" alt="">
                </div>
                <?php
                    if (!empty($data)) {
                        echo html_entity_decode($data['content'], 1);
                    }
                ?>
                
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection
