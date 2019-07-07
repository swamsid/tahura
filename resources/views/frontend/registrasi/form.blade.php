<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Pendakian </title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/styleregist.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/datepicker/dist/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/toast/dist/jquery.toast.min.css') }}">

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
     </style>

</head>

<body>
    <div id="page-wrapper" class="gray-bg" style="margin-top: -5px;">    
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Nomor Registrasi ..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>SOP Pendakian</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="tatacara.html">Tata Cara Pendaftaran</a>
                    </li>
                    <li>
                        <a href="sop.html">SOP Pendakian</a>
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
                            <form id="form-data" class="wizard-big">
                                <input type="hidden" name="_token" readonly value="{{ csrf_token() }}">
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
                                                        <input id="nama_ketua" name="nama_ketua" type="text" class="form-control" placeholder="contoh: Lucinta Luna" v-model="single.nama_ketua">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>No Identitas (KTP, Kartu Pelajar)</label>
                                                        <input id="no_ktp_ketua" name="no_ktp_ketua" type="number" class="form-control" placeholder="Contoh: 928938872800001" v-model="single.no_ktp_ketua">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input id="tempat_lahir_ketua" name="tempat_lahir_ketua" type="text" class="form-control" placeholder="Contoh : Surabaya" v-model="single.tempat_lahir_ketua">
                                                    </div>

                                                    <div class="form-group" id="data_1">
                                                        <label>Tanggal Lahir</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>

                                                            <vue-datepicker :name="'tgl_lahir_ketua'" :id="'tgl_lahir_ketua'" :class="'form-control'" :placeholder="'Pilih Tanggal Lahir Ketua'" :readonly="true" v-model="single.tgl_lahir_ketua"></vue-datepicker>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>No Hp</label>
                                                        <input id="no_hp_ketua" name="no_hp_ketua" type="number" class="form-control" placeholder="Masukkan Nomor Hp Ketua" v-model="single.no_hp_ketua">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input id="email_ketua" name="email_ketua" type="email" class="form-control" placeholder="Masukkan Email Ketua" v-model="single.email_ketua">
                                                    </div>

                                                    <div class="form-group" id="data_1">
                                                        <label>Tanggal Naik</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <vue-datepicker :name="'tgl_naik'" :id="'tgl_naik'" :class="'form-control'" :placeholder="'Pilih Tanggal Naik'" :readonly="true" v-model="single.tgl_naik"></vue-datepicker>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" id="data_1">
                                                        <label>Tanggal Turun</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <vue-datepicker :name="'tgl_turun'" :id="'tgl_turun'" :class="'form-control'" :placeholder="'Pilih Tanggal Turun'" :readonly="true" v-model="single.tgl_turun"></vue-datepicker>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Alamat Lengkap</label>
                                                        <textarea rows="1" class="form-control" style="resize: none;" placeholder="Masukkan Alamat Ketua" name="alamat_ketua" v-model="single.alamat_ketua"> </textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <vue-select :name="'provinsi_ketua'" :id="'provinsi_ketua'" :options="provinsi_ketua" :search="false" @option-change="provinsiChange"></vue-select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kabupaten / Kota</label>
                                                        <vue-select :name="'kabupaten_ketua'" :id="'kabupaten_ketua'" :options="kabupaten_ketua" :search="false" @option-change="kabupatenChange"></vue-select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <vue-select :name="'kecamatan_ketua'" :id="'kecamatan_ketua'" :options="kecamatan_ketua" :search="false" @option-change="kecamatanChange"></vue-select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Desa / Kelurahan</label>
                                                        <vue-select :name="'desa_ketua'" :id="'desa_ketua'" :options="desa_ketua" :search="false"></vue-select>
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
                                                        <input name="nama_kontak_darurat[]" type="text" class="form-control" :placeholder="'Nama kontak darurat '+(idx + 1)" v-model="kontak.nama">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>No HP</label>
                                                        <input name="no_kontak_darurat[]" type="text" class="form-control " :placeholder="'No hp kontak darurat '+(idx + 1)" v-model="kontak.no_hp">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Alamat Email</label>
                                                        <input id="email" name="email_kontak_darurat[]" type="text" class="form-control" :placeholder="'Email kontak darurat '+(idx + 1)" v-model="kontak.email">
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
                                                    Anggota Rombongan&nbsp;
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
                                                        <th width="40%">Nama</th>
                                                        <th width="30%">No Identitas</th>
                                                        <th width="25%">Jenis Kelamin</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr v-for="(anggota, idx) in anggota">
                                                        <td class="text-center">
                                                            <template v-if="idx > 0">
                                                                <i class="fa fa-trash hint" @click="deleteAnggota($event, idx)"></i>
                                                            </template>

                                                            <template v-if="idx == 0">
                                                                <i class="fa fa-lock"></i>
                                                            </template>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nama_anggota[]" class="form-control" style="width: 100%" :placeholder="'Nama Anggota Ke '+(idx+1)" v-model="anggota.nama"/>
                                                        </td>
                                                        <td>
                                                            <input type="mail" name="no_ktp_anggota[]"  class="form-control" :placeholder="'No KTP Anggota Ke '+(idx+1)" v-model="anggota.no_ktp"/>
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

                                    <div class="col-md-12" style="margin-top: 20px;">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h3 style="color: #1ab394">
                                                    Perlengkapan Yang DIbawa&nbsp;
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
                                                    <input name="tenda" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.tenda">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sleeping Bags / Kantong Tidur</label>
                                                    <input name="sleeping_bag" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.sleeping_bag">
                                                </div>
                                                <div class="form-group">
                                                    <label>Peralatan Masak</label>
                                                    <input name="peralatan_masak" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.peralatan_masak">
                                                </div>
                                                <div class="form-group">
                                                    <label>Bahan Bakar</label>
                                                    <input name="bahan_bakar" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.peralatan_masak">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ponco / Jas Hujan</label>
                                                    <input name="jas_hujan" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.jas_hujan">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Senter / Alat Penerangan</label>
                                                    <input name="senter" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.senter">
                                                </div>
                                                <div class="form-group">
                                                    <label>Obat-Obatan Pribadi dan P3K</label>
                                                    <input name="obat" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.obat">
                                                </div>
                                                <div class="form-group">
                                                    <label>Matras</label>
                                                    <input name="matras" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.matras">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kantong Sampah</label>
                                                    <input name="kantong_sampah" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.kantong_sampah">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jaket</label>
                                                    <input name="jaket" type="number" class="form-control" placeholder="Satuan dalam unit" v-model="single.jaket">
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
                                                                <i class="fa fa-trash hint" @click="deleteLogistik($event, idx)"></i>
                                                            </template>

                                                            <template v-if="idx == 0">
                                                                <i class="fa fa-lock"></i>
                                                            </template>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nama_logistik[]" class="form-control" placeholder="Masukkan Nama Logistik" v-model="logistik.nama"/>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="jumlah_logistik[]"  class="form-control" placeholder="Satuan dalam unit" v-model="logistik.jumlah"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 20px; border-top: 1px solid #ddd; padding: 20px 30px 0px 0px;">
                                    <div class="col-md-10 text-right" style="padding-top: 10px;">
                                        <small style="font-style: italic;" v-if="onRequest">@{{ requestMessage }}</small>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="button" class="btn btn-primary btn-sm" @click="send" :disabled="disabledButton">Kirim Formulir Registrasi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{{ asset('frontend/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('frontend/js/inspinia.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/pace/pace.min.js') }}"></script>

    <!-- Steps -->
    <script src="{{ asset('frontend/js/plugins/staps/jquery.steps.min.js') }}"></script>

    <!-- Jquery Validate -->
    <script src="{{ asset('frontend/js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- Input Mask-->
    <script src="{{ asset('frontend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('frontend/js/plugins/iCheck/icheck.min.js') }}"></script>

    <script src="{{ asset('frontend/js/vendors/datepicker/dist/datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/axios/axios.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/toast/dist/jquery.toast.min.js') }}"></script>

    <!-- Vue js -->
    <script src="{{ asset('frontend/js/vendors/vue/vue.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/vue/components/datepicker/datepicker.component.js') }}"></script>
    <script src="{{asset('frontend/js/vendors/vue/components/select/select.component.js')}}"></script>

    <script>

        function onMouted(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        }

        var vue = new Vue({
            el: '#page-wrapper',
            data: {

                // core
                disabledButton: false,
                onRequest: false,
                requestMessage: "Sedang Mengirim Formulir Registrasi",

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
                        no_hp: '',
                        email: '',
                        hub: 'Orang Tua',
                    },

                    {
                        nama: '',
                        no_hp: '',
                        email: '',
                        hub: 'Orang Tua',
                    }
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
                        no_ktp: '',
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
                        tgl_lahir_ketua: '{{ date("Y-m-d") }}',
                        no_hp_ketua: '',
                        email_ketua: '',
                        tgl_naik: '{{ date("Y-m-d") }}',
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

            mounted: function(){
                console.log('vue ready');
                $('[data-toggle="tooltip"]').tooltip();

                axios.get('{{ Route("frontend.registrasi.resource") }}')
                        .then((response) => {
                            console.log(response.data);

                            this.provinsi = response.data.provinsi;
                            this.kabupaten = response.data.kota;
                            this.kecamatan = response.data.kecamatan;
                            this.desa = response.data.kelurahan;

                            this.provinsi_ketua = this.provinsi;
                            this.provinsiChange(this.provinsi_ketua[0].id);

                        }).catch((e) => {
                            alert('ups. Terjadi Kesalahan. Err System...')
                            console.log('System Bermasalah '+e)
                        })
            },

            methods: {
                tambahAnggota: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.anggota.push({
                        nama: '',
                        no_ktp: '',
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
                    this.kabupaten_ketua = $.grep(this.kabupaten, function(a) { return a.province_id == e });
                    this.kabupatenChange(this.kabupaten_ketua[0].id);
                },

                kabupatenChange(e){
                    this.kecamatan_ketua = $.grep(this.kecamatan, function(a) { return a.regency_id == e });
                    this.kecamatanChange(this.kecamatan_ketua[0].id);
                },

                kecamatanChange(e){
                    this.desa_ketua = $.grep(this.desa, function(a) { return a.district_id == e });
                },

                send: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.disabledButton = true;
                    this.onRequest = true;

                    var dataForm = $('#form-data').serialize();

                    axios.post('{{ Route("frontend.registrasi.save") }}', dataForm)
                            .then((response) => {
                                console.log(response.data);
                                

                            }).catch((e) => {
                                console.log(e);
                                $.toast({
                                    text: 'System Error, '+e,
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    stack: 1
                                })
                            }).then((e) => {
                                this.onRequest = false;
                                this.requestMessage = 'Sedang menyimpan data..';
                                this.disabledButton = false;
                            })
                }
            }
        })
    
    </script>

</body>

</html>
