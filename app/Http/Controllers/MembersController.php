<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registr;

class MembersController extends Controller
{
    public function index(){
        $users = Registr::all();
    
        return view('members', ['data' => $users]);
    }
    
}
