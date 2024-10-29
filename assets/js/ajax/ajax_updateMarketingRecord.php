<?php 

include('../../function.php');
$db=new DB();

$val=0;

$marketing_activity_id = $_POST['marketing_activity_id'];
$company_name = $_POST['company_name'];
$company_type = $_POST['company_type'];
$contact_person = $_POST['contact_person'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$visited_date = $_POST['visited_date'];
$sample_received = $_POST['sample_received'];
$specific_requirement = $_POST['specific_requirement'];
$customer_response = $_POST['customer_response'];
$remark = $_POST['remark'];


$sqlupdate="UPDATE `marketing_activity` SET  `company_name`=:company_name,`company_type`=:company_type,`contact_person`=:contact_person,`contact_number`=:contact_number,`email`=:email,`visited_date`=:visited_date,`sample_received`=:sample_received,`customer_response`=:customer_response,`specific_requirement`=:specific_requirement,`remark`=:remark WHERE  `marketing_activity_id`=:marketing_activity_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('company_name'=>$company_name, 'company_type'=>$company_type, 
	'contact_person'=>$contact_person, 'contact_number'=>$contact_number, 'email'=>$email,   
	'visited_date'=>$visited_date, 'sample_received'=>$sample_received, 'customer_response'=>$customer_response,   
	'specific_requirement'=>$specific_requirement, 'remark'=>$remark, 'marketing_activity_id'=>$marketing_activity_id));

if($updateCertificate){
	$val=1;
}

echo json_encode($val);


 ?>