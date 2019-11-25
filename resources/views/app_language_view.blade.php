@extends('layouts.main')
@include('layouts.app')
@section('content')
 	<div class="container h-100" style="margin-top: 30px;">

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
			    	 						<input style="margin-top: 7px;" type="checkbox"  value="{{$app_lang->id}}" name="lang" > 
			    	 				<?php
			    	 					}else{

			    	 				?>
			    	 						<input style="margin-top: 7px;" type="checkbox"  value="{{$app_lang->id}}" name="lang" checked> 
			    	 				<?php
			    	 					}
			    	 				?> 
			    	 				{{$app_lang->languages->language_name}}
			    	 				<a class="float-right" onclick="return confirm('Are you sure you want to remove this language ({{$app_lang->languages->language_name}})?')" href="{{url('language_delete', $app_lang->id)}}"><img class="float-right" style="margin-left: 20px;" src="{{url('images/delete.png')}}" ></a> 
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
				            	<!-- <input type="text" class="form-control" id="choose_language"> -->
				            	@foreach($language_get_all as $lang)
				            	<br>
				            	<!-- Material indeterminate -->
								<div class="form-check">
								  <input type="checkbox" class="form-check-input" id="materialIndeterminate2">
								  <label class="form-check-label" for="materialIndeterminate2">{{$lang->language_name}}</label>
								</div><br>
				            	 
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
			    		<span class="float-right">
							<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#choose_translation" data-whatever="@getbootstrap">
								 <img src="{{url('images/add.png')}}">Add 
							</button>
						</span>
			  		</div>
			  		<div class="card-body">
			    		<div class="col-12">
			    			@foreach($app_language_key_get_all as $app_lang_key)
		        				<ul class="list-group" id="add-language-key">
		        					<li class="list-group-item">{{$app_lang_key->key_name}}
		        						<ul style="margin-top: 20px;" >
				        					@foreach($app_lang_key->language_keys as $app_lang_key_value)
					        					<li  class="list-group-item"> 
					        			 			{{$app_lang_key_value->key_description}}
					        			 			<br>
					        			 			{{substr($app_lang_key_value->language_audio, 13)}}<br>
					        			 			<audio controls style="width: 100%; max-width: 100px;">
												  		<source src="http://localhost/Universe360/{{$app_lang_key_value->language_audio}}" type="audio/ogg">
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
	  	<!-- <div>
	  		<ul>
	  			@foreach($app_language_key_get_all as $app_lang_key)
	  				<li>
	  					{{$app_lang_key->key_name}}
	  				</li>
	  				<li>
	  					<ul>
		  					@foreach($app_lang_key->language_keys as $app_lang_key_value)
				  				<li>
				  					{{$app_lang_key_value->key_description}}
				  				</li>
				  				<li>
				  					{{$app_lang_key_value->language_audio}}
				  				</li>
		  					@endforeach
		  				</ul>
	  				</li>
	  			@endforeach
	  		</ul>
	  	</div> -->

	    
</body>
@endsection