  


<!-- Models All -->
<!--  Sample Model     -->

<!-- Sample Modal -->
<div class="modal fade" id="sampleModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="sample_transaction_id" id="sample_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Sample Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="sample_name" id="sample_name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Non-Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number"  name="qua_nonreg" id="qua_nonreg" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Non-Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="eco_nonreg" id="eco_nonreg" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="qua_reg" id="qua_reg" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="eco_reg" id="eco_reg" >
            </div>
          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateSample()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Revenue Modal -->
<div class="modal fade" id="revenueModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="revenue_transaction_id" id="revenue_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Revenue Label</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="revenue_label_name" id="revenue_label_name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Non-Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number"  name="rev_qua_nonreg" id="rev_qua_nonreg" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Non-Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="rev_eco_nonreg" id="rev_eco_nonreg" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Reg Quality</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="rev_qua_reg" id="rev_qua_reg" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Reg Eco</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="rev_eco_reg" id="rev_eco_reg" >
            </div>
          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateRevenue()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->


<!-- Training Modal -->
<div class="modal fade" id="trainingModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="training_program_id" id="training_program_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Organisation Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="organisation_name" id="organisation_name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-8">
              <input class="form-control" type="Date"  name="training_date" id="training_date" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">No Of Participants</label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="participant_no" id="participant_no" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Amount(Rs.) </label>
            <div class="col-md-8">
              <input class="form-control" type="number" name="amount" id="amount" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">GST Amount (Rs.)</label>
            <div class="col-md-8">
              *Enter GST Amount here.
              <input class="form-control" type="number" name="gst_amount" id="gst_amount" >
            </div>
          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateTraining()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Activity Modal -->
<div class="modal fade" id="activityModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="activity_transaction_id" id="activity_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Activity Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="activity_name" id="activity_name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Organisation Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="organisation_name" id="organisation_name1" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Name of units for which consultancy is organised</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="name_of_units" id="name_of_units" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Date of commencement of consultancy</label>
            <div class="col-md-8">
              <input class="form-control" type="date" name="date_of_commencement" id="date_of_commencement" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Expected date of completion of consultancy</label>
            <div class="col-md-8">
              <input class="form-control" type="date" name="date_of_completion" id="date_of_completion" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Activity Carried out in this month </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="remark" id="remark" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Training Program </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="training_program" id="training_program" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Amount(Rs.) </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="activity_amount" id="activity_amount" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">GST Amount (Rs.)</label>
            <div class="col-md-8">
              *Enter GST Amount here.
              <input class="form-control" type="text" name="activity_gst_amount" id="activity_gst_amount" >
            </div>
          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateActivity()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Meet Modal -->
<div class="modal fade" id="meetModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="meet_transaction_id" id="meet_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Meet</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="meet_name" id="meet_name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Description</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="description" id="description" >

            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-8">
              <input class="form-control" type="date"  name="meet_date" id="meet_date" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Place</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="place" id="place" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Participants</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="participant" id="participant" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="meet_remark" id="meet_remark" >
            </div>
          </div>               


        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateMeet()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Consultancy Modal -->
<div class="modal fade" id="consultancyModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="technical_consultancy_id" id="technical_consultancy_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Name of SME</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="name_of_sme" id="name_of_sme" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Type of consultancy</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="consultancy_type" id="consultancy_type" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Consultancy Charges (Rs.)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="consultancy_amount" id="consultancy_amount" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">GST (18%)</label>
            <div class="col-md-8">
              *Enter GST Amount here
              <input class="form-control" type="text" name="consultancy_gst_amount" id="consultancy_gst_amount" >
            </div>
          </div>

        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateConsultancy()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Dispose Modal -->
<div class="modal fade" id="disposeModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="dispose_item_transaction_id" id="dispose_item_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Dispose Item Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="dispose_item_name" id="dispose_item_name" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Date of dispose </label>
            <div class="col-md-8">
              <input class="form-control" type="date"  name="date_of_dispose" id="date_of_dispose" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">After Disposal Date </label>
            <div class="col-md-8">
              <input class="form-control" type="date" name="date_of_after_dispose" id="date_of_after_dispose" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Amount Received (Rs.)</label>
            <div class="col-md-8">

              <input class="form-control" type="text" name="dispose_amount" id="dispose_amount" >
            </div>
          </div>

        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateDispose()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Expenditure Modal -->
