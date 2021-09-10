<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Courses;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventsRequest;
use App\Models\Formation;
use App\Models\Partner;
use App\Models\Team;

class EventsController extends Controller
{
    public function index(){
        $events = Events::latest()->paginate(5);
        return view('admin.events')->with([
            'events' => $events
        ]);
    }

    public function dashboard(){
        $events = Events::latest()->take(5)->get();
        $countEvents = Events::get();
        $courses = Courses::get();
        $formations = Formation::get();
        $membres = Team::latest()->take(5)->get();
        $countMembres = Team::get();
        return view('admin.dashboard')->with([
            'events' => $events,
            'courses' => $courses,
            'formations' => $formations,
            'membres' => $membres,
            'countEvents' => $countEvents,
            'countMembres' => $countMembres
        ]);
    }

    public function userIndex(){
        $events = Events::latest()->paginate(8);
        return view('events')->with([
            'events' => $events
        ]);
    }

    public function sliderShow(){
        $events = Events::latest()->take(5)->get();
        $lastEvent = Events::latest()->first();
        $formations = Formation::latest()->take(6)->get();
        $partners = Partner::latest()->take(6)->get();
        $eventsTotal = Events::get();
        $coursesTotal = Courses::get();
        $formationsTotal = Formation::get();
        $membresTotal = Team::get();
        return view('welcome')->with([
            'events' => $events,
            'lastEvent' => $lastEvent,
            'formations' => $formations,
            'partners' => $partners,
            'eventsTotal' => $eventsTotal,
            'coursesTotal' => $coursesTotal,
            'formationsTotal' => $formationsTotal,
            'membresTotal' => $membresTotal,
        ]);
    }

    public function show($slug){
        $event = Events::where('slug', $slug)->first();
        if(!$event){
            abort(404);
        }
        $events = Events::latest()->take(4)->get();
        return view('event')->with([
            'event' => $event,
            'events' => $events
        ]);
    }

    public function insert(EventsRequest $request){
        if($request->has('affiche')){
            $affiche = $request->affiche;
            $affiche_name = time() . '_' . $affiche->getClientOriginalName();
            $affiche->move(public_path('uploads/events'), $affiche_name);
        }

        Events::create([
            "theme" => Str::ucfirst($request->theme),
            "slug" => Str::slug($request->theme),
            "animateur" => Str::title($request->animateur),
            "date" => $request->date,
            "heure" => $request->heure,
            "lieu" => Str::ucfirst($request->lieu),
            "affiche" => $affiche_name
        ]);

        return redirect()->back()->with("success", "L'événement a été ajouté avec succès");
    }

    public function update(EventsRequest $request,$id){
        $event = Events::all()->find($id);
        if($request->has('affiche')){
            $affiche = $request->affiche;
            $affiche_name = time() . "_" . $affiche->getClientOriginalName();
            $affiche->move(public_path('uploads/events'), $affiche_name);
            unlink(public_path('uploads/events'). '/'. $event->affiche);
            $event->affiche = $affiche_name;
        }

        $event->update([
            "theme" => Str::ucfirst($request->theme),
            "slug" => Str::slug($request->theme),
            "animateur" => Str::title($request->animateur),
            "date" => $request->date,
            "heure" => $request->heure,
            "lieu" => Str::ucfirst($request->lieu),
            "affiche" => $event->affiche
        ]);

        return redirect()->back()->with("success" , "L'événement a été mis à jour avec succès");
    }

    public function delete($id){
        $event = Events::all()->find($id);
        unlink(public_path('uploads/events'). '/'. $event->affiche);
        $event->delete();

        return redirect()->back()->with("success", "L'événement a été supprimé avec succès");
    }
}
