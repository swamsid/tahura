<?php $__env->startSection('extra_style'); ?>
    
    <style type="text/css">
        #lineChart{
            width: 100% !important;
            height: 100% !important;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->posisi == 'kantor'): ?>
        <div class="row border-bottom dashboard-header">
            <div class="col-md-12">
                <div class="row text-center">
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #1ab394;"></i> &nbsp;
                    <?php
                        $con = mysqli_connect("localhost","root","","dishut");
                        // $con = mysqli_connect("tahuraradensoerjo.or.id","tahurara_tahura","amiruzg627408","tahurara_tahura");
                        $total_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_status = 'sudah naik' "));
                        $total = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_status = 'sudah naik' "));
                        $tot = $total_anggota+$total;
                    ?>
                    <span>Total Pendaki Sedang Naik Pada <?php echo date('j F Y').' </span><span style="color:white; background-color:#23c6c8; padding:6px 12px; border-radius:5px">'.$tot?></span>&nbsp;
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #1ab394;"></i>
                </div>
            </div>
        </div>
        <div class="row dashboard-header">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5>Pos Tambaksari</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;">
                            <?php
                                $tambak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tambak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tambak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tambak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tambak_dash_wni+$tambak_dash_wna+$tambak_dash_anggota_wni+$tambak_dash_wna;
                            ?>
                        <small style="float: right;">
                            <b class="text-info">
                                <?php echo $tambak_dash_wni+$tambak_dash_anggota_wni; ?> WNI <br>
                                <?php echo $tambak_dash_wna+$tambak_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5>Pos Sumberbrantas</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;">
                            <?php
                                $sumber_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $sumber_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $sumber_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $sumber_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $sumber_dash_wni+$sumber_dash_wna+$sumber_dash_anggota_wni+$sumber_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="text-info">
                                <?php echo $sumber_dash_wni+$sumber_dash_anggota_wni; ?> WNI <br>
                                <?php echo $sumber_dash_wna+$sumber_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5>Pos Lawang</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;">
                            <?php
                                $lawang_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lawang_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lawang_dash_wni= mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lawang_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lawang_dash_wni+$lawang_dash_wna+$lawang_dash_anggota_wni+$lawang_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="text-info">
                                <?php echo $lawang_dash_wni+$lawang_dash_anggota_wni; ?> WNI <br>
                                <?php echo $lawang_dash_wna+$lawang_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pos Tretes</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;">
                            <?php
                                $tretes_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tretes_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tretes_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tretes_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tretes_dash_wni+$tretes_dash_wna+$tretes_dash_anggota_wni+$tretes_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="text-info">
                                <?php echo $tretes_dash_wni+$tretes_dash_anggota_wni; ?> WNI <br>
                                <?php echo $tretes_dash_wna+$tretes_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row border-bottom white-bg dashboard-header">
            <div class="col-sm-12">
                <div class="row text-center" style="margin-bottom: 20px">
                    <?php
                        $total_anggota_naik = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian != '' "));
                        $total_naik = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian != '' "));
                        $tot_naik = $total_anggota_naik+$total_naik;
                    ?>
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #1ab394;"></i> &nbsp;
                    <span>Total Pendaki Pada Tahun <?php echo date('Y').' </span><span style="color:white; background-color:#23c6c8; padding:6px 12px; border-radius:5px">'.$tot_naik?></span>&nbsp;
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #1ab394;"></i>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="chart-container">
                    <canvas class="flot-chart-content" id="flot-dashboard-chart" height="350"></canvas>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="chart-container">
                    <canvas id="pie-chart" height="350"></canvas>
                </div>
            </div>
        </div>
        
            
            
    <?php else: ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Bulan Ini</span>
                        <h5>Total Registrasi</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;"><?php echo e($data['registrasi']); ?> Tim</h1>
                        <small>
                            <b class="text-success">
                                <?php
                                    $cur = ($data['totregis'] > 0) ? ($data['registrasi'] / $data['totregis']) * 100 : 0;
                                ?>
                                <?php echo e(number_format($cur)); ?>%
                            </b> &nbsp;
                            Dari Total Keseluruhan
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">Bulan Ini</span>
                        <h5>Total Ditolak</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;"><?php echo e($data['tolak']); ?> Tim</h1>
                        <small>
                            <b class="text-danger">
                                <?php
                                    $cur = ($data['tottolak'] > 0) ? ($data['tolak'] / $data['tottolak']) * 100 : 0;
                                ?>
                                <?php echo e(number_format($cur)); ?>%
                            </b> &nbsp;
                            Dari Total Keseluruhan
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Bulan Ini</span>
                        <h5>Total Sudah Naik</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;"><?php echo e($data['naik']); ?> Tim</h1>
                        <div class="stat-percent font-bold text-info">
                            <small>
                                <?php
                                    $cur = ($data['totnaik'] > 0) ? ($data['naik'] / $data['totnaik']) * 100 : 0;
                                ?>

                                (<?php echo e(number_format($cur)); ?>%)
                            </small>
                        </div>
                        <small>
                            <b class="text-info">Total <?php echo e($data['naik']); ?> tim</b>
                            Yang Anda Acc
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Bulan Ini</span>
                        <h5>Total Sudah Turun</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" style="padding-bottom: 5px;"><?php echo e($data['totturun']); ?> Tim</h1>
                        <div class="stat-percent font-bold text-navy">
                            <?php
                                    $cur = ($data['totturun'] > 0) ? ($data['turun'] / $data['totturun']) * 100 : 0;
                                ?>

                            <small>
                                (<?php echo e(number_format($cur)); ?>%)
                            </small>
                        </div>
                        <small>
                            <b class="text-navy">Total <?php echo e($data['turun']); ?> tim</b>
                            Yang Anda Acc
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-bottom white-bg dashboard-header">
            Dashboard Petugas
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>
    <script>
        <?php if(Auth::user()->posisi == 'kantor'): ?>
            $(document).ready(function () {

                var line = <?php echo $line; ?>;
                var polar = <?php echo $provinsi; ?>;
                var doughnut = <?php echo $lpk; ?>;

                // console.log(polar.province);

                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Selamat Datang <?php echo e(Auth::user()->nama); ?>', 'UPT Tahura Raden Soerjo');
                }, 1300);

                var data = {
                    type: 'line',
                    data: {
                        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober','November','Desember'],
                        datasets: [
                            {
                                label: "Pos Tambaksari",
                                data: [
                                    <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $tambaksari_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $tambaksari = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $tambaksari+$tambaksari_anggota.',';
                                    }?>
                                ],
                                backgroundColor : "rgba(26, 179, 148, 0.4)",
                                borderColor : "rgba(26, 179, 148, 0.4)",
                                borderWidth : 3,
                                fill : false

                            },
                            {
                                label: "Pos Sumberbrantas",
                                data: [
                                    <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $sumber_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $sumber = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $sumber+$sumber_anggota.',';
                                    }?>  
                                ],
                                backgroundColor : "rgba(28, 132, 198, 0.4)",
                                borderColor : "rgba(28, 132, 198, 0.4)",
                                borderWidth : 3,
                                fill : false
                            },
                            {
                                label: "Pos lawang",
                                data: [
                                    <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $lawang_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $lawang = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $lawang+$lawang_anggota.',';
                                    }?>
                                ],
                                backgroundColor : "rgba(255,64,129,0.4)",
                                borderColor : "rgba(255,64,129,0.4)",
                                borderWidth : 3,
                                fill : false
                            },
                            {
                                label: "Pos Tretes",
                                data: [
                                    <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $tambaksari_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $tambaksari = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $tambaksari+$tambaksari_anggota.',';
                                    } ?>
                                ],
                                backgroundColor : "rgba(255,87,34,0.4)",
                                borderColor : "rgba(255,87,34,0.4)",
                                borderWidth : 3,
                                fill : false
                            }
                        ]
                    },
                         options: {
                            responsive: true,
                            legend: {
                                position: 'bottom'
                            },
                            tooltips: {
                              mode: 'index',
                              intersect: false,
                            },
                           hover: {
                              mode: 'nearest',
                              intersect: true
                            },
                            scales: {
                              xAxes: [{
                                display: true,
                                scaleLabel: {
                                  display: true,
                                  labelString: 'Month'
                                }
                              }],
                              yAxes: [{
                                display: true,
                                scaleLabel: {
                                  display: true,
                                },
                                ticks: {
                                     beginAtZero: true,
                                     userCallback: function(label, index, labels) {
                                         // when the floored value is the same as the value we have a whole number
                                         if (Math.floor(label) === label) {
                                             return label;
                                         }

                                     },
                                 }
                              }]
                            }
                        }
                };
                var myLineChart = document.getElementById('flot-dashboard-chart').getContext('2d');
                window.myLineChart = new Chart(myLineChart, data);
                
                new Chart(document.getElementById("pie-chart"), 
                {
                    type: 'pie',
                    data: {
                      labels: ["Warga Negara Indonesia", "Warga Negara Asing"],
                      datasets: [{
                        backgroundColor: ["#80DEEA","#90A4AE"],
                        data: [
                            <?php
                                $anggotaWNI = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE b.ap_kewarganegaraan = 'WNI' AND YEAR(a.pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                                $ketuaWNI = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_kewarganegaraan = 'WNI' AND YEAR(pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                                echo $anggotaWNI+$ketuaWNI;
                            ?>
                            ,
                            <?php
                                $anggotaWNA = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE b.ap_kewarganegaraan = 'WNA' AND YEAR(a.pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                                $ketuaWNA = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_kewarganegaraan = 'WNA' AND YEAR(pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                                echo $anggotaWNA+$ketuaWNA;
                            ?>
                            ]
                      }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'bottom'
                        },
                    }
                });

            });
        <?php else: ?>
            $(document).ready(function (){
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Selamat Datang <?php echo e(Auth::user()->nama); ?>', 'UPT Tahura Raden Soerjo');
                }, 1300);
            });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>