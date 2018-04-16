<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::get('/register', 'RegisterController@showRegister');


Route::get('formulations', ['as' => 'formulations', 'uses' => 'FormulationsController@index']);
//Route::get('formulations', array(
//    'before' => 'auth.basic',
//    function()
//    {
//        return View::make('formulations');
//    }
//));
Route::get('formulations/addnew', 'FormulationsController@create');
Route::post('formulations/store', 'FormulationsController@store');

//Route::get('formulations/addnew', ['as' => 'addnew', 'uses' => 'AddnewController@create']);
//Route::post('formulations', ['as' => 'addnew', 'uses' => 'AddnewController@store']);
Route::get('formulations/{formulation}', 'MaterialController@index');
Route::get('formulations/{formulation}/edit', 'FormulationsController@edit');
Route::put('formulations/{formulation}', 'FormulationsController@update');
Route::delete('formulations/{formulation}', 'FormulationsController@destroy');

Route::get("users", 'UsersController@index');

Route::get("cards", 'CardsController@index');
Route::get("cards/{card}", 'CardsController@show');
Route::post('cards/{card}/notes', 'NotesController@store');
