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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1>Formulations</h1><a href="{!! url('formulations/addnew') !!}">+ Add New</a>
                    <div class="panel-body">
                     {!! Form::open(array('url' => 'formulations')) !!}
                        <p>
                            {!! Form::select('location', array('orderdown' => 'Location \/', 'orderup' => 'Location /\\')) !!}

                            {!! Form::select('products', array('orderdown' => 'Products \/', 'orderup' => 'Products /\\')) !!}
                        </p>
                        {!! Form::close() !!}

                        <table>
                            <thead class="">
                            <tr>
                                <th>Product</th>
                                <th>Location</th>
                                <th>Rev. Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($formulations as $f)

                                <tr>
                                    <td><a href="formulations/{{ $f->id }}">{{ $f->product }}</a></td>
                                    <td>{{ $f->location }}</td>
                                    <td>{{ $f->updated_at }}</td>
                                    <td><a href="formulations/{{ $f->id }}/edit">Edit</a></td>
                                    <td>Duplicate</td>
                                    <td>Delete</td>
                                </tr>

                            @endforeach

                            <!--<tr>
                                <td>Onyx - R1</td>
                                <td>Vance Bros - Kansas City MO</td>
                                <td>01.07.2016</td>
                                <td>Edit</td>
                                <td>Duplicate</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <td>Axes - eH</td>
                                <td>Vance Bros - Tulsa OK</td>
                                <td>01.15.2016</td>
                                <td>Edit</td>
                                <td>Duplicate</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <td>Onyx - R1</td>
                                <td>Vance Bros - Kansas City MO</td>
                                <td>01.07.2016</td>
                                <td>Edit</td>
                                <td>Duplicate</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <td>Axes - eH</td>
                                <td>Vance Bros - Tulsa OK</td>
                                <td>01.15.2016</td>
                                <td>Edit</td>
                                <td>Duplicate</td>
                                <td>Delete</td>
                            </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection