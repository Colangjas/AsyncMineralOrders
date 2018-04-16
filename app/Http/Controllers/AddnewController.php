<?php
/**
 * Created by PhpStorm.
 * User: Colin Thompson
 * Date: 5/27/2016
 * Time: 2:03 PM
 */

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class AddnewController extends Controller
{
    public function create(){

        return view ('addnew');
    }

    public function store(){

        return view ('formulations');
    }


}