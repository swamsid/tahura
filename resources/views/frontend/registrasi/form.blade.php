<?php 
   include 'resources/views/config.php';
?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registrasi Pendakian Gunung Arjuno - Welirang </title>

    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/bootstrap-vue.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/styleregist.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.css') }}">


    <style type="text/css">
        
     </style>
</head>

<body>

<?php 
    if (!isset($_GET['variable'])) {
?>
<!--<div id="alert" class="modal fade vertical-alignment-helper">-->
<!--    <div class="modal-dialog vertical-align-center">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h2 class="modal-title" style="text-align:center; color: #1ab394; font-weight: 600">PEMBERITAHUAN</h2>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <p style="text-align: justify;">Terhitung mulai tanggal 02/01/2019 kegiatan pendakian Gunung Arjuno-Welirang dan Gunung Pundak ditutup sampai dengan batas waktu yang belum bisa ditentukan.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div id="myModal" class="modal fade vertical-alignment-helper" style="padding-left: 0px !important">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" style="text-align:center; color: #1ab394; font-weight: 600">PILIH TUJUAN</h2>
            </div>
            <div class="modal-body" style="padding-bottom: 15px">
                <div class="containerOuter">
                  <div class="kontener">
                    <!--<input type="radio" class="hidden" id="input1" name="colorRadio" value="arjuno">-->
                    <!--<label class="entry" for="input1"><div class="circle"></div><div class="entry-label">GUNUNG ARJUNO WELIRANG</div></label>-->
                    <input type="radio" class="hidden" id="input2" name="colorRadio" value="pundak">
                    <label class="entry" for="input2"><div class="circle"></div><div class="entry-label">GUNUNG PUNDAK / PUTHUK PULOSARI</div></label>
                    <input type="radio" class="hidden" id="input3" name="colorRadio" value="jengger">
                    <label class="entry" for="input3"><div class="circle"></div><div class="entry-label">WATU JENGGER</div></label>
                    <div class="highlight"></div>
                    <div class="overlay" style="height:80px"></div>
                  </div>
                </div>
                <svg width="0" height="0" viewBox="0 0 40 140">
                  <defs>
                    <mask id="holes">
                      <rect x="0" y="0" width="100" height="140" fill="white" />
                      <circle r="12" cx="20" cy="20" fill="black"/>
                      <circle r="12" cx="20" cy="70" fill="black"/>
                      <circle r="12" cx="20" cy="120" fill="black"/>
                    </mask>
                  </defs>
                </svg>
            </div>
            <div class="modal-body" style="padding: 0px 30px 30px 30px; color: #1ab394">
                Harap diperhatikan pendaki harus memenuhi protokol kesehatan 
                <ul style="padding-left:20px">
                    <li>
                        Wajib membawa hand sanitizer, memakai masker dan dipastikan kondisi sedang fit.
                    </li>
                    <li>
                        1 rombongan yang beranggotakan 10 orang wajib membawa surat keterangan sehat atau surat keterangan bebas covid-19.
                    </li>
                    <li>
                        Maksimal hanya boleh camp selama 1 malam dan 1 tenda berisi 2 orang.
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <input type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-primary" value="Lanjut">
            </div>
        </div>
    </div>
</div>
<?php } ?>

    <div id="page-wrapper" class="gray-bg" style="margin-top: -5px;">    
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header" style="padding: 15px 10px 0px 15px;">
                    <a href="{{ Route('frontend.cek_pendakian') }}" style="color: #aaa; font-size: 10pt;">Cek status pendakian anda disini</a>
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
                        <a href="{{ Route('frontend.registrasi') }}">Tata Cara Pendaftaran</a>
                    </li>
                    <li>
                        <a href="{{ Route('frontend.registrasi.sop') }}">SOP Pendakian</a>
                    </li>
                    <li class="active">
                        <strong>Registrasi Pendakian</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

