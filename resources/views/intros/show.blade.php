@extends('layouts.app')

@section('stylesheet')
<style type="text/css">
  .sizer {
    width: 300px;
    margin-bottom: 1rem;
  }
</style>
@endsection

@section('title', 'Dashboard - Mes Intros')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="card-header font-weight-bold">Légende FR</div>
      <div class="card-text">{{$intro->legendVideoFr}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Légende EN</div>
      <div class="card-text">{{$intro->legendVideoEn}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Quote FR</div>
      <div class="card-text">{{$intro->quoteVideoFr}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Quote EN</div>
      <div class="card-text">{{$intro->quoteVideoEn}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">URL Vidéo FR</div>   
      <div class="card-text">{{$intro->urlVideoFr}}</div>
    </div>    
    <div class="sizer">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="200" height="200" class="embed-responsive-item" id="myVideoFr" src="{{$intro->urlVideoFr}}"></iframe>
      </div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">URL Vidéo EN</div>   
      <div class="card-text">{{$intro->urlVideoEn}}</div>
    </div>
    <div class="sizer">
      <div class="embed-responsive embed-responsive-16by9">
      <iframe width="200" height="200" class="embed-responsive-item" id="myVideoEn" src="{{$intro->urlVideoEn}}"></iframe>
      </div>
    </div>    
  </div>
</div>
@endsection

@section('script')
@endsection