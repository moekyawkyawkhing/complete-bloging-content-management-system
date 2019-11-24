<div class="row m-2">
	<div class="col-md-8 offset-md-2 well">
		<form class="form-group create" method="post">
			  <textarea class="form-control" name="text" placeholder="write something" rows="5"></textarea>
			  <input type="submit" class="btn btn-success"  value="Create">		      
		</form>

		<ul class="list-group">
		  @foreach($data as $datas)
		  <li class="list-group-item">{{$datas->text}}</li>
		  @endforeach
		</ul>

		<div class="col-sm-offset-5 m-3">
			{{$data->render()}}
		</div>
	

	</div>
</div>
