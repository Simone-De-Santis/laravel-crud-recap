<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Trashed</h1>

    @foreach($movies as $movie)
    <a href="{{route('movies.show', $movie->id)}}">
        <h2>{{ $movie->title }}</h2>


        <form method="POST" action="{{ route('movies.delete', $movie->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Cancella definitivamente</button>
        </form>

        <form method="POST" action="{{ route('movies.restore', $movie->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit">Ripristina</button>
        </form>


    </a>
    @endforeach
</body>

</html>