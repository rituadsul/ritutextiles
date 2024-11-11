<?php  require('header.php'); $getMonth=$db->getAllMonth($db, $db->con);

$getroname = $db->getallRoName($db, $db->con);
$user_choose='m';


$sampleTransaction=$db->getCurrentSampleTransaction($db, $db->con, $user_id, $month, $year);
$revenueTransaction=$db->getCurrentRevenueTransaction1($db, $db->con, $user_id, $month, $year);
$trainingTransaction=$db->getCurrentTrainingList($db, $db->con, $user_id, $month, $year);
$activityTransaction=$db->getCurrentActivityTransactionList($db, $db->con, $user_id, $month, $year);
$meetTransaction=$db->getCurrentMeetTransactionList($db, $db->con, $user_id, $month, $year);
$technicalConsultancyTransaction=$db->getCurrentTechnicalConsultancy($db, $db->con, $user_id, $month, $year);
$disposeTransaction=$db->getCurrentDisposeTransaction($db, $db->con, $user_id, $month, $year);
$expenditureTransaction=$db->getCurrentExpenditureTransaction($db, $db->con, $user_id, $month, $year);
$stockTransaction=$db->getCurrentStockPosition($db, $db->con, $user_id, $month, $year);
$equipmentTransaction=$db->getCurrentEquipmentTransaction($db, $db->con, $user_id, $month, $year);
$nonWorkingEquipmentTransaction=$db->getCurrentNonWorkingEquipment($db, $db->con, $user_id, $month, $year);
$customerTransaction=$db->getCurrentCustomer($db, $db->con, $user_id, $month, $year);
$marketingActivityTransaction=$db->getCurrentMarketingActivity($db, $db->con, $user_id, $month, $year);
$customerBulkTransaction=$db->getCurrentBulkCustomer($db, $db->con, $user_id, $month, $year);
$customerTatkalTransaction=$db->getCurrentTatkalCustomer($db, $db->con, $user_id, $month, $year);

$manpowerAvailablity=$db->getCurrentDesignationList($db, $db->con, $user_id, $month, $year);
$manpowerUtilisation=$db->getCurrentManpowerUtilisation($db, $db->con, $user_id, $month, $year);


$sampleCount=$db->getCurrentSampleCount($db, $db->con, $user_id, $month, $year);
$commercialSampleCount=$db->getCurrentSampleCountTypewise($db, $db->con, $user_id, $month, $year, "Y");
$noncommercialSampleCount=$db->getCurrentSampleCountTypewise($db, $db->con, $user_id, $month, $year, "N");
$revenueCount=$db->getCurrentRevenueCount($db, $db->con, $user_id, $month, $year);
$revenueNotionalCount=$db->getCurrentRevenueCountNotional($db, $db->con, $user_id, $month, $year);
$trainingCount=$db->getCurrentTrainingCount($db, $db->con, $user_id, $month, $year);
$activityCount=$db->getCurrentActivityCount($db, $db->con, $user_id, $month, $year);
$technicalConsultingCount=$db->getCurrentTechnicalConsultingCount($db, $db->con, $user_id, $month, $year);
$meetCount=$db->getCurrentMeetCount($db, $db->con, $user_id, $month, $year);
$disposeCount=$db->getCurrentDisposeCount($db, $db->con, $user_id, $month, $year);
$expenditureCount=$db->getCurrentExpenditureCount($db, $db->con, $user_id, $month, $year);
$equipmentCount=$db->getCurrentEquipment($db, $db->con, $user_id, $month, $year);
$customerCount=$db->getCurrentCustomerCount($db, $db->con, $user_id, $month, $year);
$marketingCount=$db->getCurrentMarketingCount($db, $db->con, $user_id, $month, $year);
$bulkCount=$db->getCurrentBulkCount($db, $db->con, $user_id, $month, $year);
$tatkalCount=$db->getCurrentTatkalCount($db, $db->con, $user_id, $month, $year);

if(isset($_POST['btnMonthlyChange']))
{ 
//$user_choose=

$month=$_POST['month'];
$_SESSION['month']=$month;
$year=$_POST['year'];
$_SESSION['year']=$year;

if($_SESSION['user_id']=='1'){
$ro_id=$_POST['ro_id'];
$_SESSION['ro_id']=$ro_id;
}


$sampleTransaction=$db->getCurrentSampleTransaction($db, $db->con, $user_id, $month, $year);
$revenueTransaction=$db->getCurrentRevenueTransaction($db, $db->con, $user_id, $month, $year);
$trainingTransaction=$db->getCurrentTrainingList($db, $db->con, $user_id, $month, $year);
$activityTransaction=$db->getCurrentActivityTransactionList($db, $db->con, $user_id, $month, $year);
$meetTransaction=$db->getCurrentMeetTransactionList($db, $db->con, $user_id, $month, $year);
$technicalConsultancyTransaction=$db->getCurrentTechnicalConsultancy($db, $db->con, $user_id, $month, $year);
$disposeTransaction=$db->getCurrentDisposeTransaction($db, $db->con, $user_id, $month, $year);
$expenditureTransaction=$db->getCurrentExpenditureTransaction($db, $db->con, $user_id, $month, $year);
$stockTransaction=$db->getCurrentStockPosition($db, $db->con, $user_id, $month, $year);
$equipmentTransaction=$db->getCurrentEquipmentTransaction($db, $db->con, $user_id, $month, $year);
$nonWorkingEquipmentTransaction=$db->getCurrentNonWorkingEquipment($db, $db->con, $user_id, $month, $year);
$customerTransaction=$db->getCurrentCustomer($db, $db->con, $user_id, $month, $year);
$marketingActivityTransaction=$db->getCurrentMarketingActivity($db, $db->con, $user_id, $month, $year);
$customerBulkTransaction=$db->getCurrentBulkCustomer($db, $db->con, $user_id, $month, $year);
$customerTatkalTransaction=$db->getCurrentTatkalCustomer($db, $db->con, $user_id, $month, $year);

$manpowerAvailablity=$db->getCurrentDesignationList($db, $db->con, $user_id, $month, $year);
$manpowerUtilisation=$db->getCurrentManpowerUtilisation($db, $db->con, $user_id, $month, $year);


$sampleCount=$db->getCurrentSampleCount($db, $db->con, $user_id, $month, $year);
$commercialSampleCount=$db->getCurrentSampleCountTypewise($db, $db->con, $user_id, $month, $year, "Y");
$noncommercialSampleCount=$db->getCurrentSampleCountTypewise($db, $db->con, $user_id, $month, $year, "N");
$revenueCount=$db->getCurrentRevenueCount($db, $db->con, $user_id, $month, $year);
$revenueNotionalCount=$db->getCurrentRevenueCountNotional($db, $db->con, $user_id, $month, $year);
$trainingCount=$db->getCurrentTrainingCount($db, $db->con, $user_id, $month, $year);
$activityCount=$db->getCurrentActivityCount($db, $db->con, $user_id, $month, $year);
$technicalConsultingCount=$db->getCurrentTechnicalConsultingCount($db, $db->con, $user_id, $month, $year);
$meetCount=$db->getCurrentMeetCount($db, $db->con, $user_id, $month, $year);
$disposeCount=$db->getCurrentDisposeCount($db, $db->con, $user_id, $month, $year);
$expenditureCount=$db->getCurrentExpenditureCount($db, $db->con, $user_id, $month, $year);
$equipmentCount=$db->getCurrentEquipment($db, $db->con, $user_id, $month, $year);
$customerCount=$db->getCurrentCustomerCount($db, $db->con, $user_id, $month, $year);
$marketingCount=$db->getCurrentMarketingCount($db, $db->con, $user_id, $month, $year);
$bulkCount=$db->getCurrentBulkCount($db, $db->con, $user_id, $month, $year);
$tatkalCount=$db->getCurrentTatkalCount($db, $db->con, $user_id, $month, $year);


}

if(isset($_POST['btnDeleteRecord']))
{

$del=$db->deleteAllRecord($db, $db->con, $user_id, $month, $year);

if($del==1)
{
$cl=$db->clearPageHistory($db, $db->con, $user_id, $month, $year);

if($cl==1)
{
echo "alert('Your record deleted Successfully...!!')";
header("location:index.php");
}

}

}


