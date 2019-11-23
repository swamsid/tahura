<?php
    $select = "SELECT *, b.name as desa, c.name as kecamatan, d.name as kabupaten, e.name as provinsi FROM tb_pendakian a JOIN villages b ON a.pd_desa = b.id JOIN districts c ON a.pd_kecamatan = c.id JOIN regencies d ON a.pd_kabupaten = d.id JOIN provinces e ON a.pd_provinsi = e.id WHERE pd_status = 'sudah naik' AND pd_pos_pendakian";

    include 'resources/views/config.php'; 

?>



<?php $__env->startSection('extra_style'); ?>
    <link href="<?php echo e(asset('public/backend/css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
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
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #FF9800;"></i> &nbsp;
                    <?php
                        $total_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_status = 'sudah naik' "));
                        $total = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_status = 'sudah naik' "));
                        $tot = $total_anggota+$total;
                    ?>
                    <span style="font-size: 16px">Total Pendaki Sedang Naik Pada <?php echo date('j F Y').' </span><span style="color:white; background-color:#FF9800; padding:6px 12px; border-radius:5px; line-height:40px">'.$tot?></span>&nbsp;
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #FF9800;"></i>
                </div>
            </div>
        </div>
        <div class="row dashboard-header">
        <a data-toggle='modal' data-target="#modal1">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #FF9800">Tambaksari</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $tambak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tambak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tambak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tambak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tambak_dash_wni+$tambak_dash_wna+$tambak_dash_anggota_wni+$tambak_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $tambak_dash_wni+$tambak_dash_anggota_wni; ?> WNI <br>
                                <?php echo $tambak_dash_wna+$tambak_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <!-- Modal 1 -->
        <div id="modal1" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos Tambakasari</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 1");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        
        <a data-toggle='modal' data-target="#modal2">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #FF9800">Sumberbrantas</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $sumber_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $sumber_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $sumber_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $sumber_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $sumber_dash_wni+$sumber_dash_wna+$sumber_dash_anggota_wni+$sumber_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $sumber_dash_wni+$sumber_dash_anggota_wni; ?> WNI <br>
                                <?php echo $sumber_dash_wna+$sumber_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal2" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos SumberBrantas</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 2");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal3">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #FF9800">Lawang</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $lawang_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lawang_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lawang_dash_wni= mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lawang_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lawang_dash_wni+$lawang_dash_wna+$lawang_dash_anggota_wni+$lawang_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $lawang_dash_wni+$lawang_dash_anggota_wni; ?> WNI <br>
                                <?php echo $lawang_dash_wna+$lawang_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal3" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos Lawang</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 3");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal4">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #FF9800">Tretes</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $tretes_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tretes_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tretes_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tretes_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tretes_dash_wni+$tretes_dash_wna+$tretes_dash_anggota_wni+$tretes_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $tretes_dash_wni+$tretes_dash_anggota_wni; ?> WNI <br>
                                <?php echo $tretes_dash_wna+$tretes_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal4" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos Tretes</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 4");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal5">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #FF9800">Lelaku</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $lelaku_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lelaku_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lelaku_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lelaku_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lelaku_dash_wni+$lelaku_dash_wna+$lelaku_dash_anggota_wni+$lelaku_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $lelaku_dash_wni+$lelaku_dash_anggota_wni; ?> WNI <br>
                                <?php echo $lelaku_dash_wna+$lelaku_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <!-- Modal 5 -->
        <div id="modal5" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lelaku Makutoromo</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 6");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal6">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #FF9800">Gunung Pundak</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $pundak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $pundak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $pundak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $pundak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $pundak_dash_wni+$pundak_dash_wna+$pundak_dash_anggota_wni+$pundak_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $pundak_dash_wni+$pundak_dash_anggota_wni; ?> WNI <br>
                                <?php echo $pundak_dash_wna+$pundak_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal6" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Gunung Pundak</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 5");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
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
            <div class="col-sm-12">
                <div class="chart-container">
                    <canvas class="flot-chart-content" id="flot-dashboard-chart" height="350"></canvas>
                </div>
            </div>
            <!-- <div class="col-sm-3">
                <div class="chart-container">
                    <canvas id="pie-chart" height="350"></canvas>
                </div>
            </div> -->
        </div>
        
            
            
    <?php else: ?>
        <div class="row border-bottom dashboard-header">
            <div class="col-md-12">
                <div class="row text-center">
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #FF9800;"></i> &nbsp;
                    <?php
                        $total_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_status = 'sudah naik' "));
                        $total = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_status = 'sudah naik' "));
                        $tot = $total_anggota+$total;
                    ?>
                    <span style="font-size: 16px">Total Pendaki Sedang Naik Pada <?php echo date('j F Y').' </span><span style="color:white; background-color:#FF9800; padding:6px 12px; border-radius:5px; line-height:40px">'.$tot?></span>&nbsp;
                    <i class="fa fa-arrow-down" style="font-size: 8pt; color: #FF9800;"></i>
                </div>
            </div>
        </div>
        <div class="row dashboard-header">
                <a data-toggle='modal' data-target="#modal1">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #FF9800">Tambaksari</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $tambak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tambak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tambak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tambak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 1 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tambak_dash_wni+$tambak_dash_wna+$tambak_dash_anggota_wni+$tambak_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $tambak_dash_wni+$tambak_dash_anggota_wni; ?> WNI <br>
                                <?php echo $tambak_dash_wna+$tambak_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <!-- Modal 1 -->
        <div id="modal1" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos Tambakasari</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 1");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        
        <a data-toggle='modal' data-target="#modal2">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #FF9800">Sumberbrantas</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $sumber_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $sumber_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $sumber_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $sumber_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 2 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $sumber_dash_wni+$sumber_dash_wna+$sumber_dash_anggota_wni+$sumber_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $sumber_dash_wni+$sumber_dash_anggota_wni; ?> WNI <br>
                                <?php echo $sumber_dash_wna+$sumber_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal2" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos SumberBrantas</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 2");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal3">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <span class="pull-right"></span>
                        <h5 style="color: #FF9800">Lawang</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $lawang_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lawang_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lawang_dash_wni= mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lawang_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 3 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lawang_dash_wni+$lawang_dash_wna+$lawang_dash_anggota_wni+$lawang_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $lawang_dash_wni+$lawang_dash_anggota_wni; ?> WNI <br>
                                <?php echo $lawang_dash_wna+$lawang_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal3" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos Lawang</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 3");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal4">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #FF9800">Tretes</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $tretes_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $tretes_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $tretes_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $tretes_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 4 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $tretes_dash_wni+$tretes_dash_wna+$tretes_dash_anggota_wni+$tretes_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $tretes_dash_wni+$tretes_dash_anggota_wni; ?> WNI <br>
                                <?php echo $tretes_dash_wna+$tretes_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal4" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pos Tretes</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 4");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal5">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #FF9800">Lelaku</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $lelaku_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $lelaku_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $lelaku_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $lelaku_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 6 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $lelaku_dash_wni+$lelaku_dash_wna+$lelaku_dash_anggota_wni+$lelaku_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $lelaku_dash_wni+$lelaku_dash_anggota_wni; ?> WNI <br>
                                <?php echo $lelaku_dash_wna+$lelaku_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <!-- Modal 5 -->
        <div id="modal5" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lelaku Makutoromo</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 6");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <a data-toggle='modal' data-target="#modal6">
            <div class="col-lg-2" style="padding: 5px">
                <div class="ibox float-e-margins" style="margin-bottom: 0px">
                    <div class="ibox-title">
                        <h5 style="color: #FF9800">Gunung Pundak</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <h1 class="no-margins" style="padding-bottom: 5px; font-size: 25px; color: #FF9800; font-weight: 400">
                            <?php
                                $pundak_dash_anggota_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNI' "));
                                $pundak_dash_anggota_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND ap_kewarganegaraan = 'WNA' "));
                                $pundak_dash_wni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNI' "));
                                $pundak_dash_wna = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND pd_status = 'sudah naik' AND pd_kewarganegaraan = 'WNA' "));
                                echo $pundak_dash_wni+$pundak_dash_wna+$pundak_dash_anggota_wni+$pundak_dash_anggota_wna;
                            ?>
                        <small style="float: right;">
                            <b class="rincian" style="color: #FF9800; font-weight: 100">
                                <?php echo $pundak_dash_wni+$pundak_dash_anggota_wni; ?> WNI <br>
                                <?php echo $pundak_dash_wna+$pundak_dash_anggota_wna; ?> WNA
                            </b>
                        </small>
                        Orang</h1>
                    </div>
                </div>
            </div>
        </a>
        <div id="modal6" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Gunung Pundak</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="table-responsive" style="height: 500px; overflow: auto;">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1000px; overflow: auto;">
                                <thead>
                                  <tr>
                                    <th width="20px">No</th>
                                    <th width="115px">Nomor Registrasi</th>
                                    <th>Nama Ketua <span style="font-size: 90%">(Telepon - Alamat)</span></th>
                                    <th width="120px">Anggota <span style="font-size: 90%">(Telepon)</span></th>
                                    <th width="100px">Kontak Darurat</th>
                                    <th width="100px">Tanggal Naik</th>
                                    <th width="100px">Tanggal Turun <span style="font-size: 90%">(Rencana)</span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $result = mysqli_query($con, " ".$select." = 5");
                                        while ($data = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $data['pd_nomor'] ?> </td>
                                                <td> <?php echo "<b>" .$data['pd_nama_ketua']."</b> (" .$data['pd_no_hp']. " - " .$data['pd_alamat']. ", " .$data['desa']. ", ".$data['kecamatan']. ", ".$data['kabupaten']. ", ".$data['provinsi']. ")"?> </td>
                                                <td>
                                                    <ol style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['ap_nama']. "</b> (" .$res['ap_no_telp']. ")" ;?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="padding-left: 15px">
                                                        <?php
                                                            $query = mysqli_query($con, "SELECT * FROM tb_kontak_darurat WHERE kd_pendakian = '".$data['pd_id']."' ");
                                                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
                                                            {
                                                                ?>
                                                                    <li><?php echo "<b>" .$res['kd_nama']. "</b> (" .$res['kd_no_telp']. " - ". $res['kd_hubungan'] .")" ; ?></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_naik'])) ?> </td>
                                                <td> <?php echo date('d/m/Y', strtotime($data['pd_tgl_turun'])) ?> </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>                          
                            </table>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- <div class="row border-bottom white-bg dashboard-header">
            Dashboard Petugas
        </div> -->
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
                            },
                            {
                                label: "Gunung Pundak",
                                data: [
                                    <?php 
                                    for ($i = 1; $i <= 12; $i++) {
                                        $bln    = substr('0'.$i, -2); 
                                        $pundak_anggota = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE pd_pos_pendakian = 5 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        $pundak = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_pos_pendakian = 5 AND MONTH(pd_tgl_naik) = $bln AND YEAR(pd_tgl_naik) = YEAR(curdate())"));
                                        echo $pundak+$pundak_anggota.',';
                                    } ?>
                                ],
                                backgroundColor : "rgba(156,39,176,0.4)",
                                borderColor : "rgba(156,39,176,0.4)",
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
                
                // new Chart(document.getElementById("pie-chart"), 
                // {
                //     type: 'pie',
                //     data: {
                //       labels: ["Warga Negara Indonesia", "Warga Negara Asing"],
                //       datasets: [{
                //         backgroundColor: ["#80DEEA","#90A4AE"],
                //         data: [
                //             <?php
                //                 $anggotaWNI = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE b.ap_kewarganegaraan = 'WNI' AND YEAR(a.pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                //                 $ketuaWNI = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_kewarganegaraan = 'WNI' AND YEAR(pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                //                 echo $anggotaWNI+$ketuaWNI;
                //             ?>
                //             ,
                //             <?php
                //                 $anggotaWNA = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian a JOIN tb_anggota_pendakian b ON a.pd_id = b.ap_pendakian WHERE b.ap_kewarganegaraan = 'WNA' AND YEAR(a.pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                //                 $ketuaWNA = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pendakian WHERE pd_kewarganegaraan = 'WNA' AND YEAR(pd_tgl_naik) = YEAR(curdate()) AND pd_pos_pendakian != '' "));
                //                 echo $anggotaWNA+$ketuaWNA;
                //             ?>
                //             ]
                //       }]
                //     },
                //     options: {
                //         responsive: true,
                //         legend: {
                //             position: 'bottom'
                //         },
                //     }
                // });

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

    <script src="<?php echo e(asset('public/backend/js/plugins/dataTables/datatables.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            <?php if(Session::has('message')): ?>
                // alert('<?php echo e(Session::get("message")); ?>');
                // <?php echo e(Session::forget('message')); ?>

            <?php endif; ?>

            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel'},
                    {extend: 'pdf'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>