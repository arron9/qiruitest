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
            <a href="/aboutus/index.html"><div class="title active">
                    <span>公司简介</span>
                </div></a> 
                <a href="/aboutus/business.html"><div class="title ot">
                        <span>核心业务</span>
                    </div></a>
                    <a href="/aboutus/contcat.html"><div class="title ot">
                            <span>联系我们</span>
                        </div></a>
                        <a href="/aboutus/culture.html"><div class="title ot">
                                <span>企业文化</span>
                            </div></a>
                            <a href="/aboutus/e27.html"><div class="title ot ot">
                                    <span>企业风采</span>
                                </div></a>
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
                <div class="profile">
                    <p>盛铂科技（上海）有限公司，成立于2013年3月18日，是注册于上海市漕河泾国家高新技术开发区的<span>高新技术企业</span>，注册资金687万。公司专业从事射频微波测试测量技术的产品及应用研究，是集设备（硬件/软件）开发、生产、系统集成和技术服务于一体的现代高科技产业实体。公司总部坐落于上海漕河泾，并在上海、北京分别设有研发中心，下设上海、北京、西安、成都、南京、香港6个分支机构，员工人数超过40人，大部分员工均来自于业内著名跨国公司和国家研究院所。</p>
                    <img src="../image/about/sample.png" alt="">
                </div>
                <div class="text-content">
                    <p>盛铂科技拥有600多平方米的标准科研、生产、办公用房；拥有比较完整的高端专业测试测量内部实验设备；拥有专业技术对口、研发能力强和实践经验丰富的科研、生产和管理员工队伍，以一批有着丰富实践经验的工程技术人员为核心，为用户提供多种本地化的解决方案和优质的售后服务。公司自组建成立以来，就把自己的经营主要方向定位于射频微波、宽带矢量信号测试技术的开发和服务，并自主研发完成了多种自动测试系统、军用与民用微波收发设备系统，其中多项研究成果填补了国内空白，在国际上也属于领先水平，并打破了国外对中国关键技术的出口禁运限制。</p>
                    <div class="img-box">
                        <div class="img1">
                            <img src="../image/about/img1.png" alt="">
                        </div>
                        <div class="img2">
                            <img src="../image/about/img2.png" alt="">
                        </div>
                        <div class="img3">
                            <img src="../image/about/img3.png" alt="">
                        </div>
                        <div class="img4">
                            <img src="../image/about/img4.png" alt="">
                        </div>
                        <div class="img5">
                            <img src="../image/about/img5.png" alt="">
                        </div>
                        <div class="img6">
                            <img src="../image/about/img6.png" alt="">
                        </div>
                        <div class="app-img">
                            <img src="../image/about/about-img-b.png" alt="">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <p>盛铂科技是通过ISO9001国际质量体系的具有资质认证的高新技术企业，并多次获得上海市科委的创新基金项目支持且已获得两轮国内知名风险投资机构投资，目前已拥有多个发明专利和十几项软著授权。为确保产品技术、质量达标，公司建立有完善、规范的企业科研、生产运行、管理制度。</p>
                    <div class="certificate">
                        <img class="app-one" src="../image/about/imgz-1.png" alt="">
                        <img src="../image/about/imgz-2.png" alt="">
                        <img src="../image/about/imgz-3.png" alt="">
                        <img src="../image/about/imgz-4.png" alt="">
                        <img src="../image/about/imgz-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection
