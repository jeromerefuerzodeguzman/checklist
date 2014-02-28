@extends('layouts.default')


@section('content')

<div class="row">
	<div class="large-12 columns">
		<p>You logged in as <span class="radius alert label">{{ strtoupper($user->username); }} </span></p>
	</div>
</div>
<div class="row">
	<div class="large-12 columns">
		<p>Please <span class="radius alert label">READ</span> before using the system: </p>
	</div>
</div>
<div class="row">
	<div class="large-12 columns">
		<p>
			Please <span class="radius alert label">DO NOT</span> forget to logout after your shift. You can find the <span class="radius alert label">LOGOUT</span> link at the upper right of your screen
			Before using the program at the start of your shift, make sure that you're not logged in.
			Make sure that all the data you will enter are all correct before you hit the <span class="radius alert label">SAVE</span> button.
			If you're experiencing some errors or bugs in the program, please report it immediately into your managers or team leaders.
			Comments and suggestions to improve the functionality of the program is always welcome.
		</p>
	</div>
</div>

@endsection


@section('scripts')
@endsection