<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Country</title>
</head>

<body>
    <div class="container">
        <h1>Edit Country</h1>
        <form method="POST" action="{{ route('paises.update', ['pais' => $pais->pais_codi]) }}">
            @method('put')
            @csrf
            <div class=" mb-3">
                <label for="codigo" class="form-label">Code</label>
                <input type="text" class="form-control" id="codigo" aria-describedby="codigoHelp" name="id" disabled>
                <div id="codigoHelp" class="form-text">Country Id</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Country</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Country name"
                    value="{{ $pais->pais_nomb }}">
            </div>

            <label for="capital">Capital:</label>
            <select class="form-select" id="capital" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($capitales as $capital)
                    @if ($capital->muni_codi == $pais->pais_capi)
                        <option value="{{ $capital->muni_codi }}" selected>{{ $capital->muni_nomb }}</option>
                    @else
                        <option value="{{ $capital->muni_codi }}">{{ $capital->muni_nomb }}</option>
                    @endif
                @endforeach
            </select>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
