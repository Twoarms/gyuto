@extends('layouts.app')

@section('title', "| $imagepage->titleIFr")

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{$imagepage->titleIFr}}</h1>
			<p>{{ $imagepage->titleIEn}}</p>
			<hr>
			<p>{{$imagepage->album->tileFr}}</p>
		</div>
	</div>
@endsection