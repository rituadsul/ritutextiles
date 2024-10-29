<?php 

include('../../function.php');
$db=new DB();
session_start();

$val=0;

// $enter_date = $_POST['enter_date'];
if(isset($_POST['enter_date']))
{
	echo "fww";die();
	$enter_date= $_POST['enter_date'];

	$_SESSION['month']=date("m", strtotime($enter_date));
	$_SESSION['year']=date("Y", strtotime($enter_date));
	$_SESSION['enter_date']=$enter_date;
}elseif(isset($_POST['btntest'])){
  echo "f900ww";die();
  $enter_date = $_POST['enter_date'];
  $_SESSION['month']=date("m", strtotime($enter_date));
	$_SESSION['year']=date("Y", strtotime($enter_date));
	$_SESSION['enter_date']=$enter_date;
}
else
{
	echo "f87ww";die();

	$enter_date= date("Y-m-t", strtotime($enter_date));

	$_SESSION['month']=date("m", strtotime($enter_date));
	$_SESSION['year']=date("Y", strtotime($enter_date));
	$_SESSION['enter_date']=$enter_date;

}








	// $str="SELECT `page_history_id` FROM `page_history` WHERE page_name=:page_name AND enter_date=:enter_date AND user_id=:user_id ";

	// $getHistory=$db->getAssoc($db->con, $str, array('page_name'=>$page_name, 'enter_date'=>$enter_date, 'user_id'=>$user_id));
if(isset($_SESSION['enter_date']))
{
	$val=1;
}


echo json_encode($val);



?>