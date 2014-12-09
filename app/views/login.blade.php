@extends('_master')

@section('active')

	<li><a href="{{ action('IndexController@showIndex') }}">Home</a></li>
	<li class="active"><a href="{{ action('IndexController@getLogin') }}"> <i class="fa fa-sign-in"></i> Login</a></li>
	<li><a href="{{ action('IndexController@getRegister') }}"> <i class="fa fa-keyboard-o"></i> Register</a></li>

@stop

@section('content')
    <!--Primary view for loging in -->
    <!-- Center form with bootstrap doing (12 - 3) / 2 = ~4 -->
 <div class="col-md-3 col-md-offset-4">
     
    <h2>Log in</h2>
    <br>
    
    <form action="{{ url('login') }}" method="post">
        
        <!-- Allow for fancy font awesome bootstrap icons for email and password via classes-->
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <input class="form-control" type="text" name="email" placeholder="email address">
        </div>
        <br>
        
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" name="password" placeholder="password">
        </div>
        <br>
        <p><input type="submit" value="Login" class="btn btn-primary"/></p>
        
        <!--Generate token for CSRF protection-->
        <?= Form::token() ?>
        <br>
       
    </form>
     
 </div>

@stop