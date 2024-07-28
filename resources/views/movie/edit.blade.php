<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Sửa phim: {{ $movie->title }}</h1>
            <a href="{{ route('movies.index') }}" class="btn btn-danger">Quay lại</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('movies.update', $movie) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Poster</label>
                <input type="file" class="form-control" name="poster">
                <img src="{{ Storage::url($movie->poster) }}" width="50px">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">intro</label>
                <input type="text" class="form-control" name="intro" value="{{ $movie->intro }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Release_date</label>
                <input type="date" class="form-control" name="release_date" value="{{ $movie->release_date }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Genres</label>
                <select class="form-select form-select-small" name="genre_id">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected($genre->id == $movie->genre_id)>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
