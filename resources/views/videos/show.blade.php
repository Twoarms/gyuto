@extends('layouts.app')

@section('title', 'Dashboard - Mes Vidéos')
@section('content')
  <article class="card">
    <h2 class="card-header">Vidéo {{$video->titleFr }}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Titre en Français   
      </h4>
      <p class="card-text">
        {{$video->titleFr}}   
      </p>
      <h4 class="card-title">
        Titre en Anglais   
      </h4>
      <p class="card-text">
        {{$video->titleEn}}   
      </p>
      <h4 class="card-title">
        Catégorie    
      </h4>
      <p class="card-text">
        {{$video->category}}    
      </p>
      <h4 class="card-title">
        Citation en Français  
      </h4>
      <p class="card-text">
        {{$video->citationFr}}
      </p>
      <h4 class="card-title">
        Citation en Anglais  
      </h4>
      <p class="card-text">
        {{$video->citationEn}}
      </p>
      <h4 class="card-title">
        Légende en Français
      </h4>
      <p class="card-text">
        {{$video->legendFr}}
      </p>
      <h4 class="card-title">
        Légende en Anglais
      </h4>
      <p class="card-text">
        {{$video->legendEn}}
      </p>
      <h4 class="card-title">
        Vidéo GIF
      </h4>
      <p class="card-text">
        {{$video->gif}}
      </p>
      <h4 class="card-title">
        URL Vidéo
      </h4>
      <p class="card-text">
        {{$video->urlVideo}}
      </p>
      <iframe id="myVideo" src="{{$video->urlVideo}}" controls autoplay>
      Your browser does not support HTML5 video.
      </iframe><br> 
      <div>
        {!! Html::linkRoute('videos.index', 'Retour', '', array('class' => 'btn btn-primary btn-lg')) !!}
      </div>     
    </div>
  </article>
@endsection