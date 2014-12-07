@extends('_master')

@section('active')

    <!-- Generate dynamic menu base on URL and Login Status -->
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li class="active"><a href="{{ action('IndexController@customizeFeed') }}"> <i class="fa fa-cogs"></i> Customize</a></li>
        <li><a href="{{ action('IndexController@getLogout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
        <li><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>
    @endif

@stop

@section('content')

<h3>Customize your RSS Feed list.</h3>
<br>
<a href="{{ action('IndexController@createFeed') }}" class="btn btn-primary"> <i class="fa fa-cog"></i> Create Feed</a>
<br>
<br>

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
                <a href="{{ action('IndexController@changeFeed', $feed->id) }}"class="btn btn-primary"> <i class="fa fa-pencil fa-fw"></i> Modify</a>
                <a href="{{ action('IndexController@deleteFeed', $feed->id) }}" class="btn btn-danger"> <i class="fa fa-trash-o fa-lg"></i> Delete</a>
            </td>
        </tr>
@endforeach

        </tbody>
    </table>

@endif

@stop
