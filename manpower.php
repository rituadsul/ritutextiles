<?php  require('header.php'); 

if(isset($_GET['JVDMS']))
{
$clearManpower=$db->clearManpower($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);

if($clearManpower){
$_SESSION['success']="Old Data Cleared... Enter information again";
header("location:manpower.php");exit;
}
else{
echo "alert('Error Occured..!!');";
header("location:ro_report.php");
}

}


if(isset($_POST['btnAddManpower']))
{

$designation_id=trim($_POST['designation_id']);
$from_lab=trim($_POST['from_lab']);
$from_other=trim($_POST['from_other']);
$publish_date=date("Y-m-d H:i:s");
$month=$_SESSION['month'];
$year=$_SESSION['year'];


$sqlstr="INSERT INTO `manpower_available`( `designation_id`, `from_lab`, `from_other`, `month`, `year`, `user_id`, `publish_date`) VALUES (:designation_id, :from_lab,:from_other,:month, :year, :user_id, :publish_date )";

$addLabel=$db->setData(
$db->con,
$sqlstr, 
array(
'designation_id'=>$designation_id,
'from_lab'=>$from_lab,
'from_other'=>$from_other,
'month'=>$month,
'year'=>$year,
'user_id'=>$user_id,
'publish_date'=>$publish_date

));

if($addLabel)
{

$_SESSION['success']=" Added";
header("location:manpower.php");exit;
}
else{

$_SESSION['error']=" Not Added";
header("location:manpower.php");exit;
}
}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}

if (isset($_POST['btnSaveSubmit'])) 
{

	// print_r($_POST);die();
$technical_manpower = $_POST['technical_manpower'];
$working_day = $_POST['working_day'];
$extra_man_day = $_POST['extra_man_day'];
$addtional_working = $_POST['addtional_working'];
$total_a = $_POST['total_a'];
$special_work = $_POST['special_work'];
$deputation = $_POST['deputation'];
$leave_day = $_POST['leave_day'];
$total_b = $_POST['total_b'];
$total_c = $_POST['total_c'];
$total_s = $_POST['total_s'];
$average_op = $_POST['average_op'];
$total_p = $_POST['total_p'];
$average_pm = $_POST['average_pm'];
$month = $_SESSION['month'];
$year = $_SESSION['year'];
$publish_date = date("Y-m-d H:i:s");
$enter_date = $_SESSION['enter_date'];


$str="INSERT INTO `manpower_transaction`( `technical_manpower`, `working_day`, `extra_man_day`, `addtional_working`, `total_a`, `special_work`, `deputation`, `leave_day`, `total_b`, `total_c`, `total_s`, `average_op`, `total_p`, `average_pm`, `month`, `year`, `publish_date`, `user_id`, enter_date) VALUES (:technical_manpower, :working_day,:extra_man_day,:addtional_working, :total_a, :special_work, :deputation, :leave_day, :total_b, :total_c, :total_s, :average_op, :total_p, :average_pm, :month,:year, :publish_date, :user_id, :enter_date )";

$valarray=array(
'technical_manpower'=>$technical_manpower,
'working_day'=>$working_day,
'extra_man_day'=>$extra_man_day,
'addtional_working'=>$addtional_working,
'total_a'=>$total_a,
'special_work'=>$special_work,
'deputation'=>$deputation,
'leave_day'=>$leave_day,
'total_b'=>$total_b,
'total_c'=>$total_c,
'total_s'=>$total_s,
'average_op'=>$average_op,
'total_p'=>$total_p,
'average_pm'=>$average_pm,
'month'=>$month,
'year'=>$year,
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date
);
 // print_r($str);print_r($valarray);die();
$add=$db->setData($db->con, $str, $valarray);

if($add)
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
$_SESSION['success']="Data Saved Successfully..";    
header("location:ro_report.php");exit;
}
else
{
    // $errorInfo = $db->con->errorInfo();
    // echo "Error: " . $errorInfo[2];
    // die();
 $_SESSION['error']="Data Not Saved...!!";
 header("location:manpower.php");exit;
}



}




$manpowerUtilisation=$db->getCurrentManpowerUtilisation($db, $db->con, $user_id,$_SESSION['month'],$_SESSION['year']);


$getDesignationList=$db->designationList($db, $db->con);

