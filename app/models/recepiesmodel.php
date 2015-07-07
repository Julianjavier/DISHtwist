<?php
class RecepiesModel{

	// public static $testVariable = "This is a call from the model.";
	public static function read_by_recepie($recepie){
		
		$urlSafeRecepie = urlencode($recepie);
		$api = "http://api.yummly.com/v1/api/recipes?_app_id=2f555d00&_app_key=3a78da9d272c848b3d6dd9665b9a35f7&q='".$urlSafeRecepie."&maxResult=16&start=1";
		$api_data = json_decode(file_get_contents($api));
		
		foreach ($api_data->matches as $recepie) {

			$id = $recepie->id;
			$detailData = self::read_by_id($id);

			$recepie->images = $detailData->images;

		};

		return $api_data;

	}

	public static function read_by_id($id){
		$api = "http://api.yummly.com/v1/api/recipe/".$id."?_app_id=2f555d00&_app_key=3a78da9d272c848b3d6dd9665b9a35f7";
		$api_data = json_decode(file_get_contents($api));
		return $api_data;
		 // return $api . ' whatever';

	}

}
