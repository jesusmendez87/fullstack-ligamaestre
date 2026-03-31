<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($club) ? 'Editar Club' : 'Crear Club' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1 class="text-primary text-center">{{ isset($club) ? 'Editar Club' : 'Crear Club' }}</h1>

@php $editando = isset($club); @endphp

<form class="p-3 border rounded m-3" action="{{ $editando ? route('clubes.update', $club->id) : route('clubes.store') }}" method="POST">
    @csrf
    @if($editando)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $club->nombre ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="ciudad" class="form-label">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{ old('ciudad', $club->ciudad ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría:</label>
        <input type="text" id="categoria" name="categoria" class="form-control" value="{{ old('categoria', $club->categoria ?? '') }}">
    </div>

    <button type="submit" class="btn btn-primary">{{ $editando ? 'Actualizar Club' : 'Crear Club' }}</button>
</form>

@if($editando)
<form method="POST" action="{{ route('clubes.destroy', $club->id) }}" onsubmit="return confirm('¿Eliminar este club?');" class="m-3">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Eliminar Club</button>
</form>
@endif

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
 ></script>
</body>
</html>
