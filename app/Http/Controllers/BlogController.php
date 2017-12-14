<?php

namespace App\Http\Controllers;

use App\category;
use App\newspost;
use App\termtaxomony;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $text= "Add New Post";
        $data = [
            'text' => $text,
        ];
        return view('Admin.Blog.new-post',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allpost()
    {
        $text= "News Archive From Start To End";
        $news = newspost::orderBy('id', 'desc')->paginate(5);
        $data = [
            'text' => $text,
            'news' => $news,
        ];
        return view('Admin.Blog.all-post',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:150',
            'post' => 'required',
            'thumbail'=>'required|image|mimes:jpeg,jpg,png|max:1024',
            'category' =>'required|array|min:1',
            'tags' =>'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('thumbail')){
            $image = $request->file('thumbail');
            $filename = date('Y-m-d').'.'.uniqid('INDRO-').'.'.$image->getClientOriginalExtension();
            $location = public_path('News-Content/News/'.$filename);
            Image::make($image)->resize(600,400)->save($location);
            $data['thumbail'] = $filename;
        }
        $data['user_id'] = Auth::user()->id;
        $data['views'] = 0;
        $data['status'] = 0;
        $getid = newspost::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'post' => $data['post'],
            'tags' => $data['tags'],
            'thumbail' => $data['thumbail'],
            'video_link' => $data['video_link'],
            'views' => $data['views'],
            'status' => $data['status'],
            'created_at' => Carbon::now(),
        ]);
        foreach ($request->category as $category)
            {
                $cat['news_id'] = $getid['id'];
                $cat['term_id'] = $category;
                termtaxomony::create($cat);
            }
        return redirect('/admin/All-News/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpost($id)
    {
        $text= "Edit Your Post";
        $data = newspost::find($id);
        $xx = [
            'text' => $text,
        ];
        return view('Admin.Blog.edit-post',$xx,compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->validate($request, [
            'title' => 'required|max:150',
            'post' => 'required',
//            'thumbail'=>'required|image|mimes:jpeg,jpg,png|max:1024',
            'category' =>'required|array|min:1',
            'tags' =>'required',
        ]);
        $mydata = newspost::find($id);
        if ($request->hasFile('thumbail')){
            $image = $request->file('thumbail');
            $filename = date('Y-m-d').'.'.uniqid('INDRO-').'.'.$image->getClientOriginalExtension();
            $location = public_path('News-Content/News/'.$filename);
            Image::make($image)->resize(600,400)->save($location);
            $data['thumbail'] = $filename;
            $oldfilename = $mydata->thumbail;
            Storage::delete($oldfilename);
        }
        $data['user_id'] = Auth::user()->id;
        $data['title'] = $request->title;
        $data['post'] = $request->post;
        $data['tags'] = $request->tags;
        $data['video_link'] = $request->video_link;
        $mydata->update($data);
        termtaxomony::where('news_id',$id)->delete();
        foreach ($request->category as $category) {$cat['news_id'] = $id;$cat['term_id'] = $category;termtaxomony::create($cat);}
        return redirect('/admin/All-News/');
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
