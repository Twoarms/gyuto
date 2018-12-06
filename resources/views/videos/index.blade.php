@extends('layouts.app')

@section('stylesheet')
  <style>
      td:nth-last-child(-n+2){
        width: 5rem;
      }
      td:last-child {
        padding-right: 15rem;
      }
  </style>
@endsection

@section('title', 'Dashboard - Mes Vidéos')

@section('content')
<!--   <h1>Dashboard - Mes Vidéos</h1> -->

  <div class="row"> 
    <h2 class="col-sm-11">Liste Vidéos</h2>
    <a href="{{ URL::to('./videos/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($videos) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Vidéo N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Actions</th>
          </tr>
        </thead>
        @foreach($videos as $video)
          <tbody>
            <tr>
              <td>{{$video->id}}</td>
              <td><a href="{{ URL::to('./videos/' . $video->id) }}">{{$video->titleFr}}</a></td>
              <!-- <td>{{$video->updated_at}}</td> -->
              <td>{{ date('j-M-Y h:i', strtotime($video->updated_at)) }}</td>
              <td>{!! Html::linkRoute('videos.show', 'Voir', array($video->id), array('class' => 'btn btn-info btn-sm')) !!}</td>          
               <!-- <td><a href="{{ URL::to('./videos/' . $video->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>  -->    <td>{!! Html::linkRoute('videos.edit', 'Edit', array($video->id), array('class' => 'btn btn-info btn-sm')) !!}</td>              
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune vidéo existante</p>
    @endif  
  </div>
@endsection