@extends('layouts.app')

@section('title', "Dashboard - Mes Informations")

@section('content')
  <div class="row"> 
    <h2 class="col-sm-11">Liste Informations</h2>
    <a href="{{ URL::to('./infos/create') }}" class="btn btn-info pull-right col-sm-1" role="button">Ajouter</a>
  </div>
  <div class="table-responsive">
    @if(count($infos) >= 1)
      <table class="table">
        <thead>
          <tr>
            <th>Info N°#</th>
            <th>Parent N°#</th>
            <th>Index Title N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Actions</th>
          </tr>
        </thead>
        @foreach($theinfos as $info)
          <tbody>
            <tr>
              <td>{{$info->id}}</td>
              <td></td>
              <td>{{$info->index_title}}</td>
              <td><a href="{{ URL::to('./infos/' . $info->id) }}">{{$info->titleInFr}}</a></td>
              <td>{{$info->updated_at}}</td>
              <td><a href="{{ URL::to('./infos/' . $info->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
              <td><a href="{{ URL::to('./infos/' . $info->id . '/edit') }}"><button type="button" class="btn btn-info btn-sm">MAJ</button></a></td>
              <td><a href="{{ URL::to('./infos/cat/' . $info->id) }}"><button type="button" class="btn btn-info btn-sm">Ajouter une sous-catégorie</button></a></td>
            </tr>                  
              @if(count($info->children))
                @include('inc.mchild',['children' => $info->children])
              @endif                  
          </tbody>
        @endforeach
      </table>
    @else
      <p>Aucune information existante</p>
    @endif  
  </div>
@endsection