<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class MessaggesController extends Controller
{
    /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
public function index()
{
    $messages = Message::all();
    return response()->json($messages);
}

/**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
public function create()
{
      $message = new Message();
      return view('apartments.index');
}

/**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
public function store(Request $request)
{
  $data = $request->all();
        // # Validazione
        $validator = Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => 'required|email',
                'email_content' => 'required'
            ],
            [
                'name.required' => 'Il nome è obbligatorio .',
                'email.required' => 'La mail è obbligatoria .',
                'email.email' => 'L\'indirizzo email non è valido .',
                'email_content.required' => 'Il testo del messaggio è obbligatorio .'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }


        $message = new Message();
            $message->fill($data);
            $message->save();


        $user_id = Apartment::select('user_id')->where('id', $data['apartment_id'])->first();
        $id = $user_id->user_id;
        $user_email = User::select('email')->where('id', $id)->first();
        $email = $user_email->email;
        $mail = new SendNewMail($data);
        try {
            Mail::to($email)->send($mail);
            return response('Email inviata con successo', 204);
        } catch (ModelNotFoundException  $exception) {
            return response('Messaggio non inviato. Si è verificato un errore. Riprovare più tardi', 204);
        }
    }

    public function getApartmentMessages(User $user){
        $apartments = $user->apartments;
        foreach($apartments as $apartment){
            $messages[] = $apartment->messages;
        }
        return response()->json($apartments);
    }


/**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
public function show($id)
{
     //
}

/**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
public function edit($id)
{
     //
}

/**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
public function update(Request $request, $id)
{
     //
}

/**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
public function destroy($id)
{
     //
}
}
