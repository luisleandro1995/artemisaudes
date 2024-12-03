@extends('layouts.admin')

@section('content')


<div class="container">
    <h3>Edit form</h3>
    <form method="POST" action= "{{route ('forms.update', $form->id)}}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $form->id }}">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <label for="name">Name: </label>
                <input id="name" name="name" type="text" class="form-control" value=" {{ old('name', $form->name) }}" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="publication_date">Publication date: </label>
                <input id="publication_date" name="publication_date" type="date" class="form-control" value="{{ old('name', $form->publication_date) }}"  required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="end_date">End date: </label>
                <input id="end_date" name="end_date" type="date" class="form-control" value="{{ old('name', $form->end_date) }}" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="user_id">User: </label>
                <select class="form-select" id="user_id" name="user_id">
                @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($user->id == $form->user_id) selected = "selected" @endif>{{ $user->name }} {{ $user->last_name}} - {{ $user->email }}</option>
                        @endforeach
                </select>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="dependency_id">Dependency: </label>
                <select class="form-select" id="dependency_id" name="dependency_id">
                @foreach($dependencies as $dependency)

                @php($faculty = DB::table('faculties')->where('id',$dependency->faculty_id)->get())
                @php($city= DB:: table('cities')->where('id', $dependency->city_id)->get())


                        <option value="{{ $dependency->id }}" @if($dependency->id == $form->dependency_id) selected = "selected" @endif > {{ $faculty[0]->name }} / {{ $city[0]->name }} </option>
                        @endforeach
                </select>
            </div>


            <div class="col-lg-12 mt-2">
                <label for="work_space_id">Work Space: </label>
                <select class="form-select" id="work_space_id" name="work_space_id">
                @foreach($wss as $ws)
                        <option value="{{ $ws->id }}" @if($ws->id == $form->work_space_id) selected = "selected" @endif >{{ $ws->name }}</option>
                        @endforeach
                </select>
            </div>


            
            <div class="col-lg-12 mt-2">
                    <label for="state">State: </label>
                    <select class="form-select" id="state" name="state" >
                        <option value="activo" @if($form->state == "activo") selected = "selected" @endif>Activo</option>
                        <option value="inactivo" @if($form->state == "inactivo") selected = "selected" @endif>Inactivo</option>
                    </select>
                </div>


            </div>
            <div class="col-lg-12 mt-5">
                <input type="submit" class="btn btn-success" value="Update" />
                <a href="{{ route('forms.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

