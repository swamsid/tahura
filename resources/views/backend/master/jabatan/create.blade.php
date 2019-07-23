@extends('backend.main')

@section('extra_style')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.css') }}">

    <style type="text/css">
        [v-cloak]{
            display: none;
        }

        .model-form-template:not(:first-child){
            margin-top: 15px;
        }

        .label-form{
            padding-top: 5px;
            font-size: 9pt;
        }

        input[type=text]{
            height: 30px;
            font-size: 9pt;
        }

        .table-mini{
            font-size: 9pt;
        }

        .table-mini td, .table-mini th{
            padding: 5px;
            border: 1px solid #eee;
        }

        .table-mini th{
            text-align: center;
        }

        /*vue datatable v1*/
            #vue-datatable{
              font-size: 9pt;
            }

            #vue-datatable th{
              text-align: center;
              color: rgba(26, 179, 148, 1);
              position: sticky;
              padding: 5px;
              top: 0px;
              font-weight: 600;
              background: white;
              border-top: 1px solid #eee;
            }

            #vue-datatable td{
              padding: 5px;
              border: 1px solid #eee;
            }

            #vue-datatable tbody tr{
              cursor: pointer;
            }

            #vue-datatable tbody tr.vue-datatable-row-data{
                outline: none;
            }

            #vue-datatable tbody tr.vue-datatable-row-data:focus{
                background-color: rgba(0, 200, 81, 0.1);
            }

            #vue-datatable tbody tr:hover{
              background-color: rgba(0, 200, 81, 0.05);
            }

            .form-datatable-vue input, .form-datatable-vue select{
                height: 25px;
                font-size: 9pt;
            }

            .error{
                background: rgba(255,0,0,0.1);
            }
    </style>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight" id="vue-element">
        <div class="row" v-cloak>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah / Edit Data Jabatan</h5>
                        <div class="ibox-tools">

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="data-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" readonly>
                            <input type="hidden" name="id" v-model="single.id_jabatan" readonly>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Kode Jabatan</label>
                                        </div>

                                        <div class="col-md-5">
                                            <input id="nomor_jabatan" name="nomor_jabatan" type="text" class="form-control" placeholder="Diisi oleh system" v-model="single.nomor_jabatan" readonly>
                                        </div>

                                        <div class="col-md-1" style="padding: 0px; padding-top: 5px; cursor: pointer; color: #1ab394">
                                            <template v-if="formState == 'insert'">
                                                <button type="button" class="btn btn-primary btn-xs" style="font-size: 8pt;" @click="btnHelperClicked" :disabled="disabledButton">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </template>

                                            <template v-if="formState == 'update'">
                                                <button type="button" class="btn btn-primary btn-xs" style="font-size: 8pt;" @click="btnHelperClicked" :disabled="disabledButton">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Nama Jabatan</label>
                                        </div>

                                        <div class="col-md-7">
                                            <input id="nama_jabatan" name="nama_jabatan" type="text" :class="$v.single.nama_jabatan.$invalid ? 'form-control error' : 'form-control'" placeholder="Contoh : Amirruzuhhad Gunez" v-model="single.nama_jabatan">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7" style="box-shadow: 0px 0px 10px #ccc; padding: 10px;">
                                    
                                </div>
                            </div>
                        </form>

                        <div class="row" style="border-top: 1px solid #dedede; margin-top: 20px;">
                            <div class="col-md-12" style="padding: 20px; text-align: right;">
                                
                                <template v-if="formState == 'insert'">
                                     @if(Auth::user()->can('create', 'data_jabatan'))
                                        <button type="button" class="btn btn-primary btn-sm" @click="save" :disabled="disabledButton">Simpan Data</button>
                                    @else
                                        <small>Tidak Memiliki Akses Untuk Menambah Data Pegawai</small>
                                    @endif
                                    <!-- <button type="button" class="btn btn-primary btn-sm" @click="formReset">reset</button> -->
                                </template>

                                <template v-if="formState == 'update'">

                                    @if(Auth::user()->can('update', 'data_jabatan'))
                                        <button type="button" class="btn btn-primary btn-sm" @click="update" :disabled="disabledButton">Simpan Perubahan</button>
                                    @else
                                        <small>Tidak Memiliki Akses Untuk Merubah Data Pegawai</small>
                                    @endif

                                    @if(Auth::user()->can('delete', 'data_jabatan'))
                                        <button type="button" class="btn btn-danger btn-sm" @click="deleted">Hapus</button>
                                    @else
                                        <small>Tidak Memiliki Akses Untuk Menghapus Data Pegawai</small>
                                    @endif

                                </template>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>

        <div class="modal inmodal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" style="margin-bottom: 100px; width: 50%">
                <div class="modal-content animated">
                    <div class="ibox product-detail">
                        <div class="ibox-content" style="margin-bottom: 0px; padding-bottom: 0px; padding-top: 10px;">
                            <div class="row">
                                <div class="col-md-12" style="padding: 0px 5px; border-bottom: 1px solid #eee;">
                                    <h4>Pilih data jabatan yang akan diedit</h4>
                                </div>

                                <div class="col-md-12" style="padding-top: 20px;">
                                    <vue-datatable :resource="data_table_jabatan" @selected="dataSelected"></vue-datatable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</div>
