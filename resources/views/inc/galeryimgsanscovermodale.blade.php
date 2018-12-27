<button type="button" class="btn btn-primary form-control" id="myBtn" data-toggle="modal" data-target="#myModal">Ajouter à la galerie</button>
<div class="modal fade" data-backdrop="" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">		
		<div class="modal-content modal-lg" id="myModalContent">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1>Ajouter l'image à la galerie</h1>			
				<div class="modal-body">		 	
					<ul class="nav nav-tabs" id="myTab" role="tablist">	      	
	      				<li class="nav-item">
	        				<a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Bibliothèque d'images</a>
	      				</li>
	      			</ul>	   		
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="biblio" role="tabpanel" aria-labelledby="biblio-tab">
							<div class="row">
								<div class="card col-sm-7">
									<div class="card-body">
										@foreach($theimages as $theimage)			
											<a><img onclick="getFocus('{{$theimage->id}}');" id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img"></a>
											<span hidden id="ididImage{{$theimage->id}}" >{{$theimage->id}}</span>
											<span hidden id="idname{{$theimage->id}}" >{{$theimage->nameImage}}</span>
											<span hidden id="idtitlefr{{$theimage->id}}" >{{$theimage->titleIFr}}</span>
											<span hidden id="idtitleen{{$theimage->id}}" >{{$theimage->titleIEn}}</span>
										@endforeach
					  				</div>	
								</div>												
					  			<div class="card col-sm-5" id="smyBtnS">
									<h3 class="card-header">Détail de l'image</h3>		
									<div class="card-body">
										<div class="form-group">			
									        <img id="preview" class="img-fluid medium-img" src="" alt="" name="nameImage">	        
									    </div>
										<div hidden class="form-group font-weight-bold">
											<input type="text" name="nameImage" id="gyuto" value="{{$theimage->nameImage}}">			
										</div>
										<input id="didImg" name="didImg" type="text" value="{{$theimage->id}}">										
										<div class="card">
											<div class="card-header">ID:</div>
											<div class="card-body">
												<p id="dididImage"></p>
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
											<button type="submit" class='btn btn-primary form-control' id="closeImg" name="action" value="save" >Save</button>
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
</div>