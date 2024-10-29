<?php 

include('../../function.php');
$db=new DB();

$val=0;

$expenditure_transaction_id = $_POST['expenditure_transaction_id'];
$amount = $_POST['amount'];
$remark = $_POST['remark'];




$sqlupdate="UPDATE `expenditure_transaction` SET `amount`=:amount,`remark`=:remark WHERE  expenditure_transaction_id=:expenditure_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'amount'=>$amount, 'remark'=>$remark, 'expenditure_transaction_id'=>$expenditure_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>