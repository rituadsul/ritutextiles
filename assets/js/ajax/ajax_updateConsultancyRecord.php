<?php 

include('../../function.php');
$db=new DB();

$val=0;

$technical_consultancy_id = $_POST['technical_consultancy_id'];
$name_of_sme = $_POST['name_of_sme'];
$consultancy_type = $_POST['consultancy_type'];
$amount = $_POST['amount'];
$gst_amount = $_POST['gst_amount'];

$sqlupdate="UPDATE `technical_consultancy` SET `name_of_sme`=:name_of_sme,`consultancy_type`=:consultancy_type,`amount`=:amount,`gst_amount`=:gst_amount WHERE `technical_consultancy_id`=:technical_consultancy_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('name_of_sme'=>$name_of_sme, 'consultancy_type'=>$consultancy_type, 'amount'=>$amount, 'gst_amount'=>$gst_amount, 'technical_consultancy_id'=>$technical_consultancy_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>