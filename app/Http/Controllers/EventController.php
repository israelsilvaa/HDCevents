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
        $eventsAvailable = Events::all();
        return view('welcome',['events' => $events, 'search' => $search, 'eventsAvailable' => $eventsAvailable] );
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

        $user = auth()->user();
        $hasUserJoined = false;
        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = True;
                }
            }
        }
 
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard() {

        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }
    
    public function destroy($id) {

        Events::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'evento excluído com sucesso!');
    }

    public function edit($id){

        $user = auth()->user();
        
        $event = Events::findOrFail($id);
        
        if ($user->id != $event->id){
            return redirect('/dashboard');
        }
        return view('events.edit', ['event' => $event]);

    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasfile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        Events::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'evento editado com sucesso!');

    }

    public function joinEvent($id) {
        
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Events::findOrFail($id);
        
        return redirect('/events/ '. $id)->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function leaveEvent($id) {
        
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Events::findOrFail($id);
        
        return redirect('/dashboard')->with('msg', 'Você saiu do evento ' . $event->title . 'com sucesso!');
    }

}
