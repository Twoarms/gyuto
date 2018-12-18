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
		    padding-top: 80px; /* Location of the box */
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
		    /*margin: auto;
		    margin-left: 306px;*/
		    padding: 6px;
		    padding-left:10px;
		    border: 1px solid #888;
		    width: 150%;
		    /*	*/
		    margin-bottom: 20vh;
		    margin-left: 1rem;
		    margin-right: 1rem;
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

		.col-sm-5{
      		padding-bottom: 5px;      
    	}		

		label[for='nameImage'] {
			margin-left: 20rem;
			margin-top: 15rem;
			margin-bottom: 15rem;
		}
		
		/*label[for='urlVideo'] {
			margin-top: 1.5rem;
		}*/
		
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

		.btn-group button
		{
			margin-top: 5px;
			margin-left: 10px;
			margin-right: 15px;
		}
		
		/*input[type=textarea] {
			height: 0.1px;
		}*/
		/*.imageCover {
			height: 300px;
			padding: 0;
		}*/

/*		#myBtnIcA {
			margin-top: 180px;
			margin-left: 0px;
			padding-right: 10px;
		}*/
/*		.sizer {
		  width: 10%;
		  margin-bottom: 1rem;
		}*/
	</style>
@endsection

@section('title', "Dashboard - Création d'Informations")

@section('content')
	<div class="container">
		<!-- <div class="card-body"> -->
			{!! Form::open(['action' => 'InfosController@store', 'method' => 'POST', 'files' => true]) !!}
			@if (isset($infoparentid))
			<input id="parId" name="parent_id" type="text" value="{{$infoparentid}}">
			@else
			<input id="pardId" name="parent_id" type="text" value="0">
			@endif
			<div class="form-group font-weight-bold">
				{{Form::label('index_title', 'index_title')}}
				{{Form::text('index_title', '', ['class' => 'form-control', 'placeholder' => 'index_title']) }}
			</div>
			<div class="form-group font-weight-bold">
				{{Form::label('titleInFr', 'Titre FR')}}
				{{Form::text('titleInFr', '', ['class' => 'form-control', 'placeholder' => 'Titre FR']) }}
			</div>	
			<div class="form-group font-weight-bold">
				{{Form::label('titleInEn', 'Titre EN')}}
				{{Form::text('titleInEn', '', ['class' => 'form-control', 'placeholder' => 'Titre EN']) }}
			</div>


			<hr/>
		<div class="card-body">
<h2>PARAGRAPHE</h2>
<div class="form-group font-weight-bold">
	{{Form::label('titleParFr', 'Titre Paragraphe FR')}}
	{{Form::text('titleParFr', '', ['class' => 'form-control', 'placeholder' => 'Titre Paragraphe FR']) }}
</div>	
<div class="form-group font-weight-bold">
	{{Form::label('titleParEn', 'Titre Paragraphe EN')}}
	{{Form::text('titleParEn', '', ['class' => 'form-control', 'placeholder' => 'Titre Paragraphe EN']) }}
</div>
<div class="form-group font-weight-bold">
	{{Form::label('textParFr', 'Texte Paragraphe FR')}}
	{{Form::textarea('textParFr', '', ['class' => 'form-control', 'placeholder' => 'Texte Paragraphe FR']) }}
</div>
<div class="form-group font-weight-bold">
	{{Form::label('textParEn', 'Texte Paragraphe EN')}}
	{{Form::textarea('textParEn', '', ['class' => 'form-control', 'placeholder' => 'Texte Paragraphe EN']) }}
</div>
<div class="card">
	<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images</div>
	<div class="card-body">	
  		<br>
  		<div class="btn-group">
  		<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">Ajouter à la galerie</button>
		<!-- <a href="#" data-dismiss="modal" data-toggle="modal" id="AjGalerie" data-target="#myModal" class="form-check-label">Ajouter à la galerie</a> -->
		<!-- <a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a> -->
	</div>
	</div>
