<h1>Showing {{ $gym->name }}</h1>

	<div class="jumbotron text-left">
		<h2>{{ $gym->name }}</h2>
		<p>
			<strong>Place:</strong> {{ $gym->place }}
		</p>
		<p>
			<strong>Category:</strong> {{ $gym->category['name'] }}
		</p>

		<h3>Prices</h3>
		@foreach($gym->prices as $key => $value)
			<div style="width: 200px; height: 27px;">{{ $value['price'] }} 

				<a class="btn btn-xs btn-info" href="{{ URL::to('prices/' . $value['id'] . '/edit') }}">Edit</a> 

				{{ Form::open(array('url' => 'prices/' . $value->id, 'style' => 'display:inline;')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
				{{ Form::close() }}

			</div>
		@endforeach

		<a class="btn btn-small btn-info" href="{{ URL::to('prices/create/' . $gym->id . '/') }}">Add price</a>

		<h3>Opening hours</h3>

		@foreach($gym->openinghours as $key => $value)
			<div style="width: 200px; height: 27px;">
				{{ $value['day'] }}: {{ $value['start'] }} - {{ $value['close'] }}

				<a class="btn btn-xs btn-info" href="{{ URL::to('openinghours/' . $value['id'] . '/edit') }}">Edit</a> 

				{{ Form::open(array('url' => 'openinghours/' . $value->id, 'style' => 'display:inline;')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
				{{ Form::close() }}

			</div>
		@endforeach
		
		<a class="btn btn-small btn-info" href="{{ URL::to('openinghours/create/' . $gym->id . '/') }}">Add opening hour</a>

		<h3>Reviews</h3>

		@foreach($gym->reviews as $key => $value)
			<div style="width: 200px; height: 27px;">
				{{ $value['grade'] }}

				<a class="btn btn-xs btn-info" href="{{ URL::to('reviews/' . $value['id'] . '/edit') }}">Edit</a> 

				{{ Form::open(array('url' => 'reviews/' . $value->id, 'style' => 'display:inline;')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
				{{ Form::close() }}

			</div>
		@endforeach
		
		<a class="btn btn-small btn-info" href="{{ URL::to('reviews/create/' . $gym->id . '/') }}">Add review</a>
	</div>
