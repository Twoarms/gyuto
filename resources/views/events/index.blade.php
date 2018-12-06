@extends('layouts.app')

@section('title', "Dashboard - Mes Evènements")

@section('content')
  <div class="row"> 
    <h2 class="col-sm-11">Liste Evènements</h2>
    <a href="{{ URL::to('./events/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($events) >= 1)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Evènement N°#</th>
            <th>Titre</th>
            <th>Date de l'évènement</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($events as $event)
          <tbody>
            <tr>
              <td>{{$event->id}}</td>
              <td><a href="{{ URL::to('./events/' . $event->id) }}">{{$event->title}}</a></td>
              <td>{{$event->dateFrom}}</td>
              <td><a href="{{ URL::to('./events/' . $event->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
            </tr>            
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucun évènement existant</p>
    @endif  
  </div>
@endsection