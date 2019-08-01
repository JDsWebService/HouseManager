@extends('layouts.user')

@section('title', 'Edit Rent')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-6">
			{{ Form::model($rent, ['route' => ['rent.update', $rent->id], 'method' => 'PUT']) }}
				<div class="form-group">
					<label for="occupant_id">Occupant</label>
					<select name="occupant_id" id="occupant_id" class="form-control">
						@foreach($occupants as $occupant)
							<option value="{{ $occupant->id }}">{{ $occupant->fullName }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="amount">Amount</label>
					{{ Form::text('amount', null, ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					<label for="check_number">Check / Money Order Number</label>
					{{ Form::text('check_number', null, ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					<label for="received_at">Received On</label>
					{{ Form::date('received_at', null, ['class' => 'form-control']) }}
				</div>

				<button type="submit" class="btn btn-block btn-primary">Save Changes</button>

			{{ Form::close() }}		
		</div>
	</div>

@endsection