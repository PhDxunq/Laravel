<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }
    public function store(RegisterRequest $request){
        // $request->validate([
        //     'username' =>'required',
        //     'email' =>'required|email',
        //     'password' => 'required|min:4',
        // ]);
         echo "Successfully registered";
    }
    
}