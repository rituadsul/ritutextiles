<?php  require('header.php'); 


if (isset($_POST['btnAddTraining'])) 
{
$organisation_name=trim($_POST['organisation_name']);
$training_date=$_POST['training_date'];
$participant_no=$_POST['participant_no'];
$amount=$_POST['amount'];
$gst_amount=$_POST['gst_amount'];
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];
$publish_date=date("Y-m-d H:i:s");


$addSql="INSERT INTO `training_program`( `organisation_name`, `training_date`, `participant_no`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `user_id`, enter_date) VALUES (:organisation_name, :training_date, :participant_no, :amount, :gst_amount, :month, :year, :publish_date, :user_id, :enter_date)";

$valarray=array(
'organisation_name'=>$organisation_name,
'training_date'=>$training_date,
'participant_no'=>$participant_no,
'amount'=>$amount,
'gst_amount'=>$gst_amount,
'month'=>$month,
'year'=>$year,
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date
);

$add=$db->setData($db->con, $addSql, $valarray);

if($add)
{

$_SESSION['success']="Training Data Added";    
header("location:add_training.php");exit;
}
else
{

$_SESSION['error']="Training Data Not Added";
header("location:add_training.php");exit;
}



}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}


if (isset($_POST['btnSaveSample'])) 
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
header('location:activity_transaction.php');
}


$getTrainingList=$db->getCurrentTrainingList($db, $db->con, $user_id,$_SESSION['month'],$_SESSION['year']);

?>


<style type="text/css">
.center-fs-20{
text-align: center;
font-size: 20px;
margin-top: 10px;
}
</style>
<div class="content-page">
<div class="content">

<!-- Start Content-->
<div class="container-xxl">

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
<div class="flex-grow-1">
<h4 class="fs-18 fw-semibold m-0">Training Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Training</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-3">Whether Training conducted for <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>

<?php if(!$getTrainingList) {?>
<div class="form-check">
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifyes" value="Y"><div style="width: 50px;">Yes</div>
</label>
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifno" value="N" checked>No
</label>
</div>   
<?php } ?> 
<div class="py-3">

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
<?php if(!$getTrainingList) {?>
<?php if(empty($getTrainingList)){ ?>
<div id="infodiv" style="display: none;"> 

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >


<div class="form-group row py-2">
<label class="control-label col-md-3">Name of Organisation<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="text"  name="organisation_name" placeholder="Enter Name of Organisation" required>
</div>
</div>
<div class="form-group row py-1">
<label class="control-label col-md-3">Conducted On (Date)<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="date" name="training_date" id="training_date" placeholder="Enter Date" required>
</div>
</div>
<div class="form-group row py-1">
<label class="control-label col-md-3">No of Participants<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="text"  name="participant_no" placeholder="Enter No of Participants" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Amount Collected(Rs.) <br>(Excluding GST)</label>
<div class="col-md-8">
<input class="form-control" type="number" id="amount"  name="amount" placeholder="Enter Amount" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">GST(18%)</label>
<div class="col-md-8">
<input class="form-control" type="number" id="gst_amount"  name="gst_amount" placeholder="GST Amount" disabled required>
</div>
</div>


<div class="form-group row py-2">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddTraining" type="submit" id="btnAddTraining"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Training Details</button>
</div>
</div>              


</form>
</div>

<?php } else{  ?>
<div class="table-responsive">
<table class="table table-traffic table-bordered " >

<thead>
<tr>
<th>Sr No</th>
<th>Organisation Name</th>
<th>Date</th>
<th>No Of Participants</th>
<th>Amount</th>
<th>GST Amount</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTrainingList as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['organisation_name'] ?></td>
<td><?= $regkey['training_date'] ?></td>
<td><?= $regkey['participant_no'] ?></td>
<td><?= $regkey['amount'] ?></td>
<td><?= $regkey['gst_amount'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
</div>

<?php } } ?>

</div>

<div id="infodiv1">

<?php if(!empty($getTrainingList)){ ?>
<div class="table-responsive">
<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Organisation Name</th>
<th>Date</th>
<th>No Of Participants</th>
<th>Amount</th>
<th>GST Amount</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTrainingList as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['organisation_name'] ?></td>
<td><?= $regkey['training_date'] ?></td>
<td><?= $regkey['participant_no'] ?></td>
<td><?= $regkey['amount'] ?></td>
<td><?= $regkey['gst_amount'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
</div>
<?php } else { ?>  <div class="center-fs-20"><b>No Record Added...!!</b></div> <?php } ?>
<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<?php    if (!$getTrainingList) { ?>   
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
<i class="fa fa-fw fa-lg fa-check-circle"></i> Save & Next
</button>    
<?php } else {?>  
<button class="btn btn-primary" name="btnSaveSample" type="submit" style="float: right;">
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
</div>


<script>
document.getElementById('btnAddTraining').addEventListener('click', function(event) {
const dateInput = document.getElementById('training_date').value;
const datePattern = /^\d{4}-\d{2}-\d{2}$/;

if (!dateInput.match(datePattern) || !isValidDate(dateInput)) {
event.preventDefault();
alert('Please enter a valid date in the format YYYY-MM-DD.');
}
});

function isValidDate(dateString) {
const date = new Date(dateString);
return date && date.getFullYear() == dateString.split('-')[0];
}
</script>

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

<script>
function checkme() {
var infodiv = document.getElementById('infodiv');
var infodiv1 = document.getElementById('infodiv1');
var yesRadio = document.getElementById('ifyes');

if (yesRadio.checked) {
infodiv.style.display = 'block'; 
infodiv1.style.display = 'none'; 
} else {
infodiv.style.display = 'none';
infodiv1.style.display = 'block';
}
}
</script>


<?php  require('footer.php'); ?>


