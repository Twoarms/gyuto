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
	    padding: 20px;
	    border: 1px solid #888;
	    width: 80%;
	}

	/* The Close Button */
	.close {
	    color: #aaaaaa;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}
	</style>
@endsection

@section('content')
<!-- The Modal -->
<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<h1>Dashboard - Upload Images</h1>

		{!! Form::open(['action' => 'ImagepagesController@store', 'method' => 'POST', 'files' => true]) !!}

		{!! csrf_field() !!}

		<div class="form-group font-weight-bold">
			{{Form::label('titleFr', 'Titre FR')}}
			{{Form::text('titleFr', '', ['class' => 'form-control', 'placeholder' => 'Titre FR']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('titleEn', 'Titre EN')}}
			{{Form::text('titleEn', '', ['class' => 'form-control', 'placeholder' => 'Titre EN']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('legendFr', 'Légende FR')}}
			{{Form::text('legendFr', '', ['class' => 'form-control', 'placeholder' => 'Légende FR']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('legendEn', 'Légende EN')}}
			{{Form::text('legendEn', '', ['class' => 'form-control', 'placeholder' => 'Légende EN']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('nameImage', 'Upload Image')}}
			{{Form::file('nameImage') }}
		</div>
		<div class="form-group">
	        <img id="preview" class="img-fluid medium-img" src="#" alt="">
	    </div>

		{{Form::submit('CONFIRMER', ['class' => 'btn btn-primary']) }}
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
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })

        })          

    </script>
	<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		</script>

@endsection