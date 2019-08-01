@extends('layouts.user')

@section('title', 'Create An Occupant')

@section('content')
	
	<div class="row justify-content-center mb-3">
		<div class="col-sm-10">
			{{ Form::open(['route' => 'occupants.store', 'method' => 'POST']) }}

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="first_name">First Name</label>
							{{ Form::text('first_name', null, ['class' => 'form-control form-control-lg']) }}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="last_name">Last Name</label>
							{{ Form::text('last_name', null, ['class' => 'form-control form-control-lg']) }}
						</div>
					</div>
				</div>
				
				@if($houses->count())
					<p>Assign User To A House</p>
					{{ Form::select('house_id', $housesArray, null, ['class' => 'form-control'])}}
				@endif

				<hr>

				@include('occupants.partials.info')
				
				<hr>
				
				<div class="row justify-content-center">
					<div class="col-sm-6 text-center">
						<button class="btn btn-success" type="submit">
							Add Occupant
						</button>
					</div>
				</div>
				
				
			{{ Form::close() }}
		</div>
	</div>

@endsection