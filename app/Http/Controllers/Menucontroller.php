<?php

namespace App\Http\Controllers;

use App\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Menucontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text= "Menu Category Select";
        $data = [
            'text' => $text,
        ];
        return view('Admin.Menu.select-menu',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $allmenu = menu::paginate(5);
        $text= "Add Categories";
        $data = [
            'text' => $text,
        ];
        return view('Admin.Menu.add-category',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $data = $request->all();
//        $data['active'] = 0;
//        $this->validate($request, [
//            'title' => 'required|unique:menus|max:20',
//        ]);
//        menu::create($data);
//        Session::flash('message','Menu Successfully Added');
//        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
//        $text= "Select Active Menu";
//        return view('Admin.Menu.select-menu',['key'=>$text]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $allmenu = menu::paginate(5);
////        $allmenu->paginate(5)->get(5);
//        $data = menu::find($id);
//        return view('Admin.Menu.edit-menu',compact('data'),['allmenu' =>$allmenu]);
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
//       $data = $request->all();
////        dd($data);
//        $mydata = menu::find($id);
//        $mydata->update($data);
//
//        Session::flash('message','Menu Successfully Updated.');
//        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $data = menu::find($id);
//        $data->delete();
//        Session::flash('message','Menu Successfully Deleted.');
//        return redirect()->back();
    }
}
