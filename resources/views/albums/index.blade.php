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

@section('title', "Dashboard - Mes Albums d'images")

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h2>Liste Albums</h2>    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($albums) >= 1)
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Album N°#</th>
                <th>Titre</th>
                <th>Date de modification</th>
                <th>Actions</th>
              </tr>
            </thead>
            @foreach($albums as $album)
              <tbody>
                <tr>
                  <td>{{$album->id}}</td>
                  <td><a href="{{ URL::to('./albums/' . $album->id) }}">{{$album->titleFr}}</a></td>
                  <td>{{$album->updated_at->format('d/m/Y')}}</td>
                  <td><a href="{{ URL::to('./albums/' . $album->id) }}"><button type="button" class="btn btn-primary">Voir</button></a></td>
                  <td><a href="{{ URL::to('./albums/' . $album->id . '/edit') }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                </tr>            
              </tbody>
            @endforeach
          </table>
        @else
          <p>Aucun album existant</p>
        @endif  
      </div>
      <div class="btn-group">
        <a href="{{ route('albums.create') }}" class="btn btn-primary" role="button">Ajouter</a>
      </div>
    </div>
  </div>
</div>
@endsection