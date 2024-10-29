<?php 

include('../../function.php');
$db=new DB();
$marketing_activity_id = $_POST['id'];

$sqlgetdetails="SELECT `marketing_activity_id`, `company_name`, `company_type`, `contact_person`, `contact_number`, `email`, `visited_date`, `sample_received`, `customer_response`, `specific_requirement`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `marketing_activity` WHERE marketing_activity_id=:marketing_activity_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('marketing_activity_id'=>$marketing_activity_id) );


echo json_encode($getValue);



 ?>
