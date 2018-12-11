@extends('layouts.app')

@section('title', "Dashboard - Mes Musiques")

@section('content')
  <div class="row"> 
    <h2 class="col-sm-11">Liste Musiques</h2>
    <a href="{{ URL::to('./musics/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($musics) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Musique N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($musics as $music)
          <tbody>
            <tr>
              <td>{{$music->id}}</td>
              <td><a href="{{ URL::to('./musics/' . $music->id) }}">{{$music->titleFr}}</a></td>
              <td>{{$music->updated_at}}</td>
              <td><a href="{{ URL::to('./musics/' . $music->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune musique existante</p>
    @endif  
  </div>
@endsection