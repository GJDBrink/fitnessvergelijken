<!-- Jumbotron -->
  <div class="jumbotron">
    <h1>Vindt uw fitness center op fitnessvergelijken.nl!</h1>
    <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
    <p><input class="form-control input-lg search" name="search" type="text" id="search"><a class="btn btn-lg btn-success" id='search-btn' href="#" role="button">Zoek</a></p>
  </div>

<div class="container">

  <div class="row">
    <div class="col-lg-4">
      <p><?php echo link_to_route('place', 'Amsterdam', array('place' => 'Amsterdam')); ?></p>
      <p><?php echo link_to_route('place', 'Den Haag', array('place' => 'Den+Haag')); ?></p>
      <p><?php echo link_to_route('place', 'Groningen', array('place' => 'Groningen')); ?></p>
      <p><?php echo link_to_route('place', 'Rotterdam', array('place' => 'Rotterdam')); ?></p>
      <p><?php echo link_to_route('place', 'Utrecht', array('place' => 'Utrecht')); ?></p>
      <p><?php echo link_to_route('place', 'Zwolle', array('place' => 'Zwolle')); ?></p>
    </div>
  </div>


  <!-- Example row of columns -->
  <div class="row">
    <div class="col-lg-4">
      <h2>Safari bug warning!</h2>
      <p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-lg-4">
      <h2>Heading</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
   </div>
    <div class="col-lg-4">
      <h2>Heading</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
      <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
    </div>
  </div>
</div>