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
	#confirmer {
		margin-left: 0.5rem;
	}
</style>
@endsection

@section('title', "Dashboard - Création d'Informations")

@section('content')
<div class="container">
	{!! Form::open(['action' => 'InfosController@store', 'method' => 'POST', 'files' => true]) !!}
		@if (isset($infoparentid))
			<input hidden id="parId" name="parent_id" type="text" value="{{$infoparentid}}">
		@else
			<input hidden id="parId" name="parent_id" type="text" value="0">
		@endif
		<div class="form-group font-weight-bold">
			{{Form::label('index_title', 'index_title')}}
			{{Form::text('index_title', '', ['class' => 'form-control', 'placeholder' => 'index_title']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('titleInFr', 'Titre FR')}}
			{{Form::text('titleInFr', '', ['class' => 'form-control', 'placeholder' => 'Titre FR']) }}
		</div>	
		<div class="form-group font-weight-bold">
			{{Form::label('titleInEn', 'Titre EN')}}
			{{Form::text('titleInEn', '', ['class' => 'form-control', 'placeholder' => 'Titre EN']) }}
		</div>								
		<div class="btn-group">
				<button type="submit" class='btn btn-primary form-control' name="ajoutpar" value="ajoutparagraph">Ajouter un paragraphe</button>
				<button type="submit" id = "conf" class='btn btn-primary form-control' name="confirmer" value="confirmer">Confirmer</button>
		</div>
	{!! Form::close() !!}				
</div>
@endsection