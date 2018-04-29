<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Email</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <div class="title" style="border:1px solid #CCCCCC;padding:5px;">
            <p>365daymarket.com</p>
        </div>
        <div class="content">
            <p>Dear {{$userName}},</p>
            <p>To reset your password, click on the link below</p>
            <p><a href="{{URL::to('/')}}/update_password?email={{$email}}&token={{$register_key}}">{{URL::to('/')}}/update_password?email={{$email}}&key={{$register_key}}</a></p>
        </div>
    </div>
</body>
</html>