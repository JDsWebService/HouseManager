@extends('layouts.user')

@section('title', 'User Logs')

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
            <div class="col-sm-10">
                <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Target Name</th>
                            <th scope="col">Target Type</th>
                            <th scope="col">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <th scope="row">{{ $log->action }}</th>
                                <td>{{ $log->source_ip }}</td>
                                <td>{{ $log->target_name }}</td>
                                <td>{{ $log->target_type }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
@endsection
