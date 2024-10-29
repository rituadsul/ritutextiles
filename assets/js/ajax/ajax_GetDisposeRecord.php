<?php 

include('../../function.php');
$db=new DB();
$dispose_item_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT dt.dispose_item_transaction_id, dt.dispose_item_id, dt.date_of_dispose, dt.date_of_after_dispose, dt.amount, dt.remark, dt.month, dt.year, dt.publish_date, dt.modify_date, dt.user_id, d.dispose_item_name
				FROM dispose_item_transaction as dt
				LEFT JOIN dispose_item as d ON dt.dispose_item_id=d.dispose_item_id WHERE dt.dispose_item_transaction_id=:dispose_item_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('dispose_item_transaction_id'=>$dispose_item_transaction_id) );


echo json_encode($getValue);



 ?>