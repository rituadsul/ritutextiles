<?php 

include('../../function.php');
$db=new DB();
$tatkal_customer_id = $_POST['id'];

$sqlgetdetails="SELECT `tatkal_customer_id`, `tatkal_customer_name`, `tatkal_sample_reported`, `tatkal_testing_charges`, `tatkal_remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `tatkal_customer` WHERE tatkal_customer_id=:tatkal_customer_id";

$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('tatkal_customer_id'=>$tatkal_customer_id) );


echo json_encode($getValue);



 ?>
