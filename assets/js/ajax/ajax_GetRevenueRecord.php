<?php 

include('../../function.php');
$db=new DB();
$revenue_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT rt.revenue_transaction_id, rt.revenue_label_id, (rt.rev_qua_nonreg)as rev_qua_nonreg, (rt.rev_eco_nonreg)as rev_eco_nonreg, (rt.rev_qua_reg)as rev_qua_reg, (rt.rev_eco_reg)as rev_eco_reg,  r.revenue_label_name
				FROM revenue_transaction as rt LEFT JOIN revenue_label as r ON rt.revenue_label_id=r.revenue_label_id WHERE rt.revenue_transaction_id=:revenue_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('revenue_transaction_id'=>$revenue_transaction_id) );


echo json_encode($getValue);



 ?>
