<?php $__env->startSection('extra_style'); ?>
  <!-- Data Tables -->
  <link href="<?php echo e(asset('public/backend/css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
    <style type="text/css">
        .table-mini th, .table-mini td{
            border: 1px solid #ccc;
            padding: 5px;
        }

        .table-mini th{
            padding: 5px;
            background: #eee;
            text-align: left;
        },

        .table-mini td{
            padding: 0px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="wrapper wrapper-content animated fadeInRight minimize">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins ukuran_minimize_detil">
                    <div class="ibox-title">
                        <h5>Data Pendaftaran Pendakian</h5>
                        <div class="ibox-tools">
                            <a href="<?php echo e(Route('wpadmin.pendaki.index')); ?>"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <div class="row">
                            <div class="col-md-12" style="color: #1ab394">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Ketua Regu</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Nama Ketua </td>
                                        <td><?php echo e($data->pd_nama_ketua); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Alamat Lengkap </td>
                                        <td><?php echo e($data->pd_alamat); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Nomor Identitas </td>
                                        <td><?php echo e($data->pd_no_ktp); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Provinsi </td>
                                        <td><?php echo e($data->provinsi); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tempat Lahir </td>
                                        <td><?php echo e($data->pd_tempat_lahir); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kabupaten/Kota </td>
                                        <td><?php echo e($data->kabupaten); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tanggal Lahir </td>
                                        <td><?php echo e(date('d/m/Y', strtotime($data->pd_tgl_lahir))); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kecamatan </td>
                                        <td><?php echo e($data->kecamatan); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">No Hp </td>
                                        <td><?php echo e($data->pd_no_hp); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Desa/Kelurahan </td>
                                        <td><?php echo e($data->kelurahan); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Email </td>
                                        <td><?php echo e($data->pd_email); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kewarganegaraan </td>
                                        <td><?php echo e($data->pd_kewarganegaraan); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tanggal Naik </td>
                                        <td><?php echo e(date('d/m/Y', strtotime($data->pd_tgl_naik))); ?></td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Jenis Kelamin </td>
                                        <td><?php echo e(($data->pd_jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan'); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tanggal Turun </td>
                                        <td><?php echo e(date('d/m/Y', strtotime($data->pd_tgl_turun))); ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 20px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Kontak Darurat</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                   <tr>
                                       <th>Nama Kontak Darurat</th>
                                       <th>No Hp Kontak Darurat</th>
                                       <th>Alamat Email Kontak Darurat</th>
                                       <th>Hubungan Keluarga</th>
                                   </tr>

                                   <?php $__currentLoopData = $data->kontak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kontak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                           <td class="text-center"><?php echo e($kontak->kd_nama); ?></td>
                                           <td class="text-center"><?php echo e($kontak->kd_no_telp); ?></td>
                                           <td class="text-center"><?php echo e($kontak->kd_email); ?></td>
                                           <td class="text-center"><?php echo e($kontak->kd_hubungan); ?></td>
                                       </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 20px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Anggota Regu</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                   <tr>
                                       <th>Nama Anggota</th>
                                       <th>No Identitas</th>
                                       <th>Jenis Kelamin</th>
                                   </tr>

                                   <?php $__currentLoopData = $data->anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                           <td class="text-center"><?php echo e($anggota->ap_nama); ?></td>
                                           <td class="text-center"><?php echo e($anggota->ap_no_ktp); ?></td>
                                           <td class="text-center"><?php echo e(($anggota->ap_kelamin == 'L') ? 'Laki-laki' : 'Perempuan'); ?></td>
                                       </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 20px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Anggota Regu</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tenda </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_tenda); ?> Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Senter/Alat Penerangan </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_senter); ?> Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Sleeping Bags/Kantong Tidur </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_sleeping_bag); ?> Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Obat-obatan Pribadi dan P3K </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_obat); ?> Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Peralatan Masak </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_peralatan_masak); ?> Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Matras </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_matras); ?> Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Bahan Bakar </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_bahan_bakar); ?> Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kantong Sampah </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_kantong_sampah); ?> Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Ponco/Jas Hujan </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_ponco); ?> Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Jaket </td>
                                        <td class="text-center"><?php echo e($data->peralatan->pr_jaket); ?> Unit</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 20px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Logistik</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                   <tr>
                                       <th>Nama Logistik</th>
                                       <th>Jumlah yang dibawa</th>
                                   </tr>

                                   <?php $__currentLoopData = $data->logistik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logistik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                           <td class="text-center"><?php echo e($logistik->lg_nama); ?></td>
                                           <td class="text-center"><?php echo e($logistik->lg_jumlah); ?></td>
                                       </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 20px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Pendakian</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                   <tr>
                                       <th width="10%">Nomor Registrasi</th>
                                       <th width="14%">Tanggal Registrasi</th>
                                       <th width="14%">Status Pendakian</th>
                                   </tr>

                                   <tr>
                                        <td class="text-center"><?php echo e($data->pd_nomor); ?></td>
                                        <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->pd_tanggal_registrasi))); ?></td>
                                        <td class="text-center" style="font-weight: 500;">
                                          <span class="label label-info"><?php echo e($data->pd_status); ?></span>
                                        </td>
                                   </tr>
                                </table>
                            </div>

                            <div class="col-md-12" style="margin-top: 20px;">
                                <table class="table-mini" width="100%" border="1">
                                   <tr>
                                       <th width="14%">Tanggal Naik</th>
                                       <th width="14%">Pos Naik Via</th>
                                       <th width="17%">Di Acc Naik Oleh</th>
                                       <th width="14%">Tanggal Turun</th>
                                       <th width="14%">Pos Turun Via</th>
                                       <th width="17%">Di Acc Turun Oleh</th>
                                   </tr>

                                   <tr>
                                        <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->pd_tgl_naik))); ?> &nbsp;<small><b><?php echo e(($data->pos_naik) ? '' : '(rencana)'); ?></b></small></td>
                                        <td class="text-center" style="font-weight: 500;"><?php echo e(($data->pos_naik) ? $data->pos_naik : '---'); ?></td>
                                        <td class="text-center"><?php echo e(($data->acc_naik_by) ? $data->acc_naik_by : '---'); ?></td>
                                        <td class="text-center"><?php echo e(($data->pd_tgl_turun) ? date('d/m/Y', strtotime($data->pd_tgl_turun)) : '---'); ?> &nbsp;<small><b><?php echo e(($data->pos_turun) ? '' : '(rencana)'); ?></b></small></td>
                                        <td class="text-center" style="font-weight: 500;"><?php echo e(($data->pos_turun) ? $data->pos_turun : '---'); ?></td>
                                        <td class="text-center"><?php echo e(($data->acc_turun_by) ? $data->acc_turun_by : '---'); ?></td>
                                   </tr>
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 30px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Dokumen Penunjang</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 20px;">
                              <div class="file-box">
                                <div class="file">
                                    <a href="<?php echo e(Route('wpadmin.pendaki.pdf', 'id='.$data->pd_id)); ?>" target="_blank">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file-pdf-o" style="color: #0099CC"></i>
                                        </div>
                                        <div class="file-name text-center">
                                            berkas-pendaftaran.pdf
                                            <br/>
                                            <?php if($data->pd_status != 'belum disetujui'): ?>
                                              <small>Sudah dikirim ke email ketua</small>
                                            <?php else: ?>
                                              <small>Belum dikirim ke email ketua</small>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                              </div>

                              <div class="file-box">
                                <div class="file">
                                    <a href="<?php echo e(Route('wpadmin.pendaki.qr', 'id='.$data->pd_id)); ?>" target="_blank">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <img src="data:image/png;base64, <?php echo e(base64_encode($qrcode)); ?> " width="100">
                                        </div>
                                        <div class="file-name text-center">
                                            kode-QR-pendaftaran.pdf
                                            <br/>
                                            <?php if($data->pd_status != 'belum disetujui'): ?>
                                              <small>Sudah dikirim ke email ketua</small>
                                            <?php else: ?>
                                              <small>Belum dikirim ke email ketua</small>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                              </div>

                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px; border-top: 1px solid #eee;">
                            <div class="col-md-12 text-right" style="padding-top: 15px;">
                                <?php if($data->pd_status == 'belum disetujui'): ?>
                                    
                                    <?php if(Auth::user()->posisi == 'kantor'): ?>
                                      <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">Konfirmasi Pendaftaran &nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo e(Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=disetujui')); ?>">Setujui</a></li>
                                            <li><a href="<?php echo e(Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=ditolak')); ?>">Tolak</a></li>
                                        </ul>
                                    </div>
                                    <?php else: ?>
                                      <span class="label label-info">Hanya Petugas Kantor Yang Dapat Konfirmasi Pendaftaran</span>
                                    <?php endif; ?>

                                <?php elseif($data->pd_status == 'disetujui'): ?>

                                  <?php if(Auth::user()->posisi == 'pos' || Auth::user()->posisi == 'kantor'): ?>
                                    <button data-toggle="modal" data-target="#modal-pos-naik" class="btn btn-primary dropdown-toggle btn-sm">
                                    Tandai Sudah Naik &nbsp;<span class="caret"></span></button>
                                  <?php else: ?>
                                    <span class="label label-info">Hanya Petugas Pos Yang Dapat Acc Naik/Turun</span>
                                  <?php endif; ?>  

                                <?php elseif($data->pd_status == 'sudah naik'): ?>

                                  <?php if(Auth::user()->posisi == 'pos' || Auth::user()->posisi == 'kantor'): ?>
                                    <button data-toggle="modal" data-target="#modal-pos-turun" class="btn btn-primary dropdown-toggle btn-sm">
                                    Tandai Sudah Turun &nbsp;<span class="caret"></span></button>
                                  <?php else: ?>
                                    <span class="label label-info">Hanya Petugas Pos Yang Dapat Acc Naik/Turun</span>
                                  <?php endif; ?> 

                                <?php elseif($data->pd_status == 'sudah turun'): ?>
                                    <span class="label label-primary">Pendakian Ini Sudah Selesai</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
  </div>

    <div class="modal inmodal" id="modal-pos-naik" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width: 30%">
            <div class="modal-content animated">
                <div class="row" style="padding: 10px 20px;">
                  <?php $__currentLoopData = $pos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pos1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-12" style="padding: 8px 15px; color: #666; border-top: 1px solid #ccc;">
                        <a href="<?php echo e(Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=sudah naik&pos='.$pos1->pp_id)); ?>">Via <?php echo e($pos1->pp_nama); ?></a>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="modal-pos-turun" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width: 30%">
            <div class="modal-content animated">
                <div class="row" style="padding: 10px 20px;">
                  <?php $__currentLoopData = $pos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pos2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-12" style="padding: 8px 15px; color: #666; border-top: 1px solid #ccc;">
                        <a href="<?php echo e(Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=sudah turun&pos='.$pos2->pp_id)); ?>">Via <?php echo e($pos2->pp_nama); ?></a>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>
  <!-- Data Tables -->
    <script src="<?php echo e(asset('public/backend/js/plugins/dataTables/datatables.min.js')); ?>"></script>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/backend/pendaki/detail/index.blade.php ENDPATH**/ ?>