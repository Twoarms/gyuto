@extends('layouts.app')

@section('title', "Dashboard - Mes Intros")

@section('content')
  <article class="card">
    <h2 class="card-header">Introduction {{$intro->legendFr }}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Légende FR   
      </h4>
      <p class="card-text">
        {{$intro->legendFr}}   
      </p>
      <h4 class="card-title">
        Légende EN   
      </h4>
      <p class="card-text">
        {{$intro->legendEn}}   
      </p>
      <h4 class="card-title">
        URL Vidéo
      </h4>   
      <p class="card-text">
        {{$intro->urlVideo}}
      </p>
      <iframe id="myVideo" src="{{$intro->urlVideo}}" controls autoplay>
      Your browser does not support HTML5 video.
      </iframe><br>   
    </div>
  </article>
@endsection