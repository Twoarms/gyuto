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
		padding: 0;
	}
	#myBtnIcA {
		margin-top: 1rem;
		margin-bottom: 1rem;
		margin-left: 0px;
		padding-right: 10px;
	}
	#saveImg {
		margin-left: 0.5rem;
	}
</style>
@endsection

@section('title', "Dashboard - Création d'Albums d'images")

@section('content')
<div class="container-fluid">
	<div class="card-body">
		{!! Form::open(['route' => ['albums.update', $album->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="form-group font-weight-bold">
			{{Form::label('titleFr', 'Titre Album FR')}}
			{{Form::text('titleFr', $album->titleFr , ['class' => 'form-control']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('titleEn', 'Titre Album EN')}}
			{{Form::text('titleEn', $album->titleEn, ['class' => 'form-control' ]) }}
		</div>
		<div class="card">
			<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images</div>
			<div class="card-body">
				@if ($album->imagepages()->count() > 0)	
					@foreach($album->imagepages as $theimage)
						<img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
					@endforeach
		  		@endif			
		  		<br>
				<a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a>
			</div>
		</div>
		<div class="card imageCover">
			<div class="card-header font-weight-bold" id="myBtnIc">Image mise en avant</div>
			<div class="card-body imageCover">	
				@if ($album->imagepages()->count() > 0)	
					@foreach($album->imagepages as $theimage)
						@if ($theimage->cover == '1')
							<img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
						@endif
					@endforeach
		  		@endif		
		  		<br>
			</div>
			<div class="card-body">	
		 		<br>
				<a href="#" class="btn btn-primary" id="myBtnIcA">Ajouter l'image mise en avant</a>
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
												<a onclick="getFocus('{{$theimage->id}}');">
													<img id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img"></a>
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
		<div class="btn-group">	
			<button type="submit" id="" class='btn btn-primary form-control' name="confirmer" value="confirmer">CONFIRMER</button>
			{!! Form::close() !!}
		</div>	
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
	let mydidtitleIFr = document.getElementById("didtitleIFr");
    let mydidtitleIEn = document.getElementById("didtitleIEn");
    let mydididImg = document.getElementById("didImg");
    let mydidlegendIFr = document.getElementById("didlegendIFr");
    let mydidlegendIEn = document.getElementById("didlegendIEn");
	mydidtitleIFr.value = '';
    mydidtitleIEn.value = '';
    mydidlegendIFr.value = '';
    mydidlegendIEn.value = '';
    mydididImg.value = '';
	function getFocus(bout) {
	    let varMyImg = document.getElementById("myImg" + bout);
        let filenameSrc = varMyImg.src;
        let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
        document.getElementById("preview").src = filenameSrc;           
        document.getElementById("didtitleIFr").focus();
        let myidtitleIFr = document.getElementById("idtitleIFr"  + bout);
        let myidtitleIEn = document.getElementById("idtitleIEn"  + bout);
        let mydidtitleIFr = document.getElementById("didtitleIFr");
        let mydidtitleIEn = document.getElementById("didtitleIEn");
        let myidname = document.getElementById("idname"  + bout);
        let myidid = document.getElementById("idid"  + bout);
        let mydididImg = document.getElementById("didImg");
        let myidlegendIFr = document.getElementById("idlegendIFr"  + bout);
        let myidlegendIEn = document.getElementById("idlegendIEn"  + bout);
        let mydidlegendIFr = document.getElementById("didlegendIFr");
        let mydidlegendIEn = document.getElementById("didlegendIEn");
        let myidcover = document.getElementById("idcover"  + bout);
        let mydidcoverNo = document.getElementById("didcoverNo");
        let mydidcoverYes = document.getElementById("didcoverYes");
        mydidtitleIFr.value = myidtitleIFr.innerText;
        mydidtitleIEn.value = myidtitleIEn.innerText;
        mydidlegendIFr.value = myidlegendIFr.innerText;
        mydidlegendIEn.value = myidlegendIEn.innerText;
        mydididImg.value = myidid.innerText;
        document.getElementById("gyuto").value = myidname.innerText;       
    }
	var myNameImg = document.getElementById('nameImage');
	$(document).ready(function(){
    	myNameImg.addEventListener('change', function(){
       		$(".nav-tabs #biblio-tab").tab('show');
    	});
	});
</script>
@endsection