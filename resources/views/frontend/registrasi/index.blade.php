<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Pendakian </title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/styleregist.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg" style="margin-top: 0">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Nomor Registrasi ..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Tata Cara Pendaftaran</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <strong>Tata Cara Pendaftaran</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-lg-12 kotak">
                <div class="ibox float-e-margins">
                    <div class="ibox-content" id="ibox-content">

                        <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>PORTAL PENDAFTARAN ONLINE</h2>
                                    <p>http://radensoerjo-sipenerang.or.id
                                    </p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>SOP PENDAKIAN</h2>
                                    <p>Cermati SOP Pendakian sebelum melakakukan pendaftaran.</p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>PENGISIAN FORM</h2>
                                    <p>Lengkapi Form Ketua Regu, Kontak Darurat, Anggota, Perlengkapan, Logistik</p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon yellow-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>CEK STATUS PENDAFTARAN</h2>
                                    <p>Setelah Melakukan Pendaftaran, Cek Status Pendaftaran Pendakian Melalui Email tau Halaman Website Pendaftaran Online </p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>CETAK LAMPIRAN</h2>
                                    <p>Cek Email atau Search Pada Halaman Website. Kemudian Cetak Bukti Pendaftaran dan Daftar Perlengkapan untuk Dibawa Ke Lokasi Pendakian</p>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary tengah"><a href="{{ Route('frontend.registrasi.sop') }}">Selanjutnya</a></button>

                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('frontend/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('frontend/js/inspinia.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/pace/pace.min.js') }}"></script>

    <!-- Steps -->
    <script src="{{ asset('frontend/js/plugins/staps/jquery.steps.min.js') }}"></script>

    <!-- Jquery Validate -->
    <script src="{{ asset('frontend/js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- Input Mask-->
    <script src="{{ asset('frontend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

    <!-- Data picker -->
    <script src="{{ asset('frontend/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('frontend/js/plugins/iCheck/icheck.min.js') }}"></script>

</body>

</html>
