
	<div class="container text-left" >

		<div style="float:right; width: 33%; height: 400px; background-color: lightgrey; margin-top: 20px;">IMAGES</div>


		<h2>{{ $gym->name }}</h2>
		

		
		<h4>
			{{ $gym->place }}
		</h4>
		<p>
			{{ $gym->category['name'] }}
		</p>

		<div style="float:left; width: 33%;">

			<h3>Over</h3>

			Lorem ipsum and more fake latin. Amstelnet sucks ass you know that?

		</div>

		<div style="float:right; width: 33%">

		<h3>Tarieven</h3>
		@foreach($gym->prices as $key => $value)
			<div style="width: 200px; height: 27px;"> 
				{{ $value['type'] }} <?php echo String::formatMoney($value['price'], '€'); ?>

			</div>
		@endforeach

		<h3>Openingstijden</h3>

		@foreach($gym->openinghours as $key => $value)
			<div style="width: 200px; height: 27px;">
				{{ $value['day'] }}: {{ $value['start'] }} - {{ $value['close'] }}


			</div>
		@endforeach
		
		<a class="btn btn-small btn-info" href="{{ URL::to('openinghours/create/' . $gym->id . '/') }}">Add opening hour</a>
	</div>
		<div style="clear: both;"></div>

		<h3>Reviews</h3>

		@foreach($gym->reviews as $key => $value)
			<div style="width: 100%; height: 150px;">

				<div style="float:left; width: 15%; height: 100%; background-color: lightgrey">
					
				</div>
				<div style="float:right; width:85%; height:100%; background-color: grey; padding: 10px;">
					<div style="float:right; font-size: 24px; text-align:right; @if($value['grade'] > 7) color: green; @else @endif">{{ $value['grade'] }}</div>
					<p>{{ $value['description'] }}</p>
				</div>
			</div>
		@endforeach
		
		<a class="btn btn-small btn-info" style="margin-top:10px;" href="{{ URL::to('reviews/create/' . $gym->id . '/') }}">Plaats een review</a>
	</div>
