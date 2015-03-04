<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Fitnessvergelijken.nl</title>

    {{ HTML::script('js/jquery-2.1.1.min.js') }}
    {{ HTML::script('js/bootstrap-datepicker.js') }}
    {{ HTML::script('js/locales/bootstrap-datepicker.nl.js') }}

	  {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css')}}
    {{ HTML::style('css/datepicker3.css')}}
    {{ HTML::style('css/justified-nav.css')}}

    <script type="text/javascript">

    $(document).ready(function(){
    	$('#special').change(function(){
    		$('#special-div').toggle();
    	})

    	$('#date').datepicker({format: "mm-dd-yyyy",language: "nl"});

      $('#search-btn').click(function(){
        var searchQuery = $('#search').val();

        window.location.href ='gyms/search/'+searchQuery;

      });

      $('#search').keyup(function(e){
        //alert('test'+ e.which);

        if(e.which == 13){
          var searchQuery = $('#search').val();

          window.location.href ='gyms/search/'+searchQuery;  
        }
        
      })
    });

    </script>

    <style type="text/css">

    #special-div {
    	display: none;
    }

    .jumbotron {
      background-color: rgba(162, 206, 219, 0.7);
    }

    .search {
      width: 350px;
      display: inline;
      margin-right: 10px;
      height: 60px;
    }

    </style>
  </head>
 
  <body>

	<div class="container">

      <div class="masthead">
        <h3 class="text-muted">Fitnessvergelijken.nl</h3>
        <ul class="nav nav-justified">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Projects</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Downloads</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
  </div> <!-- /container -->
      {{ $content }} 
<div class="container">
      <!-- Site footer -->
      <div class="footer">
        <p>&copy; Fitnessvergelijken.nl 2014</p>
      </div>

    </div> <!-- /container -->
 
  </body>
</html>
