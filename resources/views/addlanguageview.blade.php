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
							<img src="images/add.png">Add</img>
						</button>
					</span>	 
		  		</div>
		  		<div class="card-body">
		    		<div class="col-12">
	        			<ul class="list-group" id="add-language-list">
	           				@foreach($language_get_all as $lang)
	           					 
			    	 			<li class="list-group-item">

			    	 				<?php
			    	 					$puclic_check=$lang->public_access;
			    	 					if($puclic_check=='No'){ 

			    	 				?>
			    	 						<input style="margin-top: 7px;" type="checkbox"  value="{{$lang->id}}" name="lang" > 
			    	 				<?php
			    	 					}else{

			    	 				?>
			    	 						<input style="margin-top: 7px;" type="checkbox"  value="{{$lang->id}}" name="lang" checked> 
			    	 				<?php
			    	 					}
			    	 				?> 
			    	 				{{$lang->language_name}} 

			    	 				<img onclick="deleteLanguage('{{$lang->id}}')" class="float-right" style="margin-left: 20px;" src="images/delete.png" >

			    	 				<img src="images/edit.png" data-toggle="modal" data-id="{{$lang->id}}" data-name="{{$lang->language_name}}" title="Add this item" class="open-UpdateLanguageDialog" href="#updateLanguageDialog">

			    	 				
			    	 			</li> 
		    				@endforeach
	        			</ul>
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
								<img src="images/add.png">Add</img>
							</button>
						</span>
			  		</div>
			  		<div class="card-body">
			    		<div class="col-12">
			    			@foreach($language_key_des as $key_des)
		        				<ul class="list-group" id="add-language-key">
		        					<li class="list-group-item">{{$key_des->key_name}}
		        						<img src="images/edit.png" data-toggle="modal" data-id="{{$key_des->key_name}}" data-name="{{$key_des->key_name}}" title="Add this item" class=" open-UpdateKeyDialog float-right" href="#updateKeyDialog">

		        						<img src="images/delete.png" class="float-right" onclick="deleteKey('{{$key_des->id}}')">
		        						<ul style="margin-top: 20px;" >
				        					@foreach($key_des->language_keys as $languageKey)
					        					<li  class="list-group-item"> 
					        			 			 
					        			 			<textarea 
					        			 			
					        			 			name="key_description_{{$languageKey->id}}" value="{{$languageKey->key_description}}"class="col-12 text-left" placeholder="{{$languageKey->languages->language_name}}" style="height: 100px;">{{$languageKey->key_description}}</textarea>
					        			 			<input class="float-center" type="file" accept=".ogg" value="{{$languageKey->language_audio}}" name="audio_{{$languageKey->id}}"/>
					        			 			{{substr($languageKey->language_audio, 13)}}
					        			 			<audio controls>
												  		<source src="http://localhost/Universe360/{{$languageKey->language_audio}}" type="audio/ogg">
													</audio>
					        			 			<input class="float-center" type="hidden" value="{{$languageKey->language_audio}}" name="audio_{{$languageKey->id}}"/>
					        			 			<a href="http://localhost/Universe360/{{$languageKey->language_audio}}" class="float-right"><img src="images/sound.png" width="20" height="20"></a>
					        		 			</li>
				        					@endforeach
		        						</ul>
		        					</li>	          
		        				</ul>
		        			@endforeach
		      			</div>
			  		</div>
			  		<div class="float-right" style="text-align:right;margin: 20px;">
			  			<button class="btn btn-primary">Cancel</button>
			  			<button class="btn btn-primary">Save</button>
			  		</div>
				</div>
	      	</div> 
	  	</form>

		<!-- choose language dialog -->
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
				            	<input type="text" class="form-control" id="choose_language">
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



		<!-- update language dialog -->

		<div class="modal fade" id="updateLanguageDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">
		        			Update Languages
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
				            	<input type="hidden" name="languageid" value="" class="form-control" id="languageid" >
				            	<input type="text" name="languagename" value="" class="form-control" id="languagename" >
			            	</div>
			          	</form> 
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        		<button type="button"  class="btn btn-primary" id="btnUpdateLanguage" data-dismiss="modal">Update</button>
		      		</div>
		    	</div>
		  	</div>
		</div>


		<!-- update key dialog -->

		<div class="modal fade" id="updateKeyDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">
		        			Update Key
		        		</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
			        	<form>
			          		<div class="form-group">
				            	<label for="recipient-name" class="col-form-label">
				            		Key:
				            	</label> 
				            	<input type="hidden" name="keyid" value="" class="form-control" id="keyid" >
				            	<input type="text" name="keyname" value="" class="form-control" id="keyname" >
			            	</div>
			          	</form> 
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        		<button type="button"  class="btn btn-primary" id="btnUpdateLanguage" data-dismiss="modal">Update</button>
		      		</div>
		    	</div>
		  	</div>
		</div>


		<!-- choose language key dialog -->
		<div class="modal fade" id="choose_translation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				    <div class="modal-header">
				    	<h5 class="modal-title" id="exampleModalLabel">Add Keys</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        	<span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				        <form>
				         	<div class="form-group">
				            	<label for="recipient-name" class="col-form-label">Key name:</label>
				            	<input type="text" class="form-control" id="choose_language_key">
				          	</div>
				        </form>
				    </div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				        <button type="button" class="btn btn-primary" id="btnAddkey" data-dismiss="modal">Add Keys</button>
				    </div>
				</div>
			</div>
		</div>
	</div> 

	<script type="text/javascript">	

		/*add language script*/
		var btnLanguageAdd = document.getElementById("btnAddLanguage"); 
		btnLanguageAdd.addEventListener("click", function() {
			var candidate = document.getElementById("choose_language"); 

		    setLanguage(candidate.value);
		   
		})

		/*laguage update script*/
		var btnLanguageUpdate = document.getElementById("btnUpdateLanguage"); 
		 		btnLanguageUpdate.addEventListener("click", function() {
				var id = document.getElementById("languageid"); 
				var name=document.getElementById("languagename");
				
				languageUpdate(id.value,name.value);

				alert(id.value+name.value);
				   
			}) 
		 function languageUpdate(id,name){
		 	$.ajax({
	    		url: "{!! url('language_update') !!}",
	    		type: "POST",
	    		data: {"id": id,"language_name":name,"_token":"{{ csrf_token() }}"},
	    		success:function(data){

	    			console.log(data);
	    		}
	    	});
		 }
 

		/*add keys script*/
		var btnKeyAdd = document.getElementById("btnAddkey"); 
		btnKeyAdd.addEventListener("click", function() {
		 var ul = document.getElementById("add-language-key");
		    var candidate = document.getElementById("choose_language_key");
			alert(candidate.value);
		    setLanguageKey(candidate.value);
		    
		})

		/*for checkbox language path*/
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

		function setLanguageStatus(id)
	    {
	    	$.ajax({
	    		url: "{!! url('set-lang-public-access') !!}",
	    		type: "POST",
	    		data: {"id": id,"_token":"{{ csrf_token() }}"},
	    		success:function(data){

	    			console.log(data);
	    		}
	    	});
	    }

	    function unsetLanguageStatus(id)
	    {
	    	$.ajax({
	    		url: "{!! url('unset-lang-public-access') !!}",
	    		type: "POST",
	    		data: {"id": id,"_token":"{{ csrf_token() }}"},
	    		success:function(data){

	    			console.log(data);

	    		}
	    	});
	    }
	    function setLanguage(id){
	    	$.ajax({
	    		url:"{!! url('language/store')!!}",
	    		type:"POST",
	    		data:{"language_name":id,"_token":"{{csrf_token()}}"},
	    		success:function(data){
	    			alert("insert successfully ");
	    		}

	    	})
	    }
	    function setLanguageKey(id){
	    	$.ajax({
	    		url: "{!! url('language_key/store') !!}",
	    		type:"POST",
	    		data: {"key_name": id,"_token":"{{csrf_token()}}"},
	    		success:function(data){
	    			alert("insert successfully");
	    		},
	    		error:function(data){
	    			alert("This key is already exist.Must be Unique Key ");
	    		}
	    	})
	    }
	    function deleteKey(id){
	    	 $.ajax({
	    		url: "{!! url('key_delete') !!}",
	    		type: "POST",
	    		data: {"id": id,"_token":"{{ csrf_token() }}"},
	    		success:function(data){

	    			console.log(data);
	    		}
	    	});
	    }
	    function deleteLanguage(id){
	    	$.ajax({
	    		url: "{!! url('language_delete') !!}",
	    		type: "POST",
	    		data: {"id": id,"_token":"{{ csrf_token() }}"},
	    		success:function(data){

	    			console.log(data);
	    		}
	    	});
	    }

	    //update language script
	    $(document).on("click", ".open-UpdateLanguageDialog ", function () {
		     var languageId = $(this).data('id');
		     var languageName = $(this).data('name');
		     $(".modal-body #languageid").val( languageId);   
		     $(".modal-body #languagename").val( languageName);
		    	     
		});

	    //update key script
		$(document).on("click", ".open-UpdateKeyDialog ", function () {
		     var keyId = $(this).data('id');
		     var keyName = $(this).data('name');
		     $(".modal-body #keyid").val( keyId);   
		     $(".modal-body #keyname").val( keyName);
		    	     
		});
		 

	</script>
</body>
@endsection