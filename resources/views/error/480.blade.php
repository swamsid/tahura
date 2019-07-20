<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>480 Error</title>

    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="text-center animated fadeInDown">
        <div class="row">
            <h1>Error 480</h1>
        </div>

        <div class="row">
            <h3 class="font-bold">Akses Ditolak</h3>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="error-desc">
                    Mohon Maaf. Sepertinya anda tidak memiliki akses untuk membuka halaman yang anda inginkan. Apabila anda merasa punya akses di halaman tersebut, Silahkan laporkan masalah ini kepada admin 
                    <form class="form-inline m-t" role="form">
                        <a href="{{ Route('wpadmin.dashboard') }}" class="btn btn-primary">Kembali ke halaman utama</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('backend/js/jquery-2.1.1.js')}} "></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}} "></script>

</body>

</html>
