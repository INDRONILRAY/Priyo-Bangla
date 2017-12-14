<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> @yield('title')</title>
    <link type="{{ asset('main-assets/image/png') }}" rel="shortcut icon" href="{{ asset('main-assets/images/logo1.png') }}"/>
    <link href="{{ asset('main-assets/css/youtubepop.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('main-assets/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('main-assets/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/animate.css') }}"/>
    <link href="{{ asset('main-assets/css/style.css') }}" type="text/css" rel="stylesheet"/>
    <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
    <link href="{{ asset('main-assets/css/responsive.css') }}" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="{{ asset('main-assets/js/youtube.js') }}"></script>
    <script type="text/javascript">
        jQuery(function(){
            jQuery("a.x").YouTubePopUp();
        });
    </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!--<div class="clearfix"></div>-->
<body>

<!-- ****************** Header Section Start ****************** -->
<section class="header_top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <a href="{{ url('/') }}" title=""><img src="{{ asset('main-assets/images/logo1.png') }}" class="img-responsive logo" height="140px" width="640px"  title="" alt="adimage"></a>
            </div>
            <div class="col-md-4 col-xs-4 date">
                @yield('dateformate')
                <p class=""><?php echo bn_date(date('d M Y'));?><br> <?php echo bn_date(date('a'));?> <?php echo bn_date(date('h:i, l'));?></p>
            </div>
            <div class="col-md-4 col-xs-4">
                <img src="{{ asset('main-assets/images/headad1.jpg') }}" class="img-responsive headad" height="100px" width="300px" title="adimage" alt="adimage">
            </div>
        </div>
        @yield('popup')
    </div>
</section>
<!-- ************ Header Section ends ************ -->

<!-- ****************** Meanu Section Start ****************** -->
<nav id="navigation" style="background-color: #B3E5FC">
    <div class="container navbar-default navs">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: #B3E5FC; color: white">
                <ul class="nav navbar-nav">
                    <li><a class="active menu_color" href="{{ url('/') }}">প্রচ্ছদ</a></li>
                    <?php $value = \App\category::where('parent',"")->get(); ?>
                    @if($value->count() > 1)
                   @foreach($value as $item)
                       <li><a class="menu_color"  href="{{ url('/category/'.$item->id.'/'.$item->name.'/') }}">{{ $item->name }}</a></li>
                       {{--<li>--}}
                           {{--<a href="">--}}
                               {{--@if($item->parent = '')--}}

                           {{--</a>--}}
                       {{--</li>--}}
                  @endforeach
                        @else
                        <li><a class="menu_color" href="{{ url('/') }}">Home</a></li>
                        <li><a class="menu_color" href="{{ url('/') }}">About Us</a></li>
                        <li><a class="menu_color" href="{{ url('/') }}">Contact Us</a></li>
                        @endif
                </ul>
            </div>

        </div>
    </div>
</nav><!-- nav part ends -->

<!-- ****************** Meanu Section Start ****************** -->

<!-- ****************** BreakingNews Section Start ****************** -->
<section class="marquee_1">
    <div class="container">
        <div class="col-md-12 latestNews">
            <div class="row">
                <div class="col-sm-3">
                    <div class="row mar_latest text-center">
                        <p> এই মাত্র পাওয়া   </p>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mar">
                        <marquee scrolldelay="10" scrollamount="15" onmouseover="stop();"  onmouseout="start();">
                            <?php $latestnews = \App\newspost::where('status',0)->orderBy('id', 'desc')->limit(5)->get(); ?>
                                @if($latestnews->count() > 1)
                            @foreach($latestnews as $item)
                                <span class="strong"><span style="color: red">**</span><a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->max('term_id');
                                    $cat2 = \App\category::where('id',$cat1)->max('name');
                                    echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>"> {{ $item->title }} </a><span style="color: red">**</span>&nbsp;&nbsp;&nbsp;</span>
                            @endforeach
                                @else
                                    <span class="strong"><span style="color: red">**</span> Add News From Admin Panel <span style="color: red">**</span>&nbsp;&nbsp;&nbsp;</span>
                                @endif
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** BreakingNews Section End ****************** -->


@yield('content')

