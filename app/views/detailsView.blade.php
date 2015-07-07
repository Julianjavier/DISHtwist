<!DOCTYPE html>
<html>
    <head>
        <title>SEARCH.dot.EAT</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"> 	      
       </head>
<body>
<header>
    <a href="/"><img class="logo" src="{{{URL::asset('assets/img/search-01.png')}}}" /></a>
	<form method="GET" action="">
		<input class="text" type="text"  name="q"  placeholder="Find a dish here:" required/>
		<button class="submit" type="submit"/>SUBMIT</button>
	</form>
	<a href="/admin"><button class="admin"/>ADMINS</button></a>
</header>
<div class="wrap">
	
	<div class="userTwists">
		<h2>Get Started, Mix it up</h2>
		<hr style="height:10px;">
		@if (count($userTwists) > 0)
			@foreach ($userTwists as $twists)
			<div class="twist">
				<h3>{{{$twists->name}}} suggests:</h3>
				<p>{{{$twists->twist}}}</p>
			</div>
			<hr style="height:5px;">
			@endforeach
		@else
			<h3>Opps, We got nothing!</h3>
			<h3>How about ya add somthething yourself?</h3>
		@endif
	</div>
	
	<div class="view">
		<img src="{{{ $detailsData->images[0]->hostedLargeUrl }}}">
	    <div class="data_view">
	        <h2>{{{ $detailsData->name }}}</h2>

	        <h4>Total Servings: <input type="text" name="servings" id="servings" value="{{{ $detailsData->numberOfServings }}}"></h4>
	        <hr class="line">

	        <ul id="ingredients">
				@foreach ($detailsData->ingredientLines as $ingredients)
				<li>{{{ $ingredients }}}</li>
				@endforeach
			</ul>


	        <h3>Total Time: {{{ $detailsData->totalTimeInSeconds }}}</h3>
	        <hr class="line">
	    	
	    	<form style="margin:0px;" action="/addTwist">
			<!-- {{ Form::open(array('url' => 'addTwist')) }} -->
	    		<h3>Give it a twist.</h3>

	    		<h4>Your Name?</h4>
	    		<input class="text" type="text" name="userName">

	    		<input class="text" type="hidden" name="id" value="{{{$detailsData->id}}}">

	    		<h4>Write your own take on this dish</h4>
	    		<textarea rows="4" cols="50" name="userRec"></textarea>
				<button id="submit" class="submit" type="submit"/>SUBMIT</button>

	    	<!-- {{ Form::close() }} -->
	    	</form>

	    </div>
	</div>
</div>
<footer>

</footer>
<script src="{{ URL::asset('assets/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/servingCalculator.js') }}"></script> 
</body>
