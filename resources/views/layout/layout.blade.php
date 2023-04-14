<!DOCTYPE html>
<html language="en">
    <head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Job Portal </title>
	    <meta name="description" content="" />
	    <meta name="keywords" content="" />
        <meta name="author" content="Themesdesign" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">

		<!-- Magnificpopup Css -->
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css')}}">

	    <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/materialdesignicons.min.css')}}" />
        <!--Unicons Icon -->
        <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v2.1.6/css/unicons.css">

        <!--Font Awesome -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" />

		<!--Slider-->
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}"/> 
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}"/> 
        <link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}"/>

	    <!-- Custom  Css -->
	    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
	</head>
  <body>
  	@include('layout.header')
	  @include('flash-message')
  		@yield('content')
 
  	@include('layout.footer')
 
  	@stack('js')
  </body>
</html>