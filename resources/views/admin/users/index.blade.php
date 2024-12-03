@extends('layouts.admin')

@section('content')

<body>
    <div class="header">
        USERS CRUD
    </div>
    <div class="container mt-5">
        <h3>Users</h3>
        <div class="row mb-5">
            <div class="col-lg-12">
                <a href="{{route ('users.create') }}" class="btn btn-primary float-end">New  users</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                   <th>Name</th>
                   <th>Last Name</th>
                   <th>Document Type</th>
                   <th>Document Number</th>
                   <th>Email</th>
                   <th>State</th> 
                   <th>User Type</th>
                   <th>Actions</th> 
                </tr>


                @foreach($users as $user)
        <tr>
            <td>{{ $user-> name }}</td>
            <td>{{ $user-> last_name }}</td>
            <td>{{ $user-> document_type }}</td>
            <td>{{ $user-> document_number }}</td>
            <td>{{ $user-> email }}</td>
            <td>{{ $user-> state }}</td>
            <td>
                @php($userType= DB:: table('user_types')->where('id', $user->user_type_id)->get())
                {{ $userType[0]->level }}</td>

            <td>
                <a href="{{route ('users.show', $user->id) }}" class="btn btn-primary">View</a>
                <a href="{{route ('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                <form method="POST" action = "{{route ('users.destroy', $user->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirmarBorrado()" >Delete</button>
            </td>
        </tr>
        @endforeach
            </table>
            <div>{!! $users->render() !!}</div>
            </div>
        </div>
    </div>
</body>



@endsection 