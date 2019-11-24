@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
               @include('inc.post.button-group')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <p class="card-header">Post</p>
                    <table class="table hover">
                        <thead>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                           @foreach($trash_posts as $post)
                            <tr>
                                <td>
                                    <img src="{{asset('images/'.$post->feature)}}" class="img-thumbnail" alt="$post->title" style="width: 100px;height: 50px;">
                                </td>
                                <td>{{$post->title}}</td> 
                                <td>{{substr($post->content,0,100)}}</td>
                                <td>
                                   <a href="{{route('post.restore',$post->id)}}" class="btn btn-sm btn-success">Restore</a>
                                </td> 
                                <td>
                                   <a href="{{route('post.kill',$post->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                </td>                               
                            </tr>
                           @endforeach
                        </tbody>
                    </table>

                    <div class="m-3">
                        {{$trash_posts->render()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
