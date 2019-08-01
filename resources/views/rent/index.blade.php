@extends('layouts.user')

@section('title', 'Rent Index')

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-sm-3">
			<a href="{{ route('rent.create') }}" class="btn btn-block btn-sm btn-success">Create Rent Entry</a>
		</div>
	</div>

	@if($rent->count())
		<div class="row mt-3">
			<div class="col-sm-12">

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
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
									<i class="far fa-trash-alt"></i>
								</button>
							</td>
						</tr>
						@include('rent.modals.delete', ['payment' => $payment])
						@endforeach

					</tbody>
				</table>
			</div>

			<div class="col-sm-12">
			    {{ $rent->links() }}
			</div>
		</div>
	@endif

@endsection