<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Event;


class EventController extends Controller
{
    public function createEventForm()
    {
    	return view('createEvent');
    }
    public function createEvent(Request $request)
    {
		$validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'date' => 'required|date_format:Y-m-d|after_or_equal:today',
	        'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	        'time' => 'required|date_format:H:i',
	        'location' => 'required',
	        'description' => 'required',
    	]);
		$data = $request->all();
		$id=Auth::user()->id;
		$data['user_id']=$id;
		$event = Event::create($data);		
		if ($request->file('img')->isValid()){
			$path = $request->img->store('public');
			$event->img = $path;
			$event->save();
		}
    	return redirect()->route('home')->with('message','Evento creado con éxito');
    }

    public function listEvents()
    {
    	$id=Auth::user()->id;
    	$myEvents = Event::findByUserId($id);
    	$data = [];
    	foreach ($myEvents as $event) {
    		$data[$event->id]=[];
    		$data[$event->id]['name'] = $event->name;
    		if (!is_null($event->img)){
    			$data[$event->id]['img'] = Storage::url($event->img); 
    		}
    		$data[$event->id]['description'] = $event->description;
    		$data[$event->id]['location'] = $event->location;
    		$data[$event->id]['aditional'] = $event->aditional;
    		$date = $event->date;
    		
    		$today = date('Y-m-d');

			if($today == $date){
				$date = "Hoy";
			}
    		$data[$event->id]['date'] = $date;
    		$data[$event->id]['time'] = $event->time;
    		$data[$event->id]['created'] = $event->created_at->toDateString();

    	}
    	return view('listEvents')->with('data',$data);
    }
}