if (isset($_POST['sample_transaction_edit'])) 
{

$val=0;
$sample_transaction_id = $_POST['sample_transaction_id'];
$qua_nonreg = $_POST['qua_nonreg'];
$eco_nonreg = $_POST['eco_nonreg'];
$qua_reg = $_POST['qua_reg'];
$eco_reg = $_POST['eco_reg'];

$total = ($qua_nonreg+$eco_nonreg+$qua_reg+$eco_reg);

$row_num = $_POST['row_num']; 

   
    if ($row_num == 4) {

      $month = $_SESSION['month'];
      $year = $_SESSION['year'];

      $sql = "SELECT * FROM `sample_transaction` WHERE month=:month and year=:year limit 2";

      $getSample=$db->getAssoc($db->con, $sql, array('month'=>$month, 'year'=>$year));

      $total_qua_nonreg_3 = 0;
      $total_eco_nonreg_3 = 0;
      $total_qua_reg_3 = 0;
      $total_eco_reg_3 = 0;
      $total_total_3 = 0;

 foreach ($getSample as $row) {
     
        $total_qua_nonreg_3 += (float)$row['qua_nonreg'];
        $total_eco_nonreg_3 += (float)$row['eco_nonreg'];
        $total_qua_reg_3 += (float)$row['qua_reg'];
        $total_eco_reg_3 += (float)$row['eco_reg'];
        $total_total_3 += (float)$row['total'];
    }
    
    $row_3_qua_nonreg = $total_qua_nonreg_3;
    $row_3_eco_nonreg = $total_eco_nonreg_3;
    $row_3_qua_reg = $total_qua_reg_3;
    $row_3_eco_reg = $total_eco_reg_3;


    $qua_nonreg = isset($_POST['qua_nonreg']) ? (float)$_POST['qua_nonreg'] : 0;
    $eco_nonreg = isset($_POST['eco_nonreg']) ? (float)$_POST['eco_nonreg'] : 0;
    $qua_reg = isset($_POST['qua_reg']) ? (float)$_POST['qua_reg'] : 0;
    $eco_reg = isset($_POST['eco_reg']) ? (float)$_POST['eco_reg'] : 0;

    if ($qua_nonreg > $row_3_qua_nonreg || $eco_nonreg > $row_3_eco_nonreg || 
        $qua_reg > $row_3_qua_reg || $eco_reg > $row_3_eco_reg) {

        echo ("<script language='JavaScript'>
        window.alert('Row 4 values cannot be greater than Row 3 values.');
        window.location.href='ro_report.php';
        </script>");
           exit();
           
        }
      }


$sqlupdate="UPDATE `sample_transaction` SET `qua_nonreg`=:qua_nonreg, `eco_nonreg`=:eco_nonreg, `qua_reg`=:qua_reg, `eco_reg`=:eco_reg,`total`=:total WHERE`sample_transaction_id`=:sample_transaction_id";


$addSample=$db->setData($db->con, $sqlupdate, array('qua_nonreg'=>$qua_nonreg, 'eco_nonreg'=>$eco_nonreg, 'qua_reg'=>$qua_reg, 'eco_reg'=>$eco_reg, 'total'=>$total,   'sample_transaction_id'=>$sample_transaction_id));


if($addSample)
{
$done=1;
}

if($done==1)
{

$sqlquery = "SELECT year, month
FROM sample_transaction_final
WHERE `user_id`=:user_id
ORDER BY year DESC, month DESC
LIMIT 1;
";

$valarray88 = array('user_id'=>$user_id);

$get = $db->getAssoc($db->con, $sqlquery, $valarray88);

$currentMonth = $month;
$currentYear = $year;

$endMonth = $get[0]['month'];
$endYear = $get[0]['year'];

while ($currentYear < $endYear || ($currentYear == $endYear && $currentMonth <= $endMonth)) {
 
    $sampleTransaction=$db->getCurrentSampleTransaction($db, $db->con, $user_id, $currentMonth, $currentYear);


    if($currentMonth =='01'|| $currentMonth =='1'){
        $prevmonth = '12';
        $currentYear = $currentYear - 1;
     }else{
        $prevmonth = $currentMonth - 1;
    }
    $finalprev = $db->getCurrentSampleTransactionfinal1($db, $db->con, $user_id, $prevmonth, $currentYear);

       $qua_nonreg_final = isset($finalprev[0]['qua_nonreg']) ? $finalprev[0]['qua_nonreg'] : 0;
        $eco_nonreg_final = isset($finalprev[0]['eco_nonreg']) ? $finalprev[0]['eco_nonreg'] : 0;
        $qua_reg_final = isset($finalprev[0]['qua_reg']) ? $finalprev[0]['qua_reg'] : 0;
        $eco_reg_final = isset($finalprev[0]['eco_reg']) ? $finalprev[0]['eco_reg'] : 0;
        $total_final = isset($finalprev[0]['total']) ? $finalprev[0]['total'] : 0;

        $total_qua_nonreg_3 = $sampleTransaction[1]['qua_nonreg'] + $qua_nonreg_final;
        $total_eco_nonreg_3 = $sampleTransaction[1]['eco_nonreg'] + $eco_nonreg_final;
        $total_qua_reg_3 = $sampleTransaction[1]['qua_reg'] + $qua_reg_final;
        $total_eco_reg_3 = $sampleTransaction[1]['eco_reg'] + $eco_reg_final;
        $total_total_3 = $total_qua_nonreg_3 + $total_eco_nonreg_3 + $total_qua_reg_3 + $total_eco_reg_3;

        $qua_nonreg_5 = $total_qua_nonreg_3 - $sampleTransaction[3]['qua_nonreg'] ;
        $eco_nonreg_5 = $total_eco_nonreg_3 - $sampleTransaction[3]['eco_nonreg'];
        $qua_reg_5 = $total_qua_reg_3 - $sampleTransaction[3]['qua_reg'];
        $eco_reg_5 = $total_eco_reg_3 - $sampleTransaction[3]['eco_reg'];
        $total_5 = $total_total_3 - $sampleTransaction[3]['total'];

        $sqlf="UPDATE `sample_transaction_final` SET `qua_nonreg`=:qua_nonreg, `eco_nonreg`=:eco_nonreg, `qua_reg`=:qua_reg, `eco_reg`=:eco_reg,`total`=:total WHERE user_id=:user_id AND month=:month AND year=:year" ;

        $addSample = $db->setData($db->con, $sqlf, array('qua_nonreg'=>$qua_nonreg_5, 'eco_nonreg'=>$eco_nonreg_5, 'qua_reg'=>$qua_reg_5, 'eco_reg'=>$eco_reg_5, 'total'=>$total_5,'user_id'=>$user_id, 'month'=>$currentMonth, 'year'=>$currentYear));

    
    if ($currentMonth == 12) {
        $currentMonth = 1;
        $currentYear++;
    } else {
        $currentMonth++;
    }
}


$_SESSION['success']="Sample Data Updated";

header("location:ro_report.php");exit;

}
else
{

$_SESSION['error']="Sample Data Not Updated";
header("location:ro_report.php");exit;
}


}


if(isset($_POST['revenueTransaction_edit'])){

   // print_r($_POST);die();
    $rev_total=0;

$revenue_transaction_id = $_POST['revenue_transaction_id'];
$rev_qua_nonreg = $_POST['rev_qua_nonreg'];
$rev_eco_nonreg = $_POST['rev_eco_nonreg'];
$rev_qua_reg = $_POST['rev_qua_reg'];
$rev_eco_reg = $_POST['rev_eco_reg'];
$rev_total = ((int)$rev_qua_nonreg+(int)$rev_eco_nonreg+(int)$rev_qua_reg+(int)$rev_eco_reg);


$sqlupdate="UPDATE `revenue_transaction` SET `rev_qua_nonreg`=:rev_qua_nonreg, `rev_eco_nonreg`=:rev_eco_nonreg, `rev_qua_reg`=:rev_qua_reg, `rev_eco_reg`=:rev_eco_reg, `rev_total`=:rev_total WHERE `revenue_transaction_id`=:revenue_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('rev_qua_nonreg'=>$rev_qua_nonreg, 'rev_eco_nonreg'=>$rev_eco_nonreg, 'rev_qua_reg'=>$rev_qua_reg, 'rev_eco_reg'=>$rev_eco_reg, 'rev_total'=>$rev_total,   'revenue_transaction_id'=>$revenue_transaction_id));

if($revenue_transaction_id=='3'){

    $sql = "SELECT * from revenue_transaction where `revenue_transaction_id`=:revenue_transaction_id ";

    $getrecord=$db->getAssoc($db->con, $sql, array('revenue_transaction_id'=>$revenue_transaction_id));

    print_r($getrecord);die();

}

if($updateCertificate)
{
$done=1;
}

if($done==1)
{

$_SESSION['success']="Revenue Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Revenue Data Not Updated";
header("location:ro_report.php");exit;
}

}


if (isset($_POST['training_transaction_edit'])) 
{
  
$training_program_id = $_POST['training_program_id'];
$organisation_name = $_POST['organisation_name'];
$training_date = $_POST['training_date'];
$participant_no = $_POST['participant_no'];
$amount = $_POST['amount'];
$gst_amount = $_POST['gst_amount'];


$sqlupdate="UPDATE `training_program` SET `organisation_name`=:organisation_name, `training_date`=:training_date, `participant_no`=:participant_no, `amount`=:amount,`gst_amount`=:gst_amount  WHERE `training_program_id`=:training_program_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('organisation_name'=>$organisation_name, 'training_date'=>$training_date, 'participant_no'=>$participant_no, 'amount'=>$amount, 'gst_amount'=>$gst_amount,   'training_program_id'=>$training_program_id));

if($updateCertificate)
{
$done=1;
}

if($done==1)
{

$_SESSION['success']="Training Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Training Data Not Updated";
header("location:ro_report.php");exit;
}

}

if (isset($_POST['activity_transaction_edit'])) 
{

$activity_transaction_id = $_POST['activity_transaction_id'];
$organisation_name = $_POST['organisation_name'];
$name_of_units = $_POST['name_of_units'];
$training_program = $_POST['training_program'];
$date_of_commencement = $_POST['date_of_commencement'];
$date_of_completion = $_POST['date_of_completion'];
$remark = $_POST['remark'];
$gst_amount = $_POST['gst_amount'];
$amount =  $_POST['amount'];


$sqlupdate="UPDATE `activity_transaction` SET `organisation_name`=:organisation_name, `training_program`=:training_program, `name_of_units`=:name_of_units,`date_of_commencement`=:date_of_commencement, `date_of_completion`=:date_of_completion, `remark`=:remark,`amount`=:amount, `gst_amount`=:gst_amount  WHERE `activity_transaction_id`=:activity_transaction_id";

  $updateCertificate=$db->setData($db->con, $sqlupdate, array('organisation_name'=>$organisation_name, 'name_of_units'=>$name_of_units,'training_program'=>$training_program,'date_of_commencement'=>$date_of_commencement, 'date_of_completion'=>$date_of_completion, 'remark'=>$remark, 'amount'=>$amount, 'gst_amount'=>$gst_amount,  'activity_transaction_id'=>$activity_transaction_id));

// echo "ghfhf";die();
if($updateCertificate)
{
$done=1;
}

if($done==1)
{

$_SESSION['success']="Activity Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Activity Data Not Updated";
header("location:ro_report.php");exit;
}

}



if (isset($_POST['meet_transaction_edit'])) 
{
$meet_transaction_id = $_POST['meet_transaction_id'];
$meet_date = $_POST['meet_date'];
$place = $_POST['place'];
$participant = $_POST['participant'];
$remark = $_POST['meet_remark'];
$description = $_POST['description'];



$sqlupdate="UPDATE `meet_transaction` SET `meet_date`=:meet_date,`place`=:place,`participant`=:participant,`remark`=:remark,`description`=:description WHERE meet_transaction_id=:meet_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('meet_date'=>$meet_date, 'place'=>$place, 'participant'=>$participant, 'remark'=>$remark, 'description'=>$description,  'meet_transaction_id'=>$meet_transaction_id));

if($updateCertificate)
{
$done=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Meet Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Meet Data Not Updated";
header("location:ro_report.php");exit;
}

}


if (isset($_POST['technicalConsultancyTransaction_edit'])) 
{
$technical_consultancy_id = $_POST['technical_consultancy_id'];
$name_of_sme = $_POST['name_of_sme'];
$consultancy_type = $_POST['consultancy_type'];
$amount = $_POST['amount'];
$gst_amount = $_POST['gst_amount'];

$sqlupdate="UPDATE `technical_consultancy` SET `name_of_sme`=:name_of_sme,`consultancy_type`=:consultancy_type,`amount`=:amount,`gst_amount`=:gst_amount WHERE `technical_consultancy_id`=:technical_consultancy_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('name_of_sme'=>$name_of_sme, 'consultancy_type'=>$consultancy_type, 'amount'=>$amount, 'gst_amount'=>$gst_amount, 'technical_consultancy_id'=>$technical_consultancy_id));

if($updateCertificate){
    $done=1;
}

else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Consultancy Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Consultancy Data Not Updated";
header("location:ro_report.php");exit;
}

}


