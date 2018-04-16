<?php
/**
 * Created by PhpStorm.
 * User: Colin Thompson
 * Date: 5/26/2016
 * Time: 1:58 PM
 */


namespace App\Http\Controllers;
use View;

class RegisterController extends Controller
{
    public function showRegister(){
        return View::make('register');
    }

    public function doRegister(){

        $user = new User;
        $user->email = Input::get('email');
        $user->username = Input::get('name');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        $theEmail = Input::get('email');
        return View::make('thanks ')->with('theEmail', $theEmail);
    }

}