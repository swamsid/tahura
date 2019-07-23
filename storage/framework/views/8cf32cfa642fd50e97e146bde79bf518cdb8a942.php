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
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pendaftaran Pendakian</h5>
                        <div class="ibox-tools">
                            <?php if(Auth::user()->can('create', 'master data jabatan') || Auth::user()->can('update', 'master data jabatan') || Auth::user()->can('delete', 'master data jabatan')): ?>
                                <a href="<?php echo e(Route('wpadmin.jabatan.create')); ?>">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i> &nbsp;Tambah / Edit Data
                                    </button>
                                </a>
                            <?php else: ?>
                                <small>Tidak Memiliki Akses Menuju Form Jabatan</small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example">
						        <thead>
						          <tr>
						            <th width="20px">No</th>
						            <th width="115px">Nomor Jabatan</th>
						            <th>Nama Jabatan</th>
						          </tr>
						        </thead>

						        <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo e($key + 1); ?></td>
                                            <td style="text-align: center;"><?php echo e($jabatan->nomor_jabatan); ?></td>
                                            <td><?php echo e($jabatan->nama_jabatan); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				              	</tbody>
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

            <?php if(Session::has('message')): ?>
                alert('<?php echo e(Session::get("message")); ?>');
            <?php endif; ?>

            $('.dataTables-example').DataTable({
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
<?php echo $__env->make('backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenerang\tahura\resources\views/backend/master/jabatan/index.blade.php ENDPATH**/ ?>