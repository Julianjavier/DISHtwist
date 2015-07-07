var ingredients = [];

$('#ingredients li').each(function(){
	
	var ingredientSelector = $(this).html();
	var firstSpace = ingredientSelector.indexOf(' ');
	var amount = parseInt(ingredientSelector.substring(0, firstSpace));
	var name = ingredientSelector.substring(firstSpace);

	// this will look to see if the first character has a number or not.
	
	if(isNaN(parseInt(ingredientSelector[0]))){
		amount = 1;
		name = ingredientSelector;
	}

	// this will set it to a variabel
	var ingredient = {
		amount:amount,
		name:name
	};

	//this will push it
	ingredients.push(ingredient);

});

//this is were the onkeyup event will trigger
$( "#servings" ).keyup(function() {

	var servings = $(this).val();

	if(isNaN(servings)){
		return;
	}

	$('#ingredients').html('');
	for(var i = 0, j = ingredients.length; i < j; i++){

		var amount = eval(ingredients[i].amount) * servings;

		var ingredientDOM = '<li>' + amount + ' ' +ingredients[i].name+'</li>';
		$('#ingredients').append(ingredientDOM);
	}

});