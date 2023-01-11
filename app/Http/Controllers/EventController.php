<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Events::all();

        return view('welcome',['events' => $events] );
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Events;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;

        $event->save();

        return redirect('/');
    }
}
?>