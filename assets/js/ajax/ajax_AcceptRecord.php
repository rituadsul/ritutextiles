<?php 

include('../../function.php');
$db=new DB();

$val=0;

$month=$_POST['month'];
$year=$_POST['year'];
$user_id=$_POST['user_id'];

$month=(int)$month;
$year=(int)$year;
$user_id=(int)$user_id;
$is_accepted="Y";
	
	$str="UPDATE `finalsubmit` SET `is_accepted`=:is_accepted WHERE user_id=:user_id AND month=:month AND year=:year";
	$upd=$db->setData($db->con, $str, array('is_accepted'=>$is_accepted, 'user_id'=>$user_id, 
		'month'=>$month, 'year'=>$year));

	if($upd)
	{
		
			$val=1;
	}


echo json_encode($val);


 ?>
