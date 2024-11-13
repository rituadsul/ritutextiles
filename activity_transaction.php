  <?php  require('header.php'); 


  $getActivityList=$db->activityList($db, $db->con);


  $getActivityTransactionList=$db->getAssoc($db->con, "SELECT `activity_id`, `name_of_units`, `date_of_commencement`, `date_of_completion`, `remark`, `amount`, `month`, `year`, `publish_date`, `user_id`, `enter_date`,`organisation_name` FROM `activity_transaction`  WHERE `is_active`=:is_active", array('is_active'=>'Y'));

  // print_r($getActivityTransactionList);die();


  if(isset($_POST['btnAddActivity']))
  {

  // print_r($_POST);die();

  $activity_id=$_POST['activity_id'];
  $name_of_units=$_POST['name_of_units'];
  $organisation_name=$_POST['organisation_name'];
  $date_of_commencement=$_POST['date_of_commencement'];
  $date_of_completion=$_POST['date_of_completion'];
  $training_program=$_POST['training_program'];
  $amount=$_POST['amount'];
  $gst_amount=$_POST['gst_amount'];
  $publish_date=date("Y-m-d H:i:s");
  $month=$_SESSION['month'];
  $year=$_SESSION['year'];
  $enter_date=$_SESSION['enter_date'];


  if (is_array($activity_id)) {
  for ($i = 0; $i < count($activity_id); $i++) {
  $str = "INSERT INTO `activity_transaction`
  (`activity_id`, `name_of_units`, `date_of_commencement`, `date_of_completion`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `user_id`, `enter_date`, `organisation_name`,`training_program`)
  VALUES
  (:activity_id, :name_of_units, :date_of_commencement, :date_of_completion, :amount, :gst_amount, :month, :year, :publish_date, :user_id, :enter_date, :organisation_name,:training_program)";

  $valarray = array(
  'activity_id' => $activity_id[$i],
  'name_of_units' => $name_of_units[$i],
  'organisation_name' => $organisation_name[$i],
  'date_of_commencement' => $date_of_commencement[$i],
  'date_of_completion' => $date_of_completion[$i],
  'amount' => $amount[$i],
  'gst_amount' => $gst_amount[$i],
  'training_program'=>$training_program[$i],
  'month' => $month,
  'year' => $year,
  'publish_date' => $publish_date,
  'user_id' => $user_id,
  'enter_date' => $enter_date
  );

  $add = $db->setData($db->con, $str, $valarray);

  if (!$add) {
  echo "Error inserting row $i";
  }
  }
  } else {
  $str = "INSERT INTO `activity_transaction`
  (`activity_id`, `name_of_units`, `date_of_commencement`, `date_of_completion`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `user_id`, `enter_date`, `organisation_name`,`training_program`)
  VALUES
  (:activity_id, :name_of_units, :date_of_commencement, :date_of_completion, :amount, :gst_amount, :month, :year, :publish_date, :user_id, :enter_date, :organisation_name, :training_program)";

  $valarray = array(
  'activity_id' => $activity_id,
  'name_of_units' => $name_of_units,
  'organisation_name' => $organisation_name,
  'date_of_commencement' => $date_of_commencement,
  'date_of_completion' => $date_of_completion,
  'amount' => $amount,
  'training_program'=>$training_program,
  'gst_amount' => $gst_amount,
  'month' => $month,
  'year' => $year,
  'publish_date' => $publish_date,
  'user_id' => $user_id,
  'enter_date' => $enter_date
  );


  $add = $db->setData($db->con, $str, $valarray);

  if (!$add) {
  echo "Error inserting single row";
  }
  }

  if($add)
  {

  $_SESSION['success']="Data Added";    
  header("location:meet_transaction.php");exit;
  }
  else
  {

  $_SESSION['error']="Data Not Added";
  header("location:activity_transaction.php");exit;
  }

  }elseif(isset($_POST['btntest'])){
  // echo "htrytry";die();
  $enter_date = $_POST['enter_date'];
  // print_r($enter_date);die();
  $_SESSION['month']=date("m", strtotime($enter_date));
  $_SESSION['year']=date("Y", strtotime($enter_date));
  $_SESSION['enter_date']=$enter_date;
  }else{
  }

  $getActivityTransaction=$db->getCurrentActivityTransactionList($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']);



  if (isset($_POST['btnSaveSample'])) 
  {
  $db->addPageHistory($db, $db->con, $user_id, $page, $enter_date);
  header("location:meet_transaction.php");exit;
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
  <h4 class="fs-18 fw-semibold m-0">Activity Transaction</h4>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12 col-xl-12">
  <div class="card">
  <div class="card-body">
  <div class="d-flex align-items-center">
  <div class="fs-15 mb-1" style="color:#537AEF"><b>Activity</b></div>
  </div>

  <div>
  <div class="fs-14 mb-1 mt-3">Whether Consultancy On Setting Up Of New Laboratories And Implementation Of Quality Systems For Accreditation Of In-house Laboratories Of The Industry for <b><?=sprintf("%02d", $_SESSION['month'])."-".$_SESSION['year']?></b> month ..?</div>

  <?php if(!$getActivityTransaction) {?>
  <div class="form-check">
  <label class="form-check-label col-md-5">
  <input class="form-check-input" onclick="checkme()" type="radio" name="ssc_status" id="ifyes" value="Y"><div style="width: 50px;">Yes</div>
  </label>
  <label class="form-check-label col-md-5">
  <input class="form-check-input" onclick="checkme('meet_transaction')" type="radio" name="ssc_status" id="ifno" value="N" checked>No
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


  <div id="infodiv" style="display: none;"> 

  <?php if(!$getActivityTransaction){ ?>

  <form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
  <div class="table-responsive">
  <table class="table table-traffic table-bordered" id="activityTable">

  <thead>
  <tr>
  <th>Organization Name</th>
  <th>Name of Units</th>
  <th>Activity</th>
  <th>Date of Commencement</th>
  <th>Date of Completion</th>
  <th>Training Program</th>
  <th>Consultancy Charges (Rs.)</th>
  <th>GST (18%)</th>
  <th><button type="button" class="btn btn-success addRowBtn" style="padding: 0.2rem;"><i data-feather="plus" style="width:21"></i></button></th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>
  <input class="form-control" type="text" name="organisation_name[]" placeholder="Enter Organization Name" required>
  </td>
  <td>
  <input class="form-control" type="text" name="name_of_units[]" placeholder="Enter Name of Consultancy" required>
  </td>
  <td>
  <select class="form-control" name="activity_id[]" required>
  <option value="">Select Activity</option>
  <?php if($getActivityList) { foreach ($getActivityList as $key): ?>
  <option value="<?=$key['activity_id']?>"> <?=$key['activity_name']?> </option>
  <?php endforeach; } ?>
  </select>
  </td>
  <td>
  <input class="form-control" type="date" name="date_of_commencement[]" placeholder="Enter Date of Commencement" required id="date_of_commencement">
  </td>
  <td>
  <input class="form-control" type="date" name="date_of_completion[]" placeholder="Enter Date of Completion" required id="date_of_completion">
  </td>
  <td>
  <select class="form-control" name="training_program[]" required>
  <option value="">Select Training Program</option>
  <option value="Textile Testing">Textile Testing</option>
  <option value="LAB QMS Awareness">LAB QMS Awareness</option>
  <option value="Internal Merit">Internal Merit</option>
  </select>
  </td>

  <td>
  <input class="form-control amount" type="text" name="amount[]" id="amount" placeholder="Enter Amount" required>
  </td>
  <td>
  <input class="form-control gst_amount" type="text" name="gst_amount[]" placeholder="GST" readonly>
  </td>
  <td>

  <button type="button" class="btn btn-danger removeRowBtn" style="padding: 0.2rem;"><i data-feather="trash-2" style="width: 20;"></i></button>

  </td>
  </tr>
  </tbody>
  </table>

  <div class="form-group row py-2">                 
<div class="col-md-8">
<button class="btn btn-primary" name="btnAddActivity" type="submit" id="btnAddActivity"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Activity Details</button>
</div>
</div>              

  </div>

  </form>

  <?php } else{  ?>
  <div class="table-responsive">
  <table class="table table-traffic table-bordered " >

  <thead>
  <tr>
  <th>Sr No</th>
  <th>Organisation Name</th>
  <th>Activity Name</th>
  <th>Name of Units</th>
  <th>Date of commencement</th>
  <th>Expected date of completion</th>
  <th>Training Program</th>
  <th>Amount Received</th>

  </tr>
  </thead>
  <tbody>
  <?php 

  $i=1; foreach ($getActivityTransaction as $regkey):

  $getActivity=$db->getactivitybytraining($db, $db->con,$regkey['activity_id']);


  ?>
  <tr>                 
  <td><?=$i?></td>
  <td><?= $regkey['organisation_name'] ?></td>
  <td>
  <?php 
  if (isset($getActivity) && is_array($getActivity) && isset($getActivity[0]['activity_name'])) {
  echo $getActivity[0]['activity_name'];
  } else {
  echo "";
  }
  ?>
  </td>

  <td><?= $regkey['name_of_units'] ?></td>
  <td><?= $regkey['date_of_commencement'] ?></td>
  <td><?= $regkey['date_of_completion'] ?></td>
  <td><?= $regkey['training_program'] ?></td>
  <td><?= $regkey['amount'] ?></td>
  </tr>

  <?php $i++; endforeach; ?>
  </tbody>

  </table>
  </div>

  <?php }  ?>

  </div>

  <div id="infodiv1">

  <?php if($getActivityTransaction){ ?>
  <div class="table-responsive">
  <table class="table  table-traffic table-bordered " >
  <thead>
  <tr>
  <th>Sr No</th>
  <th>Organisation Name</th>
  <th>Activity Name</th>
  <th>Name of Units</th>
  <th>Date of commencement</th>
  <th>Expected date of completion</th>
  <th>Training Program</th>
  <th>Amount Received</th>

  </tr>
  </thead>
  <tbody>
  <?php 

  $i=1; foreach ($getActivityTransaction as $regkey):

  $getActivity=$db->getactivitybytraining($db, $db->con,$regkey['activity_id']);


  ?>
  <tr>                 
  <td><?=$i?></td>
  <td><?= $regkey['organisation_name'] ?></td>
  <td>
  <?php 
  if (isset($getActivity) && is_array($getActivity) && isset($getActivity[0]['activity_name'])) {
  echo $getActivity[0]['activity_name'];
  } else {
  echo "";
  }
  ?>
  </td>

  <td><?= $regkey['name_of_units'] ?></td>
  <td><?= $regkey['date_of_commencement'] ?></td>
  <td><?= $regkey['date_of_completion'] ?></td>
  <td><?= $regkey['training_program'] ?></td>
  <td><?= $regkey['amount'] ?></td>
  </tr>

  <?php $i++; endforeach; ?>
  </tbody>

  </table>
  </div>
  <?php } else { ?>  <div class="center-fs-20"><b>No Record Added...!!</b></div> <?php } ?>
  <form  class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
  <?php    if (!$getActivityTransaction) { ?>   
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

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('btnAddActivity').addEventListener('click', function(event) {
      const dateInput = document.getElementById('date_of_completion').value;
      const datePattern = /^\d{4}-\d{2}-\d{2}$/;

      if (!dateInput.match(datePattern) || !isValidDate(dateInput)) {
        event.preventDefault();
        alert('Please enter a valid date in the format YYYY-MM-DD.');
      }
    });

 
    document.getElementById('btnAddActivity').addEventListener('click', function(event) {
      const dateInput = document.getElementById('date_of_commencement').value;
      const datePattern = /^\d{4}-\d{2}-\d{2}$/;

      if (!dateInput.match(datePattern) || !isValidDate(dateInput)) {
        event.preventDefault();
        alert('Please enter a valid date in the format YYYY-MM-DD.');
      }
    });

   
    document.getElementById("amount").addEventListener("blur", function() {
      var amount = parseFloat(this.value);

      if (!isNaN(amount)) {
        var gst = (18 / 100 * amount).toFixed(2);
        document.getElementById("gst_amount").value = gst;
      } else {
        document.getElementById("gst_amount").value = '';
      }
    });
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
  <script>
  document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('#activityTable').addEventListener('click', function(e) {
  if (e.target && e.target.classList.contains('addRowBtn')) {
  let table = document.querySelector('#activityTable tbody');
  let newRow = table.rows[0].cloneNode(true); // Clone the first row

  let inputs = newRow.querySelectorAll('input');
  inputs.forEach(input => {
  input.value = '';
  if (input.classList.contains('gst_amount')) {
  input.value = '';
  }
  });

  table.appendChild(newRow);
  }
  });

  document.querySelector('#activityTable').addEventListener('click', function(e) {
  if (e.target && e.target.classList.contains('removeRowBtn')) {
  let row = e.target.closest('tr'); 
  row.parentNode.removeChild(row);
  }
  });


  document.querySelector('#activityTable').addEventListener('input', function(e) {
  if (e.target && e.target.classList.contains('amount')) {
  let row = e.target.closest('tr');
  let amount = parseFloat(e.target.value) || 0;
  let gstField = row.querySelector('.gst_amount');
  gstField.value = (amount * 0.18).toFixed(2); 
  }
  });
  });
  </script>


