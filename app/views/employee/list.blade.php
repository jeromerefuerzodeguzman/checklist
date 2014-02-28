@extends('layouts.default')


@section('content')
	<div class="row">
		<div class="large-12 columns text-center">
			<p ><h4>SEARCH EMPLOYEE</h4></p>
		</div>
	</div>
	<div class="row">
		<div class="large-5 large-centered columns">
			<table class="large-12">
				<tr>
					<th>Name</th>
					<th>Department</th>
					<th>Date Created</th>
				</tr>
			@foreach($list as $employee)
				<tr>
					<td><a href="{{ Request::root() }}/checklist/{{ $employee->id }}">{{ $employee->name }}</a></td>
					<td>{{ $employee->department }}</td>
					<td>{{ $employee->created_at }}</td>
				</tr>
			@endforeach
			</table>
		</div>
	</div>
@endsection


@section('scripts')
@endsection