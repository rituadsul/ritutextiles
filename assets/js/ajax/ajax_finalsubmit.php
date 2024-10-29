<?php 

include('../../function.php');
$db=new DB();

$val=0;

$month=$_POST['month'];
$year=$_POST['year'];
$user=$_POST['user'];



$sqladd="INSERT INTO `finalsubmit`( `user_id`, `month`, `year`) VALUES (:user_id, :month, :year)";


$addsubmit=$db->setData($db->con, $sqladd, array('user_id'=>$user, 'month'=>$month, 'year'=>$year) );

if($addsubmit){
	$val=1;
}

echo json_encode($val);


 ?>
