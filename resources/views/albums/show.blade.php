@extends('layouts.app')

@section('title', "Dashboard - Mes Images")

@section('content')
  <article class="card">
    <h2 class="card-header">Album {{$album->titleFr }}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Titre Album FR   
      </h4>
      <p class="card-text">
        {{$album->titleFr}}   
      </p>
      <h4 class="card-title">
        Titre Album EN   
      </h4>
      <p class="card-text">
        {{$album->titleEn}}   
      </p>
      <hr>
      <div class="imagepages">
      @foreach ($album->imagepages as $imagepage)
        <span class="label label-default">{{ $imagepage->titleIFr}}</span>
      @endforeach
      </div>
      
      <!-- <img src="{{ asset('myimages/' . $album->image)}}" height="400" width="800" />   -->    
    </div>
  </article>
@endsection