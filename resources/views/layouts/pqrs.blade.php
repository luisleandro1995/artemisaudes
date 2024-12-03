@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de PQRS con Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Radicar PQRSD</h2>
        <form action="guardar_pqr.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tipo">Tipo de solicitud:</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="Peticion">Petición</option>
                    <option value="Queja">Queja</option>
                    <option value="Reclamo">Reclamo</option>
                    <option value="Sugerencia">Sugerencia</option>
                    <option value="Denuncia">Denuncia</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="radicado" name="radicado">
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento</label>
                <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                    <option value="C.C.">Cédula de ciudadnía</option>
                    <option value="Nit">Nit</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="T.I">Tarjeta de identidad</option>
                    <option value="C.E.">Cédula de extranjería</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_identificacion">Número de Identificación</label>
                <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="nombre">Telefóno:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="mensaje">Adjuntar archivo:</label>
                <input type="file" class="form-control" id="adjunto" name="adjunto" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar PQRS</button>
        </form>
    </div>

    <!-- Bootstrap JS y jQuery (opcional, para algunas funcionalidades de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection