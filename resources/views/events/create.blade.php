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
	<h1>Dashboard - Création des Evènements</h1>

	{!! Form::open(['action' => 'EventsController@store', 'method' => 'POST']) !!}
	<div class="form-group font-weight-bold">
		{{Form::label('title', 'Titre')}}
		{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre Evènement']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('dateFrom', 'Date de début')}}
		{{Form::date('dateFrom', '', ['class' => 'form-control', 'placeholder' => '01-01-2018']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('dateEnd', 'Date de la fin')}}
		{{Form::date('dateEnd', '', ['class' => 'form-control', 'placeholder' => '14-01-2018']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('timeStart', 'Heure de début')}}
		{{Form::time('timeStart', '', ['class' => 'form-control', 'placeholder' => '10:00']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('timeEnd', 'Heure de la fin')}}
		{{Form::time('timeEnd', '', ['class' => 'form-control', 'placeholder' => '14:00']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('numberStreet', 'N° de la rue')}}
		{{Form::text('numberStreet', '', ['class' => 'form-control', 'placeholder' => '100']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('nameStreet', 'Rue')}}
		{{Form::text('nameStreet', '', ['class' => 'form-control', 'placeholder' => 'Nom de la Rue']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('zipCode', 'Code Postal')}}
		{{Form::text('zipCode', '', ['class' => 'form-control', 'placeholder' => 'Code Postal']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('city', 'Ville')}}
		{{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Ville']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('country', 'Pays')}}
		{{Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Pays']) }}
	</div>

	<div class="form-group font-weight-bold">
		{{Form::label('descriptionFr', 'Description FR')}}
		{{Form::textarea('descriptionFr', '', ['class' => 'form-control', 'placeholder' => 'Votre description en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('descriptionEn', 'Description EN')}}
		{{Form::textarea('descriptionEn', '', ['class' => 'form-control', 'placeholder' => 'Votre description en Anglais']) }}
	</div>

	{{Form::submit('CONFIRMER', ['class' => 'btn btn-lg btn-primary']) }}
	{!! Form::close() !!}
@endsection