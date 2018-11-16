@extends('layouts.app')

@section('content')
  <h1>Dashboard - Intro</h1>

  <div class="row"> 
    <h2 class="col-sm-11">Liste Introductions</h2>
    <a href="{{ URL::to('./intros/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($intros) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Intro N°#</th>
            <th>Légende FR</th>
            <th>Date de modification</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($intros as $intro)
          <tbody>
            <tr>
              <td>{{$intro->id}}</td>
              <td><a href="{{ URL::to('./intros/' . $intro->id) }}">{{$intro->legendFr}}</a></td>
              <td>{{$intro->updated_at}}</td>
              <td><a href="{{ URL::to('./intros/' . $intro->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune introduction existante</p>
    @endif  
  </div>
@endsection