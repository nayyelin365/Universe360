@extends('layouts.main')
@include('layouts.app')
@section('content')

	<div class="container h-100" style="margin-top: 30px;">

		<a href="{{url('/lang')}}">
			<div class="form-group">
				<div class="ml-auto card " style="width: 200px;" >
		 			<div class="card-body"> 
		 				<h5><img src="{{url('images/setting.png')}}">Languages</h5> 
		 			</div>
		 			
		 		</div>
	 		</div>
 		</a>


		<!-- for choose language -->
		<div class="form-group">
			<div class="card">
				<div class="card-header">
		    		Language
		    		<span class="float-right">
						<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#languageDialog" data-whatever="@getbootstrap">
							<img src="{{url('images/add.png')}}">Add</img>
						</button>
					</span>	 
		  		</div>
		  		<div class="card-body">
		    		<div class="col-12">
	        			<ul class="list-group" id="add-language-list">
	           				@foreach($app_language_get_all as $app_lang)
	           					 
			    	 			<li class="list-group-item">

			    	 				<?php
			    	 					$puclic_check=$app_lang->public_access;
			    	 					if($puclic_check=='No'){ 

			    	 				?>
			    	 						<input style="margin-top: 7px;" type="checkbox"  value="{{$app_lang->language_id}}" name="lang" > 
			    	 				<?php
			    	 					}else{

			    	 				?>
			    	 						<input style="margin-top: 7px;" type="checkbox"  value="{{$app_lang->language_id}}" name="lang" checked> 
			    	 				<?php
			    	 					}
			    	 				?> 
			    	 				{{$app_lang->languages->language_name}}
			    	 				<a class="float-right" onclick="return confirm('Are you sure you want to remove this language ({{$app_lang->languages->language_name}}) from app?')" href="{{url('app_language_delete', $app_lang->id)}}"><img class="float-right" style="margin-left: 20px;" src="{{url('images/delete.png')}}" ></a> 
			    	 			</li> 
		    				@endforeach
	        			</ul>
	      			</div>
		  		</div>
			</div>
	  	</div>
	  	
	  	<!--Start Modals -->
		<!-- Add new language modal dialog -->
		<div class="modal fade" id="languageDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">
		        			Add Languages
		        		</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
			        	<form>
			          		<div class="form-group">
				            	<label for="recipient-name" class="col-form-label">
				            		Language:
				            	</label>

				            	<input type="hidden" name="app_id" id="app_id" value="{{$app_id[0]}}">

				            	<!-- @foreach($language_get_all as $lang)
				            		<div class="form-check">
											<input  type="checkbox" name="location[]" class="form-check-input" value="{{$lang->id}}" id="materialIndeterminate2">
											<label class="form-check-label" for="materialIndeterminate3">{{$lang->language_name}}</label>
										</div><br>
				            	@endforeach -->

				            	@foreach($language_get_all as $lang)
 									<?php $status = false;
 									 ?>
 									@foreach($app_language_get_all as $app) 


 										<?php  
 										 	if($lang->id == $app->language_id){
 										 		$status=true;
 										 		break;

 										 	}
 										 ?>
									@endforeach

									<?php if ($status==true){ ?>
										<div class="form-check">
												<input checked type="checkbox" name="location[]" class="form-check-input" value="{{$lang->id}}" id="materialIndeterminate2">
												<label class="form-check-label" for="materialIndeterminate3">{{$lang->language_name}}</label>
												</div><br>
									<?php }else{ ?>

												<div class="form-check">
												<input type="checkbox" name="location[]" class="form-check-input" value="{{$lang->id}}" id="materialIndeterminate2">
												<label class="form-check-label" for="materialIndeterminate3">{{$lang->language_name}}</label>
												</div><br>
									<?php } ?>


				            	@endforeach
			            	</div>
			          	</form> 
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        		<button type="button" class="btn btn-primary" id="btnAddLanguage" data-dismiss="modal">Add</button>
		      		</div>
		    	</div>
		  	</div>
		</div>

		<!--  choose translation -->
	    <form  action="{{url('description/update')}}" method="POST" enctype="multipart/form-data">
	    	@csrf
	     	<div class="form-group">
	        	<div class="card">
			  		<div class="card-header">
			    		Translation 
			  		</div>
			  		<div class="card-body">
			    		<div class="col-12">
			    			@foreach($keys as $key)
		        				<ul class="list-group" id="add-language-key">
		        					<li class="list-group-item">
		        						{{$key->key_name}}
		        						<ul style="margin-top: 20px;" >
		        							@foreach($key->language_keys->whereIn('language_id',$languageIds) as $languageKey)
		        								<li class="list-group-item">
		        									{{$languageKey->key_description}}<br>
		        									{{substr($languageKey->language_audio, 13)}}<br>
		        									<audio controls style="width: 100%; max-width: 100px;">
												  		<source src="http://localhost/Universe360/{{$languageKey->language_audio}}" type="audio/ogg">
													</audio>
		        									
		        								</li>
		        							@endforeach
		        						</ul>
		        					</li>	          
		        				</ul>
		        			@endforeach
		      			</div>
			  		</div>
				</div>
	      	</div> 
	  	</form>

	<script type="text/javascript">
		/*To check whether access or not language*/
		$(function()
	    {
	        $('input[name=lang]').change(function(){
			    if($(this).is(':checked')) {
			     	setLanguageStatus(this.value);
			    }
			    else{
			    	unsetLanguageStatus(this.value);
			    }
			});
			$( "desupdate" ).click(function() {
			  alert(this.value);
			});
	    });
		//Change public_access  to the language
		function setLanguageStatus(id){
			alert(id);
	    	$.ajax({
	    		url: "{!! url('aa') !!}",
	    		type: "POST",
	    		data: {"id": id,"_token":"{{ csrf_token() }}"},
	    		success:function(data){
	    			console.log(data);
	    		}
	    	});
	    }
	    //Change not public_access  to the language
	    function unsetLanguageStatus(id){
	    	$.ajax({
	    		url: "{!! url('bb') !!}",
	    		type: "POST",
	    		data: {"id": id,"_token":"{{ csrf_token() }}"},
	    		success:function(data){
	    			console.log(data);
	    		}
	    	});
	    }

	    var btnLanguageAdd = document.getElementById("btnAddLanguage"); 
		btnLanguageAdd.addEventListener("click", function() {
			var checkboxes = document.getElementsByName('location[]');
			//var vals = "";
			var langIds=[];
			for (var i=0, n=checkboxes.length;i<n;i++) 
			{
			    if (checkboxes[i].checked) 
			    {
			    	langIds.push(checkboxes[i].value);
			        //vals += ","+checkboxes[i].value;
			    }
			}
			//if (vals) vals = vals.substring(1);
			var app_id = document.getElementById('app_id');
			appId=app_id.value;
			alert("app id"+appId+"size"+langIds.length);

			setAppLanguages(appId,langIds);
			
		})
		function setAppLanguages(appId,langIds){
			alert("app:   "+langIds.length);
	    	$.ajax({
	    		url: "{!! url('new_app_language/store') !!}",
	    		type: "POST",
	    		data: {"app_id": appId,"langIds": langIds,"_token":"{{ csrf_token() }}"},
	    		success:function(data){
	    			console.log(data);
	    		}
	    	});
	    }

	</script>    
</body>
@endsection