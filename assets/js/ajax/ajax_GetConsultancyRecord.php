<?php 

include('../../function.php');
$db=new DB();
$technical_consultancy_id = $_POST['id'];

$sqlgetdetails="SELECT `technical_consultancy_id`, `name_of_sme`, `consultancy_type`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id`, `enter_date` FROM `technical_consultancy` WHERE  technical_consultancy_id=:technical_consultancy_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('technical_consultancy_id'=>$technical_consultancy_id) );


echo json_encode($getValue);



 ?>
