<div class="btn-group-vertical card ml-3">
    <a href="{{url('admin/dashboard')}}"><p class="card-header text-center">Home</p></a>
       <a href="{{route('category')}}" class="btn btn-info mt-1 mb-1">Categories</a>
       <a href="{{route('category.create')}}" class="btn btn-info mt-1 mb-1">Create categories</a>
       <a href="{{route('post')}}" class="btn btn-info mt-1 mb-1">All posts</a>
       <a href="{{route('tag')}}" class="btn btn-info mt-1 mb-1">All tags</a>
       <a href="{{route('tag.create')}}" class="btn btn-info mt-1 mb-1">Create tags</a>
       <a href="{{route('user.profile')}}" class="btn btn-info mt-1 mb-1">My profile</a>
       @if(Auth::user()->admin)
            <a href="{{route('user')}}" class="btn btn-info mt-1 mb-1">All users</a>
            <a href="{{route('user.create')}}" class="btn btn-info mt-1 mb-1">Create users</a>
            <a href="{{route('site.setting')}}" class="btn btn-info mt-1 mb-1">Site setting</a>
       @endif
       <a href="{{route('post.trash')}}" class="btn btn-info mt-1 mb-1">All trash posts</a>
       <a href="{{route('post.create')}}" class="btn btn-info mt-1 mb-1">Create posts</a>           
 </div>