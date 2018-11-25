@extends('layouts.layout')
@section('content')
    <div class="banner">
        <img src="/uploads/{{$position->cover}}" alt="">
    </div>
    <div class="banner-bg"></div>
    <div class="content">
        <div class="navigation line40 bg1">
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
                    <span class="right-img">
                        <img src="../image/icon/fold.png" alt="">
                    </span>
                    <a class="type title-link" href="/{{$topic}}/{{$topic}}{{$category['id']}}.html" data-id="{{$category['id']}}">{{$category['name']}}</a>
                    <ul>
                        @isset($category['children'])
                        @foreach($category['children'] as $secondCategory)
                            <li>
                                <a class="info {{$secondCategory['id'] == $categoryId?'focus':''}}" data-id="{{$secondCategory['id']}}" href="/solve/s{{$secondCategory['id']}}.html">{{$secondCategory['name']}}</a>
                            </li>
                        @endforeach
                    @endisset
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="product-content">
            <p class="route">
                <img class="icon1" src="../image/icon/home.png" alt="">
                <a href="/">首页</a>
                <img class="icon1" src="../image/icon/next.png" alt="">
                <a href="/solve.html">{{$topicName}}</a>
                <img class="icon1" src="../image/icon/next.png" alt="">
                <a href="/solve/{{$routeTopic}}{{$route->id}}.html" class="text" data-id="{{$route->id}}" id="typeid">{{$route->name}}</a>
            </p>
            @if($type == 'parent')
                <div class="business-content">
                    <?php
                        echo html_entity_decode($data['content'], 1)
                    ?>
                </div>
            @else 
                <div class="product-box margin-top40">
                <div class="product-title">
                    <a href="javascript:;" class="active">方案介绍</a>
                    <a href="javascript:;">相关产品</a>
                    <a href="javascript:;" class="border-left">相关下载</a>
                </div>
                <div class="product-text">
                    <?php
                        echo html_entity_decode($data['content'], 1)
                    ?>
                </div>
                
                <div class="product-text one">
                    
                            <div class="ProductList">
                                <dl class="clearfix">
                                    <dt><a href="/Product/p-112-110.html">
                                        <img src="/uploads/20140625/20140625132542692.png" alt="" width=""></a> </dt>
                                    <dd>
                                        <strong><a href="/Product/p-112-110.html"> Sample CFC系列定制型各波段上/下变频器</a></strong>
                                        <p>
                                            Sample CFC系列定制型各波段上/下变频器是可根据用户需求进行定制的微波/毫米波设备，内部可配置多路上变频通道、下变频通道和频率合成本振，主要应用于微波/毫米波雷达系统和通信系统等相关领域。更多其他产品内容可…<a href="/Product/p-112-110.html">[详情]</a></p>
                                    </dd>
                                </dl>
                            </div>
                        
                            <div class="ProductList">
                                <dl class="clearfix">
                                    <dt><a href="/Product/p-111-110.html">
                                        <img src="/uploads/20160427/20160427173035291.jpg" alt="" width=""></a> </dt>
                                    <dd>
                                        <strong><a href="/Product/p-111-110.html"> FFC1000系列全频带微波超宽带上下变频器</a></strong>
                                        <p>
                                            Sample FFC1000系列全频带微波宽带变频器基于盛铂科技创新的OBT-HU 一体化仪表平台和成熟微波毫米波上下变频技术，实现宽带上变频功能，仪表化操作界面，便于实验室和外场使用。更多其他产品内容可咨询：400-621-8906…<a href="/Product/p-111-110.html">[详情]</a></p>
                                    </dd>
                                </dl>
                            </div>
                        
                </div>
                <div class="product-text two">
                    <ul class="SolveList clearfix">

                    </ul>
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
        var typeid = $("#typeid").attr('data-id');
        $(".type").each(function () {
            var type = $(this).attr("data-id");
            if (type == typeid) {
                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');
            }
        });
    });
</script>
@endsection

