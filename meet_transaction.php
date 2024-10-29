<?php  require('header.php'); 

$getMeetList=$db->getAssoc($db->con, "SELECT `meet_id`, `meet_name` FROM `meet` WHERE `is_active`=:is_active", array('is_active'=>'Y'));


if (isset($_POST['btnAddMeetTransaction'])) 
{
$meet_id=$_POST['meet_id'];
$meet_date=$_POST['meet_date'];
$place=trim($_POST['place']);
$participant=$_POST['participant'];
$remark=trim($_POST['remark']);
$description=trim($_POST['description']);
$publish_date=date("Y-m-d H:i:s");
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];

$str="INSERT INTO `meet_transaction`( `meet_id`, `meet_date`, `place`, `participant`, `remark`, `description`, `publish_date`, `month`, `year`, `user_id`, enter_date) VALUES (:meet_id, :meet_date, :place, :participant, :remark, :description, :publish_date, :month, :year, :user_id, :enter_date )";
$valarray= array(
'meet_id'=>$meet_id,
'meet_date'=>$meet_date,
'place'=>$place,
'participant'=>$participant,
'remark'=>$remark,
'description'=>$description,
'publish_date'=>$publish_date,
'month'=>$month,
'year'=>$year,
'user_id'=>$user_id,
'enter_date'=>$enter_date
);

$add=$db->setData($db->con, $str, $valarray);

if($add)
{

$_SESSION['success']="Data Added";    
header("location:meet_transaction.php");exit;
}
else
{

$_SESSION['error']="Data Not Added";
header("location:meet_transaction.php");exit;
}

}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}

$getMeetTransaction=$db->getCurrentMeetTransactionList($db, $db->con, $user_id,$_SESSION['month'], $_SESSION['year']);


if (isset($_POST['btnSaveSample'])) 
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
header("location:add_sme_details.php");exit;
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
<h4 class="fs-18 fw-semibold m-0">Meet Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>Meet</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Whether User Meet/Foreign Meet/Seminar/Fairs conducted month  <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>

<?php if(!$getMeetTransaction) {?>

<div class="form-check mt-2">
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifyes" value="Y"><div style="width: 50px;">Yes</div>
</label>
<label class="form-check-label col-md-5">
<input class="form-check-input" onclick="checkme('add_sme_details')" type="radio" name="ssc_status" id="ifno" value="N" checked>No
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
<?php if(!$getMeetTransaction) {?>
<?php if(empty($getMeetTransaction)){ ?>
<div id="infodiv" style="display: none;"> 

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >


<div class="form-group row py-2">
<label  class=" control-label col-md-3">Meet<span style="color:red">*</span></label>
<div class="col-md-8">
<select class="form-control "  name="meet_id" required>
<option value="">Select Meet</option>
<?php if($getMeetList){ foreach ($getMeetList as $key): ?>
<option value= "<?=$key['meet_id']?>"> <?=$key['meet_name']?> </option>
<?php endforeach;} ?>
</select>

</div>

</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Description</label>
<div class="col-md-8">
<textarea class="form-control" name="description" rows="3"></textarea>
</div>
</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Date</label>
<div class="col-md-8">
<input class="form-control" type="date"  name="meet_date" placeholder="Choose Date" required id="meet_date">
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Place<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="text"  name="place" placeholder="Enter Place" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Participants</label>
<div class="col-md-8">
<input class="form-control" type="number"  name="participant" placeholder="Enter No of Participants" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Remark</label>
<div class="col-md-8">
<input class="form-control" type="text"  name="remark" placeholder="Enter Remark" >
</div>
</div>


<div class="form-group row py-1">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddMeetTransaction" type="submit" id="btnAddMeetTransaction"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Details</button>
</div>
</div>              

</form>
</div>

<?php } } ?>

</div>

<div id="infodiv1">

<?php if(!empty($getMeetTransaction)){ ?>
<div class="table-responsive">
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
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getMeetTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['meet_name'] ?></td>
<td><?= $regkey['description'] ?></td>
<td><?= $regkey['meet_date'] ?></td>
<td><?= $regkey['place'] ?></td>
<td><?= $regkey['participant'] ?></td>
<td><?= $regkey['remark'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
</div>
<?php } else { ?>  <div class="center-fs-20"><b>No Record Added...!!</b></div> <?php } ?>
<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<?php    if (!$getMeetTransaction) { ?>   
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
document.getElementById('btnAddMeetTransaction').addEventListener('click', function(event) {
const dateInput = document.getElementById('meet_date').value;
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
