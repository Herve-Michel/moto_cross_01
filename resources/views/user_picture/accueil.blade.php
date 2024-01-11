<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <p>
        Liste des utilisateurs inscrits
    </p>

    <br><br>

    @foreach ($users as $user)
    <p>{{$user->id}} {{$user->name}}{{$user->image}} {{$user->email}} {{$user->role}} <a href="{{route('ajout_dune_image', ['id' => $user->id])}}"> Modifier </a></p>
    @endforeach

</body>

</html>