@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Staff Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>

                            @forelse($staffs as $staff)

                            <!---staff table-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($staffs as $staff)
                                            <tr>
                                                <th scope="row">{{$staff->id}}</th>
                                                <td>{{$staff->name}}</td>
                                                <td>{{$staff->phone}}</td>
                                                <td><a href="{{ route('sfaffer', $staff->id) }}" class="btn btn-primary btn-sm">View Staff</a></td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>

                            @empty
                                    <p>The Staff table is empty, Kindly add new Staff</p>
                            @endforelse

                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
