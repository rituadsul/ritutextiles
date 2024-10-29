<?php 

include('../../function.php');
$db=new DB();
$customer_id = $_POST['id'];

$sqlgetdetails="SELECT `customer_id`, `customer_name`, `test_sample`, `amount`  FROM `customer`  
				WHERE customer_id=:customer_id";


$getValue= $db->getAssoc($db->con,$sqlgetdetails, array('customer_id'=>$customer_id) );


echo json_encode($getValue);



 ?>