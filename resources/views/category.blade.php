@extends('layouts.master')
@section('title','News 69')
@section('dateformate')
<?php
use App\newspost;use App\termtaxomony;date_default_timezone_set('Asia/Dhaka');
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
        <!-- ****************** Single_Page Section Start ****************** -->
<section class="Single_Page">
    <div class="container">
        <div class="col-md-12 main_div">

            <div class="col-md-8 main_div catagory_title">

                <a href="/<?php $x = termtaxomony::where('news_id',$first_news->id)->value('term_id'); $xx= \App\category::where('id',$x)->value('name');echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$xx ); ?>/article/{{ $first_news->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$first_news->title ); ?>">
                    <img src="{{ asset('/News-content/News/'.$first_news->thumbail) }}"width="730" height="" class="img-responsive" title="{{ $first_news->title }}" alt="{{ $first_news->title }}">
                    <h3>{{ $first_news->title }} </h3>
                    <p>{!! str_limit(strip_tags($first_news->post), $limit = 200, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                </a>

                @foreach($f2 as $item)
                    <div class="col-xs-18 col-sm-6 col-md-4">
                        <div class="Aro_news" >
                            <?php $c=newspost::where('id',$item->news_id)->first();?>
                            <div class="catagory_more">
                                <a href="/<?php $twv1 = termtaxomony::where('news_id',$item->news_id)->value('term_id'); $twv2= \App\category::where('id',$twv1)->value('name'); echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$twv2 ); ?>/article/{{ $c->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$c->title ); ?>">
                                    <img src="{{ asset('/News-content/News/'.$c->thumbail) }}" height="" width="180" alt="{{ $c->title }}" class="pull-left img-responsive postImg" title="{{ $c->title }}">
                                    <h4><?php echo $c->title; ?></h4>
                                   <p>{!! str_limit(strip_tags($c->post), $limit = 150, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4 topnews_single top_space">
                <?php $val = \App\category::where('parent',$cat_id)->get();?>
                @if($val->count()>0)
                <div class="topp_border divi_space">
                    <h3 class="headNews24 text-center">{{$cat_title}} আরো খবর  </h3>
                        <div class="topNewww top_pp">
                            <ul>

                                @foreach($val as $item)
                                      <li><a href="{{ url('/category/'.$item->id.'/'.$item->name.'/') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                @endif

                <div class="topp_border">
                    <h3 class="headNews24 text-center">সর্বাধক পঠিত</h3>
                    @foreach($popularnews as $item)
                        <div class="topNewww top_pp">
                            <a href="/<?php $cat1 = \App\termtaxomony::where('news_id',$item->id)->max('term_id');
                            $cat2 = \App\category::where('id',$cat1)->max('name');
                            echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$cat2 ); ?>/article/{{ $item->id }}/<?php echo str_replace(array(' ', '<', '>', '&', '/', '{', '}', '*'), array('-'),$item->title ); ?>">
                                <img src="{{ asset('/News-content/News/'.$item->thumbail) }}" height="150" width="150" alt="{{ $item->title }}" class="pull-left img-responsive postImg" title="{{ $item->title }}">
                                <h4>{{ $item->title }}</h4>
                                <p>{!! str_limit(strip_tags($item->post), $limit = 150, $end = '......<span style="color: #4db6ac;">বিস্তারিত</span>') !!}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <img src="{{ asset('main-assets/images/add2.jpg') }}" class="img-responsive catagory_add" alt="ad" title="" height="" width="">
                <img src="{{ asset('main-assets/images/add1.jpg') }}" class="img-responsive catagory_add" alt="ad" title="" height="" width="">
            </div>
        </div>
        <div class="col-md-12 pagig">
            <div class="col-md-offset-3 col-md-8">
                {{ $f2->links() }}
            </div>
        </div>
    </div>
</section>
<!-- ****************** Single_Page Section End ****************** -->
@endsection
