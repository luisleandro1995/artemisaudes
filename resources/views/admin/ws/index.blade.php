@extends('layouts.admin')

@section('content')

<body>
    <div class="header">
        WORK SPACES 
        </div>
    <div class="container mt-5">
        <h3>Work Spaces</h3>
        <div class="row mb-5">
            <div class="col-lg-12">
                <a href="{{route ('workspaces.create') }}" class="btn btn-primary float-end">New  Work Space</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                   <th>Name</th>
                   <th>User email </th>
                   <th>Actions</th>

                </tr>


                @foreach($workspaces as $workspace)
        <tr>
            <td>{{ $workspace-> name }}</td>
            <td>
                @php($user= DB:: table('users')->where('id', $workspace->user_id)->get())
                {{ $user[0]->email }}</td>

            <td>
                <form method="POST" action = "{{route ('workspaces.destroy', $workspace->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirmarBorrado()" >Delete</button>
            </td>
        </tr>
        @endforeach
            </table>
            <div>{!! $workspaces->render() !!}</div>
            </div>
        </div>
    </div>
</body>



@endsection 