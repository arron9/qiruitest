@extends('layouts.index')

@section('title', '射频与微波测试系统')
@section('keywords', '射频与微波测试系统')
@section('description', '在技术不断进步的同时，雷达侦察、躲避、电子战和反对抗甚至民用无线通信领域等方面的挑战也日益严峻。目前在任何情况下系统测试将会受益于高性能的测试设备——模拟和矢量信号发生器、频谱分析仪、矢量信号分析仪和矢量网络分析仪等。从使用多个发射机仿真到雷达的前导波，到测试接收机中的精密元件，盛铂科技解决方案都能满足所有这些复杂的雷达和电子战以及无线通信应用的需求')

@section('content')
    <div class="navigation line40 bg1">
        @foreach($categories as $category)
        <div class="title">
            <span class="right-img">
                <img src="../image/product/fold.png" alt="">
            </span>
            <a class="type title-link" href="/solve/solve12.html" data-id="12">{{$category['name']}}
            </a>
            <ul>
                @isset($category['children'])
                @foreach($category['children'] as $secondCategory)
                <li>
                    <a class="info" data-id="24" href="/solve/s24.html">{{$secondCategory['name']}}</a>
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

@endsection
