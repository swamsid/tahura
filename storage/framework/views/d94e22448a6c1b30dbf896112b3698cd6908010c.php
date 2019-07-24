<?php $__env->startSection('extra_style'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.css')); ?>">

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

        .select2-container .select2-selection--single{
            border-radius: 0px;
            border: 1px solid #ddd;
            height: 30px;
            font-weight: normal;
            color: #666;
            outline: none;
            font-size: 9pt;
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight" id="vue-element">
        <div class="row" v-cloak>
            <div class="col-lg-6 col-md-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Laporan Pendaki Masuk</h5>
                        <div class="ibox-tools">

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="data-form" action="<?php echo e(Route('wpadmin.laporan.pendaki_masuk.result')); ?>" target="_blank">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" readonly>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Pilih Jalur Masuk</label>
                                        </div>

                                        <div class="col-md-7">
                                            <vue-select :name="'jalur'" :id="'jalur'" :options="jalur" :search="false"></vue-select>
                                        </div>
                                    </div>

                                    <div class="row model-form-template">
                                        <div class="col-md-4 label-form">
                                            <label>Rentang Tanggal</label>
                                        </div>

                                        <div class="col-md-3">
                                            <vue-datepicker :name="'tgl_1'" :id="'tgl_1'" ::class="$v.single.tgl_1.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Tanggal 1'" :readonly="true" v-model="single.tgl_1" @input="tgl1Change"></vue-datepicker>
                                        </div>

                                        <div class="col-md-1" style="padding-top: 5px;">s/d</div>

                                        <div class="col-md-3">
                                            <vue-datepicker :name="'tgl_2'" :id="'tgl_2'" :class="$v.single.tgl_2.$invalid ? 'form-control error' : 'form-control'" :placeholder="'Tanggal 2'" :readonly="true" v-model="single.tgl_2"></vue-datepicker>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row" style="border-top: 1px solid #dedede; margin-top: 20px;">
                            <div class="col-md-12" style="padding: 20px; text-align: right;">
                                <template v-if="formState == 'insert'">
                                    <button type="button" class="btn btn-primary btn-sm" @click="save" :disabled="disabledButton">Proses</button>
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

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>

    <script src="<?php echo e(asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/axios/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.js')); ?>"></script>

    <!-- Vue js -->
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/datepicker/datepicker.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/select/select.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/datatable-v1/datatable.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vuelidate/dist/vuelidate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vuelidate/dist/validators.min.js')); ?>"></script>

    <script type="text/javascript">
    	
        Vue.use(window.vuelidate.default)
        const { required, minLength } = window.validators;

        var vue = new Vue({
            el: '#vue-element',
            data: {
                formState: 'insert',
                disabledButton: false,

                jalur: [],

                single: {
                    id_jabatan: '',
                    tgl_1: '<?php echo e(date("d/m/Y")); ?>',
                    tgl_2: '',
                }

            },

            validations: {
                single : {
                    tgl_1: {
                        required,
                    },

                    tgl_2: {
                        required,
                    },
                }
            },

            mounted: function(){
                console.log('vue ready');
                this.tgl1Change('<?php echo e(date("d/m/Y")); ?>');
                this.single.tgl_2 = '<?php echo e(date("d/m/Y")); ?>';

                axios.get('<?php echo e(Route("wpadmin.laporan.pendaki_masuk.resource")); ?>')
                        .then((response) => {
                            console.log(response.data);
                            this.jalur = response.data.pos;
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

                    if($('#tgl_2').val() != '' && $('#tgl_1').val() != ''){
                        $('#data-form').submit();
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

                tgl1Change: function(e){
                    $('#tgl_2').val("");
                    $('#tgl_2').datepicker("setStartDate", e);
                },

                formReset: function(){
                    this.formState = 'insert';
                }
            }
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenerang\tahura\resources\views/backend/laporan/pendaki_masuk/index.blade.php ENDPATH**/ ?>