<?php

namespace App\Http\Controllers\Guest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    // ! questa è una specie di create
    public function contact(){
        return view('guests.contact');
    }

    // ! questa è una specie di store
    public function contactMailSender(Request $request){
        //dd($request->all());
        $data = $request->all();
        //dd($data);
        Mail::to('mailAdmin@admin.com')->send(new SendNewMail($data['name'], $data['email'], $data['email_content'], $data['apartment_id']));
        $newMessage= new Message;
        $newMessage->fill($data);
        $newMessage->save();
        return redirect()->route('guest.thanks');
    }

    public function thanks(){
        return view('guests.thanks');
    }
}
