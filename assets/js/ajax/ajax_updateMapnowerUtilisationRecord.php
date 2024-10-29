<?php 

include('../../function.php');
$db=new DB();

$val=0;

$manpower_transaction_id = $_POST['manpower_transaction_id'];
$technical_manpower = $_POST['technical_manpower'];
$working_day = $_POST['working_day'];
$extra_man_day = $_POST['extra_man_day'];
$addtional_working = $_POST['addtional_working'];
$total_a = $_POST['total_a'];
$special_work = $_POST['special_work'];
$deputation = $_POST['deputation'];
$leave_day = $_POST['leave_day'];
$total_b = $_POST['total_b'];
$total_c = $_POST['total_c'];
$total_s = $_POST['total_s'];
$average_op = $_POST['average_op'];
$total_p = $_POST['total_p'];
$average_pm = $_POST['average_pm'];

$sqlupdate="UPDATE `manpower_transaction` SET `technical_manpower`=:technical_manpower, `working_day`=:working_day, `extra_man_day`=:extra_man_day,`addtional_working`=:addtional_working, `total_a`=:total_a, `special_work`=:special_work, `deputation`=:deputation, `leave_day`=:leave_day, `total_b`=:total_b, `total_c`=:total_c, `total_s`=:total_s, `average_op`=:average_op, `total_p`=:total_p, `average_pm`=:average_pm WHERE  manpower_transaction_id=:manpower_transaction_id";

$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'manpower_transaction_id'=>$manpower_transaction_id, 'technical_manpower'=>$technical_manpower, 'working_day'=>$working_day, 'extra_man_day'=>$extra_man_day,  'addtional_working'=>$addtional_working, 'total_a'=>$total_a, 'special_work'=>$special_work, 'deputation'=>$deputation, 'leave_day'=>$leave_day, 'total_b'=>$total_b, 'total_c'=>$total_c, 'total_s'=>$total_s, 'average_op'=>$average_op, 'total_p'=>$total_p, 'average_pm'=>$average_pm));

if($updateCertificate){
	$val=1;
}

 echo json_encode($val);


 ?>