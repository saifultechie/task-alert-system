<?php

namespace App\Http\Controllers;
use Mail;
use Session;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
     public function index(Request $request)
    {
    	$data=array(
    		'email'=>$request->email,
    		'subject'=>$request->subject,
    		'bodyMessage'=>$request->message


    		);

    	Mail::send('emails.contact',$data,function($message) use ($data)
    	{

    		$message->to($data['email']);
    		$message->subject($data['subject']);
    		$message->from('saifulcsembstu@gmail.com');

    	});
              
     

    	Session::flash('success',"congrats sms sent successfully");

    	return redirect()->back();
    }



    public function create()
    {
    	return view('task.contact');
    }

}
