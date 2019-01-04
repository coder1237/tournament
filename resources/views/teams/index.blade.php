@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Teams
                        <a class="btn btn-outline-success btn-sm float-right" href="{{route('teams.create')}}">Create new team</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Team ID</th>
                                <th scope="col">Team name</th>
                                <th scope="col">Team Group</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teams as $team)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$team->id}}</td>
                                    <td>{{!empty($team->name) ? $team->name : 'N/A'}}</td>
                                    <td>{{!empty($team->group->name) ? $team->group->name : 'Not assigned'}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary btn-xs " href="{{route('teams.edit',$team->id)}}">Edit</a>
                                        <a class="btn btn-outline-danger btn-xs " href="{{route('teams.delete',$team->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        Teams not available at the moment!
                                    </td>
                                    <td></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
