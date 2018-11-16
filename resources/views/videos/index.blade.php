@extends('layouts.app')

@section('content')
  <h1>Dashboard - Mes Vidéos</h1>

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
            <th>Action</th>
          </tr>
        </thead>
        @foreach($videos as $video)
          <tbody>
            <tr>
              <td>{{$video->id}}</td>
              <td><a href="{{ URL::to('./videos/' . $video->id) }}">{{$video->titleFr}}</a></td>
              <td>{{$video->updated_at}}</td>
              <td><a href="{{ URL::to('./videos/' . $video->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune vidéo existante</p>
    @endif  
  </div>
@endsection