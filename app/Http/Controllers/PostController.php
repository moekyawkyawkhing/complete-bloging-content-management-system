<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormValidate;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate('5');
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();

        if(count($tags) == 0){

            Session::flash('info','You mush have one tag to create new post.');
            return redirect()->back();

        }

        if(count($categories) == 0){


            Session::flash('info','You mush have one category to create new post.');
            return redirect()->back();

        }
        return view('post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormValidate $request)
    {
        $image=$request->file('feature');
        $image_name=time()."_".$image->getClientOriginalName(); // get original name
        $image->move(public_path('images/'),$image_name);

        $data=array();
        $data=$request->all();
        $data['feature']=$image_name;
        $data['category_id']=$request->get('category');
        $data['slug']=str_slug($request->get('title'));
        $data['user_id']=Auth::user()->id;
        $post=Post::create($data);

        $post->tags()->attach($request->get('tags'));


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
        $post_edit=Post::where('id',$id)->firstorfail();
        $categories=Category::all();
        $tags=Tag::all();
        return view('post.edit',compact('post_edit','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormValidate $request, $id)
    {

        $image=$request->file('feature');
        $image_name=time()."_".$image->getClientOriginalName(); // get original name
        $image->move(public_path('images/'),$image_name);

        $post_update=Post::where('id',$id)->firstorfail();
        $post_update->title=$request->get('title');
        $post_update->content=$request->get('content');
        $post_update->category_id=$request->get('category');
        $post_update->slug=str_slug($request->get('title'));
        $post_update->feature=$image_name;
        Session::flash('success','Post update successful');

        $post_update->tags()->sync($request->get('tags'));
        $post_update->update();
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
        $post_delete=Post::where('id',$id)->firstorfail();

        $post_delete->delete();
        Session::flash('success','The post was just trashed');

        return redirect()->back();
    }

    public function trash(){

        $trash_posts=Post::onlyTrashed()->paginate('5'); // only trash post
        return view('post.trash',compact('trash_posts'));

    }

    public function restore($id){

        Post::onlyTrashed()->where('id',$id)->restore();
        Session::flash('success','Post was restored successful');
        return redirect()->back();

    }

    public function kill($id){ // permanent delete post

        $per_delete_post=Post::onlyTrashed()->where('id',$id);
        $per_delete_post->forceDelete();
        Session::flash('success','Post was deleted successful');
        return redirect()->back();
    }
}
