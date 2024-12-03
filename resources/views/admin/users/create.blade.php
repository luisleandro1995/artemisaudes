@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>New user</h3>
    <form method="POST" action="{{route ('users.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 mt-2">
                <label for="name">Name: </label>
                <input id="name" name="name" type="text" class="form-control" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="last_name">Lastname: </label>
                <input id="last_name" name="last_name" type="text" class="form-control" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="document_type">Document type: </label>
                <select class="form-select" id="document_type" name="document_type">
                    <option value="Cedula">Cedula de ciudadania</option>
                    <option value="Codigo">Codigo estudiantil</option>
                </select>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="document_number">Document number: </label>
                <input id="document_number" name="document_number" type="text" class="form-control" required>
            </div>

            <div class="col-lg-12 mt-2">
                <label for="email">Email: </label>
                <input id="email" name="email" type="text" class="form-control" required> @mail.udes.edu.co
                </div>

                
                <div class="col-lg-12 mt-2">
                <label for="password">Password: </label>
                <input id="password" name="password" type="password" class="form-control" required> 
                </div>



                <div class="col-lg-12 mt-2">
                    <label for="user_type_id">User type: </label>
                    <select class="form-select" id="user_type_id" name="user_type_id">
                        @foreach($usertypes as $usertype)
                        <option value="{{ $usertype->id }}">{{ $usertype->level }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-lg-12 mt-5">
                <input type="submit" class="btn btn-success" value="Save" />
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection