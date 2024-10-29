<?php  require('header.php'); 

if (isset($_POST['btnAddEquipment'])) {

// if (isset($_SESSION['uploading']) && $_SESSION['uploading']) {
// echo "The file is already being processed.";
// exit();
// }
$_SESSION['uploading'] = true;

$publish_date = date("Y-m-d H:i:s");
$month = $_SESSION['month'];
$year = $_SESSION['year'];
$enter_date = $_SESSION['enter_date'];
$user_id = $_SESSION['user_id'];

if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] == 0) {

$filePath = $_FILES['upload_file']['tmp_name'];

// print_r($filePath);die();

if (($handle = fopen($filePath, 'r')) !== FALSE) {
fgetcsv($handle);

$query = "INSERT INTO equipment_transaction (equipment_name, parameter_name, test_performed, remark, month, year, publish_date, user_id, enter_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$sr_no = 1;

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
if (count($data) >= 4) {
$equipment_name = trim($data[1]);
$parameter_name = trim($data[2]);
$test_performed = trim($data[3]);
$remark = isset($data[4]) ? trim($data[4]) : '';

if (!is_numeric($test_performed)) {
echo "Skipping row $sr_no: 'Test Performed' must be a number.<br>";
$sr_no++;
continue;
}

$bind = [
$equipment_name,
$parameter_name,
$test_performed,
$remark,
$month,
$year,
$publish_date,
$user_id,
$enter_date
];

if (!$db->setData($db->con, $query, $bind)) {
echo "Error inserting row $sr_no.<br>";
}

$sr_no++;
}
}

fclose($handle);
echo "File uploaded and data inserted successfully!";
} else {
echo "Error opening the file.";
}
} else {
echo "Error uploading the file.";
}

unset($_SESSION['uploading']);

header("Location: equipment_utilisation.php");
exit();
}elseif(isset($_POST['btntest'])){
$enter_date = $_POST['enter_date'];
$_SESSION['month']=date("m", strtotime($enter_date));
$_SESSION['year']=date("Y", strtotime($enter_date));
$_SESSION['enter_date']=$enter_date;
}else{
}


$getTransaction=$db->getCurrentEquipmentTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);


if (isset($_POST['btnSaveSample'])) 
{
$db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
header("location:equipment_not_working.php");exit;
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
<h4 class="fs-18 fw-semibold m-0"> Equipment Utilisation</h4>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b> Equipment Utilisation</b></div>
</div>

<div>
<div class="fs-14 mb-1 mt-1">Equipment Utilisation <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month</div>
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

<form  class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >


<div class="form-group row py-2">
<label class="control-label col-md-3">Equipment File<span style="color:red">*</span></label>
<div class="col-md-8">
<input class="form-control" type="file" accept=".csv"  name="upload_file" required >
</div>

</div>

<div class="form-group row py-3">
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddEquipment" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Equipment</button>
</div>
</div>          

</form>
</div>

<?php }  ?>
 <?php if(!empty($getTransaction)){ ?>

<div class="table-responsive">
<table class="table table-traffic table-bordered " >
<thead>
<tr>
<th>Sr No</th>
<th>Equipment </th>                  
<th>Parameter</th>
<th>No. of Tests performed</th>
<th>Remark </th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($getTransaction as $regkey): ?>
<tr>                 
<td><?=$i?></td>
<td><?= $regkey['equipment_name'] ?></td>
<td><?= $regkey['parameter_name'] ?></td>
<td><?= $regkey['test_performed'] ?></td>
<td><?= $regkey['remark'] ?></td>
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

<?php }else { ?>  
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

  <script type="text/javascript">
  $(document).ready(function()
  {
    var user_id= <?php echo $_SESSION['user_id'];?>;
    console.log("I have "+user_id);
    $.ajax({
          url:"assets/js/ajax/ajax_checkEquipment.php",
          type:"post",
          dataType:"json",
          data:{user_id:user_id },
          success:function(result)
          {


            if(result==1){
             
            }
            else
            {
             
              alert("Kindly Add equipment list first, you could not upload file without adding your equipment list");
              window.location.replace("add_equipment.php");
            }
          }
        });

  });
</script>