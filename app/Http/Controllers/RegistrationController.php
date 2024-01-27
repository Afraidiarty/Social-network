<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use \App\Models\Registr;

class RegistrationController extends Controller
{
    public function Registration(RegistrationRequest $request){
        $reg = new Registr();
        $reg->name = $request->input('login');
        $reg->email = $request->input('email');
        $reg->password = bcrypt($request->input('password')); // Используем bcrypt для хеширования пароля
        $reg->reg_time = time();

        $reg->save();

        return redirect()->route('login')->with('success' , 'Ура! Вы зарегестрировались. Теперь осталось войти.');
    }
}
