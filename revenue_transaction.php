<?php  require('header.php'); 

$getMonth=$db->getAllMonth($db, $db->con);
$getRevenueList=$db->getAssoc($db->con, "SELECT `revenue_label_id`, `revenue_label_name`, `is_active`, is_commercial, `publish_date`, `modify_date`, `user_id` FROM `revenue_label`  WHERE `is_active`=:is_active", array('is_active'=>'Y'));


if (isset($_POST['btnSaveSample1'])) 
{
header("location:add_training.php");exit;
}    

if (isset($_POST['btnSaveSample'])) 
{
      // print_r($_POST);die();

$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];
$publish_date=date("Y-m-d H:i:s");
$done="";

foreach ($getRevenueList as $key) 
{

if ($key['revenue_label_id'] != 9) {

$sqlstr="INSERT INTO `revenue_transaction`( `revenue_label_id`, `rev_qua_nonreg`, `rev_eco_nonreg`, `rev_qua_reg`, `rev_eco_reg`, `rev_total`, `month`, `year`, `publish_date`,  `user_id`, enter_date) 
VALUES (:revenue_label_id, :rev_qua_nonreg, :rev_eco_nonreg, :rev_qua_reg, :rev_eco_reg, :rev_total, :month, :year, :publish_date, :user_id, :enter_date )";

$valarray=array(
'revenue_label_id'=>$key['revenue_label_id'],
'rev_qua_nonreg'=>trim($_POST['rev_qua_nonreg'.$key['revenue_label_id']]),
'rev_eco_nonreg'=>trim($_POST['rev_eco_nonreg'.$key['revenue_label_id']]), 
'rev_qua_reg'=>trim($_POST['rev_qua_reg'.$key['revenue_label_id']]),
'rev_eco_reg'=>trim($_POST['rev_eco_reg'.$key['revenue_label_id']]),
'rev_total'=>trim($_POST['rev_total'.$key['revenue_label_id']]),       
'month'=>$month, 
'year'=>$year, 
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date

);


$addSample=$db->setData($db->con, $sqlstr, $valarray);

if($addSample)
{
$done=1;
}

}

if ($key['revenue_label_id'] == 9) {

    $sqlstr="INSERT INTO `revenue_transaction_final`( `revenue_label_id`, `rev_qua_nonreg`, `rev_eco_nonreg`, `rev_qua_reg`, `rev_eco_reg`, `rev_total`, `month`, `year`, `publish_date`,  `user_id`, enter_date) 
VALUES (:revenue_label_id, :rev_qua_nonreg, :rev_eco_nonreg, :rev_qua_reg, :rev_eco_reg, :rev_total, :month, :year, :publish_date, :user_id, :enter_date )";

$valarray=array(
'revenue_label_id'=>$key['revenue_label_id'],
'rev_qua_nonreg'=>trim($_POST['rev_qua_nonreg'.$key['revenue_label_id']]),
'rev_eco_nonreg'=>trim($_POST['rev_eco_nonreg'.$key['revenue_label_id']]), 
'rev_qua_reg'=>trim($_POST['rev_qua_reg'.$key['revenue_label_id']]),
'rev_eco_reg'=>trim($_POST['rev_eco_reg'.$key['revenue_label_id']]),
'rev_total'=>trim($_POST['rev_total'.$key['revenue_label_id']]),       
'month'=>$month, 
'year'=>$year, 
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date

);


$addSample=$db->setData($db->con, $sqlstr, $valarray);

if($addSample)
{
$done=1;
}

}

}

if($done==1)
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
$_SESSION['success']="Revenue Data Added";

header("location:add_training.php");exit;
}
else
{

$_SESSION['error']="Revenue Data Not Added";
header("location:revenue_transaction.php");exit;
}

}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}

$sqlquery = "SELECT year, month
FROM revenue_transaction_final
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
$finalprev = $db->getCurrentRevenueTransactionfinal($db, $db->con, $user_id, $prevmonth, $prevYear);

}else{
$prevmonth = $currentMonth - 1;
$finalprev = $db->getCurrentRevenueTransactionfinal($db, $db->con, $user_id, $prevmonth, $currentYear);
}

