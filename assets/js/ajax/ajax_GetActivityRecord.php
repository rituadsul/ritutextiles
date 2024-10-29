<?php 

include('../../function.php');
$db=new DB();
$activity_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT at.activity_transaction_id, at.activity_id,at.name_of_units, at.organisation_name, at.date_of_commencement, at.date_of_completion, at.remark, at.amount, at.training_program, at.gst_amount, a.activity_name 
				FROM `activity_transaction` as at LEFT JOIN activity as a ON a.activity_id=at.activity_id WHERE at.activity_transaction_id=:activity_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('activity_transaction_id'=>$activity_transaction_id) );


echo json_encode($getValue);



 ?>
