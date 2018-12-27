<h3 class="card-header">Détail du média</h3>		
<div class="card-body">
	<div class="form-group">			
        <img id="preview" class="img-fluid medium-img" src="{{ url('myimages/' . $theimage->nameImage) }}" alt="" name="nameImage">
    </div>
	<div class="form-group font-weight-bold">
		<label for="gyuto">URL</label><br/>
		<input type="text" name="nameImage" id="gyuto" value="{{$theimage->nameImage}}">
	</div>
	<div class="form-group font-weight-bold">
		<label for="didImg">ID</label><br/>
		<input id="didImg" name="didImg" type="text" value="{{$theimage->id}}">
	</div>
	<div class="form-group font-weight-bold"  id="myBtnS">
		{{Form::label('titleIFr', 'Titre FR')}}
		{{Form::text('titleIFr', $theimage->titleIFr, ['class' => 'form-control', 'id' =>'didtitleIFr', 'placeholder' => 'Titre FR']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('titleIEn', 'Titre EN')}}
		{{Form::text('titleIEn', $theimage->titleIEn, ['class' => 'form-control', 'id' =>'didtitleIEn', 'placeholder' => 'Titre EN']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('legendIFr', 'Légende FR')}}
		{{Form::text('legendIFr', $theimage->legendIFr, ['class' => 'form-control', 'id' =>'didlegendIFr', 'placeholder' => 'Légende FR']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('legendIEn', 'Légende EN')}}
		{{Form::text('legendIEn', $theimage->legendIEn, ['class' => 'form-control', 'id' =>'didlegendIEn', 'placeholder' => 'Légende EN']) }}
	</div>
	<div class="form-group font-weight-bold">
		{{Form::label('cover', 'Image de Couverture')}}
		{{ Form::radio('cover', '0' , ['id' =>'didcoverNo']) }} No
  		{{ Form::radio('cover', '1' , ['id' =>'didcoverYes']) }} Yes		
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-primary form-control" id="closeImg" data-dismiss="modal">Close</button>
		<button type="submit" class='btn btn-primary form-control' id="saveImg" name="action" value="save" >Save</button>
	</div>
</div>
