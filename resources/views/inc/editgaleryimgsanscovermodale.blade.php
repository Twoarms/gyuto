<button type="button" class="btn btn-primary form-control" id="myBtn" data-toggle="modal" data-target="#myModal">Ajouter à la galerie</button>
<div class="modal fade" data-backdrop="" id="myModal" role="dialog">		

	<div class="modal-dialog modal-lg">
		
		<div class="modal-content modal-lg" id="myModalContent">
			<div class="container">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<!-- <span class="close" data-dismiss="modal">&times;</span> -->
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
			
											<a>
												<img onclick="getFocus('{{$theimage->id}}');" id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img">
												<span hidden id="idid{{$theimage->id}}" >{{$theimage->id}}</span>
												<span hidden id="idname{{$theimage->id}}" >{{$theimage->nameImage}}</span>
												<span hidden id="idtitlefr{{$theimage->id}}" >{{$theimage->titleIFr}}</span>
												<span hidden id="idtitleen{{$theimage->id}}" >{{$theimage->titleIEn}}</span>
											</a>
										
															
					  					@endforeach
					  				</div>	
								</div>
												
					  			<div class="card col-sm-5" id="smyBtnS">
									@include('inc.imagesanscovermodale')
								</div>
							</div>
						</div>
			  			
					</div>
				
	  			</div>
  			</div>				
		</div>
	</div>
</div>