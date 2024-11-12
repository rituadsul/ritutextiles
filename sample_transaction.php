<?php  require('header.php'); 

$getSampleList=$db->labelList($db, $db->con);

if (isset($_POST['btnSaveSample1'])) 
{
header("location:revenue_transaction.php");exit;

}

if (isset($_POST['btnSaveSample'])) 
{

// print_r($_POST);die();
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];
$publish_date=date("Y-m-d H:i:s");
$done="";

foreach ($getSampleList as $key) {

if ($key['sample_id'] != 5) {
$sqlstr = "INSERT INTO `sample_transaction`( `sample_id`, `qua_nonreg`, `eco_nonreg`, `qua_reg`, `eco_reg`, `total`, `month`, `year`, `publish_date`, `enter_date`, `user_id`) 
VALUES (:sample_id, :qua_nonreg, :eco_nonreg, :qua_reg, :eco_reg, :total, :month, :year, :publish_date, :enter_date, :user_id)";

$valarray = array(
'sample_id' => $key['sample_id'],
'qua_nonreg' => trim($_POST['qua_nonreg' . $key['sample_id']]),
'eco_nonreg' => trim($_POST['eco_nonreg' . $key['sample_id']]),
'qua_reg' => trim($_POST['qua_reg' . $key['sample_id']]),
'eco_reg' => trim($_POST['eco_reg' . $key['sample_id']]),
'total' => trim($_POST['total' . $key['sample_id']]),
'month' => $month,
'year' => $year,
'publish_date' => $publish_date,
'enter_date' => $enter_date,
'user_id' => $user_id,
);

$addSample = $db->setData($db->con, $sqlstr, $valarray);

if ($addSample) {
$done = 1;
}
}

if ($key['sample_id'] == 5) {

// echo $month;die();
$sqlstr = "INSERT INTO `sample_transaction_final`( `sample_id`, `qua_nonreg`, `eco_nonreg`, `qua_reg`, `eco_reg`, `total`, `month`, `year`, `publish_date`, `enter_date`, `user_id`) 
VALUES (:sample_id, :qua_nonreg, :eco_nonreg, :qua_reg, :eco_reg, :total, :month, :year, :publish_date, :enter_date, :user_id)";

$valarray = array(
'sample_id' => $key['sample_id'],
'qua_nonreg' => trim($_POST['qua_nonreg' . $key['sample_id']]),
'eco_nonreg' => trim($_POST['eco_nonreg' . $key['sample_id']]),
'qua_reg' => trim($_POST['qua_reg' . $key['sample_id']]),
'eco_reg' => trim($_POST['eco_reg' . $key['sample_id']]),
'total' => trim($_POST['total' . $key['sample_id']]),
'month' => $month,
'year' => $year,
'publish_date' => $publish_date,
'enter_date' => $enter_date,
'user_id' => $user_id,
);

$addSample = $db->setData($db->con, $sqlstr, $valarray);

if ($addSample) {
$done = 1;
}
}
}


if($done==1)
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);

$_SESSION['success']="Sample Data Added";

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

// echo "Processing year: $currentYear, month: $currentMonth\n";die();



// print_r($get);die();

header("location:revenue_transaction.php");exit;

}
else
{

$_SESSION['error']="Sample Data Not Added";
header("location:sample_transaction.php");exit;
}


}elseif(isset($_POST['btntest'])){

// print_r($_POST);die();
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
$month= $_SESSION['month'];
$year = $_SESSION['year'];

}else{
$enter_date = date('Y-m-d');
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}


$sqlquery = "SELECT year, month
FROM sample_transaction_final
WHERE `user_id`=:user_id
ORDER BY year DESC, month DESC
LIMIT 1;
";

$valarray88 = array('user_id'=>$user_id);

$get = $db->getAssoc($db->con, $sqlquery, $valarray88);

$currentMonth = $month;
$currentYear =$year;

$endMonth = isset($get[0]['month']) ? $get[0]['month'] : 0;
$endYear = isset($get[0]['year']) ? $get[0]['year'] : 0;

