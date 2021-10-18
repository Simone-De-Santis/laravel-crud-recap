<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method='POST' action="{{ route('movies.store') }}">
        @csrf
        <label for="title">Title</label>
        <input type="text" name='title' id='title'>
        <br>
        <label for="genres">Genre</label>
        <input type="text" name='genres' id='genres'>
        <br>
        <label for="posterpath">URL</label>
        <input type="text" name='posterpath' id='posterpath'>
        <br>
        <label for="overview">Descrizione</label>
        <textarea name="overview" id="overview" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">Invia</button>
    </form>
</body>
</html>