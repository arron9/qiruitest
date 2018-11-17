@extends('layouts.layout')
@section('content')
        <div class="banner">
            <img src="../image/product/banner.png" alt="">
        </div>
        <div class="banner-bg"></div>
        <div class="content">
            

<div class="navigation bg">
    <div class="search title">
        <input type="text" id="SearchID" placeholder="搜索...">
        <img class="img" src="../image/product/search.png" alt="" onclick="search()">
    </div>
    @foreach($categories as $category)
        <?php 
            $isActive = false;
            if(isset($category['children'])) {
                $childrenIds = array_column($category['children'], 'id');
                if (in_array($categoryId, $childrenIds)) {
                    $isActive = true;
                }
            }
        ?>
    
                <div class="title {{$category['id'] == $categoryId || $isActive ?'active':''}}">
                <span class="title-link" onclick="location.href='/product/type{{$category['id']}}.html'">{{$category['name']}}</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl00$ProID" id="AsideLeft_rptProduct_ctl00_ProID" value="6" />
                <ul>
                    @isset($category['children'])
                    @foreach($category['children'] as $secondCategory)
                        <li>
                            <a class="{{$secondCategory['id'] == $categoryId?'focus':''}}" style="color: !important" href="/product/product{{$secondCategory['id']}}.html">{{$secondCategory['name']}}</a>
                        </li>
                    @endforeach
                    @endisset
                </ul>
            </div>
            @endforeach
        
</div>
<script type="text/javascript">
    $(function () {
        //回车事件响应
        $("#SearchID").keydown(function (event) {
            if (event.keyCode == "13") {
                event.preventDefault();
                search();
            }
        });
    });
    function search() {
        var ser = $("#SearchID").val();
        if (ser == "") {
            alert("请填写搜索内容！");
            $("#SearchID").focus();
        } else {
            location.href = "/product/search-" + ser + ".html";
        }
    }
</script>

            <div class="product-content">
                <p class="route">
                    <img class="icon1" src="../image/product/icon1.png" alt="">
                    <a href="/">首页</a>
                    <img class="icon1" src="../image/product/icon2.png" alt="">
                    <a href="/product/product153.html">{{$topicName}}</a>
                    <img class="icon1" src="../image/product/icon2.png" alt="">
                    <a href="/product/{{$type}}{{$route->id}}.html" class="text">{{$route->name}}</a>
                </p>
                @if($type == 'type')
                    <?php
                        if (!empty($data)) {
                        echo html_entity_decode($data['content'], 1);
                        }
                    ?>
                @elseif($type == 'product')
                    <ul class="list-data">
                        @foreach($data as $item)
                        <li class="">
                            <div class="img">
                                <img src="{{$item['cover']}}" alt="">
                            </div>
                            <div class="text">
                                <a class="h3" href="/product/detail{{$item['id']}}.html">{{$item['title']}}</a>
                                <div class="line"></div>
                                <p>{{$item['desc']}}</p>
                            </div>
                            <img class="cross" src="../image/date/cross.png" alt="">
                            <img class="cross2" src="../image/date/cross2.png" alt="">
                        </li>
                        @endforeach
                    </ul>
                    <ul class="num-list" style="width: 45px; margin-left: -17.5px;">
                        <div id="paging1_plHave" class="pagectrl">
                            <!--頁碼-->
                            <li><a href="download-10-1.html">&lt;</a></li>
                            <li class="active"><a href="/product/product-116-1.html" class="cur">1</a></li> 
                            <li><a href="download-10-3.html">&gt;</a></li>
                            <!--頁碼-->
                        </div>
                        <div class="clear"></div>
                    </ul>
                @else 
                    <div class="introduce">
                    <div class="introduce-img">
                        <img src="{{$data['cover']}}" alt="">
                    </div>
                    <div class="introduce-text">
                        <h3>{{$data['title']}}</h3>
                        <p>{{$data['desc']}}</p>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-title">
                        <a href="javascript:;" target="_blank" class="active">产品介绍</a>
                        
                        <a href="javascript:;" target="_blank">相关资料</a>
                        
                    </div>
                    <div class="product-text">
                        <?php
                            if (!empty($data)) {
                                echo html_entity_decode($data['content'], 1);
                            }
                        ?>
                    </div>
                    <div class="product-text one">
                        <ul class="download-list">
                            
                                    <li>
                                        <a href="/uploads/20160606/20160606202755266.pdf" target="_blank" class="text">
                                            <div class="mouth">06-06</div>
                                            <img class="slash" src="../image/download/slash.png" alt="">
                                            <div class="year">2016</div>
                                            <p>NIS100系列带限高斯噪声干扰源</p>
                                        </a>
                                        <a href="/uploads/20160606/20160606202755266.pdf" target="_blank" class="download-cur">
                                            <img src="../image/download/img1.png" alt="">
                                        </a>
                                    </li>
                                
                        </ul>
                    </div>
                    <div class="product-text two">
                        <p>视频</p>
                        <video src="" controls=""></video>
                    </div>
                </div>

                @endif
            </div>
            <div class="clear"></div>
        </div>
    @endsection
       

