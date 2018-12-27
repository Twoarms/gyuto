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
	    padding-top: 80px; /* Location of the box */
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
	    padding: 6px;
	    padding-left:10px;
	    border: 1px solid #888;
	    width: 150%;		       
	    margin-bottom: 20vh;
	    margin-left: 1rem;
	    margin-right: 1rem;
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
	.btn-group button {
		margin-top: 5px;
		margin-left: 10px;
		margin-right: 15px;
	}
	#closeImg {
		margin-left: 0.15rem;
	}
</style>
@endsection

@section('title', "Dashboard - Création d'Informations - Ajout Paragraphe")

@section('content')
<div class="container">
	{!! Form::open(['action' => 'InfosController@storeparag', 'method' => 'POST', 'files' => true]) !!}	
	@if (isset($info->id))
		<input hidden id="infoId" name="infoId" type="text" value="{{$info->id}}">	
	@endif
	@if (isset($infoparentid))
		<div hidden id="">{{$infoparentid}}</div>
	@endif
	<div hidden id="didid">{{$info->id}}</div>
	<div hidden id="didindex_title"">{{$info->index_title}}</div>
	<div hidden id="didtitleInFr">{{$info->titleInFr}}</div>
	<div hidden id="didtitleInEn">{{$info->titleInEn}}</div>
	<div hidden id="didparent_id">{{$info->parent_id}}</div>
	<input hidden id="idid" name="id" type="text" value="">
	<input hidden id="idindex_title" name="index_title" type="text" value="">
	<input hidden id="idtitleInFr" name="titleInFr" type="text" value="">
	<input hidden id="idtitleInEn" name="titleInEn" type="text" value="">
	<input hidden id="idparent_id" name="parent_id" type="text" value="">
	<div class="container">													
		<div class="container">
			<div class="card-body">
				<div class="form-group font-weight-bold">
					{{Form::label('titleParFr', 'Titre Paragraphe FR')}}
					{{Form::text('titleParFr', '', ['class' => 'form-control', 'placeholder' => 'Titre Paragraphe FR']) }}
				</div>	
				<div class="form-group font-weight-bold">
					{{Form::label('titleParEn', 'Titre Paragraphe EN')}}
					{{Form::text('titleParEn', '', ['class' => 'form-control', 'placeholder' => 'Titre Paragraphe EN']) }}
				</div>
				<div class="form-group font-weight-bold">
					{{Form::label('textParFr', 'Texte Paragraphe FR')}}
					{{Form::textarea('textParFr', '', ['class' => 'form-control', 'placeholder' => 'Texte Paragraphe FR']) }}
				</div>
				<div class="form-group font-weight-bold">
					{{Form::label('textParEn', 'Texte Paragraphe EN')}}
					{{Form::textarea('textParEn', '', ['class' => 'form-control', 'placeholder' => 'Texte Paragraphe EN']) }}
				</div>
				<div class="card">
					<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images</div>
					<div class="card-body">	
				 		<br>
				  		<div class="btn-group">
					  		@include('inc.galeryimgsanscovermodale')
						</div>
					</div>
				</div>
			</div>			
			<div class="btn-group">
				<div class="form-group font-weight-bold">
					<button type="submit" id="" class='btn btn-primary form-control' id="closePar" name="saveparagraph" value="saveparagraph">Save</button>
					{!! Form::close() !!}						
				</div>	
			</div>
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
    var modalPar = document.getElementById("myModalPar");
    var btn = document.getElementById("myBtn");
    var btnG = document.getElementById("myBtnG");
    // Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	var goBiblio = document.getElementById("myGoBiblio");
	btnG.onclick = function() {
	    modal.style.display = "block";
	}
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		console.log('coucou');
   		modal.style.display = "none";
	}
	window.onclick = function(event) {
	    if (event.target == modal || event.target == modalPar) {
	        modal.style.display = "none";
	        modalPar.style.display = "none";	        
	    }
	}		
	let mydidid = document.getElementById("didid");
	let mydidindex_title = document.getElementById("didindex_title");
	let mydidtitleInFr = document.getElementById("didtitleInFr");
	let mydidtitleInEn = document.getElementById("didtitleInEn");
	let mydidparent_id = document.getElementById("didparent_id");
	let myidid = document.getElementById("idid");
	let myidindex_title = document.getElementById("idindex_title");
	let myidtitleInFr = document.getElementById("idtitleInFr");
	let myidtitleInEn = document.getElementById("idtitleInEn");
	let myidparent_id = document.getElementById("idparent_id");
	myidid.value = mydidid.innerText;
	myidindex_title.value = mydidindex_title.innerText;
	myidtitleInFr.value = mydidtitleInFr.innerText;
	myidtitleInEn.value = mydidtitleInEn.innerText;
	myidparent_id.value = mydidparent_id.innerText;
	function getFocus(bout) {
		let varMyImg = document.getElementById("myImg" + bout);
		let filenameSrc = varMyImg.src;
   		let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
   		let myidtitlefr = document.getElementById("idtitlefr"  + bout);
		let myidtitleen = document.getElementById("idtitleen"  + bout);
		let mydidtitlefr = document.getElementById("didtitlefr");
		let mydidtitleen = document.getElementById("didtitleen");
		let myididImage = document.getElementById("ididImage"  + bout);			
		let myidname = document.getElementById("idname"  + bout);
		let mydididImage = document.getElementById("dididImage");
		let mydidname = document.getElementById("didname");
		let mydidImg = document.getElementById("didImg");
		mydidtitlefr.innerHTML = myidtitlefr.innerText;
		mydidtitleen.innerHTML = myidtitleen.innerText;
		mydididImage.innerHTML = myididImage.innerText;
		mydidname.innerHTML = myidname.innerText;
		mydidImg.value = myididImage.innerText;	
		document.getElementById("preview").src = filenameSrc;
		document.getElementById("gyuto").setAttribute("value", filename);
	}		
</script>	
@endsection