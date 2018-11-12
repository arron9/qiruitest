@extends('layouts.layout')
@section('content')
    <div class="banner">
        <img src="../image/new/banner.jpg" alt="">
    </div>
    <div class="banner-bg"></div>
    <div class="content">
        <div class="navigation line40 bg">
                @foreach($categories as $category)
                    <a href="/news/news{{$category['id']}}.html" data-id="{{$category['id']}}">
                        <div class="title">
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
                <a href="/news/news8.html" class="type" data-id="8">新闻中心</a>
            </p>
            @if($type == 'news')
            <ul class="list-data enterprise">
                        @foreach($data as $item)
                    <li>
                        <div class="img">
                            <img src="{{$item['cover']}}" alt="">
                        </div>
                        <div class="text">
                            <a class="h3" href="/news/detail{{$item['id']}}.html">{{$item['title']}}</a>
                            <div class="line"></div>
                            <p>{{$item['desc']}}</p>
                        </div>
                        <p class="month">09-28</p>
                        <img class="cur" src="../image/about/year-line1.png" alt="">
                        <img class="year-line" src="../image/about/year-line.png" alt="">
                        <p class="year">2017</p>
                    </li>
                        @endforeach
            </ul>
            <ul class="num-list">
                
<div id="paging1_plHave" class="pagectrl">
	
    <!--頁碼-->
     
    
    <li class="active"><a href="news-8-1.html" class="cur">1</a></li> <li><a href="news-8-2.html">2</a></li> <li><a href="news-8-3.html">3</a></li> <li><a href="news-8-4.html">4</a></li> <li><a href="news-8-5.html">5</a></li> 
    
    <li><a href="news-8-2.html">></a></li> 
    <!--頁碼-->

</div>
                <div class="clear"></div>
            </ul>
            @else 
                <div class="detailed-content">
                <div class="detailed-title">
                    <a class="return" href="javascript:history.back(-1);">
                        <img src="../image/about/icon2.png" alt="">
                        返回
                    </a>
                    {{$data['title']}}
                </div>

                <p class="time">2017-09-28</p>
                <p></p>
                <?php
                    if (!empty($data)) {
                        echo html_entity_decode($data['content'], 1);
                    }
                ?>
                <div class="page">
                    <a class="prev" href="/news/s-0-8.html">上一篇：</a>
                    <a class="next active" href="/news/s-1021-8.html">下一篇：Boonton峰值功率计使用统计方法测量似噪声信号</a>
                </div>
            </div>
                @endif
        </div>
        <div class="clear"></div>
    </div>
</form>

@endsection
@section('javascript')
<script type="text/javascript">
    $(function () {
        var type = $(".type").attr('data-id');
        $(".title").each(function () {
            var typeid = $(this).parent().attr('data-id');
            if (typeid == type) {
                $(this).addClass('active');
                $(this).parent().siblings().children('div').removerClass('active');
            }
        });
    });
</script>
@endsection
