@extends('layouts.main')
@include('layouts.app')
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
    	@foreach($language_get_all as $lang) 
    	<div class="card col-lg-3 col-md-6">
		  <img class="card-img-top" src="images/add.png" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title">{{$lang->language_name}} </h5>
		    <p class="card-text">{{$lang->language_name}} </p>
		    <a class="btn btn-primary" href="{{url('/change_language', $lang->id)}} ">Go</a>
		  </div>
		</div> 		
		 @endforeach
	</div>
</div> 

@endsection