<?php 

include('../../function.php');
$db=new DB();
$meet_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT mt.meet_transaction_id, mt.meet_id, mt.meet_date, mt.place, mt.participant, mt.remark, mt.description, mt.month, mt.year, mt.publish_date, mt.modify_date, mt.user_id, m.meet_name
				FROM meet_transaction as mt
				LEFT JOIN meet as m ON m.meet_id=mt.meet_id WHERE mt.meet_transaction_id=:meet_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('meet_transaction_id'=>$meet_transaction_id) );


echo json_encode($getValue);



 ?>