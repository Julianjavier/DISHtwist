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
<hr>
<div class="wrap">

	@foreach ($recepies->matches as $recepie)
	<div class="matches">
        <img src=" {{{ $recepie->images[0]->imageUrlsBySize->{360} }}} ">

        <div class="title">
            <h3>{{{ $recepie->recipeName }}}</h3>
        </div>
        <div class="data">
            @for ($i = 0; $i < $recepie->rating; $i++)
            <img src="{{{URL::asset('assets/img/star.png')}}}" >
            @endfor
            
            <hr class="clear">
            <h3>Time: {{{ $recepie->totalTimeInSeconds }}}</h3>
            <hr class="clear2">
            <a class="link" href="/details/{{{$recepie->id}}}">GET STARTED</a>
        </div>
	</div>	
	@endforeach

</div>
<footer>

</footer>
</body>