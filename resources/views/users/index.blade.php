@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <h1>Users</h1>

    @foreach($users as $user)
        <article>
            <h2>{{ $user->name }}</h2>

            <div class="body">{{ $user->email }}</div>
    `   </article>
    @endforeach

</body>
</html>
