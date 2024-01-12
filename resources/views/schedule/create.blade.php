<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Création d'un nouveau créneau
    </h1>
    {{$errors}}

    <form action="{{route('enregistrer_un_creneau')}}" method="POST">
        @csrf
        <br><br>
        <label for="id_training"> N° du circuit ?</label>
        <select name="id_training" id="id_training">
            <option value="">Choisir un circuit</option>
            @foreach ($circuits as $circuit)
            <option value="{{$circuit->id}}">{{$circuit->id}}</option> ;
            @endforeach
        </select>
        <br><br>
        <label for="start_date"> Heure d'ouverture ?</label>
        <input type="datetime-local" name="start_date" id="start_date">
        <br><br>
        <label for="end_date"> Heure de fermeture ?</label>
        <input type="datetime-local" name="end_date" id="end_date">
        <br><br>
        <button type="submit"> Enregistrer le créneau créé </button>
    </form>
</body>

</html>