@extends('layouts.app')

@section('title', "Dashboard - Mes Infos")

@section('content')
  <article class="card">
    <h2 class="card-header">Information {{$info->titleInFr}}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Titre FR   
      </h4>
      <p class="card-text">
        {{$info->titleInFr}}   
      </p>
      <h4 class="card-title">
        Titre EN   
      </h4>
      <p class="card-text">
        {{$info->titleInEn}}   
      </p>
      <h4 class="card-title">
        Texte FR  
      </h4>
      <p class="card-text">
        {{$info->textInFr}}   
      </p> 
      <h4 class="card-title">
        Texte EN   
      </h4>
      <p class="card-text">
        {{$info->textInEn}}   
      </p>
    </div>
  </article>
@endsection