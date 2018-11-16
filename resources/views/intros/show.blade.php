@extends('layouts.app')

@section('content')
  <h1>Dashboard - Mes Intros</h1>

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
    </div>
  </article>
@endsection