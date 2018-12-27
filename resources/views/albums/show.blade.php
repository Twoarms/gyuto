@extends('layouts.app')

@section('stylesheet')
<style type="text/css">
  .lightbox{
    z-index: 1041;
  }
  .medium-img{
    width: 150px;height: 150px;
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
  .card-text {
    padding-top: 0.5rem;
    height: 3rem;
    font-size: 20px;
    font-weight: bold; 
  } 
  .nav-tabs {
    border: none;
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
  .col-sm-5{
    padding-bottom: 5px;      
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
    width: 100%;
    padding-right: 10px;
  }
  #myBtnIcA {
    margin-top: 0.5rem;
    margin-left: 0px;
    padding-right: 10px;
  }
  #spinner {
    background: url(loading.gif) no-repeat 5px 3px;
    padding-left: 20px;
  }
  .sizer {
    width: 300px;
    margin-bottom: 1rem;
  }
</style>
@endsection

@section('title', "Dashboard - Mes Images")

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body"> 
      <div class="card-header font-weight-bold">
       Titre Album FR
      </div>
      <div class="card-text">
        {{$album->titleFr}}
      </div>
    </div>
    <div class="card-body">  
      <div class="card-header font-weight-bold">
        Titre Album EN
      </div>
      <div class="card-text">
        {{$album->titleEn}}
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header font-weight-bold" id="myBtnG">Galerie d'images</div>
    <div class="card-body">
      @if ($album->imagepages()->count() > 0) 
        @foreach($album->imagepages as $theimage)
          <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
        @endforeach
        <div class="card-body">        
          <a href="#" class="btn btn-primary" id="myBtn">Voir la galerie d'images</a>
        </div>              
      @else
        <div>Aucune image dans la galerie</div>
      @endif      
    </div>      
  </div>
  <div class="card imageCover">
    <div class="card-header font-weight-bold" id="myBtnIc">Image mise en avant</div>
    <div class="card-body imageCover">  
      @if ($album->imagepages()->count() > 0) 
        @foreach($album->imagepages as $theimage)
          @if ($theimage->cover == '1')
            <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img" id="myBtn{{$theimage->id}}">
          @endif
        @endforeach
      @endif    
      <br>
    </div>
    <div class="card-body"> 
      <br>
      <a href="#" class="btn btn-primary" id="myBtnIcA">Voir l'image mise en avant</a>
    </div>
  </div>
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="container">       
        <span class="close">&times;</span>
        <h1>Galerie d'images</h1>
        <div class="card contenu">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-4">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Bibliothèque d'images</a>
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
                    @foreach($album->imagepages as $theimage)
                      <a onclick="getFocus('{{$theimage->id}}');">
                        <img id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img"></a>
                      <span hidden id="idid{{$theimage->id}}" >{{$theimage->id}}</span>
                      <span hidden id="idname{{$theimage->id}}" >{{$theimage->nameImage}}</span>
                      <span hidden id="idtitleIFr{{$theimage->id}}" >{{$theimage->titleIFr}}</span>
                      <span hidden id="idtitleIEn{{$theimage->id}}" >{{$theimage->titleIEn}}</span>
                      <span hidden id="idlegendIFr{{$theimage->id}}" >{{$theimage->legendIFr}}</span>
                      <span hidden id="idlegendIEn{{$theimage->id}}" >{{$theimage->legendIEn}}</span>
                      <span hidden id="idcover{{$theimage->id}}" >{{$theimage->cover}}</span>
                    @endforeach
                  </div>
                </div>    
                <div class="card col-sm-5" id="smyBtnS">
                  @include('inc.showimagewithcovermodale', ['imageid' => $theimage->id])
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
      <a href="{{ URL::to('./albums') }}"><button type="submit" class='btn btn-primary form-control' name="confirmer" value="confirmer">Fermer</button></a>      
  </div>
</div>
@endsection

@section('script')
<script>
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var btnG = document.getElementById("myBtnG");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  var btnIc = document.getElementById("myBtnIc");
  var btnIcA = document.getElementById("myBtnIcA");
  var goBiblio = document.getElementById("myGoBiblio");
  var varCloseImg = document.getElementById("closeImg");
  // When the user clicks the button, open the modal 
  btn.onclick = function() {      
    modal.style.display = "block";
  }
  btnG.onclick = function() {
    modal.style.display = "block";
  }
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
  let mydidtitleIFr = document.getElementById("didtitleIFr");
  let mydidtitleIEn = document.getElementById("didtitleIEn");
  let mydididImg = document.getElementById("didImg");
  let mydidlegendIFr = document.getElementById("didlegendIFr");
  let mydidlegendIEn = document.getElementById("didlegendIEn");
  mydidtitleIFr.value = '';
  mydidtitleIEn.value = '';
  mydidlegendIFr.value = '';
  mydidlegendIEn.value = '';
  mydididImg.value = '';
  function getFocus(bout) {
    let varMyImg = document.getElementById("myImg" + bout);
    let filenameSrc = varMyImg.src;
    let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
    document.getElementById("preview").src = filenameSrc;           
    document.getElementById("didtitleIFr").focus();
    let myidtitleIFr = document.getElementById("idtitleIFr"  + bout);
    let myidtitleIEn = document.getElementById("idtitleIEn"  + bout);
    let mydidtitleIFr = document.getElementById("didtitleIFr");
    let mydidtitleIEn = document.getElementById("didtitleIEn");
    let myidname = document.getElementById("idname"  + bout);
    let myidid = document.getElementById("idid"  + bout);
    let mydididImg = document.getElementById("didImg");
    let myidlegendIFr = document.getElementById("idlegendIFr"  + bout);
    let myidlegendIEn = document.getElementById("idlegendIEn"  + bout);
    let mydidlegendIFr = document.getElementById("didlegendIFr");
    let mydidlegendIEn = document.getElementById("didlegendIEn");
    let myidcover = document.getElementById("idcover"  + bout);
    let mydidcoverNo = document.getElementById("didcoverNo");
    let mydidcoverYes = document.getElementById("didcoverYes");
    mydidtitleIFr.innerText = myidtitleIFr.innerText;
    mydidtitleIEn.innerText = myidtitleIEn.innerText;
    mydidlegendIFr.innerText = myidlegendIFr.innerText;
    mydidlegendIEn.innerText = myidlegendIEn.innerText;
    mydididImg.innerText = myidid.innerText;
    document.getElementById("gyuto").innerText = myidname.innerText;       
  }
</script>
@endsection