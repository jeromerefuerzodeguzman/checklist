@extends('layouts.default')


@section('content')
	<div class="row">
		<div class="large-12 columns text-center">
			<p ><h4>SEARCH EMPLOYEE</h4></p>
		</div>
	</div>
	{{ Form::open(array('url' => 'search_employee', 'method' => 'post', 'class' => 'custom')) }}
	<div class="row">
		<div class="large-6 large-centered columns">
			<div class="row collapse">
				<div class="small-4 columns">
					<span class="prefix">Name:</span>
				</div>
				<div class="small-8 columns">
					{{ Form::text('name', Input::old('name'), array('placeholder' => 'Enter name here')) }}
				</div>
			</div>
		</div>
		<div class="large-12 columns text-center">
			{{ Form::submit('ADD', array('class' => 'button radius')) }}
		</div>
	</div>
	{{ Form::token(); }}
	{{ Form::close(); }}
@endsection


@section('scripts')
@endsection