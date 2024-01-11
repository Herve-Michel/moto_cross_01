<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if($currentUser->image)
    <img src="{{url($currentUser->image)}}" />
    @endif

    {{$errors}}
    <form action="{{route('compresser_image')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="userId" value="{{$id}}" />
        <br><br><br>
        <label for="image"> Une image ? </label>
        <input type="file" name="image" id="image">
        <br><br>

        <br><br><br><br>
        <button type="submit"> Accepter l'image </button>
    </form>
</body>

</html>