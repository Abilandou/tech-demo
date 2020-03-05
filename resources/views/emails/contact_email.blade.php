<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Message</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
       <p>This is a contact message from TechRepublic official website</p>

       <h5>Contact Iformation</h5>
       <p><b> Name:</b>{{$user_name}} </p>
       <p><b>Email:</b>{{$user_email}} </p>
       <p><b>Telephone:</b>{{$telephone}} </p>
       <p><b>Subject:</b>{{$subject}} </p>
       <p><b>Messsage</b> {{$user_message }}</p>
    </div>
    <p><h5><a href="{{url('admin/login')}}">LOGIN</a> To see details of this contact</h5></p>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>

