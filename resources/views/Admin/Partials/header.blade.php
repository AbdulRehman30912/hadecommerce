<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/datatables.min.css')}}" />
    <!-- SCRIPT -->
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/datatables.min.js')}}"></script>

</head>

<body>

    <div class="heading" style="background: linear-gradient(45deg,#36d1dc ,#5b86e5); height: 100px;  box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;">

        <img src="{{asset('storage/logo/logo2.png')}}" style=" height: 120px;
    margin-left: 490px; margin-top: -7px;">
        <font face="Comic sans MS" size="5" style="font-size: 30px;
    font-weight: 700; color:white;">Had's Store</font>

    </div>
</body>

</html>
@yield('design')