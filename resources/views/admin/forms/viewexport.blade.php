@extends('layouts.admin')

@section('content')

<body>
    <div class="header">
        FORMS CRUD
    </div>
    <div class="container mt-5">
        <h3>Forms</h3>
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                   <th>Name</th>
                   <th>Publication date</th>
                   <th>End date</th>
                   <th>State</th>
                   <th>User email</th>
                   <th>Dependency (Facultad/ Ciudad)</th>
                   <th>Work Space Name</th>
                   <th>Actions</th> 
                </tr>


                @foreach($forms as $form)
        <tr>    
            <td>{{ $form-> name }}</td>
            <td>{{ $form-> publication_date }}</td>
            <td>{{ $form-> end_date }}</td>
            <td>{{ $form-> state }}</td>

            <td>
                @php($user= DB:: table('users')->where('id', $form->user_id)->get())
                {{ $user[0]->email }}</td>



            <td>
                @php($dependency = DB::table('dependencies')->where('id',$form->dependency_id)->get())
                @php($faculty= DB:: table('faculties')->where('id', $dependency[0]->faculty_id)->get())
                @php($city= DB:: table('cities')->where('id', $dependency[0]->city_id)->get())
                {{ $faculty[0]->name }} / {{ $city[0]->name }}</td>


            <td>
                @php($ws= DB:: table('work_spaces')->where('id', $form->work_space_id)->get())
                {{ $ws[0]->name }}</td>

            <td>
                <a href="{{route ('export', $form->id) }}" class="btn btn-success">Exportar</a>
                
            </td>
        </tr>
        @endforeach
            </table>
            <div>{!! $forms->render() !!}</div>
            </div>
        </div>
    </div>
</body>



@endsection 