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
                        <h5>Data Pegawai</h5>
                        <div class="ibox-tools">
                            <a href="{{ Route('wpadmin.pegawai.create') }}">
    						    <button class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i> &nbsp;Tambah / Edit Data
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTables-example">
						        <thead>
						          <tr>
						            <th width="5%">No</th>
						            <th width="15%">Nip Pegawai</th>
						            <th>Nama Pegawai</th>
                                    <th>Jabatan Pegawai</th>
						          </tr>
						        </thead>

						        <tbody>
                                    @foreach($data as $key => $user)
                                        <tr>
                                            <td style="text-align: center;">{{ $key+1 }}</td>
                                            <td>{{ $user->nip }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->nama_jabatan }}</td>
                                        </tr>
                                    @endforeach
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
@endsection

@section('extra_script')
	<!-- Data Tables -->
    <script src="{{ asset('backend/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script type="text/javascript">
    	$(document).ready(function(){

            @if(Session::has('message'))
                alert('{{ Session::get("message") }}');
            @endif

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
        });
    </script>
@endsection