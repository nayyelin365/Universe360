<!DOCTYPE html>
<html>
<head>
	<title>Add Multiple Language</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background: #174F15;">  

<!-- for choose language -->
<div class="container h-100" style="margin-top: 30px;background: #174F15;">
  <div class="row h-100 justify-content-center align-items-center">
    <form class="col-12">
    	<h1 style="color:#007bff;">Add New Language</h1>
      <div class="form-group">
        <div class="card">
		  <div class="card-header">
		    Language  <span class="float-right">
					 <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#languageDialog" data-whatever="@getbootstrap"><img src="images/add.png">Add</img></button></span>
				 
		  </div>
		  <div class="card-body">
		    <div class="col-12">
	        <ul class="list-group" id="add-language-list">
	           
	        </ul>
	      </div>
		  </div>
		</div>
      </div>


     <!--  choose translation -->
     <div class="form-group">
        <div class="card">
		  <div class="card-header">
		    Translation  <span class="float-right">
					 <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#choose_translation" data-whatever="@getbootstrap"><img src="images/add.png">Add</img></button></span>
				 
		  </div>
		  <div class="card-body">
		    <div class="col-12">
	        <ul class="list-group" id="add-language-key">	          
	        </ul>
	      </div>
		  </div>
		  <div class="float-right" style="text-align:right;margin: 20px;">
		  	<button class="btn btn-primary">Cancel</button>
		  	<button class="btn btn-primary">Save</button>
		  </div>
		</div>
      </div>

<!-- choose language dialog -->
	<div class="modal fade" id="languageDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Languages</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Language:</label>
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
	    </form>   
	  </div>
	</div>
	<h1>hiii</h1>

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
	    </form>   
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
		    li.innerHTML += "<input type='text'/><span class='float-right'> <input type='file' value='Select' /></span>";

				ul.appendChild(li); 
		    
		})

		/*for file choose get path*/
		$(function()
	    {
	        $('#fileUpload').on('change',function ()
	        {
	            var filePath = $(this).val();
	            alert(filePath);
	        });
	    });

	</script>
</body>
</html>