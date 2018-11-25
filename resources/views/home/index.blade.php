@extends('layouts.layout')
@section('content')
    <style>
    .detailHidden {
        display:none
    }
    .detailShow {
        display:block
    }
    </style>
    <div class="index-banner">
        <!--<img src="image/banner.png" alt="">-->
        <div class="swiper-container banner-img">
            <div class="swiper-wrapper">
                @foreach($data['sliders'] as $slider)
                <a class="swiper-slide" href="{{$slider['target_url']}}">
                    <img src="/uploads/{{$slider['cover']}}" alt="">
                </a>
                @endforeach
            </div>
        </div>
        <a href="#" class="left">
            <img src="image/switch-left.png" alt="">
        </a>
        <a href="#" class="right">
            <img src="image/switch-right.png" alt="">
        </a>

        <div class="switch"></div>
    </div>
    <div class="content">
        <ul class="solution">
            <li class="title">
                <img src="image/solution.png" alt="">
            </li>

            @foreach($data['solution'] as $solution) 
            <li class="list" data-id="{{$solution['id']}}">
                <span>
                    <img src="image/icon1.png" alt="">
                </span>
                <a href="javascript:;">
                    <p class="cn">{{$solution['title']}}</p>
                </a>
                <img class="triangle" src="image/triangle.png" alt="">
            </li>
            @endforeach
        </ul>
        <div class="detailed-box">
            @foreach($data['solution'] as $key => $solution)
            <div class="detailed {{$key != 0?'detailHidden':''}}" data-value="{{$solution['id']}}">
                <h1>{{$solution['title']}}</h1>
                <div class="line"></div>
                <p>{{$solution['intro']}}</p>
                <span class="img1">
                    <img src="/uploads/{{$solution['cover']}}" alt="">
                </span>
                <a href="{{$solution['target_url']}}" class="more" target="_blank">MORE</a>
                <div class="text-bg">
                    <img src="image/text1.png" alt="">
                </div>
            </div>
            @endforeach
        </div>
        <div class="clear"></div>
    </div>
    <div class="service">
        <div class="service-title">
            <img class="service-one" src="image/service1.png" alt="">
            <img class="service-two" src="image/service2.png" alt="">
        </div>
        <p class="text">{{$positions['service']['desc']}}</p>
    </div>
    <div class="service-content">
        <div class="half"></div>
        <ul class="service-list">
            @foreach($data['service'] as $key => $service)
            <li>
                <a href="{{$service['target_url']}}" target="_blank" class="">
                    <div class="service-list-img">
                        <img src="/uploads/{{$service['cover']}}" alt="">
                    </div>
                    <p class="transition-one">{{$service['title']}}</p>
                </a>
            </li>
            @endforeach
            <li class="clear"></li>
        </ul>
        <a href="{{$positions['service']['url']}}" target="_blank" class="more">MORE>></a>
    </div>
    <div class="hr">
        <div class="hr-box">
            <div class="hr-title">
                <img src="image/text3.png" alt="">
                <img class="hr-text" src="image/hr.png" alt="">
            </div>
            <div class="hr-app-title">
                <img src="image/hr-text.png" alt="">
            </div>
            <div class="new-title">新闻中心</div>
            <div class="app-news-title">
                <img src="image/news-text.png" alt="Alternate Text" />
            </div>
            <ul class="new">
            @foreach($data['news'] as $key => $new)
                <li>
                    <a href="{{$new['target_url']}}">
                        <div class="img">
                            <img src="/uploads/{{$new['cover']}}"/>
                        </div>
                        <div class="text">
                            <div class="time"><?php echo date('m-d-Y',strtotime($new['updated_at'])); ?></div>
                            <p>{{$new['title']}}</p>
                        </div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
        <div class="person">
            <img src="image/person.png" alt="">
        </div>
    </div>
    <div class="about">
        <div class="en">
            <img src="image/about1.png" alt="">
        </div>
        <!--<div class="cn">关于我们</div>-->
        <?php echo $positions['about']['desc']; ?>
        <a href="{{$positions['about']['url']}}" target="_blank" class="more">MORE>></a>
        <div class="about-img">
            <img src="image/img5.png" alt="">
        </div>
    </div>
    </form>
@endsection

@section('javascript')
    <script type="text/javascript">
$(function () {
    $(".list:first").addClass('active');
    $(".list").click(function () {
        var TypeID = $(this).attr('data-id');
        $(this).addClass('active').siblings().removeClass('active');
        var detail = $(".detailed");
        detail.removeClass("detailHidden");
        detail.removeClass("detailShow");
        detail.each(function(){
            if ($(this).attr('data-value') == TypeID) {
                $(this).addClass("detailShow").siblings().addClass("detailHidden");
            }
        }); 
    });
});
    </script>
@endsection