if (isset($_POST['disposeTransaction_edit'])) 
{
    $dispose_item_id = $_POST['dispose_item_id'];
$dispose_item_transaction_id = $_POST['dispose_item_transaction_id'];
$date_of_dispose = $_POST['date_of_dispose'];
$date_of_after_dispose = $_POST['date_of_after_dispose'];
$amount = $_POST['amount'];

$sqlupdate="UPDATE `dispose_item_transaction` SET `dispose_item_id`=:dispose_item_id, `date_of_dispose`=:date_of_dispose,`date_of_after_dispose`=:date_of_after_dispose,`amount`=:amount WHERE dispose_item_transaction_id=:dispose_item_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('dispose_item_id'=>$dispose_item_id, 'date_of_dispose'=>$date_of_dispose, 'date_of_after_dispose'=>$date_of_after_dispose, 'amount'=>$amount, 'dispose_item_transaction_id'=>$dispose_item_transaction_id));

if($updateCertificate){
    $done=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Dispose Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Dispose Data Not Updated";
header("location:ro_report.php");exit;
}

}

if (isset($_POST['expenditureTransaction_edit'])) 
{
$expenditure_label_id = $_POST['expenditure_label_id'];
$expenditure_transaction_id = $_POST['expenditure_transaction_id'];
$amount = $_POST['amount'];
$remark = $_POST['remark'];




$sqlupdate="UPDATE `expenditure_transaction` SET `expenditure_label_id`=:expenditure_label_id, `amount`=:amount,`remark`=:remark WHERE  expenditure_transaction_id=:expenditure_transaction_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array('expenditure_label_id'=>$expenditure_label_id, 'amount'=>$amount, 'remark'=>$remark, 'expenditure_transaction_id'=>$expenditure_transaction_id));

if($updateCertificate){
    $done=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Stock Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Stock Data Not Updated";
header("location:ro_report.php");exit;
}

}


if(isset($_POST['stockTransaction_edit'])){
    $stock_position_label_id = $_POST['stock_position_label_id'];
    $stock_position_transaction_id = $_POST['stock_position_transaction_id'];
$stock_position_adequate = $_POST['stock_position_adequate'];
$action = $_POST['action'];

$sqlupdate="UPDATE `stock_position_transaction` SET `stock_position_label_id`=:stock_position_label_id, `stock_position_adequate`=:stock_position_adequate, `action`=:action WHERE  stock_position_transaction_id=:stock_position_transaction_id";

$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'stock_position_label_id'=>$stock_position_label_id, 'stock_position_adequate'=>$stock_position_adequate, 'action'=>$action, 'stock_position_transaction_id'=>$stock_position_transaction_id));

if($updateCertificate){
    $done=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Stock Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Stock Data Not Updated";
header("location:ro_report.php");exit;
}


}


if(isset($_POST['equipmentTransaction_edit']))
{
$equipment_transaction_id = $_POST['equipment_transaction_id'];
$parameter_name = $_POST['parameter_name'];
$test_performed = $_POST['test_performed'];
$remark = $_POST['remark'];

$sqlupdate="UPDATE `equipment_transaction` SET `test_performed`=:test_performed,`remark`=:remark, `parameter_name`=:parameter_name WHERE equipment_transaction_id=:equipment_transaction_id";

$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'test_performed'=>$test_performed, 'remark'=>$remark,'parameter_name'=>$parameter_name, 'equipment_transaction_id'=>$equipment_transaction_id));

if($updateCertificate){
    $done=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Equpiment Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Equpiment Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['nonWorkingEquipmentTransaction_edit'])){

    $equipment_id = $_POST['equipment_id'];
$equipment_nonworking_id = $_POST['equipment_nonworking_id'];
$problem = $_POST['problem'];
$action = $_POST['action'];

$sqlupdate="UPDATE `equipment_nonworking` SET `problem`=:problem,`action`=:action,`equipment_id`=:equipment_id WHERE equipment_nonworking_id=:equipment_nonworking_id";

$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'problem'=>$problem, 'action'=>$action, 'equipment_id'=>$equipment_id, 'equipment_nonworking_id'=>$equipment_nonworking_id));

    if($updateCertificate){
    $done=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Nonworking Equpiment Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Nonworking Equpiment Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['customerTransaction_edit'])){

    $customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$test_sample = $_POST['test_sample'];
$amount = $_POST['amount'];

$sqlupdate="UPDATE `customer` SET `customer_name`=:customer_name,`test_sample`=:test_sample, `amount`=:amount WHERE  customer_id=:customer_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'customer_name'=>$customer_name, 'test_sample'=>$test_sample, 'amount'=>$amount,  'customer_id'=>$customer_id));


if($updateCertificate){
    $val=1;
}
else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($val==1)
{

$_SESSION['success']="Customer Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Customer Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['marketingActivityTransaction_edit'])){

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


$updateCertificate=$db->setData($db->con, $sqlupdate, array('company_name'=>$company_name, 'company_type'=>$company_type,'contact_person'=>$contact_person, 'contact_number'=>$contact_number, 'email'=>$email,'visited_date'=>$visited_date, 'sample_received'=>$sample_received, 'customer_response'=>$customer_response, 'specific_requirement'=>$specific_requirement, 'remark'=>$remark, 'marketing_activity_id'=>$marketing_activity_id));

if($updateCertificate){
    $done=1;
}else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Marketing Activity Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Marketing Activity Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['customerBulkTransaction_edit'])){
    $bulk_customer_id = $_POST['bulk_customer_id'];
$bulk_customer_name = $_POST['bulk_customer_name'];
$sample_reported = $_POST['sample_reported'];
$testing_charges = $_POST['testing_charges'];
$remark = $_POST['remark'];

$sqlupdate="UPDATE `bulk_customer` SET `bulk_customer_name`=:bulk_customer_name, `sample_reported`=:sample_reported, `testing_charges`=:testing_charges,`remark`=:remark WHERE  bulk_customer_id=:bulk_customer_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'bulk_customer_name'=>$bulk_customer_name, 'sample_reported'=>$sample_reported, 'testing_charges'=>$testing_charges, 'remark'=>$remark,  'bulk_customer_id'=>$bulk_customer_id));

if($updateCertificate){
    $done=1;
}else {
    // echo "Update failed: " . $db->con->errorInfo()[2];die();
}

if($done==1)
{

$_SESSION['success']="Bulk Customer Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Bulk Customer Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['customerTatkalTransaction_edit']))
{

$tatkal_customer_id = $_POST['tatkal_customer_id'];
$tatkal_customer_name = $_POST['tatkal_customer_name'];
$tatkal_sample_reported = $_POST['tatkal_sample_reported'];
$tatkal_testing_charges = $_POST['tatkal_testing_charges'];
$tatkal_remark = $_POST['tatkal_remark'];

$sqlupdate="UPDATE `tatkal_customer` SET `tatkal_customer_name`=:tatkal_customer_name, `tatkal_sample_reported`=:tatkal_sample_reported, `tatkal_testing_charges`=:tatkal_testing_charges,`tatkal_remark`=:tatkal_remark WHERE  tatkal_customer_id=:tatkal_customer_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'tatkal_customer_name'=>$tatkal_customer_name, 'tatkal_sample_reported'=>$tatkal_sample_reported, 'tatkal_testing_charges'=>$tatkal_testing_charges, 'tatkal_remark'=>$tatkal_remark,  'tatkal_customer_id'=>$tatkal_customer_id));

if($updateCertificate){
    $done=1;
}
    if($done==1)
{

$_SESSION['success']="Customer Tatkal Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Customer Tatkal Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['manpowerAvailablity_edit']))
{

    $manpower_available_id = $_POST['manpower_available_id'];
$designation_id = $_POST['designation_id'];
$from_lab = $_POST['from_lab'];
$from_other = $_POST['from_other'];
$total = $_POST['total'];

$sqlupdate="UPDATE `manpower_available` SET `designation_id`=:designation_id, `from_lab`=:from_lab, `from_other`=:from_other,`total`=:total WHERE  manpower_available_id=:manpower_available_id";


$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'designation_id'=>$designation_id, 'from_lab'=>$from_lab, 'from_other'=>$from_other, 'total'=>$total,'manpower_available_id'=>$manpower_available_id));


    if($updateCertificate){
    $done=1;
}
    if($done==1)
{

$_SESSION['success']="Manpower Availability Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Manpower Availability Data Not Updated";
header("location:ro_report.php");exit;
}

}

if(isset($_POST['manpowerutilisation_edit'])){

$manpower_transaction_id = $_POST['manpower_transaction_id'];
$technical_manpower = $_POST['technical_manpower'];
$working_day = $_POST['working_day'];
$extra_man_day = $_POST['extra_man_day'];
$addtional_working = $_POST['addtional_working'];
$total_a = $_POST['total_a'];
$special_work = $_POST['special_work'];
$deputation = $_POST['deputation'];
$leave_day = $_POST['leave_day'];
$total_b = $_POST['total_b'];
$total_c = $_POST['total_c'];
$total_s = $_POST['total_s'];
$average_op = $_POST['average_op'];
$total_p = $_POST['total_p'];
$average_pm = $_POST['average_pm'];

$sqlupdate="UPDATE `manpower_transaction` SET `technical_manpower`=:technical_manpower, `working_day`=:working_day, `extra_man_day`=:extra_man_day,`addtional_working`=:addtional_working, `total_a`=:total_a, `special_work`=:special_work, `deputation`=:deputation, `leave_day`=:leave_day, `total_b`=:total_b, `total_c`=:total_c, `total_s`=:total_s, `average_op`=:average_op, `total_p`=:total_p, `average_pm`=:average_pm WHERE manpower_transaction_id=:manpower_transaction_id";

$updateCertificate=$db->setData($db->con, $sqlupdate, array( 'manpower_transaction_id'=>$manpower_transaction_id, 'technical_manpower'=>$technical_manpower, 'working_day'=>$working_day, 'extra_man_day'=>$extra_man_day,  'addtional_working'=>$addtional_working, 'total_a'=>$total_a, 'special_work'=>$special_work, 'deputation'=>$deputation, 'leave_day'=>$leave_day, 'total_b'=>$total_b, 'total_c'=>$total_c, 'total_s'=>$total_s,'average_op'=>$average_op, 'total_p'=>$total_p, 'average_pm'=>$average_pm));

if($updateCertificate){
    $done=1;
}
    if($done==1)
{

$_SESSION['success']="Manpower Utilisation Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Manpower Utilistion Data Not Updated";
header("location:ro_report.php");exit;
}

}

?>

<div class="content-page">
<div class="content">

<!-- Start Content-->
<div class="container-xxl">

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
<div class="flex-grow-1">
<h4 class="fs-18 fw-semibold m-0">Report  <?php //echo gmp_fact(4); ?></h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Report</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">All report of <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>
<div class="py-2">

<form class="form-horizontal" method="post">
<input class="form-control" style="display: none" type="hidden"  name="user_id" id="user_id" value="<?=$user_id ?>" readonly>


<div class="col-md-3" style="display:inline-block;margin-right: 10px;">
<label>Month</label>

<select class="form-control"  name="month" required>
<option value="">Select Month</option>
<?php if($getMonth){ foreach ($getMonth as $key): ?>
<option value= "<?=$key['month_id']?>" <?php if($month==$key['month_id']){echo "Selected";}?>> <?=$key['month_title']?> </option>
<?php endforeach;} ?>
</select>
</div>
<div class="col-md-3" style="display:inline-block;margin-right: 10px;">
<label>Year</label>

<?php if($_SESSION['user_id']=="1") {?>
<select class="form-control" name="year" required>
<option value="">Select Year</option>
<?php 
$currentYear = date('Y');
for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
$selected = (isset($year) && $year == $i) ? 'selected' : '';
echo "<option value='$i' $selected>$i</option>";
}
?>
</select>
<?php }else {  ?>
<select class="form-control "  name="year" required>
<option value="">Select Year</option>
<?php $s="";
for($i = date('Y') ; $i >= date('Y')-5; $i--)
{
if($year==$i){ $s="selected";}else{ $s="";}
echo "<option value='$i'".$s.">$i</option>";
}
?>
</select>
<?php } ?>
</div>
<?php if($_SESSION['user_id']=="1") { ?>

<div class="col-md-3" style="display:inline-block;margin-right: 10px;">
<label>Regional Office</label>
<select class="form-control "  name="ro_id" required>
<option value="">Select RO</option>
<?php if($getroname){ 
foreach ($getroname as $key){ ?>
<option value="<?php echo $key['ro_id']; ?>"   <?php if($ro_id==$key['ro_id']){echo "Selected";}?>><?php echo $key['ro_name']; ?> </option>
<?php } } ?>
</select>
</div>

<?php } ?>

<button class="btn btn-primary" name="btnMonthlyChange" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>View Report</button>                 


</form>

</div>


<div class="table-responsive">
<h6>Testing Activity</h6>
<h6 class="mb-2 line-head" id="typography" >A.  Details of samples received and tested</h6>
<?php if ($sampleTransaction) { ?>

<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th rowspan="2">Sr No</th>
<th rowspan="2">Samples</th>
<th colspan="2">Non-Regulatory</th>
<th colspan="2">Regulatory</th>
<th rowspan="2">Total</th>
<th rowspan="2">Action</th> 

</tr>
<tr>                  
<th>Quality </th>
<th>Eco</th> 
<th>Quality</th>
<th>Eco</th>             
</tr>

</thead>
<tbody>
<?php 
    $i = 1; 

    if($_SESSION['month']=='01'|| $_SESSION['month']=='1'){
        $prevmonth = '12';
        $year = $_SESSION['year'] - 1;
     }else{
    $prevmonth = $_SESSION['month'] - 1;
}
    $finalprev = $db->getCurrentSampleTransactionfinal1($db, $db->con, $user_id, $prevmonth, $year);

    foreach ($sampleTransaction as $regkey): 

        $qua_nonreg_final = isset($finalprev[0]['qua_nonreg']) ? $finalprev[0]['qua_nonreg'] : 0;
        $eco_nonreg_final = isset($finalprev[0]['eco_nonreg']) ? $finalprev[0]['eco_nonreg'] : 0;
        $qua_reg_final = isset($finalprev[0]['qua_reg']) ? $finalprev[0]['qua_reg'] : 0;
        $eco_reg_final = isset($finalprev[0]['eco_reg']) ? $finalprev[0]['eco_reg'] : 0;
        $total_final = isset($finalprev[0]['total']) ? $finalprev[0]['total'] : 0;

        $total_qua_nonreg_3 = $sampleTransaction[1]['qua_nonreg'] + $qua_nonreg_final;
        $total_eco_nonreg_3 = $sampleTransaction[1]['eco_nonreg'] + $eco_nonreg_final;
        $total_qua_reg_3 = $sampleTransaction[1]['qua_reg'] + $qua_reg_final;
        $total_eco_reg_3 = $sampleTransaction[1]['eco_reg'] + $eco_reg_final;
        $total_total_3 = $total_qua_nonreg_3 + $total_eco_nonreg_3 + $total_qua_reg_3 + $total_eco_reg_3;
?>

<tr>
    <td><?= $i ?></td>
    <td><?= htmlspecialchars($regkey['sample_name']) ?></td>
    <td>
        <?php if ($i == 1) { ?>
            <?= $qua_nonreg_final . '.00' ?>
        <?php } elseif ($i == 3) { ?>
            <?= $total_qua_nonreg_3 . '.00' ?>
        <?php } else { ?>
            <?= $regkey['qua_nonreg'] ?>
        <?php } ?>
    </td>
    <td>
        <?php if ($i == 1) { ?>
            <?= $eco_nonreg_final . '.00' ?>
        <?php } elseif ($i == 3) { ?>
            <?= $total_eco_nonreg_3 . '.00' ?>
        <?php } else { ?>
            <?= $regkey['eco_nonreg'] ?>
        <?php } ?>
    </td>
    <td>
        <?php if ($i == 1) { ?>
            <?= $qua_reg_final . '.00' ?>
        <?php } elseif ($i == 3) { ?>
            <?= $total_qua_reg_3 . '.00' ?>
        <?php } else { ?>
            <?= $regkey['qua_reg'] ?>
        <?php } ?>
    </td>
    <td>
        <?php if ($i == 1) { ?>
            <?= $eco_reg_final . '.00' ?>
        <?php } elseif ($i == 3) { ?>
            <?= $total_eco_reg_3 . '.00' ?>
        <?php } else { ?>
            <?= $regkey['eco_reg'] ?>
        <?php } ?>
    </td>
    <td>
        <?php if ($i == 1) { ?>
            <?= $total_final . '.00' ?>
        <?php } elseif ($i == 3) { ?>
            <?= $total_total_3 . '.00' ?>
        <?php } else { ?>
            <?= ($regkey['qua_nonreg'] + $regkey['eco_nonreg'] + $regkey['qua_reg'] + $regkey['eco_reg']) . '.00' ?>
        <?php } ?>
    </td>
    <td>
    <?php if ($i==1 || $i == 3 || $i == 5) { ?>
     
    <?php } else { ?>
        <span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sampleModel<?=$i?>" style="padding: 5px!important;">
        <i data-feather="edit"></i></span>
    <?php } ?>
</td> 
</tr>
      
<!-- Sample Modal -->
<div class="modal fade" id="sampleModel<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-row="<?=$i?>">
  <div class="modal-dialog">

    <form class="form-horizontal"  method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">

          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="sample_transaction_id" value="<?=$regkey['sample_transaction_id']?>"  readonly>
              <input type="hidden" name="row_num" value="<?=$i?>">

            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Sample Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="sample_name"  value="<?=$regkey['sample_name']?>" readonly>
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Non-Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number"  name="qua_nonreg" id="inputField" value="<?=$regkey['qua_nonreg']?>">
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Non-Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="eco_nonreg" id="inputField" value="<?=$regkey['eco_nonreg']?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="qua_reg" id="inputField"  value="<?=$regkey['qua_reg']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="eco_reg" id="inputField" value="<?=$regkey['eco_reg']?>">
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="sample_transaction_edit" class="btn btn-primary">Save changes</button>
    </div>
     
    </div>

        </form>
        

  </div>
</div>



<?php $i++; endforeach; ?>
<form  class="form-horizontal" method="post" >

<tr>

 <?php 
$qua_nonreg_5 = $total_qua_nonreg_3 - $sampleTransaction[3]['qua_nonreg'] ;
$eco_nonreg_5 = $total_eco_nonreg_3 - $sampleTransaction[3]['eco_nonreg'];
$qua_reg_5 = $total_qua_reg_3 - $sampleTransaction[3]['qua_reg'];
$eco_reg_5 = $total_eco_reg_3 - $sampleTransaction[3]['eco_reg'];
$total_5 = $total_total_3 - $sampleTransaction[3]['total'];

$sqlf="UPDATE `sample_transaction_final` SET `qua_nonreg`=:qua_nonreg, `eco_nonreg`=:eco_nonreg, `qua_reg`=:qua_reg, `eco_reg`=:eco_reg,`total`=:total WHERE user_id=:user_id AND month=:month AND year=:year" ;

$addSample = $db->setData($db->con, $sqlf, array('qua_nonreg'=>$qua_nonreg_5, 'eco_nonreg'=>$eco_nonreg_5, 'qua_reg'=>$qua_reg_5, 'eco_reg'=>$eco_reg_5, 'total'=>$total_5,'user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

             ?>

  
    <td>5</td>
    <td>Samples pending at the end of current month (3-4)</td>
    <td><?php echo $total_qua_nonreg_3 - $sampleTransaction[3]['qua_nonreg'].'.00' ?></td>
   <td><?php echo $total_eco_nonreg_3 - $sampleTransaction[3]['eco_nonreg'].'.00' ?></td>
   <td><?php echo $total_qua_reg_3 - $sampleTransaction[3]['qua_reg'].'.00' ?></td>
   <td><?php echo $total_eco_reg_3 - $sampleTransaction[3]['eco_reg'].'.00' ?></td>
   <td><?php echo $total_total_3 - $sampleTransaction[3]['total'].'.00' ?></td>
   <td></td>
</tr>
</form>
</tbody>

</table>
<?php
} else { echo "No Records found";} ?>   
</div>



<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >B.  Details of Revenue (Rs.) received and pending</h6>
<?php if ($revenueTransaction) { ?>

<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th rowspan="2">Sr No</th>
<th rowspan="2">Revenue (Rs)</th>
<th colspan="2">Non-Regulatory</th>
<th colspan="2"> Regulatory</th>
<th rowspan="2">Total</th>  
<th rowspan="2">Action</th>
</tr>
<tr>                  
<th>Quality </th>
<th>Eco</th> 
<th>Quality</th>
<th>Eco</th>             
</tr>

</thead>
<tbody>
<?php $i=1; foreach ($revenueTransaction as $regkey): ?>
<tr>
<td><?php 
if($i % 2 != 0 && $i!='1'){ 
   echo (int)($i+1 - ($i / 2));
}elseif($i=='1'){
    echo $i;
}elseif($i % 2 == 0 && $i=='2'){
    echo $i-1 . ".1";
}
else{ 
    echo ($i - ($i/2)) . ".1";} ?></td>
<td>
<?=$regkey['revenue_label_name']?>
</td>
<td style="text-align: right;">
<?=$regkey['rev_qua_nonreg']?>
</td>
<td style="text-align: right;">
<?=$regkey['rev_eco_nonreg']?>
</td>
<td style="text-align: right;">
<?=$regkey['rev_qua_reg']?>
</td>
<td style="text-align: right;">
<?=$regkey['rev_eco_reg']?>
</td>
<td style="text-align: right;">
<?=$regkey['rev_total']?>
</td> 
  <?php if ($i==3 || $i == 7) { ?>
<td>
  <span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#revenueTransactionModel<?=$i?>" style="padding: 5px!important;">
        <i data-feather="edit"></i></span>
</td>

<?php }else {?>
<td></td>
<?php } ?>
</tr>

<!-- Revenue Modal -->
<div class="modal fade" id="revenueTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

    <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="revenue_transaction_id" value="<?=$regkey['revenue_transaction_id']?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Revenue Label</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="revenue_label_name" value="<?=$regkey['revenue_label_name']?>" readonly style="background-color: #f8f9fa;">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Non-Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number"  name="rev_qua_nonreg" value="<?=$regkey['rev_qua_nonreg']?>" >
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Non-Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="rev_eco_nonreg" value="<?=$regkey['rev_eco_nonreg']?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="rev_qua_reg" value="<?=$regkey['rev_qua_reg']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="rev_eco_reg" value="<?=$regkey['rev_eco_reg']?>">
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="revenueTransaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</form>

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>

<!-- <tr style="font-weight:bold; font-size: 16px;">
<td colspan="3" style="text-align: right">
<span style="font-size: 14px;" class=" ">C (7): </span> <?=$revenueCount?>, 
<span style="font-size: 14px;" class=" ">NC(11+12+13+14): </span> <?=$revenueNotionalCount?> 
</td>
<td  style="text-align: right">
Total (7+11+12+13+14)
</td>
<td >
<?=($revenueCount+$revenueNotionalCount)?>
</td>
<td colspan="3"></td>
</tr> 
 -->
</tbody>
</table>

<?php
} else { echo "No Records found";} ?> 
</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Details Of Training Programme Organised (on Textile Testing To The Technical Persons From Industry</h6>
<?php if ($trainingTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Organisation Name</th>
<th>Date</th>
<th>No Of Participants</th>
<th>Amount(Rs.) </th>
<th>GST Amount (Rs.)</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($trainingTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['organisation_name'] ?></td>
<td><?= $regkey['training_date'] ?></td>
<td><?= $regkey['participant_no'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td style="text-align: right;"><?= $regkey['gst_amount'] ?></td>
<td>
  <span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trainingTransactionModel<?=$i?>" style="padding: 5px!important;">
        <i data-feather="edit"></i></span>
</td>
</tr>

<!-- Training Modal -->
<div class="modal fade" id="trainingTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->


        <form class="form-horizontal" method="post">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="training_program_id" value="<?php echo $regkey['training_program_id'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Organisation Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="organisation_name" value="<?php echo $regkey['organisation_name'] ?>" readonly>
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-8">
              <input class="form-control" type="Date"  name="training_date"  max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>" value="<?php echo $regkey['training_date'] ?>">
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">No Of Participants</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="participant_no" value="<?php echo $regkey['participant_no'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Amount(Rs.) </label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="amount" value="<?php echo $regkey['amount'] ?>" id="amount">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">GST Amount (Rs.)</label>
            <div class="col-md-8">
           
              <input class="form-control" type="number" name="gst_amount" value="<?php echo $regkey['gst_amount'] ?>" id="gst_amount" readonly style="background-color: #f8f9fa;">
            </div>
          </div>


      
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="training_transaction_edit" class="btn btn-primary">Save changes</button>
    </div>
    </div>

      </form>
        

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>
<tr style="font-weight:bold; font-size: 16px;">
<td colspan="3" style="text-align: right">
Total
</td>
<td>
<?=($trainingCount[0]['participant_no'])?>
</td>
<td>
<?=$trainingCount[0]['amount']?>
</td>
<td></td>

<td></td>
</tr>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>
</div>


<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Details Of Consultancy On Setting Up Of New Laboratories And Implementation Of Quality Systems For Accreditation Of 
In-house Laboratories Of The Industry</h6>
<?php if ($activityTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Activity Name</th>
<th>Organization Name</th>
<th>Name of Units</th>
<th>Date of commencement</th>
<th>Expected date of completion</th>
<th>Training program</th>
<th>Amount Received (Rs.)</th>
<th>GST Amount (Rs.)</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($activityTransaction as $regkey): 
$getActivity=$db->getactivitybytraining($db, $db->con,$regkey['activity_id']);
?>
<tr>                 
<td><?=$i?></td>
<td>
<?php 
if (isset($getActivity) && is_array($getActivity) && isset($getActivity[0]['activity_name'])) {
echo $getActivity[0]['activity_name'];
} else {
echo "";
}
?>
</td>

<td><?= $regkey['organisation_name'] ?></td>
<td><?= $regkey['name_of_units'] ?></td>
<td><?= $regkey['date_of_commencement'] ?></td>
<td><?= $regkey['date_of_completion'] ?></td>
<td><?= $regkey['training_program'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td style="text-align: right;"><?= $regkey['gst_amount'] ?></td>
<td>
  <span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activityTransactionModel<?=$i?>" style="padding: 5px!important;">
        <i data-feather="edit"></i></span>
</td>

</tr>

<!-- Activity Modal -->


<div class="modal fade" id="activityTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
     <form class="form-horizontal" method="post">

    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

       
          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden" name="activity_transaction_id" value="<?= $regkey['activity_transaction_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Activity Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="activity_name" value="<?= $getActivity[0]['activity_name'] ?>" readonly>
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Organisation Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="organisation_name" value="<?= $regkey['organisation_name'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Name of units for which consultancy is organised</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="name_of_units" value="<?= $regkey['name_of_units'] ?>" >
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Date of commencement of consultancy</label>
            <div class="col-md-8">
              <input class="form-control" type="date" name="date_of_commencement" value="<?= $regkey['date_of_commencement'] ?>" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Expected date of completion of consultancy</label>
            <div class="col-md-8">
              <input class="form-control" type="date" name="date_of_completion" value="<?= $regkey['date_of_completion'] ?>" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Activity Carried out in this month </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="remark" value="<?= $regkey['remark'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Training Program </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="training_program" value="<?= $regkey['training_program'] ?>">
            </div>
          </div>

      <div class="form-group row py-1">
    <label class="control-label col-md-3">Amount(Rs.) </label>
    <div class="col-md-8">
        <input class="form-control" type="text" name="amount" id="amount<?= $i ?>" value="<?= $regkey['amount'] ?>">
    </div>
</div>

<div class="form-group row py-1">
    <label class="control-label col-md-3">GST Amount (Rs.)</label>
    <div class="col-md-8">
        <input class="form-control" type="text" name="gst_amount" id="gst_amount<?= $i ?>" value="<?= $regkey['gst_amount'] ?>" readonly style="background-color:#f8f9fa;">
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button type="submit" name="activity_transaction_edit" class="btn btn-primary">Save changes</button>
</div>
</form>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("amount<?= $i ?>").addEventListener("blur", function() {
            var amount = parseFloat(this.value);
            
            if (!isNaN(amount)) { 
                var gst = (0.18 * amount).toFixed(2);
                document.getElementById("gst_amount<?= $i ?>").value = gst;
            } else {
                document.getElementById("gst_amount<?= $i ?>").value = '';
            }
        });
    });
</script>

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="7" style="text-align: right">
Total
</td>
<td>
<?=($activityCount[0]['amount'])?>
</td>
<td>
<?=$activityCount[0]['gst_amount']?>
</td>
<td></td>
</tr>

</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Details Of User Meet/Foreign Meets/Seminars/Fair</h6>
<?php if ($meetTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>

<th>Meet Name</th>
<th>Description</th>
<th>Date</th>
<th>Place</th>
<th>Participants</th>
<th>Remark</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($meetTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>

<td><?= $regkey['meet_name'] ?></td>
<td><?= $regkey['description'] ?></td>
<td><?= $regkey['meet_date'] ?></td>
<td><?= $regkey['place'] ?></td>
<td><?= $regkey['participant'] ?></td>
<td><?= $regkey['remark'] ?></td>
<td>
  <span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#meetTransactionModel<?=$i?>" style="padding: 5px!important;">
        <i data-feather="edit"></i></span>
</td>

</tr>

<!-- Meet Modal -->
<div class="modal fade" id="meetTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

        <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="meet_transaction_id" value="<?= $regkey['meet_transaction_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Meet</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="meet_name" value="<?= $regkey['meet_name'] ?>" readonly style="background-color: #f8f9fa;">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Description</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="description" value="<?= $regkey['description'] ?>" >

            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-8">
              <input class="form-control" type="date"  name="meet_date" value="<?= $regkey['meet_date'] ?>" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Place</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="place" value="<?= $regkey['place'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Participants</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="participant" value="<?= $regkey['participant'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="meet_remark" value="<?= $regkey['remark'] ?>" >
            </div>
          </div>               


       
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="meet_transaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</form>

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="5" style="text-align: right">
Total
</td>
<td>
<?=($meetCount[0]['participant'])?>
</td>
<td></td>
<td></td>

</tr>

</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Technical Consultancy Given To SME'S</h6>
<?php if ($technicalConsultancyTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>SME Name</th>
<th>Type of Consultancy</th>
<th>Consultancy Charges (Rs.)</th>                  
<th>GST Amount (Rs.)</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($technicalConsultancyTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['name_of_sme'] ?></td>
<td><?= $regkey['consultancy_type'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td style="text-align: right;"><?= $regkey['gst_amount'] ?></td>
<td>
    <span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#technicalConsultancyTransactionModel<?=$i?>" style="padding: 5px!important;">
        <i data-feather="edit"></i></span>
</td>
</tr>

<!-- Consultancy Modal -->
<div class="modal fade" id="technicalConsultancyTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

      <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

      
          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="technical_consultancy_id" value="<?= $regkey['technical_consultancy_id'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Name of SME</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="name_of_sme" value="<?= $regkey['name_of_sme'] ?>" readonly>
            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Type of consultancy</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="consultancy_type" value="<?= $regkey['consultancy_type'] ?>">
            </div>
          </div>
 <div class="form-group row py-1">
    <label class="control-label col-md-3">Consultancy Charges (Rs.)</label>
    <div class="col-md-8">
        <input class="form-control" type="text" name="amount" value="<?= $regkey['amount'] ?>" id="amount12">
    </div>
</div>

<div class="form-group row py-1">
    <label class="control-label col-md-3">GST (18%)</label>
    <div class="col-md-8">
        <input class="form-control" type="text" name="gst_amount" value="<?= $regkey['gst_amount'] ?>" id="gst_amount12" readonly style="background-color: #f8f9fa;">
    </div>
</div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="technicalConsultancyTransaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

    </form>
        

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="3" style="text-align: right">
Total
</td>
<td>
<?=($technicalConsultingCount[0]['amount'])?>
</td>
<td>
<?=$technicalConsultingCount[0]['gst_amount']?>
</td>
<td></td>

</tr>




</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>



<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Remnant Samples, Obsolete Equipment, Accessories And  Old Records Disposed </h6>
<?php if ($disposeTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Dispose Item Name</th>                  
<th>Date of dispose</th>
<th>After Disposal Date</th>                  
<th>Amount Received (Rs.)</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($disposeTransaction as $regkey): 
   $sql = "SELECT * FROM `dispose_item` WHERE is_active='Y' ";

      $getdispose=$db->getAssoc($db->con, $sql, array());

?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['dispose_item_name'] ?></td>
<td><?= $regkey['date_of_dispose'] ?></td>
<td><?= $regkey['date_of_after_dispose'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disposeTransaction<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>

<!-- Dispose Modal -->
<div class="modal fade" id="disposeTransaction<?=$i?>" role="dialog">
  <div class="modal-dialog">

     <form class="form-horizontal" method="post">


    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">

       
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="dispose_item_transaction_id" value="<?= $regkey['dispose_item_transaction_id'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Dispose Item Name</label>
            <div class="col-md-8">
       
             <select class="form-control" name="dispose_item_id" required>
            <?php if ($getdispose): 
                foreach ($getdispose as $key): ?>
                    <option value="<?php echo $key['dispose_item_id']; ?>" <?php if ($regkey['dispose_item_id'] == $key['dispose_item_id']) { echo "selected"; } ?>>
                        <?php echo $key['dispose_item_name']; ?>
                    </option>
                <?php endforeach; 
            endif; ?>
        </select>
            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Date of dispose </label>
            <div class="col-md-8">
              <input class="form-control" type="date"  name="date_of_dispose" value="<?= $regkey['date_of_dispose'] ?>" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">After Disposal Date </label>
            <div class="col-md-8">
              <input class="form-control" type="date" name="date_of_after_dispose" value="<?= $regkey['date_of_after_dispose'] ?>" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Amount Received (Rs.)</label>
            <div class="col-md-8">

              <input class="form-control" type="text" name="amount" value="<?= $regkey['amount'] ?>" >
            </div>
          </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="disposeTransaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

     </form>
        

  </div>
</div>

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="4" style="text-align: right">
Total
</td>
<td>
<?=($disposeCount[0]['amount'])?>
</td>
<td></td>

</tr>


</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>
</div>


<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Expenditure For The Month </h6>
<?php if ($expenditureTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Particular</th>                  
<th>Amount (Rs.)</th>
<th>Remark</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($expenditureTransaction as $regkey): 

  $sql = "SELECT * FROM `expenditure_label` WHERE is_active='Y' ";

      $getdispose=$db->getAssoc($db->con, $sql, array());
?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['expenditure_label_name'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td><?= $regkey['remark'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#expenditureModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>

<!-- Expenditure Modal -->
<div class="modal fade" id="expenditureModel<?=$i?>" role="dialog">
  <div class="modal-dialog">
   <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">

     
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="expenditure_transaction_id" value="<?= $regkey['expenditure_transaction_id'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Particular Name</label>
            <div class="col-md-8">
            
                 <select class="form-control" name="expenditure_label_id" required>
            <?php if ($getdispose): 
                foreach ($getdispose as $key): ?>
                    <option value="<?php echo $key['expenditure_label_id']; ?>" <?php if ($regkey['expenditure_label_id'] == $key['expenditure_label_id']) { echo "selected"; } ?>>
                        <?php echo $key['expenditure_label_name']; ?>
                    </option>
                <?php endforeach; 
            endif; ?>
        </select>
            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Amount (Rs.)</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="amount" value="<?= $regkey['amount'] ?>" >
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="remark" value="<?= $regkey['remark'] ?>" >
            </div>
          </div>



      
      </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="expenditureTransaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>  </form>
        

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>
<tr>
<td colspan="2" style="text-align: right">Total</td>
<td style="text-align: right; font-weight: bold"><?= $expenditureCount ?></td>
<td colspan="2"></td>
</tr>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Stock Position Of Items</h6>
<?php if ($stockTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Stock Item</th>                  
<th>Adequate</th>
<th>Action</th>
<th></th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($stockTransaction as $regkey): 
 $sql = "SELECT * FROM `stock_position_label` WHERE is_active='Y' ";

      $getdispose=$db->getAssoc($db->con, $sql, array());
?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['stock_position_label_name'] ?></td>
<td><?= $regkey['stock_position_adequate'] ?></td>
<td><?= $regkey['action'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>


<!-- Stock Position Modal -->
<div class="modal fade" id="stockTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

     <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">

       
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="stock_position_transaction_id" value="<?= $regkey['stock_position_transaction_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Stock Item </label>
            <div class="col-md-8">
            
                   <select class="form-control" name="stock_position_label_id" required>
            <?php if ($getdispose): 
                foreach ($getdispose as $key): ?>
                    <option value="<?php echo $key['stock_position_label_id']; ?>" <?php if ($regkey['stock_position_label_id'] == $key['stock_position_label_id']) { echo "selected"; } ?>>
                        <?php echo $key['stock_position_label_name']; ?>
                    </option>
                <?php endforeach; 
            endif; ?>
        </select>

            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Adequate/ NonAdequate</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="stock_position_adequate" value="<?= $regkey['stock_position_adequate'] ?>">
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Action </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="action" value="<?= $regkey['action'] ?>">
            </div>
          </div>



       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="stockTransaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

     </form>
        

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>


<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Utilisation Of Equipment Available In The Laboratory</h6>
<?php if ($equipmentTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Equipment </th>                  
<th>Parameter</th>
<th>No. of Tests performed</th>
<th>Remark</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($equipmentTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['equipment_name'] ?></td>
<td><?= $regkey['parameter_name'] ?></td>
<td><?= $regkey['test_performed'] ?></td>
<td><?= $regkey['remark'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#equipmentTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>

<!-- Equipment Modal -->
<div class="modal fade" id="equipmentTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="post">

          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="equipment_transaction_id" value="<?= $regkey['equipment_transaction_id'] ?>"  readonly >
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Equipment </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="equipment_name" value="<?= $regkey['equipment_name'] ?>" readonly style="background-color:#f8f9fa">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Parameter </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="parameter_name" value="<?= $regkey['parameter_name'] ?>" >
            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">No. of Tests performed  </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="test_performed" value="<?= $regkey['test_performed'] ?>">
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="remark" value="<?= $regkey['remark'] ?>">
            </div>
          </div>

          <button class="btn btn-primary" name="equipmentTransaction_edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
          <br>
          <br>
          <hr>

          OR (Delete all records and upload fresh data)
          <br>
          <br>



        </form>

        <?php if (isset($_POST['btnAddEquipment'])) {


          if (isset($_SESSION['uploading']) && $_SESSION['uploading']) {
            echo "The file is already being processed.";
            exit();
          }
          $_SESSION['uploading'] = true;

          $publish_date = date("Y-m-d H:i:s");
          $month = $_SESSION['month'];
          $year = $_SESSION['year'];
          $enter_date = $_SESSION['enter_date'];
          $user_id = $_SESSION['user_id'];

          if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] == 0) {
            $filePath = $_FILES['upload_file']['tmp_name'];

            if (($handle = fopen($filePath, 'r')) !== FALSE) {
              fgetcsv($handle);

              $query1 = "DELETE FROM equipment_transaction WHERE month = ? AND year = ? AND user_id = ?";

              $bind1 = [$month, $year, $user_id];

              $db->setData($db->con, $query1, $bind1);

              $queryInsert = "INSERT INTO equipment_transaction (equipment_name, parameter_name, test_performed, remark, month, year, publish_date, user_id, enter_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $queryCheck = "SELECT COUNT(*) FROM equipment_transaction WHERE equipment_name = ? AND parameter_name = ? AND month = ? AND year = ?";
              $sr_no = 1;

              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) >= 4) {
                  $equipment_name = trim($data[1]);
                  $parameter_name = trim($data[2]);
                  $test_performed = trim($data[3]);
                  $remark = isset($data[4]) ? trim($data[4]) : '';

                  if (!is_numeric($test_performed)) {
                    echo "Skipping row $sr_no: 'Test Performed' must be a number.<br>";
                    $sr_no++;
                    continue;
                  }

                  $bindCheck = [$equipment_name, $parameter_name, $month, $year];
                  $existingRecordCount = $db->getData($db->con, $queryCheck, $bindCheck);

                  if ($existingRecordCount > 0) {
                    echo "Row $sr_no: Oh no, the equipment already exists for this month and year.<br>";
                  } else {
                    $bindInsert = [
                      $equipment_name,
                      $parameter_name,
                      $test_performed,
                      $remark,
                      $month,
                      $year,
                      $publish_date,
                      $user_id,
                      $enter_date
                    ];

                    if (!$db->setData($db->con, $queryInsert, $bindInsert)) {
                      echo "Error inserting row $sr_no.<br>";
                    } else {
                      echo "Row $sr_no: Data inserted successfully.<br>";
                    }
                  }

                  $sr_no++;
                }
              }

              fclose($handle);

            } else {
              echo "Error opening the file.";
            }
          } else {
            echo "Error uploading the file.";
          }

          unset($_SESSION['uploading']);

          header("Location: ro_report.php");
          exit();
        }
        ?>

        <form  class="form-horizontal" enctype="multipart/form-data" method="POST" >

         <div class="form-group row py-1">
          <label class="control-label col-md-3">Equipment File<span style="color:red">*</span></label>
          <div class="col-md-8">
            <input class="form-control" type="file" accept=".csv"  name="upload_file" required >
          </div>
        </div>


        <div class="form-group row py-1">
          <div class="col-md-8">
            <button class="btn btn-primary" name="btnAddEquipment" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Equipment</button>
          </div>
        </div>              


      </form>

    </div>
    <div class="modal-footer">

    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="3" style="text-align: right">
Total
</td>
<td>
<?=$equipmentCount?>
</td>
<td></td>
<td></td>

</tr>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>


<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Details Of Equipment Not Working</h6>
<?php if ($nonWorkingEquipmentTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Equipment </th>                  
<th>Problem</th>
<th>Action</th>
<th></th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($nonWorkingEquipmentTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['equipment_name'] ?></td>
<td><?= $regkey['problem'] ?></td>
<td><?= $regkey['action'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nonWorkingEquipmentTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>

<!-- Equipment Not Working Modal -->
<div class="modal fade" id="nonWorkingEquipmentTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

        <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

    
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden" name="equipment_nonworking_id" value="<?= $regkey['equipment_nonworking_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Equipment</label>
            <div class="col-md-8">
          
             <select class="form-control" name="equipment_id" required>

              <?php
              $getEquipmenTlist=$db->equipment_transaction_List($db, $db->con, $user_id,$month,$year);
?>
             
                <?php if($getEquipmenTlist) { foreach ($getEquipmenTlist as $key): ?>
                  <option value="<?=$key['equipment_transaction_id']?>" <?php if ($regkey['equipment_id'] == $key['equipment_transaction_id']) { echo "selected"; } ?>> <?=$key['equipment_name']?> </option>
                <?php endforeach; } ?>
            </select> 
          </div>
        </div>

        <div class="form-group row py-1">
          <label class="control-label col-md-3">Problem</label>
          <div class="col-md-8">
            <input class="form-control" type="text" name="problem" value="<?= $regkey['problem'] ?>" >
          </div>
        </div>


        <div class="form-group row py-1">
          <label class="control-label col-md-3">Action</label>
          <div class="col-md-8">
            <input class="form-control" type="text"  name="action" value="<?= $regkey['action'] ?>">
          </div>
        </div>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="nonWorkingEquipmentTransaction_edit" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</form>

</div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>



<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Enrollment Of New Customers</h6>
<?php if ($customerTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Customer Name</th>
<th>No. of Sample Tested</th>
<th>Revenue (Rs.)</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($customerTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['customer_name'] ?></td>
<td><?= $regkey['test_sample'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>

<!-- New Customer Modal -->
<div class="modal fade" id="customerTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">
    <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title"  >Update Record</h4>
      </div>
      <div class="modal-body">
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="customer_id" value="<?= $regkey['customer_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Customer Name </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="customer_name" value="<?= $regkey['customer_name'] ?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">No. of Sample Tested </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="test_sample" value="<?= $regkey['test_sample'] ?>" >
            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Revenue (Rs.) </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="amount" value="<?= $regkey['amount'] ?>" >
            </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="customerTransaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

       </form>

  </div>
</div> <!-- end of model div -->

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="2" style="text-align: right">
Total
</td>
<td>
<?=$customerCount[0]['test_sample']?>
</td>
<td>
<?=$customerCount[0]['amount']?>
</td>
<td></td>

</tr>


</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>


<div class="table-responsive" style="margin-bottom: 20px;">
<h6 class="mb-2 line-head" id="typography" >Marketing Activity Performed </h6>
<?php if ($marketingActivityTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Company Name</th>
<th>Type of Company</th>
<th>Contact Person</th>
<th>Contact Number</th>
<th>Email</th>
<th>Date</th>                  
<th>No. of Sample Received</th>
<th>Response</th>
<th>Specific Requirnment</th>
<th>Remark </th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($marketingActivityTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['company_name'] ?></td>
<td><?= $regkey['company_type'] ?></td>
<td><?= $regkey['contact_person'] ?></td>
<td><?= $regkey['contact_number'] ?></td>
<td><?= $regkey['email'] ?></td>
<td><?= $regkey['visited_date'] ?></td>
<td><?= $regkey['sample_received'] ?></td>
<td><?=$regkey['customer_response']?></td>
<td><?=$regkey['specific_requirement']?></td>
<td><?= $regkey['remark'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#marketingActivityTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i></span>
</td>
</tr>
<!-- Marketing Activity Modal -->
<div class="modal fade" id="marketingActivityTransactionModel<?=$i?>" role="dialog">
  <div class="modal-dialog">

    <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">

          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="marketing_activity_id" value="<?= $regkey['marketing_activity_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Company Name </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="company_name" value="<?= $regkey['company_name'] ?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Type of Company</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="company_type" value="<?= $regkey['company_type'] ?>">
            </div>
          </div>


          <div class="form-group row py-1">
            <label class="control-label col-md-3">Contact Person </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="contact_person" value="<?= $regkey['contact_person'] ?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Contact Number  </label>
            <div class="col-md-8">
              <input class="form-control" type="tel" pattern="^[6-9][0-9]{9}$" minlength="10" maxlength="10" name="contact_number" value="<?= $regkey['contact_number'] ?>" >
          </div>
            </div>
            <div class="form-group row py-1">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-8">
                <input class="form-control" type="email"  name="email" value="<?= $regkey['email'] ?>">
              </div>
            </div><div class="form-group row py-1">
              <label class="control-label col-md-3">Date </label>
              <div class="col-md-8">
                <input class="form-control" type="date"  name="visited_date" value="<?= $regkey['visited_date'] ?>" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
              </div>
            </div><div class="form-group row py-1">
              <label class="control-label col-md-3">No. of Sample Received  </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="sample_received" value="<?= $regkey['sample_received'] ?>" >
              </div>
            </div><div class="form-group row py-1">
              <label class="control-label col-md-3">Response</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="customer_response" value="<?= $regkey['customer_response'] ?>" >
              </div>
            </div><div class="form-group row py-1">
              <label class="control-label col-md-3">Specific Requirnment </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="specific_requirement" value="<?= $regkey['specific_requirement'] ?>">
              </div>
            </div><div class="form-group row py-1">
              <label class="control-label col-md-3">Remark</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="remark" value="<?= $regkey['remark'] ?>" >
              </div>
            </div>
         
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="marketingActivityTransaction_edit" class="btn btn-primary">Save changes</button>
        </div>
      </div>

       </form>
      
    </div>
  </div> <!-- end of model div -->


<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="7" style="text-align: right">
Total
</td>
<td>
<?=$marketingCount[0]['sample_receive']?>
</td>
<td colspan="4"></td>

</tr>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>
</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Details Of Bulk Customer</h6>
<?php if ($customerBulkTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Name of Bulk Customer</th>
<th>Sample Reported</th>
<th>Testing charges</th>
<th>Remark </th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($customerBulkTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['bulk_customer_name'] ?></td>
<td><?= $regkey['sample_reported'] ?></td>
<td style="text-align: right;"><?= $regkey['testing_charges'] ?></td>
<td><?= $regkey['remark'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerBulkTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i>
</span>
</td>
</tr>
 <!-- Bulk Customer Modal -->
  <div class="modal fade" id="customerBulkTransactionModel<?=$i?>" role="dialog">
    <div class="modal-dialog">

    <form class="form-horizontal" method="post">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" >Update Record</h4>
        </div>
        <div class="modal-body">

            <div class="form-group row">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">
                <input class="form-control" type="hidden"  name="bulk_customer_id" value="<?= $regkey['bulk_customer_id'] ?>"  readonly>
              </div>
            </div>
            <div class="form-group row py-1">
              <label class="control-label col-md-3">Name of Bulk Customer </label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="bulk_customer_name" value="<?= $regkey['bulk_customer_name'] ?>" >
              </div>
            </div>

            <div class="form-group row py-1">
              <label class="control-label col-md-3">Sample Reported</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="sample_reported" value="<?= $regkey['sample_reported'] ?>" >
              </div>
            </div>

            <div class="form-group row py-1">
              <label class="control-label col-md-3">Testing charges </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="testing_charges" value="<?= $regkey['testing_charges'] ?>" >
              </div>
            </div>

            <div class="form-group row py-1">
              <label class="control-label col-md-3">Remark </label>
              <div class="col-md-8">
            <input class="form-control" type="text" name="remark" value="<?= $regkey['remark'] ?>">
              </div>
            </div>

        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="customerBulkTransaction_edit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
      
    </div>
  </div> <!-- end of model div -->


<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="2" style="text-align: right">
Total
</td>
<td>
<?=$bulkCount[0]['sample_reported']?>
</td>  
<td style="text-align: right">
<?=$bulkCount[0]['testing_charges']?>
</td> 
<td colspan="2"></td>              

</tr>

</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>
</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Details Of Tatkal Customer</h6>
<?php if ($customerTatkalTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Name of Tatkal Customer</th>
<th>Sample Reported</th>
<th>Testing charges</th>
<th>Remark </th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($customerTatkalTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['tatkal_customer_name'] ?></td>
<td><?= $regkey['tatkal_sample_reported'] ?></td>
<td style="text-align: right;"><?= $regkey['tatkal_testing_charges'] ?></td>
<td><?= $regkey['tatkal_remark'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerTatkalTransactionModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i>
</span>
</td>
</tr>

 <!-- Tatkal Customer Modal -->
  <div class="modal fade" id="customerTatkalTransactionModel<?=$i?>" role="dialog">
    <div class="modal-dialog">

             <form class="form-horizontal" method="post">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" >Update Record</h4>
        </div>
        <div class="modal-body">

            <div class="form-group row py-1">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">
                <input class="form-control" type="hidden"  name="tatkal_customer_id" value="<?= $regkey['tatkal_customer_id'] ?>"  readonly>
              </div>
            </div>
            <div class="form-group row py-1">
              <label class="control-label col-md-3">Name of Tatkal Customer </label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="tatkal_customer_name" value="<?= $regkey['tatkal_customer_name'] ?>" >
              </div>
            </div>

            <div class="form-group row py-1">
              <label class="control-label col-md-3">Sample Reported</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="tatkal_sample_reported" value="<?= $regkey['tatkal_sample_reported'] ?>" >
              </div>
            </div>


            <div class="form-group row py-1">
              <label class="control-label col-md-3">Testing charges </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="tatkal_testing_charges" value="<?= $regkey['tatkal_testing_charges'] ?>" >
              </div>
            </div>

            <div class="form-group row py-1">
              <label class="control-label col-md-3">Remark </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="tatkal_remark" value="<?= $regkey['tatkal_remark'] ?>">
              </div>
            </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="customerTatkalTransaction_edit" class="btn btn-primary">Save changes</button>
        </div>
      </div>

    </form>
      
    </div>
  </div> <!-- end of model div -->

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="2" style="text-align: right">
Total
</td>
<td>
<?=$tatkalCount[0]['tatkal_sample_reported']?>
</td>  
<td style="text-align: right;">
<?=$tatkalCount[0]['tatkal_testing_charges']?>
</td> 
<td colspan="2"></td>              
</tr>

</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>
</div>


<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Manpower Availability </h6>
<?php if ($manpowerAvailablity) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Designation Name</th>
<th>From Laboratory</th>
<th>From Other</th>
<th>Total</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($manpowerAvailablity as $regkey): ?>
<tr>                 
<td><?= $i ?></td>
<td><?= $regkey['designation_name'] ?></td>
<td><?= $regkey['from_lab'] ?></td>
<td><?= $regkey['from_other'] ?></td>
<td><?= $regkey['total'] ?></td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#manpowerAvailablityModel<?=$i?>" style="padding: 5px!important;">
    <i data-feather="edit"></i>
</span>
</td>
</tr>

<!-- Manpower Avaialbility -->

  <div class="modal fade" id="manpowerAvailablityModel<?=$i?>" role="dialog">
    <div class="modal-dialog">

    <form class="form-horizontal" method="post">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" >Update Record</h4>
        </div>
       
         <div class="modal-body">

          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden" name="manpower_available_id" value="<?= $regkey['manpower_available_id'] ?>"  readonly>
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Designation Name </label>
            <div class="col-md-8">
              <select class="form-control"  name="designation_id" required>
                <option value="">Select Designation</option>
                <?php
                $getDesignationList=$db->designationList($db, $db->con);

                if($getDesignationList){ foreach ($getDesignationList as $key): ?>
                  <option value= "<?=$key['designation_id']?>" <?php if ($regkey['designation_id'] == $key['designation_id']) { echo "selected"; } ?>> <?=$key['designation_name']?> </option>
                <?php endforeach;} ?>
              </select>        
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">From Laboratory </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="from_lab" value="<?= $regkey['from_lab'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">From Other </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="from_other" value="<?= $regkey['from_other'] ?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Total</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="total" value="<?= $regkey['total'] ?>">
            </div>
          </div>

        </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="manpowerAvailablity_edit" class="btn btn-primary">Save changes</button>
      </div>


    </div>

      </form>

  </div>
</div>
<?php $i++; endforeach; ?>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Manpower Utilization </h6>
<?php

if ($manpowerUtilisation) { ?>

<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Titles</th>
<th>Details</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>

<td colspan="3" style="font-weight: bold;" >Actual Mandays</td>
<td>
<span type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#manpowerUtilisationModel" style="padding: 5px!important;">
    <i data-feather="edit"></i>
</span>
</td>

</tr>
<tr>
<td>1</td>
<td>Number of Technical QAO/JQAO/Fellow</td>
<td>
<?=$manpowerUtilisation[0]['technical_manpower']?>                       
</td>
<td></td>

</tr>

<tr>
<td>2</td>
<td>Number of working day</td>
<td>
<?=$manpowerUtilisation[0]['working_day']?>                          
</td>
<td></td>

</tr>

<tr>
<td>3</td>
<td>Extra man days (on tour from other RO/Other section of TC)</td>
<td>
<?=$manpowerUtilisation[0]['extra_man_day']?>                         
</td>
<td></td>

</tr>

<tr>
<td>4</td>
<td>Additional working mandays
(Due to Saturdays/Sundays/holidays/extra hours)
</td>
<td>
<?=$manpowerUtilisation[0]['addtional_working']?>                          
</td>
<td></td>

</tr>

<tr>
<td></td>
<td>Total (A)</td>
<td>
<?=$manpowerUtilisation[0]['total_a']?>                         
</td>
<td></td>

</tr>

<tr>

<td colspan="4" style="font-weight: bold;" >Loss of ManDays</td>

</tr>

<tr>
<td>5</td>
<td>Special Work</td>
<td>
<?=$manpowerUtilisation[0]['special_work']?>                         
</td>
<td></td>

</tr>

<tr>
<td>6</td>
<td>Deputation of QAOs/JQAOs to other R.O./ Training /seminar/ workshop etc.</td>
<td>
<?=$manpowerUtilisation[0]['deputation']?>                          
</td>
<td></td>

</tr>

<tr>
<td>7</td>
<td>No. of days of leave</td>
<td>
<?=$manpowerUtilisation[0]['leave_day']?>                       
</td>
<td></td>
</tr>

<tr>
<td></td>
<td>Total (B)</td>
<td>
<?=$manpowerUtilisation[0]['total_b']?>                         
</td>
<td></td>

</tr>
<tr>

<td colspan="2" style="font-weight: bold;">Total  number of man days available for the routine testing (C)=(A-B) </td>
<td>
<?=$manpowerUtilisation[0]['total_c']?>                       
</td>
<td></td>

</tr>

<tr>
<td>8</td>
<td>Total Number of samples reported (S)</td>
<td>
<?=$manpowerUtilisation[0]['total_s']?>                          
</td>
<td></td>
</tr>

<tr>
<td>9</td>
<td>Average output / manday (S)/(C)</td>
<td>
<?=$manpowerUtilisation[0]['average_op']?>                          
</td>
<td></td>

</tr>

<tr>
<td>10</td>
<td>Total No. of Parameter (P)</td>
<td>
<?=$manpowerUtilisation[0]['total_p']?>                         
</td>
<td></td>

</tr>

<tr>
<td>11</td>
<td>Average Parameter per mandays (P)/(C)</td>
<td>
<?=$manpowerUtilisation[0]['average_pm']?>                         
</td>
<td></td>

</tr>

<!-- Manpower Utilisation -->


<div class="modal fade" id="manpowerUtilisationModel" role="dialog">
  <div class="modal-dialog">

      <form class="form-horizontal" method="post">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title" >Update Record</h4>
      </div>

        <div class="modal-body">
          <div class="form-group row py-1">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden" name="manpower_transaction_id" value="<?=$manpowerUtilisation[0]['manpower_transaction_id']?>" readonly>
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Number of Technical QAO/JQAO/Fellow</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="technical_manpower" value="<?=$manpowerUtilisation[0]['technical_manpower']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Number of working day</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="working_day" value="<?=$manpowerUtilisation[0]['working_day']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Extra man days (on tour from other RO/Other section of TC)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="extra_man_day" value="<?=$manpowerUtilisation[0]['extra_man_day']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Additional working mandays
            (Due to Saturdays/Sundays/holidays/extra hours)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="addtional_working" value="<?=$manpowerUtilisation[0]['addtional_working']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Total (A)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_a" value="<?=$manpowerUtilisation[0]['total_a']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Special Work</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="special_work" value="<?=$manpowerUtilisation[0]['special_work']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Deputation of QAOs/JQAOs to other R.O./ Training /seminar/ workshop etc.</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="deputation" value="<?=$manpowerUtilisation[0]['deputation']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">No. of days of leave</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="leave_day" value="<?=$manpowerUtilisation[0]['leave_day']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Total (B)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_b" value="<?=$manpowerUtilisation[0]['total_b']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Total  number of man days available for the routine testing (C)=(A-B) </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_c" value="<?=$manpowerUtilisation[0]['total_c']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Total Number of samples reported (S)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_s" value="<?=$manpowerUtilisation[0]['total_s']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Average output / manday (S)/(C)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="average_op" value="<?=$manpowerUtilisation[0]['average_op']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Total No. of Parameter (P)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_p" value="<?=$manpowerUtilisation[0]['total_p']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Average Parameter per mandays (P)/(C)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="average_pm" value="<?=$manpowerUtilisation[0]['average_pm']?>">
            </div>
          </div>
        </div>

      <div class="modal-footer">
         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="manpowerutilisation_edit" class="btn btn-primary">Save changes</button>
      </div>


    </div>
     </form>

  </div>
</div>


</tbody>
</table>

<?php } else { echo "No Record Added...!!";} ?>


</div>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

   <script type="text/javascript">
document.getElementById("amount").addEventListener("blur", function() {
var amount = parseFloat(this.value);

if (!isNaN(amount)) { 
var gst = (18 / 100 * amount).toFixed(2);
document.getElementById("gst_amount").value = gst;
} else {
document.getElementById("gst_amount").value = '';
}
});

</script>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("amount12").addEventListener("blur", function() {
        var amount12 = parseFloat(this.value);
        
        if (!isNaN(amount12)) { 
            var gst12 = (0.18 * amount12).toFixed(2);
            document.getElementById("gst_amount12").value = gst12;
        } else {
            document.getElementById("gst_amount12").value = '';
        }
    });
});

</script>
<?php require('footer.php'); ?>