<?php 
    if (isset($_GET['variable'])) {
?>
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
                            <div>
                                <template v-if="!downloadingResource">
                                    <form id="form-data" class="wizard-big" enctype="multipart/form-data" >
                                        <input type="hidden" name="_token" readonly value="{{ csrf_token() }}">
                                        @csrf
                                        <input type="radio" hidden value="<?php echo $_GET['variable'] ?>" checked name="tujuan">
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

                                                                <vue-mask :class="$v.single.no_ktp_ketua.$invalid ? 'form-control error' : 'form-control'" :placeholder="'______.______.____'" :name="'no_ktp_ketua'" :id="'no_ktp_ketua'" :mask="'000000.000000.0000'" :css="'text-align: left;'" v-model="single.no_ktp_ketua"></vue-mask>

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
                                                    <div class="col-md-10 col-xs-7">
                                                        <h3 style="color: #1ab394">
                                                            Anggota Rombongan <small>Ketua tidak perlu ditulis kembali</small>
                                                            <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan biodata daftar anggota rombongan"></i>
                                                        </h3>
                                                    </div>

                                                    <div class="col-md-2 col-xs-2">
                                                        <button type="button" class="btn btn-success btn-xs" style="padding: 5px 5px" @click="tambahAnggota">
                                                            <i class="fa fa-plus"></i> &nbsp;
                                                            Tambah Anggota
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12" style="background: #eee; margin-top: 10px; padding: 0px; overflow: auto;">
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
                                                                    <vue-mask :class="'form-control'" :placeholder="'______.______.____'" :name="'no_ktp_anggota[]'" :mask="'000000.000000.0000'" :css="'text-align: left;'" v-model="anggota.no_ktp"></vue-mask>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control hint" name="kewarganegaraan_anggota[]" v-model="anggota.kewarganegaraan">
                                                                        <option v-for="kewarganegaraan in kewarganegaraan" :value="kewarganegaraan.id">@{{ kewarganegaraan.text }}</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control hint" name="kelamin_anggota[]" v-model="anggota.kelamin">
                                                                        <option v-for="kelamin in kelamin" :value="kelamin.id">@{{ kelamin.text }}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </fieldset>
                                            </div>

                                            <?php 
                                                if (isset($_GET['variable']) && $_GET['variable'] == 'arjuno') {
                                            ?>

                                            <div class="col-md-12" style="margin-top: 20px">
                                                <h3 style="color: #1ab394">
                                                    Kontak Darurat &nbsp;
                                                    <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan kontak darurat yang suatu saat dapat dihubungi (keluarga, saudara, teman selain yang mengikuti rombongan pendakian)"></i>
                                                </h3>
                                            </div>

                                            <div class="col-md-12" style="background: #eee;">
                                                <fieldset style="font-size: 9pt;">  
                                                    <div class="row" v-for="(kontak, idx) in kontak_darurat" style="border-bottom: 1px solid white; padding-top: 10px">
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
                                                    <div class="col-md-10 col-xs-7">
                                                        <h3 style="color: #1ab394">
                                                            Logistik yang dibawa&nbsp;
                                                            <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Diisi dengan jumlah makanan dan minuman yang akan dibawa mendaki (satuan yang digunakan adalah unit)"></i>
                                                        </h3>
                                                    </div>

                                                    <div class="col-md-2 col-xs-2">
                                                        <button type="button" class="btn btn-success btn-xs" style="padding: 5px 5px" @click="tambahLogistik">
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
                                                                    <input type="text" :class="'form-control'" :placeholder="'Jumlah yang dibawa (2Kg)'" :name="'jumlah_logistik[]'" :css="'text-align: left;'" v-model="logistik.jumlah"></vue-mask>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </fieldset>
                                            </div>

                                            <?php 
                                               } 
                                            ?>

                                        </div>

                                        <div class="row" style="margin-top: 20px; border-top: 1px solid #ddd; padding: 20px 0 0 0 ;">
                                            <div class="col-md-10 text-right" style="padding-top: 10px;">
                                                <small style="font-style: italic;" v-if="onRequest">@{{ requestMessage }}</small>
                                            </div>
                                            <div class="col-md-2 text-right" >
                                                <button type="button" class="btn btn-primary btn-sm" @click="send" :disabled="disabledButton">Kirim Formulir Registrasi</button>
                                            </div>
                                        </div>
                                    </form>
                                </template>
                            </div>

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
<?php } ?>
        <div class="modal inmodal" id="modal-info" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" style="margin-bottom: 100px;">
                <div class="modal-content animated fade-in">
                    <div class="ibox product-detail">
                        <div class="ibox-content" style="margin-bottom: 0px; padding-bottom: 0px; padding-top: 10px;">
                            <div class="row">
                                <div class="col-md-12" style="padding: 0px 5px; border-bottom: 1px solid #eee;">
                                    <h4>Terimakasih</h4>
                                </div>

                                <div class="col-md-12" style="padding-top: 20px; text-align: justify;">
                                    Data registrasi pendakian anda sudah kami simpan. Anda akan mendapatkan sms notifikasi berisi nomor registrasi. Berkas perizinan dapat di unduh melalui menu cek status registrasi. </b>
                                </div>

                                <div class="col-md-12 text-right" style="padding: 15px 5px 0px 5px; border-top: 1px solid #eee; margin-top: 15px;">
                                    <a href="{{ Route('frontend.registrasi') }}">
                                        <button class="btn btn-primary">Baik, Saya Mengerti</button>
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

    <!-- iCheck -->
    <script src="{{ asset('public/frontend/js/plugins/iCheck/icheck.min.js') }}"></script>

    <script src="{{ asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/axios/axios.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.js') }}"></script>
    
    <script src="{{ asset('public/frontend/js/vendors/mask/dist/jquery.mask.js') }}"></script>

    <!-- Vue js -->
    <script src="{{ asset('public/frontend/js/vendors/vue/vue.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/bootstrap-vue.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/portal-vue.umd.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/components/datepicker/datepicker.component.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/components/select/select.component.js')}}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/vuelidate/dist/vuelidate.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/vuelidate/dist/validators.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/components/mask/mask.component.js')}}"></script>

    <script>

        Vue.use(window.vuelidate.default)
        const { required, minLength } = window.validators

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                        tgl_naik: '{{ date("d/m/Y") }}',
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

