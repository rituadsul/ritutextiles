<?php 

include('../../function.php');
$db=new DB();
$expenditure_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT et.expenditure_transaction_id, et.expenditure_label_id, (et.amount)as amount, (et.remark)as remark, e.expenditure_label_name
				FROM expenditure_transaction as et
				LEFT JOIN expenditure_label as e 
				ON e.expenditure_label_id=et.expenditure_label_id  WHERE et.expenditure_transaction_id=:expenditure_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('expenditure_transaction_id'=>$expenditure_transaction_id) );


echo json_encode($getValue);



 ?>