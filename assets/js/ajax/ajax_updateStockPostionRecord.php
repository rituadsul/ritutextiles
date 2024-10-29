<?php 

include('../../function.php');
$db=new DB();

$val=0;

$stock_position_transaction_id = $_POST['stock_position_transaction_id'];
$stock_position_adequate = $_POST['stock_position_adequate'];
$action = $_POST['action'];




$sqlupdate="UPDATE `stock_position_transaction` SET `stock_position_adequate`=:stock_position_adequate, `action`=:action WHERE  stock_position_transaction_id=:stock_position_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'stock_position_adequate'=>$stock_position_adequate, 'action'=>$action, 'stock_position_transaction_id'=>$stock_position_transaction_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>