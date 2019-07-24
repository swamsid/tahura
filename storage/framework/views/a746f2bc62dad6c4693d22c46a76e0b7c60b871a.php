<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->posisi == 'kantor'): ?>
        <div class="row border-bottom white-bg dashboard-header">
            <!-- <div class="col-sm-3">
                <h2>Selamat Datang</h2>
                <small>Daftar top 5 pendaki pada tahun 2019</small>
                <ul class="list-group clear-list m-t">
                    <li class="list-group-item fist-item">
                        <span class="pull-right">
                            09:00 pm
                        </span>
                        <span class="label" style="background-color: #64B5F6; color: white">1</span> --
                    </li>
                    <li class="list-group-item">
                        <span class="label" style="background-color: #42A5F5; color: white">2</span> --
                    </li>
                    <li class="list-group-item">
                        <span class="label" style="background-color: #2196F3; color: white">3</span> --
                    </li>
                    <li class="list-group-item">
                        <span class="label" style="background-color: #1E88E5; color: white" >4</span> --
                    </li>
                    <li class="list-group-item">
                        <span class="label" style="background-color: #1976D2; color: white">5</span> --
                    </li>
                </ul>
            </div> -->

            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jumlah pendaki pada tahun 2019 </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="slineChart" ></div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row border-bottom white-bg dashboard-header">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Hallo Petugas Pos</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        Isi Dashboard khusus penjaga pos
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>
    <script>
        $(document).ready(function () {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Selamat Data <?php echo e(Auth::user()->nama); ?>', 'UPT Tahura Raden Soerjo');
            }, 1300);

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
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>