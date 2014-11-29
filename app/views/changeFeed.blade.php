@extends('_master')

@section('active')

	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
    <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>

@stop

@section('content')

    <h1>You are now editing {{ $feed->name }}.</h1>

    <form method="post" role="form" action="{{ action('IndexController@postChangeFeed') }}">
        <input type="hidden" name="id" value="{{ $feed->id }}"/>
        <label for="Name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $feed->name }}"/>
        <br>
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" value="{{ $feed->url }}"/>
        <br>
        <label for="maxresults">Number of Articles to Return</label>
        <input class="form-control" type="int" name="maxresults" value="{{ $feed->maxresults }}"/>
        <br>
        <input class="btn btn-primary" type="submit" value="Save"/>
        <a href="{{ action('IndexController@showIndex') }}" class="btn btn-link">Cancel</a>
         <?= Form::token() ?>
        <br>
    </form>

@stop