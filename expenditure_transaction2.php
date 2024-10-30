<?php require('header.php');
$getExplAbel=$db->expenditureLabel($db, $db->con);

if (isset($_POST['btnSaveSample1'])) 
{
header("location:stock_position_transaction.php");exit;
}

if (isset($_POST['btnSaveSample'])) 
{

$expenditure_label_id=$_POST['expenditure_label_id'];
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$amount=$_POST['amount'];
$remark=$_POST['remark'];
$enter_date=$_SESSION['enter_date'];
$publish_date=date("Y-m-d H:i:s");
$done="";

if (is_array($expenditure_label_id)) {
for ($i = 0; $i < count($expenditure_label_id); $i++) {

$str="INSERT INTO `expenditure_transaction`( `expenditure_label_id`, `amount`, `remark`, `month`, `year`, `publish_date`,  `user_id`, `enter_date`) VALUES (:expenditure_label_id, :amount, :remark, :month, :year, :publish_date, :user_id, :enter_date)";

$valarray=array(
'expenditure_label_id'=>$expenditure_label_id[$i],
'amount'=>$amount[$i],
'remark'=>$remark[$i],  
'month'=>$month, 
'year'=>$year, 
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date      
);


$add = $db->setData($db->con, $str, $valarray);

if (!$add) {
echo "Error inserting row $i";
}
}
} else {
$str="INSERT INTO `expenditure_transaction`( `expenditure_label_id`, `amount`, `remark`, `month`, `year`, `publish_date`,  `user_id`, `enter_date`) VALUES (:expenditure_label_id, :amount, :remark, :month, :year, :publish_date, :user_id, :enter_date)";

$valarray=array(
'expenditure_label_id'=>$expenditure_label_id,
'amount'=>$amount,
'remark'=>$remark,  
'month'=>$month, 
'year'=>$year, 
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date          
);


$add = $db->setData($db->con, $str, $valarray);

if (!$add) {
echo "Error inserting row $i";

}
if($add)
{
$done=1;
}
$i++;


}


if($done==1)
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
$_SESSION['success']="Expenditure Data Added";    
header("location:stock_position_transaction.php");exit;
}
else
{

$_SESSION['error']="Expenditure Data Not Added";
header("location:expenditure_transaction2.php");exit;
}

}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}

$getexpenditureTransaction=$db->getCurrentExpenditureTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);



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
<h4 class="fs-18 fw-semibold m-0">Expenditure Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Expenditure</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-3">Expenditure for <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month ..?</div>
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
<div class="alert alert-danger" id="card-box">
<strong>Fail!</strong> <?php echo $_SESSION['error']; ?>.
</div>
<?php
} 

unset($_SESSION['error']);
?>


<div> 

<?php if(!$getexpenditureTransaction){ ?>

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<div class="table-responsive">
<table class="table table-traffic table-bordered" id="activityTable">

<thead>
<tr>
<th>Particular Name</th>
<th>Amount</th>
<th>Remark</th>
<th><button type="button" class="btn btn-success addRowBtn" style="padding: 0.2rem;"><i data-feather="plus"></i></button></th>                               
</tr>
</thead>
<tbody>

<tr>
<td>

<select class="form-control" name="expenditure_label_id[]" required>
<option value="">Select Expenditure Label Name</option>
<?php if($getExplAbel) { foreach ($getExplAbel as $key): ?>
<option value="<?=$key['expenditure_label_id']?>"> <?=$key['expenditure_label_name']?> </option>
<?php endforeach; } ?>
</select>

</td>
<td>
<input class="form-control" type="number" name="amount[]" placeholder="Enter Amuont" required>
</td>
<td>
<input type="text" class="form-control"  name="remark[]">
</td>
<td>

<button type="button" class="btn btn-danger removeRowBtn" style="padding: 0.2rem;"><i data-feather="trash-2"></i></button>

</td>
</tr>
</tbody>
</table>
</div>

</form>

<?php } else{  ?>
<div class="table-responsive">
<table class="table table-traffic table-bordered " id="activityTable">
<thead>
<tr>
<th>Sr No</th>
<th>Particular Name</th>
<th>Amount</th>
<th>Remark</th>                     
</tr>
</thead>
<tbody>

<?php $i=1; foreach ($getexpenditureTransaction as $regkey): ?>
<tr>

<td><?=$i?></td>
<td>
<?=$regkey['expenditure_label_name']?>
</td>
<td>
<?=$regkey['amount']?>
</td>
<td>
<?=$regkey['remark']?>

</td>

</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
</div>

<?php }  ?>

</div>

<div>
<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<?php    if (!$getexpenditureTransaction) { ?>   
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
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
const table = document.querySelector('#activityTable tbody');
document.querySelector('#activityTable').addEventListener('click', function(e) {
if (e.target && e.target.classList.contains('addRowBtn')) {
let newRow = table.rows[0].cloneNode(true);
const inputs = newRow.querySelectorAll('input, select');
inputs.forEach(input => {
if (input.tagName.toLowerCase() === 'input') {
input.value = ''; 
} else if (input.tagName.toLowerCase() === 'select') {
input.selectedIndex = 0; 
}
});
table.appendChild(newRow);
} else if (e.target && e.target.classList.contains('removeRowBtn')) {
let row = e.target.closest('tr');
if (row) {
row.parentNode.removeChild(row);
}
}
});
});
</script>

<?php  require('footer.php'); ?>

