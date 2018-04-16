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
                    <h1>Formulations</h1>
                    <h2>Edit Formulation</h2>
                    {!! Form::checkbox('Enabled', null, false) !!}
                    {!! Form::label('Enabled', 'Enabled?') !!}
                    <hr>
                </div>
                <div class="panel panel-default">
                    <h3>Revision Log</h3>
                    <hr>
                    {!! Date('m.d.Y') !!} | {!! Date('h:m a') !!} | {!! Auth::user()->name !!}
                    <p>Nam et partem ponderum gloriatur. Quis reque nulla pri in, sed te velit gubergren philosophia. Quo erant saperet disputando te, per ne modus dicta nostrud. Pri ex errem efficiantur, paulo audiam malorum mei et. In wisi option molestie sit. Vis fuisset pertinax maluisset ei. Mea an erat mandamus moderatius, laboramus constituam in sea, eu cum habeo liberavisse ullamcorper.</p>
                    <a href="#">Print Formulation</a>
                </div>
                <div class="panel panel-default">
                    <h3>Materials</h3>
                    <table>
                        <thead>
                            <th></th>
                            <th>Order#</th>
                            <th>Material</th>
                            <th>Target</th>
                            <th>Lower Tolerance</th>
                            <th>Upper Tolerance</th>
                            <th>Solids</th>
                        </thead>
                        <tbody>
                       <?php $orderNum = 1; ?>
                        @foreach($materials as $m)
                            <tr>
                                <td><button class="menu-btn" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button></td>
                                <td class="orderNum">{!! $orderNum !!}</td>
                                <td>{!! Form::select('material', ['none' => 'select','coal' => 'Coal', 'oil' => 'Oil', 'rocksalt' => 'Rock Salt', 'gravel' => 'Gravel', 'clay' => 'Clay'], $m->material, ['class' => 'inputnum matselect', 'id' => 'matselect0']) !!}</td>
                                <td>{!! Form::text('target', null, array('class' => "inputnum target", 'placeholder' => $m->target, 'id' => 'target0')) !!}%</td>
                                <td>{!! Form::text('ltol', $m->lower_tolerance, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'ltol0')) !!}</td>
                                <td>{!! Form::text('utol', $m->upper_tolerance, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'utol0')) !!}</td>
                                <td>{!! Form::text('solid', $m->solids, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'solid0')) !!}</td>
                            </tr>
                            {!! $orderNum++ !!}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection