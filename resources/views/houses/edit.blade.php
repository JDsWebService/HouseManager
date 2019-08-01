@extends('layouts.user')

@section('title', 'Edit ' . $house->name)

@section('css')

    <style type="text/css">
        main {
            font-size: 1rem;
        }
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                {{ Form::model($house, ['route' => ['houses.update', $house->id], 'method' => 'PUT']) }}
                    <div class="form-group mb-0">
                        {{ Form::label('name', 'House Name') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group mb-0 mt-2">
                        {{ Form::label('gender', 'Gender') }}
                        {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'coed' => 'Co-Ed'], null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group mb-0 mt-2">
                        {{ Form::label('max_occupants', 'Max Occupants') }}
                        {{ Form::number('max_occupants', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group mb-0 mt-2">
                        {{ Form::label('address', 'House Address') }}
                        {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}
                    </div>

                    <div class="form-group mb-0 mt-2">
                        {{ Form::label('rent', 'Rent Per Month') }}
                        {{ Form::number('rent', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save House</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
