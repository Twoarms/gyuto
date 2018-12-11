@extends('layouts.app')

@section('stylesheet')
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({
	 selector:'textarea',
	 branding: false,
	 plugins: [
  	'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
  	'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
  	'save table contextmenu directionality emoticons template paste textcolor'
	],
	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
	 });
	</script>
@endsection

@section('title', "Dashboard - Création d'Introductions")

@section('content')
	{!! Form::open(['action' => 'IntrosController@store', 'method' => 'POST', 'files' => true]) !!}
	<div class="form-group font-weight-bold">
		{{Form::label('legendFr', 'Légende FR')}}
		{{Form::text('legendFr', '', ['class' => 'form-control', 'placeholder' => 'Légende FR']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('legendEn', 'Légende EN')}}
		{{Form::text('legendEn', '', ['class' => 'form-control', 'placeholder' => 'Légende EN']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('urlVideo', 'URL Vidéo')}}
		{{Form::text('urlVideo', '', ['class' => 'form-control', 'placeholder' => 'URL Vidéo']) }}
	</div>
	
	<button onclick="myFunction()" type="button">Play Video</button><br>
 
	<iframe id="myVideo" src="" controls autoplay>
  		Your browser does not support HTML5 video.
	</iframe><br>

	{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
	{!! Form::close() !!}
@endsection

@section('script')
	<script> 
		var vid = document.getElementById("myVideo");
		var uvideo = document.getElementById("urlVideo").value;

		function myFunction() {
		    vid.src = uvideo;
		} 
	</script> 
@endsection