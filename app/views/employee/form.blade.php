@extends('layouts.default')


@section('content')
	<div class="row">
		<div class="large-12 columns text-center">
			<p ><h4>EMPLOYEE DETAILS</h4></p>
		</div>
	</div>
	{{ Form::open(array('url' => 'add_employee', 'method' => 'post', 'class' => 'custom')) }}
	<div class="row">
		<div class="large-6 large-centered columns">
			<div class="row collapse">
				<div class="small-4 columns">
					<span class="prefix">Name:</span>
				</div>
				<div class="small-8 columns">
					{{ Form::text('name', Input::old('name'), array('placeholder' => 'Enter your name here')) }}
				</div>
			</div>
		</div>
		<div class="large-6 large-centered columns">
			<div class="row collapse">
				<div class="small-4 columns">
					<span class="prefix">Date:</span>
				</div>
				<div class="small-8 columns">
					{{ Form::text('date', $date, $attributes = array('readonly' => 'readonly')) }}
				</div>
			</div>
		</div>
		<div class="large-6 large-centered columns">
			<div class="row collapse">
				<div class="small-4 columns">
					<span class="prefix">Campaign/Department:</span>
				</div>
				<div class="small-8 columns">
					{{ Form::text('department', Input::old('department'), array('placeholder' => 'Enter your Campaign/Department here')) }}
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