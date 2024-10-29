<?php 

include('../../function.php');
$db=new DB();

$val=0;
$rev_total=0;

$revenue_transaction_id = $_POST['revenue_transaction_id'];
$rev_qua_nonreg = $_POST['rev_qua_nonreg'];
$rev_eco_nonreg = $_POST['rev_eco_nonreg'];
$rev_qua_reg = $_POST['rev_qua_reg'];
$rev_eco_reg = $_POST['rev_eco_reg'];
$rev_total = ((int)$rev_qua_nonreg+(int)$rev_eco_nonreg+(int)$rev_qua_reg+(int)$rev_eco_reg);


$sqlupdate="UPDATE `revenue_transaction` SET `rev_qua_nonreg`=:rev_qua_nonreg, `rev_eco_nonreg`=:rev_eco_nonreg, `rev_qua_reg`=:rev_qua_reg, `rev_eco_reg`=:rev_eco_reg, `rev_total`=:rev_total WHERE `revenue_transaction_id`=:revenue_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('rev_qua_nonreg'=>$rev_qua_nonreg, 'rev_eco_nonreg'=>$rev_eco_nonreg, 'rev_qua_reg'=>$rev_qua_reg, 'rev_eco_reg'=>$rev_eco_reg, 'rev_total'=>$rev_total,   'revenue_transaction_id'=>$revenue_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>