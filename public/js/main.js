$(window).load(function(){
    var serviceListLi = $('.service-list li'),
        solutionList = $('.content .solution .list'),
        detail = $('.detailed'),
        headerNavList = $('.header .nav li'),
       hrList = $('.hrr .li');
    serviceListLi.mouseover(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });
    hrList.mouseover(function(){
        $(this).addClass('active');
    });
    hrList.mouseout(function () {
        $(this).removeClass('active');
    });
    solutionList.eq(0).addClass('active');
    solutionList.click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    var wechat = $('.wechat'),
        code = $('.code');
    wechat.click(function () {
        code.toggle();
    });
    var phone = $('.icon-phone'),
        call = $('.call-out'),
        pullLeft = $('.pull-left');
    phone.click(function () {
        call.css({
            'right': '0'
        });
    });
    pullLeft.click(function () {
        call.css({
            'right': '-651px'
        });
    });
    var numlistli = $('.num-list li'),
        numlist = $('.num-list');
    _cont = numlistli.length;
    _margin = _cont * 10;
    _width = _cont * 35;
    _marginLeft = '-' + (_margin + _width - '10') / 2 + 'px';
    numlist.css({
        'width': _margin + _width + 'px',
        'margin-left': _marginLeft
    });
    if (_cont == 0) {
        numlist.css({
            'width': 'inherit',
            'left': '0',
	    'text-align': 'center'
        });
    };
    console.log(_cont);
    console.log(_marginLeft);
    //solutionList.eq(0).click(function () {
    //    detail.eq(0).css({
    //        'display': 'block'
    //    });
    //    detail.eq(1).css({
    //        'display': 'none'
    //    });
    //    detail.eq(2).css({
    //        'display': 'none'
    //    });
    //});
    //solutionList.eq(1).click(function () {
    //    detail.eq(1).css({
    //        'display': 'block'
    //    });
    //    detail.eq(0).css({
    //        'display': 'none'
    //    });
    //    detail.eq(2).css({
    //        'display': 'none'
    //    });
    //});
    //solutionList.eq(2).click(function () {
    //    detail.eq(2).css({
    //        'display': 'block'
    //    });
    //    detail.eq(0).css({
    //        'display': 'none'
    //    });
    //    detail.eq(1).css({
    //        'display': 'none'
    //    });
    //});
    headerNavList.hover(function (){
        if($(this).children('.nav-two').hasClass('cur')){
            $(this).children('.nav-two').removeClass('cur');
        }else{
            $(this).children('.nav-two').addClass('cur');
        }

    }, function () {
        $(this).children('.nav-two').removeClass('cur');
    })
    var listData = $('.product-content .list-data li');
    listData.mouseover(function () {
        $(this).addClass('active');
    });
    listData.mouseout(function () {
        $(this).removeClass('active');
    });
    var swiper = new Swiper('.banner-img', {
        pagination: '.switch',
        //paginationType: 'custom',
        paginationClickable: true,
        nextButton: '.right',
        prevButton: '.left',
        paginationClickable: true,
        centeredSlides: true,
        autoplay: 2500,
        loop: true,
        autoplayDisableOnInteraction: false
    });
    var swiperOne = new Swiper('.hrr', {
        pagination: '.swiper-pagination',
        slidesPerView: 2,
        paginationClickable: true,
        spaceBetween: 10,
        nextButton: '.right-icon',
        prevButton: '.left-icon',
        breakpoints: {
            765: {
                slidesPerView: 1,
            }
        }
    });
    var maskShadow = $('.mask-shadow'),
        openIcon = $('.header .open-icon'),
        wrapApp = $('.wrap-app'),
        close = $('.close');
    openIcon.click(function () {
            maskShadow.css({
                'display': 'block'
            });
            wrapApp.css({
                'transform': 'translateX(0)'
            });

        });
        close.click(function () {
            maskShadow.css({
                'display': 'none'
            });
            wrapApp.css({
                'transform': 'translateX(100%)'
            });
        });
    $('.navigation .title .title-link').each(function () {
        $(this).click(function () {
            var _this = $(this).parents('.title');
            if (_this.children('ul').is(':hidden')) {
                _this.children('ul').slideDown();
                _this.siblings().children('ul').slideUp();
                _this.addClass('active');
                _this.siblings().removeClass('active');
            } else {
                _this.children('ul').slideUp();
            }
        });
    });
    $('.app-nav li a').each(function () {
        $(this).click(function () {
            var _this = $(this).next('.nav-two');
            var other  =$(this).parent().siblings().children('.nav-two');
            if (_this.is(':hidden')) {
                _this.slideDown();
                other.slideUp();
            } else {
                _this.slideUp();
            }
        });
    });
    $('.nav-two-link').each(function () {
        if ($(this).hasClass('cur')) {
            $(this).next('.nav-threebox').show();
        };
        $(this).click(function () {
            var _this = $(this).next('.nav-threebox');
            var other  =$(this).parent().siblings().children('.nav-threebox');
            if (_this.is(':hidden')) {
                $('.nav-threebox').slideUp();
                _this.slideDown();
            } else {
                _this.slideUp();
            }
        });
    });
    var _switch = $('.index-banner .switch'),
        _switchWidth = '-' + _switch.width() / 2 + 'px';
    _switch.css({
        'margin-left': _switchWidth
    });
    var newLi = $('.new li'),
        support = $('.support-box ul li .img'),
        supportHeight = support.width() + 'px';
    newLi.mouseover(function () {
        $(this).addClass('active');
    });
    newLi.mouseout(function () {
        $(this).removeClass('active');
    });
    var supportLi = $('.support-box ul li .img');
    supportLi.hover(function () {
        $(this).addClass('active');
    }, function () {
        $(this).removeClass('active');
    })
    support.css({
        'height': supportHeight
    });
});

