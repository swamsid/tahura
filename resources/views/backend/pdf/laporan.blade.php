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
    <th rowspan="3"><img style="height: 100px" src="{{ asset('backend/img/LogoJawaTimur.png') }}"></th>
    <th colspan="2" style="font-weight: bold; text-align: center;">LAPORAN PENDAKI MASUK</th>
    <th rowspan="3"></th>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold; text-align: center;">GUNUNG ARJUNO - WELIRANG</td>
  </tr>
  <!-- <tr>
    <td colspan="2" style="font-weight: bold; text-align: center;">JALUR "CODE"</td>
  </tr> -->
  <tr>
    <td colspan="2" style="font-weight: bold; text-align: center;">TANGGAL {{ $_GET['tgl_1'] }} - {{ $_GET['tgl_2'] }}</td>
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
    <th>No</th>
    <th>Nama Ketua</th>
    <th>Kota Asal</th>
    <th>Tanggal Naik</th>
    <th>Tanggal Turun</th>
    <th>Jalur Turun</th>
    <th>Anggota</th>
    <th>Status</th>
  </tr>
  @foreach($data as $key => $pd)
    <tr>
      <td>{{ $key + 1 }}.</td>
      <td>{{ $pd->pd_nama_ketua }}</td>
      <td>{{ $pd->pd_kabupaten }}</td>
      <td>{{ date('d/m/Y', strtotime($pd->pd_tgl_naik)) }}</td>
      <td>{{ date('d/m/Y', strtotime($pd->pd_tgl_turun)) }}</td>
      <td>{{ $pd->pd_pos_pendakian }}</td>
      <td>{{ count($pd->anggota) }}</td>
      <td>{{ $pd->pd_status }}</td>
    </tr>
  @endforeach
</table>