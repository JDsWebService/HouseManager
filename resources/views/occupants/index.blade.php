@extends('layouts.user')

@section('title', 'Occupants Index')

@section('content')

	<div class="row">
		
			@if($occupants->count())
				<div class="col-sm-12">
					<table class="table table-sm table-hover table-dark">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">House</th>
								<th scope="col">Date Added</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($occupants as $occupant)
								<tr>
									<td scope="row">{{ $occupant->id }}</td>
									<td>{{ $occupant->first_name }}</td>
									<td>{{ $occupant->last_name }}</td>
									@if($occupant->house_id)
										<td>{{ $occupant->house->name }}</td>
									@else
										<td class="text-warning">Not Assigned</td>
									@endif
									<td>{{ $occupant->created_at }}</td>
									<td>
										<a href="{{ route('occupants.show', $occupant->id) }}" class="btn btn-sm btn-secondary">
											<i class="far fa-eye"></i>
										</a>
										<a href="{{ route('occupants.edit', $occupant->id) }}" class="btn btn-sm btn-primary">
											<i class="far fa-edit"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			    <div class="col-sm-12">
			        {{ $occupants->links() }}
			    </div>
			@else
				<div class="col-sm-12 text-center">
					<img src="images/occupants/no-results.png" class="h-25" alt="No Results">
					<p class="text-center lead mt-2">
						We've searched far and wide, and yet we didn't find any results!
					</p>
					<a href="{{ route('occupants.create') }}" class="btn btn-success">
						<i class="fas fa-user-plus"></i> Create An Occupant
					</a>
				</div>
			@endif
		
	</div>

@endsection