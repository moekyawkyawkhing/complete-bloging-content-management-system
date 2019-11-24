$(function(){
	$(".create").on("submit",function(event){

		event.preventDefault();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({

			url : "/create",
			type : "post",
			data : new FormData(this),
			dataType : "json",
			contentType : false,
			processData : false 

		}).done(function(response){

			location.reload();
			console.log(response);

		}).fail(function(){

			console.log("Failture!");

		});

	});
});