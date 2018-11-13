@section('title', '关于我们')
@section('Keywords', '关于我们')
@section('description', '关于我们')
@extends('layouts.layout')
@section('content')
    <div class="banner">
        <img src="../image/about/banner1.png" alt="">
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
            <img class="icon1" src="../image/product/icon1.png" alt="">
            <a href="/index.aspx">首页</a>
            <img class="icon1" src="../image/product/icon2.png" alt="">
            <a href="/aboutus/index.html">关于我们</a>
            <img class="icon1" src="../image/product/icon2.png" alt="">
            <a href="/aboutus/index.html" class="text">公司简介</a>
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
