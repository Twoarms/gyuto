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
/*    height: 100vh;*/
    margin-bottom: 20vh;
  }
  /* The Close Button */
  .close {
    /*color: #aaaaaa;*/
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
  #saveImg {
    margin-left: 0.5rem;
  }
  </style>
@endsection

@section('title', "Dashboard - Création de Vidéos")

@section('content')
<div class="container-fluid">
  <div class="card-body"> 
    {!! Form::open(['route' => ['videos.update', $video->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="form-group font-weight-bold">
      {{Form::label('titleVFr', 'Titre FR')}}
      {{Form::text('titleVFr', $video->titleVFr, ['class' => 'form-control', 'placeholder' => 'Titre de votre vidéo en Français']) }}
    </div>  
    <div class="form-group font-weight-bold">
      {{Form::label('titleVEn', 'Titre EN')}}
      {{Form::text('titleVEn', $video->titleVEn , ['class' => 'form-control', 'placeholder' => 'Titre de votre vidéo en Anglais']) }}
    </div>
    <div class="form-group font-weight-bold">
      {{Form::label('category', 'Catégorie')}}
      {{Form::select('category', ['1' => '1', '2' => '2', '3' => '3'], $video->category, ['placeholder' => 'Catégorie'])}}
    </div>
    <div class="form-group font-weight-bold">
      {{Form::label('citationVFr', 'Citation FR')}}
      {{Form::text('citationVFr', $video->citationVFr, ['class' => 'form-control', 'placeholder' => 'Citation de votre vidéo en Français']) }}
    </div>  
    <div class="form-group font-weight-bold">
      {{Form::label('citationVEn', 'Citation EN')}}
      {{Form::text('citationVEn', $video->citationVEn, ['class' => 'form-control', 'placeholder' => 'Citation de votre vidéo en Anglais']) }}
    </div>
    <div class="form-group font-weight-bold">
      {{Form::label('legendVFr', 'Légende FR')}}
      {{Form::text('legendVFr', $video->legendVFr, ['class' => 'form-control', 'placeholder' => 'Légende de votre vidéo en Français']) }}
    </div>  
    <div class="form-group font-weight-bold">
      {{Form::label('legendVEn', 'Légende EN')}}
      {{Form::text('legendVEn', $video->legendVEn, ['class' => 'form-control', 'placeholder' => 'Légende de votre vidéo en Anglais']) }}
    </div>
    <div class="form-group font-weight-bold">
      <label for="urlVideoFr">URL video FR</label>
      <input type="url" id="urlVideoFr" name="urlVideoFr" class = 'form-control' placeholder = 'URL de votre vidéo FR' value='{{$video->urlVideoFr}}' onchange='getVideoFr()');>
    </div>
    <div class='sizer' id="myVideoFr">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="200" height="200" class="embed-responsive-item" src="{{$video->urlVideoFr}}"></iframe>
      </div>
    </div>
    <div class="form-group font-weight-bold">
      <label for="urlVideoEn">URL video EN</label>
      <input type="url" id="urlVideoEn" name="urlVideoEn" class = 'form-control' placeholder = 'URL de votre vidéo EN' value='{{$video->urlVideoEn}}' onchange='getVideoEn()');>
    </div>
    <div class='sizer' id="myVideoEn">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="200" height="200" class="embed-responsive-item" src="{{$video->urlVideoEn}}"></iframe>
      </div>
    </div>
    <div class="card col-sm-7">
      <div class="card-header font-weight-bold" id="myBtnIc">GIF</div>
      <div class="card-body"> 
        @if (isset($video->imagepage_id))
          <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-thumbnail" id="myBtn{{$theimage->id}}">
          <a href="#" class="btn btn-primary" id="myBtnIcA">MAJ GIF</a>
          <br>
        @else
          <a href="#" class="btn btn-primary" id="myBtnIcA">Ajouter le GIF mis en avant</a>  
        @endif    
      </div>        
    </div>
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="container">
          <span class="close">&times;</span>
          <h1>Ajouter le GIF à la galerie</h1>
          <div class="card contenu">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" id="televerser-tab" data-toggle="tab" role="tab" aria-controls="televerser" aria-selected="true" href="#televerser">Téléverser des fichiers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Bibliothèque de GIF</a>
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
                      @foreach($theimages as $theimage)
                        <a onclick="getFocus('{{$theimage->id}}');"><img id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img"></a>
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
                    @include('inc.imagegifmodale', $theimage)
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="televerser" role="tabpanel" aria-labelledby="televerser-tab">
                <div class="card">
                  <div class="card-body"> 
                    <div class="form-group font-weight-bold">
                      {{Form::label('nameImage', 'Upload Image')}}
                      {{Form::file('nameImage') }}
                    </div>        
                  </div>
                </div>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </div>
    <br/>
    <div class="btn-group boutton"> 
      <button type="submit" class='btn btn-primary form-control' name="confirmer" value="confirmer">CONFIRMER</button>
      {!! Form::close() !!}
    </div>      
  </div>
</div>  
@endsection

@section('script')
<script>
  function getVideoFr() {
    let vidFr = document.getElementById("myVideoFr");
    let uvideoFr = document.getElementById("urlVideoFr").value;
    vidFr.innerHTML = '<iframe class="embed-responsive-item" src="'+uvideoFr+'"></iframe>';             
  }
  function getVideoEn() {
    let vidEn = document.getElementById("myVideoEn");
    let uvideoEn = document.getElementById("urlVideoEn").value;
    vidEn.innerHTML = '<iframe class="embed-responsive-item" src="'+uvideoEn+'"></iframe>';               
  }
</script>
<script>
  $(() => {
    $('input[type="file"]').on('change', (e) => {
      let that = e.currentTarget
      if (that.files && that.files[0]) {
        $(that).next('.custom-file-label').html(that.files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview').attr('src', e.target.result);
          $('#gyuto').attr("value", that.files[0].name);          
        }
        reader.readAsDataURL(that.files[0])
      }
    })
  })
</script>
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
    mydidtitleIFr.value = myidtitleIFr.innerText;
    mydidtitleIEn.value = myidtitleIEn.innerText;
    mydidlegendIFr.value = myidlegendIFr.innerText;
    mydidlegendIEn.value = myidlegendIEn.innerText;
    mydididImg.value = myidid.innerText;
    document.getElementById("gyuto").value = myidname.innerText;                     
  }
    var myNameImg = document.getElementById('nameImage');
    $(document).ready(function(){
      myNameImg.addEventListener('change', function(){
        $(".nav-tabs #biblio-tab").tab('show');
      });
    });
</script>
@endsection