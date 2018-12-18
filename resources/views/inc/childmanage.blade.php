<tr>
@foreach($children as $child)
	<td>
	    {{ $child->id }}
	    {{ $child->titleInFr }}
	    {{ $child->updated_at }}
	    <a href="{{ URL::to('./infos/' . $child->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a>
	    <a href="{{ URL::to('./infos/cat/' . $child->id) }}"><button type="button" class="btn btn-info btn-sm">Ajouter une sous-catégorie</button></a>
		@if(count($child->children))
            @include('childmanage',['children' => $child->children])
        @endif
	</td>
@endforeach
</tr>