</div>
</div>



			<!-- <input id="paragraphId" name="paragraphId" type="text" value="1"> -->
			<!-- @include('inc.creaparagraph') -->
			
			<div class="container">
			<div class="form-group font-weight-bold">	
				<br>
				<div class="btn-group">
				 <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModalPar">Ajouter un paragraphe</button>
				 <!-- <a href="#" class="btn btn-primary" id="myBtnPar">Ajouter un paragraphe</a> -->
				</div>
			</div>
			<div class="modal fade" data-backdrop="" id="myModalPar" role="dialog">
			<!-- <div id="myModalPar" class="modal"> -->
			<!-- Modal content -->
			<div class="modal-dialog modal-lg">
				<!-- <div class="container-fluid"> -->
					<div class="modal-content">
						<div class="container">
						<!-- <div class="modal-header"> -->
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<!-- <span class="close" id="parag" data-dismiss="modal">&times;</span> -->
						<h1>Ajouter un paragraphe</h1>
				 		<!-- <div class="card contenu"> -->
				 			<!-- <div class="row"> -->
				 			<!-- </div> -->
				 				<div class="modal-body">
				 					<!-- <span class="close" id="parag" data-dismiss="modal">&times;</span> -->
								<!-- <div class="col-sm-8 col-sm-offset-4"> -->
									<!-- @include('inc.creaparagraph') -->
							<!-- 	</div> -->
								<!-- <div class="modal-footer"> -->
								<div class="btn-group">	
									<!-- <div class="form-group font-weight-bold"> -->
										<button type="button" class="btn btn-primary form-control" data-dismiss="modal">Close</button>
										<!-- <button type="submit" class='btn btn-primary form-control' id="closePar" name="actionPar" value="sauvegarder">Save</button>								 -->		
									</div>
								</div>
							<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						</div>
					</div>
				</div>
			</div>
			@include('inc.galeryimgsanscovermodale')
			<!-- </div> -->
			<div class="btn-group">
			<!-- <div class="form-group font-weight-bold"> -->
				<button type="submit" id="" class='btn btn-primary form-control' name="confirmer" value="confirmer">Confirmer</button>
				{!! Form::close() !!}
			<!-- </div> -->
			</div>	
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
                        console.log(e.target.result);
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })

    //     $(() => {
    //     	$('.imgsel').on('click', (e) => {
    //     		$('#sp1').text(val1);
				// $('#sp2').text(val2);
				// $('#sp3').text(val3);
    //     	}
    //     })
    </script>
    <script>
    	
    	var modal = document.getElementById("myModal");
    	var modalPar = document.getElementById("myModalPar");
    	var btn = document.getElementById("myBtn");
    	var btnG = document.getElementById("myBtnG");
    	// var btnPar = document.getElementById("myBtnPar");
    	// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		var goBiblio = document.getElementById("myGoBiblio");
		// var varCloseImg = document.getElementById("closeImg");
		// var varClosePar = document.getElementById("closePar");
		// var varParag = document.getElementById("parag");
		
		// When the user clicks the button, open the modal 
		// btn.onclick = function() {			
		//     modal.style.display = "block";

		// }

		btnG.onclick = function() {
		    modal.style.display = "block";
		}

		// btnPar.onclick = function() {
		//     modalPar.style.display = "block";
		// }

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			console.log('coucou');
    		modal.style.display = "none";
		}

		// varParag.onclick = function() {
		// 	console.log('coucou');
  //   		modalPar.style.display = "none";
		// }

		// varCloseImg.onclick = function() {
  //   		modal.style.display = "none";
		// }

		// varClosePar.onclick = function() {
  //   		modal.style.display = "none";
		// }

		window.onclick = function(event) {
		    if (event.target == modal || event.target == modalPar) {
		        modal.style.display = "none";
		        modalPar.style.display = "none";	        
		    }
		}
		



		function getFocus(bout) {
			let varMyImg = document.getElementById("myImg" + bout);
			let filenameSrc = varMyImg.src;
    		let filename = filenameSrc.substring(filenameSrc.lastIndexOf('/')+1);
    		let myidtitlefr = document.getElementById("idtitlefr"  + bout);
			let myidtitleen = document.getElementById("idtitleen"  + bout);
			let mydidtitlefr = document.getElementById("didtitlefr");
			let mydidtitleen = document.getElementById("didtitleen");
			let myidid = document.getElementById("idid"  + bout);
			let myidname = document.getElementById("idname"  + bout);
			let mydidid = document.getElementById("didid");
			let mydidname = document.getElementById("didname");
			// document.getElementById("titleIFr").focus();
			mydidtitlefr.innerHTML = myidtitlefr.innerText;
			mydidtitleen.innerHTML = myidtitleen.innerText;
			mydidid.innerHTML = myidid.innerText;
			mydidname.innerHTML = myidname.innerText;
			console.log(myidtitleen.innerText);			
			document.getElementById("preview").src = filenameSrc;
			document.getElementById("gyuto").setAttribute("value", filename);
			document.getElementById("nameFilename").setAttribute("value", filename);
			}
			
			// console.log(myImageId.innerHTML);
			// let myimageselection = document.getElementById("imageselection");
			// myimageselection.innerHTML = '<button type="submit" id="" name="imgselection" value=""><button>';
			// console.log(myimageselection.innerHTML);
			


		// var myNameImg = document.getElementById('nameImage');
		// $(document).ready(function(){
  //   		myNameImg.addEventListener('change', function(){
  //       		$(".nav-tabs #biblio-tab").tab('show');
  //       		console.log(myNameImg);
  //   			});
		// });
	</script>	
@endsection