$revenue_transaction = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $currentMonth, $currentYear);

// print_r($finalprev);die();

$qua_nonreg_final = isset($finalprev[0]['rev_qua_nonreg']) ? $finalprev[0]['rev_qua_nonreg'] : 0;
$eco_nonreg_final = isset($finalprev[0]['rev_eco_nonreg']) ? $finalprev[0]['rev_eco_nonreg'] : 0;
$qua_reg_final = isset($finalprev[0]['rev_qua_reg']) ? $finalprev[0]['rev_qua_reg'] : 0;
$eco_reg_final = isset($finalprev[0]['rev_eco_reg']) ? $finalprev[0]['rev_eco_reg'] : 0;
$total_final = isset($finalprev[0]['rev_total']) ? $finalprev[0]['rev_total'] : 0;

if (is_array($revenue_transaction) && isset($revenue_transaction[1])) {
$total_qua_nonreg_3 = $revenue_transaction[2]['rev_qua_nonreg'] + $qua_nonreg_final;
$total_eco_nonreg_3 = $revenue_transaction[2]['rev_eco_nonreg'] + $eco_nonreg_final;
$total_qua_reg_3 = $revenue_transaction[2]['rev_qua_reg'] + $qua_reg_final;
$total_eco_reg_3 = $revenue_transaction[2]['rev_eco_reg'] + $eco_reg_final;
$total_total_3 = $total_qua_nonreg_3 + $total_eco_nonreg_3 + $total_qua_reg_3 + $total_eco_reg_3;
} else {
$total_qua_nonreg_3 = 0;
$total_eco_nonreg_3 = 0;
$total_qua_reg_3 = 0;
$total_eco_reg_3 = 0;
$total_total_3 = 0;
}

if (is_array($revenue_transaction) && isset($revenue_transaction[6])) {
$qua_nonreg_5 = $total_qua_nonreg_3 - $revenue_transaction[6]['rev_qua_nonreg'];
$eco_nonreg_5 = $total_eco_nonreg_3 - $revenue_transaction[6]['rev_eco_nonreg'];
$qua_reg_5 = $total_qua_reg_3 - $revenue_transaction[6]['rev_qua_reg'];
$eco_reg_5 = $total_eco_reg_3 - $revenue_transaction[6]['rev_eco_reg'];
$total_5 = $total_total_3 - $revenue_transaction[6]['rev_total'];
} else {
$qua_nonreg_5 = 0;
$eco_nonreg_5 = 0;
$qua_reg_5 = 0;
$eco_reg_5 = 0;
$total_5 = 0;
}


$sqlf="UPDATE `revenue_transaction_final` SET `rev_qua_nonreg`=:qua_nonreg, `rev_eco_nonreg`=:eco_nonreg, `rev_qua_reg`=:qua_reg, `rev_eco_reg`=:eco_reg,`rev_total`=:total WHERE user_id=:user_id AND month=:month AND year=:year" ;

$params = array(
    'qua_nonreg' => $qua_nonreg_5, 
    'eco_nonreg' => $eco_nonreg_5, 
    'qua_reg' => $qua_reg_5, 
    'eco_reg' => $eco_reg_5, 
    'total' => $total_5,
    'user_id' => $user_id, 
    'month' => $currentMonth, 
    'year' => $currentYear
);

$addSample = $db->setData($db->con, $sqlf, $params);

if ($currentMonth == 12) {
$currentMonth = 1;
$currentYear++;
} else {
$currentMonth++;
}

}


$revenue_transaction = $db->getCurrentRevenueTransaction($db, $db->con, $user_id,  $_SESSION['month'], $_SESSION['year']);

// print_r($revenue_transaction);die();


?>
<div class="content-page">
<div class="content">

<!-- Start Content-->
<div class="container-xxl">

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
<div class="flex-grow-1">
<h4 class="fs-18 fw-semibold m-0">Revenue Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Revenue Transaction</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Details of Revenue (Rs.) received and pending during <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>
<div class="py-2">

<form class="form-horizontal" method="post">
<input class="form-control" style="display: none" type="hidden"  name="user_id" id="user_id" value="<?=$user_id ?>" readonly>


