@extends('layouts.admin')

@section('content')

<div class="container">
        <h3>New user type</h3>
        <form method="POST" action= "{{route ('usertypes.store') }}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 mt-2">
                <label for="level">Level: </label>
                <input id="level" name="level" type="text" class="form-control" required>
                </div>
                <div class="col-lg-12 mt-5">
                    <input type="submit" class="btn btn-success" value="Save" />
                    <a href="{{ route('usertypes.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection