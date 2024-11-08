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

// print_r($valarray);die();

$sqlstr="INSERT INTO `revenue_transaction`( `revenue_label_id`, `rev_qua_nonreg`, `rev_eco_nonreg`, `rev_qua_reg`, `rev_eco_reg`, `rev_total`, `month`, `year`, `publish_date`,  `user_id`, enter_date) 
VALUES (:revenue_label_id, :rev_qua_nonreg, :rev_eco_nonreg, :rev_qua_reg, :rev_eco_reg, :rev_total, :month, :year, :publish_date, :user_id, :enter_date )";


$addSample=$db->setData($db->con, $sqlstr, $valarray);

if($addSample)
{
$done=1;
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

$revenue_transaction = $db->getCurrentRevenueTransaction($db, $db->con, $user_id,  $_SESSION['month'], $_SESSION['year']);


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
<input class="form-control" type="date" max="<?php echo date("Y-m-t",strtotime(date("Y-m-t"))); ?>"  name="enter_date" id="enter_date" placeholder="Date" required value="<?php echo $enter_date; ?>"/>
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


    <?php 
if(!$revenue_transaction){?>
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
$prevmonth = $_SESSION['month'] - 1;
$prevdata = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth, $year);

$prevquo = isset($prevdata[8]) ? ($prevdata[8]['rev_qua_nonreg'] ?? 0) : 0;
$preveco_nonreg = isset($prevdata[8]) ? ($prevdata[8]['rev_eco_nonreg'] ?? 0) : 0;
$prevqua_reg = isset($prevdata[8]) ? ($prevdata[8]['rev_qua_reg'] ?? 0) : 0;
$preveco_reg = isset($prevdata[8]) ? ($prevdata[8]['rev_eco_reg'] ?? 0) : 0;
$total = isset($prevdata[8]) ? ($prevdata[8]['rev_total'] ?? 0) : 0;

$prevquo_gst = $prevquo * 0.18;
$preveco_nonreg_gst = $preveco_nonreg * 0.18;
$prevqua_reg_gst = $prevqua_reg * 0.18;
$preveco_reg_gst = $preveco_reg * 0.18;
$total_gst = $prevquo_gst + $preveco_nonreg_gst + $prevqua_reg_gst + $preveco_reg_gst;
$i=1; 
foreach ($getRevenueList as $index => $regkey): 


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
    echo ($i - ($i/2)) . ".1";
     } ?></td>

    <td><?=$regkey['revenue_label_name']?></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_qua_nonreg<?=$regkey['revenue_label_id']?>" name="rev_qua_nonreg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $prevquo : ''; ?><?= $index === 1 ? $prevquo_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_eco_nonreg<?=$regkey['revenue_label_id']?>" name="rev_eco_nonreg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $preveco_nonreg : ''; ?><?= $index === 1 ? $preveco_nonreg_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_qua_reg<?=$regkey['revenue_label_id']?>" name="rev_qua_reg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $prevqua_reg : ''; ?><?= $index === 1 ? $prevqua_reg_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_eco_reg<?=$regkey['revenue_label_id']?>" name="rev_eco_reg<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $preveco_reg : ''; ?><?= $index === 1 ? $preveco_reg_gst : ''; ?>" required></td>
    <td><input type="number" step="0.01" class="form-control" id="rev_total<?=$regkey['revenue_label_id']?>" name="rev_total<?=$regkey['revenue_label_id']?>" value="<?= $index === 0 ? $total : ''; ?><?= $index === 1 ? $total_gst : ''; ?>" readonly style="background-color: #f8f9fa;"></td>
</tr>

<?php $i++; endforeach; ?>


</tbody>
</table>
</div>
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i> Save & Next
</button>    
</form>
<?php } ?>




<?php if (isset($revenue_transaction)) {
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
$i = 1;
foreach ($revenue_transaction as $rt):
 
$prevmonth = $_SESSION['month'] - 1;
$prevmonth2 = $_SESSION['month'] - 2;
$prevdata = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth, $year);
$prevdata2 = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth2, $year);

if(isset($prevdata[8]['rev_qua_nonreg'])) 
{
    $prevquo =$prevdata[8]['rev_qua_nonreg'];
}else{
    $prevquo = '0';
}

if(isset($prevdata[8]['rev_eco_nonreg'])) 
{
    $preveco_nonreg =$prevdata[8]['rev_eco_nonreg'];
}else{
    $preveco_nonreg = '0';
}

if(isset($prevdata[8]['rev_qua_reg'])) 
{
    $prevqua_reg =$prevdata[8]['rev_qua_reg'];
}else{
    $prevqua_reg = '0';
}

if(isset($prevdata[8]['rev_eco_reg'])) 
{
    $preveco_reg =$prevdata[8]['rev_eco_reg'];
}else{
    $preveco_reg = '0';
}

if(isset($prevdata[8]['rev_total'])) 
{
    $total =$prevdata[8]['rev_total'];
}else{
    $total = '0';
}

     

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
    echo ($i - ($i/2)) . ".1";
     } ?></td>
<td>

<?= $rt['revenue_label_name'] ?>
</td>
<td>

    <?php 
    if($i==1){ 
        echo $prevquo;
 }elseif($i==2){
   echo $prevquo * 0.18;
 }elseif($i==4){
    echo $revenue_transaction[2]['rev_qua_nonreg'] * 0.18;
 }
 elseif($i==5){
    echo $prevquo+$revenue_transaction[2]['rev_qua_nonreg'].'.00';
 }
 elseif($i==6){
    echo ($prevquo * 0.18) + ($revenue_transaction[2]['rev_qua_nonreg'] * 0.18);
 }
 elseif($i==8){
    echo $revenue_transaction[6]['rev_qua_nonreg'] * 0.18;
 }
  elseif($i==9){
    echo ($prevquo+$revenue_transaction[2]['rev_qua_nonreg']) - ($revenue_transaction[6]['rev_qua_nonreg']).'.00' ;
 }elseif($i==10){
   echo (($prevquo * 0.18) + ($revenue_transaction[2]['rev_qua_nonreg'] * 0.18)- ($revenue_transaction[6]['rev_qua_nonreg'] * 0.18));
 }
 else{
echo htmlspecialchars($rt['rev_qua_nonreg']);
 } ?>
</td>
<td>
  <?php 
    if($i==1){ 
        echo $preveco_nonreg;
 }elseif($i==2){
   echo $preveco_nonreg * 0.18;
 }elseif($i==4){
    echo $revenue_transaction[2]['rev_eco_nonreg'] * 0.18;
 }
 elseif($i==5){
    echo $preveco_nonreg+$revenue_transaction[2]['rev_eco_nonreg'].'.00';
 }
 elseif($i==6){
    echo ($preveco_nonreg * 0.18) + ($revenue_transaction[2]['rev_eco_nonreg'] * 0.18);
 }
 elseif($i==8){
    echo $revenue_transaction[6]['rev_eco_nonreg'] * 0.18;
 }
  elseif($i==9){
    echo ($preveco_nonreg+$revenue_transaction[2]['rev_eco_nonreg']) - ($revenue_transaction[6]['rev_eco_nonreg']).'.00' ;
 }elseif($i==10){
   echo (($preveco_nonreg * 0.18) + ($revenue_transaction[2]['rev_eco_nonreg'] * 0.18)- ($revenue_transaction[6]['rev_eco_nonreg'] * 0.18));
 }
 else{
echo htmlspecialchars($rt['rev_eco_nonreg']);
 } ?>
 </td>
<td>

    <?php 
    if($i==1){ 
        echo $prevqua_reg;
 }elseif($i==2){
   echo $prevqua_reg * 0.18;
 }elseif($i==4){
    echo $revenue_transaction[2]['rev_qua_reg'] * 0.18;
 }
 elseif($i==5){
    echo $prevqua_reg+$revenue_transaction[2]['rev_qua_reg'].'.00';
 }
 elseif($i==6){
    echo ($prevqua_reg * 0.18) + ($revenue_transaction[2]['rev_qua_reg'] * 0.18);
 }
 elseif($i==8){
    echo $revenue_transaction[6]['rev_qua_reg'] * 0.18;
 }
  elseif($i==9){
    echo ($prevqua_reg+$revenue_transaction[2]['rev_qua_reg']) - ($revenue_transaction[6]['rev_qua_reg']).'.00' ;
 }elseif($i==10){
   echo (($prevqua_reg * 0.18) + ($revenue_transaction[2]['rev_qua_reg'] * 0.18)- ($revenue_transaction[6]['rev_qua_reg'] * 0.18));
 }
 else{
echo htmlspecialchars($rt['rev_qua_reg']);
 } ?>
     
 </td>
<td>

    <?php 
    if($i==1){ 
        echo $preveco_reg;
 }elseif($i==2){
   echo $preveco_reg * 0.18;
 }elseif($i==4){
    echo $revenue_transaction[2]['rev_eco_reg'] * 0.18;
 }
 elseif($i==5){
    echo $preveco_reg+$revenue_transaction[2]['rev_eco_reg'].'.00';
 }
 elseif($i==6){
    echo ($preveco_reg * 0.18) + ($revenue_transaction[2]['rev_eco_reg'] * 0.18);
 }
 elseif($i==8){
    echo $revenue_transaction[6]['rev_eco_reg'] * 0.18;
 }
  elseif($i==9){
    echo ($preveco_reg+$revenue_transaction[2]['rev_eco_reg']) - ($revenue_transaction[6]['rev_eco_reg']).'.00' ;
 }elseif($i==10){
   echo (($preveco_reg * 0.18) + ($revenue_transaction[2]['rev_eco_reg'] * 0.18)- ($revenue_transaction[6]['rev_eco_reg'] * 0.18));
 }
 else{
echo htmlspecialchars($rt['rev_eco_reg']);
 } ?>
     
 </td>
<td>

    <?php 
    if($i==1){ 
        echo $total;
 }elseif($i==2){
   echo $total * 0.18;
 }elseif($i==4){
    echo $revenue_transaction[2]['rev_total'] * 0.18;
 }
 elseif($i==5){
    echo $total+$revenue_transaction[2]['rev_total'].'.00';
 }
 elseif($i==6){
    echo ($total * 0.18) + ($revenue_transaction[2]['rev_total'] * 0.18);
 }
 elseif($i==8){
    echo $revenue_transaction[6]['rev_total'] * 0.18;
 }
  elseif($i==9){
    echo ($total+$revenue_transaction[2]['rev_total']) - ($revenue_transaction[6]['rev_total']).'.00' ;
 }elseif($i==10){
   echo (($total * 0.18) + ($revenue_transaction[2]['rev_total'] * 0.18)- ($revenue_transaction[6]['rev_total'] * 0.18));
 }
 else{
echo htmlspecialchars($rt['rev_total']);
 } ?>
</td>

</tr>
<?php $i++;
endforeach;
?>
</tbody>


</table>
</div>
<button class="btn btn-primary" name="btnSaveSample1" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i>Next
</button> 
</form>
<?php } ?> 


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
$('tr').eq(10).find('input').prop("disabled", true).css("background-color", "#f8f9fa");
$('tr').eq(11).find('input').prop("disabled", true).css("background-color", "#f8f9fa");

    console.log("disabled inputs in rows:  5, 6, 7, 9, 10, 11");
});
</script>



