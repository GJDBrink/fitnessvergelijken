<div style='margin-left: 5%; margin-right:5%;'>

<h2>Gyms</h2>

<table class="table table-striped">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Place</td>
			<td>User</td>
			<td>Category</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($gyms as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->place }}</td>

			<td>{{ $value->user['lastname'] }}, {{ $value->user['firstname'] }} ({{ $value->user['email'] }})</td>
			<td>@foreach($value['categories'] as $k => $category) {{ $category['name'] }} @endforeach</td>
			
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'gyms/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('gyms/' . $value->id) }}">Overview</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('gyms/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>