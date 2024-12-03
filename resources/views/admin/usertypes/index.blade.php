@extends('layouts.admin')

@section('content')

<body>
    <div class="header">
        USER TYPE CRUD
    </div>
    <div class="container mt-5">
        <h3>User types</h3>
        <div class="row mb-5">
            <div class="col-lg-12">
                <a href="{{route ('usertypes.create') }}" class="btn btn-primary float-end">New  user type</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                   <th>Level</th>
                   <th>Actions</th> 
                </tr>

                @foreach($usertypes as $usertype)
        <tr>
            <td>{{ $usertype-> level }}</td>
            <td>
                <a href="{{route ('usertypes.show', $usertype->id) }}" class="btn btn-primary">View</a>
                <a href="{{route ('usertypes.edit', $usertype->id) }}" class="btn btn-success">Edit</a>
                <form method="POST" action = "{{route ('usertypes.destroy', $usertype->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirmarBorrado()" >Delete</button>
            </td>
        </tr>
        @endforeach
            </table>
            <div>{!! $usertypes->render() !!}</div>
            </div>
        </div>
    </div>
</body>



@endsection 