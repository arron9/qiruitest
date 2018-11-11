@extends('layouts.layout')
@section('content')
    <div class="banner">
        <img src="../image/solution/banner.png" alt="">
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
                        <img src="../image/product/fold.png" alt="">
                    </span>
                    <a class="type title-link" href="/{{$topic}}/{{$topic}}{{$category['id']}}.html" data-id="{{$category['id']}}">{{$category['name']}}</a>
                    <ul>
                        @isset($category['children'])
                        @foreach($category['children'] as $secondCategory)
                            <li>
                                <a class="info {{$secondCategory['id'] == $categoryId?'focus':''}}" data-id="{{$secondCategory['id']}}" href="/solve/solve{{$secondCategory['id']}}.html">{{$secondCategory['name']}}</a>
                            </li>
                        @endforeach
                    @endisset
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="product-content">
            <p class="route">
                <img class="icon1" src="../image/product/icon1.png" alt="">
                <a href="../index.aspx">首页</a>
                <img class="icon1" src="../image/product/icon2.png" alt="">
                <a href="/solve/solve12.html">解决方案</a>
                <img class="icon1" src="../image/product/icon2.png" alt="">
                <a href="/solve/solve12.html" class="text" data-id="12" id="typeid">射频与微波测试系统</a>
            </p>
            <div class="business-content">
                <?php
                    echo html_entity_decode($content, 1)
                ?>
            </div>
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

