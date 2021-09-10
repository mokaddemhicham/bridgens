<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\changePasswordRequest;

class ProfileController extends Controller
{

    public function profile(){
        if(Auth::user()){
            $admin = User::find(Auth::user()->id);
            if($admin){
                return view('admin.profile', compact('admin'));
            }
        }
    }

    public function updateProfile(Request $request){
        $admin = User::find(Auth::user()->id);
        if($admin){
            if($request->has('image')){
                $image = $request->image;
                $image_name = time() . "_" . $image->getClientOriginalName();
                $image->move(public_path('uploads/images'), $image_name);
                $admin->profile_photo_path ? unlink(public_path('uploads/images'). '/'. $admin->profile_photo_path) : '';
                $admin->profile_photo_path = $image_name;
            }
            $admin->update([
                "name" => $request->name,
                "email" => $request->email,
                "profile_photo_path" => $admin->profile_photo_path
            ]);
            return redirect()->back()->with('success', 'le profil a été mis à jour avec succès');
        }else{
            return redirect()->back();
        }
    }

    public function changePassword(changePasswordRequest $request){
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password, $hashedPassword)){
            $admin = User::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'le mot de passe a été mis à jour avec succès');
        }else{
            return redirect()->back()->with('error', 'le mot de passe actuel est invalide');
        }
    }
}
