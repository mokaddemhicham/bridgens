<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationsRequest;
use App\Models\Formation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    public function index(){
        $formations = Formation::latest()->paginate(5);
        return view('admin.formations')->with([
            'formations' => $formations
        ]);
    }

    public function userIndex(){
        $formations = Formation::latest()->paginate(8);
        return view('formations')->with([
            'formations' => $formations
        ]);
    }

    public function show($slug){
        $formation = Formation::where('slug', $slug)->first();
        if(!$formation){
            abort(404);
        }
        $formations = Formation::latest()->take(4)->get();
        return view('formation')->with([
            'formation' => $formation,
            'formations' => $formations
        ]);
    }

    public function insert(FormationsRequest $request){
        if($request->has('affiche')){
            $affiche = $request->affiche;
            $affiche_name = time() . '_' . $affiche->getClientOriginalName();
            $affiche->move(public_path('uploads/formations'), $affiche_name);
        }

        Formation::create([
            "theme" => Str::ucfirst($request->theme),
            "slug" => Str::slug($request->theme),
            "animateur" => Str::title($request->animateur),
            "date" => $request->date,
            "heure" => $request->heure,
            "lieu" => Str::ucfirst($request->lieu),
            "video" => '',
            "formation" => $affiche_name
        ]);

        return redirect()->back()->with("success", "La formation a été ajouté avec succès");
    }

    public function update(FormationsRequest $request,$id){
        $formation = Formation::all()->find($id);
        if($request->has('affiche')){
            $affiche = $request->affiche;
            $affiche_name = time() . "_" . $affiche->getClientOriginalName();
            $affiche->move(public_path('uploads/formations'), $affiche_name);
            unlink(public_path('uploads/formations'). '/'. $formation->formation);
            $formation->formation = $affiche_name;
        }

        $formation->update([
            "theme" => Str::ucfirst($request->theme),
            "slug" => Str::slug($request->theme),
            "animateur" => Str::title($request->animateur),
            "date" => $request->date,
            "heure" => $request->heure,
            "lieu" => Str::ucfirst($request->lieu),
            "video" =>  $request->video,
            "formation" => $formation->formation
        ]);

        return redirect()->back()->with("success" , "La formation a été mis à jour avec succès");
    }

    public function delete($id){
        $formation = Formation::all()->find($id);
        unlink(public_path('uploads/formations'). '/'. $formation->formation);
        $formation->delete();

        return redirect()->back()->with("success", "La formation a été supprimé avec succès");
    }
}
