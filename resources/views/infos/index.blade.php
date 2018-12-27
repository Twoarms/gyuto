@extends('layouts.app')

@section('title', "Dashboard - Mes Informations")

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header"> 
      <h2 class="col-sm-11">Liste Informations</h2>
    </div>
    <div class="card-body">
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
                  <td>{{$info->titleInFr}}</td>
                  <td>{{$info->updated_at->format('d/m/Y')}}</td>
                  <td><a href="{{ URL::to('./infos/' . $info->id . '/edit') }}"><button type="button" class="btn btn-primary">MAJ</button></a></td>
                  <td><a href="{{ URL::to('./infos/cat/' . $info->id) }}"><button type="button" class="btn btn-primary">Ajouter une sous-catégorie</button></a></td>
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
      <div class="btn-group">
        <a href="{{ URL::to('./infos/create') }}" class="btn btn-primary" role="button">Ajouter</a>
      </div>
    </div>
  </div>
</div>
@endsection