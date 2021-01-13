
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Category</title>
	<link rel="icon" href="{{asset('fontend/img/Fevicon.png')}}" type="image/png">
  <link rel="stylesheet" href="{{asset('fontend/vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('fontend/vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('fontend/vendors/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('fontend/vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('fontend/vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('fontend/vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('fontend/vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('fontend/vendors/nouislider/nouislider.min.css')}}">

  <link rel="stylesheet" href="{{asset('fontend/css/style.css')}}">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  @include('fontend.components.header')
	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
  @include('fontend.components.banner')
	<!-- ================ end banner area ================= -->

  @yield('content')
	
  <!--================ Start  footer Area  =================-->	
    @include('fontend.components.footer')
	<!--================ End footer Area  =================-->



  <script src="{{asset('fontend/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/skrollr.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/nouislider/nouislider.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('fontend/vendors/mail-script.js')}}"></script>
  <script src="{{asset('fontend/js/main.js')}}"></script>
</body>
</html>