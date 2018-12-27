@extends('layouts.app')

@section('stylesheet')
	
@endsection

@section('title', "Dashboard - Création d'Introductions")

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			{!! Form::open(['action' => 'IntrosController@store', 'method' => 'POST', 'files' => true]) !!}
			<div class="form-group font-weight-bold">
				{{Form::label('legendVideoFr', 'Légende FR')}}
				{{Form::text('legendVideoFr', '', ['class' => 'form-control', 'placeholder' => 'Légende FR']) }}
			</div>
			<div class="form-group font-weight-bold">
				{{Form::label('legendVideoEn', 'Légende EN')}}
				{{Form::text('legendVideoEn', '', ['class' => 'form-control', 'placeholder' => 'Légende EN']) }}
			</div>
			<div class="form-group font-weight-bold">
				{{Form::label('quoteVideoFr', 'Quote FR')}}
				{{Form::text('quoteVideoFr', '', ['class' => 'form-control', 'placeholder' => 'Quote FR']) }}
			</div>
			<div class="form-group font-weight-bold">
				{{Form::label('quoteVideoEn', 'Quote EN')}}
				{{Form::text('quoteVideoEn', '', ['class' => 'form-control', 'placeholder' => 'Quote EN']) }}
			</div>
			<div class="form-group font-weight-bold">
				<label for="urlVideoFr">URL video FR</label>
				<input type="url" id="urlVideoFr" name="urlVideoFr" class = 'form-control' placeholder = 'URL de votre vidéo FR' onchange='getVideoFr()');>
			</div>
			<div id="myVideoFr"></div>
			<div class="form-group font-weight-bold">
				<label for="urlVideoEn">URL video EN</label>
				<input type="url" id="urlVideoEn" name="urlVideoEn" class = 'form-control' placeholder = 'URL de votre vidéo EN' onchange='getVideoEn()');>
			</div>
			<div id="myVideoEn"></div>
			{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	function getVideoFr() {
		let vidFr = document.getElementById("myVideoFr");
		let uvideoFr = document.getElementById("urlVideoFr").value;
		vidFr.innerHTML = '<iframe class="embed-responsive-item" src="'+uvideoFr+'"></iframe>';			  			
	}
	function getVideoEn() {
		let vidEn = document.getElementById("myVideoEn");
		let uvideoEn = document.getElementById("urlVideoEn").value;
		vidEn.innerHTML = '<iframe class="embed-responsive-item" src="'+uvideoEn+'"></iframe>';				  			
	}
</script>		
@endsection