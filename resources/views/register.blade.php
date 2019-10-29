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
    <p><input type="text" name="first_name"  placeholder="first_name"></p>

    <p>  <input type="text" name="last_name"  placeholder="last_name"></p>
    <p><input type="email" name="email" placeholder="email"></p>
    <p> <input type="password" name="password"  placeholder="password"></p>
    <p><input type="text" name="location" placeholder="location"></p>
    <p><input type="text" name="phone" placeholder="phone"></p>

    <p><input type="file" name="image" id=""></p>
    <p><input type="submit" value="Register"></p>

</form>
</body>
</html>
