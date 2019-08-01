@extends('layouts.user')

@section('title', $house->name)

@section('css')

    <style type="text/css">
        main {
            font-size: 1rem;
        }
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <p>
                    <i class="fas fa-sort-numeric-up-alt"></i> {{ $house->max_occupants }} Occupants
                    <br>
                    <i class="fas fa-venus-mars"></i> {{ $house->gender }}
                    <br>
                    <i class="fas fa-map-marked-alt"></i> <a href="https://www.google.com/maps/place/{{ $house->address }}/">{{ $house->address }}</a>
                    <br>
                    <i class="fas fa-money-bill-alt"></i> ${{ $house->rent }}/Month

                    <div class="form-group">
                        {{ Form::open(['route' => ['houses.destroy', $house->id], 'method' => 'DELETE']) }}
                            <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-share"></i> Share With Another User</a>
                            <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        {{ Form::close() }}
                    </div>

                </p>
            </div>
            <div class="col-sm-4 text-center">
                <img src="https://via.placeholder.com/150x150?text=Coming+Soon!" alt="">
            </div>
        </div>

        <hr>
        
        @if($house->occupants->count())
            <div class="row justify-content-center">
                <div class="col-sm-12 text-center">
                    <h2>Occupants</h2>
                    <table class="table table-sm table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Date Added</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($house->occupants as $occupant)
                                <tr>
                                    <td scope="row">{{ $occupant->id }}</td>
                                    <td>{{ $occupant->first_name }}</td>
                                    <td>{{ $occupant->last_name }}</td>
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
            </div>
        @endif

        
    </div>
@endsection
