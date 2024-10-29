<?php 

include('../../function.php');
$db=new DB();

$val=0;

$meet_transaction_id = $_POST['meet_transaction_id'];
$meet_date = $_POST['meet_date'];
$place = $_POST['place'];
$participant = $_POST['participant'];
$remark = $_POST['remark'];

$description = $_POST['description'];



$sqlupdate="UPDATE `meet_transaction` SET `meet_date`=:meet_date,`place`=:place,`participant`=:participant,`remark`=:remark,`description`=:description WHERE meet_transaction_id=:meet_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('meet_date'=>$meet_date, 'place'=>$place, 'participant'=>$participant, 'remark'=>$remark, 'description'=>$description,  'meet_transaction_id'=>$meet_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>