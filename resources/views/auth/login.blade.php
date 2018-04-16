@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                    {!! Form::open(array('url' => 'login','method' => 'post', 'class' => 'form-horizontal')) !!}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'E-Mail Address', array('class' => 'col-md-4 control-label')) !!}

                        <div class="col-md-6">
                            {!! Form::text('email',old('email'),array('class' => 'form-control', 'placeholder' => 'someone@somewhere.com') ) !!}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password', array('class' => 'col-md-4 control-label')) !!}

                        <div class="col-md-6">
                        {!! Form::text('password',null,array('class' => 'form-control')) !!}

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                {!! Form::label('remember', 'Remember Me') !!}
                                {!! Form::checkbox('remember', 'value', false) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}


                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                {!! Form::close() !!}
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
