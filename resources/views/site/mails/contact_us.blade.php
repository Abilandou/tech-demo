
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
    <h3 style="margin:auto; padding-top:20px; color: white;">Contact</h3>
</div>
<div style="
    margin-top:15px;
    margin-right:15px;
    margin-left:15px;
    margin-bottom:15px;
">
   
    <br>
    <br><p>Recent Contact</p>
    <br>
       <table style="margin-left:5rem;">
           <tr>
               <td>
                   Name: {{ $name }}
               </td>
           </tr>
           <tr>
            <td>
                Email: {{ $email }}
            </td>
            <tr>
                <td>
                    Phone: {{ $phone }}
                </td>
            </tr>
            <tr>
                <td>
                    Subject: {{ $subject }}
                </td>
            </tr>
            {{-- <tr>
                <td>
                    Message:  {{ $message }}
                </td>
            </tr> --}}
       </table>
   
</div>

</div>

</body>
</html>