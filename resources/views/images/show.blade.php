@extends('layouts.app')

@section('content')
  <h1>Dashboard - Mes Images</h1>

  <article class="card">
    <h2 class="card-header">Image {{$image->titleFr }}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Titre en Français   
      </h4>
      <p class="card-text">
        {{$image->titleFr}}   
      </p>
      <h4 class="card-title">
        Titre en Anglais   
      </h4>
      <p class="card-text">
        {{$image->titleEn}}   
      </p>
      <h4 class="card-title">
        Galerie    
      </h4>
      <p class="card-text">
        {{$image->galery}}    
      </p>
      <h4 class="card-title">
        Légende en Français
      </h4>
      <p class="card-text">
        {{$image->legendFr}}
      </p>
      <h4 class="card-title">
        Légende en Anglais
      </h4>
      <p class="card-text">
        {{$image->legendEn}}
      </p>
      <h4 class="card-title">
        Cover
      </h4>
      <p class="card-text">
        {{$image->cover}}
      </p>
      <h4 class="card-title">
        URL Image
      </h4>
      <p class="card-text">
        {{$image->urlImage}}
      </p>      
    </div>
  </article>
@endsection