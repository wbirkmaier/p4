@extends('_master')

@section('active')

    <!-- Generate dynamic menu base on URL and Login Status -->
	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
    @if (Auth::check())
        <li><a href="{{ action('IndexController@getLogout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
    @else
        <li><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
        <li class="active"><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>
    @endif
	

@stop

@section('content')

<!-- Error message when id or email is taken-->
@foreach ($errors->all() as $message)
    <div class='error col-md-3 col-md-offset-4'>{{ $message }}</div>
    <br>
@endforeach

 <!-- Center form with bootstrap doing (12 - 3) / 2 = ~4 -->
 <div class="col-md-3 col-md-offset-4">

    <h2>Sign up</h2>
    <br>

    <form action="{{ url('register') }}" method="post">
        <!-- Allow for fancy font awesome bootstrap icons for all fields via classes-->
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw"></i></span>
            
            <!--<input placeholder="your username" class="form-control" name="username" type="text" value=""/>-->
            {{ Form::text('username', '', array('placeholder'=>'your username', 'class'=>'form-control')) }}
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            
            <!--<input placeholder="your firstname" class="form-control" name="given" type="text" value=""/>-->
            {{ Form::text('given', '', array('placeholder'=>'your first name', 'class'=>'form-control')) }}
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa fa-users fa-fw"></i></span>
            
            <!--<input placeholder="your surname" class="form-control" name="sur" type="text" value=""/>-->
            {{ Form::text('sur', '', array('placeholder'=>'your surname', 'class'=>'form-control')) }}
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            
            <!--<input placeholder="your email" class="form-control" name="email" type="text" value=""/>-->
            {{ Form::text('email', '', array('placeholder'=>'your email', 'class'=>'form-control')) }}
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" name="password" placeholder="password"/>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" name="verifyPass" placeholder="verify password"/>
        </div>
        <br>
        <p><input type="submit" value="Register" class="btn btn-primary"/></p>
        
        <!--Generate token for CSRF protection-->
        <?= Form::token() ?>
        <br>
    </form>
</div>

@stop
