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
        height: 100vh;
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

    /*.imageCover {
      height: 300px;
      padding: 0;
    }*/

    #myBtnIcA {
      margin-top: 180px;
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
        {{Form::label('urlVideo', 'URL video')}}
        {{Form::text('urlVideo', $video->urlVideo, ['class' => 'form-control', 'placeholder' => 'URL de votre vidéo']) }}
      </div>

      <!-- <a href="#" class="btn btn-primary" onclick="myFunction()">Play Video</a><br> -->

      <div class="sizer">
        <div class="embed-responsive embed-responsive-16by9">
        <iframe width="200" height="200" class="embed-responsive-item" id="myVideo" src="{{$video->urlVideo}}"></iframe>
        </div>
    </div>
      
      <div class="container-fluid">
        <div class="card col-sm-5">
          <div class="card-header font-weight-bold" id="myBtnG">Galerie de GIF
          </div>
          <div class="card-body">
            @if ($video->imagepage) 
              <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-thumbnail" id="myBtn{{$theimage->id}}">                
            @endif       
            <br>
            @if (!($video->imagepage)) 
              <a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a>
              @else
              <a href="#" class="btn btn-primary" id="myBtn">Mise à jour GIF</a>
            @endif
          </div>
        </div>
        <div class="card col-sm-5 imageCover">
          <div class="card-header font-weight-bold" id="myBtnIc">GIF mis en avant
          </div>
          <div class="card-body imageCover">  
            @if ($video->imagepage->cover == '1') 
              <img src="{{ url('myimages/' . $theimage->nameImage) }}" class="img-thumbnail" id="myBtn{{$theimage->id}}">
              <a href="#" class="btn btn-primary" id="myBtn">MAJ Mise en avant</a>
              <br>
              @elseif (empty($video->imagepage->cover) || $video->imagepage->cover == '0') 
              <a href="#" class="btn btn-primary" id="myBtnIcA">Ajouter le GIF mis en avant</a>  
            @endif    
          </div>        
        </div>
    </div>

    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="container-fluid">
        <div class="modal-content">
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
                      @endforeach
                    </div>
                  </div>    
                  <div class="card col-sm-5" id="smyBtnS">
                    @include('inc.imagemodale', ['imageid' => $theimage->id])
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
      
  </div>
<!-- </div> -->

 
<!--    <iframe id="myVideo" src="{{$video->urlVideo}}" controls autoplay>
      Your browser does not support HTML5 video.
  </iframe><br> -->

 
    
<!--   </div> -->

 <!-- </div> -->
<!--   <br> -->
  
  <div class="form-group font-weight-bold">
    <button type="submit" id="" name="confirmer" value="confirmer">CONFIRMER</button>
    {!! Form::close() !!}
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
                        // $('#preview').attr("name", e.target.result);
                        $('#gyuto').attr("value", that.files[0].name);
                        console.log(e.target.result);
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script>
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

      function getFocus(bout) {
        let varMyImg = document.getElementById("myImg" + bout);
        let filenameSrc = varMyImg.src;
          let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
        document.getElementById("titleIFr").focus();      
        document.getElementById("preview").src = filenameSrc;
        document.getElementById("gyuto").setAttribute("value", filename);
      }

      var myNameImg = document.getElementById('nameImage');
      $(document).ready(function(){
          myNameImg.addEventListener('change', function(){
              $(".nav-tabs #biblio-tab").tab('show');
            });
      });
</script>
  <script> 
    var vid = document.getElementById("myVideo");
    var uvideo = document.getElementById("urlVideo").value;

    function myFunction() {
          vid.src = uvideo;
          console.log(uvideo);
          console.log(vid.src);
        // vid.innerHTML = '<iframe width="200" height="200" class="embed-responsive-item" src="uvideo"></iframe>';
        // console.log('coucou');
    }

  </script>

<!--   <script> 
    var vid = document.getElementById("myVideo");
    var uvideo = document.getElementById("urlVideo").value;

    function myFunction() {
        vid.src = uvideo;
    }

    // var gif = document.getElementById("myGif");
    // var ugif = document.getElementById("gif").value;

    // function myFunctionGif() {
    //     gif.src = ugif;
    // } 
  </script> -->
@endsection