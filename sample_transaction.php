<?php  require('header.php'); 

$getSampleList=$db->labelList($db, $db->con);

if (isset($_POST['btnSaveSample'])) 
{

$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];
$publish_date=date("Y-m-d H:i:s");
$done="";

foreach ($getSampleList as $key) 
{

$sqlstr="INSERT INTO `sample_transaction`( `sample_id`, `qua_nonreg`, `eco_nonreg`, `qua_reg`, `eco_reg`, `total`, `month`, `year`, `publish_date`, enter_date,  `user_id`) 
VALUES (:sample_id, :qua_nonreg, :eco_nonreg, :qua_reg, :eco_reg, :total, :month, :year, :publish_date, :enter_date, :user_id)";

$valarray=array(
'sample_id'=>$key['sample_id'],
'qua_nonreg'=>trim($_POST['qua_nonreg'.$key['sample_id']]),
'eco_nonreg'=>trim($_POST['eco_nonreg'.$key['sample_id']]), 
'qua_reg'=>trim($_POST['qua_reg'.$key['sample_id']]),
'eco_reg'=>trim($_POST['eco_reg'.$key['sample_id']]),
'total'=>trim($_POST['total'.$key['sample_id']]),       
'month'=>$month, 
'year'=>$year, 
'publish_date'=>$publish_date,
'enter_date'=>$enter_date,
'user_id'=>$user_id,

);

$addSample=$db->setData($db->con, $sqlstr, $valarray);

if($addSample)
{
$done=1;
}

}

if($done==1)
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);

$_SESSION['success']="Sample Data Added";

header("location:revenue_transaction.php");exit;
}
else
{

$_SESSION['error']="Sample Data Not Added";
header("location:sample_transaction.php");exit;
}


}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
$enter_date = date('Y-m-d');
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
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
<input class="form-control" type="date" max="<?php echo date("Y-m-t",strtotime(date("Y-m-t"))); ?>"  name="enter_date" id="enter_date" placeholder="Date" required value="<?php echo $enter_date; ?>"/>
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
$prevmonth = $_SESSION['month'] - 1;
$prevdata = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $prevmonth, $year);

$prevquo = isset($prevdata[0]) ? $prevdata[0]['qua_nonreg'] + ($prevdata[1]['qua_nonreg'] ?? 0) : 0;
$preveco_nonreg = isset($prevdata[0]) ? $prevdata[0]['eco_nonreg'] + ($prevdata[1]['eco_nonreg'] ?? 0) : 0;
$prevqua_reg = isset($prevdata[0]) ? $prevdata[0]['qua_reg'] + ($prevdata[1]['qua_reg'] ?? 0) : 0;
$preveco_reg = isset($prevdata[0]) ? $prevdata[0]['eco_reg'] + ($prevdata[1]['eco_reg'] ?? 0) : 0;
$total = isset($prevdata[0]) ? $prevdata[0]['total'] + ($prevdata[1]['total'] ?? 0) : 0;

foreach ($getSampleList as $index => $regkey): ?>
<tr>
<td><?= $i ?></td>
<td>
<?php //if ($regkey['is_commercial'] == 'Y'): ?>
<!-- <span style="font-size: 14px;" class="badge badge-warning">C</span> -->
<?php //else: ?>
<!-- <span style="font-size: 14px;" class="badge badge-danger">NC</span> -->
<?php //endif; ?>
<?= htmlspecialchars($regkey['sample_name']) ?>
</td>
<td>
<input type="number" class="form-control" name="qua_nonreg<?= $regkey['sample_id'] ?>" id="qua_nonreg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $prevquo : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="eco_nonreg<?= $regkey['sample_id'] ?>" id="eco_nonreg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $preveco_nonreg : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="qua_reg<?= $regkey['sample_id'] ?>" id="qua_reg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $prevqua_reg : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="eco_reg<?= $regkey['sample_id'] ?>" id="eco_reg<?= $regkey['sample_id'] ?>" required value="<?= $index === 0 ? $preveco_reg : ''; ?>">
</td>
<td>
<input type="number" class="form-control" name="total<?= $regkey['sample_id'] ?>" id="total<?= $regkey['sample_id'] ?>" disabled required value="<?= $index === 0 ? $total : ''; ?>">
</td>
</tr>
<?php $i++;
endforeach;
} else {
$i = 1;
if (isset($sampleTransaction)) {
foreach ($sampleTransaction as $stt): ?>
<tr>
<td><?= $i ?></td>
<td>
 <?php //if ($stt['is_commercial'] == 'N'): ?>
<!-- <span style="font-size: 14px;" class="badge">NC</span> -->
 <?php //endif; ?> 
<?= $stt['sample_name'] ?>
</td>
<td>
<?= htmlspecialchars($stt['qua_nonreg']) ?>
</td>
<td>
<?= htmlspecialchars($stt['eco_nonreg']) ?>
</td>
<td>
<?= htmlspecialchars($stt['qua_reg']) ?>
</td>
<td>
<?= htmlspecialchars($stt['eco_reg']) ?>
</td>
<td>
<?= htmlspecialchars($stt['total']) ?>
</td>
</tr>
<?php $i++;
endforeach;
}
} ?>
</tbody>

</table>
</div>

<?php    if (!$sampleTransaction) { ?>   
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i> Save & Next
</button>    
<?php } else {?>  
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
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

    $('tr').eq(4).find('input').attr("disabled","true");
    $('tr').eq(6).find('input').attr("disabled","true");
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
