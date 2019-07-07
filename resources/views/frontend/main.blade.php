<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPT Tahura Raden Soerjo</title>

	@include('frontend._partials._head')
		@yield('extra_style')

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

	@yield('nav')

	@yield('content')

	@include('frontend._partials._footer')

	@yield('modal')

    @include('frontend._partials._script')
    	@yield('extra_script')

</body>

</html>
