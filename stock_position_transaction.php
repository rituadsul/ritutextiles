<?php  require('header.php'); 

$getLabelList=$db->stockLabel($db, $db->con);

if (isset($_POST['btnAddStock'])) 
{

$stock_position_label_id=$_POST['stock_position_label_id'];    
$stock_position_adequate=$_POST['stock_position_adequate'];
$action=trim($_POST['action']);   
$publish_date=date("Y-m-d H:i:s");
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$enter_date=$_SESSION['enter_date'];


$str="INSERT INTO `stock_position_transaction`( `stock_position_label_id`,  `stock_position_adequate`, `action`,   `month`, `year`, `publish_date`, `user_id`, enter_date) VALUES (:stock_position_label_id, :stock_position_adequate, :action,  :month, :year, :publish_date, :user_id, :enter_date )";
$valarray= array(
'stock_position_label_id'=>$stock_position_label_id,
'stock_position_adequate'=>$stock_position_adequate,
'action'=>$action,                                         
'month'=>$month,
'year'=>$year,
'publish_date'=>$publish_date,
'user_id'=>$user_id,
'enter_date'=>$enter_date
);

// print_r($valarray);die();

$add=$db->setData($db->con, $str, $valarray);

if($add)
{
echo "Insert Successful.";
$_SESSION['success']="Data Added";    
header("location:stock_position_transaction.php");exit;
}
else
{
echo "Insert failed.";
$_SESSION['error']="Data Not Added";
header("location:stock_position_transaction.php");exit;
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
header("location:equipment_utilisation.php");exit;
}


$getTransaction=$db->getCurrentStockPosition($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);


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
<h4 class="fs-18 fw-semibold m-0"> Stock Position Transaction</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b> Stock Position</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Stock Position For  <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>
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
<?php if(empty($getTransaction)){ ?>
<div> 

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >


<div class="form-group row py-2">
<label  class=" control-label col-md-3">Items<span style="color:red">*</span></label>
<div class="col-md-8">
<select class="form-control "  name="stock_position_label_id" required>
<option value="">Select Items</option>
<?php if($getLabelList){ foreach ($getLabelList as $key): ?>
<option value= "<?=$key['stock_position_label_id']?>"> <?=$key['stock_position_label_name']?> </option>
<?php endforeach;} ?>
</select>

</div>
</div>

<div class="form-group row py-1">
<label  class=" control-label col-md-3">Adequate<span style="color:red">*</span></label>
<div class="col-md-8">
<select class="form-control"  name="stock_position_adequate" required>
<option value="">Select Adequate</option>                      
<option value= "Adequate">Adequate</option>
<option value= "Notadequate">Not Adequate</option>                       
</select>
(if not adequate , action taken to be specified)
</div>

</div>


<div class="form-group row py-1">
<label class="control-label col-md-3">Action</label>
<div class="col-md-8">
<textarea class="form-control" name="action" rows="5" placeholder="Enter Action"></textarea>

</div>
</div>                

<div class="form-group row py-3">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddStock" type="submit" id="btnAddStock"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Details</button>
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
<th>Stock Item</th>                  
<th>Adequate</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['stock_position_label_name'] ?></td>
<td><?= $regkey['stock_position_adequate'] ?></td>
<td><?= $regkey['action'] ?></td>
</tr>
<?php $i++; endforeach; ?>
</tbody>

</table>
</div>

<?php } ?>

</div>

<div>

<form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<?php    if (!$getTransaction) { ?>   

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
