@extends('backend.main')

@section('extra_style')
  <!-- Data Tables -->
  <link href="{{ asset('backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
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
@endsection

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pendaftaran Pendakian</h5>
                        <div class="ibox-tools">
                            <a href="{{ Route('wpadmin.pendaki.index') }}"><i class="fa fa-arrow-left"></i></a>
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
                                        <td>{{ $data->pd_nama_ketua }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Alamat Lengkap </td>
                                        <td>{{ $data->pd_alamat }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Nomor Identitas </td>
                                        <td>{{ $data->pd_no_ktp }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Provinsi </td>
                                        <td>{{ $data->provinsi }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tempat Lahir </td>
                                        <td>{{ $data->pd_tempat_lahir }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kabupaten/Kota </td>
                                        <td>{{ $data->kabupaten }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tanggal Lahir </td>
                                        <td>{{ date('d/m/Y', strtotime($data->pd_tgl_lahir)) }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kecamatan </td>
                                        <td>{{ $data->kecamatan }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">No Hp </td>
                                        <td>{{ $data->pd_no_hp }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Desa/Kelurahan </td>
                                        <td>{{ $data->kelurahan }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Email </td>
                                        <td>{{ $data->pd_email }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kewarganegaraan </td>
                                        <td>{{ $data->pd_kewarganegaraan }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tanggal Naik </td>
                                        <td>{{ date('d/m/Y', strtotime($data->pd_tgl_naik)) }}</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Jenis Kelamin </td>
                                        <td>{{ ($data->pd_jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Tanggal Turun </td>
                                        <td>{{ date('d/m/Y', strtotime($data->pd_tgl_turun)) }}</td>
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

                                   @foreach($data->kontak as $key => $kontak)
                                        <tr>
                                           <td class="text-center">{{ $kontak->kd_nama }}</td>
                                           <td class="text-center">{{ $kontak->kd_no_telp }}</td>
                                           <td class="text-center">{{ $kontak->kd_email }}</td>
                                           <td class="text-center">{{ $kontak->kd_hubungan }}</td>
                                       </tr>
                                   @endforeach
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

                                   @foreach($data->anggota as $key => $anggota)
                                        <tr>
                                           <td class="text-center">{{ $anggota->ap_nama }}</td>
                                           <td class="text-center">{{ $anggota->ap_no_ktp }}</td>
                                           <td class="text-center">{{ ($anggota->ap_kelamin == 'L') ? 'Laki-laki' : 'Perempuan' }}</td>
                                       </tr>
                                   @endforeach
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
                                        <td class="text-center">{{ $data->peralatan->pr_tenda }} Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Senter/Alat Penerangan </td>
                                        <td class="text-center">{{ $data->peralatan->pr_senter }} Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Sleeping Bags/Kantong Tidur </td>
                                        <td class="text-center">{{ $data->peralatan->pr_sleeping_bag }} Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Obat-obatan Pribadi dan P3K </td>
                                        <td class="text-center">{{ $data->peralatan->pr_obat }} Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Peralatan Masak </td>
                                        <td class="text-center">{{ $data->peralatan->pr_peralatan_masak }} Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Matras </td>
                                        <td class="text-center">{{ $data->peralatan->pr_matras }} Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Bahan Bakar </td>
                                        <td class="text-center">{{ $data->peralatan->pr_bahan_bakar }} Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Kantong Sampah </td>
                                        <td class="text-center">{{ $data->peralatan->pr_kantong_sampah }} Unit</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" style="background: #eee; font-weight: 600;">Ponco/Jas Hujan </td>
                                        <td class="text-center">{{ $data->peralatan->pr_ponco }} Unit</td>

                                        <td class="text-left" style="background: #eee; font-weight: 600;">Jaket </td>
                                        <td class="text-center">{{ $data->peralatan->pr_jaket }} Unit</td>
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

                                   @foreach($data->logistik as $key => $logistik)
                                        <tr>
                                           <td class="text-center">{{ $logistik->lg_nama }}</td>
                                           <td class="text-center">{{ $logistik->lg_jumlah }}</td>
                                       </tr>
                                   @endforeach
                                </table>
                            </div>

                            <div class="col-md-12" style="color: #1ab394; margin-top: 20px;">
                                <i class="fa fa-arrow-right"></i> &nbsp;
                                <strong>Informasi Pendakian</strong>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <table class="table-mini" width="100%" border="1">
                                   <tr>
                                       <th>Status Pendakian</th>
                                       <th>Rencana Tgl Naik</th>
                                       <th>Pos Naik Via</th>
                                       <th>Rencana Tgl Turun</th>
                                       <th>Pos Turun Via</th>
                                   </tr>

                                   <tr>
                                        <td class="text-center" style="font-weight: 500;">{{ $data->pd_status }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($data->pd_tgl_naik)) }}</td>
                                        <td class="text-center" style="font-weight: 500;">{{ ($data->pos_naik) ? $data->pos_naik : '---' }}</td>
                                        <td class="text-center">{{ ($data->pd_tgl_turun) ? date('d/m/Y', strtotime($data->pd_tgl_turun)) : '---' }}</td>
                                        <td class="text-center" style="font-weight: 500;">{{ ($data->pos_turun) ? $data->pos_turun : '---' }}</td>
                                   </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px; border-top: 1px solid #eee;">
                            <div class="col-md-12 text-right" style="padding-top: 15px;">
                                @if($data->pd_status == 'registered')
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">Konfirmasi Registrasi &nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=diterima') }}">Terima</a></li>
                                            <li><a href="{{ Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=ditolak') }}">Tolak</a></li>
                                        </ul>
                                    </div>
                                @elseif($data->pd_status == 'diterima')
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                        Tandai Sudah Naik &nbsp;<span class="caret"></span></button>

                                        <ul class="dropdown-menu">
                                            @foreach($pos as $key => $pos)
                                                <li><a href="{{ Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=sudah naik&pos='.$pos->pp_id) }}">Via {{ $pos->pp_nama }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($data->pd_status == 'sudah naik')
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                        Tandai Sudah Turun &nbsp;<span class="caret"></span></button>

                                        <ul class="dropdown-menu">
                                            @foreach($pos as $key => $pos)
                                                <li><a href="{{ Route('wpadmin.pendaki.konfirmasi', 'id='.$data->pd_id.'&sts=sudah turun&pos='.$pos->pp_id) }}">Via {{ $pos->pp_nama }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($data->pd_status == 'sudah turun')
                                    <span class="label label-primary">Pendakian Ini Sudah Selesai</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
  </div>

    <div class="modal inmodal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-md modal-sm" style="margin-bottom: 100px;">
            <div class="modal-content animated">
                <div class="ibox product-detail">
                    <div class="ibox-content" id="detail-wrap" style="margin-bottom: 0px; padding-bottom: 0px;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
  <!-- Data Tables -->
    <script src="{{ asset('backend/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script type="text/javascript">

    </script>
@endsection