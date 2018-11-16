@extends('layouts.app')

@section('content')
  <h1>Dashboard - Mes Images</h1>

  <div class="row"> 
    <h2 class="col-sm-11">Liste Images</h2>
    <a href="{{ URL::to('./images/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($images) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Image N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($images as $image)
          <tbody>
            <tr>
              <td>{{$image->id}}</td>
              <td><a href="{{ URL::to('./images/' . $image->id) }}">{{$image->titleFr}}</a></td>
              <td>{{$image->updated_at}}</td>
              <td><a href="{{ URL::to('./images/' . $image->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune image existante</p>
    @endif  
  </div>
@endsection