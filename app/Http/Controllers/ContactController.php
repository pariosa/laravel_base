<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Auth;

class ContactController extends Controller
{
	public function read(Request $request){
		if(auth()->user()){
		$contacts = Contact::where('owner','=', auth()->user()->id)->paginate(10);

		$with = [
		'contacts' => $contacts->appends($request->all())
		];
		return view('contacts')->with($with);
		}
		else{return view('auth.login');}
	}
	public function search(Request $request){
		$length = 0;
		$query = [];
        if ($request->name != ''){array_push($query, 'name'); array_push($query, $request->id); $length++;}
        if ($request->nickname != ''){ array_push($query, 'nickname'); array_push($query, $request->nickname); $length++;}
        if ($request->phone != ''){array_push($query, 'phone'); array_push($query,$request->phone);  $length++;}
        if ($request->email != ''){array_push($query, 'email'); array_push($query,$request->email);  $length++;}
        if ($request->job != ''){array_push($query, 'job'); array_push($query,$request->job);  $length++;}
        if ($request->disabilities != ''){ array_push($query, 'disabilities'); array_push($query,$request->disabilities);  $length++;}
        if ($request->gender != ''){array_push($query, 'gender'); array_push($query,$request->gender);  $length++;}        if ($request->address != ''){array_push($query, 'address'); array_push($query,$request->address);  $length++;}

       $length2 = $length * 2;
        $results = [];
        $sql1 = "";
        $sql2 = "";
        $sql3 = "";
        $sql4 = "";
        $sql5 = "";
        $sql6 = "";
        $sql7 = "";
                $sql8 = "";
       for($x = 0; $x < ($length2); $x+=2){
          if($query[$x] == 'name'){
                 $sql1 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }else if($query[$x] == 'email'){
                 $sql2 = "`".$query[$x]. '` = "%'.$query[$x+1].'%"';
                 }else if($query[$x] == 'nickname'){
                   $sql3 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }else if($query[$x] == 'disabilities'){
                 $sql4 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }else if($query[$x] == 'job'){
                 $sql5 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }else if($query[$x] == 'gender'){
                 $sql6 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }else if($query[$x] == 'phone'){
                 $sql7 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }
                 else if($query[$x] == 'address'){
                 $sql8 = "`".$query[$x]. '` LIKE "%'.$query[$x+1].'%"';
                 }  
             }
		$querystring= "";
        if($sql1 != "")
        {
          $querystring  = $querystring. $sql1;
        }
        if($sql2 != "")
        {
          if($querystring != ""){ $querystring= $querystring. " AND ";}
          $querystring  = $querystring. $sql2;
        }
        if($sql3 != "")
        {
          if($querystring != ""){ $querystring= $querystring. " AND ";}
          $querystring = $querystring. $sql3;
        }
        if($sql4 != "")
        {
          if($querystring != ""){ $querystring= $querystring. " AND ";}
          $querystring  = $querystring. $sql4;
        }
        if($sql5 != "")
        {
          if($querystring != ""){ $querystring= $querystring. " AND ";}
          $querystring = $querystring. $sql5;
        }
        if($sql6 != "")
        {
          if($querystring != ""){ $querystring= $querystring." AND ";}
          $querystring  = $querystring.$sql6;
        }
        if($sql7 != "")
        {
          if($querystring != ""){ $querystring= $querystring. " AND ";}
          $querystring  = $querystring. $sql7;
        }
        if($sql8 != "")
        {
          if($querystring != ""){ $querystring= $querystring. " AND ";}
          $querystring  = $querystring. $sql7;
        }
         if($querystring != ''){
          $contacts = \DB::select('SELECT * FROM contact WHERE '. $querystring);
          $eloquentarray= [];
          foreach($contacts as $contact){
            array_push($eloquentarray, $contact->id);
          }
        }
        if($querystring == ''){
          $final =  Contact::paginate(10);
        }else{
        $final = Contact::whereIn('id', $eloquentarray)->paginate(10);
        }
      $with = [ 
        'contacts' => $final->appends($request->all()),
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
    		"address"=>$request->address,
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
    	$contact->address = $request->address;
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
