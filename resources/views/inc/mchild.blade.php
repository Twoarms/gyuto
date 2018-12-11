<tr>
@foreach($children as $child)
	<td>{{ $child->id }}</td>
	<td><a href="{{ URL::to('./infos/' . $info->id) }}">{{ $child->titleInFr }}</a></td>
	<td> {{ $child->updated_at }}</td>
	<td><a href="{{ URL::to('./infos/' . $child->id) }}"><button type="button" class="btn btn-info btn-sm">Voir</button></a></td>
	<td><a href="{{ URL::to('./infos/cat/' . $child->id) }}"><button type="button" class="btn btn-info btn-sm">Ajouter une sous-catégorie</button></a></td>
</tr>
	@if(count($child->children))
        @include('inc.mchild',['children' => $child->children])
    @endif
@endforeach