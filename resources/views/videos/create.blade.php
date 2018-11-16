@extends('layouts.app')

@section('content')
	<h1>Dashboard - Création de Vidéos</h1>

	{!! Form::open(['action' => 'VideosController@store', 'method' => 'POST']) !!}
	<div class="form-group font-weight-bold">
		{{Form::label('titleFr', 'Titre FR')}}
		{{Form::text('titleFr', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre vidéo en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleEn', 'Titre EN')}}
		{{Form::text('titleEn', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre vidéo en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('category', 'Catégorie')}}
		{{Form::select('category', ['P' => 'Paysages', 'C' => 'Campagnes', 'V' => 'Villes'], null, ['placeholder' => 'Catégorie'])}}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('citationFr', 'Citation FR')}}
		{{Form::text('citationFr', '', ['class' => 'form-control', 'placeholder' => 'Citation de votre vidéo en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('citationEn', 'Citation EN')}}
		{{Form::text('citationEn', '', ['class' => 'form-control', 'placeholder' => 'Citation de votre vidéo en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('legendFr', 'Légende FR')}}
		{{Form::text('legendFr', '', ['class' => 'form-control', 'placeholder' => 'Légende de votre vidéo en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('legendEn', 'Légende EN')}}
		{{Form::text('legendEn', '', ['class' => 'form-control', 'placeholder' => 'Légende de votre vidéo en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('gif', 'GIF')}}
		{{Form::text('gif', '', ['class' => 'form-control', 'placeholder' => 'GIF à importer de votre vidéo']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('urlVideo', 'URL video')}}
		{{Form::text('urlVideo', '', ['class' => 'form-control', 'placeholder' => 'URL de votre vidéo']) }}
	</div>
	{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
	{!! Form::close() !!}
@endsection