<?php 
   include 'resources/views/config.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Pendakian </title>

    <link href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/bootstrap-vue.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/iCheck/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/steps/jquery.steps.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/styleregist.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/jasny/jasny-bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/iCheck/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.css')); ?>">

    <style type="text/css">
        /* select 2 custom element */
            .select2-container .select2-selection--single{
                border-radius: 0px;
                border: 1px solid #ddd;
                height: 30px;
                font-weight: normal;
                color: #666;
                outline: none;
                font-size: 9pt;
            }

            .hint{
                cursor: pointer;
            }

            .select2-dropdown{
                border: 1px solid #ddd;
                font-size: 9pt;
            }

            .table-mini{
                
            }

            .table-mini th, .table-mini td{
                border: 1px solid #fff;
            }

            .table-mini th{
                text-align: center;
                padding: 10px;
            },

            .table-mini td{
                padding: 0px;
            }

            .error{
                /*background: rgba(255,0,0,0.1);*/
            }
     </style>
</head>

<body>
    <div id="page-wrapper" class="gray-bg" style="margin-top: -5px;">    
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header" style="padding: 15px 10px 0px 15px;">
                    <a href="<?php echo e(Route('frontend.cek_pendakian')); ?>" style="color: #aaa; font-size: 10pt;">Cek status pendakian anda disini</a>
                </div>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Registrasi Pendakian</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo e(Route('frontend.registrasi')); ?>">Tata Cara Pendaftaran</a>
                    </li>
                    <li>
                        <a href="<?php echo e(Route('frontend.registrasi.sop')); ?>">SOP Pendakian</a>
                    </li>
                    <li class="active">
                        <strong>Registrasi Pendakian</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

         <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12 kotak" style="padding-top: 20px !important">
                    <div class="ibox float-e-margins" style="margin-bottom: 0px">
                        <div class="ibox-title">
                            <?php
                                $total_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_status = 'sudah naik' "));
                                $total = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_status = 'sudah naik' "));
                                $tot = $total_anggota+$total;
                            ?>
                            <h5 style="font-size: 13px">Pendaki Naik Pada <?php echo date('j/m/Y').' </span><span style="color:white; background-color:#1AB394; padding:6px 12px; border-radius:5px; ">'.$tot?></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link" aria-expanded="false">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff; font-size: 14px; overflow: auto;">
                            <div class="row dashboard-header" style="width: 1080px; padding: 0px 20px">

            <div class="col-xs-2" style="padding: 5px">
                <div class="ibox float-e-margins mbox" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #1AB394">Pos Tretes</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #1AB394; font-weight: 400">
                            <?php
                                $tretes_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tretes_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tretes_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tretes_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tretes_dash_wni+$tretes_dash_wna+$tretes_dash_anggota_wni+$tretes_dash_anggota_wna;
                            ?>
                        Orang</h1>
                    </div>
                </div>
            </div>

            <div class="col-xs-2" style="padding: 5px">
                <div class="ibox float-e-margins mbox" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #1AB394">Pos Sumberbrantas</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #1AB394; font-weight: 400">
                            <?php
                                $sumber_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $sumber_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $sumber_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $sumber_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $sumber_dash_wni+$sumber_dash_wna+$sumber_dash_anggota_wni+$sumber_dash_anggota_wna;
                            ?>
                        Orang</h1>
                    </div>
                </div>
            </div>
        
            <div class="col-xs-2" style="padding: 5px">
                <div class="ibox float-e-margins mbox" style="margin-bottom: 0px;">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #1AB394">Pos Tambaksari</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #1AB394; font-weight: 400">
                            <?php
                                $tambak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tambak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tambak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tambak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tambak_dash_wni+$tambak_dash_wna+$tambak_dash_anggota_wni+$tambak_dash_anggota_wna;
                            ?>
                        Orang</h1>
                    </div>
                </div>
            </div>

            <div class="col-xs-2" style="padding: 5px">
                <div class="ibox float-e-margins mbox" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #1AB394">Pos Lawang</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #1AB394; font-weight: 400">
                            <?php
                                $lawang_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lawang_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lawang_dash_wni= mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lawang_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lawang_dash_wni+$lawang_dash_wna+$lawang_dash_anggota_wni+$lawang_dash_anggota_wna;
                            ?>
                        Orang</h1>
                    </div>
                </div>
            </div>

            <div class="col-xs-2" style="padding: 5px">
                <div class="ibox float-e-margins mbox" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #1AB394">Gunung Pundak</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #1AB394; font-weight: 400">
                            <?php
                                $pundak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $pundak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $pundak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $pundak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $pundak_dash_wni+$pundak_dash_wna+$pundak_dash_anggota_wni+$pundak_dash_anggota_wna;
                            ?>
                        Orang</h1>
                    </div>
                </div>
            </div>
          
            <div class="col-xs-2" style="padding: 5px">
                <div class="ibox float-e-margins mbox" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #1AB394">Lelaku</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #1AB394; font-weight: 400">
                            <?php
                                $lelaku_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lelaku_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lelaku_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lelaku_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lelaku_dash_wni+$lelaku_dash_wna+$lelaku_dash_anggota_wni+$lelaku_dash_anggota_wna;
                            ?>
                        Orang</h1>
                    </div>
                </div>
            </div>
        
                        </div>
                    </div>
                </div>
            </div>
            </div> 
        </div> 

        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12 kotak" style="padding-top: 20px !important">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="font-size: 18px">Diisi Oleh Ketua Rombongan</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff; font-size: 14px">
                            <template v-if="!downloadingResource">
                                <form id="form-data" class="wizard-big" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" readonly value="<?php echo e(csrf_token()); ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 style="color: #1ab394">
                                                Informasi Ketua Regu &nbsp;
                                                <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan biodata ketua regu"></i>
                                            </h3>
                                        </div>

                                        <div class="col-md-12" style="background: #eee; margin-top: 10px; padding-top: 10px;">
                                            <fieldset style="font-size: 9pt;">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Nama Ketua</label>
                                                            <input id="nama_ketua" name="nama_ketua" type="text" :class="$v.single.nama_ketua.$invalid ? 'form-control error' : 'form-control'" placeholder="Nama ketua regu" v-model="single.nama_ketua">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>No Identitas (KTP, Kartu Pelajar, Passport)</label>

                                                            <vue-mask :class="$v.single.no_ktp_ketua.$invalid ? 'form-control error' : 'form-control'" :placeholder="'____.____.____.____'" :name="'no_ktp_ketua'" :id="'no_ktp_ketua'" :mask="'0000.0000.0000.0000'" :css="'text-align: left;'" v-model="single.no_ktp_ketua"></vue-mask>

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input id="tempat_lahir_ketua" name="tempat_lahir_ketua" type="text" :class="$v.single.tempat_lahir_ketua.$invalid ? 'form-control error' : 'form-control'" placeholder="Tempat lahir ketua regu" v-model="single.tempat_lahir_ketua">
                                                        </div>

                                                        <div class="form-group" id="data_1">
                                                            <label>Tanggal Lahir</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>

                                                                <vue-mask :class="$v.single.tgl_lahir_ketua.$invalid ? 'form-control error' : 'form-control'" :placeholder="'__/__/____'" :name="'tgl_lahir_ketua'" :id="'tgl_lahir_ketua'" :mask="'00/00/0000'" :css="'text-align: left;'" v-model="single.tgl_lahir_ketua"></vue-mask>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>No Telepon</label>

                                                            <vue-mask :class="$v.single.no_hp_ketua.$invalid ? 'form-control error' : 'form-control'" :placeholder="'____-____-_____'" :name="'no_hp_ketua'" :id="'no_hp_ketua'" :mask="'0000-0000-00000'" :css="'text-align: left;'" v-model="single.no_hp_ketua"></vue-mask>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input id="email_ketua" name="email_ketua" type="email" :class=" $v.single.email_ketua.$invalid ? 'form-control error' : 'form-control'" placeholder="Email ketua regu" v-model="single.email_ketua">
                                                        </div>

                                                        <div class="form-group" id="data_1">
                                                            <label>Tanggal Naik</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <vue-datepicker :name="'tgl_naik'" :id="'tgl_naik'" :class="$v.single.tgl_naik.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Pilih Tanggal Naik'" :readonly="true" v-model="single.tgl_naik"></vue-datepicker>
                                                            </div>
                                                        </div>

                                                        <div class="form-group" id="data_1">
                                                            <label>Tanggal Turun</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <vue-datepicker :name="'tgl_turun'" :id="'tgl_turun'" :class="$v.single.tgl_turun.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Pilih Tanggal Turun'" :readonly="true" v-model="single.tgl_turun"></vue-datepicker>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label>Alamat Lengkap</label>
                                                            <textarea rows="1" :class="$v.single.alamat_ketua.$invalid ? 'form-control error' : 'form-control'" style="resize: none;" placeholder="Alamat ketua regu" name="alamat_ketua" v-model="single.alamat_ketua"> </textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Provinsi</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-check fa-fw" v-if="!provinsiSearch"></i><i class="fa fa-hourglass fa-dw" v-if="provinsiSearch" style="font-size: 8pt;"></i>
                                                                </span>
                                                                <vue-select :name="'provinsi_ketua'" :id="'provinsi_ketua'" :options="provinsi_ketua" :search="true" @option-change="provinsiChange"></vue-select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Kabupaten / Kota</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-check fa-fw" v-if="!kotaSearch"></i><i class="fa fa-hourglass fa-dw" v-if="kotaSearch" style="font-size: 8pt;"></i>
                                                                </span>
                                                                <vue-select :name="'kabupaten_ketua'" :id="'kabupaten_ketua'" :options="kabupaten_ketua" :search="true" @option-change="kabupatenChange"></vue-select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Kecamatan</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-check fa-fw" v-if="!kecamatanSearch"></i><i class="fa fa-hourglass fa-dw" v-if="kecamatanSearch" style="font-size: 8pt;"></i>
                                                                </span>
                                                                <vue-select :name="'kecamatan_ketua'" :id="'kecamatan_ketua'" :options="kecamatan_ketua" :search="true" @option-change="kecamatanChange"></vue-select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Desa / Kelurahan</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-check fa-fw" v-if="!kelurahanSearch"></i><i class="fa fa-hourglass fa-dw" v-if="kelurahanSearch" style="font-size: 8pt;"></i>
                                                                </span>
                                                                <vue-select :name="'desa_ketua'" :id="'desa_ketua'" :options="desa_ketua" :search="true"></vue-select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Kewarganegaraan</label>
                                                            <vue-select :name="'kewarganegaraan_ketua'" :id="'kewarganegaraan_ketua'" :options="kewarganegaraan_ketua" :search="false"></vue-select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <vue-select :name="'kelamin_ketua'" :options="kelamin" :search="false"></vue-select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h3 style="color: #1ab394">
                                                        Anggota Rombongan <small>(Ketua tidak perlu ditulis lagi)</small>&nbsp;
                                                        <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan biodata daftar anggota rombongan"></i>
                                                    </h3>
                                                </div>

                                                <div class="col-md-2 text-right">
                                                    <button type="button" class="btn btn-success btn-xs" @click="tambahAnggota">
                                                        <i class="fa fa-plus"></i> &nbsp;
                                                        Tambah Anggota
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="background: #eee; margin-top: 10px; padding: 0px;">
                                            <fieldset style="font-size: 9pt;">
                                                <table class="table-mini" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">***</th>
                                                            <th width="30%">Nama</th>
                                                            <th width="15%">No Telepon</th>
                                                            <th width="20%">No Identitas</th>
                                                            <th width="20%">Warga Negara</th>
                                                            <th width="10%">Jenis Kelamin</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr v-for="(anggota, idx) in anggota">
                                                            <td class="text-center">
                                                                <template v-if="idx > 0">
                                                                    <i class="fa fa-trash hint" style="color: red" @click="deleteAnggota($event, idx)"></i>
                                                                </template>

                                                                <template v-if="idx == 0">
                                                                    <i class="fa fa-lock"></i>
                                                                </template>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="nama_anggota[]" class="form-control" style="width: 100%" :placeholder="'Nama Anggota Ke '+(idx+1)" v-model="anggota.nama"/>
                                                            </td>
                                                            <td>
                                                                <vue-mask :class="'form-control'" :placeholder="'____-____-_____'" :name="'no_telp_anggota[]'" :mask="'0000-0000-00000'" :css="'text-align: left;'" v-model="anggota.no_telp"></vue-mask>

                                                            </td>
                                                            <td>
                                                                <vue-mask :class="'form-control'" :placeholder="'____.____.____.____'" :name="'no_ktp_anggota[]'" :mask="'0000.0000.0000.0000'" :css="'text-align: left;'" v-model="anggota.no_ktp"></vue-mask>
                                                            </td>
                                                            <td>
                                                                <select class="form-control hint" name="kewarganegaraan_anggota[]" v-model="anggota.kewarganegaraan">
                                                                    <option v-for="kewarganegaraan in kewarganegaraan" :value="kewarganegaraan.id">{{ kewarganegaraan.text }}</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control hint" name="kelamin_anggota[]" v-model="anggota.kelamin">
                                                                    <option v-for="kelamin in kelamin" :value="kelamin.id">{{ kelamin.text }}</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <h3 style="color: #1ab394">
                                                Kontak Darurat &nbsp;
                                                <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan kontak darurat yang suatu saat dapat dihubungi (keluarga, saudara, teman selain yang mengikuti rombongan pendakian)"></i>
                                            </h3>
                                        </div>

                                        <div class="col-md-12" style="background: #eee; margin-top: 10px; padding-top: 10px;">
                                            <fieldset style="font-size: 9pt;">  
                                                <div class="row" v-for="(kontak, idx) in kontak_darurat">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input name="nama_kontak_darurat[]" type="text" class="form-control":placeholder="'Nama kontak darurat '+(idx + 1)" v-model="kontak.nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>No Telepon</label>
                                                            <vue-mask :class="'form-control'" :placeholder="'____-____-_____'" :name="'no_kontak_darurat[]'" :mask="'0000-0000-00000'" :css="'text-align: left;'" v-model="kontak.no"></vue-mask>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input name="alamat_kontak_darurat[]" type="text" class="form-control" :placeholder="'Alamat kontak darurat '+(idx + 1)" v-model="kontak.alamat">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Hubungan Keluarga</label>
                                                            <vue-select :name="'hubungan_kontak_darurat[]'" :options="hubungan_kontak_darurat" :search="false"></vue-select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h3 style="color: #1ab394">
                                                        Perlengkapan Yang Dibawa&nbsp;
                                                        <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan jumlah perlengkapan pendakian yang dibawa sesuai dengan kolom yang disediakan (satuan yang digunakan adalah Satuan dalam unit)"></i>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="background: #eee; margin-top: 10px; padding-top: 10px;">
                                            <fieldset style="font-size: 9pt;">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Tenda</label>
                                        
                                                        <vue-mask :class="$v.single.tenda.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'tenda'" :mask="'000000'" :css="'text-align: left;'" v-model="single.tenda"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sleeping Bags / Kantong Tidur</label>

                                                        <vue-mask :class="$v.single.sleeping_bag.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'sleeping_bag'" :mask="'000000'" :css="'text-align: left;'" v-model="single.sleeping_bag"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Peralatan Masak</label>

                                                        <vue-mask :class="$v.single.peralatan_masak.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'peralatan_masak'" :mask="'000000'" :css="'text-align: left;'" v-model="single.peralatan_masak"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bahan Bakar</label>

                                                        <vue-mask :class="$v.single.bahan_bakar.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'bahan_bakar'" :mask="'000000'" :css="'text-align: left;'" v-model="single.bahan_bakar"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ponco / Jas Hujan</label>
                                                        
                                                        <vue-mask :class="$v.single.jas_hujan.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'jas_hujan'" :mask="'000000'" :css="'text-align: left;'" v-model="single.jas_hujan"></vue-mask>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Senter / Alat Penerangan</label>

                                                        <vue-mask :class="$v.single.senter.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'senter'" :mask="'000000'" :css="'text-align: left;'" v-model="single.senter"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Obat-Obatan Pribadi dan P3K</label>
                                                        
                                                        <vue-mask :class="$v.single.obat.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'obat'" :mask="'000000'" :css="'text-align: left;'" v-model="single.obat"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Matras</label>

                                                        <vue-mask :class="$v.single.matras.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'matras'" :mask="'000000'" :css="'text-align: left;'" v-model="single.matras"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kantong Sampah</label>

                                                        <vue-mask :class="$v.single.kantong_sampah.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'kantong_sampah'" :mask="'000000'" :css="'text-align: left;'" v-model="single.kantong_sampah"></vue-mask>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jaket</label>

                                                        <vue-mask :class="$v.single.jaket.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Satuan dalam unit'" :name="'jaket'" :mask="'000000'" :css="'text-align: left;'" v-model="single.jaket"></vue-mask>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h3 style="color: #1ab394">
                                                        Logistik yang dibawa&nbsp;
                                                        <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan jumlah makanan dan minuman yang akan dibawa mendaki (satuan yang digunakan adalah unit)"></i>
                                                    </h3>
                                                </div>

                                                <div class="col-md-2 text-right">
                                                    <button type="button" class="btn btn-success btn-xs" @click="tambahLogistik">
                                                        <i class="fa fa-plus"></i> &nbsp;
                                                        Tambah Logistik
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="background: #eee; margin-top: 10px; padding: 0px;">
                                            <fieldset style="font-size: 9pt;">
                                                <table class="table-mini" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">***</th>
                                                            <th>Makanan dan Minumam</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(logistik, idx) in logistik">
                                                            <td class="text-center">
                                                                <template v-if="idx > 0">
                                                                    <i class="fa fa-trash hint" style="color: red" @click="deleteLogistik($event, idx)"></i>
                                                                </template>

                                                                <template v-if="idx == 0">
                                                                    <i class="fa fa-lock"></i>
                                                                </template>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="nama_logistik[]" class="form-control" placeholder="Masukkan Nama Logistik" v-model="logistik.nama"/>
                                                            </td>
                                                            <td>
                                                                <vue-mask :class="'form-control'" :placeholder="'Jumlah yang dibawa'" :name="'jumlah_logistik[]'" :mask="'000000'" :css="'text-align: left;'" v-model="logistik.jumlah"></vue-mask>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group" style="margin-top: 20px;">
                                                <table>
                                                    <tr>
                                                        <td width="2.5%" style="vertical-align: top;">
                                                            <input type="radio" name="pundak" value="pundak">
                                                        </td>

                                                        <td style="padding: 0 0 5px 10px;">
                                                            <label> KHUSUS <span style="font-weight: 400">untuk pendakian</span> GUNUNG PUNDAK <span style="font-weight: 400">centang kolom disamping</span></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2.5%" style="vertical-align: top;">
                                                            <input type="radio" name="pundak" value="lelaku">
                                                        </td>

                                                        <td style="padding: 0 0 0 10px;">
                                                            <label> KHUSUS <span style="font-weight: 400">untuk pendakian ke situs purbakala</span> (LELAKU) <span style="font-weight: 400">jalur Tambaksari centang kolom disamping</span></label>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" style="margin-top: 20px; border-top: 1px solid #ddd; padding: 20px 30px 0px 0px;">
                                        <div class="col-md-10 text-right" style="padding-top: 10px;">
                                            <small style="font-style: italic;" v-if="onRequest">{{ requestMessage }}</small>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" @click="send" :disabled="disabledButton">Kirim Formulir Registrasi</button>
                                        </div>
                                    </div>
                                </form>
                            </template>

                            <template v-if="downloadingResource">
                                <center><small>Sedang Menyiapkan Form</small></center>
                            </template>

                            <template v-if="downloadingResource == 'Nan'">
                                <center><small>Formuir Sedang Bermasalah. Coba Lagi Nanti. :(</small></center>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal inmodal" id="modal-info" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" style="margin-bottom: 100px;">
                <div class="modal-content animated fade-in">
                    <div class="ibox product-detail">
                        <div class="ibox-content" style="margin-bottom: 0px; padding-bottom: 0px; padding-top: 10px;">
                            <div class="row">
                                <div class="col-md-12" style="padding: 0px 5px; border-bottom: 1px solid #eee;">
                                    <h4>Terimakasih</h4>
                                </div>

                                <div class="col-md-12" style="padding-top: 20px;">
                                    Data registrasi pendakian anda sudah kami simpan. Setelah kami verifikasi, <b>berkas/surat izin pendakian akan dikirim melalui email yang anda daftarkan. Jika tidak ada email balasan di kotak masuk maka silahkan cek kotak spam email anda. </b>
                                </div>

                                <div class="col-md-12 text-right" style="padding: 15px 5px 0px 5px; border-top: 1px solid #eee; margin-top: 15px;">
                                    <a href="<?php echo e(Route('frontend.registrasi')); ?>">
                                        <button class="btn btn-primary btn-xs">Baik, Saya Mengerti</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('public/frontend/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('public/frontend/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- Steps -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/staps/jquery.steps.min.js')); ?>"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/validate/jquery.validate.min.js')); ?>"></script>

    <!-- Input Mask-->
    <script src="<?php echo e(asset('public/frontend/js/plugins/jasny/jasny-bootstrap.min.js')); ?>"></script>

    <!-- iCheck -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/iCheck/icheck.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/axios/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('public/frontend/js/vendors/mask/dist/jquery.mask.js')); ?>"></script>

    <!-- Vue js -->
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/bootstrap-vue.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/portal-vue.umd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/datepicker/datepicker.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/select/select.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vuelidate/dist/vuelidate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vuelidate/dist/validators.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/mask/mask.component.js')); ?>"></script>

    <script>

        Vue.use(window.vuelidate.default)
        const { required, minLength } = window.validators

        var vue = new Vue({
            el: '#page-wrapper',
            data: {

                // core
                disabledButton: false,
                onRequest: false,
                requestMessage: "Sedang Mengirim Formulir Registrasi",
                downloadingResource: true,

                provinsiSearch : false,
                kotaSearch : false,
                kecamatanSearch : false,
                kelurahanSearch : false,

                // data
                provinsi: [],
                kabupaten: [],
                kecamatan: [],
                desa: [],

                provinsi_ketua: [],
                kabupaten_ketua: [],
                kecamatan_ketua: [],
                desa_ketua: [],

                kewarganegaraan_ketua: [
                    {
                        id: 'WNI',
                        text: 'Warga Negara Indonesia'
                    },

                    {
                        id: 'WNA',
                        text: 'Warga Negara Asing'
                    }
                ],

                hubungan_kontak_darurat: [
                    {
                        id: 'Orang Tua',
                        text: 'Orang Tua'
                    },

                    {
                        id: 'Suami',
                        text: 'Suami'
                    },

                    {
                        id: 'Istri',
                        text: 'Istri'
                    },

                    {
                        id: 'Anak',
                        text: 'Anak'
                    },

                    {
                        id: 'Saudara',
                        text: 'Saudara'
                    },

                    {
                        id: 'Teman',
                        text: 'Teman'
                    }


                ],

                kontak_darurat: [
                    {
                        nama: '',
                        no: '',
                        alamat: '',
                        hub: 'Orang Tua',
                    },

                    {
                        nama: '',
                        no: '',
                        alamat: '',
                        hub: 'Orang Tua',
                    }
                ],

                kewarganegaraan: [
                    {
                        id: 'WNI',
                        text: 'Warga Negara Indonesia'
                    },

                    {
                        id: 'WNA',
                        text: 'Warga Negara Asing'
                    },
                ],

                kelamin: [
                    {
                        id: 'L',
                        text: 'Laki-Laki'
                    },

                    {
                        id: 'P',
                        text: 'Perempuan'
                    },
                ],

                anggota: [
                    {
                        nama: '',
                        no_telp: '',
                        no_ktp: '',
                        kewarganegaraan: 'WNI',
                        kelamin: 'L',
                    }

                ],

                logistik: [
                    {
                        nama: '',
                        jumlah: '',
                    }

                ],

                single: {
                    // tab Informasi Ketua
                        nama_ketua: '',
                        no_ktp_ketua: '',
                        tempat_lahir_ketua: '',
                        tgl_lahir_ketua: '',
                        no_hp_ketua: '',
                        email_ketua: '',
                        tgl_naik: '<?php echo e(date("d/m/Y")); ?>',
                        tgl_turun: '',
                        alamat_ketua: '',

                    // tab perlengkapan
                        tenda: '',
                        sleeping_bag: '',
                        peralatan_masak: '',
                        bahan_bakar: '',
                        jas_hujan: '',
                        senter: '',
                        obat: '',
                        matras: '',
                        kantong_sampah: '',
                        jaket: ''
                }

            },

            validations: {
                single : {
                    nama_ketua: {
                        required,
                    },

                    no_ktp_ketua: {
                        required,
                    },

                    tempat_lahir_ketua: {
                        required,
                    },

                    tgl_lahir_ketua: {
                        required,
                    },

                    no_hp_ketua: {
                        required,
                    },

                    email_ketua: {
                        required,
                    },

                    tgl_naik: {
                        required,
                    },

                    tgl_turun: {
                        required,
                    },

                    alamat_ketua: {
                        required,
                    },

                    // nama_kontak_darurat: {
                    //     required,
                    // },

                    // no_kontak_darurat: {
                    //     required,
                    // },

                    // email_kontak_darurat: {
                    //     required,
                    // },

                    // hubungan_kontak_darurat: {
                    //     required,
                    // },

                    // nama_anggota: {
                    //     required,
                    // },

                    // no_ktp_anggota: {
                    //     required,
                    // },

                    tenda: {
                        required,
                    },

                    sleeping_bag: {
                        required,
                    },

                    peralatan_masak: {
                        required,
                    },

                    bahan_bakar: {
                        required,
                    },

                    jas_hujan: {
                        required,
                    },

                    senter: {
                        required,
                    },

                    obat: {
                        required,
                    },

                    matras: {
                        required,
                    },

                    kantong_sampah: {
                        required,
                    },

                    jaket: {
                        required,
                    },

                    // nama_logistik: {
                    //     required,
                    // },

                    // jumlah_logistik: {
                    //     required,
                    // },
                }
            },

            mounted: function(){
                console.log('vue ready');

                axios.get('<?php echo e(Route("frontend.registrasi.resource")); ?>')
                        .then((response) => {
                            // console.log(response.data);

                            this.provinsi = response.data.provinsi;
                            this.kabupaten_ketua = response.data.kota;
                            this.kecamatan_ketua = response.data.kecamatan;
                            this.desa_ketua = response.data.kelurahan;

                            this.provinsi_ketua = this.provinsi;

                            setTimeout(function(e){
                                $('[data-toggle="tooltip"]').tooltip();
                            }, 0);

                        }).catch((e) => {
                            this.downloadingResource = 'Nan';
                            alert('ups. Terjadi Kesalahan. Err System...')
                            console.log('System Bermasalah '+e)
                        }).then(() => {
                            this.downloadingResource = false;
                        })
            },

            methods: {
                // onKeydown (event) {
                //     const char = String.fromCharCode(event.keyCode)
                //     if (/[^A-Za-z0-9+#-\.]/.test(char)) {
                //     event.preventDefault()
                //   }
                // },
                masking: function(e){
                    let val = $(e.target).val();

                    console.log(e);
                },

                tambahAnggota: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.anggota.push({
                        nama: '',
                        no_telp: '',
                        no_ktp: '',
                        kewarganegaraan: 'WNI',
                        kelamin: 'L',
                    });
                },

                deleteAnggota: function(e, id){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.anggota.splice(id, 1);
                },

                tambahLogistik: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.logistik.push({
                        nama: '',
                        jumlah: '',
                    });
                },

                deleteLogistik: function(e, id){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.logistik.splice(id, 1);
                },

                provinsiChange(e){
                    // this.kabupaten_ketua = $.grep(this.kabupaten, function(a) { return a.province_id == e });
                    // this.kabupatenChange(this.kabupaten_ketua[0].id);
                    this.kotaSearch = this.kecamatanSearch = this.kelurahanSearch = true;

                    axios.get("<?php echo e(Route('frontend.registrasi.resource.byprovinsi')); ?>?id="+e)
                            .then((response) => {
                                // console.log(response.data)
                                this.kabupaten_ketua = response.data.kota;
                                this.kecamatan_ketua = response.data.kecamatan;
                                this.desa_ketua = response.data.kelurahan;

                                this.kotaSearch = this.kecamatanSearch = this.kelurahanSearch = false;
                            })
                            .catch((err) => {
                                alert('system bermasalah saat memuat resource');
                                console.log('err => '+err);
                            })
                },

                kabupatenChange(e){
                    this.kecamatanSearch = this.kelurahanSearch = true;
                    axios.get("<?php echo e(Route('frontend.registrasi.resource.bykabupaten')); ?>?id="+e)
                            .then((response) => {
                                // console.log(response.data)

                                this.kecamatan_ketua = response.data.kecamatan;
                                this.desa_ketua = response.data.kelurahan;

                                this.kecamatanSearch = this.kelurahanSearch = true;
                            })
                            .catch((err) => {
                                alert('system bermasalah saat memuat resource');
                                console.log('err => '+err);
                            })
                },

                kecamatanChange(e){
                    this.kelurahanSearch = true;
                    axios.get("<?php echo e(Route('frontend.registrasi.resource.bykecamatan')); ?>?id="+e)
                            .then((response) => {
                                // console.log(response.data)
                                
                                this.desa_ketua = response.data.kelurahan;

                                this.kelurahanSearch = false;
                            })
                            .catch((err) => {
                                alert('system bermasalah saat memuat resource');
                                console.log('err => '+err);
                            })
                },

                send: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    this.$v.$touch();

                    if(!this.$v.$invalid){

                        if(!this.validasiAnggota()){
                            $.toast({
                                text: 'Data nama anggota tidak boleh ada yang kosong..',
                                showHideTransition: 'slide',
                                icon: 'error',
                                position: 'top-right',
                                stack: 1
                            })

                            return false;
                        }

                        if(!this.validasiKontak()){
                            $.toast({
                                text: 'Harus ada minimal 1 data kontak darurat yang terisi lengkap..',
                                showHideTransition: 'slide',
                                icon: 'error',
                                position: 'top-right',
                                stack: 1
                            })

                            return false;
                        }

                        if(!this.validasiLogistik()){
                            $.toast({
                                text: 'Harus ada minimal 1 data logistik yang terisi lengkap..',
                                showHideTransition: 'slide',
                                icon: 'error',
                                position: 'top-right',
                                stack: 1
                            })

                            return false;
                        }

                        this.disabledButton = true;
                        this.onRequest = true;

                        var dataForm = $('#form-data').serialize();

                        axios.post('<?php echo e(Route("frontend.registrasi.save")); ?>', dataForm)
                                .then((response) => {
                                    console.log(response.data);
                                    
                                    $.toast({
                                        text: response.data.message,
                                        showHideTransition: 'slide',
                                        icon: response.data.status,
                                        position: 'top-right',
                                        stack: 1
                                    })

                                    if(response.data.status == 'success'){
                                        $("#modal-info").modal('show');
                                        // alert('berhasil')
                                        this.formReset();
                                    }

                                }).catch((e) => {
                                    console.log(e);
                                    $.toast({
                                        text: 'System Error, '+e,
                                        showHideTransition: 'slide',
                                        icon: 'error',
                                        position: 'top-right',
                                        stack: 1
                                    })
                                }).then((e) => {
                                    this.onRequest = false;
                                    this.requestMessage = 'Sedang menyimpan data..';
                                    this.disabledButton = false;
                                })
                    }else{
                        $.toast({
                            text: 'Di mohon untuk mengisi semua kolom yang tersedia dengan benar dan sesuai',
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'top-right',
                            stack: 1
                        })
                    }
                },

                validasiAnggota: function(){
                    let response = true;
                    $.each(this.anggota, function(index, data){
                        if(data.nama == "" || data.nama === undefined){
                            response = false;
                            return false;
                        }
                    });

                    return response;
                },

                validasiKontak: function(){
                    let response = false;

                    $.each(this.kontak_darurat, function(index, data){
                        if(data.nama != "" && data.no != "" && data.alamat != ""){
                            response = true;
                            return false;
                        }
                    });

                    return response;
                },

                validasiLogistik: function(){
                    let response = false;

                    $.each(this.logistik, function(index, data){
                        if(data.nama != "" && data.jumlah != ""){
                            response = true;
                            return false;
                        }
                    });

                    return response;
                },

                formReset: function(e){
                    // tab Informasi Ketua
                        this.single.nama_ketua = '';
                        this.single.no_ktp_ketua = '';
                        this.single.tempat_lahir_ketua = '';
                        this.single.tgl_lahir_ketua = '<?php echo e(date("d/m/Y")); ?>';
                        this.single.no_hp_ketua = '';
                        this.single.email_ketua = '';
                        this.single.tgl_naik = '<?php echo e(date("d/m/Y")); ?>';
                        this.single.tgl_turun = '';
                        this.single.alamat_ketua = '';

                    // tab perlengkapan
                        this.single.tenda = '';
                        this.single.sleeping_bag = '';
                        this.single.peralatan_masak = '';
                        this.single.bahan_bakar = '';
                        this.single.jas_hujan = '';
                        this.single.senter = '';
                        this.single.obat = '';
                        this.single.matras = '';
                        this.single.kantong_sampah = '';
                        this.single.jaket = '';

                    this.anggota = [
                        {
                            nama: '',
                            no_telp: '',
                            no_ktp: '',
                            kewarganegaraan: 'WNI',
                            kelamin: 'L',
                        }

                    ];

                    this.kontak_darurat = [
                        {
                            nama: '',
                            no: '',
                            alamat: '',
                            hub: 'Orang Tua',
                        },

                        {
                            nama: '',
                            no: '',
                            alamat: '',
                            hub: 'Orang Tua',
                        }
                    ];
                    
                    this.logistik = [
                        {
                            nama: '',
                            jumlah: '',
                        }

                    ];
                }
            }
        })
    
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\project_lain\tahura\resources\views/frontend/registrasi/form.blade.php ENDPATH**/ ?>