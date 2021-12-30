<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Lastimosamente el curso <span class="font-bold ">{{ $course->title }}</span> 
        fue rechazado </h1>
    <h1>Observaciones: </h1>
    {!! $course->observation->body !!}
</body>
</html>