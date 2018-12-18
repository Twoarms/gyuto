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
	  		<!-- <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">Ajouter à la galerie</button> -->
	  		@include('inc.galeryimgsanscovermodale')
			<!-- <a href="#" data-dismiss="modal" data-toggle="modal" id="AjGalerie" data-target="#myModal" class="form-check-label">Ajouter à la galerie</a> -->
			<!-- <a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a> -->
			</div>
		</div>
	</div>
</div>
<!-- </div> -->
<!-- </div> -->
