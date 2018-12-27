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

@section('title', 'Dashboard - Mes Vidéos')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body"> 
      <div class="card-header font-weight-bold">
        Titre de votre vidéo en Français
      </div>
      <div class="card-text">
        {{$video->titleVFr}}
      </div>
    </div>
    <div class="card-body">  
      <div class="card-header font-weight-bold">
        Titre de votre vidéo en Anglais
      </div>
      <div class="card-text">
        {{$video->titleVEn}}
      </div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">
        Catégorie
      </div>
      <div class="card-text">
        {{$video->category}}
      </div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">
        Citation de votre vidéo en Français
      </div>
      <div class="card-text">
        {{$video->citationVFr}}
      </div>
    </div>
    <div class="card-body">  
      <div class="card-header font-weight-bold">
        Citation de votre vidéo en Anglais
      </div>
      <div class="card-text">
        {{$video->citationVEn}}
      </div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">
        Légende de votre vidéo en Français
      </div>
      <div class="card-text">
        {{$video->legendVFr}}
      </div>
    </div>
    <div class="card-body">  
      <div class="card-header font-weight-bold">
        Légende de votre vidéo en Anglais
      </div>
      <div class="card-text">
        {{$video->legendVEn}}
      </div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">
        URL de votre vidéo FR
      </div>
      <div class="card-text">
        {{$video->urlVideoFr}}
      </div>
    </div>
    <div class="sizer">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="200" height="200" class="embed-responsive-item" id="myVideoFr" src="{{$video->urlVideoFr}}"></iframe>
      </div>
    </div>
    <div class="card-body">
      <div class="card-header font-weight-bold">
        URL de votre vidéo EN
      </div>
      <div class="card-text">
        {{$video->urlVideoEn}}
      </div>
    </div>   
    <div class="sizer">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="200" height="200" class="embed-responsive-item" id="myVideoEn" src="{{$video->urlVideoEn}}"></iframe>
      </div>
    </div>
  </div>      
  <div class="card col-sm-7">
    <div class="card-header font-weight-bold" id="myBtnIc">GIF
    </div>
    <div class="card-body imageCover">  
      @if (isset($video->imagepage_id)) 
        <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-thumbnail" id="myBtn{{$theimage->id}}">
        <a href="#" class="btn btn-primary" id="myBtnIcA">Voir le GIF</a>
        <br>
      @endif    
    </div>        
  </div>
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="container">    
        <span class="close">&times;</span>
        <h1>GIF</h1>
        <div class="card contenu">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-4">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">GIF</a>
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
      <a href="{{ URL::to('./videos') }}"><button type="submit" class='btn btn-primary form-control' name="confirmer" value="confirmer">Fermer</button></a>      
  </div>
</div>
@endsection

@section('script')
<script>
  $(() => {
    $('input[type="file"]').on('change', (e) => {
      let that = e.currentTarget
      if (that.files && that.files[0]) {
        $(that).next('.custom-file-label').html(that.files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview').attr('src', e.target.result);
          $('#preview').attr("name", e.target.result);
          $('#gyuto').attr("value", that.files[0].name);
        }
        reader.readAsDataURL(that.files[0])
      }
    })
  })
</script>
<script>
  var modal = document.getElementById("myModal");
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
  function getFocus(bout) {
    let varMyImg = document.getElementById("myImg" + bout);
    let filenameSrc = varMyImg.src;
    let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
    document.getElementById("titleIFr").focus();      
    document.getElementById("preview").src = filenameSrc;
    document.getElementById("gyuto").setAttribute("value", filename);
  }
</script>
@endsection