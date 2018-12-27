@extends('layouts.app')

@section('stylesheet')
<style type="text/css">
    .lightbox{
		z-index: 1041;
	}
	.medium-img{
	    width: 150px;
	    height: 150px;
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
	    margin-bottom: 20vh;
	}
	/* The Close Button */
	.close {
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
	#myBtnIcA {
		margin-top: 0.5rem;
		margin-left: 0px;
		padding-right: 10px;
	}
	.sizer {
		width: 10%;
		margin-bottom: 1rem;
	}
	.btn-group {
		margin-top: 0.5rem;
	}
	#saveImg {
		margin-left: 0.5rem;
	}
</style>
@endsection

@section('title', "Dashboard - Création des Evènements")

@section('content')
<div class="container-fluid">
	<div class="card-body"> 
		{!! Form::open(['route' => ['events.update', $event->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="form-group font-weight-bold">
			{{Form::label('title', 'Titre')}}
			{{Form::text('title', $event->title, ['class' => 'form-control', 'placeholder' => 'Titre de votre Evènement']) }}
		</div>	
		<div class="form-group font-weight-bold">
			{{Form::label('datestart', 'Date de début')}}
			{{Form::date('datestart', $event->datestart, ['class' => 'form-control', 'placeholder' => '01-01-2018']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('dateend', 'Date de la fin')}}
			{{Form::date('dateend', $event->dateend, ['class' => 'form-control', 'placeholder' => '14-01-2018']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('hourstart', 'Heure de début')}}
			{{Form::time('hourstart', $event->hourstart, ['class' => 'form-control', 'placeholder' => '10:00']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('hourend', 'Heure de la fin')}}
			{{Form::time('hourend', $event->hourend, ['class' => 'form-control', 'placeholder' => '14:00']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('place', 'Place')}}
			{{Form::text('place', $event->place, ['class' => 'form-control', 'placeholder' => 'Place']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('number', 'N° de la rue')}}
			{{Form::text('number', $event->number, ['class' => 'form-control', 'placeholder' => '100']) }}
		</div>	
		<div class="form-group font-weight-bold">
			{{Form::label('street', 'Rue')}}
			{{Form::text('street', $event->street, ['class' => 'form-control', 'placeholder' => 'Nom de la Rue']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('zipCode', 'Code Postal')}}
			{{Form::text('zipCode', $event->zipCode, ['class' => 'form-control', 'placeholder' => 'Code Postal']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('city', 'Ville')}}
			{{Form::text('city', $event->city, ['class' => 'form-control', 'placeholder' => 'Ville']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('country', 'Pays')}}
			{{Form::text('country', $event->country, ['class' => 'form-control', 'placeholder' => 'Pays']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('descriptionfr', 'Description FR')}}
			{{Form::textarea('descriptionfr', $event->descriptionfr, ['class' => 'form-control', 'placeholder' => 'Votre description en Français']) }}
		</div>	
		<div class="form-group font-weight-bold">
			{{Form::label('descriptionen', 'Description EN')}}
			{{Form::textarea('descriptionen', $event->descriptionen, ['class' => 'form-control', 'placeholder' => 'Votre description en Anglais']) }}
		</div>
		<div class="container-fluid">
	        <div class="card col-sm-7">
	          	<div class="card-header font-weight-bold" id="myBtnIc">Image cover Evènements
	          	</div>
	          	<div class="card-body imageCover">  
	            	@if (isset($event->imagepage_id)) 
	              		<img src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-thumbnail" id="myBtn{{$theimage->id}}">
	              		<a href="#" class="btn btn-primary" id="myBtnIcA">MAJ Mise en avant</a>
	              		<br>
	              	@else
	              	<a href="#" class="btn btn-primary" id="myBtnIcA">Ajouter l'image cover Evènements</a>  
	            	@endif    
	          </div>        
	        </div>
	    </div>
	    <div id="myModal" class="modal">
	    	<!-- Modal content -->
	    	<div class="modal-content">
	      	<div class="container">
	        	
		          	<span class="close">&times;</span>
		          	<h1>Ajouter l'image à la galerie</h1>
		          	<div class="card contenu">
		            	<div class="row">
		              		<div class="col-sm-8 col-sm-offset-4">
		                		<ul class="nav nav-tabs" id="myTab" role="tablist">
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
						                        <span hidden id="idid{{$theimage->id}}" >{{$theimage->id}}</span>
						                        <span hidden id="idname{{$theimage->id}}" >{{$theimage->nameImage}}</span>
						                        <span hidden id="idtitleIFr{{$theimage->id}}" >{{$theimage->titleIFr}}</span>
						                        <span hidden id="idtitleIEn{{$theimage->id}}" >{{$theimage->titleIEn}}</span>
						                        <span hidden id="idlegendIFr{{$theimage->id}}" >{{$theimage->legendIFr}}</span>
						                        <span hidden id="idlegendIEn{{$theimage->id}}" >{{$theimage->legendIEn}}</span>
						                        <span hidden id="idcover{{$theimage->id}}" >{{$theimage->cover}}</span>
						                    @endforeach
			                    		</div>
			                  		</div>    
					                <div class="card col-sm-5" id="smyBtnS">
					                    <h3 class="card-header">Détail du média</h3>		
										<div class="card-body">
											<div class="form-group">			
										        <img id="preview" class="img-fluid medium-img" src="" alt="" name="nameImage">	        
										    </div>
											<div hidden class="form-group font-weight-bold">
												<input type="text" name="nameImage" id="gyuto" value="{{$theimage->nameImage}}">			
											</div>
											<div hidden class="form-group font-weight-bold">
												<input id="didImg" name="didImg" type="text" value="{{$theimage->id}}">
											</div>									
											<div class="card">
												<div class="card-header">ID:</div>
												<div class="card-body">
													<p id="didid"></p>
												</div>
											</div>
											<div class="card">
												<div class="card-header">URL:</div>
												<div class="card-body">
													<p id="didname"></p>
												</div>
											</div>
											<div class="card">
												<div class="card-header">Titre FR:</div>
												<div class="card-body">
													<p id="didtitleIFr"></p>
												</div>
											</div>
											<div class="card">
												<div class="card-header">Titre EN:</div>
												<div class="card-body">
													<p id="didtitleIEn"></p>
												</div>
											</div>
											<div class="card">
												<div class="card-header">Légende FR:</div>
												<div class="card-body">
													<p id="didlegendIFr"></p>
												</div>
											</div>
											<div class="card">
												<div class="card-header">Légende EN:</div>
												<div class="card-body">
													<p id="didlegendIEn"></p>
												</div>
											</div>
											<div class="btn-group">
												<button type="button" class="btn btn-primary form-control" data-dismiss="modal" id="closeImg">Close</button>
												<button type="submit" class='btn btn-primary form-control' id="saveImg" name="action" value="save" >Save</button>
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
		<div class="btn-group boutton">
		    <button type="submit" class='btn btn-primary form-control' name="confirmer" value="confirmer">CONFIRMER</button>
		    {!! Form::close() !!}
		</div>
   </div>
</div>
@endsection

@section('script')
<script>
   	var modal = document.getElementById("myModal");
   	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	var btnIc = document.getElementById("myBtnIc");
	var btnIcA = document.getElementById("myBtnIcA");
	var goBiblio = document.getElementById("myGoBiblio");
	var varCloseImg = document.getElementById("closeImg");
	var varSaveImg = document.getElementById("saveImg");
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
	varSaveImg.onclick = function() {
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
	    document.getElementById("preview").src = filenameSrc;
	    let myidname = document.getElementById("idname"  + bout);
	    let myidid = document.getElementById("idid"  + bout);
	    let mydidname = document.getElementById("didname");
	    let mydidid = document.getElementById("didid");
	    let mydididImg = document.getElementById("didImg");
	    document.getElementById("gyuto").value = myidname.innerText;
	    document.getElementById("didtitleIFr").focus();      
	    let myidtitleIFr = document.getElementById("idtitleIFr"  + bout);
	    let myidtitleIEn = document.getElementById("idtitleIEn"  + bout);
	    let mydidtitleIFr = document.getElementById("didtitleIFr");
	    let mydidtitleIEn = document.getElementById("didtitleIEn");
	    let myidlegendIFr = document.getElementById("idlegendIFr"  + bout);
	    let myidlegendIEn = document.getElementById("idlegendIEn"  + bout);
	    let mydidlegendIFr = document.getElementById("didlegendIFr");
	    let mydidlegendIEn = document.getElementById("didlegendIEn");
	    let myidcover = document.getElementById("idcover"  + bout);
	    let mydidcoverNo = document.getElementById("didcoverNo");
	    let mydidcoverYes = document.getElementById("didcoverYes");
	    mydidtitleIFr.innerText = myidtitleIFr.innerText;
	    mydidtitleIEn.innerText = myidtitleIEn.innerText;
	    mydidlegendIFr.innerText = myidlegendIFr.innerText;
	    mydidlegendIEn.innerText = myidlegendIEn.innerText;
	    mydidname.innerText = myidname.innerText;
	    mydidid.innerText = myidid.innerText;
	    mydididImg.value = myidid.innerText;
    }
</script> 
@endsection