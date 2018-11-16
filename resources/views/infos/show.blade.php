@extends('layouts.app')

@section('content')
  <h1>Dashboard - Mes Infos</h1>

  <article class="card">
    <h2 class="card-header">Information {{$info->titleFr }}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Titre FR   
      </h4>
      <p class="card-text">
        {{$info->titleFr}}   
      </p>
      <h4 class="card-title">
        Titre EN   
      </h4>
      <p class="card-text">
        {{$info->titleEn}}   
      </p>
      <h4 class="card-title">
        Texte FR   
      </h4>
      <p class="card-text">
        {{$info->textFr}}   
      </p> 
      <h4 class="card-title">
        Texte EN   
      </h4>
      <p class="card-text">
        {{$info->textEn}}   
      </p>
      <h4 class="card-title">
        URL Image
      </h4>
      <p class="card-text">
        {{$info->urlImage}}
      </p>
    </div>
  </article>
@endsection