<tr>
@foreach($children as $child)
	<td>{{ $child->id }}</td>
	<td>{{ $child->parent_id}}</td>
	<td>{{ $child->index_title}}</td>
	<td><a href="{{ URL::to('./infos/' . $info->id) }}">{{ $child->titleInFr }}</a></td>
	<td> {{ $child->updated_at->format('d/m/Y')}}</td>
	<td><a href="{{ URL::to('./infos/' . $info->id) }}"><button type="button" class="btn btn-primary">MAJ</button></a></td>
	<td><a href="{{ URL::to('./infos/cat/' . $child->id) }}"><button type="button" class="btn btn-primary">Ajouter une sous-catégorie</button></a></td>
</tr>
	@if(count($child->children))
        @include('inc.mchild',['children' => $child->children])
    @endif
@endforeach