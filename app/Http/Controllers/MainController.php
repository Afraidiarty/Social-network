<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registr;
use App\Models\Posts;

class MainController extends Controller
{
// MainController.php
public function index(Request $request) {
    $user_info = $request->session()->get('user_info');

    if($user_info) {
        $posts = new Posts();
        $data = $posts->select('posts.*', 'registrs.name as name' , 'registrs.created_at as time')
                      ->join('registrs', 'posts.id_user', '=', 'registrs.id')
                      ->where('posts.id_user', $user_info['id'])
                      ->orderBy('posts.created_at', 'desc')
                      ->get();

        return view('main', ['user_info' => $user_info, 'data' => $data]);
    } else {
        return redirect()->route('login');
    }
}




}

