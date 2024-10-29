<?php 

include('../../function.php');
$db=new DB();
$bulk_customer_id = $_POST['id'];

$sqlgetdetails="SELECT `bulk_customer_id`, `bulk_customer_name`,  `sample_reported`,  `testing_charges`, `remark` FROM `bulk_customer` WHERE bulk_customer_id=:bulk_customer_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, array('bulk_customer_id'=>$bulk_customer_id) );


echo json_encode($getValue);



 ?>