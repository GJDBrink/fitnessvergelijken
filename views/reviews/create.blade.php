{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'reviews','class'=>'form-signin')) }}

	<h2>Add a review to {{$gym['name']}}</h2>

	<div class="form-group">
		{{ Form::label('grade', 'Cijfer') }}
		{{ Form::text('grade', Input::old('grade'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Beschrijving') }}
		{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
	</div>

	{{ Form::hidden('gym_id', $gym['id'])}}

	{{ Form::submit('Add Review', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}