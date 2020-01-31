<?php 
// $con = mysqli_connect("localhost","root","","dishut");
$con = mysqli_connect("tahuraradensoerjo.or.id","tahurara_tahura","amiruzg627408","tahurara_tahura");

  // include 'resources/views/config.php'; 

$id = $_POST['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($con,"SELECT * FROM tb_pendakian WHERE pd_id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM tb_pendakian WHERE pd_id=".$id;
    mysqli_query($con,$query);
    echo 1;
    exit;
  }
}

echo 0;
exit;