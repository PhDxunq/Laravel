<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index(){
        return view('login.index');
    }
    public function store(LoginRequest $request){
        $data = $request->all();
        if(auth() -> attempt(['username' => $data['username'],'password'=> $data['password']])){
            $user = auth() -> user();
        }
    }
}