<?php if (isset($_GET['variable']) && $_GET['variable'] == 'arjuno') { ?>
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
                 <?php } ?>
                }
            },

            mounted: function(){
                console.log('vue ready');

                axios.get('{{ Route("frontend.registrasi.resource") }}')
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

                    axios.get("{{ Route('frontend.registrasi.resource.byprovinsi') }}?id="+e)
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
                    axios.get("{{ Route('frontend.registrasi.resource.bykabupaten') }}?id="+e)
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
                    axios.get("{{ Route('frontend.registrasi.resource.bykecamatan') }}?id="+e)
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

                        <?php if (isset($_GET['variable']) && $_GET['variable'] == 'arjuno') { ?>
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
                                    text: 'Data logistik yang sudah ditambahkan tidak boleh ada yang kosong..',
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    position: 'top-right',
                                    stack: 1
                                })

                                return false;
                            }
                        <?php } ?>

                        this.disabledButton = true;
                        this.onRequest = true;

                        var dataForm = $('#form-data').serialize();

                        axios.post('{{ Route("frontend.registrasi.save") }}', dataForm)
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
                    let response = true;

                    $.each(this.logistik, function(index, data){
                        if(data.nama == "" || data.jumlah == ""){
                            response = false;
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
                        this.single.tgl_lahir_ketua = '{{ date("d/m/Y") }}';
                        this.single.no_hp_ketua = '';
                        this.single.email_ketua = '';
                        this.single.tgl_naik = '{{ date("d/m/Y") }}';
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

    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("input[type='button']").click(function(){
                var radioValue = $("input[name='colorRadio']:checked").val();
                window.location.href = "{{ Route('frontend.registrasi.form') }}?variable=" + radioValue;
            });
        });
    </script>

</body>

</html>