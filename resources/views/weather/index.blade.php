<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Weather forecast at {{$weather['city']['name']}} for the next few days :
    </h1>

    <p>
        <a href={{route('weather.city_search')}}> Autre ville ? </a>
    </p>

    <div>
        @foreach ($weather['forecast'] as $day)
        <p> On {{date_format(date_create($day['datetime']), 'l d F Y')}} , min temp. : {{ $day["tmin"]}} °C and max temp. : {{ $day["tmax"]}} °C </p>
        @endforeach
    </div>
</body>

</html>