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
                    <p class="card-header">Categories</p>
                    <table class="table hover">
                        <thead>
                            <th>TagName</th>
                            <th>Updating</th>
                            <th>Deleting</th>
                        </thead>
                        <tbody>
                           @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->tag}}</td> 
                                <td><a href="{{route('tag.edit',$tag->id)}}" class="btn btn-sm btn-info">Update</a></td>
                                <td>
                                    <form method="Post" action="{{route('tag.delete',$tag->id)}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="Delete">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>                               
                            </tr>
                           @endforeach
                        </tbody>
                    </table>

                    <div class="m-3">
                        {{$tags->render()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
