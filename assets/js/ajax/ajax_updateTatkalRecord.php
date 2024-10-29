<?php 

include('../../function.php');
$db=new DB();

$val=0;

$tatkal_customer_id = $_POST['tatkal_customer_id'];
$tatkal_customer_name = $_POST['tatkal_customer_name'];
$tatkal_sample_reported = $_POST['tatkal_sample_reported'];
$tatkal_testing_charges = $_POST['tatkal_testing_charges'];
$tatkal_remark = $_POST['tatkal_remark'];




$sqlupdate="UPDATE `tatkal_customer` SET `tatkal_customer_name`=:tatkal_customer_name, `tatkal_sample_reported`=:tatkal_sample_reported, `tatkal_testing_charges`=:tatkal_testing_charges,`tatkal_remark`=:tatkal_remark WHERE  tatkal_customer_id=:tatkal_customer_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'tatkal_customer_name'=>$tatkal_customer_name, 'tatkal_sample_reported'=>$tatkal_sample_reported, 'tatkal_testing_charges'=>$tatkal_testing_charges, 'tatkal_remark'=>$tatkal_remark,  'tatkal_customer_id'=>$tatkal_customer_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>