<!-- ****************** Social Media Section Start ****************** -->
<section class="social_meadia">
    <div class="container">
        <div class="row">
            <div class="col-md-9 social_bor">
                <div class="col-md-6 social text-center">
                    <p>Share This</p>
                    <p class="border"></p>
                    <ul class="social_network social_circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoPinterest" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 ex1">
                    <img src="{{ asset('main-assets/images/footerad.jpg') }}" width="" class="img-responsive" title="" alt="ad">
                </div>

            </div>
            <div class="col-md-3 col-xs-12 app text-center">
                <div class="app_download">
                    <img src="{{ asset('main-assets/images/logo1.png') }}" class="img-responsive center-block" title="" alt="">
                    <p>মোবাইল অ্যাপ ডাউনলোড করুন</p>
                    <img src="{{ asset('main-assets/images/app1.png') }}" class="img-responsive center-block first_app" height="" width="" title="" alt="">
                    <img src="{{ asset('main-assets/images/app2.png') }}" class="img-responsive center-block first_app" height="" width="" title="" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** Social Media Section End ****************** -->


<!-- ****************** Footer Section Start ****************** -->
<section class="footer_top" style="background-color: #B3E5FC">
    <div class="container">
        <div class="row foot_color">
            <div class="col-md-9 border_right">
                <ul>
                    <li>সম্পাদকমন্ডলীর সভাপতি :  <span class="foot_containt">সালাহউদ্দিন মিয়া   </span></li>
                    <li>সম্পাদক: <span class="foot_containt">অমিতাভ অপু </span></li>
                    <li>ঠিকানা: <span class="foot_containt">মৃধা প্লাজা (৩য়  তলা ), জয়পাড়া বাজার , দোহার, ঢাকা। বাণিজ্যিক কার্যালয় : কদমতলী  গোল  চত্বর সংলগ্ন , কেরানিগঞ্জ , ঢাকা ।</span></li><br>
                    <li class="design">Design and Develop: China Bangla IT Ltd.</li>
                    <li>copyright@priyobanglanews.com</li><br>
                    <li >FOLLOW US!&nbsp;<a href="mailto:priyobanglanews@yahoo.com" target="_top"><i class="fa fa-at attheread" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3 foot_right">
                <p>ই-মেইল: editor@priyonews.com,<br>
                    খবরের জন্য: priyobanglanews@yahoo.com<br>
                    ফোনঃ০১৭৬৩৯৯৬৬৫৫, ০১৮২৮৬৫০৫৮৫,,<br>
                    ফ্যাক্স: ৯৩৫০৫৫৫</p>
            </div>
        </div>
    </div>
</section>
<a id="scrollTopIcon" href="#" style="display: block;">
    <img src="{{ asset('main-assets/images/up.png') }}" class="img-responsive" alt="" title="">
</a>
<!-- ****************** Footer Section Ends ****************** -->

<script src="{{ asset('main-assets/js/jquery-1.12.1.min.js') }}"></script>
<script src="{{ asset('main-assets/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('main-assets/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main-assets/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main-assets/js/scrollTopBottomIcon.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main-assets/js/nazrul.js') }}"></script>
<script type="text/javascript" src="{{ asset('main-assets/js/youtube.js') }}"></script>
<script type="text/javascript" src="{{ asset('main-assets/js/popup.js') }}"></script>



<!-- navbar js part -->


<!-- smoth scoll js part -->
<script>
    $(window).stellar();
</script>

<!-- News slider js part -->
<script>
    $(document).ready(function () {
        $('#media').carousel({
            pause: true,
            interval: 5200,
        });
    });
</script>

<!-- Show Cash Slider js part -->
<script>
    $(document).ready(function(){
        $('.showCaseItems').slick({
            infinite: true,
            autoplay: true,
            speed: 500,
            slidesToShow: 4,
            adaptiveHeight: false,
            prevArrow: '<span class="showCaseArrow prevArrow"> <i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow: '<span class="showCaseArrow nextArrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></span>'
        });

        $("html").niceScroll({
            cursorcolor:"#F6795A",
            cursorwidth: "7px",
            zindex: 999999,
            scrollspeed: 100
        });

        new WOW().init();

        $('.satisfactionRate, .happyClient, .successfulProjects').counterUp({
            delay: 100,
            time: 1500
        });

        $('#myTab').tabCollapse();

    });


</script>


</body>
</html>
