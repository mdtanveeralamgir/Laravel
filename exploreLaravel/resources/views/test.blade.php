<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test purpose</title>
</head>
<body>
    var_dump($results);
    <ul>
    @foreach($results as $result)
    
    <li>$result->title</li>
    <li>$result->body</li>
    @endforeach
    </ul>
</body>
</html>