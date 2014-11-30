@extends('_master')

@section('active')

	<li class="active"><a href="/">Home</a></li>
        <li><a href="/user/register">Register</a></li>
        <li><a href="/user/login">Login</a></li>

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

//End Test Code//

@stop
