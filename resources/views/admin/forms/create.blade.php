@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>New form</h3>
    <form method="POST" action="{{route ('forms.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 mt-2">
                <label for="name">Name: </label>
                <input id="name" name="name" type="text" class="form-control" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="publication_date">Publication date: </label>
                <input id="publication_date" name="publication_date" type="date" class="form-control" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="end_date">End date: </label>
                <input id="end_date" name="end_date" type="date" class="form-control" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="user_id">User: </label>
                <select class="form-select" id="user_id" name="user_id">
                @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name}} - {{ $user->email }}</option>
                        @endforeach
                </select>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="dependency_id">Dependency: </label>
                <select class="form-select" id="dependency_id" name="dependency_id">
                @foreach($dependencies as $dependency)

                @php($faculty = DB::table('faculties')->where('id',$dependency->faculty_id)->get())
                @php($city= DB:: table('cities')->where('id', $dependency->city_id)->get())


                        <option value="{{ $dependency->id }}"> {{ $faculty[0]->name }} / {{ $city[0]->name }} </option>
                        @endforeach
                </select>
            </div>


            <div class="col-lg-12 mt-2">
                <label for="work_space_id">Work Space: </label>
                <select class="form-select" id="work_space_id" name="work_space_id">
                @foreach($wss as $ws)
                        <option value="{{ $ws->id }}">{{ $ws->name }}</option>
                        @endforeach
                </select>
            </div>


            </div>

            <div class="col-lg-12 mt-5">
                <input type="submit" class="btn btn-success" value="Save" />
                <a href="{{ route('forms.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection