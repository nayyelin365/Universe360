@extends('layouts.app')
@section('style')
<style>
	.card{
		margin: 2px;
	}
	.row{
		margin: 5px;
	}
</style>
@stop
@section('content') 	

<div class="container" >
    <div class="row justify-content-md-center">
    	@foreach($app_get_all as $app) 
    	<div class="card col-lg-3 col-md-6" style="margin: 10px;">
		  <img class="card-img-top" src="{{$app->app_image}}" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title">{{$app->app_name}} </h5>
		    <p class="card-text">{{$app->app_name}} </p>
		    <a class="btn btn-primary" href="{{url('/app_language', $app->id)}} " style="width: 220px;">Go</a>
		  </div>
		</div> 		
		 @endforeach
	</div>
</div> 

@endsection