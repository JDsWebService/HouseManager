@extends('layouts.user')

@section('title', 'Occupant - ' . $occupant->fullName)

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-9">
			<table class="table table-borderless table-sm text-center">
				{{-- Age/DOB/Gender/Race --}}
				<tr>
					@if($occupant->age)
						<td>
							<span data-toggle="tooltip" data-placement="top" title="Age">
								<i class="fas fa-sort-numeric-up-alt"></i> {{ $occupant->age }}
							</span>
						</td>
					@endif
					<td>
						<span data-toggle="tooltip" data-placement="top" title="Birth Date">
							<i class="fas fa-restroom"></i> {{ $occupant->date_of_birth }}
						</span>
					</td>
					<td>
						<span data-toggle="tooltip" data-placement="top" title="Gender">
							<i class="fas fa-venus-mars"></i> {{ $occupant->gender }}
						</span>
					</td>
					<td>
						<span data-toggle="tooltip" data-placement="top" title="Race">
							<i class="far fa-id-card"></i> {{ $occupant->race }}
						</span>
					</td>
				</tr>
				{{-- Phone/Clean Date/Last Address --}}
				<tr>
					@if($occupant->phone_number)
						<td>
							<span data-toggle="tooltip" data-placement="bottom" title="Phone Number">
								<i class="fas fa-phone"></i> {{ $occupant->phone_number }}
							</span>
						</td>
					@endif

					<td colspan="2">
						<span data-toggle="tooltip" data-placement="bottom" title="Clean Date">
							<i class="fas fa-shower"></i> {{ $occupant->clean_date }}
						</span>
					</td>

					@if($occupant->last_address)
						<td>
							<span data-toggle="tooltip" data-placement="bottom" title="Last Address">
								<i class="fas fa-map-pin"></i> {{ $occupant->last_address }}
							</span>
						</td>
					@endif
				</tr>
			</table>
			
			<div class="row">
				<div class="col-sm-12">
					@if($occupant->nicknames)
						<p class="lead m-0 p-0">Nicknames: <small>{{ $occupant->nicknames }}</small></p>
					@endif

					<p class="lead m-0 p-0">Move In Date: <small>{{ $occupant->move_in_date }}</small></p>
					
					@if($occupant->move_out_date)
						<p class="lead m-0 p-0">Move Out Date: <small>{{ $occupant->move_out_date }}</small></p>
					@endif
					
					<hr>

					<div class="card">
						<div class="card-header">
							<i class="fas fa-notes-medical"></i> Medical & Emergency Information
						</div>
						<div class="card-body">
							<p class="lead m-0 p-0">Drugs of Choice: <small>{{ $occupant->drugs_of_choice }}</small></p>
							
							@if($occupant->list_of_medications)
								<p class="lead m-0 p-0">List of Medications: <small>{{ $occupant->list_of_medications }}</small></p>
							@endif
							
							@if($occupant->health_issues)
								<p class="lead m-0 p-0">Health Issues: <small>{{ $occupant->health_issues }}</small></p>
							@endif

							<hr>
							
							<p class="lead m-0 p-0">Emergency Contact Name: <small>{{ $occupant->emergency_name }}</small></p>

							<p class="lead m-0 p-0">Emergency Contact Phone: <small>{{ $occupant->emergency_phone }}</small></p>

							@if($occupant->emergency_address)
								<p class="lead m-0 p-0">Emergency Contact Address: <small>{{ $occupant->emergency_address }}</small></p>
							@endif

						</div>
					</div>
					
					@if($occupant->probation_officer_name || $occupant->probation_officer_phone || $occupant->probation_reason || $occupant->probation_court_date)
						<div class="card mt-3">
							<div class="card-header">
								<i class="fas fa-user-secret"></i> Probation Information
							</div>
							<div class="card-body">
								@if($occupant->probation_officer_name)
									<p class="lead m-0 p-0">Probation Officer Name: <small>{{ $occupant->probation_officer_name }}</small></p>
								@endif
								@if($occupant->probation_officer_phone)
									<p class="lead m-0 p-0">Probation Officer Phone: <small>{{ $occupant->probation_officer_phone }}</small></p>
								@endif
								@if($occupant->probation_reason)
									<p class="lead m-0 p-0">Probation Reason: <small>{{ $occupant->probation_reason }}</small></p>
								@endif
								@if($occupant->probation_court_date)
									<p class="lead m-0 p-0">Next Probation Court Date: <small>{{ $occupant->probation_court_date }}</small></p>
								@endif
							</div>
						</div>
					@endif <!-- ./probation -->

					<div class="card mt-3">
						<div class="card-header">
							<i class="fas fa-money-check-alt"></i> Rent
						</div>
						<div class="card-body">
							
							@if($balance >= 0)
								<p class="lead text-danger text-center">
									Occupant Has An Outstanding Balance of ${{ $balance }}
								</p>
							@else
								<p class="lead text-success text-center">
									Occupant is currently up to date on their rent!
								</p>
							@endif
							
							@if($rent->count())
								<table class="table table-sm">
									<thead class="thead-dark">
										<tr>
											<th scope="col">Check/Money Order Number</th>
											<th scope="col">Amount</th>
											<th scope="col">Date Received</th>
										</tr>
									</thead>
									<tbody>
										@foreach($rent as $payment)
											<tr>
												<th scope="row">{{ $payment->check_number }}</th>
												<td>{{ $payment->amount }}</td>
												<td>{{ $payment->received_at }}</td>
											</tr>
										@endforeach
										
									</tbody>
								</table>
							@else
								<p>No Rent Payments Made!</p>
							@endif

						</div>
					</div> <!-- ./rent -->
				</div> <!-- ./col-sm-12 -->
			</div> <!-- ./row -->

		</div>


		<div class="col-sm-3 text-center">
			
			<div class="card">
				<img src="https://via.placeholder.com/500?text=Coming+Soon!" class="card-img-top" alt="">
				<div class="card-body">

					<a href="{{ route('occupants.edit', $occupant->id) }}" class="btn btn-block btn-primary">
						<i class="far fa-edit"></i> Edit Occupant
					</a>

					<hr>

					{{ Form::open(['route' => ['occupants.destroy', $occupant->id], 'method' => 'DELETE'])}}
						<button type="submit" class="btn btn-block btn-danger">
							<i class="fas fa-trash"></i> Delete Occupant
						</button>
						<p class="text-danger mt-1">By clicking this button you will PERMANATELY delete the occupant. This action can not be reversed!</p>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@section('javascript')
	<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
@endsection