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
    
            <div class="title active">
                <span class="title-link" onclick="location.href='/product/type6.html'">射频、微波信号产生与分析</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl00$ProID" id="AsideLeft_rptProduct_ctl00_ProID" value="6" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product153.html">信道模拟器</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product110.html">上下变频器</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product116.html">噪声源</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product154.html">射频/微波信号源</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product96.html">相噪/信号源分析仪</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product48.html">射频/微波功率计</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type142.html'">射频、微波模块</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl01$ProID" id="AsideLeft_rptProduct_ctl01_ProID" value="142" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product138.html">低噪放模块</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product139.html">频综模块</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product140.html">数控衰减器</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product143.html">噪声头</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product155.html">功分器</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type3.html'">基带、IF信号采集、产生与分析</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl02$ProID" id="AsideLeft_rptProduct_ctl02_ProID" value="3" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product112.html">高速信号采集</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product109.html">任意波形发生器</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type34.html'">电力电子测试</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl03$ProID" id="AsideLeft_rptProduct_ctl03_ProID" value="34" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product40.html">频率响应分析仪</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product146.html">电源抑制比（PSRR）分析</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product39.html">功率分析仪</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product102.html">绝缘耐压测试仪</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type52.html'">计量与校准</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl04$ProID" id="AsideLeft_rptProduct_ctl04_ProID" value="52" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product53.html">基础电学计量与校准</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type59.html'">半导体测试系统</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl05$ProID" id="AsideLeft_rptProduct_ctl05_ProID" value="59" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product60.html">集成电路测试系统</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product148.html">功率半导体测试系统</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type144.html'">PXI、PCI模块化解决方案</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl06$ProID" id="AsideLeft_rptProduct_ctl06_ProID" value="144" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product149.html">PXI/PXIe产品</a>
                            </li>
                        
                </ul>
            </div>
        
            <div class="title ">
                <span class="title-link" onclick="location.href='/product/type145.html'">其他产品</span>
                <span class="right-img">
                    <img src="../image/product/fold.png" alt="">
                </span>
                <input type="hidden" name="AsideLeft$rptProduct$ctl07$ProID" id="AsideLeft_rptProduct_ctl07_ProID" value="145" />
                <ul>
                    
                            <li>
                                <a class="" style="color: !important" href="/product/product151.html">延迟信号发生器</a>
                            </li>
                        
                            <li>
                                <a class="" style="color: !important" href="/product/product152.html">抖动噪声信号发生器</a>
                            </li>
                        
                </ul>
            </div>
        
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
                    <a href="/product/product153.html">产品展示</a>
                    <img class="icon1" src="../image/product/icon2.png" alt="">
                    <a href="/product/product6.html" class="text">射频、微波信号产生与分析</a>
                </p>
                <p>
	<img alt="" src="/uploads/FCKeditor/images/RF(1).jpg" style="width: 1000px; height: 478px;" /></p>
<p>
	&nbsp;</p>
<div>
	<span style="font-family:tahoma,geneva,sans-serif;"><span style="color:#000000;"><span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp;能够驾驭微波将得到相应回报，但这绝不是一件容易的事情。所得到的回报是十分可观的。直至千兆赫兹的频率与在毫米范围内的测量波长相结合所提供的基本物理性能，将使通信系统拥有更大的带宽，信号易于在大气中传送，因而可满足人们对通信系统的永不止步的需求。</span></span></span></div>
<div>
	&nbsp;</div>
<div>
	<span style="font-family:tahoma,geneva,sans-serif;"><span style="color:#000000;"><span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp;但是，这种方法也存在一些缺点。比如，微波通信会受雨雪的干扰。为了从驾驭微波中获得好处，必须对信号劣化和损失效应进行管理，并解决与此相关的功耗和过热问题。</span></span></span></div>
<div>
	&nbsp;</div>
<div>
	<span style="font-family:tahoma,geneva,sans-serif;"><span style="color:#000000;"><span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp;从微波在雷达中的早期应用开始，带宽增加的优点已成为通信技术向微波方向迈进的一个决定性因素。这种转变开始于卫星传送，进而转到地面上的有线电视和采用WiFi 协议的无线局域网。所有现代计算机都拥有在微波频率下运行的芯片。</span></span></span></div>
<div>
	&nbsp;</div>
<div>
	<span style="font-family:tahoma,geneva,sans-serif;"><span style="font-size:14px;"><span style="color:#000000;">&nbsp; &nbsp; &nbsp; &nbsp;对微波测试与测量技术的需要甚至比对微波设备本身的需要更加迫切。因此，盛铂科技正依托自身的研发能力努力成为全面微波测试与测量设备供应商之一。我们提供了广泛的射频微波测试产品，包括具有国际领先水准的</span><a href="http://www.samplesci.com/product/p-111-110.html" target="_blank"><span style="color:#0000ff;">全频带宽带上下变频器</span></a><span style="color:#000000;"> ，您提供0.1~40+GHz频率范围内的2GHz实时带宽的信号上下变频功能，配合我们的</span><a href="http://www.samplesci.com/product/product153.html" target="_blank"><span style="color:#0000ff;">信道模拟器</span></a><span style="color:#000000;">，我们成为了全球第一家可以如此宽广范围的宽带信号中提供信道模拟解决方案的公司。同时我们还是业界具有创新意义的</span><a href="http://www.samplesci.com/product/product116.html" target="_blank"><span style="color:#0000ff;">噪声源</span></a><span style="color:#000000;">和</span><a href="http://www.samplesci.com/product/product154.html" target="_blank"><span style="color:#0000ff;">多通道微波信号源</span></a><span style="color:#000000;">供应商。</span></span></span></div>
<div>
	&nbsp;</div>
<div>
	<span style="font-family:tahoma,geneva,sans-serif;"><span style="color:#000000;"><span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp;不管您在微波范围内是使用脉冲信号、扫描信号还是调制信号，我们的仪器都可以最高精度快速、可靠和高质量地进行信号生成和分析。我们的解决方案可在从研发直至认证、生产和服务这一过程的每一步中为您提供支持。</span></span></span></div>
<div>
	<br />
	<br />
	&nbsp;</div>
<div>
	&nbsp;</div>
<div>
	&nbsp;</div>

            </div>
            <div class="clear"></div>
        </div>
    @endsection
       

