<?php  require('header.php'); 

$getMeetList=$db->disposeList($db, $db->con);


if (isset($_POST['btnAddDispose'])) 
{
$dispose_item_id=$_POST['dispose_item_id'];
$date_of_dispose=$_POST['date_of_dispose'];
$date_of_after_dispose=$_POST['date_of_after_dispose'];    
$remark=$_POST['remark'];
$amount=$_POST['amount'];   
$publish_date=date("Y-m-d H:i:s");
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];


$str="INSERT INTO `dispose_item_transaction`( `dispose_item_id`, `date_of_dispose`, `date_of_after_dispose`, `amount`, `remark`, `month`, `year`, `publish_date`, `user_id`, enter_date) VALUES (:dispose_item_id, :date_of_dispose, :date_of_after_dispose, :amount,   :remark,   :month, :year, :publish_date, :user_id, :enter_date )";
$valarray= array(
'dispose_item_id'=>$dispose_item_id,
'date_of_dispose'=>$date_of_dispose,
'date_of_after_dispose'=>$date_of_after_dispose,
'amount'=>$amount,
'remark'=>$remark,
'month'=>$month,
'year'=>$year,
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date
);

$add=$db->setData($db->con, $str, $valarray);

if($add)
{

$_SESSION['success']="Data Added";    
header("location:dispose_transaction.php");exit;
}
else
{

$_SESSION['error']="Data Not Added";
header("location:dispose_transaction.php");exit;
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
header("location:expenditure_transaction2.php");exit;
}

$getTransaction=$db->getCurrentDisposeTransaction($db, $db->con, $user_id,  $_SESSION['month'], $_SESSION['year']);



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
<h4 class="fs-18 fw-semibold m-0"> Dispose Item</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b> Dispose</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Whether Dispose Transaction Given To SME’s month  <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>

<?php if(!$getTransaction) {?>

<div class="form-check mt-2">
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifyes" value="Y"><div style="width: 50px;">Yes</div>
</label>
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme('dispose_transaction')" type="radio" name="ssc_status" id="ifno" value="N" checked>No
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
<?php if(!$getTransaction) {?>
<?php if(empty($getTransaction)){ ?>
<div id="infodiv" style="display: none;"> 

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >


<div class="form-group row py-2">
<label  class=" control-label col-md-3">Dispose Item<span style="color:red">*</span></label>
<div class="col-md-8">
<select class="form-control "  name="dispose_item_id" required>
<option value="">Select Dispose Item</option>
<?php if($getMeetList){ foreach ($getMeetList as $key): ?>
<option value= "<?=$key['dispose_item_id']?>"> <?=$key['dispose_item_name']?> </option>
<?php endforeach;} ?>
</select>                      
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Date of Disposal</label>
<div class="col-md-8">
<input class="form-control" type="date"  name="date_of_dispose" placeholder="Enter Amount" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">After Disposal Date from which Samples /Records available</label>
<div class="col-md-8">
<input class="form-control" type="date"  name="date_of_after_dispose" placeholder="Enter Amount" required>
</div>
</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Amount(Rs.)</label>
<div class="col-md-8">
<input class="form-control" type="number"  name="amount" placeholder="Enter Amount" required>
</div>
</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Remark</label>
<div class="col-md-8">
<input class="form-control" type="text"  name="remark" placeholder="Enter Remark" >
</div>
</div>                

<div class="form-group row py-3">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddDispose" type="submit" id="btnAddDispose"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Details</button>
</div>
</div>              

</form>
</div>

<?php } else { ?>
<div class="table-responsive">
<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Dispose Item Name</th>                  
<th>Date of dispose</th>
<th>After Disposal Date</th>                  
<th>Amount Received</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['dispose_item_name'] ?></td>
<td><?= $regkey['date_of_dispose'] ?></td>
<td><?= $regkey['date_of_after_dispose'] ?></td>
<td><?= $regkey['amount'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>


</table>
</div>

<?php } } ?>

</div>

<div id="infodiv1">

<?php if(!empty($getTransaction)){ ?>
<div class="table-responsive">
<table class="table  table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Dispose Item Name</th>                  
<th>Date of dispose</th>
<th>After Disposal Date</th>                  
<th>Amount Received</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['dispose_item_name'] ?></td>
<td><?= $regkey['date_of_dispose'] ?></td>
<td><?= $regkey['date_of_after_dispose'] ?></td>
<td><?= $regkey['amount'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
</div>
<?php } else { ?>  <div class="center-fs-20"><b>No Record Added...!!</b></div> <?php } ?>
<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<?php    if (!$getTransaction) { ?>   
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



<?php  require('footer.php'); ?>

<script>
document.getElementById('btnAddDispose').addEventListener('click', function(event) {
const dateInput = document.getElementById('date_of_dispose').value;
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

<script>
document.getElementById('btnAddDispose').addEventListener('click', function(event) {
const dateInput = document.getElementById('date_of_after_dispose').value;
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
