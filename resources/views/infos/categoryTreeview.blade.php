@extends('layouts.app')

@section('title', "Dashboard - Mes Informations")

@section('content')
	<div class="container">     
		<div class="panel panel-primary">
			<div class="panel-heading">Manage Category TreeView</div>
	  		<div class="panel-body">
	  		<!-- 	<div class="row"> -->
<!-- 	  				<div class="col-md-6">
	  					<h3>Category List</h3>
				        <ul id="tree1">
				            @foreach($infos as $info)
				                <li>
				                    {{ $info->titleInFr }}
				                    @if(count($info->children))
				                        @include('manageChild',['children' => $info->children])
				                    @endif
				                </li>
				            @endforeach
				        </ul>
	  				</div> -->
	  				<div class="col-sm-8">
	  					<h3>Add New Category</h3>
				  			{!! Form::open(['route'=>['infos.addcategory'], 'method' => 'POST']) !!}
<!-- 				  				@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
									        <strong>{{ $message }}</strong>
									</div>
								@endif -->
				  				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
									{!! Form::label('Title:') !!}
									{!! Form::text('titleInFr', old('titleInFr'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
									<span class="text-danger">{{ $errors->first('titleInFr') }}</span>
								</div>
								<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
									{!! Form::label('Category:') !!}
									{!! Form::text('parent_id', $infos->parent_id, ['class'=>'form-control', 'placeholder'=>'Parent']) !!}
<!-- 									{!! Form::label('Category:') !!}
									{!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!} -->
									<span class="text-danger">{{ $errors->first('parent_id') }}</span>
								</div>
								<div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>
				  			{!! Form::close() !!}
	  				</div>
	  			</div>
	  		</div>
        </div>
    </div>
@endsection
@section('script')
<script src="/js/treeview.js"></script>
@endsection