<?php
if(!Auth::check()){
    header("Location: ../login");
    exit;
}
$matnum=1;
$target=0;
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1>Formulations</h1>
                    <div class="panel-heading">Add New Formulation</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/formulations/store']) !!}
                        <p>
                            {!! Form::text('authid', Auth::id() ,['hidden']) !!}
                        </p>
                        <p>
                            {!! Form::select('location', array('selectone' => 'Company/Location', 'Adex Mining - Toronto, ON' => 'Adex Mining - Toronto, ON', 'Echo Bay Mines - Great Bear Lake, NT' => 'Echo Bay Mines - Great Bear Lake, NT', 'Kazakhmys - Kazakhstan' => 'Kazakhmys - Kazakhstan'), array('class' => 'formselect')) !!}
                        </p>
                        <p>
                            {!! Form::select('product', array('selectone' => 'Product', 'Onyx-R1' => 'Onyx-R1', 'Axes-eH' => 'Axes-eH', 'Evotherm' => 'Evotherm')) !!}
                        </p>


                        <p>
                            {!! Form::label('materials', 'Materials') !!}
                            {!! Form::button('+ Add New', array('class' => 'btn', 'id' => 'addmat')) !!}
                        </p>
                        <div class="matinput">
                            <table class="mattable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Order</th>
                                        <th>Material</th>
                                        <th>Target</th>
                                        <th>Lower Tolerance</th>
                                        <th>Upper Tolerance</th>
                                        <th>Solids</th>
                                    </tr>
                                </thead>
                                <tbody id="matsortable">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7"><p class="targetLabel">Total Target</p><div class="targetbar">0%</div></td>
                                    </tr>
                                <tr>
                                    {!! Form::text('matstack', null, ['class' => 'matStack', 'hidden']) !!}
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <p>
                            {!! Form::label('testing', 'Quality Testing') !!}
                            {!! Form::button('+ Add New', array('class' => 'btn', 'id' => 'addtest')) !!}
                        </p>

                        <div class="testinput">
                            <table class="qualtable ui-sortable-handle">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Order</th>
                                        <th>Attribute</th>
                                        <th>Instrument Method</th>
                                        <th>Spec</th>
                                        <th>Lower Tolerance</th>
                                        <th>Upper Tolerance</th>
                                    </tr>
                                </thead>
                                <tbody id="qualsortable">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        {!! Form::text('teststack', null, ['class' => 'testStack', 'hidden']) !!}
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p>
                            {!! Form::label('notes', 'Formulation Notes') !!}<br>
                            {!! Form::textarea('notes', null, array('placeholder' => 'Add Notes')) !!}
                        </p>
                        <p id="submit">
                        </p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection