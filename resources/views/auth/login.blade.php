@extends('control_panel.layouts.app')

@section('content')
<div class="login-box">
<div class="login-logo">
    <a href="index.php"><b>{{ config('app.name', 'Laravel') }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>


                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/control_panel/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
<?php $value = Cookie::get('uname'); $pass = Cookie::get('upass'); ?>
                           
						   <div class="col-md-12">
                                <input id="username" placeholder="Username" type="text" class="form-control" name="username" value="<?php if($value) { echo $value; }else{ echo ""; } ?>" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" value="<?php if($pass) { echo $pass; }else{ echo ""; } ?>" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remembers Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-2">
                                <button type="submit" class="btn btn-info">
                                    Login
                                </button>

                                <!---<a class="btn btn-default" href="{{ url('control_panel/password/reset') }}">
                                    Forgot Your Password?
                                </a> -->
                            </div>
                        </div>
                    </form>
    </div>
    </div>
                    
@endsection
