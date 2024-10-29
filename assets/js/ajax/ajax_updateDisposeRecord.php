<?php 

include('../../function.php');
$db=new DB();

$val=0;

$dispose_item_transaction_id = $_POST['dispose_item_transaction_id'];
$date_of_dispose = $_POST['date_of_dispose'];
$date_of_after_dispose = $_POST['date_of_after_dispose'];
$amount = $_POST['amount'];




$sqlupdate="UPDATE `dispose_item_transaction` SET `date_of_dispose`=:date_of_dispose,`date_of_after_dispose`=:date_of_after_dispose,`amount`=:amount WHERE dispose_item_transaction_id=:dispose_item_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('date_of_dispose'=>$date_of_dispose, 'date_of_after_dispose'=>$date_of_after_dispose, 'amount'=>$amount, 'dispose_item_transaction_id'=>$dispose_item_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>