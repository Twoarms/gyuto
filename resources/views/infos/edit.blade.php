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
	    width: 100%;
	    margin-bottom: 20vh;
		}
	#myModal {
		z-index: 2;
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
		font-size: 1.5rem;
	}
	.card-title {
		background-color: #F7F7F7;
		padding-right:0px;
		margin-bottom:0.25rem;
	}
	.btn-group button	{
		margin-top: 5px;
		margin-left: 10px;
		margin-right: 15px;
	}	
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
	}
	.cardparag {
		border-top: 4px #083B83 solid;
	}
</style>
@endsection

@section('title', "Dashboard - Création d'Informations")

@section('content')
<div class="container">
	{!! Form::open(['route' => ['infos.update', $info->id], 'method' => 'PUT', 'files' => true]) !!}
	@if (isset($info->parent_id))
		<input id="parId" name="parent_id" type="text" value="{{$info->parent_id}}">
	@else
		<input id="pardId" name="parent_id" type="text" value="0">
	@endif
	<div class="form-group font-weight-bold">
		{{Form::label('id', 'id')}}
		{{Form::text('id', $info->id, ['class' => 'form-control', 'placeholder' => 'id']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('index_title', 'index_title')}}
		{{Form::text('index_title', $info->index_title, ['class' => 'form-control', 'placeholder' => 'index_title']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('titleInFr', 'Titre FR')}}
		{{Form::text('titleInFr', $info->titleInFr, ['class' => 'form-control', 'placeholder' => 'Titre FR']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleInEn', 'Titre EN')}}
		{{Form::text('titleInEn', $info->titleInEn, ['class' => 'form-control', 'placeholder' => 'Titre EN']) }}
	</div>
	<div class="card">		
		<div class="card-header font-weight-bold" id="">Paragraphes
		</div>		
		@if ($theparagraphs->count() > 0)	
			@foreach($theparagraphs as $paragraph)
				<div class="card cardparag">
					<ul class="list-group list-group-flush">
						<li class="card-header">- Paragraphe N° {{$paragraph->id}} </li>
						<input hidden name="paragId" type="text" value="{{$paragraph->id}}">
						<span hidden id="idparag{{$paragraph->id}}" >{{$paragraph->id}}</span>
						<li class="card-title font-weight-bold">	Titre Fr </li>
						<li class="list-group-item" id="idtitleParFr{{$paragraph->id}}"> {{$paragraph->titleParFr}}</li>
						<li class="card-title font-weight-bold"> Titre En </li>	
						<li class="list-group-item" id="idtitleParEn{{$paragraph->id}}"> {{$paragraph->titleParEn}}</li>
						<li class="card-title font-weight-bold"> Texte Fr </li>
						<li class="list-group-item" id="idtextParFr{{$paragraph->id}}"> {{$paragraph->textParFr}}</li>
						<li class="card-title font-weight-bold"> Texte En </li>
						<li class="list-group-item" id="idtextParEn{{$paragraph->id}}"> {{$paragraph->textParEn}}</li>
					</ul>
						<div class="card">
							<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images
							</div>						
							@if ($paragraph->imagepages()->count() > 0)	
								@foreach($paragraph->imagepages as $theimage)
								<img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
				  				@endforeach
				  			@endif			
			  				<br>
						</div>
						<br>
				</div>			  		
			@endforeach
		@endif			
	</div>
	<br>
	<div class="btn-group">
		<button type="submit" id="" class='btn btn-primary form-control' name="ajoutpar" value="ajoutparagraph">Ajouter un paragraphe</button>
		<button type="submit" id="" class='btn btn-primary form-control' name="confirmer" value="confirmer">Confirmer</button>
		{!! Form::close() !!}
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
   		modal.style.display = "none";
	}
	window.onclick = function(event) {
	    if (event.target == modal || event.target == modalPar) {
	        modal.style.display = "none";
	        modalPar.style.display = "none";	        
	    }
	}
	function charger(bout) {
		let myidparag = document.getElementById("idparag"  + bout);
		let myidtitleParFr = document.getElementById("idtitleParFr"  + bout);
		let myidtitleParEn = document.getElementById("idtitleParEn"  + bout);
		let myidtextParFr = document.getElementById("idtextParFr"  + bout);
		let myidtextParEn = document.getElementById("idtextParEn"  + bout);
		let myidparagText = myidparag.innerText;
		let myidtitleParFrText = myidtitleParFr.innerText;
		let myidtitleParEnText = myidtitleParEn.innerText;
		let myidtextParFrText = myidtextParFr.innerText;
		let myidtextParEnText = myidtextParEn.innerText;
		let myparagId = document.getElementById("tparagId");
		let mythetitleParFr = document.getElementById("thetitleParFr");
		let mythetitleParEn = document.getElementById("thetitleParEn");
		let mythetextParFr = document.getElementById("thetextParFr");
		let mythetextParEn = document.getElementById("thetextParEn");
		myparagId.value = myidparag.innerText;
		mythetitleParFr.value = myidtitleParFr.innerText;
		mythetitleParEn.value = myidtitleParEn.innerText;
		mythetextParFr.value = myidtextParFr.innerText;
		mythetextParEn.value = myidtextParEn.innerText;	
	}

	function getFocus(bout) {
		let varMyImg = document.getElementById("myImg" + bout);
		let filenameSrc = varMyImg.src;
   		let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
		document.getElementById("preview").src = filenameSrc;
		document.getElementById("gyuto").setAttribute("value", filename);
		document.getElementById("nameFilename").setAttribute("value", filename);
		let myidtitlefr = document.getElementById("idtitlefr"  + bout);
		let myidtitleen = document.getElementById("idtitleen"  + bout);
		let mydidtitlefr = document.getElementById("didtitlefr");
		let mydidtitleen = document.getElementById("didtitleen");
		let myidid = document.getElementById("idid"  + bout);
		let myidname = document.getElementById("idname"  + bout);
		let mydidid = document.getElementById("didid");
		let mydidname = document.getElementById("didname");
		let mydidImg = document.getElementById("didImg");
		mydidtitlefr.innerHTML = myidtitlefr.innerText;
		mydidtitleen.innerHTML = myidtitleen.innerText;
		mydidid.innerHTML = myidid.innerText;
		mydidname.innerHTML = myidname.innerText;
		mydidImg.value = myidid.innerText;	
}		
</script>	
@endsection