<?php namespace App\Http\Controllers;

use App\Cards;
use App\Logs;
use File;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FormController extends Controller {

	public function index()
	{
		return view('forms.index');
	}

	public function store_card(Request $request)
	{
		$valid = Validator::make($request->all(), [
			'cardFile' => 'required|mimes:csv,txt'
		]);

		if ($valid->fails())
		{
			$error = $valid->errors()->all();
			return $error;
		}

		if($request->hasFile('cardFile'))
		{
			$files = $request->file('cardFile');
			$path = $files->getRealPath();
			$open = fopen($path, "r");
			$tmp = 0;

			while(!empty($data = fgetcsv($open))) 
			{
				if($tmp != 0)
				{
					$card = Cards::where('id', '=', $data[0])->where('name', '=', $data[1])->get();

					if($card->isEmpty())
					{
						$card = new Cards;
						$card->id = (int)($data[0]);
						$card->name = $data[1];
						$card->save();
					}				
				}

				$tmp = 1;
			}

			fclose($open);

/*
			$contents = file($files->getRealPath());

			for($i = 1 ; $i < count($contents) ; $i++)
			{
				$tmp = explode(",", $contents[$i]);
				dd($tmp);
				
				$card = Cards::where('id', '=', $tmp[0])->where('name', '=', $tmp[1])->get();

				if($card->isEmpty())
				{
					$card = new Cards;
					$card->id = (int)($tmp[0]);
					$card->name = $tmp[1];
					$card->save();
				}
			}
*/

			return "true";
		}
	
		return "Error";
	}

	public function store_log(Request $request)
	{
		$valid = Validator::make($request->all(), [
			'logFile' => 'required|mimes:txt'
		]);

		if ($valid->fails())
		{
			$error = $valid->errors()->all();
			return $error;
		}

		if($request->hasFile('logFile'))
		{
			$files = $request->file('logFile');
			$contents = file($files->getRealPath());			

			for($i = 1 ; $i < count($contents) ; $i++)
			{
				$tmp = explode("\t", $contents[$i]);
				$date = date("d-m-Y", strtotime($tmp[9]));
				$time = date("H:i:s", strtotime($tmp[9]));

				$log = Logs::where('card_id', '=', $tmp[2])->where('date', '=', $date)->where('time', '=', $time)->get();

				if($log->isEmpty())
				{
					if($tmp[2] != '00000000')
					{
						$log = new Logs;
						$log->card_id = (int)($tmp[2]);
						$log->date = $date;
						$log->time = $time;
						$log->access = $tmp[9];
						$log->save();
					}
				}
			}

			return "true";
		}

		return "Error";

	}
}
