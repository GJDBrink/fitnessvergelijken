{{ HTML::ul($errors->all()) }}

{{ Form::model($price, array('route' => array('prices.update', $price->id), 'method' => 'PUT')) }}

	<h2>Edit a price to {{$price->gym['name']}}</h2>

	<div class="form-group">
		{{ Form::label('price', 'Prijs') }}
		{{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('type', 'Type') }}
		{{ Form::text('type', Input::old('type'), array('class' => 'form-control')) }}
	</div>

	{{ Form::hidden('gym_id', Input::old('gym_id'))}}

	{{ Form::submit('Add Price', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}