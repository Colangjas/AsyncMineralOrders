<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function index(){
      // $users = User::all();

        //$users =  User::all();
        $users =  DB::table('users2')->get();

        //return $users;

        return view('users.index', compact('users'));
    }
}
