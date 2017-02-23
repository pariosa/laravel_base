<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Auth;

class ContactController extends Controller
{
	public function read(){
		$contacts = Contact::all();

		$with = [
		'contacts' => $contacts
		];
		return view('contacts')->with($with);
	}
    public function create(Request $request){

    	Contact::create([
    		"gender"=>$request->gender,
    		"name"=>$request->name,
    		"nickname"=>$request->nickname,
    		"email"=>$request->email,
    		"phone"=>$request->phone,
    		"owner"=>$request->owner,
    		"job"=>$request->job,
    		"disabilities"=> $request->disabilities
    		])->save();
    	return redirect('contacts');
    }
        public function update(Request $request){

       	$contact = Contact::where('id', "=",$request->id)->first();
    	$contact->gender = $request->gender;
        $contact->name = $request->name;
    	$contact->nickname = $request->nickname;
    	$contact->email = $request->email;
    	$contact->phone = $request->phone;
    	$contact->owner = $request->owner;
    	$contact->job = $request->job;
    	$contact->disabilities = $request->disabilities;
    	$contact->save();
    	return redirect('contacts');
    }
    public function delete(Request $request){
    	Contact::destroy($request->id);
    	
    	return redirect('contacts');

    }
}
