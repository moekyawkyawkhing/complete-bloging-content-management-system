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
                    <p class="card-header">User</p>
                    <table class="table hover">
                        <thead>
                            <td>Image</td>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                           @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{$user->profile ? asset('images/avator/'.$user->profile->avatar) : 'https://via.placeholder.com/150C/O https://placeholder.com/'}}" style="width:70px;height: 70px;" class="img-thumbnail">
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    @if($user->admin)
                                        <a href="{{route('user.remove.admin',$user->id)}}" class="btn btn-sm
                                        btn-danger">remove admin</a>
                                        @else
                                        <a href="{{route('user.add.admin',$user->id)}}" class="btn btn-sm
                                        btn-success">change to admin</a>
                                    @endif
                                </td> 
                                <td>
                                   <a href="{{route('user.delete',$user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                </td>                               
                            </tr>
                           @endforeach
                        </tbody>
                    </table>

                    <div class="m-3">
                        {{$users->render()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
