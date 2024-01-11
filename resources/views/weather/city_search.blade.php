<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>
        Rechercher une ville
    </h1>

    <form action="{{route('weather.city_list')}}" method="POST">
        @csrf
        <br><br><br>
        <label for="name">Nom de la ville ?</label>
        <input type="text" name="name" id="name">

        <br><br>
        <button>Rechercher ...</button>
    </form>
</body>

</html>