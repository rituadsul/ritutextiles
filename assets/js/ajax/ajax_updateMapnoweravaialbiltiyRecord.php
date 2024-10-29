<?php 

include('../../function.php');
$db=new DB();

$val=0;

$manpower_available_id = $_POST['manpower_available_id'];
$designation_id = $_POST['designation_id'];
$from_lab = $_POST['from_lab'];
$from_other = $_POST['from_other'];
$total = $_POST['total'];

$sqlupdate="UPDATE `manpower_available` SET `designation_id`=:designation_id, `from_lab`=:from_lab, `from_other`=:from_other,`total`=:total WHERE  manpower_available_id=:manpower_available_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'manpower_available_id'=>$manpower_available_id, 'designation_id'=>$designation_id, 'from_lab'=>$from_lab, 'from_other'=>$from_other,  'total'=>$total));

if($updateCertificate){
	$val=1;
}

 echo json_encode($val);


 ?>