<div class="modal fade" id="expenditureModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="expenditure_transaction_id" id="expenditure_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Particular Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="expenditure_label_name" id="expenditure_label_name" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Amount (Rs.)</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="exp_amount" id="exp_amount" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="exp_remark" id="exp_remark" >
            </div>
          </div>



        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateExpediture()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Stock Position Modal -->
<div class="modal fade" id="stockpositionModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="stock_position_transaction_id" id="stock_position_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Stock Item </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="stock_position_label_name" id="stock_position_label_name" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Adequate/ NonAdequate</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="stock_position_adequate" id="stock_position_adequate" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Action </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="action" id="action" >
            </div>
          </div>



        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateStockPostion()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->





<!-- Equipment Modal -->
<div class="modal fade" id="equipmentModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="equipment_transaction_id" id="equipment_transaction_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Equipment </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="equipment_name" id="equipment_name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Parameter </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="parameter_name" id="parameter_name" >
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">No. of Tests performed  </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="test_performed" id="test_performed" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Remark </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="eqp_remark" id="eqp_remark" >
            </div>
          </div>

          <button class="btn btn-primary" name="btntest" type="submit" onclick="updateEquipment()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
          <br>
          <br>
          <hr>

          OR (Delete all records and upload fresh data)
          <br>
          <br>



        </form>

        <?php if (isset($_POST['btnAddEquipment'])) {


          if (isset($_SESSION['uploading']) && $_SESSION['uploading']) {
            echo "The file is already being processed.";
            exit();
          }
          $_SESSION['uploading'] = true;

          $publish_date = date("Y-m-d H:i:s");
          $month = $_SESSION['month'];
          $year = $_SESSION['year'];
          $enter_date = $_SESSION['enter_date'];
          $user_id = $_SESSION['user_id'];

          if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] == 0) {
            $filePath = $_FILES['upload_file']['tmp_name'];

            if (($handle = fopen($filePath, 'r')) !== FALSE) {
              fgetcsv($handle);

              $query1 = "DELETE FROM equipment_transaction WHERE month = ? AND year = ? AND user_id = ?";

              $bind1 = [$month, $year, $user_id];

              $db->setData($db->con, $query1, $bind1);

              $queryInsert = "INSERT INTO equipment_transaction (equipment_name, parameter_name, test_performed, remark, month, year, publish_date, user_id, enter_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $queryCheck = "SELECT COUNT(*) FROM equipment_transaction WHERE equipment_name = ? AND parameter_name = ? AND month = ? AND year = ?";
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

                  $bindCheck = [$equipment_name, $parameter_name, $month, $year];
                  $existingRecordCount = $db->getData($db->con, $queryCheck, $bindCheck);

                  if ($existingRecordCount > 0) {
                    echo "Row $sr_no: Oh no, the equipment already exists for this month and year.<br>";
                  } else {
                    $bindInsert = [
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

                    if (!$db->setData($db->con, $queryInsert, $bindInsert)) {
                      echo "Error inserting row $sr_no.<br>";
                    } else {
                      echo "Row $sr_no: Data inserted successfully.<br>";
                    }
                  }

                  $sr_no++;
                }
              }

              fclose($handle);

            } else {
              echo "Error opening the file.";
            }
          } else {
            echo "Error uploading the file.";
          }

          unset($_SESSION['uploading']);

          header("Location: ro_report.php");
          exit();
        }
        ?>

        <form  class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >

         <div class="form-group row">
          <label class="control-label col-md-3">Equipment File<span style="color:red">*</span></label>
          <div class="col-md-8">
            <input class="form-control" type="file" accept=".csv"  name="upload_file" required >
          </div>
        </div>


        <div class="form-group row">
          <div class="col-md-8">
            <button class="btn btn-primary" name="btnAddEquipment" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Equipment</button>
          </div>
        </div>              


      </form>

    </div>
    <div class="modal-footer">

      <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div> <!-- end of model div -->