for ($i = $currentMonth; $currentYear < $endYear || ($currentYear == $endYear && $i <= $endMonth); $i++) {

if($currentMonth =='01'|| $currentMonth =='1'){
$prevmonth = '12';
$prevYear = $currentYear - 1;
$finalprev = $db->getCurrentSampleTransactionfinal1($db, $db->con, $user_id, $prevmonth, $prevYear);

}else{
$prevmonth = $currentMonth - 1;
$finalprev = $db->getCurrentSampleTransactionfinal1($db, $db->con, $user_id, $prevmonth, $currentYear);
}

// echo $currentMonth ."-". $currentYear; die();

$sampleTransaction=$db->getCurrentSampleTransaction($db, $db->con, $user_id, $currentMonth, $currentYear);

$qua_nonreg_final = isset($finalprev[0]['qua_nonreg']) ? $finalprev[0]['qua_nonreg'] : 0;
$eco_nonreg_final = isset($finalprev[0]['eco_nonreg']) ? $finalprev[0]['eco_nonreg'] : 0;
$qua_reg_final = isset($finalprev[0]['qua_reg']) ? $finalprev[0]['qua_reg'] : 0;
$eco_reg_final = isset($finalprev[0]['eco_reg']) ? $finalprev[0]['eco_reg'] : 0;
$total_final = isset($finalprev[0]['total']) ? $finalprev[0]['total'] : 0;

if (is_array($sampleTransaction) && isset($sampleTransaction[1])) {
$total_qua_nonreg_3 = $sampleTransaction[1]['qua_nonreg'] + $qua_nonreg_final;
$total_eco_nonreg_3 = $sampleTransaction[1]['eco_nonreg'] + $eco_nonreg_final;
$total_qua_reg_3 = $sampleTransaction[1]['qua_reg'] + $qua_reg_final;
$total_eco_reg_3 = $sampleTransaction[1]['eco_reg'] + $eco_reg_final;
$total_total_3 = $total_qua_nonreg_3 + $total_eco_nonreg_3 + $total_qua_reg_3 + $total_eco_reg_3;
} else {
$total_qua_nonreg_3 = 0;
$total_eco_nonreg_3 = 0;
$total_qua_reg_3 = 0;
$total_eco_reg_3 = 0;
$total_total_3 = 0;
}

if (is_array($sampleTransaction) && isset($sampleTransaction[3])) {
$qua_nonreg_5 = $total_qua_nonreg_3 - $sampleTransaction[3]['qua_nonreg'];
$eco_nonreg_5 = $total_eco_nonreg_3 - $sampleTransaction[3]['eco_nonreg'];
$qua_reg_5 = $total_qua_reg_3 - $sampleTransaction[3]['qua_reg'];
$eco_reg_5 = $total_eco_reg_3 - $sampleTransaction[3]['eco_reg'];
$total_5 = $total_total_3 - $sampleTransaction[3]['total'];
} else {
$qua_nonreg_5 = 0;
$eco_nonreg_5 = 0;
$qua_reg_5 = 0;
$eco_reg_5 = 0;
$total_5 = 0;
}

$sqlf="UPDATE `sample_transaction_final` SET `qua_nonreg`=:qua_nonreg, `eco_nonreg`=:eco_nonreg, `qua_reg`=:qua_reg, `eco_reg`=:eco_reg,`total`=:total WHERE user_id=:user_id AND month=:month AND year=:year" ;

$addSample = $db->setData($db->con, $sqlf, array('qua_nonreg'=>$qua_nonreg_5, 'eco_nonreg'=>$eco_nonreg_5, 'qua_reg'=>$qua_reg_5, 'eco_reg'=>$eco_reg_5, 'total'=>$total_5,'user_id'=>$user_id, 'month'=>$currentMonth, 'year'=>$currentYear));


if ($currentMonth == 12) {
$currentMonth = 1;
$currentYear++;
} else {
$currentMonth++;
}


}



$sampleTransaction=$db->getCurrentSampleTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);




?>


<div class="content-page">
<div class="content">

<!-- Start Content-->
<div class="container-xxl">

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
<div class="flex-grow-1">
<h4 class="fs-18 fw-semibold m-0">Sample Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Sample Transaction</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Details of Sample received and tested during <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>
<div class="py-2">

<form class="form-horizontal" method="post">
<input class="form-control" style="display: none" type="hidden"  name="user_id" id="user_id" value="<?=$user_id ?>" readonly>


<label>Reporting month Date</label>
<div class="col-md-3" style="display:inline-block;">
<!-- max="<?php //echo date("Y-m-t",strtotime(date("Y-m-t"))); ?>" -->
<input class="form-control" type="date" max="<?php //echo date("Y-m-t",strtotime(date("Y-m-t"))); ?>" name="enter_date" id="enter_date" placeholder="Date" required value="<?php echo $enter_date; ?>"/>
</div>

<button class="btn btn-primary" name="btntest" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>                 


</form>


</div>


<div style="color:red" class="py-2"><b>(Note: If no value then enter 0)</b></div>
<?php
if (isset($_SESSION['success'])) {
?>
<div class="alert alert-success" id="card-box">
<strong>Success!</strong> <?php echo $_SESSION['success']; ?>.
</div>
<?php


}  unset($_SESSION['success']);

if (isset($_SESSION['error'])) 
{
?>
<div class="alert alert-danger" id="card-box">>
<strong>Fail!</strong> <?php echo $_SESSION['error']; ?>.
</div>
<?php
} 

