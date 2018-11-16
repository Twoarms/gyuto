@extends('layouts.app')

@section('content')
  <h1>Dashboard - Mes Informations</h1>

  <div class="row"> 
    <h2 class="col-sm-11">Liste Informations</h2>
    <a href="{{ URL::to('./infos/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($infos) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Info N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($infos as $info)
          <tbody>
            <tr>
              <td>{{$info->id}}</td>
              <td><a href="{{ URL::to('./infos/' . $info->id) }}">{{$info->titleFr}}</a></td>
              <td>{{$info->updated_at}}</td>
              <td><a href="{{ URL::to('./infos/' . $info->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune information existante</p>
    @endif  
  </div>
@endsection