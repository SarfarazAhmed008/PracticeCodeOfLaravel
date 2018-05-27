<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

use App\Hello;
use App\NiceActionLog;

use DB;

class SayHelloController extends Controller
{
	//without validation works
	// public function postHello(Request $request )
	// {
	// 	if (isset($request['name']) && $request['age']) {
	// 		if (strlen($request['name']) > 0){
	// 			return view ('hello.hello', ['name' => $this->transformName( $request['name'] ), 'age' => $request['age'] ]);
	// 		}
	// 		return redirect()->back();
	// 	}
	// 	return redirect()->back();
	// }

	// using validation and before database
	// public function postHello(Request $request )
	// {
	// 	$this->validate($request, [

	// 		'name' => 'required|alpha',
	// 		'age'  => 'required|numeric'

	// 	]);

	// 	return view ('hello.hello', ['name' => $this->transformName( $request['name'] ), 'age' => $request['age'] ]);
	
	// }

	private function transformName($name)
	{
		$prefix = 'Mr. ';

		return $prefix . strtoupper($name);
	}


	//after database uses
	public function postInsertAction(Request $request )
	{
		$this->validate($request, [

			'type' => 'required|alpha|unique:hellos',
			'niceness'  => 'required|numeric'

		]);

		$actions = new Hello();
		$actions->type = ucfirst(strtolower($request['type']));
		$actions->niceness = $request['niceness'];
		$actions->save();


		if ($request->ajax())
		{
			return response()->json();
		}



		//$actions = Hello::all();

		//return redirect()->back();
		return redirect()->route('say');

		
	
	}



	//previous funtions
	// public function getHello($action, $message = null)
	// {
	// 	return view('actions.' . $action, ['action' => $action, 'message' => $message]);
	// }

	//dynamic views affecting from database (using one view for all dynamic actions)
	public function getHello($action, $message = null)
	{
		if ($message === null){
			$message = 'No Message';
		}

		$nice_action = Hello::where('type', $action)->first();
		$nice_action_log = new NiceActionLog();

		$nice_action->nice_action_logs()->save($nice_action_log);

		return view('actions.nice', ['action' => $action, 'message' => $message]);
	}


	public function getSay()
	{
		$actions = Hello::all();
		//$logged_actions = NiceActionLog::all();
		//$logged_actions = DB::table('nice_action_logs')->get();
		//$actions = Hello::where('type', 'Smile')->get(); //Eloquent where clause uses
		//$actions = DB::table('hellos')->get(); //can do the same thing like Eloquent 
		//$query = DB::table('hellos')->count(); //count database entries
		//$query = DB::table('hellos')->where('id', '>', '3')->count(); //where clause and count
		//$query = DB::table('hellos')->max('niceness'); //finding min or max item		
		
		// $query = DB::table('hellos')
		// 		 ->join('nice_action_logs', 'nice_action_logs.hello_id', '=', 'hellos.id') //joining two tables
		// 		 ->get();

		// $query = DB::table('hellos')
		// 		 ->join('nice_action_logs', 'nice_action_logs.hello_id', '=', 'hellos.id') //using where clause 
		// 		 ->where('hellos.type', '=', 'Smile')
		// 		 ->get();


		// $nice_action = Hello::where('type', 'Smile')->first(); //add new entries in logged action after refresh
		// $nice_action_log = new NiceActionLog();
		// $nice_action->nice_action_logs()->save($nice_action_log);

		// $query = DB::table('nice_action_logs') //inserting using query builder
		// 			->insertGetId([
		// 				'hello_id' => DB::table('hellos')->select('id')->where('type', 'Smile')->first()->id 
		// 			]);

		//$logged_actions = NiceActionLog::where('hello_id', '9')->get();
		// $logged_actions = NiceActionLog::whereHas('hello', function($query){
		// 				  $query->where('type', '=', 'Smile');
		// 				  })->get();

		//$logged_actions = NiceActionLog::all();
		$logged_actions = NiceActionLog::paginate(3);  //for pagination

		$actions = Hello::orderBy('niceness', 'desc')->get();

		// $smile = Hello::where('type', 'Smile')->first();  //update

		// if ($smile){

		// 	$smile->type = 'Laugh';
		// 	$smile->update();
		// }

		// $punch = Hello::where('type', 'Punch')->first();  //delete

		// if($punch){
		// 	$punch->delete();
		// }


		return view ('say', ['actions' => $actions , 'logged_actions' => $logged_actions ]);
		//return view ('say', ['actions' => $actions , 'logged_actions' => $logged_actions, 'db' => $query]);
	}

	//undone
	public function getEditAction()
	{
		$actions = Hello::all();
		return view ('actions.edit', ['actions' => $actions]);
	}
	//undone
	public function editAction(Request $request)
	{
		$this->validate($request, [
			'type' => 'required|alpha',
			'niceness' => 'required|numeric'
		]);
		return redirect()->route('say');
	}



}