<?php 

include('../../function.php');
$db=new DB();

$val=0;

$bulk_customer_id = $_POST['bulk_customer_id'];
$bulk_customer_name = $_POST['bulk_customer_name'];
$sample_reported = $_POST['sample_reported'];
$testing_charges = $_POST['testing_charges'];
$remark = $_POST['remark'];




$sqlupdate="UPDATE `bulk_customer` SET `bulk_customer_name`=:bulk_customer_name, `sample_reported`=:sample_reported, `testing_charges`=:testing_charges,`remark`=:remark WHERE  bulk_customer_id=:bulk_customer_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'bulk_customer_name'=>$bulk_customer_name, 'sample_reported'=>$sample_reported, 'testing_charges'=>$testing_charges, 'remark'=>$remark,  'bulk_customer_id'=>$bulk_customer_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>