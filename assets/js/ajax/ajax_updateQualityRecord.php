<?php 

include('../../function.php');
$db=new DB();

$val=0;

$quality_transaction_id = $_POST['quality_transaction_id'];
$unit = $_POST['unit_qt'];
$lotsinspected = $_POST['lotsinspected_qt'];
$coveredinspected = $_POST['coveredinspected_qt'];
$passed = $_POST['passed_qt'];
$rejected = $_POST['rejected_qt'];
$lotsrejected = $_POST['lotsrejected_qt'];
$rejectionpercent = $_POST['rejectionpercent_qt'];
$lotscancelled = $_POST['lotscancelled_qt'];
$remark = $_POST['remark_qt'];


$sqlupdate="UPDATE `quality_transaction` SET `unit`=:unit,`lotsinspected`=:lotsinspected,`coveredinspected`=:coveredinspected,`passed`=:passed,`rejected`=:rejected,`lotsrejected`=:lotsrejected,`rejectionpercent`=:rejectionpercent,`lotscancelled`=:lotscancelled,`remark`=:remark WHERE `quality_transaction_id`=:quality_transaction_id";


$updateQuality=$db->setData($db->con, $sqlupdate, array('unit'=>$unit, 'lotsinspected'=>$lotsinspected, 'coveredinspected'=>$coveredinspected, 
	'passed'=>$passed, 
	'rejected'=>$rejected,   
	'lotsrejected'=>$lotsrejected,   
	'rejectionpercent'=>$rejectionpercent,   
	'lotscancelled'=>$lotscancelled,   
	'remark'=>$remark, 'quality_transaction_id'=>$quality_transaction_id));

if($updateQuality){
	$val=1;
}

echo json_encode($val);


 ?>
