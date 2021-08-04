<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">    
</head>
<body style="background-color:rgb(175, 171, 175)">
    @include('web-layout.header')
<div class="container-fluid">
    @yield('main-section') 
</div>
    @include('web-layout.footer')
</body>
    <style>
    .navbar-nav li{
        padding-left: 1rem;
        padding-right: 2rem;       
    } 
    a:hover, a:visited, a:link, a:active
  {
      text-decoration: none;
  }
 a:hover{
     color:coral;
 }
 a{
     color:black;
 }
    </style>
</html>