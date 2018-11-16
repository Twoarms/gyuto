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

@section('content')
	<h1>Dashboard - Création d'Introductions</h1>

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

	<div class="form-group font-weight-bold">
		{{Form::label('featuredImage', 'Upload Featured Image')}}
		{{Form::file('featuredImage')}}
	</div>

	{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
	{!! Form::close() !!}
@endsection