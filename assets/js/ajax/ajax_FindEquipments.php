<?php 

include('../../function.php');
$db=new DB();


$user_id = $_POST['user_id'];


	$str="SELECT `equipment_assign_id`, `equipment_id`, `user_id`, `is_active`, `publish_date`, `modify_date` FROM `equipment_assign` WHERE `user_id`=:user_id";
	$getEquipments=$db->getAssoc($db->con, $str, array('user_id'=>$user_id));

	if($getEquipments)
	{
		$getAllEquipments=$db->getAssoc($db->con, "SELECT `equipment_id`, `equipment_name`, `is_active`, `user_id`, `publish_date`, `modify_date` FROM `equipment` WHERE `is_active`=:is_active", array('is_active'=>'Y'));

		foreach ($getEquipments as $regkey) 
		{
			foreach ($getAllEquipments as $key) 
			{
				if($regkey['equipment_id']==$key['equipment_id']){
					$getEquipments['checked']='Y';
				}
			}
		}

	}
	else
	{
		$getEquipments=$db->getAssoc($db->con, "SELECT `equipment_id`, `equipment_name`, `is_active`, `user_id`, `publish_date`, `modify_date` FROM `equipment` WHERE `is_active`=:is_active", array('is_active'=>'Y'));
	}

	echo json_encode($getEquipments);

 ?>