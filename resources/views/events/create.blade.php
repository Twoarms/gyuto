@extends('layouts.app')

@section('stylesheet')
	<style type="text/css">
	    .lightbox{
	      z-index: 1041;
	    }
	    .medium-img{
	      width: 150px;height: 150px;
    	  padding: 1rem;
	    } 
  	</style>
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}

		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		    background-color: #fefefe;
		    margin: auto;
		    margin-left: 306px;
		    padding: 6px;
		    padding-left:35px;
		    border: 1px solid #888;
		    width: 95%;
		    height: 100vh;
		    margin-bottom: 20vh;
		}

		/* The Close Button */
		.close {
		    /*color: #aaaaaa;*/
		    color: #000;
		    float: right;
		    font-size: 28px;
		    font-weight: bold;
		    margin-left: 92rem;
		    padding-top: 0.5rem;
		}

		.close:hover,
		.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		}
		.detail {
			margin-right: 0px;
			margin-top: 75px;
		}

		.contenu {
			width: 88%;
			padding: 2px;
		}

		.card-body {
			width: 87%;
			padding: 2px;
		}
		
		.nav-tabs {
			border: none;
		}

		.col-sm-5{
      		padding-bottom: 5px;      
    	}		

		label[for='nameImage'] {
			margin-left: 20rem;
			margin-top: 15rem;
			margin-bottom: 15rem;
		}
		
		label[for='urlVideo'] {
			margin-top: 1.5rem;
		}
		
		.col-sm-7 {
			padding-left: 0;
			padding-right: 0px;
			margin-right: 0;
		}

		.col-sm-8 {
			padding-right: 0px;
			margin-left: 0px;
		}

		.card .col-sm-5 {
			padding-left: 0px;
			padding-right: 0;
			margin-right: 0px;
			width: 80vw;
		}

		.card-body {
			padding-right: 0px;
		}

		.card-header {
			padding-right: 10px;
		}

		/*.imageCover {
			height: 300px;
			padding: 0;
		}*/

		#myBtnIcA {
			margin-top: 180px;
			margin-left: 0px;
			padding-right: 10px;
		}
		.sizer {
		  width: 10%;
		  margin-bottom: 1rem;
		}
	</style>
@endsection

@section('title', "Dashboard - Création des Evènements")