<!-- Equipment Not Working Modal -->
<div class="modal fade" id="equipmentnotworkingModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="equipment_nonworking_id" id="equipment_nonworking_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Equipment </label>
            <div class="col-md-8">
          
             <select class="form-control" name="equipment_id" required id="equipment_id">

              <?php
              $getEquipmenTlist=$db->equipment_transaction_List($db, $db->con, $user_id);
            
?>
              <option value="">Select Equipment</option>
                <?php if($getEquipmenTlist) { foreach ($getEquipmenTlist as $key): ?>
                  <option value="<?=$key['equipment_transaction_id']?>"> <?=$key['equipment_name']?> </option>
                <?php endforeach; } ?>
            </select> 
          </div>
        </div>

        <div class="form-group row">
          <label class="control-label col-md-3">Problem</label>
          <div class="col-md-8">
            <input class="form-control" type="text" name="problem" id="problem" >
          </div>
        </div>


        <div class="form-group row">
          <label class="control-label col-md-3">Action</label>
          <div class="col-md-8">
            <input class="form-control" type="text"  name="nw_action" id="nw_action" >
          </div>
        </div>




      </form>

    </div>
    <div class="modal-footer">
      <button class="btn btn-primary" name="btntest" type="submit" onclick="updateEquipmentNotWorking()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
      <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div> <!-- end of model div -->




<!-- New Customer Modal -->
<div class="modal fade" id="newcustomerModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="customer_id" id="customer_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Customer Name </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="customer_name" id="customer_name" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">No. of Sample Tested </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="test_sample" id="test_sample" >
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Revenue (Rs.) </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="newcust_amount" id="newcust_amount" >
            </div>
          </div>




        </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updateNewCustomer()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of model div -->

