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
                    <p class="card-header">Edit Site Setting</p>
                    <div class="row mt-2">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-group" method="Post" action="{{route('site.setting.update',$site_setting->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="text" value="{{$site_setting->name}}" name="name" class="mt-2 form-control">
                                @if($errors->has('name'))
                                 <span style="color:red;">{{$errors->first('name')}}</span>
                                @endif
                                
                                <input type="text" value="{{$site_setting->address}}" name="address" class="mt-2 form-control">
                                @if($errors->has('address'))
                                 <span style="color:red;">{{$errors->first('address')}}</span>
                                @endif

                                <input type="text" value="{{$site_setting->contact_number}}" name="contact_no" class="mt-2 form-control">
                                @if($errors->has('contact_no'))
                                 <span style="color:red;">{{$errors->first('contact_no')}}</span>
                                @endif

                                <input type="text" value="{{$site_setting->contact_email}}" name="contact_email" class="mt-2 form-control">
                                @if($errors->has('contact_email'))
                                 <span style="color:red;">{{$errors->first('contact_email')}}</span><br>
                                @endif
                                <input type="submit" value="Update Setting" class="btn btn-sm btn-success mt-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection