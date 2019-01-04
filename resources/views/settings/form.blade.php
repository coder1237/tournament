@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Settings</div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{route('settings.update')}}">
                            @csrf

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="group_size">Group size</label>
                                    <input type="number" name="group_size"
                                           value="{{ !empty($settings->group_size) ? $settings->group_size : old('group_size') }}"
                                           class="form-control{{ $errors->has('group_size') ? ' is-invalid' : '' }}"
                                           id="group_size" placeholder="Enter group size" min="1">
                                    @if ($errors->has('group_size'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group_size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="number_of_matches">Number of matches for each team with the same opponent</label>
                                    <input type="number" name="number_of_matches"
                                           value="{{ !empty($settings->number_of_matches) ? $settings->number_of_matches : old('number_of_matches') }}"
                                           class="form-control{{ $errors->has('number_of_matches') ? ' is-invalid' : '' }}"
                                           id="number_of_matches" placeholder="Enter group size"  min="1">
                                    @if ($errors->has('number_of_matches'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_matches') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
