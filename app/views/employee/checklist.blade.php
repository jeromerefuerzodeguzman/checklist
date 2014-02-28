@extends('layouts.default')


@section('content')

	<div class="row">
		<div class="large-12 columns text-center">
			<p><h4>EMPLOYEE CHECKLIST</h4></p>
		</div>
	</div>
	<div class="row collapse">
		<div class="large-4 columns">
			<div class="large-12 columns">
				<fieldset>
					<legend>Items</legend>
					@foreach($items as $item)
					<div id="modal{{ $item->id }}" class="reveal-modal small" data-reveal>
						<fieldset>
							<legend>{{ $item->name }}</legend>
							{{ Form::open(array('url' => 'add_employeeitem', 'method' => 'post', 'class' => 'custom')) }}
							{{ Form::hidden('employee_id', $employee->id) }}
							{{ Form::hidden('user_id', $user->id) }}
							{{ Form::hidden('item_id', $item->id) }}
							Status: {{ Form::select('status', array('Entry' => 'Entry', 'Resign' => 'Resign')) }}
							Remarks: {{ Form::textarea('remarks') }}
							{{ Form::submit('Save', array('class' => 'button small')) }}
							{{ Form::token(); }}
							{{ Form::close(); }}
						</fieldset>
					</div>
					<div class="row collapse">
						<div class="large-6 columns">
							<span class="prefix">{{ $item->name }}</span>
						</div>
						<div class="large-6 columns">
							<a href="#" data-reveal-id="modal{{ $item->id }}" class="tiny button">Process</a>
							<!-- <button class="process">Process</button> -->
						</div>
					</div>
					@endforeach
				</fieldset>				
			</div>
		</div>
		<div class="large-8 columns">
			<div class="large-12 columns">
				<fieldset>
					<legend>Employee Details</legend>
					<div class="row">
						<div class="large-8 columns">
							<p>Name: {{ strtoupper($employee->name) }}</p>
							<p>Department: {{ strtoupper($employee->department) }}</p>
						</div>
					</div>
					@if($employeeitems->count())
					<div class="row">
						<div class="large-12 colums text-left">
							<table class="large-12" id="checklist_table">
								<tr>
										<th class="large-2">Item</th>
										<th class="large-2">User</th>
										<th class="large-2">Date</th>
										<th class="large-1">Status</th>
										<th class="large-5">Remarks</th>
								</tr>
								@foreach($employeeitems as $employeeitem)
								<tr>
									<td>{{ $employeeitem->item->name }}</td>
									<td>{{ $employeeitem->user->username }}</td>
									<td>{{ date('Y-m-d', strtotime($employeeitem->created_at)) }}</td>
									<td>{{ $employeeitem->status }}</td>
									<td>{{ $employeeitem->remarks }}</td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
					@endif
				</fieldset>
			</div>
		</div>
	</div>
@endsection


@section('scripts')

@endsection