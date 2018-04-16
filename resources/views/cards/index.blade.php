<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Cards</title>
    <link rel="stylesheet" href="<?php echo asset('/css/bootstrap.css') ?>">

</head>
<body>
<div class="container">
    <div class="col-lg-2">
        <h1 class="t-txt-h1">Show Cards</h1>
    </div>
    <div class="col-lg-2">
        <ul>
            @foreach ($cards as $card)
                <li class="t-txt-big">
                    <a href="{{ $card->path() }}">{{ $card->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
