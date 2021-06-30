<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Client;
use App\Models\Data;
use Auth;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Null_;

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
        $sendData = array();
        $user = Auth::user();
        $clients = Client::where('user_id', '=', Auth::user()->id)->get();
        $arrID = array();
        $arrData = array();
        foreach ($clients as $client) {
            //$clientData = array();
            //print_r($client['clientID']);
            //print_r(", ");
            array_push($arrID, $client['clientID']);
            $dbData = DB::table('datas')->where('clientID', '=', $client['clientID'])->count();
            array_push($arrData, $dbData);
        }
        array_push($sendData, $arrID);
        array_push($sendData, $arrData);
        //print_r($sendData);
        //print_r("-------------------------------------------------");
        //print_r($sendData[0][0]);
        //print_r("-------------------------------------------------");
        //print_r($sendData[0][1]);
        //print_r("-------------------------------------------------");



        //array_push($statData, Data::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 1)->count());
        //array_push($statData, Client::where('user_id', '=', Auth::user()->id)->where('is_online', '=', 0)->count());
        //array_push($statData, Client::where('is_online', '=', 1)->count());
        //array_push($statData, Client::where('is_online', '=', 0)->count());
        //array_push($statData, Client::where('clientID', '!=', NULL)->count());
        return json_encode($sendData);
    }

    public function map()
    {
        return view('charts.map');
    }
    public function clientData()
    {
        $sendData = array();
        $user = Auth::user();
        $clients = Client::where('user_id', '=', Auth::user()->id)->get();
        
        foreach ($clients as $client) {
            //$clientData = array();
            //print_r($client['clientID']);
            //print_r(", ");

            $dbDatas = DB::table('datas')->where('clientID', '=', $client['clientID'])->get();
            //print_r($dbDatas);
            if(!$dbDatas->isEmpty()){
                $clientData =array();
                array_push($clientData, $client['clientID']);
                $pointInfo = array();
                foreach($dbDatas as $dbData){
                    $tmp=array();
                    array_push($tmp, $dbData->lng);
                    array_push($tmp, $dbData->lat);
                    array_push($tmp, $dbData->info);
                    array_push($tmp, $dbData->alert);
                    array_push($tmp, $dbData->value);
                    array_push($pointInfo, $tmp);
                    //print_r($clientData);
                    //print_r(":clientData-------");
                }
                array_push($clientData, $pointInfo);
                array_push($sendData, $clientData);
            }else{
                //print_r("!!!!!!!!!!!!!!!");
            }


            //array_push($arrData, $dbData);
        }
        //print_r("--------------");
        //print_r("sendData");
        //$x = 119.96154621839524;
        //$y = 30.280080199241638;
        //array_push($sendData, $x);
        //array_push($sendData, $y);
        //print_r("------------------------------------------------------------------------------------");
        return json_encode($sendData);
    }
}
