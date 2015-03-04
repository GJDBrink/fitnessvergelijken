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

    <script type="text/javascript">

    $(document).ready(function(){
    	$('#special').change(function(){
    		$('#special-div').toggle();
    	})

    	$('#date').datepicker({format: "mm-dd-yyyy",language: "nl"});

        $('.expander').click(function(){
            $(this).next().slideToggle();
        });
    });

    </script>

    <style type="text/css">

    #special-div {
    	display: none;
    }

    #left-nav {
        width: 15%;
        height: 100%;
        background-color: grey;
        position: absolute;
        float: left;
    }

    #right-content {
        padding: 15px;
        float: right;
        width: 85%;
    }

    #left-nav ul {
        list-style-type: none;
        margin: 0px;
        padding: 0px;
        border-top: 1px solid #eee;
    }

    #left-nav ul li {
        margin: 0px;
        padding: 0px;
        width: 100%;
        min-height: 25px;
        padding-left: 5px;
        border-bottom: 1px solid #eee;
        background-color: lightgrey;
    }

    #left-nav ul li ul {
        display: none;
        border-top: none;
    }

    #left-nav ul li ul li {

        border-bottom: none;
        border-top: 1px solid #eee;
    }

    </style>
  </head>
 
  <body>
    <div id='left-nav'>
        <h4>Menu</h4>

        <ul>
            <li>{{ HTML::link('users/dashboard', 'Dashboard Home') }}</li>
            <li>
               <span id="expand-gyms" class="expander">Gyms</span>
                <ul>
                    <li>{{ HTML::link('gyms', 'Gyms Overview') }}</li>
                    <li>{{ HTML::link('gyms/create', 'Add Gym') }}</li>
                </ul>   
            </li>
            <li><span class="expander">Categories</span>
                <ul>
                    <li>{{ HTML::link('categories', 'Categories') }}</li>
                    <li>{{ HTML::link('categories/create', 'Add Category') }}</li>
                </ul>
            </li>
            <li>Logout</li>
        </ul>
    </div>

    <div id='right-content'>
	<!--<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <!--<div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
			<li class="active">{{ HTML::link('users/register', 'Register') }}</li>   
                    	<li>{{ HTML::link('users/login', 'Login') }}</li>  
		      </ul>
		</div>
	  </div>
	</nav>-->

	<div class="container">
        @if(Session::has('message'))
            <p class="alert alert-warning">{{ Session::get('message') }}</p>
        @endif
    </div>

	{{ $content }}  

</div>
  </body>
</html>
