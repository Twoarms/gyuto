<h3 class="card-header">Détail de l'image</h3>		
<div class="card-body">
	<div>			
        <img id="preview" class="img-fluid medium-img" src="{{ url('myimages/' . $theimage->nameImage) }}" alt="" name="">
    </div>
	<div class="card-body">  
   		<div class="card-header font-weight-bold">
			Nom Image
		</div>
   		<div class="card-text">
			{{$theimage->nameImage}}
		</div>
	</div>
	<div class="card-body">  
   		<div class="card-header font-weight-bold">
			Titre FR
		</div>
   		<div class="card-text">
			{{$theimage->titleIFr}}
		</div>
	</div>
	<div class="card-body">  
    	<div class="card-header font-weight-bold">
			Titre EN
		</div>
    	<div class="card-text">
			{{$theimage->titleIEn}}
		</div>
	</div>
	<div class="card-body">  
    	<div class="card-header font-weight-bold">
			Légende FR
		</div>
    	<div class="card-text">
			{{$theimage->legendIFr}}
		</div>
	</div>
	<div class="card-body">  
    	<div class="card-header font-weight-bold">
			Légende EN
		</div>
    	<div class="card-text">
			{{$theimage->legendIEn}}
		</div>
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-primary form-control" data-dismiss="modal" id="closeImg">Close</button>			
	</div>
</div>