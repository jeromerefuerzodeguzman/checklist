<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>IGS - CRM</title>
		{{ HTML::style('css/normalize.css') }}
		{{ HTML::style('css/foundation.css') }}
		{{ HTML::style('css/foundation-icons/foundation-icons.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::script('js/vendor/modernizr.js') }}
	</head>
	<body>
		<div id="content" >
			<nav class="top-bar">
				<ul class="title-area">
				    <li class="name">
				      	<h1><a href="{{ Request::root() }}/dashboard">Northstar Solutions Inc.</a></h1>
				    </li>
    				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			  	</ul>
			  	<section class="top-bar-section">
			  		<ul class="right">
			  			<li class="divider"></li>
			  			<li>{{ HTML::link("logout", "Logout") }}</li>
			  		</ul>
			  	</section>
			</nav>
			<div class="row">
				<div class="large-12 columns"  style="top: 20px; text-align: center;">
					<div class="large-4 columns">
						<a href="{{ Request::root() }}/dashboard" style="height: 95px;"><i class="fi-home style1"></i></a>
						<h5><span>Home</span><h5/>
					</div>
					<div class="large-4 columns">
						<a href="{{ Request::root() }}/employee_form" style="height: 95px;"><i class="fi-plus style1"></i></a>
						<h5><span>Add Employee</span><h5/>
					</div>
					<div class="large-4 columns">
						<a href="{{ Request::root() }}/search_form" style="height: 95px;"><i class="fi-magnifying-glass style1"></i></a>
						<h5><span>Search Employee</span><h5/>
					</div>
					
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="large-12 columns main-content">
					@yield('content')
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<hr>
					<h6><small>Copyright 2013 Northstar Solutions Inc.</small></h6>
				</div>
			</div>
		</div>
		
		{{ HTML::script('js/vendor/jquery.js') }}
		{{ HTML::script('js/foundation/foundation.js') }}
		{{ HTML::script('js/foundation/foundation.reveal.js') }}
	
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