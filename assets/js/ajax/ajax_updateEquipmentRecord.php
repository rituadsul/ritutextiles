<?php 

include('../../function.php');
$db=new DB();

$val=0;

$equipment_transaction_id = $_POST['equipment_transaction_id'];
$parameter_name = $_POST['parameter_name'];
$test_performed = $_POST['test_performed'];
$remark = $_POST['remark'];




$sqlupdate="UPDATE `equipment_transaction` SET `test_performed`=:test_performed,`remark`=:remark, `parameter_name`=:parameter_name WHERE equipment_transaction_id=:equipment_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'test_performed'=>$test_performed, 'remark'=>$remark,'parameter_name'=>$parameter_name, 'equipment_transaction_id'=>$equipment_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>