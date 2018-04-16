<?php
if(!Auth::check()){
    header("Location: login");
    exit;
}
?>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <div class="panel panel-default">
                    <h1>Formulation {{ $formulation->id }}</h1>
                        <h2>{{ $formulation->product }}</h2>
                        <h3>{{ $formulation->location }}</h3>
                    </div>
                    <div class="panel panel-default">
                        <h4>Materials</h4>
                        <table>
                            <thead class="">
                            <tr>
                                <th>Material</th>
                                <th>Target</th>
                                <th>Lower Tollerance</th>
                                <th>Upper Tollerance</th>
                                <th>Solids</th>
                                <th>Rev. Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($materials as $m)

                                <tr>
                                    <td>{{ $m->material }}</td>
                                    <td>{{ $m->target }}</td>
                                    <td>{{ $m->lower_tolerance }}</td>
                                    <td>{{ $m->upper_tolerance }}</td>
                                    <td>{{ $m->solids }}</td>
                                    <td>{{ $m->updated_at }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <h4>Quality Testing</h4>
                        <table>
                            <thead>
                            <tr>
                                <th>Attribute</th>
                                <th>Instrument Method</th>
                                <th>Spec</th>
                                <th>Lower Tolerance</th>
                                <th>Upper Tolerance</th>
                                <th>Updated At.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($test as $t)
                                <tr>
                                    <td>{{ $t->viscosity }}</td>
                                    <td>{{ $t->instrument_method }}</td>
                                    <td>{{ $t->spec }}</td>
                                    <td>{{ $t->lower_tolerance }}</td>
                                    <td>{{ $t->upper_tolerance }}</td>
                                    <td>{{ $t->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <h3>Notes</h3>
                        <p>{{ $formulation->notes }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection