@extends('layouts.app')

@section('stylesheet')
	<!-- {!! Html::style('css/select2.min.css') !!} -->
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

		label[for='nameImage'] {
			margin-left: 20rem;
			margin-top: 15rem;
			margin-bottom: 15rem;
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

		.imageCover {
			height: 300px;
			padding: 0;
		}

		#myBtnIcA {
			margin-top: 180px;
			margin-left: 0px;
			padding-right: 10px;
		}
		#myBtnIcA {
			margin-top: 10px;
		}
	</style>
@endsection

@section('title', "Dashboard - Création de Musiques")

@section('content')
	{!! Form::open(['route' => ['musics.update', $music->id], 'method' => 'PUT', 'files' => true]) !!}
	<h2>CONCERT</h2>
	<div class="form-group font-weight-bold">
		{{Form::label('urlVideoMusic', 'URL Vidéo Musique')}}
		{{Form::text('urlVideoMusic', $music->urlVideoMusic, ['class' => 'form-control', 'placeholder' => 'URL de votre Vidéo Musique']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('legendMFr', 'Légende FR')}}
		{{Form::text('legendMFr', $music->legendMFr, ['class' => 'form-control', 'placeholder' => 'Légende de votre Vidéo Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('legendMEn', 'Légende EN')}}
		{{Form::text('legendMEn', $music->legendMEn, ['class' => 'form-control', 'placeholder' => 'Légende de votre Vidéo Musique en Anglais']) }}
	</div>
	<h2>INFORMATIONS</h2>
	<div class="form-group font-weight-bold">
		{{Form::label('titleMFr', 'Titre FR')}}
		{{Form::text('titleMFr', $music->titleMFr, ['class' => 'form-control', 'placeholder' => 'Titre de votre Texte Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleMEn', 'Titre EN')}}
		{{Form::text('titleMEn', $music->titleMEn, ['class' => 'form-control', 'placeholder' => 'Titre de votre Texte Musique en Anglais']) }}
	</div>

	<div class="form-group font-weight-bold">
		{{Form::label('textMFr', 'Texte FR')}}
		{{Form::textarea('textMFr', $music->titleMFr, ['class' => 'form-control', 'placeholder' => 'Votre Texte Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('textMEn', 'Texte EN')}}
		{{Form::textarea('textMEn', $music->titleMEn, ['class' => 'form-control', 'placeholder' => 'Votre Texte Musique en Anglais']) }}
	</div>
	<h2>ALBUMS</h2>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleAlbum', 'Titre Album FR')}}
		{{Form::text('titleAlbum', $music->titleAlbum, ['class' => 'form-control', 'placeholder' => 'Titre de votre Album Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('urlAlbumMusicCdeFr', 'URL Album Music Commander Fr')}}
		{{Form::text('urlAlbumMusicCdeFr', $music->urlAlbumMusicCdeFr, ['class' => 'form-control', 'placeholder' => 'URL de votre Album Music à commander Fr']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('urlAlbumMusicCdeEn', 'URL Album Music Commander En')}}
		{{Form::text('urlAlbumMusicCdeEn', $music->urlAlbumMusicCdeEn, ['class' => 'form-control', 'placeholder' => 'URL de votre Album Music à commander En']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('urlMusic', 'URL Musique')}}
		{{Form::text('urlMusic', $music->urlMusic, ['class' => 'form-control', 'placeholder' => 'URL de votre Musique']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('titleMusic', 'Titre Musique')}}
		{{Form::text('titleMusic', $music->titleMusic, ['class' => 'form-control', 'placeholder' => 'Titre de votre Musique']) }}
	</div>

<div class="card">
				<div class="card-header font-weight-bold" id="myBtnG">Galerie de média
				</div>
				<div class="card-body">
					@if ($music->imagepages()->count() > 0)	
						@foreach($music->imagepages as $theimage)
							<img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
			  			@endforeach
			  		@endif			
			  		<br>
					<a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a>
				</div>
			</div>
			<div class="card col-sm-4 imageCover">
				<div class="card-header font-weight-bold" id="myBtnIc">Image mise en avant
				</div>
				<div class="card-body imageCover">	
					@if ($music->imagepages()->count() > 0)	
						@foreach($music->imagepages as $theimage)
							@if ($theimage->cover == '1')
							<img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
							@endif
			  			@endforeach
			  		@endif		
			  		<br>
			  		</div>
					<a href="#" class="btn btn-primary" id="myBtnIcA">Ajouter l'image mise en avant</a>
				
			</div>
			 <div id="myModal" class="modal">
			<!-- Modal content -->
			 <div class="container-fluid">
			<div class="modal-content">
				<span class="close">&times;</span>
				<h1>Ajouter le média à la galerie</h1>

				 <div class="card contenu">
				 	<div class="row">
						<div class="col-sm-8 col-sm-offset-4">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
			      				<li class="nav-item">
			        				<a class="nav-link" id="televerser-tab" data-toggle="tab" role="tab" aria-controls="televerser" aria-selected="true" href="#televerser">Téléverser des fichiers</a>
			      				</li>
			      				<li class="nav-item">
			        				<a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Bibliothèque de média</a>
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
											<a onclick="getFocus('{{$theimage->id}}');">
												<img id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img"></a>
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
			<div class="form-group font-weight-bold">
		<button type="submit" id="" name="confirmer" value="confirmer">CONFIRMER</button>
		{!! Form::close() !!}
			</div>
	<!-- 	<div class="form-group font-weight-bold">
		{{Form::submit('CONFIRMER', ['class' => 'btn btn-primary form-control']) }}
		{!! Form::close() !!}
			</div> -->
		</div>
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
	<!-- {!! Html::script('js/select2.full.min.js') !!} -->
@endsection