<!-- Marketing Activity Modal -->
<div class="modal fade" id="marketingModel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden"  name="marketing_activity_id" id="marketing_activity_id"  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Company Name </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="company_name" id="company_name" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Type of Company</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="company_type" id="company_type" >
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3">Contact Person </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="contact_person" id="contact_person" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Contact Number  </label>
            <div class="col-md-8">
              <input type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" minlength="10" maxlength="10" id="contact_number" name="contact_number" ></div>


            </div><div class="form-group row">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-8">
                <input class="form-control" type="email"  name="email" id="email" >
              </div>
            </div><div class="form-group row">
              <label class="control-label col-md-3">Date </label>
              <div class="col-md-8">
                <input class="form-control" type="date"  name="visited_date" id="visited_date" max="<?php echo date("Y-m-t", strtotime(date("Y-m-t"))); ?>">
              </div>
            </div><div class="form-group row">
              <label class="control-label col-md-3">No. of Sample Received  </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="sample_received" id="sample_received" >
              </div>
            </div><div class="form-group row">
              <label class="control-label col-md-3">Response</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="customer_response" id="customer_response" >
              </div>
            </div><div class="form-group row">
              <label class="control-label col-md-3">Specific Requirnment </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="specific_requirement" id="specific_requirement" >
              </div>
            </div><div class="form-group row">
              <label class="control-label col-md-3">Remark</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="mark_remark" id="mark_remark" >
              </div>
            </div>




          </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" name="btntest" type="submit" onclick="updateMarketing()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
          <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> <!-- end of model div -->




  <!-- Bulk Customer Modal -->
  <div class="modal fade" id="bulkcustomerModel" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007d71; ">
          <h4 class="modal-title" style="color: white;" >Update Record</h4>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">

            <div class="form-group row">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">
                <input class="form-control" type="hidden"  name="bulk_customer_id" id="bulk_customer_id"  readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Name of Bulk Customer </label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="bulk_customer_name" id="bulk_customer_name" >
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-3">Sample Reported</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="sample_reported" id="sample_reported" >
              </div>
            </div>


            <div class="form-group row">
              <label class="control-label col-md-3">Testing charges </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="testing_charges" id="testing_charges" >
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-3">Remark </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="b_remark" id="b_remark" >
              </div>
            </div>




          </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" name="btntest" type="submit" onclick="updateBulkCustomer()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
          <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> <!-- end of model div -->


  <!-- Tatkal Customer Modal -->
  <div class="modal fade" id="tatkalcustomerModel" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007d71; ">
          <h4 class="modal-title" style="color: white;" >Update Record</h4>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">

            <div class="form-group row">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">
                <input class="form-control" type="hidden"  name="tatkal_customer_id" id="tatkal_customer_id"  readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Name of Tatkal Customer </label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="tatkal_customer_name" id="tatkal_customer_name" >
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-3">Sample Reported</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="tatkal_sample_reported" id="tatkal_sample_reported" >
              </div>
            </div>


            <div class="form-group row">
              <label class="control-label col-md-3">Testing charges </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="tatkal_testing_charges" id="tatkal_testing_charges" >
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-3">Remark </label>
              <div class="col-md-8">
                <input class="form-control" type="text"  name="tatkal_remark" id="tatkal_remark" >
              </div>
            </div>




          </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" name="btntest" type="submit" onclick="updateTatkalRecord()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
          <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> <!-- end of model div -->



  <!-- Manpower Avaialbility -->

  <div class="modal fade" id="manpoweravailability" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007d71; ">
          <h4 class="modal-title" style="color: white;" >Update Record</h4>
        </div>

        <form class="form-horizontal">
         <div class="modal-body">

          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden" name="manpower_available_id" id="manpower_available_id"  readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Designation Name </label>
            <div class="col-md-8">
              <!-- <input class="form-control" type="text"  name="designation_name" id="designation_name" > -->
              <select class="form-control"  name="designation_id" id="designation_id" required>
                <option value="">Select Designation</option>
                <?php
                $getDesignationList=$db->designationList($db, $db->con);

                if($getDesignationList){ foreach ($getDesignationList as $key): ?>
                  <option value= "<?=$key['designation_id']?>"> <?=$key['designation_name']?> </option>
                <?php endforeach;} ?>
              </select>        
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">From Laboratory </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="from_lab" id="from_lab" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">From Other </label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="from_other" id="from_other" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Total</label>
            <div class="col-md-8">
              <input class="form-control" type="text"  name="total" id="total" >
            </div>
          </div>

        </div>




      </form>


      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updatemanpoweravailability()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>


    </div>
  </div>
</div>


<!-- Manpower Utilisation -->


<div class="modal fade" id="manpowerutilisation" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007d71; ">
        <h4 class="modal-title" style="color: white;" >Update Record</h4>
      </div>

      <form class="form-horizontal">
        <div class="modal-body">
          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
              <input class="form-control" type="hidden" name="manpower_transaction_id" id="manpower_transaction_id" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Number of Technical QAO/JQAO/Fellow</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="technical_manpower" id="technical_manpower">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Number of working day</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="working_day" id="working_day">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Extra man days (on tour from other RO/Other section of TC)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="extra_man_day" id="extra_man_day">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Additional working mandays
            (Due to Saturdays/Sundays/holidays/extra hours)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="addtional_working" id="addtional_working">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Total (A)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_a" id="total_a">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Special Work</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="special_work" id="special_work">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Deputation of QAOs/JQAOs to other R.O./ Training /seminar/ workshop etc.</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="deputation" id="deputation">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">No. of days of leave</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="leave_day" id="leave_day">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Total (B)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_b" id="total_b">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Total  number of man days available for the routine testing (C)=(A-B) </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_c" id="total_c">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Total Number of samples reported (S)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_s" id="total_s">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Average output / manday (S)/(C)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="average_op" id="average_op">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Total No. of Parameter (P)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="total_p" id="total_p">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3">Average Parameter per mandays (P)/(C)</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="average_pm" id="average_pm">
            </div>
          </div>
        </div>
      </form>



      <div class="modal-footer">
        <button class="btn btn-primary" name="btntest" type="submit" onclick="updatemanpowerutilisation()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
        <button type="button" class="btn btn-outline-primary"  data-dismiss="modal">Close</button>
      </div>


    </div>
  </div>
</div>