@section('content')
	{!! Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'files' => true]) !!}
	<div class="form-group font-weight-bold">
		{{Form::label('title', 'Titre')}}
		{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Evènement']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('datestart', 'Date de début')}}
		{{Form::date('datestart', '', ['class' => 'form-control', 'placeholder' => '01-01-2018']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('dateend', 'Date de la fin')}}
		{{Form::date('dateend', '', ['class' => 'form-control', 'placeholder' => '14-01-2018']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('hourstart', 'Heure de début')}}
		{{Form::time('hourstart', '', ['class' => 'form-control', 'placeholder' => '10:00']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('hourend', 'Heure de la fin')}}
		{{Form::time('hourend', '', ['class' => 'form-control', 'placeholder' => '14:00']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('place', 'Place')}}
		{{Form::text('place', '', ['class' => 'form-control', 'placeholder' => 'Place']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('number', 'N° de la rue')}}
		{{Form::text('number', '', ['class' => 'form-control', 'placeholder' => '100']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('street', 'Rue')}}
		{{Form::text('street', '', ['class' => 'form-control', 'placeholder' => 'Nom de la Rue']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('zipCode', 'Code Postal')}}
		{{Form::text('zipCode', '', ['class' => 'form-control', 'placeholder' => 'Code Postal']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('city', 'Ville')}}
		{{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Ville']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('country', 'Pays')}}
		{{Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Pays']) }}
	</div>

	<div class="form-group font-weight-bold">
		{{Form::label('descriptionfr', 'Description FR')}}
		{{Form::textarea('descriptionfr', '', ['class' => 'form-control', 'placeholder' => 'Votre description en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('descriptionen', 'Description EN')}}
		{{Form::textarea('descriptionen', '', ['class' => 'form-control', 'placeholder' => 'Votre description en Anglais']) }}
	</div>

	<div class="card col-sm-5">
				<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images
				</div>
				<div class="card-body">	
			  		<br>
					<a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a>
				</div>
			</div>
			<div class="card col-sm-5 imageCover">
				<div class="card-header font-weight-bold" id="myBtnIc">Image mise en avant
				</div>
				<div class="card-body imageCover">	
			  		<br>
					<a href="#" class="btn btn-primary" id="myBtnIcA">Ajouter l'image mise en avant</a>
				</div>
			</div>
			<div id="myModal" class="modal">
			<!-- Modal content -->
				<div class="container-fluid">
					<div class="modal-content">
						<span class="close">&times;</span>
						<h1>Ajouter l'image à la galerie</h1>

				 		<div class="card contenu">
				 			<div class="row">
								<div class="col-sm-8 col-sm-offset-4">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
			      						<li class="nav-item">
			        						<a class="nav-link" id="televerser-tab" data-toggle="tab" role="tab" aria-controls="televerser" aria-selected="true" href="#televerser">Téléverser des fichiers</a>
			      						</li>
			      						<li class="nav-item">
			        						<a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Bibliothèque d'images</a>
			      						</li>
			      					</ul>
		      					</div>
	      					</div>
							<!-- Tab panes -->
							<div class="tab-content">
  								<div class="tab-pane active" id="biblio" role="tabpanel" aria-labelledby="biblio-tab">
  									<div class="row">
	  									<div class="card col-sm-7">
	  										<div class="card-body">
												@foreach($theimages as $theimage)
													<a onclick="getFocus('{{$theimage->id}}');"><img id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img"></a>
													<div>{{$theimage->nameImage}} {{ url('myimages/' . $theimage->nameImage) }}</div>
							  					@endforeach
											</div>
										</div>		
							  			<div class="card col-sm-5" id="smyBtnS">
											@include('inc.imagemodale', ['imageid' => $theimage->id])
										</div>
									</div>
								</div>
					  			<div class="tab-pane" id="televerser" role="tabpanel" aria-labelledby="televerser-tab">
									<div class="card">
						  				<div class="card-body">	
											<div class="form-group font-weight-bold">
												<input type="hidden" name="MAX_FILE_SIZE" value="20,000,000">
												{{Form::label('nameImage', 'Upload Image')}}
												{{Form::file('nameImage') }}
											</div>				
										</div>
									</div>
								</div>
  							</div>
			  			</div>				
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<br>	
	<div class="form-group font-weight-bold">
		<button type="submit" id="" class='btn btn-primary form-control' name="confirmer" value="confirmer">CONFIRMER</button>
		{!! Form::close() !!}
	</div>	
@endsection

@section('script')
    <script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name);
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result);
                        $('#preview').attr("name", e.target.result);
                        $('#gyuto').attr("value", that.files[0].name);
                        console.log(e.target.result);
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script>
    <script>
    	var modal = document.getElementById("myModal");
    	var btn = document.getElementById("myBtn");
    	var btnG = document.getElementById("myBtnG");
    	// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		var btnIc = document.getElementById("myBtnIc");
		var btnIcA = document.getElementById("myBtnIcA");
		var goBiblio = document.getElementById("myGoBiblio");

		var varCloseImg = document.getElementById("closeImg");

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		btnG.onclick = function() {
		    modal.style.display = "block";
		}

		btnIc.onclick = function() {
		    modal.style.display = "block";
		}

		btnIcA.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
    		modal.style.display = "none";
		}

		varCloseImg.onclick = function() {
    		modal.style.display = "none";
		}
		
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";		        
		    }
		}

		function getFocus(bout) {
			let varMyImg = document.getElementById("myImg" + bout);
			let filenameSrc = varMyImg.src;
    		let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
			document.getElementById("titleIFr").focus();			
			document.getElementById("preview").src = filenameSrc;
			document.getElementById("gyuto").setAttribute("value", filename);
		}

		var myNameImg = document.getElementById('nameImage');
		$(document).ready(function(){
    		myNameImg.addEventListener('change', function(){
        		$(".nav-tabs #biblio-tab").tab('show');
    			});
		});

	</script> 
@endsection