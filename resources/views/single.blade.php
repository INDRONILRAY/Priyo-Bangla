<?php \App\newspost::where('id',$id)->increment('views',1); ?>
<?php $title = str_replace(array('', '<', '>', '&', '/', '{', '}', '*'), array('-'),$posttitle ); ?>
@extends('layouts.master')
@section('title',$title)
@section('popup')
        <!-- Popup content -->
<div id="popup_content">
    <div class="img_pop">
        <input id="modal-close-button" type="button" value="X" class="close_btn"/>
        <img src="{{ asset('main-assets/images/logo1.png') }}" class="img-responsive logo" height="140px" width="640px"  title="" alt="Logo ">
    </div>
    <div class="pop_des ">
        <p class="text-center">বাংলাদেশ-এর অন্যতম বাংলা  অনলাইন নিউজ পেপার ২৪ ঘণ্টা সর্বোশেষ সংবাদ পেতে আমাদের পেজে লাইক দিয়ে সবসময় আমাদের সাথে যুক্ত থাকুন</p>
    </div>
    <div class="face_like">
        <ul>
            <li><a class="btn like" href="https://www.facebook.com/"><i class="fa fa-thumbs-o-up"></i>Like Page</a></li>
        </ul>
    </div>
</div>
<!-- Overlay background -->
<div id="overlay_bg"></div>
@endsection
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
    <section class="Single_Page">
        <div class="container">
            <div class="col-md-12 main_div">
                <h3>{{ $singlenews->title }}</h3>
                @yield('dateformate')
                <h6>আপডেট &nbsp;{{ \Carbon\Carbon::parse($singlenews->created_at)->format('h:i A') }},&nbsp;<?php echo bn_date(date('M d Y', strtotime($singlenews->created_at))); ?>&nbsp;&nbsp; <span style="color:#000;"><strong>Posted in:</strong></span> @foreach($mucat as $item) <a href="/category/{{ $item->term_id }}/<?php $tit = \App\category::where('id',$item->term_id)->value('name');echo str_replace(' ','',$tit) ?>">{{ $tit }}</a>,&nbsp;@endforeach</h6>
                <p class="single_boader"></p>
                <div class="col-md-8 main_div">
                    <img src="{{ asset('/News-content/News/'.$singlenews->thumbail) }}" height="" width="715" class="img-responsive" title="{{ str_replace(' ','',$singlenews->title) }}" alt="{{ str_replace(' ','',$singlenews->title) }}">
                    <div class="sharethis-inline-share-buttons"></div>
                    <br>
                    {{--{!! $singlenews->post_content !!}--}}
                    <?php $str = $singlenews->post ; echo nl2br($str); ?>
                    @if($singlenews->video_link != '')
                    <p><iframe width="720" height="405" src="https://www.youtube.com/embed/{{ $singlenews->video_link }}" frameborder="0"></iframe></p>
                    @endif

                </div>
                <div class="col-md-4 topnews_single">
                    <div class="topp_border">
                        <h3 class="headNews24 text-center">সর্বাধক পঠিত</h3>
                        @foreach($popularnews as $item)
                            <div class="topNewww top_pp">
                                <a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->max('term_id');
                                $cat2 = \App\category::where('id',$cat1)->max('name');
                                echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$item->thumbail) }}" height="150" width="150" alt="{{ $item->title }}" class="pull-left img-responsive postImg" title="{{ $item->title }}">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{!! str_limit(strip_tags($item->post), $limit = 180, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="comment">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 commt_opt">
                        <p>Comments</p>
                    </div>
                    <div class="col-md-6 more_news">
                        <p>এই পেইজের আরও খবর</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="More_Aro_news">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    @foreach($more as $item)
                        <div class="col-xs-18 col-sm-6 col-md-3">
                            <div class="Aro_news">
                                <div class="more_Title">
                                    <a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->value('term_id');
                                    $cat2 = \App\category::where('id',$cat1)->value('name');
                                    echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">
                                        <img src="{{ asset('/News-content/News/'.$item->thumbail) }}" height="" width="" class="img-responsive" alt="{{ $item->title }}" title="{{ $item->title }}">
                                        <h4>{{ $item->title }}</h4>
                                        <p> {!! str_limit(strip_tags($item->post), $limit = 80, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- End row -->
            </div>
        </div>
    </section>
    <!-- ****************** Single_Page Section End ****************** -->

@endsection
