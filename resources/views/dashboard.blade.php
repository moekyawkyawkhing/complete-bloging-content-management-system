@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                @include('inc.post.button-group')
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="card m-3">
                    <p class="card-header text-center bg-success">
                        POSTS
                    </p>
                    <h3 class="text-center">{{$posts_count}}</h3>
                    </div>
                    <div class="card m-3">
                    <p class="card-header text-center bg-danger">
                        TRASHED_POSTS
                    </p>
                    <h3 class="text-center">{{$trashed_posts_count}}</h3>
                    </div>
                    <div class="card m-3">
                    <p class="card-header text-center bg-success">
                        USERS
                    </p>
                    <h3 class="text-center">{{$users_count}}</h3>
                    </div>
                    <div class="card m-3">
                    <p class="card-header text-center bg-success">
                        CATEGORIES
                    </p>
                    <h3 class="text-center">{{$categories_count}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
@endsection
