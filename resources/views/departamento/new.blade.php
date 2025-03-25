<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Departamento</title>
</head>

<body>
    <div class="container">
        <h1>Add departamento</h1>
        <form method="POST" action="{{ route('departamentos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Code</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" neme="id" disabled>
                <div id="idHelp" class="form-text">Departamento Code</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Departamento</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name"
                    placeholder="Departamento name.">
            </div>

            <label for="country">Pais</label>
            <select class="form-select" id="country" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('comunas.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
