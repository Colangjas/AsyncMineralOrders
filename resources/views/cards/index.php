@extends('layout.app')

@section('content')
    <h1>All Cards</h1>

    @foreach ($cards as $card)
        <div>
            {{ $card->title }}
        </div>
    @endforeach
@stop