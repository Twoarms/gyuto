@extends('layouts.app')

@section('content')
	<h1>Dashboard - Création d'Images</h1>

	{!! Form::open(['action' => 'ImagesController@store', 'method' => 'POST', 'files' => true]) !!}
	<div class="form-group font-weight-bold">
		{{Form::label('titleFr', 'Titre FR')}}
		{{Form::text('titleFr', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre image en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleEn', 'Titre EN')}}
		{{Form::text('titleEn', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre image en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('galery', 'Galerie')}}
		{{Form::text('galery', '', ['class' => 'form-control', 'placeholder' => 'galerie']) }}
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
		{{Form::label('cover', 'Cover')}}
		{{Form::text('cover', '', ['class' => 'form-control', 'placeholder' => 'Cover O/N']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('urlImage', 'URL Image')}}
		{{Form::text('urlImage', '', ['class' => 'form-control', 'placeholder' => 'URL de votre Image']) }}
	</div>

	<div class="form-group font-weight-bold">
		{{Form::label('featuredImage', 'Upload Image')}}
		{{Form::file('featuredImage')}}
	</div>	

	{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
	{!! Form::close() !!}
@endsection