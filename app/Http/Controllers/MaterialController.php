<?php

namespace App\Http\Controllers;

use App\Formulation;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Material;
use App\Test;

class MaterialController extends Controller
{
    public function store(Request $request){

        return $request->all();
    }

    public function index(Formulation $formulation)
    {
        //$materials = DB::table('materials')->where('formulation_id', '=', $formulation->id)->get();
        $materials = Material::where('formulation_id', '=', $formulation->id)->get();
        $test = Test::where('formulations_id', '=', $formulation->id)->get();

        return view('formulations.show', compact('materials', 'formulation', 'test'));
    }
}
