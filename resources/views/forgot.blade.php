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
<form action="{{route('recover')}}" method="get" enctype="multipart/form-data">
    <p><input type="email" name="email" placeholder="email"></p>
    <p><input type="submit" value="Reset"></p>

</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Vuthy
 * Date: 3/18/2018
 * Time: 10:16 AM
 */
