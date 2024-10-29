<?php 

include('../../function.php');
$db=new DB();

$val=0;

$activity_transaction_id = $_POST['activity_transaction_id'];
$organisation_name = $_POST['organisation_name'];
$name_of_units = $_POST['name_of_units'];
$training_program = $_POST['training_program'];
$date_of_commencement = $_POST['date_of_commencement'];
$date_of_completion = $_POST['date_of_completion'];
$remark = $_POST['remark'];
$gst_amount = $_POST['gst_amount'];
$amount =  $_POST['amount'];


$sqlupdate="UPDATE `activity_transaction` SET `organisation_name`=:organisation_name, `training_program`=:training_program, `name_of_units`=:name_of_units,date_of_commencement`=:date_of_commencement, `date_of_completion`=:date_of_completion, `remark`=:remark,`amount`=:amount, `gst_amount`=:gst_amount  WHERE `activity_transaction_id`=:activity_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('organisation_name'=>$organisation_name, 'name_of_units'=>$name_of_units,'training_program'=>$training_program,'date_of_commencement'=>$date_of_commencement, 'date_of_completion'=>$date_of_completion, 'remark'=>$remark, 'amount'=>$amount, 'gst_amount'=>$gst_amount,  'activity_transaction_id'=>$activity_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>