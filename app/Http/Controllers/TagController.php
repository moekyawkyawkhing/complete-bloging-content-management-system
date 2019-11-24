<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tags=Tag::paginate('5');
        return view('tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'tag' => 'required|max:225'
        ]);

        Tag::create([
            'tag' => $request->get('tag')
        ]);

        Session::flash('success','Tag create successful');

        Session::flash('success','Tag create successful');
        return redirect()->back();
    }

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
    public function edit($id)
    {
        $tag_edit=Tag::where('id',$id)->firstorfail();
        return view('tag.edit',compact('tag_edit'));
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
        $this->validate($request,[
            'tag' => 'required|max:225'
        ]);

        $tag_update=Tag::where('id',$id)->firstorfail();
        $tag_update->tag=$request->get('tag');
        $tag_update->update();  

        Session::flash('success','Tag update successful');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag_del=Tag::where('id',$id)->firstorfail();
        $tag_del->delete();

        Session::flash('success','Tag delete successful');

        return redirect()->back();
    }
}
