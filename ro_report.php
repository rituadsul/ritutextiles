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

   // print_r($_POST);die();
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

$_SESSION['success']="Sample Data Updated";

header("location:ro_report.php");exit;
}
else
{

$_SESSION['error']="Sample Data Not Updated";
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
$total_qua_nonreg = 0; 
$total_eco_nonreg = 0;
$total_qua_reg = 0;
$total_eco_reg = 0;
$total_total = 0;

$total_qua_nonreg_4 = 0;
$total_eco_nonreg_4 = 0;
$total_qua_reg_4 = 0;
$total_eco_reg_4 = 0;
$total_total_4 = 0;

foreach ($sampleTransaction as $regkey): 
    if ($i == 1) {

      $prevmonth = $_SESSION['month'] - 1;
$prevdata = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $prevmonth, $year);

$prevquo = isset($prevdata[0]) 
    ? (($prevdata[0]['qua_nonreg'] + ($prevdata[1]['qua_nonreg'] ?? 0)) - ($prevdata[3]['qua_nonreg'] ?? 0)) 
    : 0;

$preveco_nonreg = isset($prevdata[0]) 
    ? (($prevdata[0]['eco_nonreg'] + ($prevdata[1]['eco_nonreg'] ?? 0)) - ($prevdata[3]['eco_nonreg'] ?? 0)) 
    : 0;

$prevqua_reg = isset($prevdata[0]) 
    ? (($prevdata[0]['qua_reg'] + ($prevdata[1]['qua_reg'] ?? 0)) - ($prevdata[3]['qua_reg'] ?? 0)) 
    : 0;

$preveco_reg = isset($prevdata[0]) 
    ? (($prevdata[0]['eco_reg'] + ($prevdata[1]['eco_reg'] ?? 0)) - ($prevdata[3]['eco_reg'] ?? 0)) 
    : 0;

$total = isset($prevdata[0]) 
    ? (($prevdata[0]['total'] + ($prevdata[1]['total'] ?? 0)) - ($prevdata[3]['total'] ?? 0)) 
    : 0;
       
    } elseif ($i == 2) {
        $total_qua_nonreg += $regkey['qua_nonreg'];
        $total_eco_nonreg += $regkey['eco_nonreg'];
        $total_qua_reg += $regkey['qua_reg'];
        $total_eco_reg += $regkey['eco_reg'];
        $total_total +=  $regkey['qua_nonreg']+$regkey['eco_nonreg']+$regkey['qua_reg']+$regkey['eco_reg'];
    } elseif ($i == 4) {
        $total_qua_nonreg_4 += $regkey['qua_nonreg'];
        $total_eco_nonreg_4 += $regkey['eco_nonreg'];
        $total_qua_reg_4 += $regkey['qua_reg'];
        $total_eco_reg_4 += $regkey['eco_reg'];
        $total_total_4 += $regkey['qua_nonreg']+$regkey['eco_nonreg']+$regkey['qua_reg']+$regkey['eco_reg'];
    } ?>
<tr>
<td><?=$i?></td>
<td>
<?php if ($regkey['is_commercial'] == 'N') { ?>
<span style="font-size: 14px;" class="badge">NC</span> 
<?php } ?>
<?=$regkey['sample_name']?>
</td>
<td>
  <?php if ($i == 1) { ?>
    <?=$prevquo.'.00'?> 
<?php } elseif ($i == 3) { ?>
    <?=$total_qua_nonreg.'.00'?> 
<?php } elseif ($i == 5) { ?>
    <?=$total_qua_nonreg - $total_qua_nonreg_4.'.00'?> 
<?php } else { ?>
    <?=$regkey['qua_nonreg']?>
<?php } ?>
</td>
<td>
 <?php if ($i == 1) { ?>
    <?=$preveco_nonreg.'.00'?> 
<?php } elseif ($i == 3) { ?>
    <?=$total_eco_nonreg.'.00'?> 
<?php } elseif ($i == 5) { ?>
    <?=$total_eco_nonreg - $total_eco_nonreg_4.'.00'?>
<?php } else { ?>
    <?=$regkey['eco_nonreg']?>
<?php } ?>
</td>
<td>
 <?php if ($i == 1) { ?>
    <?=$prevqua_reg.'.00'?> 
<?php } elseif ($i == 3) { ?>
    <?=$total_qua_reg.'.00'?>
<?php } elseif ($i == 5) { ?>
    <?=$total_qua_reg - $total_qua_reg_4.'.00'?> 
<?php } else { ?>
    <?=$regkey['qua_reg']?>
<?php } ?>
</td>
<td>
 <?php if ($i == 1) { ?>
    <?=$preveco_reg.'.00'?> 
<?php } elseif ($i == 3) { ?>
    <?=$total_eco_reg.'.00'?> 
<?php } elseif ($i == 5) { ?>
    <?=$total_eco_reg - $total_eco_reg_4.'.00'?> 
<?php } else { ?>
    <?=$regkey['eco_reg']?>
<?php } ?>
</td>
 <td>
 <?php if ($i == 1) { ?>
    <?=$total.'.00'?> 
<?php } elseif ($i == 3) { ?>
    <?=$total_total.'.00'?>
<?php } elseif ($i == 5) { ?>
    <?=$total_total - $total_total_4.'.00'?> 
<?php } else { ?>
    <?= $regkey['qua_nonreg']+ $regkey['eco_nonreg']+ $regkey['qua_reg']+ $regkey['eco_reg'].'.00'  ?>
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
              <input class="form-control" type="text" name="sample_name" value="<?=$regkey['sample_name']?>" readonly>
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Non-Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number"  name="qua_nonreg" value="<?=$regkey['qua_nonreg']?>">
            </div>
          </div>
          <div class="form-group row py-1">
            <label class="control-label col-md-3">Non-Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="eco_nonreg" value="<?=$regkey['eco_nonreg']?>" >
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="qua_reg" value="<?=$regkey['qua_reg']?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="eco_reg" value="<?=$regkey['eco_reg']?>">
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
<td><?=$i?></td>
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
<td></td>

</tr>

<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
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
              <input class="form-control" type="text" name="amount" id="amount" value="<?= $regkey['amount'] ?>">
            </div>
          </div>

          <div class="form-group row py-1">
            <label class="control-label col-md-3">GST Amount (Rs.)</label>
            <div class="col-md-8">
          
              <input class="form-control" type="text" name="gst_amount" id="gst_amount" value="<?= $regkey['gst_amount'] ?>">
            </div>
          </div>


       
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="activity_transaction_edit" class="btn btn-primary">Save changes</button>
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

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <h4 class="modal-title" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="meet_transaction_id" value="<?= $regkey['meet_transaction_id'] ?>"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Meet</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="meet_name" value="<?= $regkey['meet_name'] ?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Description</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="description" value="<?= $regkey['description'] ?>" >

            </div>
          </div>


          <div class="form-group row">
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

          <div class="form-group row">
            <label class="control-label col-md-3">Participants</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="participant" value="<?= $regkey['participant'] ?>" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="meet_remark" value="<?= $regkey['meet_remark'] ?>" >
            </div>
          </div>               


        </form>
        
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="meet_transaction_edit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

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

</tr>
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

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($disposeTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['dispose_item_name'] ?></td>
<td><?= $regkey['date_of_dispose'] ?></td>
<td><?= $regkey['date_of_after_dispose'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>

</tr>
<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="4" style="text-align: right">
Total
</td>
<td>
<?=($disposeCount[0]['amount'])?>
</td>

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
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($expenditureTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['expenditure_label_name'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>
<td><?= $regkey['remark'] ?></td>

</tr>
<?php $i++; endforeach; ?>
<tr>
<td colspan="2" style="text-align: right">Total</td>
<td style="text-align: right; font-weight: bold"><?= $expenditureCount ?></td>

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

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($stockTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['stock_position_label_name'] ?></td>
<td><?= $regkey['stock_position_adequate'] ?></td>
<td><?= $regkey['action'] ?></td>

</tr>
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

</tr>
<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="3" style="text-align: right">
Total
</td>
<td>
<?=$equipmentCount?>
</td>

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

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($nonWorkingEquipmentTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['equipment_name'] ?></td>
<td><?= $regkey['problem'] ?></td>
<td><?= $regkey['action'] ?></td>

</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>



<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Enrolment Of New Customers</h6>
<?php if ($customerTransaction) { ?>

<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Customer Name</th>
<th>No. of Sample Tested</th>
<th>Revenue (Rs.)</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($customerTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['customer_name'] ?></td>
<td><?= $regkey['test_sample'] ?></td>
<td style="text-align: right;"><?= $regkey['amount'] ?></td>

</tr>
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

</tr>


</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>


<div class="table-responsive">
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

</tr>
<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="7" style="text-align: right">
Total
</td>
<td>
<?=$marketingCount[0]['sample_receive']?>
</td>


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

</tr>
<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="2" style="text-align: right">
Total
</td>
<td>
<?=$bulkCount[0]['sample_reported']?>
</td>  
<td>
<?=$bulkCount[0]['testing_charges']?>
</td>               

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

</tr>
<?php $i++; endforeach; ?>

<tr style="font-weight:bold; font-size: 16px;">
<td colspan="2" style="text-align: right">
Total
</td>
<td>
<?=$tatkalCount[0]['tatkal_sample_reported']?>
</td>  
<td>
<?=$tatkalCount[0]['tatkal_testing_charges']?>
</td>               

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

</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
<?php } else { echo "No Record Added...!!";} ?>

</div>

<div class="table-responsive">
<h6 class="mb-2 line-head" id="typography" >Manpower Utilization </h6>
<?php

if ($manpowerAvailablity) { ?>

<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Titles</th>
<th>Details</th>

</tr>
</thead>
<tbody>
<tr>

<td colspan="3" style="font-weight: bold;" >Actual Mandays</td>


</tr>
<tr>
<td>1</td>
<td>Number of Technical QAO/JQAO/Fellow</td>
<td>
<?=$manpowerUtilisation[0]['technical_manpower']?>                       
</td>

</tr>

<tr>
<td>2</td>
<td>Number of working day</td>
<td>
<?=$manpowerUtilisation[0]['working_day']?>                          
</td>
</tr>

<tr>
<td>3</td>
<td>Extra man days (on tour from other RO/Other section of TC)</td>
<td>
<?=$manpowerUtilisation[0]['extra_man_day']?>                         
</td>
</tr>

<tr>
<td>4</td>
<td>Additional working mandays
(Due to Saturdays/Sundays/holidays/extra hours)
</td>
<td>
<?=$manpowerUtilisation[0]['addtional_working']?>                          
</td>
</tr>

<tr>
<td></td>
<td>Total (A)</td>
<td>
<?=$manpowerUtilisation[0]['total_a']?>                         
</td>
</tr>

<tr>

<td colspan="3" style="font-weight: bold;" >Loss of ManDays</td>

</tr>

<tr>
<td>5</td>
<td>Special Work</td>
<td>
<?=$manpowerUtilisation[0]['special_work']?>                         
</td>
</tr>

<tr>
<td>6</td>
<td>Deputation of QAOs/JQAOs to other R.O./ Training /seminar/ workshop etc.</td>
<td>
<?=$manpowerUtilisation[0]['deputation']?>                          
</td>
</tr>

<tr>
<td>7</td>
<td>No. of days of leave</td>
<td>
<?=$manpowerUtilisation[0]['leave_day']?>                       
</td>
</tr>

<tr>
<td></td>
<td>Total (B)</td>
<td>
<?=$manpowerUtilisation[0]['total_b']?>                         
</td>
</tr>
<tr>

<td colspan="2" style="font-weight: bold;">Total  number of man days available for the routine testing (C)=(A-B) </td>
<td>
<?=$manpowerUtilisation[0]['total_c']?>                       
</td>
</tr>

<tr>
<td>8</td>
<td>Total Number of samples reported (S)</td>
<td>
<?=$manpowerUtilisation[0]['total_s']?>                          
</td>
</tr>

<tr>
<td>9</td>
<td>Average output / manday (S)/(C)</td>
<td>
<?=$manpowerUtilisation[0]['average_op']?>                          
</td>
</tr>

<tr>
<td>10</td>
<td>Total No. of Parameter (P)</td>
<td>
<?=$manpowerUtilisation[0]['total_p']?>                         
</td>
</tr>

<tr>
<td>11</td>
<td>Average Parameter per mandays (P)/(C)</td>
<td>
<?=$manpowerUtilisation[0]['average_pm']?>                         
</td>
</tr>

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
<?php require('footer.php'); ?>
