@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{!empty($team) ? 'Update team' :'Create team' }}
                        <a class="btn btn-dark btn-sm float-right" href="{{route('teams.index')}}">Back to teams</a>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{ !empty($team) ? route('teams.update',$team->id) : route('teams.store')}}">
                            @csrf

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Team name</label>
                                    <input type="text" name="name"
                                           value="{{ !empty($team->name) ? $team->name : old('name') }}"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                           placeholder="Enter team name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="code">Team code</label>
                                    <input type="text" name="code"
                                           value="{{ !empty($team->code) ? $team->code : old('code') }}"
                                           class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" id="name"
                                           placeholder="Enter team name">
                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="code">Select group</label>
                                    <select id="group-selection" name="group_id" class="form-control{{ $errors->has('group_id') ? ' is-invalid' : '' }}">
                                        <option value="">--Select--</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}" {{ !empty($team->id) &&
                                            $team->group_id == $group->id ? 'selected' : (old('group_id') == $group->id ? 'selected' : '') }}>{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('group_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('group_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit"
                                        class="btn btn-primary">{{!empty($team) ? 'Update' : 'Create' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
