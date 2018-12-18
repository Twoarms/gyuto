<h3 class="card-header">Détail de l'image</h3>		
	<div class="card-body">
		<div class="form-group">			
	        <img id="preview" class="img-fluid medium-img" src="{{ url('myimages/' . $theimage->nameImage) }}" alt="" name="">
	    </div>
		<div class="form-group font-weight-bold">
			<input type="text" name="nameImage" id="gyuto" value="">
		</div>
	    		
		<div class="form-group font-weight-bold"  id="myBtnS">
			{{Form::label('titleIFr', 'Titre FR')}}
			{{Form::text('titleIFr', $theimage->titleIFr, ['class' => 'form-control', 'placeholder' => 'Titre FR']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('titleIEn', 'Titre EN')}}
			{{Form::text('titleIEn', $theimage->titleIEn, ['class' => 'form-control', 'placeholder' => 'Titre EN']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('legendIFr', 'Légende FR')}}
			{{Form::text('legendIFr', $theimage->legendIFr, ['class' => 'form-control', 'placeholder' => 'Légende FR']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('legendIEn', 'Légende EN')}}
			{{Form::text('legendIEn', $theimage->legendIEn, ['class' => 'form-control', 'placeholder' => 'Légende EN']) }}
		</div>
		<div class="form-group font-weight-bold">
			{{Form::label('cover', 'Image de Couverture')}}
			{{ Form::radio('cover', '0' , true) }} No
  			{{ Form::radio('cover', '1' , false) }} Yes		
		</div>
		<div>{{$theimage->nameImage}}</div>
		<div>{{$theimage->id}}</div>
		<div class="form-group font-weight-bold">
			<button type="submit" class='btn btn-primary form-control' id="closeImg" name="action" value="save">Save</button>
		</div>
	</div>
