@extends('layouts.layout')
@section('content')
        <div class="banner">
            <img src="../image/technical/banner.png" alt="">
        </div>
        <div class="banner-bg"></div>
        <div class="content">
            <div class="navigation line40 bg1">
                @foreach($categories as $category)
                    <a href="/service/service{{$category['id']}}.html" data-id="{{$category['id']}}">
                        <div class="title {{$category['id'] == $categoryId?'active':''}}">
                            <span>{{$category['name']}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="product-content">
                <p class="route">
                    <img class="icon1" src="../image/product/icon1.png" alt="">
                    <a href="/">首页</a>
                    <img class="icon1" src="../image/product/icon2.png" alt="">
                    <a href="/service.html">{{$topicName}}</a>
                    <img class="icon1" src="../image/product/icon2.png" alt="">
                    <a href="/service/service{{$route['id']}}.html" class="text">{{$route['title']}}</a>
                </p>
                <div class="business-content">
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
