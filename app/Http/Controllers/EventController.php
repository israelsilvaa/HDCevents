<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\User;

class EventController extends Controller
{
    public function index(){

        $search = request('search');
        if($search){
            $events = Events::where([
                ['title', 'like','%'. $search . '%' ]
            ])->get();
        } else {
            $events = Events::all();
        }
        return view('welcome',['events' => $events, 'search' => $search] );
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Events;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->items = $request->items;

        // imagem upload
        if($request->hasfile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;



        $event->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');
    }

    public function show($id){

        $event = Events::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }


}   
?>