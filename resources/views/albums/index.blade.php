@extends('layouts.app')

@section('title', "Dashboard - Mes Albums d'images")

@section('content')
  <div class="row"> 
    <h2 class="col-sm-11">Liste Albums</h2>
    <a href="{{ route('albums.create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($albums) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Album N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($albums as $album)
          <tbody>
            <tr>
              <td>{{$album->id}}</td>
              <td><a href="{{ URL::to('./albums/' . $album->id) }}">{{$album->titleFr}}</a></td>
              <td>{{$album->updated_at}}</td>
              <td><a href="{{ URL::to('./albums/' . $album->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
              <td><a href="{{ URL::to('./albums/' . $album->id . '/edit') }}"><button type="button" class="btn btn-info btn-sm">Edit</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucun album existant</p>
    @endif  
  </div>
@endsection