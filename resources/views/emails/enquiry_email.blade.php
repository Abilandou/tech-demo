<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enquiry Message</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
       <p>This message is from TechRepublic official website concerning an enquiry made on item: {{ $item_name}}</p>

       <h5>Clients Iformation</h5>
       <p><b>Clients Name:</b>{{$user_name}} </p>
       <p><b>Clients Email:</b>{{$user_email}} </p>
       <p><b>Clients Telephone:</b>{{$telephone}} </p>
       <p><b>Clients Messsage</b> {{$user_message }}</p>
    </div>
    <p><h5><a href="{{url('admin/login')}}">LOGIN</a> To see details of this enquiry</h5></p>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>

