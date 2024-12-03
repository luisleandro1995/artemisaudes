@extends('layouts.admin')

@section('content')


<div class="container">
        <h3>Edit user </h3>
        <form method="POST" action= "{{route ('users.update', $user->id)}}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="row">


        <div class="container">
    <h3>View user</h3>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <label for="name">Name: </label>
                <input id="name" name="name" type="text" class="form-control" required value=" {{ old('name', $user->name) }}" required >
            </div>

            <div class="col-lg-12 mt-2">
                <label for="last_name">Lastname: </label>
                <input id="last_name" name="last_name" type="text" class="form-control" required value=" {{ old('last_name', $user->last_name) }}" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="document_type">Document type: </label>
                <select class="form-select" id="document_type" name="document_type" >
                    <option value="Cedula" @if($user->document_type == "Cedula") selected = "selected" @endif>Cedula de ciudadania</option>
                    <option value="Codigo" @if($user->document_type == "Codigo") selected = "selected" @endif>Codigo estudiantil</option>
                </select>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="document_number">Document number: </label>
                <input id="document_number" name="document_number" type="text" class="form-control" required value=" {{ old('document_number', $user->document_number) }}"required >
            </div>

            <div class="col-lg-12 mt-2">
                <label for="email">Email: </label>
                <input id="email" name="email" type="text" class="form-control" required value=" {{ old('document_number', $user->document_number) }}" required> @mail.udes.edu.co
                </div>

                <div class="col-lg-12 mt-2">
                <label for="password">Password: </label>
                <input id="password" name="password" type="password" class="form-control" required value=" {{ old('password', $user->password) }}" required> 
                </div>



                <div class="col-lg-12 mt-2">
                    <label for="user_type_id">User type: </label>
                    <select class="form-select" id="user_type_id" name="user_type_id" >
                        @foreach($usertypes as $usertype)
                        <option value="{{ $usertype->id }}" @if($user->user_type_id == $usertype->id) selected = "selected" @endif>{{ $usertype->level }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-lg-12 mt-2">
                    <label for="state">State: </label>
                    <select class="form-select" id="state" name="state" >
                        <option value="activo" @if($user->state == "activo") selected = "selected" @endif>Activo</option>
                        <option value="inactivo" @if($user->state == "inactivo") selected = "selected" @endif>Inactivo</option>
                    </select>
                </div>

                <div class="col-lg-12 mt-5">
                    <input type="submit" class="btn btn-success" value="Update" />
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <div>
    </div>


@endsection