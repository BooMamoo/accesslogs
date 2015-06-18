<?php namespace App\Http\Controllers;

use DB;
use App\Cards;
use App\Logs;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ListController extends Controller {

	public function index()
	{
		$cards = Cards::with("lastLog")->get();
		$days = Logs::with("card")->where("logs.id", "=", function($query) {
			$query->select(DB::raw('MAX(tmp.id)'))->from('logs as tmp')->whereRaw('logs.date = tmp.date');
		})->get();

		//$days = Logs::with("card")->selectRaw("*")->whereRaw("logs.id = (SELECT MAX(tmp.id) FROM `logs` as tmp WHERE logs.date = tmp.date)")->get();

		//$days = Logs::select("date")->distinct()->get();

/*
		for($i = 0 ; $i < count($cards) ; $i++)
		{
			$counts_card[$cards[$i]->id] = Cards::find($cards[$i]->id)->log()->count();
		}

		for($i = 0 ; $i < count($access) ; $i++)
		{
			$date = date("d-m-Y", strtotime($access[$i]->access));

			$counts_day[$date]++;
			
			if(!in_array($date, $days))
			{	
				array_push($days, $date);
			}
		}
*/
		
		return view('lists.index', compact("cards", "days"));
	}

	public function listName(Request $request)
	{ 
		$id = $request->input('id');
		$shows = Cards::with('log')->find($id)->log;
		$name = Cards::with('log')->find($id)->name;

		return view('lists.name', compact("shows", "name"));
	}

	public function listDay(Request $request)
	{
		$day = $request->input('day');
		$shows = Logs::where('date', '=', $day)->get();
	
		return view('lists.day', compact("shows", "day"));
	}

	public function listCheck(Request $request)
	{
		$day = $request->input('day');
		$shows = Logs::where('date', '=', $day)->distinct('card_id')->get();
		dd($shows);
		return view('lists.check', compact("shows", "day"));
	}
}
