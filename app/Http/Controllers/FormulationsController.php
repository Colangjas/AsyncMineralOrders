<?php
/**
 * Created by PhpStorm.
 * User: Colin Thompson
 * Date: 5/27/2016
 * Time: 12:53 PM
 */

namespace App\Http\Controllers;


use App\Test;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Routing\Controller;
use DB;
use App\Formulation;
use App\Material;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\DomCrawler\Form;
use Illuminate\Http\Request;

class FormulationsController extends Controller
{
    public function create(Formulation $f)
    {

        return view('addnew', compact('f'));
    }

    public function store(Request $request){

        // DB::table('formulations')->insert(['user_id' => $request->authid, 'product' => $request->product, 'location' => $request->location, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        //return Redirect::to('/formulations');

        // Save the formulation
        $formulation = new Formulation;
        $formulation->product = $request->product;
        $formulation->location = $request->location;
        $formulation->user_id = $request->authid;
        $formulation->notes = $request->notes;
        $formulation->save();

        $formulationId = Formulation::all()->last()->id;
        $matStack = $request->matstack;
        $testStack = $request->teststack;

        //DB::table('materials')->insert(['formulation_id' => $formulationId, 'material' => $request->material, 'target' => $request->target, 'lower_tolerance' => $request->ltol, 'upper_tolerance' => $request->utol, 'solids' => $request->solid, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        // Insert all quality testing for formulation

        // Insert all materials for formulation
//        for($i=0; $i<$matStack; $i++){
//
//            $material = new Material;
//            $num = $i+1;
//
//            $material->formulation_id = $formulationId;
//            $material->material = $request->input('matselect'.$num);
//            $material->target = $request->input('target'.$num);
//            $material->lower_tolerance = $request->input('ltol'.$num);
//            $material->upper_tolerance = $request->input('utol'.$num);
//            $material->solids = $request->input('solid'.$num);
//            $material->save();
//        }
//
//        for ($i = 0; $i < $testStack; $i++) {
//
//            $test = new Test;
//            $num = $i + 1;
//
//            $test->formulations_id = $formulationId;
//            $test->viscosity = $request->input('testselect' . $num);
//            $test->instrument_method = $request->input('insmethod' . $num);
//            $test->spec = $request->input('spec' . $num);
//            $test->lower_tolerance = $request->input('ltoltest' . $num);
//            $test->upper_tolerance = $request->input('utoltest' . $num);
//            $test->save();
//        }

//            return $matstack;
        return redirect('/formulations');
    }


    public function index(){

        $formulations = Formulation::all();
        return view('formulations', compact('formulations'));
    }

    public function show(Formulation $f){

       // $f = Formulation::find($id);
       return view('formulations.show', compact('f'));

       // return $f;
    }

    public function edit(Formulation $formulation)
    {
        $materials = Material::where('formulation_id', '=', $formulation->id)->get();
        $test = Test::where('formulations_id', '=', $formulation->id)->get();
        return view('formulations.edit', compact('formulation','materials', 'test'));
    }

}