@extends('layouts.user')

@section('title', 'Rent Index')

@section('content')
	
	@if($rent->count())
		<table class="table table-sm">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Check/Money Order Number</th>
						<th scope="col">Occupant</th>
						<th scope="col">Amount</th>
						<th scope="col">Date Received</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					@foreach($rent as $payment)
						<tr>
							<th scope="row">{{ $payment->check_number }}</th>
							<th>{{ $payment->occupant->fullName }}</th>
							<td>{{ $payment->amount }}</td>
							<td>{{ $payment->received_at }}</td>
							<td>
								<a href="{{ route('rent.edit', $payment->id) }}" class="btn btn-sm btn-primary">
									<i class="far fa-edit"></i>
								</a>
							</td>
						</tr>
					@endforeach
					
				</tbody>
			</table>
		@endif

@endsection