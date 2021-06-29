<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Client;
use App\Models\Data;
use Auth;
use Carbon\Carbon;

class ChartJsController extends Controller
{
    public function index()
    {
        return view('charts.view');
    }

    public function selfCientStat()
    {
        $statData = array();
        //print_r(Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        array_push($statData, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        array_push($statData, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 0)->count());
        //array_push($my_data, Client::where('is_online', '=', 1)->count());
        //array_push($my_data, Client::where('is_online', '=', 0)->count());
        return json_encode($statData);
    }
    
    public function allCientStat()
    {
        $statData = array();
        //print_r(Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        //array_push($my_data, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        //array_push($my_data, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 0)->count());
        array_push($statData, Client::where('is_online', '=', 1)->count());
        array_push($statData, Client::where('is_online', '=', 0)->count());
        return json_encode($statData);
    }

    public function clientStat()
    {
        $statData = array();
        //print_r(Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        array_push($statData, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        array_push($statData, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 0)->count());
        array_push($statData, Client::where('is_online', '=', 1)->count());
        array_push($statData, Client::where('is_online', '=', 0)->count());
        array_push($statData, Client::where('clientID', '!=', NULL)->count());
        return json_encode($statData);
    }

    public function dataStat()
    {
        $statData = array();
        
        //print_r(Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        array_push($statData, Data::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        array_push($statData, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 0)->count());
        array_push($statData, Client::where('is_online', '=', 1)->count());
        array_push($statData, Client::where('is_online', '=', 0)->count());
        array_push($statData, Client::where('clientID', '!=', NULL)->count());
        return json_encode($statData);
    }
}

