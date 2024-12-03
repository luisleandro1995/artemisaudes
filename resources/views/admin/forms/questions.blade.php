@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>{{$form->name }}</h3>
    <br>
    <form method="POST" action="{{ route('questionstore', $form->id) }}">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">

        <div class="form-wrapper">
            <h2 style="text-align: center;">Bienvenido, adelante podrás crear tu nuevo formulario</h2>
            <br>

            <!-- Default 'Caja de texto' element -->
            <div id="formElements">
            </div>

            <!-- Green '+' button to add another element -->
            <div class="add-element-btn" id="addElementBtn">
                <i class="fas fa-plus"></i> Agregar otro elemento
            </div>

            <!-- Menu dividido en dos partes -->
            <div class="add-element-menu" id="elementMenu">
                <div class="menu-left">
                    <div class="menu-option">
                        <button class="btn btn-light" id="selectTextBox">Caja de texto</button>
                    </div>
                    <div class="menu-option">
                        <button class="btn btn-light" id="titulo">Titulo</button>
                    </div>
<div class="menu-option">
                            <button class="btn btn-light" id="selectHabeasData">Habeas Data</button>
                        </div>
                </div>
                <div class="menu-right" id="responseOptions">
                    <div class="menu-option">
                        <button class="btn btn-light" id="responseText">Caja de texto</button>
                    </div>
                    <div class="menu-option">
                        <button class="btn btn-light" id="responseMultipleChoice">Selección múltiple</button>
                    </div>
                    <div class="menu-option">
                        <button class="btn btn-light" id="responseCheckbox">Check boxes</button>
                    </div>
                </div>
            </div>

            <!-- Confirmation buttons for creating or deleting the form -->
            <div class="centered-buttons">
                <button type="submit" class="btn btn-success">Crear formulario</button>
                <button id="borrarForm" class="btn btn-danger">Borrar formulario</button>
                <a href="{{ route('forms.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>

</div>

@endsection
