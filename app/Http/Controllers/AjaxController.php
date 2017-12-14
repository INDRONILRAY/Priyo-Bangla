<?php

namespace App\Http\Controllers;

use App\Blog;
use App\category;
use App\newspost;
use App\termtaxomony;
use App\widget;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//		$arra=['hsd'];
//		echo json_encode($arra);
		$data  = $request->input( 'data' );
		$name = $data['name'];
		$slug = $data['slug'];
		$parent = $data['parent'];
		$dsc = $data['dsc'];
		$reg = [
		'name' => $data['name'],
		'slug' => $data['slug'],
		'parent' => $data['parent'],
		'dsc' => $data['dsc'],
		];
        $resucc =  category::create($reg);
        if($resucc){
            return ['status' => 'success',];
        }else{
            return ['status' => 'error'];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editcat(Request $request)
    {
//        		$arra=['hsd'];
//		echo json_encode($arra);
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $getvalue = category::where('id', $id)->first();
        if($getvalue){
            return ['status' => 'success',
                'id' => $getvalue->id,
                'name' => $getvalue->name,
                'slug' => $getvalue->slug,
                'parent' => $getvalue->parent,
                'dsc' => $getvalue->dsc,
            ];
        }else{
            return ['status' => 'error'];
        }
    }
    public function update(Request $request)
    {
//        		$arra=['hsd'];
//		echo json_encode($arra);
        $data  = $request->input( 'data' );
        $id = $data['id_cat'];
        $name = $data['name'];
        $slug = $data['slug'];
        $parent = $data['parent'];
        $dsc = $data['dsc'];
        $reg = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'parent' => $data['parent'],
            'dsc' => $data['dsc'],
        ];
        $getvalue = category::where('id', '=', $id)->update($reg);
        if($getvalue){
            return ['status' => 'success'];
        }else{
            return ['status' => 'error'];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryfirst(Request $request)
    {
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $reg = [
            'cat_id' => $id,
            'position' => 1,
        ];
        $getvalue = widget::where('position',1)->update($reg);
        if($getvalue){
            return ['status' => 'success'];
        }else{
            return ['status' => 'error'];
        }
    }
    public function categorysecond(Request $request)
    {
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $reg = [
            'cat_id' => $id,
            'position' => 2,
        ];
        $getvalue = widget::where('position',2)->update($reg);
        if($getvalue){
            return ['status' => 'success'];
        }else{
            return ['status' => 'error'];
        }
    }
    public function categorythird(Request $request)
    {
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $reg = [
            'cat_id' => $id,
            'position' => 3,
        ];
        $getvalue = widget::where('position',3)->update($reg);
        if($getvalue){
            return ['status' => 'success'];
        }else{
            return ['status' => 'error'];
        }
    }
    public function category4th(Request $request)
    {
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $reg = [
            'cat_id' => $id,
            'position' => 4,
        ];
        $getvalue = widget::where('position',4)->update($reg);
        if($getvalue){
            return ['status' => 'success'];
        }else{
            return ['status' => 'error'];
        }
    }
    public function category5th(Request $request)
    {
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $reg = [
            'cat_id' => $id,
            'position' => 5,
        ];
        $getvalue = widget::where('position',5)->update($reg);
        if($getvalue){
            return ['status' => 'success'];
        }else{
            return ['status' => 'error'];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function seacat(Request $request)
    {
        $data  = $request->input( 'data' );
        $date = $data['dateRangePicker'];
        $time = strtotime($date);
        $newformat = date('Y-m-d',$time);
        $xx = newspost::whereDate('created_at', '=',$newformat)->get();
        if($xx){
            return ['status' => 'success','xx' => $xx,];
        }else{
            return ['status' => 'error'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $getvalue = category::find($id)->delete();
        if($getvalue){
            return ['status' => 'success',];
        }else{
            return ['status' => 'error'];
        }
    }
    public function newsdestroy(Request $request)
    {
//        $arra=['hsd'];
//		echo json_encode($arra);
        $data  = $request->input( 'data' );
        $id = $data['id'];
        $getval = category::where('news_id',$id)->delete();
        $getvalue = newspost::find($id)->delete();
        if($getvalue){
            return ['status' => 'success',];
        }else{
            return ['status' => 'error'];
        }
    }
}
