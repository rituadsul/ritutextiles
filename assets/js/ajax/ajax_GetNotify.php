<?php 

include('../../function.php');
$db=new DB();

$val=0;


$notification_id=$_POST['id'];

	$mmyy=$db->getAssoc($db->con, "SELECT  `month`, `year`  FROM `notification` WHERE `notification_id`=:notification_id", array('notification_id'=>$notification_id));


	
	$str="UPDATE `notification` SET `is_active`=:is_active WHERE notification_id=:notification_id ";
	$upd=$db->setData($db->con, $str, array('is_active'=>'N', 'notification_id'=>$notification_id ));

	if($upd)
	{		
		$val=1;
	}

	if($mmyy)
	{
		session_start();
		$_SESSION['month']=$mmyy[0]['month'];
		$_SESSION['year']=$mmyy[0]['year'];
	}

	echo json_encode($val);


 ?>
