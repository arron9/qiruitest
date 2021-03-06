@extends('layouts.layout')
@section('title', '技术服务')
@section('keywords', '技术服务')
@section('description', '技术服务')
@section('content')
        <div class="banner">
        <img src="/uploads/{{$position->cover}}" alt="">
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
                <img class="icon1" src="../image/icon/home.png" alt="">
                <a href="/">首页</a>
                <img class="icon1" src="../image/icon/next.png" alt="">
                <a href="/service.html">{{$topicName}}</a>
                <img class="icon1" src="../image/icon/next.png" alt="">
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
