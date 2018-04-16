<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Cards</title>
    <link rel="stylesheet" href="<?php echo asset('../css/bootstrap.css') ?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <h1>{{ $card->title }}</h1>

                <ul class="list-group">
                    @foreach ($card->notes as $note)
                        <li class="list-group-item">
                            {{ $note->body }}
                        </li>
                    @endforeach
                </ul>
                <h3>Add A New Note</h3>
                {!! Form::open(['url' => '/cards/'.$card->id.'/notes']) !!}
                <div class="form-group">
                    {!! Form::textarea('body', null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add Note', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
</html>