$getTransaction=$db->getCurrentDesignationList($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);




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
<h4 class="fs-18 fw-semibold m-0"> Manpower Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b> Manpower Utilisation</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Add Manpower For the month of   <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>
<div class="py-3">

<form class="form-horizontal" method="post">
<input class="form-control" style="display: none" type="hidden"  name="user_id" id="user_id" value="<?=$user_id ?>">


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
<?php if(empty($getTransaction)){ ?>
<div> 

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >


<div class="form-group row py-2">
<label  class=" control-label col-md-3">Designation<span style="color:red">*</span></label>
<div class="col-md-8">
<select class="form-control "  name="designation_id" required>
<option value="">Select Designation</option>
<?php if($getDesignationList){ foreach ($getDesignationList as $key): ?>
<option value= "<?=$key['designation_id']?>"> <?=$key['designation_name']?> </option>
<?php endforeach;} ?>
</select>                      
</div>    
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">From Laboratory<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="number"  name="from_lab" id="from_lab" placeholder="Enter Manpower From Laboratory" required>
</div>
</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">From Other Section<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="number"  name="from_other" id="from_other" placeholder="Enter Manpower From Other Section" required>
</div>
</div>

<div class="form-group row py-1">
<label class="control-label col-md-3">Total<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="text"  name="total" id="total" placeholder="Automatic calculate" disabled>
</div>
</div>                

<div class="form-group row py-3">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddManpower" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Manpower</button>
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
<th>Designation Name</th>
<th>From Laboratory</th>
<th>From Other</th>
<th>Total</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?= $i ?></td>
<td><?= $regkey['designation_name'] ?></td>
<td><?= $regkey['from_lab'] ?></td>
<td><?= $regkey['from_other'] ?></td>
<td><?= $regkey['total'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>
</table>
</div>

<?php } ?>


<?php if(empty($manpowerUtilisation)) {?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<div class="table-responsive" >
<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Titles</th>
<th>Details</th>
</tr>
</thead>
<tbody>
<tr>
    <td colspan="3" style="font-weight: bold;">Actual Mandays</td>
</tr>
<tr>
    <td>1</td>
    <td>Number of Technical QAO/JQAO/Fellow</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="technical_manpower" id="technical_manpower" value="<?=$db->getCurrentCount($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year'])?>" disabled>
    </td>
</tr>
<tr>
    <td>2</td>
    <td>Number of working days</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="working_day" id="working_day" required>
    </td>
</tr>
<tr>
    <td>3</td>
    <td>Extra man days (on tour from other RO/Other section of TC)</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="extra_man_day" id="extra_man_day" required>
    </td>
</tr>
<tr>
    <td>4</td>
    <td>Additional working mandays (Due to Saturdays/Sundays/holidays/extra hours)</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="addtional_working" id="addtional_working" required>
    </td>
</tr>
<tr>
    <td></td>
    <td>Total (A)</td>
    <td>
        <input type="text" class="form-control" name="total_a" id="total_a" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
<tr>
    <td colspan="3" style="font-weight: bold;">Loss of ManDays</td>
</tr>
<tr>
    <td>5</td>
    <td>Special Work</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="special_work" id="special_work" required>
    </td>
</tr>
<tr>
    <td>6</td>
    <td>Deputation of QAOs/JQAOs to other R.O./ Training/seminar/workshop etc.</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="deputation" id="deputation" required>
    </td>
</tr>
<tr>
    <td>7</td>
    <td>No. of days of leave</td>
    <td>
        <input type="number" step="0.01" pattern="[0-9]" min="0" class="form-control" name="leave_day" id="leave_day" required>
    </td>
</tr>
<tr>
    <td></td>
    <td>Total (B)</td>
    <td>
        <input type="text" class="form-control" name="total_b" id="total_b" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
<tr>
    <td colspan="2" style="font-weight: bold;">Total number of man days available for the routine testing (C)=(A-B)</td>
    <td>
        <input type="text" class="form-control" name="total_c" id="total_c_hidden" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
<tr>
    <td>8</td>
    <td>Total Number of samples reported (S)</td>
    <td>
        <input type="text" class="form-control" value="<?=$db->getCurrentSampleCount($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']) ?>" name="total_s" id="total_s" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
<tr>
    <td>9</td>
    <td>Average output / manday (S)/(C)</td>
    <td>
        <input type="text" class="form-control" name="average_op" id="average_op" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
<tr>
    <td>10</td>
    <td>Total No. of parameters (P)</td>
    <td>
        <input type="text" class="form-control" value="<?=$db->getCurrentEquipment($db, $db->con, $user_id, $month, $year) ?>" name="total_p" id="total_p" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
<tr>
    <td>11</td>
    <td>Average parameters per mandays (P)/(C)</td>
    <td>
        <input type="text" class="form-control" name="average_pm" id="average_pm" style="background-color: var(--bs-tertiary-bg)" readonly required>
    </td>
</tr>
</tbody>

</table>

<div class="form-group row py-3">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnSaveSubmit" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Save & Submit</button>
</div>
</div>
</div>
</form>
<?php } else { ?>
<div class="table-responsive">
<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Titles</th>
<th>Details</th>
</tr>
</thead>
<tbody>
<tr>

<td colspan="3" style="font-weight: bold;" >Actual Mandays</td>

</tr>
<tr>
<td>1</td>
<td>Number of Technical QAO/JQAO/Fellow</td>
<td>
<?=$manpowerUtilisation[0]['technical_manpower']?>                       
</td>

</tr>

<tr>
<td>2</td>
<td>Number of working day</td>
<td>
<?=$manpowerUtilisation[0]['working_day']?>                          
</td>
</tr>

<tr>
<td>3</td>
<td>Extra man days (on tour from other RO/Other section of TC)</td>
<td>
<?=$manpowerUtilisation[0]['extra_man_day']?>                         
</td>
</tr>

<tr>
<td>4</td>
<td>Additional working mandays
(Due to Saturdays/Sundays/holidays/extra hours)
</td>
<td>
<?=$manpowerUtilisation[0]['addtional_working']?>                          
</td>
</tr>

<tr>
<td></td>
<td>Total (A)</td>
<td>
<?=$manpowerUtilisation[0]['total_a']?>                         
</td>
</tr>

<tr>

<td colspan="3" style="font-weight: bold;" >Loss of ManDays</td>

</tr>

<tr>
<td>5</td>
<td>Special Work</td>
<td>
<?=$manpowerUtilisation[0]['special_work']?>                         
</td>
</tr>

<tr>
<td>6</td>
<td>Deputation of QAOs/JQAOs to other R.O./ Training /seminar/ workshop etc.</td>
<td>
<?=$manpowerUtilisation[0]['deputation']?>                          
</td>
</tr>

<tr>
<td>7</td>
<td>No. of days of leave</td>
<td>
<?=$manpowerUtilisation[0]['leave_day']?>                       
</td>
</tr>

<tr>
<td></td>
<td>Total (B)</td>
<td>
<?=$manpowerUtilisation[0]['total_b']?>                         
</td>
</tr>
<tr>

<td colspan="2" style="font-weight: bold;">Total  number of man days available for the routine testing (C)=(A-B) </td>
<td>
<?=$manpowerUtilisation[0]['total_c']?>                       
</td>
</tr>

<tr>
<td>8</td>
<td>Total Number of samples reported (S)</td>
<td>
<?=$manpowerUtilisation[0]['total_s']?>                          
</td>
</tr>

<tr>
<td>9</td>
<td>Average output / manday (S)/(C)</td>
<td>
<?=$manpowerUtilisation[0]['average_op']?>                          
</td>
</tr>

<tr>
<td>10</td>
<td>Total No. of Parameter (P)</td>
<td>
<?=$manpowerUtilisation[0]['total_p']?>                         
</td>
</tr>

<tr>
<td>11</td>
<td>Average Parameter per mandays (P)/(C)</td>
<td>
<?=$manpowerUtilisation[0]['average_pm']?>                         
</td>
</tr>

</tbody>
</table>
</div>

<?php } ?>

</div>

<div>


<?php    if (!$manpowerUtilisation) { ?>   

<?php } else {?>  
<a class="btn btn-primary" name="btnSaveSample" type="button" href="ro_report.php">
<i class="fa fa-fw fa-lg fa-check-circle"></i>Next
</a><?php } ?>  
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

 <script src="assets/js/functions/manpower_calculation.js"></script> 
