<?php 

include('../../function.php');
$db=new DB();

$val=0;
$equipment_id = $_POST['equipment_id'];
$equipment_nonworking_id = $_POST['equipment_nonworking_id'];
$problem = $_POST['problem'];
$action = $_POST['action'];




$sqlupdate="UPDATE `equipment_nonworking` SET `problem`=:problem,`action`=:action,`equipment_id`=:equipment_id WHERE equipment_nonworking_id=:equipment_nonworking_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'problem'=>$problem, 'action'=>$action, 'equipment_id'=>$equipment_id, 'equipment_nonworking_id'=>$equipment_nonworking_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>