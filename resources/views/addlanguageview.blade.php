@extends('layouts.main')
@section('content')
<body style="background: #174F15;">  
	<div class="container h-100" style="margin-top: 30px;background: #174F15;">
		<!-- for choose language -->
		<h1 style="color:#007bff;">Add New Language</h1>
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
	           					<?php 
	           						$v=$lang->language_name;
	           					?>
			    	 			<li class="list-group-item">
			    	 				{{$lang->language_name}} 
			    	 				<input class="float-right" type="checkbox"  value="{{$lang->id}}" name="lang">
			    	 			</li> 
		    				@endforeach
	        			</ul>
	      			</div>
		  		</div>
			</div>
	  	</div>
	    <!--  choose translation -->
	    <form class="col-12" action="{{url('description/update')}}" method="POST" enctype="multipart/form-data">
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
		        						<ul>
				        					@foreach($key_des->language_keys as $languageKey)
					        					<li class="list-group-item ">
					        			 			<textarea name="key_description_{{$languageKey->id}}" value="{{$languageKey->key_description}}"  class="col-8" style="height: 200px;">
					        			 				{{$languageKey->key_description}}
					        			 			</textarea> 
					        			 			<input class="float-center" type="file" name="Choose File"/>
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
		        		<button type="button" class="btn btn-primary" id="btnAdd" data-dismiss="modal">Add</button>
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
				        <button type="button" class="btn btn-primary" id="btnAddkey" data-dismiss="modal">Add</button>
				    </div>
				</div>
			</div>
		</div>
	</div> 
	<script type="text/javascript">	
		/*add language script*/
		var btnLanguageAdd = document.getElementById("btnAdd"); 
		btnLanguageAdd.addEventListener("click", function() {

		   var ul = document.getElementById("add-language-list");
		    var candidate = document.getElementById("choose_language");
		    var li = document.createElement("li");
		    li.className = 'list-group-item'; 
		    li.setAttribute('id',candidate.value);
		    li.appendChild(document.createTextNode(candidate.value));
		    li.innerHTML += "<span class='float-right'> <input type='checkbox' onclick='console.log(select.toString)' value='Select' /></span>";
		      ul.appendChild(li);
		})

		/*add keys script*/
		var btnKeyAdd = document.getElementById("btnAddkey"); 
		btnKeyAdd.addEventListener("click", function() {
		 var ul = document.getElementById("add-language-key");
		    var candidate = document.getElementById("choose_language_key");

		    var li = document.createElement("li");
		    li.className = 'list-group-item'; 
		    li.setAttribute('id',candidate.value);
		    li.appendChild(document.createTextNode(candidate.value));
		    li.innerHTML += "<div class='row'><div class='col col-8'><input class='form-control' type='text'/></div><div class='col col-2'><input type='file' value='Select' /></div></div>";

				ul.appendChild(li); 
		    
		})

		/*for file choose get path*/
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
	</script>
</body>
@endsection