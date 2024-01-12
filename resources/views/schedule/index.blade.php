<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste des créneaux </title>
</head>

<body>
    <h1>
        Liste des créneaux existants
    </h1>

    <br><br>

    <ul class="list-group">

        <br><br>
        @foreach ($schedules as $schedule)
        <li>{{$schedule->id}} {{$schedule->created_at}} {{$schedule->id_training}} {{$schedule->start_date}} {{$schedule->end_date}};
            <a class="btn btn-primary" href="{{route('modifier_un_creneau',  ['id' => $schedule->id])}}"> Modifier </a>
            <a class="btn btn-secondary" href="{{route('supprimer_un_creneau',  ['id' => $schedule->id])}}"> Supprimer </a>
        </li>
        @endforeach

    </ul>
    <div>

        <a class="btn btn-secondary" href="{{route('creer_un_creneau')}}"> Créer un nouveau créneau </a>

    </div>

</body>

</html>