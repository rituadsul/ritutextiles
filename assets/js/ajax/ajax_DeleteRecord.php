<?php 

include('../../function.php');
$db=new DB();

$val=0;

$month=$_POST['month'];
$year=$_POST['year'];
$user_id=$_POST['user_id'];
$msg=$_POST['msg'];

$month=(int)$month;
$year=(int)$year;
$user_id=(int)$user_id;

	//$del=$db->deleteAllRecord($db, $db->con, $user_id, $month, $year);

	$str="DELETE FROM `finalsubmit` WHERE `user_id`=:user_id AND `month`=:month AND `year`=:year";
	$valarr=array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year);
	$del=$db->setData($db->con, $str, $valarr);

	if($del)
	{

		$add=$db->setData(
			$db->con, 
			"INSERT INTO `notification`( `notification_msg`, `user_id`, `month`, `year`, `is_active`, `publish_date`) 
			VALUES (:notification_msg, :user_id, :month, :year, :is_active, :publish_date)", 
			array('notification_msg'=>$msg, 'user_id'=>$user_id, 'month'=>$month, 'year'=>$year, 'is_active'=>'Y', 'publish_date'=>date("Y-m-d H:i:s")));

		$val=1;
		/*$clr=$db->clearPageHistory($db, $db->con, $user_id, $month, $year);

		if($clr)
		{
			$val=1;
		}*/
	}


echo json_encode($val);


 ?>
