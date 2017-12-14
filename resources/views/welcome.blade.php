@extends('layouts.master')
@section('title','News 69')
@section('dateformate')
<?php
date_default_timezone_set('Asia/Dhaka');
function bn_date($str)
{
    $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
    $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( 'am', 'pm' );
    $bn = array( 'সকাল ', 'বিকাল' );
    $str = str_replace( $en, $bn, $str );
    return $str;
}
?>
@endsection

@section('content')
        <!-- ****************** TopNews Section Start ****************** -->
<section class="HeadTopNews">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="row ">
                        <div class="col-md-12" style="border: 1px solid green; height:90px; width: 745px; margin-bottom: 10px; padding: 0px">
                            <img style="margin: 0; padding: 0px" src="{{asset('main-assets/images/bannerad.gif')}}" height="90px" width="745px"  alt="For ads">

                            </div>
                        <div class="col-md-12 news_margin">
                            <div class="col-md-6 headNews">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">

                                        <div class="item active">
                                            <img src="{{ asset('/News-content/News/'.$head_news->thumbail) }}" height="" width="485" class="img-responsive" title="{{ $head_news->title }}" alt="{{ $head_news->title }}">
                                            <div class="slidFirst">

                                                <a href="/<?php use App\newspost;use App\termtaxomony;use App\widget;$cat1 = \App\termtaxomony::where('news_id',$head_news->id)->max('term_id');
                                                $cat2 = \App\category::where('id',$cat1)->max('name');
                                                echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $head_news->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$head_news->title ); ?>">

                                                    <h3>{{ $head_news->title }}</h3>
                                                    <p>{!! str_limit(strip_tags($head_news->post), $limit = 400, $end = '........<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                                </a>
                                            </div>
                                        </div><!-- End Item -->
                                        @foreach($headnews as $item)
                                        <div class="item">
                                            <img src="{{ asset('/News-content/News/'.$item->thumbail) }}" height="" width="485" class="img-responsive" title="" alt="{{ $item->title }}">
                                            <div class="slidFirst">
                                                <a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->value('term_id');
                                                    $cat2 = \App\category::where('id',$cat1)->value('name');
                                                    echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">
                                                    <h3>{{ $item->title }}</h3>
                                                    <p>{!! str_limit(strip_tags($head_news->post), $limit = 400, $end = '........<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                                </a>
                                            </div>
                                        </div><!-- End Item -->
                                        @endforeach

                                    </div><!-- End Carousel Inner -->
<br><br><br><br>
                                    <div id="#myCarousel" class="carousel slide" data-ride="#myCarousel">

                                        <ul class="carousel-indicators top">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active">1</li>
                                            <li data-target="#myCarousel" data-slide-to="1">2</li>
                                            <li data-target="#myCarousel" data-slide-to="2">3</li>
                                            <li data-target="#myCarousel" data-slide-to="3">4</li>
                                            <li data-target="#myCarousel" data-slide-to="4">5</li>
                                        </ul>
                                    </div>


                                </div><!-- End Carousel -->
                            </div>

                            <div class="col-md-6" >
                                @foreach($topnews as $item)
                                <div class="topNewww rborder" >
                                    <a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->max('term_id');
                                    $cat2 = \App\category::where('id',$cat1)->max('name');
                                    echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*',''), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">
                                        <img src="{{ asset('/News-content/News/'.$item->thumbail) }}" height="100" width="100" alt="post img" class="pull-left img-responsive postImg" title="{{ $item->title }}">
                                        <h4>{{ $item->title }}</h4>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 face_widget">

                    <div class="card">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">সর্বাধক পঠিত </a></li>
                            <li role="presentation" ><a href="#video" aria-controls="video" role="tab" data-toggle="tab">ভিডিও  নিউজ </a></li>

                        </ul>


                        <div class="tab-content  ">
                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <ul>
                                    @foreach($popularnews as $item)
                                        <li style="display: block; overflow: hidden">
                                            <img style="float: left; padding: 5px" src="{{ asset('/News-content/News/'.$item->thumbail) }}" width="80px" height="70px"><a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->max('term_id');
                                            $cat2 = \App\category::where('id',$cat1)->max('name');
                                            echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">
                                                {{ $item->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="video">
                                <ul>
                                    @foreach($video_news as $item)
                                        <li style="display: block; overflow: hidden">
                                            <a class="x" href="https://www.youtube.com/watch?v={{ $item->video_link }}">
                                                <img style="float: left; padding: 5px" src="{{ asset('/News-content/News/'.$item->thumbail) }}" width="80" height="70">
                                                {{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- ****************** TopNews Section End ****************** -->

<!-- ****************** AllNews Section Start ****************** -->
<section class="allNews">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-9">
                    <div class="row ">
                        <div class="col-md-12 news_margin">
                            @if(count($topnext)>=3)
                                @foreach($topnext as $item)
                                    <div class="col-xs-18 col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                            <img src="{{ asset('/News-content/News/'.$item->thumbail) }}" height="" width="" alt="" title="" class="img-responsive">
                                            <div class="NewsTitle">
                                                <a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->max('term_id');
                                                $cat2 = \App\category::where('id',$cat1)->max('name');
                                                echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">

                                                    <h4>{{ $item->title }}</h4>
                                                    <p>
                                                        {!! str_limit(strip_tags($item->post), $limit = 80, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}
                                                    </p>
                                                    <h5><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }} | ঢাকা</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <?php $val = array(1,1,1,1,1,1); ?>
                                    @foreach($val as $item)
                                        <div class="col-xs-18 col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <img src="{{ asset('main-assets/images/logo.png') }}" height="" width="" alt="" title="" class="img-responsive">
                                                <div class="NewsTitle">
                                                    <a href="">
                                                        <h4>রোনালদোর জোড়া গোলে ‘ফিরল’ রিয়াল</h4>
                                                        <p>আন্তর্জাতিক ডেস্ক, ১৪ সেপ্টেম্বর : মিয়ানমারের রাখাইন রাজ্যে রোহিঙ্গাদের ওপর দেশটির সেনাবাহিনী ও সরকার সমর্থকদের অব্যাহত ... </p>
                                                        <h5><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; ৪ ঘন্টা | ঢাকা</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="DivisionNews">
                        <h4 class="division_head text-center">বিভাগীয় খবর</h4>
                        <div class="scroll">
                            <ul>
                                <li><a href="{{ url('category/4074/ঢাকা') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>ঢাকা</a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="add">
                        <img src="{{ asset('main-assets/images/add2.jpg') }}" width="300" class="img-responsive" title="" alt="adimage">
                        <img src="{{ asset('main-assets/images/add3.jpg') }}" width="300" class="img-responsive" title="" alt="adimage">
                        <img src="{{ asset('main-assets/images/add1.jpg') }}" width="300" class="img-responsive" title="" alt="adimage">
                    </div>


                </div>


            </div>
        </div>
    </div>
</section>
<!-- ****************** AllNews Section End ****************** -->

<!-- ****************** Sport Section Start ****************** -->

<section class="Sport">
    <div class="container">
        <div class="row">
            <?php $wid1v = \App\widget::where('position',1)->value('cat_id');
            $wid2 = termtaxomony::where('term_id',$wid1v)->count();
            if($wid2>2) { ?>
            <div class="col-md-9 full_border">
                <h2 class="sport_title">
                    <?php echo \App\category::where('id',$wid1v)->value('name');?></h2>
                <div class="col-md-12">
                    <div class="col-md-6 sport_pp">
                        <div class="col_item">
                            <?php $fwc = widget::where('position',1)->max('cat_id');
                            $fwextra = termtaxomony::where('term_id',$fwc)->orderBy('sort_order', 'desc')->value('news_id');
                            $fw = newspost::where('id',$fwextra)->first(); ?>
                            <div class="NewsSport">
                                <a href="/<?php $fwv3 = termtaxomony::where('news_id',$fwextra)->value('term_id'); $fwv4= \App\category::where('id',$fwv3)->value('name');echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fwv4 ); ?>/article/{{ $fw->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fw->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$fw->thumbail) }}" height="" width="" class="img-responsive" alt="{{ $fw->title }}" title="{{ $fw->title }}">
                                    <h3>{{ $fw->title }}</h3>
                                    <p>{!! str_limit(strip_tags($fw->post), $limit = 400, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                    <h5 type="button">বিস্তারিত </h5>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 all_sport">
                        <?php $fwn = termtaxomony::where('term_id',$fwc)->orderBy('sort_order', 'desc')->offset(1)->limit(3)->get(); ?>
                        @foreach($fwn as $item)
                        <div class="sport_title_Pra">
                            <?php $a = newspost::where('id',$item->news_id)->first(); ?>
                            <a href="/<?php $fwv1 = termtaxomony::where('news_id',$item->news_id)->value('term_id'); $fwv2= \App\category::where('id',$fwv1)->value('name'); echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fwv2 ); ?>/article/{{ $a->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$a->title ); ?>">
                                <img src="{{ asset('/News-content/News/'.$a->thumbail) }}" height="" width="180" alt="{{ $a->title }}" class="pull-left img-responsive postImg" title="{{ $a->title }}">
                                <h4>{{ $a->title }}</h4>
                                <p>{!! str_limit(strip_tags($a->post), $limit = 200, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
                <?php } else { ?>
                <div class="col-md-9 full_border">
                <h2 class="sport_title">প্রথম ভাগ </h2>
                <div class="col-md-12">
                    <div class="col-md-6 sport_pp">
                        <div class="col_item">
                            <div class="NewsSport">
                                <a href="">
                                    <img src="{{ asset('main-assets/images/headNews1.png') }}" height="" width="" class="img-responsive" alt="News_69" title="">
                                    <h3>শ্রদ্ধাকে খুশি করতে যা করলেন প্রভাস</h3>
                                    <p>শ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাস</p>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 all_sport">
                        <?php $val = array(1,1,1); ?>
                        @foreach($val as $item)
                        <div class="sport_title_Pra">
                            <a href="">
                                <img src="{{ asset('main-assets/images/intertedment3.png') }}" height="" width="" alt="post img" class="pull-left img-responsive postImg" title="">
                                <h4>শাকিব ফিরলেই তিন সিনেমার মহরত</h4>
                                <p class="text-justify">
                                    বিনোদন ডেস্ক, ১৪ সেপ্টেম্বর : ‘বাহুবলী’-র তুমুল সাফল্যের পর প্রভাসের পরবর্তী ছবি সাহো’তে নায়িকা কে হবেন সেটা নিয়ে বেশ কিছু জল্পনার পর নায়িকা হিসেবে চুক্তিবদ্ধা কাপুর। বর্তমানে শ্রদ্ধা ও প্রভাস-সহ ‘সাহো’ টিম হায়দরাবাদে শ্যুটিংয়ে ব্যস্ত ...
                                </p>
                            </a>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
             <?php } ?>

            <div class="col-md-3">
                <div class="PathokNews">
                    <?php $swid2v = \App\widget::where('position',2)->value('cat_id');
                    $swidv = termtaxomony::where('term_id',$swid2v)->count();
                    if($swidv>2) { ?>
                    <h4 class="division_head text-center"><?php echo \App\category::where('id',$swid2v)->value('name');?></h4>
                    <div class="PathokWriter">
                        <ul>
                            <?php $swn = termtaxomony::where('term_id',$swid2v)->orderBy('sort_order', 'desc')->offset(1)->limit(3)->get(); ?>
                            @foreach($swn as $item)
                            <li>
                                <?php $b = newspost::where('id',$item->news_id)->first(); ?>
                                    <a href="/<?php $swv1 = termtaxomony::where('news_id',$item->news_id)->value('term_id'); $swv2= \App\category::where('id',$swv1)->value('name'); echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$swv2 ); ?>/article/{{ $b->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$b->title ); ?>">
                                        <h4>{{ $b->title }}</h4>
                                    <p>{!! str_limit(strip_tags($b->post), $limit = 130, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <?php } else { ?>
                        <h4 class="division_head text-center">পাঠকই লেখক</h4>
                        <div class="PathokWriter">
                            <ul>
                                <?php $val = array(1,1,1); ?>
                                @foreach($val as $item)
                                <li>
                                    <a href="">
                                        <h4>দৃষ্টি, হাজার হাজার রক্তদাতা আছে এ ফেসবুকে!</h4>
                                        <p>আফনান আলম : হাজার হাজার রক্তদাতা আছে এ ফেসবুকে! এসব রক্তদাতাদের মধ্যে বেশকিছু …</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    <?php } ?>
                </div>

                <div class="add">
                    <img src="{{ asset('main-assets/images/add2.jpg') }}" width="300" class="img-responsive" title="" alt="adimage">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ****************** Sport Section End ****************** -->

<!-- ****************** Intertedment Section Start ****************** -->
<section class="Sport">
    <div class="container">
        <div class="row">
            <?php $wid3v = \App\widget::where('position',3)->value('cat_id');
            $wid3 = termtaxomony::where('term_id',$wid3v)->count();
            if($wid3>2) { ?>
            <div class="col-md-9 full_border">
                <h2 class="sport_title">
                    <?php echo \App\category::where('id',$wid3v)->value('name');?></h2>
                <div class="col-md-12">
                    <div class="col-md-6 sport_pp">
                        <div class="col_item">
                            <?php $twc = widget::where('position',3)->max('cat_id');
                            $twextra = termtaxomony::where('term_id',$twc)->orderBy('sort_order', 'desc')->value('news_id');
                            $tw = newspost::where('id',$twextra)->first(); ?>
                            <div class="NewsSport">
                                <a href="/<?php $twv3 = termtaxomony::where('news_id',$twextra)->value('term_id'); $twv4= \App\category::where('id',$twv3)->value('name');echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$twv4 ); ?>/article/{{ $tw->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$tw->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$tw->thumbail) }}" height="" width="" class="img-responsive" alt="{{ $tw->title }}" title="{{ $tw->title }}">
                                    <h3>{{ $tw->title }}</h3>
                                    <p>{!! str_limit(strip_tags($tw->post), $limit = 400, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                    <h5 type="button">বিস্তারিত </h5>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 all_sport">
                        <?php $twn = termtaxomony::where('term_id',$twc)->orderBy('sort_order', 'desc')->offset(1)->limit(3)->get(); ?>
                        @foreach($twn as $item)
                            <div class="sport_title_Pra">
                                <?php $c = newspost::where('id',$item->news_id)->first(); ?>
                                <a href="/<?php $twv1 = termtaxomony::where('news_id',$item->news_id)->value('term_id'); $twv2= \App\category::where('id',$twv1)->value('name'); echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$twv2 ); ?>/article/{{ $c->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$c->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$c->thumbail) }}" height="" width="180" alt="{{ $c->title }}" class="pull-left img-responsive postImg" title="{{ $c->title }}">
                                    <h4>{{ $c->title }}</h4>
                                    <p>{!! str_limit(strip_tags($c->post), $limit = 200, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-md-9 full_border">
                <h2 class="sport_title">দ্বিতীয় ভাগ </h2>
                <div class="col-md-12">
                    <div class="col-md-6 sport_pp">
                        <div class="col_item">
                            <div class="NewsSport">
                                <a href="">
                                    <img src="{{ asset('main-assets/images/headNews1.png') }}" height="" width="" class="img-responsive" alt="News_69" title="">
                                    <h3>শ্রদ্ধাকে খুশি করতে যা করলেন প্রভাস</h3>
                                    <p>শ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাস</p>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 all_sport">
                        <?php $val = array(1,1,1); ?>
                        @foreach($val as $item)
                            <div class="sport_title_Pra">
                                <a href="">
                                    <img src="{{ asset('main-assets/images/intertedment3.png') }}" height="" width="" alt="post img" class="pull-left img-responsive postImg" title="">
                                    <h4>শাকিব ফিরলেই তিন সিনেমার মহরত</h4>
                                    <p class="text-justify">
                                        বিনোদন ডেস্ক, ১৪ সেপ্টেম্বর : ‘বাহুবলী’-র তুমুল সাফল্যের পর প্রভাসের পরবর্তী ছবি সাহো’তে নায়িকা কে হবেন সেটা নিয়ে বেশ কিছু জল্পনার পর নায়িকা হিসেবে চুক্তিবদ্ধা কাপুর। বর্তমানে শ্রদ্ধা ও প্রভাস-সহ ‘সাহো’ টিম হায়দরাবাদে শ্যুটিংয়ে ব্যস্ত ...
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-3">
                <div class="PathokNews">
                    <h4 class="division_head text-center">Tweets <span class="tweets">by ‎@news69bd</span></h4>
                    <div class="PathokWriter">
                        <ul>
                            <li><a href="">
                                    <img src="{{ asset('main-assets/images/twiet_logo.png') }}" height="" width="" alt="post img" class="pull-left img-responsive postImg" title="">
                                    <h4>news69bd.com <br>@news69bd</h4>
                                    <p class="twiest_title">রোহিঙ্গাদের বিরুদ্ধে দাঁড়ানোর আহ্বান মিয়ানমার সেনাপ্রধানের</p>
                                    <p>news69bd.com/?p=214515  http://fb.me/D6p4U52P</p>
                                </a></li>

                            <li><a href="">
                                    <img src="{{ asset('main-assets/images/twiet_logo.png') }}" height="" width="" alt="post img" class="pull-left img-responsive postImg" title="">
                                    <h4>news69bd.com <br>@news69bd</h4>
                                    <p class="twiest_title">রোহিঙ্গাদের বিরুদ্ধে দাঁড়ানোর আহ্বান মিয়ানমার সেনাপ্রধানের</p>
                                    <p>news69bd.com/?p=214515  http://fb.me/D6p4U52P</p>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="add">
                    <img src="{{ asset('main-assets/images/add3.jpg') }}" height="" width="300" class="img-responsive" title="adimage" alt="adimage">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ****************** Intertedment Section End ****************** -->

<!-- ****************** Politices Section Start ****************** -->
<section class="Sport">
    <div class="container">
        <div class="row">
            <?php $wid4v = \App\widget::where('position',4)->value('cat_id');
            $wid4 = termtaxomony::where('term_id',$wid4v)->count();
            if($wid4>2) { ?>
            <div class="col-md-9 full_border">
                <h2 class="sport_title">
                    <?php echo \App\category::where('id',$wid4v)->value('name');?></h2>
                <div class="col-md-12">
                    <div class="col-md-6 sport_pp">
                        <div class="col_item">
                            <?php $fowc = widget::where('position',4)->max('cat_id');
                            $fowextra = termtaxomony::where('term_id',$fowc)->orderBy('sort_order', 'desc')->value('news_id');
                            $fow = newspost::where('id',$fowextra)->first(); ?>
                            <div class="NewsSport">
                                <a href="/<?php $fowv3 = termtaxomony::where('news_id',$fowextra)->value('term_id'); $fowv4= \App\category::where('id',$fowv3)->value('name');echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fowv4 ); ?>/article/{{ $fow->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fow->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$fow->thumbail) }}" height="" width="" class="img-responsive" alt="{{ $fow->title }}" title="{{ $fow->title }}">
                                    <h3>{{ $fow->title }}</h3>
                                    <p>{!! str_limit(strip_tags($fow->post), $limit = 400, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                    <h5 type="button">বিস্তারিত </h5>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 all_sport">
                        <?php $fown = termtaxomony::where('term_id',$fowc)->orderBy('sort_order', 'desc')->offset(1)->limit(3)->get(); ?>
                        @foreach($fown as $item)
                            <div class="sport_title_Pra">
                                <?php $d = newspost::where('id',$item->news_id)->first(); ?>
                                <a href="/<?php $fowv1 = termtaxomony::where('news_id',$item->news_id)->value('term_id'); $fowv2= \App\category::where('id',$fowv1)->value('name'); echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fowv2 ); ?>/article/{{ $d->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$d->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$d->thumbail) }}" height="" width="180" alt="{{ $d->title }}" class="pull-left img-responsive postImg" title="{{ $d->title }}">
                                    <h4>{{ $d->title }}</h4>
                                    <p>{!! str_limit(strip_tags($d->post), $limit = 200, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-md-9">
                <h2 class="sport_title">চতুর্থ ভাগ </h2>
                <div class="col-md-12">
                    <div class="col-md-6 sport_pp">
                        <div class="col_item">
                            <div class="NewsSport">
                                <a href="">
                                    <img src="{{ asset('main-assets/images/headNews1.png') }}" height="" width="" class="img-responsive" alt="News_69" title="">
                                    <h3>শ্রদ্ধাকে খুশি করতে যা করলেন প্রভাস</h3>
                                    <p>শ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাসশ্রদ্ধাকে খুশি করতে যা করলেন প্রভাস</p>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 all_sport">
                        <?php $val = array(1,1,1); ?>
                        @foreach($val as $item)
                            <div class="sport_title_Pra">
                                <a href="">
                                    <img src="{{ asset('main-assets/images/intertedment3.png') }}" height="" width="" alt="post img" class="pull-left img-responsive postImg" title="">
                                    <h4>শাকিব ফিরলেই তিন সিনেমার মহরত</h4>
                                    <p class="text-justify">
                                        বিনোদন ডেস্ক, ১৪ সেপ্টেম্বর : ‘বাহুবলী’-র তুমুল সাফল্যের পর প্রভাসের পরবর্তী ছবি সাহো’তে নায়িকা কে হবেন সেটা নিয়ে বেশ কিছু জল্পনার পর নায়িকা হিসেবে চুক্তিবদ্ধা কাপুর। বর্তমানে শ্রদ্ধা ও প্রভাস-সহ ‘সাহো’ টিম হায়দরাবাদে শ্যুটিংয়ে ব্যস্ত ...
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-3">
                <div class="economics">
                    <?php $wid5v = \App\widget::where('position',5)->value('cat_id');
                    $wid5 = termtaxomony::where('term_id',$wid5v)->count();
                    if($wid5>2) { ?>
                    <h2 class="text-center"><?php echo \App\category::where('id',$wid5v)->value('name');?></h2>
                    <div class="discussion">
                        <?php $fiwc = widget::where('position',5)->max('cat_id');
                        $fiwextra = termtaxomony::where('term_id',$fiwc)->orderBy('sort_order', 'desc')->value('news_id');
                        $fiw = newspost::where('id',$fiwextra)->first(); ?>
                            <a href="/<?php $fiwv3 = termtaxomony::where('news_id',$fiwextra)->value('term_id'); $fiwv4= \App\category::where('id',$fiwv3)->value('name');echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fiwv4 ); ?>/article/{{ $fiw->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fiw->title ); ?>">
                            <img src="{{ asset('/News-content/News/'.$fiw->thumbail) }}" height="" width="" class="img-responsive" alt="{{ $fiw->title }}" width="300" title="{{ $fiw->title }}">
                        </a>
                        <ul>
                            <?php $fiwn = termtaxomony::where('term_id',$fiwc)->orderBy('sort_order', 'desc')->limit(6)->get(); ?>
                            @foreach($fiwn as $item)
                                <div class="sport_title_Pra">
                                    <?php $e = newspost::where('id',$item->news_id)->first(); ?>
                                        <li>
                                            <a href="/<?php $fiwv1 = termtaxomony::where('news_id',$item->news_id)->value('term_id'); $fiwv2= \App\category::where('id',$fiwv1)->value('name'); echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$fiwv2 ); ?>/article/{{ $e->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$e->title ); ?>">
                                               {{ $e->title }}
                                            </a>
                                        </li>
                                </div>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php }else { ?>
                        <h2 class="text-center">মতামত-বিশ্লেষণ</h2>
                        <div class="discussion">
                            <a href="#">
                                <img src="{{ asset('main-assets/images/motamod.png') }}" height="" width="" class="img-responsive" alt="Sport 1" width="300" title="">
                            </a>
                            <ul>
                                <li><a href="#"><h3>আগস্ট গভীরতম শোকের মাস</h3> <p>পীযূষ বন্দ্যোপাধ্যায় : পৃথিবীর কোনো জাতির ইতিহাসে আমাদের মতো শোকাবহ আগস্ট আছে কিনা …</p></a> </li>
                                <li><a href="#">জঙ্গিবাদের পেছনে রাজনৈতিক স্বার্থ জড়িত</a> </li>
                                <li class="last_border"><a href="#">একজন শেখ হাসিনা ও তাঁর সাফল্যের ৩ যুগ</a> </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>

                <div class="add">
                    <img src="{{ asset('main-assets/images/add1.jpg') }}" width="300" class="img-responsive" title="adimage" alt="adimage">
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
