<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>INSPINIA | Dashboard</title>

    @include('backend._partials._head')
        @yield('extra_style')

</head>

<body>
    <div id="wrapper">
        
        	@include('backend._partials._sidebar')

        <div id="page-wrapper" class="gray-bg dashbard-1">
        	@include('backend._partials._nav')
            
            @yield('content')
        </div>
    </div>

    @include('backend._partials._script')
        @yield('extra_script')
</body>

</html>
