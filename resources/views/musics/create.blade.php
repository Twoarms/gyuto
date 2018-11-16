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
	<h1>Dashboard - Création de Musiques</h1>

	{!! Form::open(['action' => 'MusicsController@store', 'method' => 'POST']) !!}
	<h2>CONCERT</h2>
	<div class="form-group font-weight-bold">
		{{Form::label('urlVideoMusic', 'URL Vidéo Musique')}}
		{{Form::text('urlVideoMusic', '', ['class' => 'form-control', 'placeholder' => 'URL de votre Vidéo Musique']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('legendFr', 'Légende FR')}}
		{{Form::text('legendFr', '', ['class' => 'form-control', 'placeholder' => 'Légende de votre Vidéo Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('legendEn', 'Légende EN')}}
		{{Form::text('legendEn', '', ['class' => 'form-control', 'placeholder' => 'Légende de votre Vidéo Musique en Anglais']) }}
	</div>
	<h2>INFORMATIONS</h2>
	<div class="form-group font-weight-bold">
		{{Form::label('titleFr', 'Titre FR')}}
		{{Form::text('titleFr', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Texte Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleEn', 'Titre EN')}}
		{{Form::text('titleEn', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Texte Musique en Anglais']) }}
	</div>

	<div class="form-group font-weight-bold">
		{{Form::label('textFr', 'Texte FR')}}
		{{Form::textarea('textFr', '', ['class' => 'form-control', 'placeholder' => 'Votre Texte Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('textEn', 'Texte EN')}}
		{{Form::textarea('textEn', '', ['class' => 'form-control', 'placeholder' => 'Votre Texte Musique en Anglais']) }}
	</div>
	<h2>ALBUMS</h2>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleAlbumFr', 'Titre Album FR')}}
		{{Form::text('titleAlbumFr', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Album Musique en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleAlbumEn', 'Titre Album EN')}}
		{{Form::text('titleAlbumEn', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Album Musique en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('urlAlbumMusic', 'URL Album Music')}}
		{{Form::text('urlAlbumMusic', '', ['class' => 'form-control', 'placeholder' => 'URL de votre Album Music']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('urlMusic', 'URL Musique')}}
		{{Form::text('urlMusic', '', ['class' => 'form-control', 'placeholder' => 'URL de votre Musique']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('titleMusic', 'Titre Musique')}}
		{{Form::text('titleMusic', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Musique']) }}
	</div>

	{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
	{!! Form::close() !!}
@endsection