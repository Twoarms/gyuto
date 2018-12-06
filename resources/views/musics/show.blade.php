@extends('layouts.app')

@section('title', "Dashboard - Mes Musiques")

@section('content')
  <article class="card">
    <h2 class="card-header">Musique {{$music->titleMusic }}</h2>
    <div class="card-body">
      <div class="card">
        <div class="card-body">
          <h3>CONCERT</h3>
          <h4 class="card-title">
            URL Vidéo
          </h4>
          <p class="card-text">
            {{$music->urlVideoMusic}}
          </p>
          <h4 class="card-title">
            Légende en Français
          </h4>
          <p class="card-text">
            {{$music->legendFr}}
          </p>
          <h4 class="card-title">
            Légende en Anglais
          </h4>
          <p class="card-text">
            {{$music->legendEn}}
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h3>INFORMATIONS</h3>
          <h4 class="card-title">
            Titre en Français   
          </h4>
          <p class="card-text">
            {{$music->titleFr}}   
          </p>
          <h4 class="card-title">
            Titre en Anglais   
          </h4>
          <p class="card-text">
            {{$music->titleEn}}   
          </p>
          <h4 class="card-title">
            Texte en Français   
          </h4>
          <p class="card-text">
            {!!$music->textFr!!}   
          </p>
          <h4 class="card-title">
            Texte en Anglais   
          </h4>
          <p class="card-text">
            {!!$music->textEn!!}   
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h3>ALBUMS</h3>
          <h4 class="card-title">
            Titre Album en Français   
          </h4>
          <p class="card-text">
            {{$music->titleAlbumFr}}   
          </p>
          <h4 class="card-title">
            Titre Album en Anglais   
          </h4>
          <p class="card-text">
            {{$music->titleAlbumEn}}   
          </p>
          <h4 class="card-title">
            URL Vidéo
          </h4>
          <p class="card-text">
            {{$music->urlAlbumMusic}}
          </p>
          <h4 class="card-title">
            URL Musique
          </h4>
          <p class="card-text">
            {{$music->urlMusic}}
          </p>
        </div>
      </div>
    </div>
  </article>
@endsection