@endsection

@section('extra_script')

    <script src="{{ asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/axios/axios.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.js') }}"></script>

    <!-- Vue js -->
    <script src="{{ asset('public/frontend/js/vendors/vue/vue.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/components/datepicker/datepicker.component.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/components/select/select.component.js')}}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/components/datatable-v1/datatable.component.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/vuelidate/dist/vuelidate.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/vendors/vue/vuelidate/dist/validators.min.js') }}"></script>

    <script type="text/javascript">
    	
        Vue.use(window.vuelidate.default)
        const { required, minLength } = window.validators;

        var vue = new Vue({
            el: '#vue-element',
            data: {
                formState: 'insert',
                disabledButton: false,

                data_table_jabatan: {
                    data: {
                        column: [
                            {name: 'Nomor Jabatan', context: 'nomor_jabatan', width: '20%', childStyle: 'text-align: center;'},
                            {name: 'Nama Jabatan', context: 'nama_jabatan', width: '80%', childStyle: 'text-align: left'}
                        ],

                        source: []
                    },

                    option: {
                        selectable: true,
                        index_column: 'id_jabatan'
                    }
                },

                role: [],

                single: {
                    id_jabatan: '',
                    nama_jabatan: '',
                    nomor_jabatan: '',
                }

            },

            validations: {
                single : {
                    nama_jabatan: {
                        required,
                    },
                }
            },

            mounted: function(){
                console.log('vue ready');

                axios.get('{{ Route("wpadmin.jabatan.resource") }}')
                        .then((response) => {
                            console.log(response.data);

                            this.role = response.data.role;
                            this.data_table_jabatan.data.source = response.data.jabatan;

                        }).catch((e) => {
                            alert('System Error');
                            console.log("Err => "+e);
                        })
            },

            methods: {
                save: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    this.$v.$touch();

                    if(!this.$v.$invalid){
                        this.disabledButton = true;
                        var form = $('#data-form').serialize();

                        axios.post('{{ Route("wpadmin.jabatan.save") }}', form)
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
                                        this.data_table_jabatan.data.source = response.data.jabatan;
                                    }

                                    this.formReset();

                                }).catch((e) => {
                                    console.log(e);
                                    $.toast({
                                        text: 'System Error, '+e,
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        icon: 'error',
                                        stack: 1
                                    })
                                }).then((e) => {
                                    // this.onRequest = false;
                                    // this.requestMessage = 'Sedang menyimpan data..';
                                    this.disabledButton = false;
                                })
                    }else{
                        $.toast({
                            text: 'Terdapat kesalahan dalam inputan anda',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'info',
                            stack: 1
                        })
                    }
                },

                update: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    this.$v.$touch();

                    if(!this.$v.$invalid){
                        this.disabledButton = true;
                        var form = $('#data-form').serialize();

                        axios.post('{{ Route("wpadmin.jabatan.update") }}', form)
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
                                        this.data_table_jabatan.data.source = response.data.jabatan;
                                    }

                                    this.formReset();

                                }).catch((e) => {
                                    console.log(e);
                                    $.toast({
                                        text: 'System Error, '+e,
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        icon: 'error',
                                        stack: 1
                                    })
                                }).then((e) => {
                                    // this.onRequest = false;
                                    // this.requestMessage = 'Sedang menyimpan data..';
                                    this.disabledButton = false;
                                })
                    }else{
                        $.toast({
                            text: 'Terdapat kesalahan dalam inputan anda',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'info',
                            stack: 1
                        })
                    }
                },

                deleted: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.disabledButton = true;

                    axios.post('{{ Route("wpadmin.jabatan.delete") }}', {_token: '{{ csrf_token() }}', id: this.single.id_jabatan})
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
                                    this.data_table_jabatan.data.source = response.data.jabatan;
                                }

                                this.formReset();

                            }).catch((e) => {
                                console.log(e);
                                $.toast({
                                    text: 'System Error, '+e,
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    icon: 'error',
                                    stack: 1
                                })
                            }).then((e) => {
                                // this.onRequest = false;
                                // this.requestMessage = 'Sedang menyimpan data..';
                                this.disabledButton = false;
                            })
                },

                btnHelperClicked: function(e){
                    if(this.formState == 'insert'){
                        $("#modal-detail").modal('show');
                    }else{
                        this.formReset();
                    }
                },

                dataSelected: function(e){
                    var idx = this.data_table_jabatan.data.source.findIndex(a => a.id_jabatan == e);

                    if(idx >= 0){
                        var ctx = this.data_table_jabatan.data.source[idx];
                        this.formState = 'update';

                        this.single.id_jabatan = ctx.id_jabatan;
                        this.single.nomor_jabatan = ctx.nomor_jabatan;
                        this.single.nama_jabatan = ctx.nama_jabatan;
                    }

                    $('#modal-detail').modal('toggle');
                },

                formReset: function(){
                    this.formState = 'insert';

                    this.single.id_jabatan = '';
                    this.single.nama_jabatan = '';
                    this.single.nomor_jabatan = '';

                    // $('.check').prop('checked', false);
                }
            }
        });

    </script>
@endsection