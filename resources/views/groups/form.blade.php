@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{!empty($group) ? 'Update group' :'Create group' }}
                        <a class="btn btn-dark btn-sm float-right" href="{{route('groups.index')}}">Back to group</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ !empty($group) ? route('groups.update',$group->id) : route('groups.store')}}">
                            @csrf

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Group name</label>
                                    <input type="text" name="name" value="{{ !empty($group->name) ? $group->name : old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter group name" >
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">{{!empty($group) ? 'Update' : 'Create' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
