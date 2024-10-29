<?php  require('header.php'); 

$getEquipmenTlist=$db->equipment_transaction_List($db, $db->con, $user_id);


if (isset($_POST['btnAddEquipment'])) 
{

$equipment_id=$_POST['equipment_id'];    
$problem=$_POST['problem'];
$action=$_POST['action'];   
$remark=$_POST['remark'];   
$publish_date=date("Y-m-d H:i:s");
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];


$str="INSERT INTO `equipment_nonworking`( `equipment_id`,  `problem`, `action`,  `month`, `year`, `publish_date`, `user_id`, enter_date) VALUES (:equipment_id, :problem, :action,   :month, :year, :publish_date, :user_id , :enter_date)";
$valarray= array(
'equipment_id'=>$equipment_id,
'problem'=>$problem,
'action'=>$action,                    
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
header("location:equipment_not_working.php");exit;
}
else
{

$_SESSION['error']="Data Not Added";
header("location:equipment_not_working.php");exit;
}

}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}


$getTransaction=$db->getCurrentNonWorkingEquipment($db, $db->con, $user_id, $_SESSION['month'], $_SESSION
['year']);


if (isset($_POST['btnSaveSample'])) 
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
header("location:enrollment_new_customer.php");exit;
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
<h4 class="fs-18 fw-semibold m-0">Equipment Not Working</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Equipment Not Working</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Whether Equipment Not Working month <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b></div>

<?php if(!$getTransaction) {?>

<div class="form-check mt-2">
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifyes" value="Y"><div style="width: 50px;">Yes</div>
</label>
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme('enrollment_new_customer')" type="radio" name="ssc_status" id="ifno" value="N" checked>No
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
<label  class=" control-label col-md-3">Name of Equipment<span style="color:red">*</span></label>
<div class="col-md-8">
<select class="form-control "  name="equipment_id" required>
<option value="">Select Equipment</option>
<?php if($getEquipmenTlist){ foreach ($getEquipmenTlist as $key): ?>
<option value= "<?=$key['equipment_transaction_id']?>"> <?=$key['equipment_name']?> </option>
<?php endforeach;} ?>
</select>                      
</div>     

</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Nature of Problem<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="text"  name="problem" placeholder="Enter Problem" required>
</div>
</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Action<span style="color:red">*</span></label>
<div class="col-md-8">
<textarea class="form-control" name="action" rows="5" placeholder="Enter Action Taken" required></textarea>                    
</div>
</div>



<div class="form-group row py-3">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddEquipment" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Details</button>
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
<th>Equipment </th>                  
<th>Problem</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['equipment_name'] ?></td>
<td><?= $regkey['problem'] ?></td>
<td><?= $regkey['action'] ?></td>
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