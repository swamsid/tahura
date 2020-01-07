<?php
/* Database connection start */
// $servername = "localhost"; $username = "root"; $password = ""; $dbname = "dishut";
$servername = "tahuraradensoerjo.or.id"; $username = "tahurara_tahura"; $password = "amiruzg627408"; $dbname = "tahurara_tahura";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	
	0 =>'pd_tanggal_registrasi',
	1 =>'pd_nomor',
	2 =>'pd_nama_ketua',
	3 =>'pd_nomor',
	4 =>'pd_nomor',
	5 =>'pd_tgl_naik',
	6 =>'pd_tgl_turun',
	7 =>'pd_nomor',
	8 =>'pd_nomor'
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM tb_pendakian";
$query=mysqli_query($conn, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM tb_pendakian WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( pd_nomor LIKE '%".$requestData['search']['value']."%' ";      
	$sql.=" OR  pd_nama_ketua LIKE '%".$requestData['search']['value']."%'";
	
	$sql.=" OR  pd_tanggal_registrasi LIKE '%".$requestData['search']['value']."%'";
	$sql.=" OR  pd_tgl_naik LIKE '%".$requestData['search']['value']."%'";
	$sql.=" OR  pd_tgl_turun LIKE '%".$requestData['search']['value']."%')";

}
$query=mysqli_query($conn, $sql) ;
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql);

$data = array();
$no = 1;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array

	$naik = ($row['pd_pos_pendakian']=='' ? '(rencana)' : '');
	$turun = ($row['pd_pos_turun']=='' ? '(rencana)' : '');
	$class = 'label-info';
    if($row['pd_status'] == 'disetujui')
        $class = 'label-success';
    else if($row['pd_status'] == 'ditolak')
        $class = 'label-danger';
    else if($row['pd_status'] == 'sudah naik' || $row['pd_status'] == 'sudah turun')
        $class = 'label-warning';

    if ($row['pd_tgl_naik'] < date("Y-m-d") && $row['pd_status'] == 'disetujui' ) {
        $status = '<span class="label" style="color:red">EXPIRED</span>';   
    }
    else{
        $status = '<span class="label '.$class.'">'.$row['pd_status'].'</span>';
    }

    $detil  = "<a href='detail?id=$row[pd_id]' class='btn btn-primary btn-xs' style='margin-right:5px' data-id='' title='Detail'><span class='fa fa-folder-open'></span></a>";
    $edit   = "<a href='data-pendaftar/edit?id=$row[pd_id]' class='btn btn-warning btn-xs' style='margin-right:5px' data-id='' title='Edit'><span class='fa fa-edit'></span></a>";
    $delete = "<a href='javascript:void(0)' id='del_$row[pd_id]' class='btn btn-danger btn-xs delete' title='Hapus'><span class='fa fa-trash'></span></a>";
    $query2 = mysqli_query($conn, 'SELECT * FROM tb_anggota_pendakian WHERE ap_pendakian = 42');
	
	$anggota = '<ol></ol>';
	
	$nestedData=array(); 
	$nestedData[] = $no;
	$nestedData[] = $row["pd_nomor"];
	$nestedData[] = $row["pd_nama_ketua"];
	
	$nestedData[] = date('d-m-Y', strtotime($row["pd_tanggal_registrasi"]));
	$nestedData[] = date('d-m-Y', strtotime($row["pd_tgl_naik"]))."<small><b> ". $naik ."</b></small>";
	$nestedData[] = date('d-m-Y', strtotime($row["pd_tgl_turun"]))."<small><b> ". $turun ."</b></small>";
	$nestedData[] = $status;
	$nestedData[] = $detil.$edit;
	$data[] = $nestedData;
	$no++;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
