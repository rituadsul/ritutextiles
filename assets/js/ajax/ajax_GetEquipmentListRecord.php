<?php 

include('../../function.php');
$db=new DB();
$equipment_id = $_POST['id'];

$sqlgetdetails="SELECT `equipment_id`, `equipment_name`, `parameter_name`, `is_active`, `user_id`, `publish_date`, `modify_date` FROM `equipment` WHERE equipment_id=:equipment_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('equipment_id'=>$equipment_id) );


echo json_encode($getValue);



 ?>
