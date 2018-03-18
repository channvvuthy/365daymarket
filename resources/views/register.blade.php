<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('signup')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{Session::token()}}">
    <br>
    <input type="text" name="first_name" id="">
    <br>
    <input type="text" name="last_name" id="">
    <br>
    <input type="email" name="email" id="">
    <br>
    <input type="password" name="password" id="">
    <br>
    <input type="text" name="location">
    <br>
    <input type="text" name="phone">
    <br>
    <input type="file" name="image" id="">
    <br>
    <input type="submit" value="Register">
</form>
</body>
</html>