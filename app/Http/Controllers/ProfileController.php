<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Registr;
use \App\Models\Posts;

class ProfileController extends Controller
{
    public function index(Request $request, $id){
        $user = Registr::find($id);
        $user_me = $request->session()->get('user_info');


        $posts = new Posts();
        $data = $posts->select('posts.*', 'registrs.name as name' , 'registrs.created_at as time')
                      ->join('registrs', 'posts.id_user', '=', 'registrs.id')
                      ->where('posts.id_user', $user['id'])
                      ->orderBy('posts.created_at', 'desc')
                      ->get();

        return view('profile', ['user_info' => $user, 'data' => $data, 'user' => $user_me]);

    }
}
