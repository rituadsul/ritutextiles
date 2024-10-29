<?php 

include('../../function.php');
$db=new DB();

$val=0;

$equipment_id = $_POST['equipment_id'];
$equipment_name = $_POST['equipment_name'];
$parameter_name = $_POST['parameter_name'];


$sqlupdate="UPDATE `equipment` SET `equipment_name`=:equipment_name,`parameter_name`=:parameter_name WHERE `equipment_id`=:equipment_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('equipment_name'=>$equipment_name, 'parameter_name'=>$parameter_name, 'equipment_id'=>$equipment_id) );

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>