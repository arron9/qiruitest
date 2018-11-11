@extends('layouts.layout')
@section('content')
    <div class="banner">
        <img src="../image/new/banner.jpg" alt="">
    </div>
    <div class="banner-bg"></div>
    <div class="content">
        <div class="navigation line40 bg">
            
                    <a href="/news/news8.html" data-id="8">
                        <div class="title">
                            <span>行业新闻</span>
                        </div>
                    </a>
                    <a href="/news/news9.html" data-id="9">
                        <div class="title">
                            <span>公司新闻</span>
                        </div>
                    </a>
           
        </div>
        <div class="product-content">
            <p class="route">
                <img class="icon1" src="../image/product/icon1.png" alt="">
                <a href="/index.aspx">首页</a>
                <img class="icon1" src="../image/product/icon2.png" alt="">
                <a href="/news/news8.html" class="type" data-id="8">新闻中心</a>
            </p>
            <ul class="list-data enterprise">
                                   
                    <li>
                        <div class="img">
                            <img src="/uploads/20170928/20170928170051884.jpg" alt="">
                        </div>
                        <div class="text">
                            <a class="h3" href="/news/s-1035-8.html">微信换脸盛铂科技助力风云系列卫星</a>
                            <div class="line"></div>
                            <p></p>
                        </div>
                        <p class="month">09-28</p>
                        <img class="cur" src="../image/about/year-line1.png" alt="">
                        <img class="year-line" src="../image/about/year-line.png" alt="">
                        <p class="year">2017</p>
                    </li>
                                   
                    <li>
                        <div class="img">
                            <img src="/uploads/20170512/20170512110517614.jpg" alt="">
                        </div>
                        <div class="text">
                            <a class="h3" href="/news/s-1021-8.html">Boonton峰值功率计使用统计方法测量似噪声信号</a>
                            <div class="line"></div>
                            <p></p>
                        </div>
                        <p class="month">05-12</p>
                        <img class="cur" src="../image/about/year-line1.png" alt="">
                        <img class="year-line" src="../image/about/year-line.png" alt="">
                        <p class="year">2017</p>
                    </li>
                                   
                    <li>
                        <div class="img">
                            <img src="/uploads/20170511/20170511135734302.jpg" alt="">
                        </div>
                        <div class="text">
                            <a class="h3" href="/news/s-1020-8.html">功率因数校正电路环路稳定性新技术</a>
                            <div class="line"></div>
                            <p></p>
                        </div>
                        <p class="month">05-11</p>
                        <img class="cur" src="../image/about/year-line1.png" alt="">
                        <img class="year-line" src="../image/about/year-line.png" alt="">
                        <p class="year">2017</p>
                    </li>
                                   
                    <li>
                        <div class="img">
                            <img src="/uploads/20170511/20170511110351442.jpg" alt="">
                        </div>
                        <div class="text">
                            <a class="h3" href="/news/s-1019-8.html">使用Boonton功率表进行详细的射频脉冲分析</a>
                            <div class="line"></div>
                            <p></p>
                        </div>
                        <p class="month">05-11</p>
                        <img class="cur" src="../image/about/year-line1.png" alt="">
                        <img class="year-line" src="../image/about/year-line.png" alt="">
                        <p class="year">2017</p>
                    </li>
                                   
                    <li>
                        <div class="img">
                            <img src="/uploads/20170510/20170510161513630.jpg" alt="">
                        </div>
                        <div class="text">
                            <a class="h3" href="/news/s-1018-8.html">Boonton脉冲放大器平均功率测试应用</a>
                            <div class="line"></div>
                            <p>Boonton的4500B系列和4540系列功率分析仪，装配有峰值功率传感器，速度非常快，并且能提供足够广的动态范围来测量实际信号和有关真实信号跟踪的精确信息。</p>
                        </div>
                        <p class="month">05-10</p>
                        <img class="cur" src="../image/about/year-line1.png" alt="">
                        <img class="year-line" src="../image/about/year-line.png" alt="">
                        <p class="year">2017</p>
                    </li>
                
                
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
