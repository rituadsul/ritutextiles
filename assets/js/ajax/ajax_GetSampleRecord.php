<?php 

include('../../function.php');
$db=new DB();
$sample_transaction_id = $_POST['id'];

$sqlgetdetails="SELECT st.sample_transaction_id, st.sample_id, (st.qua_nonreg)as qua_nonreg, (st.eco_nonreg)as eco_nonreg, (st.qua_reg)as qua_reg, (st.eco_reg)as eco_reg, (st.total)as total, s.sample_name
				FROM sample_transaction as st LEFT JOIN sample as s ON st.sample_id=s.sample_id WHERE st.sample_transaction_id=:sample_transaction_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('sample_transaction_id'=>$sample_transaction_id) );


echo json_encode($getValue);



 ?>
