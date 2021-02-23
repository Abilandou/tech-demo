
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <style>

    </style>
</head>
<body>

<div style="
    border:1px solid grey;
    margin:auto;
    margin-top: 15px;
    justify-content: center;
    text-align: center;
    align-items: center;
">
<div style="
    margin-top:15px;
    margin-right:15px;
    margin-left:15px;
    margin-bottom:15px;
    background-color: #2a9df4;
    height: 60px;
">
    <h3 style="margin:auto; padding-top:20px; color: white;">Password Reset On <b>TechRepublic</b></h3>
</div>
<div style="
    margin-top:15px;
    margin-right:15px;
    margin-left:15px;
    margin-bottom:15px;
">
    Hi <b style="color:blue; font-size:16px">{{ $username }}</b>,
    <br>
    <br><p>You Requested For a password reset on <b><a href="{{ route('home.page') }}">TechRepublic</a></b></p>
    <br>
        <p>Click on the Button Below to reset your password</p>
    <br>
    <br>
    <br>
    <a href="{{ url('admin/password/reset/form/'.$token)}}">
        <button 
            style="
                height: 60px; 
                width:200px; color:white; 
                background-color:#2a9df4; 
                border-radius:10px; 
                font-size:18px; 
                font-weight: bold;
                cursor: pointer;
            ">
            Reset My Password
        </button>
    </a>
</div>

</div>

</body>
</html>