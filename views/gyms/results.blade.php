<div style='margin-left: 5%; margin-right:5%;'>

<div style="float:right; margin-top: 10px; margin-right: 5px;">

<a class="btn btn-small btn-info" href="#">Kaart</a>

</div>

<table class="table table-striped client-table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Place</th>
			<th>Category</th>
		</tr>
	</thead>
	<tbody>
	@foreach($gyms as $key => $value)
		<tr>
			<td>{{ HTML::link('gyms/view/'.$value->id, $value->name) }} {{ $value->name }}</td>
			<td>{{ HTML::link('gyms/place/'.$value->place, $value->place) }}</td>

			<td>@foreach($value['categories'] as $k => $category) {{ $category['name'] }} @endforeach</td>
			
		</tr>
	@endforeach
	</tbody>
</table>

</div>