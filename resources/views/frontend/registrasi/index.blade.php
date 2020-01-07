<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Pendakian Gunung Arjuno - Welirang </title>

    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/styleregist.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <style type="text/css">
        .vertical-alignment-helper {
            display:table;
            height: 100%;
            width: 100%;
            padding: 0pc;
        }
        .vertical-align-center {
            /* To center vertically */
            display: table-cell;
            vertical-align: middle;
        }
        .modal-content {
            /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
            width:inherit;
            height:inherit;
            /* To center horizontally */
            margin: 0 auto;
        }
    </style>
</head>

<body>
<div id="myModal" class="modal fade vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" style="text-align:center; color: #1ab394; font-weight: 600">PEMBERITAHUAN</h2>
            </div>
            <div class="modal-body">
				<p style="text-align: justify;">Sehubungan dengan terjadinya cuaca yang tidak menentu di kawasan gunung Arjuno Welirang, maka pendakian sewaktu waktu dapat ditutup kembali. Pendaki dihimbau untuk tetap berhati-hati dan tetap waspada.</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-primary"> Lanjut </button>
            </div>
        </div>
    </div>
</div>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg" style="margin-top: 0">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header" style="padding: 15px 10px 0px 15px;">
                    <a href="{{ Route('frontend.cek_pendakian') }}" style="color: #aaa; font-size: 10pt;">Cek status pendakian anda disini</a>
                </div>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Tata Cara Pendaftaran</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="../index.php">Home</a>
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
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-arrow-down"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>1. PORTAL PENDAFTARAN ONLINE</h2>
                                    <p>sipenerang.tahuraradensoerjo.or.id</p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-arrow-down"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>2. SOP PENDAKIAN</h2>
                                    <p>Cermati SOP dan Peraturan Pendakian sebelum melakukan registrasi.</p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-arrow-down"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>3. PENGISIAN FORM</h2>
                                    <p>Lengkapi Form Ketua Regu, Kontak Darurat, Anggota, Perlengkapan, Logistik. Setelah submit form, sistem otomatis mengirim bukti registrasi berupa kode pendaftaran ke email pendaftar.</p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-arrow-down"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>4. CEK STATUS PENDAFTARAN</h2>
                                    <p>Setelah melakukan pendaftaran, cek kode pendaftaran melalui email atau halaman website booking online</p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-arrow-down"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <h2>5. VERIFIKASI DATA REGISTRASI</h2>
                                    <p> Setelah data disetujui oleh admin, ketua kelompok akan menerima sms dan email berisi Berkas Perizinan. <span style="color: red"> Verifikasi data registrasi dilakukan pada hari Senin - Jumat, 07.00 - 15.30 WIB.</span> </p>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-arrow-down"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <h2>6. CETAK LAMPIRAN</h2>
                                    <p>Cek email atau masukkan kode pendaftaran di menu cek pendakian untuk mengunduh Berkas Perizinan. Berkas tersebut wajib dicetak dan diserahkan ke petugas pos pendakian.</p>
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
    <script src="{{ asset('public/frontend/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('public/frontend/js/inspinia.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/pace/pace.min.js') }}"></script>

    <!-- Steps -->
    <script src="{{ asset('public/frontend/js/plugins/staps/jquery.steps.min.js') }}"></script>

    <!-- Jquery Validate -->
    <script src="{{ asset('public/frontend/js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- Input Mask-->
    <script src="{{ asset('public/frontend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

    <!-- Data picker -->
    <script src="{{ asset('public/frontend/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('public/frontend/js/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
    	$(document).ready(function(){
    		$("#myModal").modal('show');
    	});
    </script>

</body>

</html>
