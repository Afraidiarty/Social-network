<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use \App\Models\Registr;

class LoginController extends Controller
{
    public function login(loginRequest $request)
    {
        $user = Registr::where('name', $request->input('name'))->first();
    
        if ($user) {
            if (password_verify($request->input('password'), $user->password)) {    
                
                session(['user_info' => $user->toArray()]);
    
                return redirect()->route('inbox');
            } else {
                return redirect()->route('login')->with('failed', 'Неверный логин или пароль');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Неверный логин или пароль');
        }
    }
    
}
