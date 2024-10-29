<?php 

include('../../function.php');
$db=new DB();

$val=0;

$training_program_id = $_POST['training_program_id'];
$organisation_name = $_POST['organisation_name'];
$training_date = $_POST['training_date'];
$participant_no = $_POST['participant_no'];
$amount = $_POST['amount'];
$gst_amount = $_POST['gst_amount'];


$sqlupdate="UPDATE `training_program` SET `organisation_name`=:organisation_name, `training_date`=:training_date, `participant_no`=:participant_no, `amount`=:amount,`gst_amount`=:gst_amount  WHERE `training_program_id`=:training_program_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('organisation_name'=>$organisation_name, 'training_date'=>$training_date, 'participant_no'=>$participant_no, 'amount'=>$amount, 'gst_amount'=>$gst_amount,   'training_program_id'=>$training_program_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>