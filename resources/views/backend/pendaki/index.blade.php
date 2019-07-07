@extends('backend.main')

@section('extra_style')
	<!-- Data Tables -->
	<link href="{{ asset('backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pendaftaran Pendakian</h5>
                        <div class="ibox-tools">
						    
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example">
						        <thead>
						          <tr>
						            <th width="20px">No</th>
						            <th width="115px">NIP</th>
						            <th>Nama</th>
						            <th>Jabatan</th>
						            <th width="70px">Hak Akses</th>
						            <th width="60px">Action</th>
						          </tr>
						        </thead>

						        <tbody>
						        	<tr>
						        		<td>2</td>
						                <td>123456789012345678</td>
						                <td>coba</td>
						                <td>Kasubag Tata Usaha</td>
						                <td>admin</td>
						                <td>
						                  	<center>
							                    <a class='btn btn-success btn-xs' title='Edit Data' href='?view=pegawai&act=edit&id=26'><span class='fa fa-pencil-square-o'></span></a>

							                    <a class='btn btn-danger btn-xs' title='Delete Data' href='?view=pegawai&act=hapus&id=26'><span class='fa fa-trash'></span></a>
						                  	</center>
						                </td>
						            </tr>
				              	</tbody>
					      </table>
                        </div>
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
    	$(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
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

        });
    </script>
@endsection