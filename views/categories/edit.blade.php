<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}

	<h2>Edit a Category</h2>

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit Category', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
