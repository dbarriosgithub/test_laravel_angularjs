<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\person\Person;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class PersonController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function index()
    {
    	$people =  Person::all();
    	
    	return response()->json(['person'=>$people],200);
    }

    public function store()
    {
    	   
 		$data =  request()->all();
        

    	Person::create(
	     [
	    	'firstName'=> $data['firstName'],
	    	'lastName'=> $data['lastName'],
	    	'phoneNumber'=>'3245234170',
	    	'email'=>'juan@gmail.com',
	    	'address'=>'vailla real',
	    	'country_id'=>1,
	    	'department_id'=>1,
	    	'city_id'=>1
	     ]
     	);

    	return response()->json(['success'=>true]);
    }

    public function destroy($id)
    {
    	Person::destroy($id);
    	return response()->json(['success'=>true]);
    }

    public function show(Person $person)
    {
    	return response()->json(['person'=>$person]);
    }

    public function update(Person $person)
    {
    
    	$data =  request()->validate(
         [
           'firstName'=>'required',
           'lastName'=>'required'
         ]);

         return response()->json(['data'=>$person->update(request()->all())]);
    }

    public function mailer()
    {
        Mail::to('dabar0216@gmail.com')->send(new TestMail());
        return View('emails.mailTest');
    }
}
