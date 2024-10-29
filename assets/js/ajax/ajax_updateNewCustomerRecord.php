<?php 

include('../../function.php');
$db=new DB();

$val=0;

$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$test_sample = $_POST['test_sample'];
$amount = $_POST['amount'];




$sqlupdate="UPDATE `customer` SET `customer_name`=:customer_name,`test_sample`=:test_sample, `amount`=:amount WHERE  customer_id=:customer_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'customer_name'=>$customer_name, 'test_sample'=>$test_sample, 'amount'=>$amount,  'customer_id'=>$customer_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>