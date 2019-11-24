@extends('layouts.app')
@section('content')

<div class="col-md-8 offset-md-2 card mt-5">
	<form class="form-group m-3" method="Post" action="{{url('todolist/update/'.$todo_edit->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="Patch">
		<input type="text" name="todo" class="form-control" value="{{$todo_edit->sentence}}">
	</form>
</div>

@endsection

