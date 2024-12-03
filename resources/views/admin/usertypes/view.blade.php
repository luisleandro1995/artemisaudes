@extends('layouts.admin')

@section('content')

<div class="container">
        <h3>View user type</h3>
        <div class="row">
                <div class="col-lg-12 mt-2">
                <label for="level">Level: </label>
                <input id="level" name="level" type="text" class="form-control" value=" {{ old('level', $usertype->level) }}" readonly>
                </div>
                <div class="col-lg-12 mt-5">    
                    <a href="{{ route('usertypes.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div>


        
        


@endsection 