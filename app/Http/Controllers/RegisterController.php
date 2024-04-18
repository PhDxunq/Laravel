<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
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
        $data = $request->all();
        User::create($data);
        return redirect()->route('register.index')->with('Success','Register Success');
    }
    
}