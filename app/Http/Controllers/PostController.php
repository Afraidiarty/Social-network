<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Registr;

class PostController extends Controller
{
    public function CreatePost(Request $request){
        $user_info = $request->session()->get('user_info');

        $post = new Posts();
        $post->id_user = $user_info['id'];
        $post->message = $request->input('messagePost');

        $post->save();
        
        return redirect()->route('main');
    }
    

}
