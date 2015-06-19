<?php namespace App\Http\Controllers;

use DB;
use Carbon;
use App\Cards;
use App\Logs;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ListController extends Controller {

	public function index()
	{
		$cards = Cards::with("lastLog")->get();
		$days = Logs::with("card")->where("logs.access", "=", function($query) {
			$query->select(DB::raw('MAX(tmp.access)'))->from('logs as tmp')->whereRaw('date(logs.access) = date(tmp.access)');
		})->get();

		$checks = Logs::select(DB::raw('date(access), count(distinct card_id)'))->groupBy('date(access)')->get();

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
		//dd($checks);
		//dd($checks[0]['date(access)']);
		return view('lists.index', compact("cards", "days", "checks"));
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
		$start = date("Y-m-d H:i:s", strtotime($day));
		$stop = date("Y-m-d H:i:s", strtotime($day . " 23:59:59"));

		$shows = Logs::with("card")->whereBetween('access', array($start, $stop))->get();
		
		return view('lists.day', compact("shows", "day"));
	}

	public function listCheck(Request $request)
	{
		$day = $request->input('day');
		$cards = Cards::all();
		$start = date("Y-m-d H:i:s", strtotime($day));
		$stop = date("Y-m-d H:i:s", strtotime($day . " 23:59:59"));

		$shows =  Logs::with("card")->whereBetween('access', array($start, $stop))->groupBy('card_id')->get();

		return view('lists.check', compact("shows", "day", "cards"));
	}
}
