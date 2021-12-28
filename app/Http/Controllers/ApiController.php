<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Channel;
use App\Models\Watched_time;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('watched_time')
        ->join('user','user.id','=','watched_time.user_id')
        ->join('channel','channel.id','=','watched_time.channel_id')
        ->select('watched_time.id as id',
                 'user.name as name_user',
                 'channel.name as name_channel',
                 'watched_time.minutes as minutes',
                 'watched_time.date as date')
        ->orderby('watched_time.minutes','desc')        
        ->get();
        
        $array  = [];
        $iTotal = count($data);
        $i      = 1;
        $time = $data[0]->minutes;

        for($x = 0 ; $x <= $iTotal-1 ; $x++){
            if($data[$x]->minutes == $time){
                array_push($array, 'POSITION: '.$i,$data[$x]);    
            }else{
                $i++;
                array_push($array, 'POSITION: '.$i,$data[$x]);                    
            }
            $time = $data[$x]->minutes;            
        }

        return $array;
    }

  
}
