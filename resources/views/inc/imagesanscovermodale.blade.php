<h3 class="card-header">Détail du média</h3>		
	<div class="card-body">
		<div class="form-group">			
	        <img id="preview" class="img-fluid medium-img" src="{{ url('myimages/' . $theimage->nameImage) }}" alt="" name="nameImage">	        
	    </div>
		<div class="form-group font-weight-bold">
			<input type="text" name="nameImage" id="gyuto" value="">			
		</div>
		<input id="didImg" name="didImg" type="text" value="{{$theimage->id}}">
		
		<div class="card">
			<div class="card-header">ID:</div>
			<div class="card-body">
				<p id="didid"></p>
			</div>
		</div>

		<div class="card">
			<div class="card-header">URL:</div>
			<div class="card-body">
				<p id="didname"></p>
			</div>
		</div>

		<div class="card">
			<div class="card-header">Titre FR:</div>
			<div class="card-body">
				<p id="didtitlefr"></p>
			</div>
		</div>
		<div class="card">
			<div class="card-header">Titre EN:</div>
			<div class="card-body">
				<p id="didtitleen"></p>
			</div>
		</div>
		
		<div class="btn-group">
			<button type="button" class="btn btn-primary form-control" data-dismiss="modal">Close</button>
			<button type="submit" class='btn btn-primary form-control' id="closeImg" name="action" value="save" data-dismiss="modal">Save</button>
		</div>
	</div>
