<?php 

include('../../function.php');
$db=new DB();
$stock_position_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT st.stock_position_transaction_id,  st.stock_position_adequate, st.action, s.stock_position_label_name
				FROM stock_position_transaction as st
				LEFT JOIN stock_position_label as s on s.stock_position_label_id=st.stock_position_label_id
				WHERE st.stock_position_transaction_id=:stock_position_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('stock_position_transaction_id'=>$stock_position_transaction_id) );


echo json_encode($getValue);



 ?>