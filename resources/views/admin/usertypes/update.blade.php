@extends('layouts.admin')

@section('content')


<div class="container">
        <h3>Edit user type</h3>
        <form method="POST" action= "{{route ('usertypes.update', $usertype->id)}}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $usertype->id }}">
        <div class="row">
                <div class="col-lg-12 mt-2">
                <label for="level">Level: </label>
                <input id="level" name="level" type="text" class="form-control" value=" {{ old('level', $usertype->level) }}" required>
                </div>
                <div class="col-lg-12 mt-5">
                    <input type="submit" class="btn btn-success" value="Update" />
                    <a href="{{ route('usertypes.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <div>
    </div>


@endsection