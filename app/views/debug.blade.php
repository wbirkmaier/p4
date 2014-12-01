@extends('_master')

@section('active')

    <!- Generate dynamic menu base on URL and Login Status ->
	<li class="active"><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@getLogout') }}">Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}">Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}">Register</a></li>
    @endif

@stop

@section('content')

<h1>debug!</h1>

//Test Code//<br>

<a href="{{ action('IndexController@createFeed') }}" class="btn btn-primary">Create Feed</a>

@if ($feeds->isEmpty())
    <p>No Feed Records Found</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>
                <th>Max Results</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
      
@foreach($feeds as $feed)
        <tr>
            <td>{{ $feed->name }}</td>
            <td>{{ $feed->url }}</td>
            <td>{{ $feed->maxresults }}</td>
            <td>
                <a href="{{ action('IndexController@changeFeed', $feed->id) }}"class="btn btn-primary">Modify</a>
                <a href="{{ action('IndexController@deleteFeed', $feed->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
@endforeach

        </tbody>
    </table>

@endif

<a href="{{ action('IndexController@getLogout') }}" class="btn btn-primary">Logout</a>

//End Test Code//

@stop
