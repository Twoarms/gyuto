@extends('layouts.app')

@section('title', "Dashboard - Mes Images")

@section('content')
  <div class="row"> 
    <h2 class="col-sm-11">Liste Images</h2>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Image N°#</th>
            <th>Titre</th>
            <th>Date de modification</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($theimages as $theimage)
          <tbody>
            <tr>
              <td>{{$theimage->id}}</td>
              <td>{{$theimage->titleFr}}</td>
              <td>{{$theimage->updated_at}}</td>
			<button type="button" class="btn btn-info btn-sm">Voir</button></td>
            </tr>            
          </tbody>
        @endforeach
      </table>    
  </div>
@endsection