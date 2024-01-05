<!--      partie supprimée quand on  a rajouté main.blade.php 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

    <p>
        demo <br><br>
        {{  json_encode($trainings)  }}
    </p>

    <br><br>
    @foreach ($trainings as $training)
    <p>{{$training->name}} </p>
    @endforeach

</body>

</html>
-->



@extends('layouts.main')

@section('content')

<ul class="list-group">

    <br><br>
    @foreach ($trainings as $training)
    <li class="list-group-item">{{$training->name}};
        @if ($training->type == 'adulte')
        Adulte
        @else
        Enfant
        @endif
        <a class="btn btn-primary" href="{{route('training.edit',  ['id' => $training->id])}}">Modify</a>
        <a class="btn btn-secondary" href="{{route('training.erase',  ['id' => $training->id])}}">Suppress</a>
    </li>
    @endforeach

</ul>

@endsection