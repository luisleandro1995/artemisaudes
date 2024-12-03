@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>View form</h3>
        <div class="row">
        <div class="col-lg-12 mt-2">
    <label for="work_space_id">Questions: </label>
    @php($cant = 1)
    @foreach($questions as $question)
        <br>
        <label>Pregunta {{ $cant }}</label>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control" value="{{ $question->text_box }}" readonly>
            <!-- Botón de eliminar -->
            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('¿Seguro quieres borrar esta pregunta?')" style="margin-left: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">X</button>
            </form>
        </div>
        <br>
        @if($question->field_type == "text")
            <input type="text" class="form-control" readonly>
        @elseif($question->field_type == 'select')
            <select class="form-control" name="quer[]">
                <option value="Si" selected>Si</option>
                <option value="No">No</option>
            </select>
        @elseif($question->field_type == "checkbox")
            @php($opciones = explode(';', $question->checkboxes))
            @foreach($opciones as $opcion)
                <div>
                    <input name="opc[]" type="checkbox" value="{{ $opcion }}"> {{ $opcion }}
                </div>
            @endforeach
        @endif
        <br>
        @php($cant++)
    @endforeach
    <div>{!! $questions->render() !!}</div>
</div>


            <div class="col-lg-12 mt-5">
                <a href="{{ route('forms.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
</div>

@endsection 