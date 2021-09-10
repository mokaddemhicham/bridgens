<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{

    public function index(){
        $members = Team::latest()->paginate(5);
        return view('admin.team')->with([
            'members' => $members
        ]);
    }

    public function userIndex(){
        $members = Team::latest()->paginate(8);
        return view('team')->with([
            'members' => $members
        ]);
    }

    public function getMembers(){
        $membres = Team::orderBy('nom', 'asc')->get();
        return view('admin.teampdf')->with([
            'membres' => $membres
        ]);
    }

    public function downloadPDF(){
        $membres = Team::orderBy('nom', 'asc')->get();

        $pdf = PDF::loadView('admin.teampdf', compact('membres'));
        return $pdf->download('liste_des_membres.pdf');
    }

    public function insert(TeamRequest $request){
        if($request->has('photo')){
            $photo = $request->photo;
            $photo_name = Str::lower($request->nom) . '_' . Str::lower($request->prenom) . '_' . time() . '.' . $photo->extension();
            $photo->move(public_path('uploads/team'), $photo_name);
        }

        Team::create([
            "nom" => Str::upper($request->nom),
            "prenom" => Str::ucfirst($request->prenom),
            "email" => $request->email,
            "phone" => $request->phone,
            "filiere" => $request->filiere,
            "role" => Str::ucfirst($request->role),
            "photo" => $request->has('photo') ? $photo_name : ''
        ]);

        return redirect()->back()->with("success", "Le membre a été ajouté avec succès");
    }

    public function update(TeamRequest $request,$id){
        $team = Team::all()->find($id);
        if($request->has('photo')){
            $photo = $request->photo;
            $photo_name = Str::lower($request->nom) . '_' . Str::lower($request->prenom) . '_' . time() . '.' . $photo->extension();
            $photo->move(public_path('uploads/team'), $photo_name);
            $team->photo ? unlink(public_path('uploads/team'). '/'. $team->photo) : '';
            $team->photo = $photo_name;
        }

        $team->update([
            "nom" => Str::upper($request->nom),
            "prenom" => Str::ucfirst($request->prenom),
            "email" => $request->email,
            "phone" => $request->phone,
            "filiere" => $request->filiere,
            "role" => Str::ucfirst($request->role),
            "photo" => $team->photo
        ]);

        return redirect()->back()->with("success" , "Le membre a été mis à jour avec succès");
    }

    public function delete($id){
        $team = Team::all()->find($id);
        $team->photo ? unlink(public_path('uploads/team'). '/'. $team->photo) : '';
        $team->delete();
        return redirect()->back()->with("success", "Le membre a été supprimé avec succès");
    }
}
