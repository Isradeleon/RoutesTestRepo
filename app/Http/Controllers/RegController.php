<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;

class RegController extends Controller
{
    public function RegRequest(Request $r){
    	if ($r->isMethod('GET')) {
    		return view('authentication.registration');
    	}
        return $r->input();
    	$rules = [
    		'name'=>'required',
    		'email'=>'required|email',
    		'password'=> 'required',
    		'password2'=>'same:password'
    	];
    	$result = Validator::make($r->all(),$rules);

    	if ($result->fails()) {
    		return redirect('/registration')
    		->with('errors',$result->messages()->all());
    	}

    	$newuser = new User;
    	$newuser->name = $r->input('name');
    	$newuser->email = $r->input('email');
    	$newuser->password = Hash::make($r->input('password'));
    	$newuser->remember_token = $r->input('_token');
    	$newuser->save();

    	return redirect('/login')
    	->with('email', $newuser->email);
    }
}
