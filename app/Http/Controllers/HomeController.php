<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class HomeController extends Controller
{
    public function FirstRequest(Request $r){
    	if ($r->isMethod('GET')) {
    		return "Welcome!";
    	}
    	$rules = [
    		'email'=>'required|email',
    		'password'=> 'required',
    	];
    	$result = Validator($r->all(),$rules);
    	if ($result->fails()) {
    		return redirect('/login')
    		->with('errors',$result->messages()->all());
    	}
    	$userData = [
    	"email" => $r->input('email'), 
    	"password" => $r->input('password')];
    	if (Auth::attempt($userData)) {
    		return redirect("/");
    	}
    	return redirect('/login')
    		->with('errors',["message"=>"Wrong email or password!"])
    		->with('email',$r->input('email'));
    }

    public function LogoutRequest(){
    	Auth::logout();
    	return redirect('/login');
    }   
}
