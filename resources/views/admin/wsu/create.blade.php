@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>New Work Space User</h3>
    <form method="POST" action="{{route ('workspaceuser.store') }}">
        {{ csrf_field() }}
        <div class="row">


        <div class="col-lg-12 mt-2">
                <label for="work_space_id">Work Space: </label>
                <select class="form-select" id="work_space_id" name="work_space_id">
                @foreach($workspaces as $workspace)
                        <option value="{{ $workspace->id }}">{{ $workspace->name }}</option>
                        @endforeach
                </select>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="user_id">User: </label>
                <select class="form-select" id="user_id" name="user_id">
                @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }} {{ $user->email }}</option>
                        @endforeach
                </select>
            </div>

            </div>

            <div class="col-lg-12 mt-5">
                <input type="submit" class="btn btn-success" value="Save" />
                <a href="{{ route('workspaceuser.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection