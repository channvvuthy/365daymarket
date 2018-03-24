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
<form action="{{route('create-post')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{Session::token()}}">
    <p><input type="text" name="sub_category_name" id="" placeholder="sub category name"></p>
    <p><input type="text" name="name" id="" placeholder="product name"></p>
    <input type="hidden" name="user_id" value="10">
    <p><input type="text" name="price" id="" placeholder="product price"></p>
    <p><input type="text" name="description" id="" placeholder="product description"></p>
    <p><input type="file" name="image[]" id="" multiple></p>
    <p><input type="text" name="username" id="" placeholder="name"></p>
    <p><input type="text" name="phone" id="" placeholder="phone"></p>
    <p><input type="text" name="tel" id="" placeholder="tel"></p>
    <p><input type="text" name="email" id="" placeholder="email"></p>
    <p><input type="text" name="location_name" id="" placeholder="city/province"></p>
    <p><input type="text" name="address" id="" placeholder="location details"></p>
    <p><input type="submit" name="submit" id="" value="Submit"></p>
</form>
</body>
</html>
