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

@section('title', "Dashboard - Mes Evènements")

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header"> 
      <h2>Liste Evènements</h2>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($events) >= 1)
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Evènement N°#</th>
                <th>Titre</th>
                <th>Date de l'évènement</th>
                <th>Actions</th>
              </tr>
            </thead>
            @foreach($events as $event)
              <tbody>
                <tr>
                  <td>{{$event->id}}</td>
                  <td><a href="{{ URL::to('./events/' . $event->id) }}">{{$event->title}}</a></td>
                  <td>{{$event->datestart->format('d/m/Y')}}</td>
                  <td><a href="{{ URL::to('./events/' . $event->id) }}"><button type="button" class="btn btn-primary">Voir</button></a></td>
                  <td><a href="{{ URL::to('./events/' . $event->id . '/edit') }}"><button type="button" class="btn btn-primary">MAJ</button></a></td>
                </tr>            
              </tbody>
            @endforeach
          </table>
        @else
          <p>Aucun évènement existant</p>
        @endif  
      </div>
      <div class="btn-group">
        <a href="{{ URL::to('./events/create') }}" class="btn btn-primary" role="button">Ajouter</a>
      </div>
    </div>
  </div>
</div>
@endsection