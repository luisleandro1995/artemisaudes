@extends('layouts.admin')

@section('content')

<body>
    <div class="header">
        WORK SPACE USER
        </div>
    <div class="container mt-5">
        <h3>Work Space user</h3>
        <div class="row mb-5">
            <div class="col-lg-12">
                <a href="{{route ('workspaceuser.create') }}" class="btn btn-primary float-end">New  Work Space</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                   <th>Work Space Name</th>
                   <th>User email</th>
                   <th>Actions</th>

                </tr>

                @foreach($workspaceusers as $workspaceuser)
        <tr>

        <td>
                @php($ws= DB:: table('work_spaces')->where('id', $workspaceuser->work_space_id)->get())
                {{ $ws[0]->name }}</td>

            <td>
                @php($user= DB:: table('users')->where('id', $workspaceuser->user_id)->get())
                {{ $user[0]->email }}</td>

            <td>
                <form method="POST" action = "{{route ('workspaceuser.destroy', $workspaceuser->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirmarBorrado()" >Delete</button>
            </td>
        </tr>
        @endforeach
            </table>
            <div>{!! $workspaceusers->render() !!}</div>
            </div>
        </div>
    </div>
</body>



@endsection 