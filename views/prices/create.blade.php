{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'prices','class'=>'form-signin')) }}

	<h2>Add a price to {{$gym['name']}}</h2>

	<div class="form-group">
		{{ Form::label('price', 'Prijs') }}
		{{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('type', 'Type') }}
		{{ Form::text('type', Input::old('type'), array('class' => 'form-control')) }}
	</div>

	{{ Form::hidden('gym_id', $gym['id'])}}

	{{ Form::submit('Add Price', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}