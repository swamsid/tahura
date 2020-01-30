<?php
    include 'resources/views/config.php'; 
?>



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
        tbody td{
            text-align: center
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight minimize">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins ukuran_minimize">
                    <div class="ibox-title">
                        <h5>Data Pendaftaran Pendakian</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="20px">No.</th>
                                        <th width="80px">No. Registrasi</th>
                                        <th width="150px">Nama Ketua</th>
                                        
                                        <th width="80px">Tgl Registrasi</th>
                                        <th width="50px">Tgl Naik</th>
                                        <th width="50px">Tgl Turun</th>
                                        <th width="50px">Status</th>
                                        <th width="60px">action</th>
                                    </tr>
                                </thead>
                            </table>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>
    <!-- Data Tables -->
    <script src="<?php echo e(asset('public/backend/js/plugins/dataTables/datatables.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.delete').click(function(){
                var result = confirm("Apakah anda yakin?");
                if(result){
                    var el = this;
                    var id = this.id;
                    var splitid = id.split("_");

                    // Delete id
                    var deleteid = splitid[1];
                 
                    // AJAX Request
                    $.ajax({
                        url: '<?php echo e(asset("resources/views/backend/pendaki/remove.php")); ?>',
                        type: 'POST',
                        data: { id:deleteid },
                        success: function(response){
                            if(response == 1){
                                // Remove row from HTML Table
                                $(el).closest('tr').css('background','rgba(26, 179, 148, 0.4)');
                                $(el).closest('tr').fadeOut(800,function(){
                                $(this).remove();
                            });
                            }
                            else{
                                alert('Invalid ID.');
                            }
                        }
                    });
                }

            });

            <?php if(Session::has('message')): ?>
                // alert('<?php echo e(Session::get("message")); ?>');
                // <?php echo e(Session::forget('message')); ?>

            <?php endif; ?>

            $('.dataTables-example').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax":{
                    url :"<?php echo e(url('resources/views/backend/pendaki/employee-grid-data.php')); ?>", // json datasource
                    type: "post",  // method  , by default get
                    error: function(){  // error handling
                        $(".employee-grid-error").html("");
                        $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#employee-grid_processing").css("display","none");
                        
                    }
                },

                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            $('.detail').click(function(){
                $('#modal-detail').modal('show');
                $('#detail-wrap').html('<center><small> Sedang Mengambil Data</small></center>')
                $('#detail-wrap').load('<?php echo e(Route("wpadmin.pendaki.detail")); ?>?id='+$(this).data('id'))
            })

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tahura\resources\views/backend/pendaki/index.blade.php ENDPATH**/ ?>