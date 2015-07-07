<?php

use app\models; 

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function recepies()
	{
		$query = Input::get('q');
		$modelData = RecepiesModel::read_by_recepie($query);
		
		$data = array(
			"recepies" => $modelData
		);
		return View::make('recepiesView', $data);
	}


	public function details($id)
	{
		$detailsData = RecepiesModel::read_by_id($id);

		$userTwists = UserTwists::where('dishId', '=', $id)->where('status', '=' ,'1')->get();

		$data = array(
			"detailsData" => $detailsData,
			"userTwists" => $userTwists
		);

		return View::make('detailsView', $data);
	}

	public function updateTwist($id)
	{

		$updateData = UserTwists::where('id', '=', $id)->update(array('status'=>'1'));

		$userTwists = UserTwists::where('status', '=' ,'0')->get();

		$data = array(
			"userTwists" => $userTwists
		);

		return View::make('admin', $data);
	}	


	public function admin()
	{
		$userTwists = UserTwists::where('status', '=' ,'0')->get();

		$data = array(
			"userTwists" => $userTwists
		);

		return View::make('admin', $data);
	}


	public function userSub()
	{
		// $data = array(
		// 	"userName" => $userName
		// );

		$userName = Input::get('userName');
		$text = Input::get('userRec');
		$id = Input::get('id');
		$status = 0;

		
		$user = new UserTwists;
		$user->name = $userName;
		$user->twist = $text;		
		$user->dishId = $id;
		$user->status = $status;		

		$user->save();

		return Redirect::to(URL::previous());

		// $insert = InsertComment::save($userName, $text, $id)->

		// return View::make('', $data);
	}



}
