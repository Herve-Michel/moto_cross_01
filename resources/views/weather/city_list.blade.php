<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Liste de villes trouvées
    </h1>

    @if(empty($cities['cities']))
    <p>Aucune ville trouvée !</p>
    @endif
    <p>
        <a href={{route('weather.city_search')}}> Retour Ville ?</a>
    </p>
    <div>
        @foreach ($cities['cities'] as $city)
        <p> Ville : {{$city['name']}}</p>
        <form method="POST" action="{{route('weather.index')}}">
            @csrf
            <input type="hidden" name="insee" value="{{$city['insee']}}" />

            <button> sélectionner cette ville</button>
        </form>
        @endforeach
    </div>

</body>

</html>