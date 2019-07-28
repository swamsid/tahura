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

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-sm-3">
                <!-- <h2>Selamat Datang</h2> -->
                <small>Jumlah Pendaki Naik Pada Tiap Pos Berdasarkan Ketua Regu. Data diambil dari awal periode pencatatan hingga saat ini.</small>
                <ul class="list-group clear-list m-t">
                    <?php $__currentLoopData = $rangking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $label = 'label-default';

                            if($key == 0)
                                $label = 'label-success';
                            else if($key == 1)
                                $label = 'label-info';
                            else if($key == 2)
                                $label = 'label-primary';
                        ?>

                        <li class="list-group-item fist-item">
                            <span class="pull-right" style="font-weight: 600">
                                <?php echo e($sr->tot); ?> Tim
                            </span>
                            <span class="label <?php echo e($label); ?>" style="font-weight: bold;"><?php echo e($key + 1); ?></span> <?php echo e($sr->pp_nama); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <li class="list-group-item fist-item">
                        <span class="pull-right" style="font-weight: 600">
                            <?php echo e($pendakian); ?> Tim
                        </span>
                        <span style="font-weight: bold; font-size: 9pt;">Total</span>
                        
                         
                    </li>
                </ul>
            </div>

            <div class="col-sm-6">
                <div class="text-center">
                    <canvas id="myPieChart" style=""></canvas>
                </div>
                <!-- <div class="row text-left" style="margin-top: 0px;">
                    <div class="col-xs-4">
                        <div class=" m-l-md">    
                        <span class="h4 font-bold m-t block">
                            <i class="fa fa-clipboard" style="color: #1c84c6;"></i> &nbsp;
                            <?php echo e($registrasi); ?> Tim
                        </span>
                        <small class="text-muted m-b block">Total Registrasi Bulan Ini</small>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <span class="h4 font-bold m-t block">
                            <i class="fa fa-clipboard" style="color: #1c84c6;"></i> &nbsp;
                            <?php echo e($naik); ?> Tim
                        </span>
                        <small class="text-muted m-b block">Total Sudah Naik Bulan Ini</small>
                    </div>
                    <div class="col-xs-4">
                        <span class="h4 font-bold m-t block">
                            <i class="fa fa-clipboard" style="color: #1c84c6;"></i> &nbsp;
                            <?php echo e($turun); ?> Tim
                        </span>
                        <small class="text-muted m-b block">Total Sudah Turun Bulan Ini</small>
                    </div>

                </div> -->
            </div>

            <div class="col-sm-3" style=" background: none; padding-top: 0px;">
                <div class="statistic-box" style="margin-top: 0px;">
                <h4>
                    Grafik Info Pendaki
                </h4>
                <p>
                    <!-- <small>Rangking Pendaki Berdasarkan 2 Kriteria</small> -->
                </p>
                    <div class="row text-center" style="margin-top: 20px;">
                        <div class="col-lg-6">
                            <canvas id="myPolar" width="80" height="80"></canvas>
                            <h5 style="margin-top: 10px;">Provinsi Asal</h5>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="myDoughnut" width="75" height="75"></canvas>
                            <h5 style="margin-top: 10px;">Jenis Kelamin</h5>
                        </div>
                    </div>
                    <div class="m-t" style="margin-top: 20px;">
                        <small>Data diatas diambil dari awal periode pencatatan hingga saat ini.</small>
                    </div>

                </div>
            </div>

            
            <div class="col-md-12" style="margin-top: 50px">
                <div class="row text-center" style="margin-top: 0px;">
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #1ab394;"></i> &nbsp;
                    <span>Jumlah Total Pendaki Tahun <?php echo date('Y') ?></span>&nbsp;
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #1ab394;"></i>
                </div>
                <!-- <div class="flot-chart dashboard-chart" style="background: none; padding: 0px; margin-top: 10px;">
                    <canvas id="lineChart"></canvas>
                </div> -->
                <div id="slineChart" ></div>
                <!-- <canvas id="myLineChart" ></canvas> -->
            </div>
            
    <?php else: ?>
        <!-- <div class="row">
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
        </div> -->
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
                    toastr.success('Selamat Data <?php echo e(Auth::user()->nama); ?>', 'UPT Tahura Raden Soerjo');
                }, 1300);

                // line area

                    var lineChartData = {
                        labels: line.bulan,
                        datasets: [{
                            label: 'Pos Tambaksari',
                            borderColor: "#23c6c8",
                            backgroundColor: 'rgba(35, 198, 200, 0.3)',
                            fill: true,
                            data: line.tot1,
                            yAxisID: 'y-axis-1',
                            borderWidth: 1,
                            pointRadius: 1.5,
                        }, {
                            label: 'Pos Sumberbrantas',
                            borderColor: '#aa66cc',
                            backgroundColor: 'rgba(170, 102, 204, 0.3)',
                            fill: true,
                            data: line.tot2,
                            yAxisID: 'y-axis-2',
                            borderWidth: 1,
                            pointRadius: 1.5,
                        }, {
                            label: 'Pos Lawang',
                            borderColor: '#ff3547',
                            backgroundColor: 'rgba(255, 53, 71, 0.3)',
                            fill: true,
                            data: line.tot3,
                            yAxisID: 'y-axis-3',
                            borderWidth: 1,
                            pointRadius: 1.5,
                        }, {
                            label: 'Pos Tretes',
                            borderColor: '#ff8800',
                            backgroundColor: 'rgba(255, 136, 0, 0.3)',
                            fill: true,
                            data: line.tot4,
                            yAxisID: 'y-axis-4',
                            borderWidth: 1,
                            pointRadius: 1.5,
                        }]
                    };

                    // var lineChart = document.getElementById('lineChart').getContext('2d');
                    // window.myLine = Chart.Line(lineChart, {
                    //     data: lineChartData,
                    //     options: {
                    //         responsive: true,
                    //         maintainAspectRatio: false,
                    //         hoverMode: 'index',
                    //         stacked: false,
                    //         legend: {
                    //             display: false
                    //         },
                    //         title: {
                    //             display: false,
                    //             text: 'Chart.js Line Chart - Multi Axis'
                    //         },
                    //         tooltips: {
                    //             mode: 'index',
                    //             intersect: false,
                    //         },
                    //         hover: {
                    //             mode: 'nearest',
                    //             intersect: true
                    //         },
                    //         scales: {
                    //             yAxes: [
                    //             {
                    //                 type: 'linear',
                    //                 display: true,
                    //                 position: 'left',
                    //                 id: 'y-axis-1',

                    //                 ticks: {
                    //                     min: 0,
                    //                     max: <?php echo e($max + 4); ?>,

                    //                     step: 10
                    //                 }
                    //             }, {
                    //                 type: 'linear',
                    //                 display: false,
                    //                 position: 'right',
                    //                 id: 'y-axis-2',

                    //                 ticks: {
                    //                     min: 0,
                    //                     max: <?php echo e($max + 4); ?>,

                    //                     step: 10
                    //                 }
                    //             }, {
                    //                 type: 'linear',
                    //                 display: false,
                    //                 position: 'right',
                    //                 id: 'y-axis-3',

                    //                 ticks: {
                    //                     min: 0,
                    //                     max: <?php echo e($max + 4); ?>,

                    //                     step: 10
                    //                 }
                    //             }, {
                    //                 type: 'linear',
                    //                 display: false,
                    //                 position: 'right',
                    //                 id: 'y-axis-4',

                    //                 ticks: {
                    //                     min: 0,
                    //                     max: <?php echo e($max + 4); ?>,

                    //                     step: 10
                    //                 }
                    //             }],
                    //         },
                    //         elements: {
                    //             line: {
                    //                 tension: 0.4
                    //             }
                    //         },
                    //     }
                    // });
                    
                // polar area

                    var polarConfig = {
                        data: {
                            datasets: [{
                                data: polar.tot,
                                backgroundColor: [
                                    'rgba(35, 198, 200, 0.5)',
                                    'rgba(170, 102, 204, 0.5)',
                                    'rgba(255, 53, 71, 0.5)'],
                                label: 'My dataset' // for legend
                            }],
                            labels: polar.province
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false,
                                position: 'right',
                            },
                            title: {
                                display: false,
                                text: 'Chart.js Polar Area Chart'
                            },
                            scale: {
                                ticks: {
                                    max: <?php echo e($max2 + 3); ?>,
                                    beginAtZero: true
                                },
                                reverse: false
                            },
                            animation: {
                                animateRotate: false,
                                animateScale: true
                            },
                            tooltipFontSize: 10,
                            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>hrs",
                            percentageInnerCutout : 70
                        }
                    };

                    var myPolar = document.getElementById('myPolar');
                    window.myPolarArea = Chart.PolarArea(myPolar, polarConfig);

                // doughnut are

                    var doughnutConfig = {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: doughnut.tot,
                                backgroundColor: [
                                    'rgba(75, 81, 93, 0.5)',
                                    'rgba(255, 136, 0, 0.5)'
                                ],
                                label: 'Dataset 1'
                            }],
                            labels: doughnut.kelamin
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false,
                                position: 'top',
                            },
                            title: {
                                display: false,
                                text: 'Chart.js Doughnut Chart'
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    };

                    var myDoughnut = document.getElementById('myDoughnut').getContext('2d');
                    window.myDoughnut = new Chart(myDoughnut, doughnutConfig);

                c3.generate({
                    bindto: '#slineChart',
                    data:{
                        columns: [
                            ['Lawang',          
                                <?php 
                                    $con = mysqli_connect("localhost","root","","dishut");
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $lawang_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $lawang = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $lawang+$lawang_anggota.',';
                                    } 
                                ?>],
                            ['Tambaksari',      
                                <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $tambaksari_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $tambaksari = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $tambaksari+$tambaksari_anggota.',';
                                    } 
                                ?>],
                            ['Sumberbrantas',  
                                <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $sumber_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $sumber = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $sumber+$sumber_anggota.',';
                                    } 
                                ?>],
                            ['Tretes', 
                                <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $tambaksari_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $tambaksari = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $tambaksari+$tambaksari_anggota.',';
                                    } 
                                ?>]
                        ],
                        type: 'spline',
                        labels: true,
                        colors:{
                            Lawang: '#A5D6A7',
                            Tambaksari: '#80DEEA',
                            Sumberbrantas: '#FFCC80',
                            Tretes: '#FF8A65'
                        }
                    },
                    axis: {
                        x: {
                            type: 'category',
                            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                        },
                        y: {
                            label: {
                                text: 'Pendaki',
                                position: 'outer-middle'
                            }
                        }
                    }
                });
                
                var pieConfig = {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [
                                    <?php
                                        $regist = mysqli_num_rows(mysqli_query($con, 'SELECT pd_id FROM tb_pendakian'));
                                        $naik = mysqli_num_rows(mysqli_query($con, 'SELECT pd_id FROM tb_pendakian WHERE pd_pos_pendakian != ""')); 
                                        $turun = mysqli_num_rows(mysqli_query($con, 'SELECT pd_id FROM tb_pendakian WHERE pd_pos_turun != ""')); 
                                        echo $regist.','.$naik.','.$turun; ?>
                                        ],
                                backgroundColor: [
                                    'rgba(255, 64, 129, 0.5)',
                                    'rgba(3, 169, 244, 0.5)',
                                    'rgba(255, 136, 0, 0.5)'
                                ],
                                label: 'Dataset 1'
                            }],
                            labels: ['Jumlah Registrasi', 'Rombongan Sudah Naik', 'Rombongan Sudah Turun']
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false,
                                position: 'top',
                            },
                            title: {
                                display: false,
                                text: 'Chart.js Pie Chart'
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    };

                    var myPieChart = document.getElementById('myPieChart').getContext('2d');
                    window.myPieChart = new Chart(myPieChart, pieConfig);

                    // var lawang = {
                    //   label: "Lawang",
                    //   data: [<?php 
                    //                 for ($i = 1; $i <= 12; $i++) {
                    //                     $bln    = substr('0'.$i, -2); 
                    //                     $lawang_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                    //                     $lawang = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                    //                     echo $lawang+$lawang_anggota;
                    //                 } 
                    //             ?>
                    //  ] 
                    // };

                    // var tambaksari = {
                    //   label: "Tambaksari",
                    //   data: [<?php 
                    //                 for ($i = 1; $i <= 12; $i++) {
                    //                     $bln    = substr('0'.$i, -2); 
                    //                     $tambaksari_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                    //                     $tambaksari = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                    //                     echo $tambaksari+$tambaksari_anggota;
                    //                 } 
                    //             ?>
                    //         ]
                    // };

                    // var speedData = {
                    //   labels: ['Januari', '2', '3','4','5','6','7','8','9','10','11','12'],
                    //   datasets: [lawang, tambaksari]
                    // };

                    // var lineConfig = {
                    //     type: 'line',
                    //     data: speedData,  
                    //     options: {
                    //         responsive: true,
                    //         steppedLine: false,

                    //         legend: {
                    //             display: true,
                    //             position: 'bottom',
                    //         },
                    //         title: {
                    //             display: false,
                    //             text: 'Chart.js Line Chart'
                    //         },
                    //         animation: {
                    //             animateScale: true,
                    //             animateRotate: true
                    //         }
                    //     }
                    // };

                    // var myLineChart = document.getElementById('myLineChart').getContext('2d');
                    // window.myLineChart = new Chart(myLineChart, lineConfig);

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
                    toastr.success('Selamat Data <?php echo e(Auth::user()->nama); ?>', 'UPT Tahura Raden Soerjo');
                }, 1300);
            });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>