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
	        'date' => 'required|date_format:Y-m-d',
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
    	return redirect()->route('listEvents')->with('message','Evento creado con éxito');
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
    public function updateEventForm($id)
    {
    	$event = Event::findById($id);
    	if (is_null($event)){
    		return redirect()->back()->with('warning','No se encontró el evento');
    	}
    	if ($event->user_id!=Auth::user()->id){
    		return redirect()->back()->with('warning','Acceso denegado');
    	}
    	$data = $event->toArray();
    	$newTime = date("H:i", strtotime($data['time']));
    	$data['time'] = $newTime;
    	return view('updateEvent')->with('data',$data);
    }
    public function updateEvent(Request $request)
    {
		$validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'date' => 'required|date_format:Y-m-d',
	        'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	        'time' => 'required|date_format:H:i',
	        'location' => 'required',
	        'description' => 'required',
    	]);
		$data = $request->all();
		$user_id=Auth::user()->id;
		$event = Event::findById($data['id']);
		if ($user_id != $event->user_id ){
			return redirect()->back()->with('warning','Acceso denegado');
		}
		if (!is_null($request->img) and $request->file('img')->isValid()){
			$path = $request->img->store('public');
			$event->img = $path;
			$event->save();
		}
		unset($data['_token']);
		unset($data['img']);

		Event::where('id', '=', $event->id)->update($data);

    	return redirect()->route('listEvents')->with('message','Evento modificado con éxito');
    }

    public function deleteEvent(Request $request)
    {
    	$event = Event::findById($request->id);
    	if ($event->user_id != Auth::user()->id){
    		return redirect()->back()->with('warning','Acceso denegado');
    	}
    	$event->delete();
    	return redirect()->route('listEvents')->with('warning','Evento eliminado con éxito');

    }

}
