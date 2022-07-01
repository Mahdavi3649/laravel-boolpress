<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\AdminContactMessage;
use App\Mail\ContactMessageConfirmation;

class MessageController extends Controller

{


    public function index(Type $var = null)
    {
        return view ('guest.message-confirmation');
    }

    public function store(Request $request)
    {
        //ddd($request->all());

        //salva i dati in una variabile
        $data = $request->all();

        // create istanza del messaggio
        $message = Message::create($data);

        // send an email to the site admin
        Mail::to('admin@blog.com')->send(new AdminContactMessage($message));
        // send email copy to the user
        Mail::to($message->email)->send(new ContactMessageConfirmation($message));

        //redirect user to get route
        return redirect()->route('contact.form.index')->with('message', 'Message recieved');
    }
}
