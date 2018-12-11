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
		    height: 100vh;
		    margin-bottom: 20vh;
		}

		/* The Close Button */
		.close {
		    /*color: #aaaaaa;*/
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
			margin-top: 1rem;
			margin-bottom: 0.5rem;
		}
		
		label[for='urlVideo'] {
			margin-top: 1.5rem;
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
			height: 300px;
			padding: 0;
		}

		#myBtnIcA {
			margin-top: 180px;
			margin-left: 0px;
			padding-right: 10px;
		}
	</style>
@endsection

@section('title', "Dashboard - Création d'images")

@section('content')
	{!! Form::open(['action' => 'ImagepagesController@store', 'method' => 'POST']) !!}
	<div class="form-group font-weight-bold">
		{{Form::label('titleIFr', 'Titre FR')}}
		{{Form::text('titleIFr', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre vidéo en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('titleIEn', 'Titre EN')}}
		{{Form::text('titleIEn', '', ['class' => 'form-control', 'placeholder' => 'Titre de votre vidéo en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('legendIFr', 'Légende FR')}}
		{{Form::text('legendIFr', '', ['class' => 'form-control', 'placeholder' => 'Légende de votre vidéo en Français']) }}
	</div>	
	<div class="form-group font-weight-bold">
		{{Form::label('legendIEn', 'Légende EN')}}
		{{Form::text('legendIEn', '', ['class' => 'form-control', 'placeholder' => 'Légende de votre vidéo en Anglais']) }}
	</div>
	<div class="form-group font-weight-bold">
			{{Form::label('nameImage', 'Upload Image')}}
			{{Form::file('nameImage') }}
	</div>
	<div class="form-group">
	    <img id="preview" class="img-fluid medium-img" src="#" alt="">
	</div>
	<div class="form-group font-weight-bold">
		{{Form::submit('Sauvegarde', ['class' => 'btn btn-primary', 'id' => 'conf']) }}
		{!! Form::close() !!}
	</div>
	{!! Form::close() !!}
@endsection

@section('script')
	<script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })

        })          

    </script>
@endsection