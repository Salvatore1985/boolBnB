<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;

class MessagesController extends Controller
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
    $request->validate(
        [
            'email' => 'string',
            'email_content' => 'string',
            'name' => 'string'
        ]
    );

    $data = $request->all();
    $message = new Message();
    $message->name = $data['name'];
    $message->email = $data['email'];
    $message->email_content = $data['email_content'];
    $message->apartment_id = $data['apartment_id'];
    $message->save();
}
// {
//         // CHECK VALIDAZIONE
// $validator = Validator::make($request->all(), [
//     'name' => 'required',
//     'email' => 'required|email',
//     'message' =>'required',
// ]);
// $message->apartment_id = $data['apartment_id'];
//       // se non fallisce
//     if( $validator->fails()) {
//         return response()->json([
//             'errors' => $validator->errors()
//         ]); 
//     }

//     $data = $request->all();

//         // SALVATAGGIO NEL DB
//     $new_message = new Message();
//     $new_message->fill($data); 
//     $new_message->save();

//     return response()->json($data);  
// }

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
