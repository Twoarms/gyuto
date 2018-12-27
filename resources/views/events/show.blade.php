@extends('layouts.app')

@section('stylesheet')
<style type="text/css">
  .lightbox{
   z-index: 1041;
  }
  .medium-img{
    width: 150px;
    height: 150px;
    padding: 1rem;
  } 
</style>
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  /* Modal Content */
  .modal-content {
    background-color: #fefefe;
    margin: auto;
    margin-left: 306px;
    padding: 6px;
    padding-left:35px;
    border: 1px solid #888;
    width: 95%;
    margin-bottom: 20vh;
  }
  /* The Close Button */
  .close {
    color: #000;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-left: 92rem;
    padding-top: 0.5rem;
  }
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  .detail {
    margin-right: 0px;
    margin-top: 75px;
  }
  .contenu {
    width: 88%;
    padding: 2px;
  }
  .card-body {
    width: 87%;
    padding: 2px;
  }
  .nav-tabs {
    border: none;
  }
  .col-sm-5{
    padding-bottom: 5px;      
  }   
  label[for='nameImage'] {
    margin-left: 20rem;
    margin-top: 15rem;
    margin-bottom: 15rem;
  }
  label[for='urlVideo'] {
    margin-top: 1.5rem;
  }   
  .col-sm-7 {
    padding-left: 0;
    padding-right: 0px;
    margin-right: 0;
  }
  .col-sm-8 {
    padding-right: 0px;
    margin-left: 0px;
  }
  .card .col-sm-5 {
    padding-left: 0px;
    padding-right: 0;
    margin-right: 0px;
    width: 80vw;
  }
  .card-body {
    padding-right: 0px;
  }
  .card-header {
    padding-right: 10px;
  }
  #myBtnIcA {
    margin-top: 0.5rem;
    margin-left: 0px;
    padding-right: 10px;
  }
  .sizer {
    width: 10%;
    margin-bottom: 1rem;
  }
  .btn-group {
    margin-top: 0.5rem;
  }
  #saveImg {
    margin-left: 0.5rem;
  }
</style>
@endsection

@section('title', "Dashboard - Mes Evènements")

@section('content')
<div class="container-fluid">  
  <div class="card">     
    <div class="card-body">
      <div class="card-header font-weight-bold">Titre</div>
      <div class="card-text">{{$event->title}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Date de début</div>      
      <div class="card-text">{{$event->datestart->format('d/m/Y')}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Date de la fin</div>
      <div class="card-text">{{$event->dateend->format('d/m/Y')}}</div>
    </div>  
    <div class="card-body">
      <div class="card-header font-weight-bold">Heure de début</div>
      <div class="card-text">{{$event->hourstart}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Heure de la fin</div>
      <div class="card-text">{{$event->hourend}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Place</div>
      <div class="card-text">{{$event->place}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">N° de la rue</div>
      <div class="card-text">{{$event->number}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Rue</div>
      <div class="card-text">{{$event->street}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Code Postal</div>
      <div class="card-text">{{$event->zipCode}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Ville
      </div>
      <div class="card-text">{{$event->city}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Pays
      </div>
      <div class="card-text">{{$event->country}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Description Fr</div>
      <div class="card-text">{{$event->descriptionfr}}</div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">Description EN</div>
      <div class="card-text">{{$event->descriptionen}}</div>
    </div>    
  </div>
  <div class="card col-sm-7">
    <div class="card-header font-weight-bold" id="myBtnIc">Image cover Evènements
    </div>
    <div class="card-body imageCover">  
      @if (isset($event->imagepage_id)) 
        <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-thumbnail" id="myBtn{{$theimage->id}}">
         <a href="#" class="btn btn-primary" id="myBtnIcA">Voir l'image cover Evènements</a>
        <br>
      @endif    
    </div>        
  </div>
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="container">    
        <span class="close">&times;</span>
        <h1>Image cover Evènements</h1>
        <div class="card contenu">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-4">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Image cover Evènements</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="biblio" role="tabpanel" aria-labelledby="biblio-tab">
              <div class="row">
                <div class="card col-sm-7">
                  <div class="card-body">
                    <img id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-fluid">
                  </div>
                </div>    
                <div class="card col-sm-5" id="smyBtnS">
                  @include('inc.showimagemodale', ['imageid' => $theimage->id])
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>   
  </div>
  <br>  
  <div class="btn-group boutton">
      <a href="{{ URL::to('./events') }}"><button type="submit" class='btn btn-primary form-control' name="confirmer" value="confirmer">Fermer</button></a>      
  </div>
</div>
@endsection

@section('script')
<script>
  var modal = document.getElementById("myModal");
    // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  var btnIc = document.getElementById("myBtnIc");
  var btnIcA = document.getElementById("myBtnIcA");
  var goBiblio = document.getElementById("myGoBiblio");
  var varCloseImg = document.getElementById("closeImg");
  btnIc.onclick = function() {
    modal.style.display = "block";
  }
  btnIcA.onclick = function() {
    modal.style.display = "block";
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  varCloseImg.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";           
    }
  }  
</script> 
@endsection