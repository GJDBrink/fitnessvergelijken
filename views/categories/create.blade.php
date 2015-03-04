

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'categories','class'=>'form-signin')) }}

	<h2>Create a Category</h2>

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Add Category', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
