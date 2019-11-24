@extends('layouts.app')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
               @include('inc.post.button-group')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <p class="card-header">Create A Post</p>
                    <div class="row mt-2">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-group" method="Post" action="{{route('post.store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="text" placeholder="title" name="title" class="mt-2 form-control">
                                @if($errors->has('title'))
                                 <span style="color:red;">{{$errors->first('title')}}</span>
                                @endif
                                <select class="form-control mt-2 mb-2" name="category">
                                    <option disabled>Select A Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label for="tag">Select tag</label><br>
                                    @foreach($tags as $tag)
                                        <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->tag}} <br>
                                    @endforeach
                                <input type="file"  name="feature" class="mt-2 form-control">
                                @if($errors->has('feature'))
                                 <span style="color:red;">{{$errors->first('feature')}}</span><br>
                                @endif
                                    <textarea placeholder="content" name="content" id="content" class="mt-3 form-control"></textarea>
                                @if($errors->has('content'))
                                 <span style="color:red;">{{$errors->first('content')}}</span>
                                @endif
                                <input type="submit" value="Store Post" class="btn btn-sm btn-success mt-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#content').summernote({
        placeholder: 'content',
        tabsize: 2,
        height: 100,
      });
        });
    </script>
@endsection
