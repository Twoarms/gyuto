@extends('layouts.app')

@section('stylesheet')
  <style>
      .btn{        
        width: 10rem;
        margin-top: 0.5rem;
      }      
  </style>
@endsection

@section('title', 'Dashboard - Mes Vidéos')

@section('content')

  <article class="card">
    {!! Form::model($video, ['route' => ['videos.update', $video->id]]) !!}
    <h2 class="card-header">Vidéo {{Form::text('titleFr',null, ['class' => 'form-control']) }}</h2>
    <div class="card-body">
      <p class="card-text">
        {{Form::label('titleFr', 'Titre en Français')}}
        {{Form::text('titleFr',null, ['class' => 'form-control']) }}
      </p>
      <p class="card-text">
        {{Form::label('titleEn','Titre en Anglais') }}
        {{Form::text('titleEn',null, ['class' => 'form-control']) }}
      </p>
      <p class="card-text">
        {{Form::label('category','Catégorie') }}
        {{Form::text('category',null, ['class' => 'form-control']) }}
      </p>
      <p class="card-text">
         {{Form::label('citationFr','Citation en Français') }}
        {{Form::text('citationFr',null, ['class' => 'form-control']) }}
      </p>
      <p class="card-text">
        {{Form::label('citationEn','Citation en Anglais') }}
        {{Form::text('citationEn',null, ['class' => 'form-control']) }}
      </p>
      <p class="card-text">
        {{Form::label('legendFr', 'Légende en Français') }}
        {{Form::text('legendFr',null, ['class' => 'form-control']) }}
      </p>
      <p class="card-text">
        {{Form::label('legendEn','Légende en Anglais') }}
        {{Form::text('legendEn',null, ['class' => 'form-control']) }}
      </p>
 <p class="card-text">
    {{Form::label('gif', 'GIF')}}
    {{Form::text('gif', 'null', ['class' => 'form-control']) }}
 </p>  
  <button onchange="myFunctionGif()" type="button">Show GIF</button><br>
  <iframe id="myGif" src="{{$video->gif}}" controls autoplay>
      Your browser does not support HTML5 video.
  </iframe><br>

  <p class="card-text">
    {{Form::label('urlVideo', 'URL video')}}
    {{Form::text('urlVideo', 'null', ['class' => 'form-control']) }}
  </p>

  <button onchange="myFunction()" type="button">Play Video</button><br>
 
  <iframe id="myVideo" src="{{$video->urlVideo}}" controls autoplay>
      Your browser does not support HTML5 video.
  </iframe><br>




<!--       <p class="card-text">
        {{Form::label('gif','Vidéo GIF') }}
        {{Form::text('gif',null, ['class' => 'form-control']) }}
      </p> -->
<!--       <p class="card-text">
        {{Form::label('urlVideo','URL Vidéo') }}
        {{Form::text('urlVideo',null, ['class' => 'form-control']) }}
      </p> -->
 <!--      <iframe id="myVideo" src="{{$video->urlVideo}}" controls autoplay>
      Your browser does not support HTML5 video.
      </iframe><br>  -->
      <div>
        {!! Html::linkRoute('videos.show', 'Cancel', array($video->id), array('class' => 'btn btn-primary btn-lg')) !!}
      </div>
      <div>
        {!! Html::linkRoute('videos.update', 'Save changes', array($video->id), array('class' => 'btn btn-primary btn-lg')) !!}
      </div>     
    </div>
    {!! Form::close() !!}
  </article>
@endsection

@section('script')
  <script> 
    var vid = document.getElementById("myVideo");
    var uvideo = document.getElementById("urlVideo").value;

    function myFunction() {
        vid.src = uvideo;
    }

    var gif = document.getElementById("myGif");
    var ugif = document.getElementById("gif").value;

    function myFunctionGif() {
        gif.src = ugif;
    } 
  </script> 
@endsection