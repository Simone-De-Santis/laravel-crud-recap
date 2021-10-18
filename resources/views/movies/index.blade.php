<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="{{ route('movies.trash') }}">Trash can</a>

    @foreach($movies as $movie)
        <a href="{{route('movies.show', $movie->id)}}"><h2>{{ $movie->title }}</h2></a>
    @endforeach
    <a href="{{route('movies.create')}}">Crea nuovo film</a>
</body>
</html>