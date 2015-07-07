<?php

use app\models; 

class TestController extends BaseController {

	public function test(){

		$user = new UserTwists;

		$user->name = "Alan";

		$user->save();

	}

}
