@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Form</h3>
    <form method="POST" action="{{route ('respstore') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <div class="row">
        @foreach($questions as $question )
        
        <div class="col-lg-12 mt-2">

            @if($question->field_type == 'title')
                <h3>{{ $question->text_box }}</h3>
            @else
                <label> {{ $question->text_box }} </label>
            @endif 

            @if($question->field_type == 'text')
            <input name="quer[]" type="text" class="form-control">
            @elseif($question ->field_type == 'select')
            <select class="input-box" name="quer[]">
                <option value="Si" selected>Si</option>
                <option value="No" >No</option>
            </select>
            @elseif($question->field_type == 'checkbox')
            @php($opciones =explode(';', $question->checkboxes))
            @foreach($opciones as $opcion)
                <br>
                <input name= "opc[]" type="checkbox" value="{{ $opcion }}">{{ $opcion }} 
            @endforeach
            @endif

        </div>

        @endforeach

        @if($form->habeas_data==1)
        <div class="col-lg-12 mt-5">
        <p style="font-weight: bold; text-align:center">Informacion habeas data</p>
        <p>En cumplimiento con lo establecido en la Ley 1581 de 2012 sobre Protección de Datos Personales y su Decreto Reglamentario 1377 de 2013 
            la Universidad de Santander UDES, informa que garantiza la protección plena del derecho de Habeas Data a estudiantes, empleados, proveedores,
             usuarios y grupos de interés. Todos los datos suministrados por los usuarios voluntaria y libremente se encuentran incorporados en nuestras 
             bases de datos y tienen por finalidad ser usados y tratados por la Universidad de Santander para el correcto y natural ejercicio de sus
             actividades de formación, administrativas, financieras, ofrecimiento de nuevos servicios, así como de envío de boletines informativos físicos 
             y electrónicos. Se recuerda a los usuarios que podrán ejercitar los derechos a conocer, actualizar, rectificar y suprimir los datos personales
              que se encuentran en nuestros archivos, en cualquier momento y sin ningún costo, previa acreditación de su identidad. Para lo anterior pueden 
              contactarse personalmente o mediante comunicación escrita a la siguiente dirección, Calle 70 No 55 -210 Lagos del Cacique Oficina de Gestión 
              Documental en Bucaramanga o en cualquiera de nuestros campus en Cúcuta o Valledupar, a través del número telefónico 7-651 65 00 extensión 1653,
               a través del correo electrónico habeasdata@udes.edu.co o realizando el registro de PQRS en nuestro sitio web www.udes.edu.co</p>
        <input type="checkbox" name="habeas_data" id="habeas_data"> Confirmacion de politicas
        </div>
        @endif
        


            <div class="col-lg-12 mt-5">
                <input id="btnSubmit" type="submit" class="btn btn-success" value="Send"  @if($form->habeas_data==1) disabled @endif />
                <a href="{{ route('forms.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>

<script>

document.getElementById('habeas_data').addEventListener('click',function(){

let boton = document.getElementById('btnSubmit');
if(boton.hasAttribute('disabled'))
    boton.removeAttribute('disabled');
else
    boton.setAttribute('disabled', 'disabled');
});

</script>
@endsection

