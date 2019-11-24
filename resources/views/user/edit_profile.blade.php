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
                    <p class="card-header">My profile</p>
                    <div class="row mt-2">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-group" method="Post" action="{{route('user.profile')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="text" value="{{$user->name}}" name="name" class="form-control mt-2">
                                @if($errors->has('name'))
                                 <span style="color:red;">{{$errors->first('name')}}</span><br>
                                @endif
                                <input type="email" value="{{$user->email}}" name="email" class="form-control mt-2">
                                @if($errors->has('email'))
                                 <span style="color:red;">{{$errors->first('email')}}</span><br>
                                @endif
                                <input type="password" value="{{$user->password}}" name="password" class="form-control mt-2">
                                @if($errors->has('password'))
                                 <span style="color:red;">{{$errors->first('password')}}</span><br>
                                @endif
                                 <input type="password" placeholder="new password" name="new_password" class="form-control mt-2">
                                @if($errors->has('new_password'))
                                 <span style="color:red;">{{$errors->first('new_password')}}</span><br>
                                @endif
                                <input type="file" name="image" class="form-control mt-2">
                                @if($errors->has('image'))
                                 <span style="color:red;">{{$errors->first('image')}}</span><br>
                                @endif
                                <input type="text" class="form-control mt-2" name="facebook" placeholder="facebook profile link">
                                @if($errors->has('facebook'))
                                 <span style="color:red;">{{$errors->first('facebook')}}</span><br>
                                @endif
                                <input type="text" class="form-control mt-2" name="youtube" placeholder="youtube profile link">
                                @if($errors->has('youtube'))
                                 <span style="color:red;">{{$errors->first('youtube')}}</span><br>
                                @endif
                                <input type="text" class="form-control mt-2" name="about" placeholder="about you">
                                @if($errors->has('about'))
                                 <span style="color:red;">{{$errors->first('about')}}</span><br>
                                @endif
                                <input type="submit" value="Update profile" class="btn btn-sm btn-success mt-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
