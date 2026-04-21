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
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $club->name ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">Ciudad:</label>
        <input type="text" id="city" name="city" class="form-control" value="{{ old('city', $club->city ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Categoría:</label>
        <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $club->category ?? '') }}">
    </div>


        <div class="mb-3">
        <label for="sport" class="form-label">Deporte:</label>
        <input type="text" id="sport" name="sport" class="form-control" value="{{ old('sport', $club->sport ?? '') }}">
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
