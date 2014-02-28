@extends('layouts.default')


@section('content')

	<div class="row">
		<div class="large-12 columns text-center">
			<p><h4>EMPLOYEE CHECKLIST</h4></p>
		</div>
	</div>
	<div class="row">
		<div class="large-6 columns">
			<div class="large-12 columns">
				<fieldset>
					<legend>Items</legend>
					@foreach($items as $item)

					<div id="modal{{ $item->id }}" class="reveal-modal tiny" data-reveal>
						<fieldset>
							<legend>Others</legend>
							{{ Form::open(array('url' => 'add_employeeitem', 'method' => 'post', 'class' => 'custom')) }}
							{{ Form::hidden('employee_id', $employee->id) }}
							{{ Form::hidden('user_id', $user->id) }}
							{{ Form::hidden('item_id', $item->id) }}
							Status: {{ Form::select('status', array('Entry' => 'Entry', 'Resign' => 'Resign')) }}
							Remarks: {{ Form::text('remarks') }}
							{{ Form::submit('Save', array('class' => 'button radius')) }}
							{{ Form::token(); }}
							{{ Form::close(); }}
						</fieldset>
					</div>
					<div class="row collapse" style="margin-left: 80px;">
						<div class="small-6 columns">
							<span class="prefix">{{ $item->name }}</span>
						</div>
						<div class="small-6 columns">
							<a href="#" data-reveal-id="modal{{ $item->id }}" class="radius tiny button">Process</a>
							<!-- <button class="process">Process</button> -->
						</div>
					</div>

					@endforeach
				</fieldset>				
			</div>
		</div>
		<div class="large-6 columns">
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
						<div class="large-12 colums text-center">
							<table width="430px">
								<tr>
										<td width="90px">Item</td>
										<td width="120px">Processed By</td>
										<td width="180px">Date</td>
										<td width="40px">Status</td>
								</tr>
								@foreach($employeeitems as $employeeitem)
									<tr>
										<td>{{ $employeeitem->item->name }}</td>
										<td>{{ $employeeitem->user->username }}</td>
										<td>{{ $employeeitem->created_at }}</td>
										<td>{{ $employeeitem->status }}</td>
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