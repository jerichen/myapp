@extends('layouts.app')

@section('content')
<div class="login-box">
	<div class="login-logo">
    	<a href="{{ url('/login') }}"><b>MyAPP</b>LTE</a>
    </div>
    
    <!-- 顯示驗證錯誤 -->
    @include('common.errors')
    
    <!-- /.login-logo -->
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>
    	
    	<form action="{{ url('/login') }}" class="login-form" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		
    		<div class="form-group has-feedback">
		    	<input type="email" class="form-control" placeholder="Email" id="email" name="email">
		        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
		    	<input type="password" class="form-control" placeholder="Password" id="password" name="password">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		    </div>
		    <div class="row">
		    	<div class="col-xs-8">
		    		<div class="checkbox icheck">
		    			<label>
              				<input type="checkbox"> Remember Me
            			</label>
		    		</div>
		    	</div>
		    	<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        		</div>
		    </div>
		</form>   
		
		<div class="social-auth-links text-center">
      		<p>- OR -</p>
      		<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        	Facebook</a>
      		<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        	Google+</a>
    	</div> 
    	
    	<a href="{{ url('/password/email') }}">I forgot my password</a><br>
    	<a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
    </div>
</div>
@endsection
  
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(function() {
	$('input').iCheck({
    	checkboxClass: 'icheckbox_square-blue',
      	radioClass: 'iradio_square-blue',
      	increaseArea: '20%'
    });
});	

$(document).ready(function() {
	$('body').removeAttr('class');
    $('body').addClass('hold-transition login-page');
    $('footer').remove();
});	
</script>