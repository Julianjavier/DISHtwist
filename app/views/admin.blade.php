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
</header>
<hr>
<div class="wrap">
	
	<div class="userTwistsAdmin">
		<h2>Here is what we got!</h2>
		<hr style="height:10px;">
		@if (count($userTwists) > 0)
			@foreach ($userTwists as $twists)
			<div class="twist">
				<h3>Dish Id:{{{$twists->dishId}}}</h3>				
				<h3>{{{$twists->name}}} suggests:</h3>
				<p>{{{$twists->twist}}}</p>
				<a href="/validate/{{{$twists->id}}}" style="float:right; margin:0 0 20px 0;">VALIDATE</a>
			</div>
			<hr style="height:5px;">

			@endforeach
		@else
			<h3>We got nothing right now!</h3>
			<h3>How about ya add somthething yourself?</h3>
		@endif
	</div>

</div>
<footer>
</footer>
</body>	