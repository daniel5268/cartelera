<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::allToday();
        $today = [];
        foreach ($events as $event){
            $newTime = date("H:i A", strtotime($event['time']));
            if (!array_key_exists($newTime,$today)){
                $today[$newTime]=[];
            }
            $today[$newTime][$event->id]=[];
            $today[$newTime][$event->id]['img']=Storage::url($event->img);
            $today[$newTime][$event->id]['name']=$event->name;
            $today[$newTime][$event->id]['location']=$event->location;
            $today[$newTime][$event->id]['aditional']=$event->aditional;
            $today[$newTime][$event->id]['description']=$event->description;
            
        }
        ksort($today);
        return view('home')->with('today',$today);
    }
}
