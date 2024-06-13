<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/')}}frontend_assets/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}frontend_assets/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/')}}frontend_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend_assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend_assets/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   @include('frontend.common.header') 
    
    @yield('content')
    
    @include('frontend.common.footer')

    @if (Session::has('notification'))
        <script>
          swal("notification" , "{{Session::get('notification')}}" , 'success'){
            button:true,
            button:"ok",
          }
        </script>
    @endif
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    
    <!-- jQuery sticky menu -->
    <script src="{{asset('/')}}frontend_assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('/')}}frontend_assets/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="{{asset('/')}}frontend_assets/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="{{asset('/')}}frontend_assets/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="{{asset('/')}}frontend_assets/js/bxslider.min.js"></script>
	<script type="text/javascript" src="{{asset('/')}}frontend_assets/js/script.slider.js"></script>
  </body>
</html>