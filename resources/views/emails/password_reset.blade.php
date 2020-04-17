<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset For TechRepublic Official  Account</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        Hello {{$user_name}} Please.
        <br>
        <p>Click On The Link Below To Reset Your Password</p>
        <br>
            <a href="{{ url('reset/password/form/'.$token) }}">RESET PASSWORD</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>

