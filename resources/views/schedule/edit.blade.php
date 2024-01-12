<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>
        Modifier un créneau existant
    </h1>
    <form action="{{route('mettre_a_jour_un_creneau_modifie', ['id' => $schedule->id])}}" method="POST">
        @csrf
        <br><br><br>

        <label for="id_training"> N° du circuit ?</label>
        <input type="number" name="id_training" id="id_training" value="{{$schedule->id_training}}">
        <br><br>
        <label for="start_date"> Heure d'ouverture ?</label>
        <input type="date" name="start_date" id="start_date" value="{{$schedule->start_date}}">
        <br><br>
        <label for=" end_date"> Heure de fermeture ?</label>
        <input type="date" name="end_date" id="end_date" value="{{$schedule->end_date}}">
        <br><br>

        <br><br>
        <button type=" submit"> Enregister les modifications </button>
    </form>



</body>

</html>