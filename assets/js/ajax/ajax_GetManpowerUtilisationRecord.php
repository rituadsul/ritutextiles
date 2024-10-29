<?php 

include('../../function.php');
$db=new DB();
$manpower_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT `manpower_transaction_id`, `technical_manpower`, `working_day`, `extra_man_day`, `addtional_working`, `total_a`, `special_work`, `deputation`, `leave_day`, `total_b`, `total_c`, `total_s`, `average_op`, `total_p`, `average_pm`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `manpower_transaction` WHERE manpower_transaction_id=:manpower_transaction_id";

$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('manpower_transaction_id'=>$manpower_transaction_id) );


echo json_encode($getValue);



 ?>
