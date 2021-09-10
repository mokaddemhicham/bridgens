<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PartnersRequest;

class PartnersController extends Controller
{
    public function index(){
        $partners = Partner::latest()->paginate(5);
        return view('admin.partners')->with([
            'partners' => $partners
        ]);
    }

    public function insert(PartnersRequest $request){
        if($request->has('logo')){
            $logo = $request->logo;
            $logo_name = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads/partners'), $logo_name);
        }

        Partner::create([
            "nom" => Str::title($request->nom),
            "website" => $request->website ? $request->website : '',
            "logo" => $logo_name
        ]);

        return redirect()->back()->with("success", "Le partenaire a été ajouté avec succès");
    }

    public function update(PartnersRequest $request,$id){
        $partner = Partner::all()->find($id);
        if($request->has('logo')){
            $logo = $request->logo;
            $logo_name = time() . "_" . $logo->getClientOriginalName();
            $logo->move(public_path('uploads/partners'), $logo_name);
            unlink(public_path('uploads/partners'). '/'. $partner->logo);
            $partner->logo = $logo_name;
        }

        $partner->update([
            "nom" => Str::title($request->nom),
            "website" => $request->website,
            "logo" => $partner->logo
        ]);

        return redirect()->back()->with("success" , "Le partenaire a été mis à jour avec succès");
    }

    public function delete($id){
        $partner = Partner::all()->find($id);
        unlink(public_path('uploads/partners'). '/'. $partner->logo);
        $partner->delete();

        return redirect()->back()->with("success", "Le partenaire a été supprimé avec succès");
    }
}
