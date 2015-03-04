<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($gym, array('route' => array('gyms.update', $gym->id), 'method' => 'PUT')) }}

	<h2>Edit a Gym</h2>

	<div class="form-group">
                {{ Form::label('name', 'Naam') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('place', 'Plaats') }}
                {{ Form::text('place', Input::old('place'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('address', 'Adres') }}
                {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('postal', 'Postcode') }}
                {{ Form::text('postal', Input::old('postal'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('house_nr', 'Huisnummer') }}
                {{ Form::text('house_nr', Input::old('house_nr'), array('class' => 'form-control')) }}
        </div>

	{{ Form::submit('Edit Gym', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
