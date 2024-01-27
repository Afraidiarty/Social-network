<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registr;

class ImageController extends Controller
{
    public function upload(Request $request){
    $path = $request->file('image')->store('uploads', 'public');
    $user_info = $request->session()->get('user_info');


    $user = Registr::find($user_info['id']);

    $user->id_image = $path;

    $user->save();

    session(['user_info' => $user->toArray()]);

    return redirect()->route('settings');
    }
}