unset($_SESSION['error']);
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<div class="table-responsive">
<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th rowspan="2">Sr No</th>
<th rowspan="2">Samples</th>
<th colspan="2">Non-Regulatory</th>
<th colspan="2"> Regulatory</th>
<th rowspan="2">Total</th>  

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
if (!$sampleTransaction) {

$i = 1; 

if($_SESSION['month']=='01'|| $_SESSION['month']=='1'){
$prevmonth = '12';
$year = $_SESSION['year'] - 1;
}else{
$prevmonth = $_SESSION['month'] - 1;
}
$finalprev = $db->getCurrentSampleTransactionfinal1($db, $db->con, $user_id, $prevmonth, $year);

foreach ($getSampleList as $index => $regkey):

$qua_nonreg_final = isset($finalprev[0]['qua_nonreg']) ? $finalprev[0]['qua_nonreg'] : 0;
$eco_nonreg_final = isset($finalprev[0]['eco_nonreg']) ? $finalprev[0]['eco_nonreg'] : 0;
$qua_reg_final = isset($finalprev[0]['qua_reg']) ? $finalprev[0]['qua_reg'] : 0;
$eco_reg_final = isset($finalprev[0]['eco_reg']) ? $finalprev[0]['eco_reg'] : 0;
$total_final = isset($finalprev[0]['total']) ? $finalprev[0]['total'] : 0;

?>

<tr>
<td><?= $i ?></td>
<td>
<?= htmlspecialchars($regkey['sample_name']) ?>
</td>
<td>
<input type="number" class="form-control" name="qua_nonreg<?= $regkey['sample_id'] ?>" id="qua_nonreg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $qua_nonreg_final : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="eco_nonreg<?= $regkey['sample_id'] ?>" id="eco_nonreg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $eco_nonreg_final : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="qua_reg<?= $regkey['sample_id'] ?>" id="qua_reg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $qua_reg_final : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="eco_reg<?= $regkey['sample_id'] ?>" id="eco_reg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $eco_reg_final : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="total<?= $regkey['sample_id'] ?>" id="total<?= $regkey['sample_id'] ?>" readonly required value="<?= $index === 0 ? $total_final : ''; ?>" style="background-color: #f8f9fa;">
</td>
</tr>
<?php $i++;
endforeach;
} else {
$i = 1; 

if($_SESSION['month']=='01'|| $_SESSION['month']=='1'){
$prevmonth = '12';
$year = $_SESSION['year'] - 1;
}else{
$prevmonth = $_SESSION['month'] - 1;
}
$finalprev = $db->getCurrentSampleTransactionfinal1($db, $db->con, $user_id, $prevmonth, $year);

// print_r($finalprev);die();

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
</tr>
<?php $i++; endforeach; 
?>

<tr>

<td>5</td>
<td>Samples pending at the end of current month (3-4)</td>
<td><?php echo $total_qua_nonreg_3 - $sampleTransaction[3]['qua_nonreg'].'.00' ?></td>
<td><?php echo $total_eco_nonreg_3 - $sampleTransaction[3]['eco_nonreg'].'.00' ?></td>
<td><?php echo $total_qua_reg_3 - $sampleTransaction[3]['qua_reg'].'.00' ?></td>
<td><?php echo $total_eco_reg_3 - $sampleTransaction[3]['eco_reg'].'.00' ?></td>
<td><?php echo $total_total_3 - $sampleTransaction[3]['total'].'.00' ?></td>

</tr>
<?php

} ?>


</tbody>

</table>
</div>

<?php    if (!$sampleTransaction) { ?>   
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i> Save & Next
</button>    
<?php } else {?>  
<button class="btn btn-primary" name="btnSaveSample1" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i>Next
</button><?php } ?>  

</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<?php  require('footer.php'); ?>

<script src="assets/js/functions/calculation.js"></script> 


<script type="text/javascript">

<?php 
if(isset($_SESSION['enter_date']))
{

echo "$(document).ready(function()
{ $('#myModal').modal('hide');});";

}
else
{

echo " $(document).ready(function()
{
$('#myModal').modal({
backdrop: 'static',
keyboard: false
}); });";


}
?>

$(document).ready(function()
{
$('tr').eq(2).find('input').attr("disabled","true");
$('tr').eq(4).find('input').attr("disabled","true");
// $('tr').eq(6).find('input').attr("readonly","true");
});

function setDate()
{

var user_id=$("#user_id").val();
var enter_date=$("#enter_date").val();
var currurl = window.location.pathname;
var page_name=currurl.substr(currurl.lastIndexOf("/") + 1);

if(enter_date=="")
{

}
else
{


$.ajax({
url:"js/ajax/ajax_setSessionDate.php",
type:"post",
dataType:"json",
data:{ enter_date:enter_date},
success:function(result)
{
if(result==1)
{
location.reload();
}
}
});



}

}

</script>
