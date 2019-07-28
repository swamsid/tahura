<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:0;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:0;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-xeyn{font-weight:bold;font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-2c25{font-weight:bold;font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-puex{font-size:14px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center}
.tg .tg-lj5e{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-rv8m{font-size:11px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center}
.tg .tg-vlyc{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:left;vertical-align:top}
.list tr td{padding: 0px !important;}
</style>

<table class="tg" style="undefined;table-layout: fixed; width: 100%">
  <tr>
    <th rowspan="4"><img style="height: 100px" src="<?php echo e(asset('public/backend/img/LogoJawaTimur.png')); ?>"></th>
    <th colspan="2" style="font-weight: bold; text-align: center;">LAPORAN PENDAKI MASUK</th>
    <th rowspan="4"></th>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold; text-align: center;">GUNUNG ARJUNO - WELIRANG</td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold; text-align: center;">JALUR <?php echo e(($jalur) ? $jalur->pp_nama : '---'); ?></td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold; text-align: center;">TANGGAL <?php echo e($_GET['tgl_1']); ?> - <?php echo e($_GET['tgl_2']); ?></td>
  </tr>
  <tr>
    <td colspan="4"><hr></td>
  </tr>
</table>

<style type="text/css">
.ta  {border-collapse:collapse;border-spacing:0;}
.ta td{font-family:Arial, sans-serif;font-size:12px;padding:3px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black; text-align: center;}
.ta th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:3px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black; text-align: center;}
.ta .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
.ta .tg-s268{text-align:left}
.ta .tg-0lax{text-align:left;vertical-align:top}
</style>

<table class="ta" style="margin-top: 15px; width: 100%">
  <tr>
    <th width="5%">No</th>
    <th width="10%">Nama Ketua</th>
    <th width="18%">Kota Asal</th>
    <th width="15%">Tanggal Naik</th>
    <th width="15%">Tanggal Turun</th>
    <th width="17%">Jalur Turun</th>
    <th width="10%">Anggota</th>
    <th width="10%">Status</th>
  </tr>
  <?php $totKetua = $totAnggota = 0; ?>
  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($key + 1); ?>.</td>
      <td><?php echo e($pd->pd_nama_ketua); ?></td>
      <td><?php echo e($pd->name); ?></td>
      <td><?php echo e(date('d/m/Y', strtotime($pd->pd_tgl_naik))); ?></td>
      <td><?php echo e(date('d/m/Y', strtotime($pd->pd_tgl_turun))); ?> &nbsp;<small><b><?php echo e(($pd->pd_pos_turun) ? '' : '(rencana)'); ?></b></small></td>
      <td><?php echo e(($pd->pd_pos_turun) ? $pd->pp_nama : '---'); ?></td>
      <td><?php echo e(count($pd->anggota)); ?> Orang</td>
      <td><?php echo e($pd->pd_status); ?></td>
    </tr>

    <?php $totKetua++; $totAnggota += count($pd->anggota) ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<table class="ta" style="margin-top: 30px; width: 30%; ">
  <tr>
    <th colspan="2">Total Pendaki Naik :</th>
  </tr>

  <tr>
    <td>Ketua</td>
    <td><?php echo e($totKetua); ?> orang</td>
  </tr>

  <tr>
    <td>Anggota</td>
    <td><?php echo e($totAnggota); ?> orang</td>
  </tr>

  <tr>
    <td style="background: #cccccc; font-weight: bold">Total</td>
    <td style="background: #cccccc; font-weight: bold"><?php echo e($totAnggota + $totKetua); ?> orang</td>
  </tr>
</table><?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/backend/pdf/laporan.blade.php ENDPATH**/ ?>