@extends('layouts.admin')

@section('content')

<body>
    <div class="header">
        FORMS CRUD
    </div>
    <div class="container mt-5">
        <h3>Forms</h3>
        @if(Auth:: user()->user_type->level != 'encuestado')
        <div class="row mb-5">
            <div class="col-lg-12">
                <a href="{{route ('forms.create') }}" class="btn btn-primary float-end">New  form</a>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                   <th>Name</th>
                   <th class="optional">Publication date</th>
                   <th class="optional">End date</th>
                   <th class="optional">State</th>
                   <th class="optional">User email</th>
                   <th>Dependency (Facultad/ Ciudad)</th>
                   <th class="optional">Work Space Name</th>
                   <th>Actions</th> 
                </tr>


                @foreach($forms as $form)
        <tr>    
            <td>{{ $form-> name }}</td>
            <th class="optional">{{ $form-> publication_date }}</td>
            <th class="optional">{{ $form-> end_date }}</td>
            <th class="optional">{{ $form-> state }}</td>
            <th class="optional">
            <td>
                @php($user= DB:: table('users')->where('id', $form->user_id)->get())
                {{ $user[0]->email }}</td>



            <th class="optional">
                @php($dependency = DB::table('dependencies')->where('id',$form->dependency_id)->get())
                @php($faculty= DB:: table('faculties')->where('id', $dependency[0]->faculty_id)->get())
                @php($city= DB:: table('cities')->where('id', $dependency[0]->city_id)->get())
                {{ $faculty[0]->name }} / {{ $city[0]->name }}</td>


            <td>
                @php($ws= DB:: table('work_spaces')->where('id', $form->work_space_id)->get())
                {{ $ws[0]->name }}</td>

            <td>
                @if(Auth::user()->user_type->level !='encuestado')
                <a href="{{route ('forms.show', $form->id) }}" class="btn btn-primary">View</a>
                <a href="{{route ('forms.edit', $form->id) }}" class="btn btn-success">Edit</a>
                <a href="{{route ('question', $form->id) }}" class="btn btn-primary">Add Questions</a>
                <form method="POST" action = "{{route ('forms.destroy', $form->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirmarBorrado()" >Delete</button>
                @endif
                <a href="{{route ('resp', $form->id) }}" class="btn btn-success">Responder</a>
                
            </td>
        </tr>
        @endforeach
            </table>
            <div>{!! $forms->render() !!}</div>
            </div>
        </div>
    </div>
</body>

<script>

        window.addEventListener('resize', function(){
            let ancho = window.innerWidth;
            let columnas = document.getElementsByClassName('optional');
            
            for(let i = 0; i < columnas.length; i++)
            {
                if(ancho <= 950)
                    columnas[i].setAttribute('style', 'display: none;');
                else
                    columnas[i].setAttribute('style', 'display: block;');
            }
        });
        

    </script>

@endsection 