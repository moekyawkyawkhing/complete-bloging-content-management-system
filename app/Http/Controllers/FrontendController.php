<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;
use App\Post;
use App\Tag;
use Newsletter;
use Session;

class FrontendController extends Controller
{
    public function index(){
    	$site_name=Setting::first()->name;
    	$categories=Category::take(5)->get();
    	$first_post=Post::orderBy('created_at','desc')->first();
    	$second_post=Post::orderBy('created_at','desc')->skip(1)->take(1)->first();
    	$third_post=Post::orderBy('created_at','desc')->skip(2)->take(1)->first();
    	$laravel=Category::find('1');
    	$css=Category::find('2');
    	$setting=Setting::first();
    	return view('welcome',compact('categories','site_name','first_post','second_post','third_post','laravel','css','setting'));
    }

    public function singlePost($slug){
    	$single_post=Post::where('slug',$slug)->first();
    	$site_name=Setting::first()->name;
    	$categories=Category::take(5)->get();
        $tags=Tag::all();
    	$setting=Setting::first();
        if($single_post)
        {
            $prev_id=Post::where('id','<',$single_post->id)->max('id');
            $next_id=Post::where('id','>',$single_post->id)->min('id');
            $prev=Post::find($prev_id);
            $next=Post::find($next_id);
            return view('inc.post.single_post',compact('categories','site_name','tags','setting','single_post','prev','next','user'));
        }else{

            echo "<h1>Page Not Found</h1>";
        }
    }

    public function category($id){

        $category=Category::whereId($id)->first();
        $site_name=Setting::first()->name;
        $title=$category->name;
        $tags=Tag::all();
        $categories=Category::take(5)->get();

        return view('inc.post.category_post',compact('categories','tags','title','site_name','category'));

    }

    public function tag($id){

        $tag=tag::whereId($id)->first();
        $site_name=Setting::first()->name;
        $title=$tag->tag;
        $tags=Tag::all();
        $categories=Category::take(5)->get();

        return view('inc.post.tag_post',compact('categories','tags','title','site_name','tag'));

    }

    public function search(){

        $search=request('search');
        $site_name=Setting::first()->name;
        $title=$search;
        $tags=Tag::all();
        $categories=Category::take(5)->get();
        $search_post=Post::where('title','like','%'.$search.'%')->get();

        return view('inc.post.search_post',compact('search_post','categories','tags','title','site_name','category'));

    }

    public function subscribe(){

        $subscribe=request('email');

        Newsletter::subscribe($subscribe);
        Session::flash('subscribe','You are subscribed');

        return redirect()->back();

    }
}
