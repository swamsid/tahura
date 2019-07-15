@extends('backend.main')

@section('extra_style')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/datepicker/dist/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/vendors/toast/dist/jquery.toast.min.css') }}">

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
                /*background: rgba(255,0,0,0.1);*/
                /*border: 1px solid #eee;*/
            }

            .picture-wrap{
                width: 398px;
                height: 378px;
                /*background: black;*/
                position: relative;
                cursor: pointer;
                text-align: center;
                margin: 0 auto;
            }

            .picture-wrap i{
                color: #ff4444;
                font-size: 9pt;
                position: absolute;
                right: 5px;
                top: 5px;
                cursor: pointer;
            }

            .picture-wrap img{
                background: white;
                object-fit: scale-down;
                width: 398px;
                height: 378px;
                border: 1px solid #eee;
            }
    </style>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight" id="vue-element">
        <div class="row" v-cloak>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah / Edit Data Pegawai</h5>
                        <div class="ibox-tools">

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="data-form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" readonly>
                            <input type="hidden" name="id" v-model="single.id" readonly>
                            <div class="row">
                                <div class="col-md-6" style="box-shadow: 0px 0px 0px #ccc;">
                                    <div class="picture-wrap">
                                        <i class="fa fa-times" data-placement="top" title="Hapus Gambar 1" v-if="!firstPictureDeleted" @click="deletePicture" data-id="1"></i>
                                        <img 
                                            src="{{ asset('backend/img/default.jpg') }}"
                                            id="picture-wrap-1"
                                            tabindex="0"
                                            data-id="1"
                                            @click="inputImage"
                                        >
                                    </div>

                                    <input type="file" name="images" id="input-image-1" placeholder="okeee" style="display: none;" @change="imageChange" data-id="1">
                                </div>

                                <div class="col-md-6">
                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Nip Pegawai</label>
                                        </div>

                                        <div class="col-md-5">
                                            <input id="nip_pegawai" name="nip_pegawai" type="text" class="form-control" placeholder="Isilah dengan benar" v-model="single.nip_pegawai" :class="$v.single.nama_pegawai.$invalid ? 'form-control error' : 'form-control'">
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
                                            <label>Nama Pegawai</label>
                                        </div>

                                        <div class="col-md-7">
                                            <input id="nama_pegawai" name="nama_pegawai" type="text" :class="$v.single.nama_pegawai.$invalid ? 'form-control error' : 'form-control'" placeholder="Contoh : Amirruzuhhad Gunez" v-model="single.nama_pegawai">
                                        </div>
                                    </div>

                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Jabatan Pegawai</label>
                                        </div>

                                        <div class="col-md-7">
                                            <vue-select :name="'jabatan_pegawai'" :id="'jabatan_pegawai'" :options="jabatan_pegawai" :search="false"></vue-select>
                                        </div>
                                    </div>

                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Posisi Pegawai</label>
                                        </div>

                                        <div class="col-md-7">
                                            <vue-select :name="'posisi_pegawai'" :id="'posisi_pegawai'" :options="posisi_pegawai" :search="false"></vue-select>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Password Login</label>
                                        </div>

                                        <div class="col-md-7">
                                            <input type="Password" name="password_pegawai" :class="$v.single.password_pegawai.$invalid ? 'form-control error' : 'form-control'" v-model="single.password_pegawai" placeholder="Password Wajib Diisi" style="font-size: 9pt;">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12" style="font-weight: 600;">
                                            <i class="fa fa-arrow-right"></i> &nbsp;Assessment Role (Hak Akses)
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <table class="table-mini" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="40%">Nama Menu</th>
                                                        <th width="15%">Read</th>
                                                        <th width="15%">Create</th>
                                                        <th width="15%">Update</th>
                                                        <th width="15%">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template v-for="(role, idx) in role">
                                                        <tr>
                                                            <td colspan="5" style="background: #eee; font-weight: bold;">@{{ role.m_group }}</td>
                                                        </tr>

                                                        <template v-for="(detail, idx) in role.detail">
                                                            <tr>
                                                                <td style="padding-left: 20px;">@{{ detail.m_name }}</td>
                                                                <td style="text-align: center;">
                                                                    <input type="checkbox" :name="'read['+detail.m_id+'][]'" class="check" :id="detail.m_id+'_read'">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input type="checkbox" :name="'create['+detail.m_id+'][]'" class="check" :id="detail.m_id+'_create'">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input type="checkbox" :name="'update['+detail.m_id+'][]'" class="check" :id="detail.m_id+'_update'">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input type="checkbox" :name="'delete['+detail.m_id+'][]'" class="check" :id="detail.m_id+'_delete'">
                                                                </td>
                                                            </tr>
                                                        </template>
                                                    </template>
                                                </tbody>
                                            </table>                                            
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="row" style="border-top: 1px solid #dedede; margin-top: 20px;">
                            <div class="col-md-12" style="padding: 20px; text-align: right;">
                                <template v-if="formState == 'insert'">
                                    <button type="button" class="btn btn-primary btn-sm" @click="save" :disabled="disabledButton">Simpan Data</button>
                                    <!-- <button type="button" class="btn btn-primary btn-sm" @click="formReset">reset</button> -->
                                </template>

                                <template v-if="formState == 'update'">
                                    <button type="button" class="btn btn-primary btn-sm" @click="update" :disabled="disabledButton">Simpan Perubahan</button>
                                    <button type="button" class="btn btn-danger btn-sm" @click="deleted">Hapus</button>
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
                                    <vue-datatable :resource="data_table_user" @selected="dataSelected"></vue-datatable>
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

    <script src="{{ asset('frontend/js/vendors/datepicker/dist/datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/axios/axios.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/toast/dist/jquery.toast.min.js') }}"></script>

    <!-- Vue js -->
    <script src="{{ asset('frontend/js/vendors/vue/vue.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/vue/components/datepicker/datepicker.component.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/vue/components/select/select.component.js')}}"></script>
    <script src="{{ asset('frontend/js/vendors/vue/components/datatable-v1/datatable.component.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/vue/vuelidate/dist/vuelidate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendors/vue/vuelidate/dist/validators.min.js') }}"></script>

    <script type="text/javascript">
    	
        Vue.use(window.vuelidate.default)
        const { required, minLength } = window.validators;

        var vue = new Vue({
            el: '#vue-element',
            data: {
                formState: 'insert',
                disabledButton: false,

                jabatan_pegawai: [],

                posisi_pegawai: [
                    {
                        id: 'kantor',
                        text: 'Petugas Kantor'
                    },

                    {
                        id: 'pos',
                        text: 'Petugas Penjaga Pos'
                    },
                ],

                data_table_user: {
                    data: {
                        column: [
                            {name: 'NIP Pegawai', context: 'nip', width: '25%', childStyle: 'text-align: left;'},
                            {name: 'Nama Pegawai', context: 'nama', width: '40%', childStyle: 'text-align: left'},
                            {name: 'Jabatan', context: 'nama_jabatan', width: '30%', childStyle: 'text-align: left'}
                        ],

                        source: []
                    },

                    option: {
                        selectable: true,
                        index_column: 'user_id'
                    }
                },

                firstPictureDeleted: true,
                role: [],

                single: {
                    id: '',
                    nip_pegawai: '',
                    nama_pegawai: '',
                    password_pegawai: '',

                }

            },

            validations: {
                single : {
                    nip_pegawai: {
                        required,
                    },

                    nama_pegawai: {
                        required,
                    },

                    password_pegawai: {
                        required,
                    },
                }
            },

            mounted: function(){
                console.log('vue ready');

                axios.get('{{ Route("wpadmin.pegawai.resource") }}')
                        .then((response) => {
                            console.log(response.data);

                            this.jabatan_pegawai = response.data.jabatan;
                            this.data_table_user.data.source = response.data.user;
                            this.role = response.data.role;

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
                        var form = new FormData(document.querySelector("form"));

                        axios.post('{{ Route("wpadmin.pegawai.save") }}', form)
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
                                        this.data_table_user.data.source = response.data.user;
                                        this.formReset();
                                    }

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
                        var form = new FormData(document.querySelector("form"));

                        axios.post('{{ Route("wpadmin.pegawai.update") }}', form)
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
                                        this.data_table_user.data.source = response.data.user;
                                        this.formReset();
                                    }

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

                    axios.post('{{ Route("wpadmin.pegawai.delete") }}', {_token: '{{ csrf_token() }}', id: this.single.id})
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
                                    this.data_table_user.data.source = response.data.user;
                                    this.formReset();
                                }

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

                inputImage: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    var id = $(e.target).data('id');
                    $('#input-image-'+id).click();
                },

                imageChange: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    
                    var conteks = $(e.target)
                    var that = this;

                    if (window.FileReader) {
                        var fileReader = new FileReader(),
                            files = document.getElementById(conteks.attr('id')).files,
                            file;
                        if (!files.length) {
                            return;
                        }
                        file = files[0];
                        if (/^image\/\w+$/.test(file.type)) {
                            fileReader.readAsDataURL(file);
                            fileReader.onload = function() {
                                var size = file.size / 1024;

                                if(Math.round(size) > 500){
                                    $.toast({
                                        text: 'File tidak boleh melebihi 500kb.',
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        icon: 'info',
                                        beforeShow: function(){
                                            // notifUnsuccess.play();
                                        },
                                        hideAfter: 4000
                                    });

                                    return;
                                }

                                $("#picture-wrap-"+conteks.data('id')).attr("src", this.result).animate({
                                    opacity: 1
                                }, 700);

                                switch(conteks.data('id')){
                                    case 1:
                                        that.firstPictureDeleted = false;
                                        break;

                                    case 2:
                                        that.secondPictureDeleted = false;
                                        break;

                                    case 3:
                                        that.thirdPictureDeleted = false;
                                        break;
                                }
                            };
                        } else {
                            $.toast({
                                text: 'File yang anda pilih bukan termasuk gambar.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                icon: 'info',
                                beforeShow: function(){
                                    notifUnsuccess.play();
                                },
                                hideAfter: 4000
                            });
                        }
                    }
                },

                deletePicture: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    var conteks = $(e.target)
                    $('#input-image-'+conteks.data('id')).val('');
                    $("#picture-wrap-"+conteks.data('id')).attr("src", '{{ asset('backend/img/default.jpg') }}').animate({
                        opacity: 1
                    }, 700);

                    switch(conteks.data('id')){
                        case 1:
                            this.firstPictureDeleted = true;
                            break;

                        case 2:
                            this.secondPictureDeleted = true;
                            break;

                        case 3:
                            this.thirdPictureDeleted = true;
                            break;
                    }
                },

                dataSelected: function(e){
                    this.formState = 'update';
                    var idx = this.data_table_user.data.source.findIndex(a => a.user_id == e);

                    if(idx >= 0){
                        var conteks = this.data_table_user.data.source[idx];

                        this.single.id = conteks.user_id;
                        this.single.nip_pegawai = conteks.nip;
                        this.single.nama_pegawai = conteks.nama;
                        this.single.password_pegawai = conteks.password;

                        $.each(conteks.roles, function(idx, content){
                            console.log(content);

                            if(content.rm_read == '1')
                                $('#'+content.rm_menu+'_read').prop('checked', true);

                            if(content.rm_create == '1')
                                $('#'+content.rm_menu+'_create').prop('checked', true);

                            if(content.rm_update == '1')
                                $('#'+content.rm_menu+'_update').prop('checked', true);

                            if(content.rm_delete == '1')
                                $('#'+content.rm_menu+'_delete').prop('checked', true);
                        })

                        $('#jabatan_pegawai').val(conteks.id_jabatan).trigger('change.select2');
                        $('#posisi_pegawai').val(conteks.posisi).trigger('change.select2');

                        $("#picture-wrap-1").attr("src", '{{ asset("backend/img/upload/pegawai/".Auth::user()->user_id) }}/'+conteks.foto).animate({
                            opacity: 1
                        }, 700);
                    }

                    $('#modal-detail').modal('toggle');
                },

                formReset: function(){
                    this.formState = 'insert';
                    this.single.id = '';
                    this.single.nip_pegawai = '';
                    this.single.nama_pegawai = '';
                    this.single.password_pegawai = '';

                    this.firstPictureDeleted = true;

                    $('.check').prop('checked', false);

                    $('#jabatan_pegawai').val(this.jabatan_pegawai[0].id).trigger('change.select2');
                    $('#posisi_pegawai').val(this.posisi_pegawai[0].id).trigger('change.select2');
                    $("#picture-wrap-1").attr("src", '{{ asset('backend/img/default.jpg') }}').animate({
                        opacity: 1
                    }, 700);
                }
            }
        });

    </script>
@endsection