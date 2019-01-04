@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Groups
                        <a class="btn btn-outline-success btn-sm float-right" href="{{route('groups.create')}}">Create new group</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Group ID</th>
                                <th scope="col">Group name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$group->id}}</td>
                                    <td>{{!empty($group->name) ? $group->name : 'N/A'}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary btn-xs " href="{{route('groups.edit',$group->id)}}">Edit</a>
                                        <a class="btn btn-outline-danger btn-xs " href="{{route('groups.delete',$group->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        Groups not available at the moment!
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
