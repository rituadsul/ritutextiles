<?php 

include('../../function.php');
$db=new DB();
$equipment_transaction_id = $_POST['id'];

				$sqlgetdetails = "SELECT * 
					FROM equipment_transaction where equipment_transaction_id = :equipment_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('equipment_transaction_id'=>$equipment_transaction_id) );


echo json_encode($getValue);



 ?>