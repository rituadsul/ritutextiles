<?php 

include('../../../function.php');
$db=new DB();

$val=0;

$sample_transaction_id = $_POST['sample_transaction_id'];
$qua_nonreg = $_POST['qua_nonreg'];
$eco_nonreg = $_POST['eco_nonreg'];
$qua_reg = $_POST['qua_reg'];
$eco_reg = $_POST['eco_reg'];
$total = ($qua_nonreg+$eco_nonreg+$qua_reg+$eco_reg);


$sqlupdate="UPDATE `sample_transaction` SET `qua_nonreg`=:qua_nonreg, `eco_nonreg`=:eco_nonreg, `qua_reg`=:qua_reg, `eco_reg`=:eco_reg,`total`=:total WHERE`sample_transaction_id`=:sample_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('qua_nonreg'=>$qua_nonreg, 'eco_nonreg'=>$eco_nonreg, 'qua_reg'=>$qua_reg, 'eco_reg'=>$eco_reg, 'total'=>$total,   'sample_transaction_id'=>$sample_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>