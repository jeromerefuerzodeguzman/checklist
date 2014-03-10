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
							Status: {{ Form::select('status', array('Entry' => 'Assign', 'Resign' => 'Remove')) }}
							Remarks: {{ Form::textarea('remarks') }}
							{{ Form::submit('Save', array('class' => 'button small')) }}
							{{ Form::token(); }}
							{{ Form::close(); }}
						</fieldset>
					</div>
					<div class="row collapse">
						<div class="large-10 columns">
							@if($employee->item_status($item->id) == 'Entry')
							<span class="prefix success label">{{ $item->name }}</span>
							@elseif($employee->item_status($item->id) == 'Resign')
							<span class="prefix alert label">{{ $item->name }}</span>
							@else
							<span class="prefix">{{ $item->name }}</span>
							@endif
						</div>
						<div class="large-2 columns">
							<span data-reveal-id="modal{{ $item->id }}" class="button tiny">+</span>
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
									<td><?php 
										switch ($employeeitem->status) {
											case 'Entry':
												echo 'Assign';
												break;
											case 'Resign':
												echo 'Remove';
												break;
											default:
												# code...
												break;
										}
									?></td>
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