		<hr/>
		<div class="card-body">	
<h2 id="ma">PARAGRAPHE 1 </h2>
<div>{{$paragraph->id}}</div>
<input id="tparagId{$paragraph->id}}" name="paragId" type="text" value="{{$paragraph->id}}"> 
<input id="" name="" type="" value="{{$paragraph->id}}"> 
<div class="form-group font-weight-bold">
<!-- 	{{Form::label('titleParFr', 'Titre Paragraphe FR')}}
	{{Form::text('titleParFr', $paragraph->titleParFr, ['class' => 'form-control', 'placeholder' => 'Titre Paragraphe FR', 'id' => 'thetitleParFr']) }} -->
	<input id="thetitleParFr{$paragraph->id}}" name="titleParFr" type="text" class="form-control" placeholder="Titre Paragraphe FR" value="{{$paragraph->titleParFr}}"> 
</div>	
<div class="form-group font-weight-bold">
	{{Form::label('titleParEn', 'Titre Paragraphe EN')}}
	{{Form::text('titleParEn', $paragraph->titleParEn, ['class' => 'form-control', 'placeholder' => 'Titre Paragraphe EN', 'id' => 'thetitleParEn' . $paragraph->id]) }}
</div>

<div class="form-group font-weight-bold">
	{{Form::label('textParFr', 'Texte Paragraphe FR')}}
	{{Form::textarea('textParFr', $paragraph->textParFr, ['class' => 'form-control', 'placeholder' => 'Texte Paragraphe FR', 'id' => 'thetextParFr' . $paragraph->id]) }}
</div>
<div class="form-group font-weight-bold">
	{{Form::label('textParEn', 'Texte Paragraphe EN')}}
	{{Form::textarea('textParEn', $paragraph->textParEn, ['class' => 'form-control', 'placeholder' => 'Texte Paragraphe EN', 'id' => 'thetextParEn' . $paragraph->id]) }}
</div>
<div class="card">
	<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images</div>
	<div class="card-body">	
  		<br>
  		<div class="btn-group">
  		@include('inc.galeryimgsanscovermodale')
	</div>
	</div>
</div>
</div>