@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                   <h2>Thanks for registering</h2>
                    <p>You've registered {{ $theEmail }}.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
