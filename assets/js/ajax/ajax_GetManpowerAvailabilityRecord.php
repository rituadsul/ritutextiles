<?php 

include('../../function.php');
$db=new DB();
$manpower_available_id = $_POST['id'];

$sqlgetdetails="SELECT mp.manpower_available_id, mp.designation_id, SUM(mp.from_lab)as from_lab, SUM(mp.from_other) as from_other, SUM(mp.from_lab+mp.from_other) as total, mp.month, mp.year, mp.user_id, mp.publish_date, mp.modify_date, d.designation_name
					FROM manpower_available as mp
					LEFT JOIN designation as d ON mp.designation_id=d.designation_id WHERE mp.manpower_available_id=:manpower_available_id";

$getValue= $db->getAssoc($db->con,$sqlgetdetails, 
	array('manpower_available_id'=>$manpower_available_id) );


echo json_encode($getValue);



 ?>
