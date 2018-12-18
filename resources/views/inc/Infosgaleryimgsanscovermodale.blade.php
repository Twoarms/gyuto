<!-- <div class="card">
	<div class="card-header font-weight-bold" id="myBtnG">Galerie d'images</div>
	<div class="card-body">	
  		<br>
		<a href="#" class="btn btn-primary" id="myBtn">Ajouter à la galerie</a>
	</div>
</div>	 -->
<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">Ajouter à la galerie</button>
<div class="modal fade" data-backdrop="" id="myModal" role="dialog">		
<!-- <div id="myModal" class="modal"> -->
	<!-- Modal content -->
	<div class="modal-dialog modal-lg">
	<!-- <div class="container-fluid"> -->
		<div class="modal-content">
			<div class="container">
			<!-- <div class="modal-header"> -->
			<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
			<span class="close" data-dismiss="modal">&times;</span>
			<h1>Ajouter l'image à la galerie</h1>
			<!-- </div> -->
				<div class="modal-body">
		 		<!-- <div class="card contenu"> -->
	<!-- 	 			<div class="row">
						<div class="col-sm-8 col-sm-offset-4"> -->
							<ul class="nav nav-tabs" id="myTab" role="tablist">
	      						<!-- <li class="nav-item">
	        						<a class="nav-link" id="televerser-tab" data-toggle="tab" role="tab" aria-controls="televerser" aria-selected="true" href="#televerser">Téléverser des fichiers</a>
	      						</li> -->
	      						<li class="nav-item">
	        						<a class="nav-link active" id="biblio-tab" data-toggle="tab" role="tab" aria-controls="biblio" aria-selected="true" href="#biblio">Bibliothèque d'images</a>
	      						</li>
	      					</ul>
	   			<!-- 		</div>
					</div> -->
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="biblio" role="tabpanel" aria-labelledby="biblio-tab">
							<div class="row">
								<div class="card col-sm-7">
									<div class="card-body">
										@foreach($theimages as $theimage)
										<!-- <div class="imgsel"> -->
										<!-- <div > -->
											<a>
												<img onclick="getFocus('{{$theimage->id}}');" id="myImg{{$theimage->id}}" src="{{ url('myimages/' . $theimage->nameImage) }}" class="medium-img">
												<span hidden id="idid{{$theimage->id}}" >{{$theimage->id}}</span>
												<span hidden id="idname{{$theimage->id}}" >{{$theimage->nameImage}}</span>
												<span hidden id="idtitlefr{{$theimage->id}}" >{{$theimage->titleIFr}}</span>
												<span hidden id="idtitleen{{$theimage->id}}" >{{$theimage->titleIEn}}</span>
											</a>
										<!-- </div> -->
										<!-- </div> -->
															
					  					@endforeach
					  				</div>	
								</div>
								<!-- </div> -->						
					  			<div class="card col-sm-5" id="smyBtnS">
									@include('inc.imagesanscovermodale')
								</div>
							</div>
						</div>
			  			<!-- <div class="tab-pane" id="televerser" role="tabpanel" aria-labelledby="televerser-tab">
							<div class="card">
				  				<div class="card-body">	
									<div class="form-group font-weight-bold">
										{{Form::label('nameImage', 'Upload Image')}}
										{{Form::file('nameImage') }}
									</div>				
								</div>
							</div>
						</div> -->
					</div>
				<!-- </div> -->
	  			</div>
  			</div>				
		</div>
	</div>
</div>