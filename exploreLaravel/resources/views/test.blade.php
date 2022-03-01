<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>
<body>
    {{-- displaying multiple data --}}
    <ul>
        @foreach($posts as $post)
        <li>{{$post->id}}</li>
        <li>{{$post->title}}</li>
        <li>{{$post->body}}</li>
        @endforeach
    </ul>

{{-- Displaying a single data --}}
{{--
    <ul>
    <li>{{$post->id}}</li>
    <li>{{$post->title}}</li>
    <li>{{$post->body}}</li>
    </ul>
--}}

</body>
</html>