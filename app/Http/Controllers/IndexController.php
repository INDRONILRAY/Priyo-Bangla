<?php

namespace App\Http\Controllers;

use App\category;
use App\newspost;
use App\termtaxomony;
use App\widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $head_news = newspost::where('status',0)->orderBy('id','desc')->first();
        $headnews = newspost::where('status',0)->orderBy('id', 'desc')->offset(1)->limit(4)->get();
        $topnews = newspost::where('status',0)->orderBy('id', 'desc')->offset(5)->limit(7)->get();
        $video_news = newspost::where('status',0)->where('video_link','!=','')->orderBy('id', 'desc')->limit(8)->get();
        $popularnews = newspost::select('views','id','title','thumbail', DB::raw('count(*) as total'))
            ->groupBy('views','id','title','thumbail')
            ->orderBy('views', 'desc')
            ->take(8)
            ->get();
        $topnext = newspost::where('status',0)->orderBy('id', 'desc')->offset(8)->limit(9)->get();
        $data = [
            'head_news'=>$head_news,
            'headnews'=>$headnews,
            'topnews'=>$topnews,
            'video_news'=>$video_news,
            'popularnews'=>$popularnews,
            'topnext'=>$topnext,
        ];
        return view('welcome',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleview($cat, $post_id,$post_title)
    {
        $singlenews = newspost::where('id',$post_id)->first();
//        dd($singlenews);
        $mucat = termtaxomony::where('news_id',$post_id)->get();
        $popularnews = newspost::select('views','id','title','post','thumbail', DB::raw('count(*) as total'))
            ->groupBy('views','id','title','post','thumbail')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
        $more = newspost::select('id','title','post','thumbail')->where('status',0)->orderBy('id','desc')->skip(1)->take(8)->get();
//        dd($more);
        $data = [
            'id' => $post_id,
            'posttitle' => $post_title,
            'singlenews' => $singlenews,
            'mucat' => $mucat,
            'popularnews' => $popularnews,
            'more' => $more,
        ];
        return view('single',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function catnews($id, $cat_title )
    {
        $check = termtaxomony::where('term_id',$id)->count();
        if($check > 2){
            $first = termtaxomony::where('term_id', $id)->orderBy('news_id', 'desc')->first();
            $first_news = newspost::where('id', $first->news_id)->first();
            $f2 = termtaxomony::where('term_id', $id)->orderBy('news_id', 'desc')
                ->offset(1)->paginate(12);
            $popularnews = newspost::select('views', 'id', 'title', 'post', 'thumbail', DB::raw('count(*) as total'))
                ->groupBy('views', 'id', 'title', 'post', 'thumbail')
                ->orderBy('views', 'desc')
                ->take(5)
                ->get();
            $data = [
                'first_news' => $first_news,
                'f2' => $f2,
                'popularnews' => $popularnews,
                'cat_title' => $cat_title,
                'cat_id' => $id,
            ];
            return view('category',$data);
        }else{
            return redirect()->route('mainpage');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
