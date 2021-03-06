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
                    <p class="card-header">Create A Category</p>
                    <div class="row mt-2">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-group" method="Post" action="{{route('category.store')}}">
                                {{csrf_field()}}
                                <input type="text" placeholder="category name" name="name" class="form-control">
                                @if($errors->has('name'))
                                 <span style="color:red;">{{$errors->first('name')}}</span><br>
                                @endif
                                <input type="submit" value="Store Category" class="btn btn-sm btn-success mt-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
