<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function sendEmail(ContactRequest $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->sujet,
            'message' => $request->message
        ];

        Mail::to('contact.bridgens@gmail.com')->send(new ContactMail($details));
        return back()->with('success', 'Votre message a été envoyé avec succès');
    }
}
