{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'openinghours','class'=>'form-signin')) }}

	<h2>Add a openinghour to {{$gym['name']}}</h2>

	<div class="form-group">
		{{ Form::label('day', 'Dag') }}
		{{ Form::text('day', Input::old('day'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('start', 'Open') }}
		{{ Form::text('start', Input::old('start'), array('class' => 'form-control', 'placeholder' => '00:00')) }}
	</div>

	<div class="form-group">
		{{ Form::label('close', 'Dicht') }}
		{{ Form::text('close', Input::old('close'), array('class' => 'form-control', 'placeholder' => '00:00')) }}
	</div>

	<div class="form-group">
		{{ Form::label('special', 'Uitzondering') }}
		{{ Form::checkbox('special', Input::old('special')) }}
	</div>

	<div id="special-div">

		<h3>Uitzondering</h3>

		<div class="form-group">
			{{ Form::label('special_name', 'Dag') }}
			{{ Form::text('special_name', Input::old('special_name'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('date', 'Datum') }}
			{{ Form::text('date', Input::old('date'), array('class' => 'form-control')) }}
		</div>

	</div>

	{{ Form::hidden('gym_id', $gym['id'])}}

	{{ Form::submit('Add OpeningHour', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}