<label>Reporting month Date</label>
<div class="col-md-3" style="display:inline-block;">
    <!-- max="<?php //echo date("Y-m-t",strtotime(date("Y-m-t"))); ?>" -->
<input class="form-control" type="date"   name="enter_date" id="enter_date" placeholder="Date" required value="<?php echo $enter_date; ?>"/>
</div>

<button class="btn btn-primary" name="btntest" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>                 


</form>


</div>


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
<th rowspan="2">Sample Name</th>
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
if(!$revenue_transaction){

if($_SESSION['month']=='01'|| $_SESSION['month']=='1'){
$prevmonth = '12';
$year = $_SESSION['year'] - 1;
}else{
$prevmonth = $_SESSION['month'] - 1;
}
$finalprev = $db->getCurrentRevenueTransactionfinal($db, $db->con, $user_id, $prevmonth, $year);

$i=1; 
foreach ($getRevenueList as $index => $regkey): 

$qua_nonreg_final = isset($finalprev[0]['rev_qua_nonreg']) ? $finalprev[0]['rev_qua_nonreg'] : 0;
$eco_nonreg_final = isset($finalprev[0]['rev_eco_nonreg']) ? $finalprev[0]['rev_eco_nonreg'] : 0;
$qua_reg_final = isset($finalprev[0]['rev_qua_reg']) ? $finalprev[0]['rev_qua_reg'] : 0;
$eco_reg_final = isset($finalprev[0]['rev_eco_reg']) ? $finalprev[0]['rev_eco_reg'] : 0;
$total_final = isset($finalprev[0]['rev_total']) ? $finalprev[0]['rev_total'] : 0;


$prevquo_gst = $qua_nonreg_final * 0.18;
$preveco_nonreg_gst = $eco_nonreg_final * 0.18;
$prevqua_reg_gst = $qua_reg_final * 0.18;
$preveco_reg_gst = $eco_reg_final * 0.18;
$total_gst = $total_final * 0.18;

?>
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

    <td><?=$regkey['revenue_label_name']?></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_qua_nonreg<?=$regkey['revenue_label_id']?>" name="rev_qua_nonreg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $qua_nonreg_final : ''; ?><?= $index === 1 ? $prevquo_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_eco_nonreg<?=$regkey['revenue_label_id']?>" name="rev_eco_nonreg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $eco_nonreg_final : ''; ?><?= $index === 1 ? $preveco_nonreg_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_qua_reg<?=$regkey['revenue_label_id']?>" name="rev_qua_reg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $qua_reg_final : ''; ?><?= $index === 1 ? $prevqua_reg_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_eco_reg<?=$regkey['revenue_label_id']?>" name="rev_eco_reg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $eco_reg_final : ''; ?><?= $index === 1 ? $preveco_reg_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_total<?=$regkey['revenue_label_id']?>" name="rev_total<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $total_final : ''; ?><?= $index === 1 ? $prevquo_gst : ''; ?>" readonly required style="background-color: #f8f9fa;"></td>
</tr>

<?php $i++; endforeach;

} else {
$i = 1;
if (isset($revenue_transaction)) {

if($_SESSION['month']=='01'|| $_SESSION['month']=='1'){
$prevmonth = '12';
$year = $_SESSION['year'] - 1;
}else{
$prevmonth = $_SESSION['month'] - 1;
}
$finalprev = $db->getCurrentRevenueTransactionfinal($db, $db->con, $user_id, $prevmonth, $year);

  // print_r($finalprev);die();

foreach ($revenue_transaction as $rt):

$qua_nonreg_final = isset($finalprev[0]['rev_qua_nonreg']) ? $finalprev[0]['rev_qua_nonreg'] : 0;
$eco_nonreg_final = isset($finalprev[0]['rev_eco_nonreg']) ? $finalprev[0]['rev_eco_nonreg'] : 0;
$qua_reg_final = isset($finalprev[0]['rev_qua_reg']) ? $finalprev[0]['rev_qua_reg'] : 0;
$eco_reg_final = isset($finalprev[0]['rev_eco_reg']) ? $finalprev[0]['rev_eco_reg'] : 0;
$total_final = isset($finalprev[0]['rev_total']) ? $finalprev[0]['rev_total'] : 0;


$prevquo_gst = $qua_nonreg_final * 0.18;
$preveco_nonreg_gst = $eco_nonreg_final * 0.18;
$prevqua_reg_gst = $qua_reg_final * 0.18;
$preveco_reg_gst = $eco_reg_final * 0.18;
$total_gst = $total_final * 0.18;

$qua_nonreg_4 = $revenue_transaction[2]['rev_qua_nonreg'] * 0.18;
$eco_nonreg_4 = $revenue_transaction[2]['rev_eco_nonreg'] * 0.18;
$qua_reg_4 = $revenue_transaction[2]['rev_qua_reg'] * 0.18;
$eco_reg_4 = $revenue_transaction[2]['rev_eco_reg'] * 0.18;
$total_4 = $revenue_transaction[2]['rev_total'] * 0.18;

$qua_nonreg_5 = $qua_nonreg_final + $revenue_transaction[2]['rev_qua_nonreg'];
$eco_nonreg_5 = $eco_nonreg_final + $revenue_transaction[2]['rev_eco_nonreg'];
$qua_reg_5 = $qua_reg_final + $revenue_transaction[2]['rev_qua_reg'];
$eco_reg_5 = $eco_reg_final + $revenue_transaction[2]['rev_eco_reg'];
$total_5 = $total_final + $revenue_transaction[2]['rev_total'];

$qua_nonreg_6 = $prevquo_gst + $qua_nonreg_4;
$eco_nonreg_6 = $preveco_nonreg_gst + $eco_nonreg_4;
$qua_reg_6 = $prevqua_reg_gst + $qua_reg_4;
$eco_reg_6 = $preveco_reg_gst + $eco_reg_4;
$total_6 = $total_gst + $total_4;

$qua_nonreg_8 = $revenue_transaction[6]['rev_qua_nonreg'] * 0.18;
$eco_nonreg_8 = $revenue_transaction[6]['rev_eco_nonreg'] * 0.18;
$qua_reg_8 = $revenue_transaction[6]['rev_qua_reg'] * 0.18;
$eco_reg_8 = $revenue_transaction[6]['rev_eco_reg'] * 0.18;
$total_8 = $revenue_transaction[6]['rev_total'] * 0.18;

 ?>
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
    <?php if ($i == 9) { ?>
        Pending amount to be received at the end of current month (3-4)
    <?php } else { ?>
<?= htmlspecialchars($rt['revenue_label_name']) ?>
<?php } ?>
</td>
<td>
 <?php if ($i == 1) { ?>
<?= $qua_nonreg_final ?>
<?php } elseif ($i == 2) { ?>
<?= $prevquo_gst ?>
<?php } elseif ($i == 4) { ?>
<?= $qua_nonreg_4; ?>
<?php } elseif ($i == 5) { ?>
<?= $qua_nonreg_5.'.00'; ?>
<?php } elseif ($i == 6) { ?>
<?= $qua_nonreg_6; ?>
<?php } elseif ($i == 8) { ?>
<?= $qua_nonreg_8; ?>
<?php } elseif ($i == 9) { ?>
<?= $qua_nonreg_5 - $revenue_transaction[6]['rev_qua_nonreg'].'.00'; ?>
<?php } else { ?>
<?= htmlspecialchars($rt['rev_qua_nonreg']) ?>
<?php } ?>
</td>
<td>
 <?php if ($i == 1) { ?>
<?= $eco_nonreg_final ?>
<?php } elseif ($i == 2) { ?>
<?= $preveco_nonreg_gst ?>
<?php } elseif ($i == 4) { ?>
<?= $eco_nonreg_4; ?>
<?php } elseif ($i == 5) { ?>
<?= $eco_nonreg_5.'.00'; ?>
<?php } elseif ($i == 6) { ?>
<?= $eco_nonreg_6; ?>
<?php } elseif ($i == 8) { ?>
<?= $eco_nonreg_8; ?>
<?php } elseif ($i == 9) { ?>
<?= $eco_nonreg_5 - $revenue_transaction[6]['rev_eco_nonreg'].'.00'; ?>
<?php } else { ?>
<?= htmlspecialchars($rt['rev_eco_nonreg']) ?>
<?php } ?>

</td>
<td>
 <?php if ($i == 1) { ?>
<?= $qua_reg_final ?>
<?php } elseif ($i == 2) { ?>
<?= $prevqua_reg_gst ?>
<?php } elseif ($i == 4) { ?>
<?= $qua_reg_4; ?>
<?php } elseif ($i == 5) { ?>
<?= $qua_reg_5.'.00'; ?>
<?php } elseif ($i == 6) { ?>
<?= $qua_reg_6; ?>
<?php } elseif ($i == 8) { ?>
<?= $qua_reg_8; ?>
<?php } elseif ($i == 9) { ?>
<?= $qua_reg_5 - $revenue_transaction[6]['rev_qua_reg'].'.00'; ?>
<?php } else { ?>
<?= htmlspecialchars($rt['rev_qua_reg']) ?>
<?php } ?>
</td>
<td>
 <?php if ($i == 1) { ?>
<?= $eco_reg_final ?>
<?php } elseif ($i == 2) { ?>
<?= $preveco_reg_gst ?>
<?php } elseif ($i == 4) { ?>
<?= $eco_reg_4; ?>
<?php } elseif ($i == 5) { ?>
<?= $eco_reg_5.'.00'; ?>
<?php } elseif ($i == 6) { ?>
<?= $eco_reg_6; ?>
<?php } elseif ($i == 8) { ?>
<?= $eco_reg_8; ?>
<?php } elseif ($i == 9) { ?>
<?= $eco_reg_5 - $revenue_transaction[6]['rev_eco_reg'].'.00'; ?>
<?php } else { ?>
<?= htmlspecialchars($rt['rev_eco_reg']) ?>
<?php } ?>
</td>
<td>
     <?php if ($i == 1) { ?>
<?= $total_final ?>
<?php } elseif ($i == 2) { ?>
<?= $total_gst ?>
<?php } elseif ($i == 4) { ?>
<?= $total_4; ?>
<?php } elseif ($i == 5) { ?>
<?= $total_5.'.00'; ?>
<?php } elseif ($i == 6) { ?>
<?= $total_6; ?>
<?php } elseif ($i == 8) { ?>
<?= $total_8; ?>
<?php } elseif ($i == 9) { ?>
<?= $total_5 - $revenue_transaction[6]['rev_total'].'.00'; ?>
<?php } else { ?>
<?= htmlspecialchars($rt['rev_total']) ?>
<?php } ?>
</td>

</tr>
<?php $i++;
endforeach;

?>
<tr>
    <td>5.1</td>
    <td>Service tax on (5) (3.1-4.1)</td>
    <td><?= $qua_nonreg_6 - $qua_nonreg_8 ?></td>
    <td><?= $eco_nonreg_6 - $eco_nonreg_8; ?></td>
    <td><?= $qua_reg_6 - $qua_reg_8; ?></td>
    <td><?= $eco_reg_6 - $eco_reg_8; ?></td>
    <td><?= $total_6 - $total_8; ?></td>
</tr>
<?php
}
} ?>
</tbody>

</table>
</div>



<?php    if (!$revenue_transaction) { ?>   
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i> Save & Next
</button>    
<?php } else {?>  
<button class="btn btn-primary" name="btnSaveSample1" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i>Next
</button><?php } ?> 
</form> 

</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<?php  require('footer.php'); ?>



<script src="assets/js/functions/revenue_calc.js"></script>
<script>
$(document).ready(function() {
   // Select specific rows and apply the required styles and properties
$('tr').eq(2).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(3).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(5).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(6).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(7).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(9).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(10).find('input').prop("readonly", true).css("background-color", "#f8f9fa");
$('tr').eq(11).find('input').prop("disabled", true).css("background-color", "#f8f9fa");

    console.log("Disabled inputs in rows: 3, 5, 6, 7, 9, 10, 11");
});
</script>



