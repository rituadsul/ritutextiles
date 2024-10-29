<?php 

include('../../../function.php');
$db=new DB();

$val=0;

$user_id = $_POST['user_id'];

$str="SELECT `equipment_id` FROM `equipment` WHERE `user_id`";

$res=$db->getAssoc($db->con, "SELECT `equipment_id` FROM `equipment` WHERE `user_id`=:user_id",array('user_id'=>$user_id));


if($res){
	$val=1;
}

echo json_encode($val);


 ?>
