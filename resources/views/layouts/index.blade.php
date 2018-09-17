  @include('layouts.header')
<div class="top-wrap">
        <a class="icon-phone" href="javascript:;">
            <img src="../image/icon11.png" alt="">
            <p>联系我们</p>
        </a>
        <a class="top" href="#">
            <img src="../image/top.png" alt="">
        </a>
        <div class="call-out">
            <div class="pull-left">
                <img src="../image/right.png" alt="">
            </div>
            <div class="pull-right">
                <div class="title">
                    <img src="../image/icon-phone.png" alt="">
                    <span>联系</span>
                </div>
                <div class="pull-wrap">
                    <div class="pull-list">
                        <a class="img" href="#">
                            <img src="../image/icon-one.png" alt="">
                        </a>
                        <p class="icon-title">电话</p>
                        <p class="num">400-621-8906</p>
                    </div>
                    <div class="pull-list marketing">
                        <a class="img" href="tencent://message/?uin=2578940051&Site=网站地址&Menu=yes">
                            <img src="../image/icon-three.png" alt="">
                        </a>
                        <p class="icon-title">立即聊天</p>
                        <p>与盛铂代表实时聊天。服务时间：上午 9:00 – 下午 5:30。</p>
                    </div>
                    <div class="pull-list marketing">
                        <a class="img" href="#">
                            <img src="../image/icon-two.png" alt="">
                        </a>
                        <p class="icon-title">电子邮件</p>
                        <p class="">marketing@samplesci.com</p>
			<p>欢迎留言咨询，请留下您的联系方式</p>
                    </div>
                </div>
            </div>
        </div>
</div>
  <script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzkzODAyNTYyNF80NjE5MDVfNDAwNjIxODkwNl8"></script>
    <div class="banner">
        <img src="../image/solution/banner.png" alt="">
    </div>
    <div class="banner-bg"></div>
    <div class="content">
        @yield('content')
        <div class="clear"></div>
    </div>
</form>

@include('layouts.footer')
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
</body>
</html>
