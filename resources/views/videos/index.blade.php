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

@section('title', 'Dashboard - Mes Vidéos')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">  
      <h2>Liste Vidéos</h2>    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($videos) >= 1)
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Vidéo N°#</th>
                <th>Titre</th>
                <th>Date de modification</th>
                <th>Actions</th>
              </tr>
            </thead>
            @foreach($videos as $video)
              <tbody>
                <tr>
                  <td>{{$video->id}}</td>
                  <td><a href="{{ URL::to('./videos/' . $video->id) }}">{{$video->titleVFr}}</a></td>
                  <td>{{$video->updated_at->format('d/m/Y')}}</td>
                  <td>{!! Html::linkRoute('videos.show', 'Voir', array($video->id), array('class' => 'btn btn-primary')) !!}</td>          
                  <td>{!! Html::linkRoute('videos.edit', 'Edit', array($video->id), array('class' => 'btn btn-primary')) !!}</td>              
                </tr>            
              </tbody>
            @endforeach
          </table>
        @else
          <p>Aucune vidéo existante</p>
        @endif  
      </div>
      <div class="btn-group">
        <a href="{{ URL::to('./videos/create') }}" class="btn btn-primary" role="button">Ajouter</a>
      </div>
    </div>
  </div>
</div>
@endsection