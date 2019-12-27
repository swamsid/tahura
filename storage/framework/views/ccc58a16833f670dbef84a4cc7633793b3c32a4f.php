<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pendakian</title>

    <link href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/iCheck/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/steps/jquery.steps.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/styleregist.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/jasny/jasny-bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/iCheck/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/select2/dist/css/select2-bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.css')); ?>">

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

            .error{
                /*background: rgba(255,0,0,0.1);*/
            }
     </style>

</head>

<body>
    <div id="page-wrapper" class="gray-bg" style="">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Data Pendakian</h2>
                <ol class="breadcrumb">
                    <li>
                        Data dibawah adalah data pendakian sesuai dengan nomor pendakian yang telah anda masukkan.
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeIn">

            <div class="row">
                <div class="col-md-12 kotak" style="padding-top: 20px !important">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff; font-size: 14px">
                            <template v-if="!downloadingResource">

                                <div class="row" style="padding: 0px 20px;">
                                	<table width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="padding: 5px; background: #eee;">Nomor Pendakian</th>
                                                <th class="text-center" style="padding: 5px; background: #eee;">Tanggal Registrasi</th>
                                                <th class="text-center" style="padding: 5px; background: #eee;">Status Pendakian</th>
                                            </tr>

                                            <tr>
                                                <th class="text-center" style="padding: 10px; color: #1ab394; border-left: 0px solid #ddd;"><?php echo e($data->pd_nomor); ?></th>
                                                <th class="text-center" style="padding: 10px; color: #1ab394; border-left: 1px solid #ddd;"><?php echo e(date('d/m/Y', strtotime($data->pd_tanggal_registrasi))); ?></th>
                                                <th class="text-center" style="padding: 10px; color: #1ab394; border-left: 1px solid #ddd;"><?php echo e($data->pd_status); ?></th>
                                            </tr>
                                        </thead>   
                                    </table>
                                </div>

                                <div class="row" style="padding: 0px 20px; border-top: 1px solid #ddd; padding-top: 10px; margin-top: 20px;">
                                    <div class="col-md-12">
                                        <h5 style="color: #1ab394">
                                            <i class="fa fa-arrow-right"></i> &nbsp;
                                            Data Utama Pendakian
                                        </h5>
                                    </div>

                                    <div class="col-md-12" style="margin-top: 5px;">
                                        <table class="table table-bordered" style="font-size: 9pt;">
                                            <thead>
                                                <tr>
                                                    <th width="20%" class="text-center">Nomor Pendakian</th>
                                                    <th width="20%" class="text-center">Nama Ketua</th>
                                                    <th width="20%" class="text-center">Email</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <th class="text-center"><?php echo e($data->pd_nomor); ?></th>
                                                    <th class="text-center"><?php echo e($data->pd_nama_ketua); ?></th>
                                                    <th class="text-center"><?php echo e($data->pd_email); ?></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" colspan="3">
                                                        <div class="file-box" style="margin: auto; float: none;">
                                                            <div class="file" style="margin: unset;">
                                                                <a href="<?php echo e(Route('frontend.cek_pendakian.pdf', 'id='.$data->pd_id)); ?>" target="_blank">
                                                                    <span class="corner"></span>
                                                                    <div class="icon">
                                                                        <i class="fa fa-file-pdf-o" style="color: #0099CC"></i>
                                                                    </div>
                                                                    <div class="file-name text-center">
                                                                        berkas-pendaftaran.pdf
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </template>

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

    </div>


    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('public/frontend/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('public/frontend/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- Steps -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/staps/jquery.steps.min.js')); ?>"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/validate/jquery.validate.min.js')); ?>"></script>

    <!-- Input Mask-->
    <script src="<?php echo e(asset('public/frontend/js/plugins/jasny/jasny-bootstrap.min.js')); ?>"></script>

    <!-- iCheck -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/iCheck/icheck.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/frontend/js/vendors/datepicker/dist/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/axios/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/toast/dist/jquery.toast.min.js')); ?>"></script>

    <!-- Vue js -->
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/datepicker/datepicker.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/components/select/select.component.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vuelidate/dist/vuelidate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/vendors/vue/vuelidate/dist/validators.min.js')); ?>"></script>

    <script>

        Vue.use(window.vuelidate.default)
        const { required, minLength } = window.validators;

        var vue = new Vue({
            el: '#page-wrapper',
            data: {

                // core
                disabledButton: false,
                onRequest: false,
                requestMessage: "Sedang Mengirim Formulir Registrasi",
                downloadingResource: false,

                single: {
                	
                }

            },

            validations: {
                single : {

                }
            },

            mounted: function(){
                console.log('vue ready');

                $('[data-toggle="tooltip"]').tooltip();
            },

            methods: {

                send: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    this.$v.$touch();

                    if(!this.$v.$invalid){

                    	$('#form-data').submit();
                        
                    }else{
                        $.toast({
                            text: 'Alangkah baiknya jika anda mengisi semua form yang tersedia',
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'top-right',
                            stack: 1
                        })
                    }
                },

                formReset: function(e){

                }
            }
        })
    
    </script>

</body>

</html>
<?php /**PATH C:\xampp7\htdocs\sipenerang\tahura\resources\views/frontend/cek_pendakian/result.blade.php ENDPATH**/ ?>