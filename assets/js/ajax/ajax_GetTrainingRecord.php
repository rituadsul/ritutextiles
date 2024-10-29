<?php 

include('../../function.php');
$db=new DB();
$training_program_id = $_POST['id'];

$sqlgetdetails="SELECT `training_program_id`, `organisation_name`, `training_date`, `participant_no`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id`, `enter_date` FROM `training_program` WHERE training_program_id=:training_program_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('training_program_id'=>$training_program_id) );


echo json_encode($getValue);



 ?>
