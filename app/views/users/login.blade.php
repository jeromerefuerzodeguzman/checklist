<!DOCTYPE html>
<html lang="en">
<head>
	<title>CHECKLIST</title>
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/foundation.css') }}
	{{ HTML::style('css/main.css') }}
	{{ HTML::script('js/vendor/modernizr.js') }}
</head>
<body>
	<div class="row" id="login">
		<div class="large-12 columns">
			<div class="row">
				<div class="large-6 large-centered columns" id="login-content">
					<div class="row">
						<div class="large-12 columns">
							<h1>
								Sign in to
								<span>Employee Checklist</span>
							</h1>
							<div class="separator"></div>
						</div>
					</div>
					{{ Form::open(array('url' => 'authenticate')) }}
					<div class="row" style="margin-top: 30px">
						<div class="large-7 large-offset-1 columns">
							{{ Form::label('username', 'User:') }}
							{{ Form::text('username', Input::old('username'), array('placeholder' => 'Enter your username here')) }}
							
							{{ Form::label('password', 'Password:') }}
							{{ Form::password('password') }}
							<br/>
							@if (Session::has('flash_error'))
							<small class="error">{{ Session::get('flash_error') }}</small>
							@endif
							{{ Form::submit('Login', array('class' => 'button radius')) }}
						</div>
					</div>
					{{ Form::token() }}
					{{ Form::close(); }}
				</div>
			</div>
		</div>
	</div>
	

	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation/foundation.js"></script>
	<script>
		$(function(){
		    $(document).foundation();    
		})
	</script>
	<div id="alerts">
		@if(Session::has('message'))
			<div class="alert-box success">
				{{ Session::get('message') }}
				<a href="" class="close">&times;</a>
			</div>
		@elseif(Session::has('error'))
			<div class="alert-box alert">
				{{ Session::get('error') }}
				<a href="" class="close">&times;</a>
			</div>
		@endif
		@if($errors->has())
			<script type="text/javascript">

			@foreach(Session::get('error_index') as $key => $value)
				if($("input[name='{{ $key }}']").length){
					var form = $("input[name='{{ $key }}']").addClass("error").after('<small class="error">{{ $errors->first($key) }}</small>').parents('form:first');
				} else if($("select[name='{{ $key }}']").length) {
					var form = $("select[name='{{ $key }}']").addClass("error").after('<small class="error">{{ $errors->first($key) }}</small>').parents('form:first');
				} else if($("textarea[name='{{ $key }}']").length) {
					var form = $("textarea[name='{{ $key }}']").addClass("error").after('<small class="error">{{ $errors->first($key) }}</small>').parents('form:first');
				}
			@endforeach

				@if(Session::has('form'))
					$("#{{ Session::get('form') }}").reveal();
				@else
					var parent = form.parent();
					if(parent.attr('id').indexOf("modal") !== -1) {
						parent.foundation('reveal', 'open');
					}
				@endif
			</script>
		@endif
	</div>
	@yield('scripts')

	
</body>
</html>    