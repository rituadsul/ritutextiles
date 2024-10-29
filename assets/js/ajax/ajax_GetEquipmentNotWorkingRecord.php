<?php 

include('../../function.php');
$db = new DB();
$equipment_nonworking_id = $_POST['id'];

$sqlgetdetails = "SELECT ew.* , e.equipment_name
                  FROM equipment_nonworking AS ew
                  LEFT JOIN equipment_transaction AS e 
                  ON ew.equipment_id = e.equipment_transaction_id 
                  WHERE ew.equipment_nonworking_id = :equipment_nonworking_id";

$getValue = $db->getAssoc($db->con, $sqlgetdetails, 
    array('equipment_nonworking_id' => $equipment_nonworking_id)
);

echo json_encode($getValue);

?>
