<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showWelcome(){

        Schema::create('art', function($newtable){
            $newtable -> increments('id');
            $newtable -> string('artist');
            $newtable -> string('title', 500);
            $newtable -> text('description');
            $newtable -> date ('created');
            $newtable -> date('exhibition_date');
            $newtable -> timestamps();
        });
    }
}
