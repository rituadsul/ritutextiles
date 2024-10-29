<?php  require('header.php'); 

if (isset($_POST['btnAddCustomer'])) 
{

$bulk_customer_name=$_POST['bulk_customer_name'];    
$sample_reported=$_POST['sample_reported'];   
$testing_charges=$_POST['testing_charges'];   
$remark=$_POST['remark'];   
$publish_date=date("Y-m-d H:i:s");
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];


$str="INSERT INTO `bulk_customer`( `bulk_customer_name`, `sample_reported`,  `testing_charges`, `remark`, `month`, `year`, `user_id`, `publish_date`, `enter_date`) VALUES (:bulk_customer_name,  :sample_reported,   :testing_charges, :remark,  :month, :year, :user_id, :publish_date,  :enter_date )";
$valarray= array(
'bulk_customer_name'=>$bulk_customer_name,
'sample_reported'=>$sample_reported,                          
'testing_charges'=>$testing_charges,                  
'remark'=>$remark,                 
'month'=>$month,
'year'=>$year,
'user_id'=>$user_id,
'publish_date'=>$publish_date,                      
'enter_date'=>$enter_date
);

$add=$db->setData($db->con, $str, $valarray);

if($add)
{
//$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
$_SESSION['success']="Data Added";    
header("location:bulk_customer.php");exit;
}
else
{

$_SESSION['error']="Data Not Added";
header("location:bulk_customer.php");exit;
}

}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}


$getTransaction=$db->getCurrentBulkCustomer($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);


if (isset($_POST['btnSaveSample'])) 
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
header("location:tatkal_customer.php");exit;
}


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
<h4 class="fs-18 fw-semibold m-0">Bulk Customer</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Bulk Customer</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Whether Bulk customer (Such as KVIC, etc) month <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b></div>

<?php if(!$getTransaction) {?>

<div class="form-check mt-2">
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifyes" value="Y"><div style="width: 50px;">Yes</div>
</label>
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme('tatkal_customer')" type="radio" name="ssc_status" id="ifno" value="N" checked>No
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
<label class="control-label col-md-3">Name of Bulk Customer<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="text"  name="bulk_customer_name" placeholder="Enter Name of Bulk Customer" required>
</div>
</div>
<div class="form-group row py-1">
<label class="control-label col-md-3">Sample Reported </label>
<div class="col-md-8">
<input class="form-control" type="number"  name="sample_reported" placeholder="Enter Sample Reported" required>
</div>
</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Testing charges of reported Sample</label>
<div class="col-md-8">
<input class="form-control" type="number"  name="testing_charges" placeholder="Enter Testing charges of reported Sample" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Remark </label>
<div class="col-md-8">
<input class="form-control" type="text"  name="remark" placeholder="Enter Remark" >
</div>
</div>



<div class="form-group row py-3">

<div class="col-md-8">
<button class="btn btn-primary" name="btnAddCustomer" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add  Details</button>
</div>
</div>              

</form>
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
<th>Name of Bulk Customer</th>
<th>Sample Reported</th>
<th>Testing charges</th>
<th>Remark </th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['bulk_customer_name'] ?></td>
<td><?= $regkey['sample_reported'] ?></td>
<td><?= $regkey['testing_charges'] ?></td>
<td><?= $regkey['remark'] ?></td>
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