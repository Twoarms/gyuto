@extends('layouts.app')

@section('title', "Dashboard - Intro")

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header"> 
      <h2>Liste Introductions</h2>    
    </div>
    <div class="card-body">
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
                  <td><a href="{{ URL::to('./intros/' . $intro->id) }}">{{$intro->legendVideoFr}}</a></td>
                  <td>{{$intro->updated_at->format('d/m/Y')}}</td>
                  <td><a href="{{ URL::to('./intros/' . $intro->id) }}"><button type="button" class="btn btn-primary btn-sm">Voir</button></a></td>
                </tr>            
              </tbody>
            @endforeach
          </table>
        @else
          <p>Aucune introduction existante</p>
        @endif  
      </div>
      <div class="btn-group">
        <a href="{{ URL::to('./intros/create') }}" class="btn btn-primary" role="button">Ajouter</a>
      </div>
    </div>
  </div>
</div>
@endsection