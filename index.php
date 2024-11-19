
<?php require('header.php');

 $getMonth=$db->getAllMonth($db, $db->con); 

 $getroname = $db->getallRoName($db, $db->con);

if(isset($_POST['btntest'])){

	  // print_r($_POST['month']);die();

$_SESSION['month']=$_POST['month'];
$_SESSION['year']=$_POST['year'];
$month= $_SESSION['month'];
$year = $_SESSION['year'];


}else{
$_SESSION['month'] = date("m"); 
$_SESSION['year'] = date("Y");

$month = $_SESSION['month'];
$year = $_SESSION['year'];
}

if($_SESSION['user_id']=='1'){
	if(isset($_POST['ro_id'])){
$ro_id=$_POST['ro_id'];
$_SESSION['ro_id']=$ro_id;
}else{
	$ro_id="";
	$_SESSION['ro_id']=$ro_id;
}
}

if($month =='01'|| $month =='1'){
$prevmonth = '12';
$prevYear = $year - 1;
$prev_sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id,  $prevmonth, $prevYear); 

$prev_revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth, $prevYear);

$prev_manpower_received = $db->getCurrentManpowerUtilisation($db, $db->con, $user_id, $prevmonth, $prevYear);

}else{
$prevmonth = $month - 1;

$prev_sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id,  $prevmonth, $year); 

$prev_revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth, $year);

$prev_manpower_received = $db->getCurrentManpowerUtilisation($db, $db->con, $user_id, $prevmonth, $year);

}

$sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']); 

$revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id,  $_SESSION['month'], $_SESSION['year']);

$manpower_received = $db->getCurrentManpowerUtilisation($db, $db->con, $user_id,  $_SESSION['month'], $_SESSION['year']);


// print_r($manpower_received);die();

 ?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<style type="text/css">
	.breadcrumb-item+.breadcrumb-item::before{
		content:none!important;
	}
</style>

<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-xxl">

			<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
				<div class="flex-grow-1">
					<h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
				</div>
				<div class="text-end">
					<form class="form-horizontal" method="post">
					<ol class="breadcrumb m-0 py-0">
						<li class="breadcrumb-item active" style="width: 150px;">
					<select class="form-control"  name="month" required>
<option value="">Select Month</option>
<?php if($getMonth){ foreach ($getMonth as $key): ?>
<option value= "<?=$key['month_id']?>" <?php if($month==$key['month_id']){echo "Selected";}?>> <?=$key['month_title']?> </option>
<?php endforeach;} ?>
</select>
</li>
<li class="breadcrumb-item active" style="width: 150px;">
<?php if($_SESSION['user_id']=="1") {?>
<select class="form-control" name="year" required>
<option value="">Select Year</option>
<?php 
$currentYear = date('Y');
for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
$selected = (isset($year) && $year == $i) ? 'selected' : '';
echo "<option value='$i' $selected>$i</option>";
}
?>
</select>
<?php }else {  ?>
<select class="form-control "  name="year" required>
<option value="">Select Year</option>
<?php $s="";
for($i = date('Y') ; $i >= date('Y')-5; $i--)
{
if($year==$i){ $s="selected";}else{ $s="";}
echo "<option value='$i'".$s.">$i</option>";
}
?>
</select>
<?php } ?>
</li>

<?php if($_SESSION['user_id']=="1") { ?>
<li class="breadcrumb-item active" style="width: 150px;">
<select class="form-control "  name="ro_id" required>
<option value="">Select RO</option>
<?php if($getroname){ 
foreach ($getroname as $key){ ?>
<option value="<?php echo $key['ro_id']; ?>"   <?php if($ro_id==$key['ro_id']){echo "Selected";}?>><?php echo $key['ro_name']; ?> </option>
<?php } } ?>
</select>
</li>
<?php } ?>

<li class="breadcrumb-item active">
	<button class="btn btn-primary" name="btntest" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>                 

</li>
</ol>
</form>
				</div>
			</div>

			<!-- start row -->
			<div class="row">
				<div class="col-md-12 col-xl-12">
					<div class="row g-3">

						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="fs-14 mb-1">Sample Received</div>
									</div>

									<div class="d-flex align-items-baseline mb-2">
										<div class="fs-22 mb-0 me-2 fw-semibold text-black">
    <?php echo isset($sample_received[1]['total']) ? $sample_received[1]['total'] : '0'; ?>
</div>

										<div class="me-auto">
											<span class="text-primary d-inline-flex align-items-center">
												<?php
if (isset($sample_received[1]['total']) && isset($prev_sample_received[1]['total']) && $prev_sample_received[1]['total'] != 0) {
    $sample_percent = round((($sample_received[1]['total'] - $prev_sample_received[1]['total']) / $prev_sample_received[1]['total']) * 100, 0);
    echo $sample_percent . '%';
} else {
    echo $sample_percent="0%";
}
?>


											<?php if($sample_percent > 0) {?>
												<i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
											<?php } else{ ?>
												<i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
											<?php } ?>
											</span>
										</div>
									</div>
									<div id="website-visitors1" class="apex-charts"></div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="fs-14 mb-1">Revenue Received</div>
									</div>

									<div class="d-flex align-items-baseline mb-2">
										<div class="fs-22 mb-0 me-2 fw-semibold text-black">
											 <?php echo isset($revenue_received[2]['rev_total']) ? $revenue_received[2]['rev_total'] : '0'; ?>

										</div>

										<div class="me-auto">
											<span class="text-danger d-inline-flex align-items-center">
												<?php
if (isset($revenue_received[2]['rev_total']) && isset($prev_revenue_received[2]['rev_total']) && $prev_revenue_received[2]['rev_total'] != 0) {
    $revenue_percent = round((($revenue_received[2]['rev_total'] - $prev_revenue_received[2]['rev_total']) / $prev_revenue_received[2]['rev_total']) * 100, 0);
    echo $revenue_percent . '%';
} else {
    echo $revenue_percent="0%";
}
?>
												<?php if($revenue_percent > 0) {?>
												<i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
											<?php } else{ ?>
												<i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
											<?php } ?>
											</span>
										</div>
									</div>
									<div id="conversion-visitors1" class="apex-charts"></div>
								</div>
							</div>
						</div>

			<div class="col-md-6 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="fs-14 mb-1">Average output / manday</div>
            </div>

            <div class="d-flex align-items-baseline mb-2">
                <div class="fs-22 mb-0 me-2 fw-semibold text-black"> 
                    <?php
                    // Ensure required fields are set using isset() and calculate total_a and total_b
                    $total_a = (isset($manpower_received[0]['technical_manpower']) ? $manpower_received[0]['technical_manpower'] : 0) * (isset($manpower_received[0]['working_day']) ? $manpower_received[0]['working_day'] : 0)
                            + (isset($manpower_received[0]['extra_man_day']) ? $manpower_received[0]['extra_man_day'] : 0)
                            + (isset($manpower_received[0]['addtional_working']) ? $manpower_received[0]['addtional_working'] : 0);

                    $total_b = (isset($manpower_received[0]['special_work']) ? $manpower_received[0]['special_work'] : 0)
                            + (isset($manpower_received[0]['deputation']) ? $manpower_received[0]['deputation'] : 0)
                            + (isset($manpower_received[0]['leave_day']) ? $manpower_received[0]['leave_day'] : 0);

                    $total_c = $total_a - $total_b;

                    // Ensure total_c is not zero to prevent division by zero
                    $average_op = ($total_c != 0) ? number_format((isset($manpower_received[0]['total_s']) ? $manpower_received[0]['total_s'] : 0) / $total_c, 2) : 0;

                    echo $average_op;
                    ?>
                </div>
                <div class="me-auto">
                    <span class="text-success d-inline-flex align-items-center">
                        <?php 
                        // Calculation for previous month's average (for comparison)
                        $prev_total_a = (isset($prev_manpower_received[0]['technical_manpower']) ? $prev_manpower_received[0]['technical_manpower'] : 0) * (isset($prev_manpower_received[0]['working_day']) ? $prev_manpower_received[0]['working_day'] : 0)
                                    + (isset($prev_manpower_received[0]['extra_man_day']) ? $prev_manpower_received[0]['extra_man_day'] : 0)
                                    + (isset($prev_manpower_received[0]['addtional_working']) ? $prev_manpower_received[0]['addtional_working'] : 0);

                        $prev_total_b = (isset($prev_manpower_received[0]['special_work']) ? $prev_manpower_received[0]['special_work'] : 0)
                                    + (isset($prev_manpower_received[0]['deputation']) ? $prev_manpower_received[0]['deputation'] : 0)
                                    + (isset($prev_manpower_received[0]['leave_day']) ? $prev_manpower_received[0]['leave_day'] : 0);

                        $prev_total_c = $prev_total_a - $prev_total_b;

                        // Ensure prev_total_c is not zero to prevent division by zero
                        $prev_average_op = ($prev_total_c != 0) ? number_format((isset($prev_manpower_received[0]['total_s']) ? $prev_manpower_received[0]['total_s'] : 0) / $prev_total_c, 2) : 0;

                        $manpower_percent = ($prev_average_op != 0) ? round((($average_op - $prev_average_op) / $prev_average_op) * 100, 0) : 0;

                        echo $manpower_percent . '%';
                        ?>
                        
                        <?php if($manpower_percent > 0) { ?>
                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                        <?php } else { ?>
                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                        <?php } ?>
                    </span>
                </div>
            </div>
            <div id="session-visitors1" class="apex-charts"></div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="fs-14 mb-1">Average Parameters per Mandays</div>
            </div>

            <div class="d-flex align-items-baseline mb-2">
                <div class="fs-22 mb-0 me-2 fw-semibold text-black">
                    <?php
                    // Ensure required fields are set and calculate average_pm
                    $average_pm = ($total_c != 0) ? number_format((isset($manpower_received[0]['total_p']) ? $manpower_received[0]['total_p'] : 0) / $total_c, 2) : 0;
                    echo $average_pm;
                    ?>
                </div>
                <div class="me-auto">
                    <span class="text-success d-inline-flex align-items-center">
                        <?php
                        // Previous month's average parameters per mandays comparison
                        $prev_average_pm = ($prev_total_c != 0) ? number_format((isset($prev_manpower_received[0]['total_p']) ? $prev_manpower_received[0]['total_p'] : 0) / $prev_total_c, 2) : 0;

                        $manpower_percent1 = ($prev_average_pm != 0) ? round((($average_pm - $prev_average_pm) / $prev_average_pm) * 100, 0) : 0;
                        echo $manpower_percent1 . '%';
                        ?>
                        
                        <?php if($manpower_percent1 > 0) { ?>
                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                        <?php } else { ?>
                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                        <?php } ?>
                    </span>
                </div>
            </div>
            <div id="active-users1" class="apex-charts"></div>
        </div>
    </div>
</div>

					</div>
				</div> <!-- end sales -->
			</div> <!-- end row -->

			<!-- Start Monthly Sales -->
			<div class="row">
				<div class="col-md-6 col-xl-8">
					<div class="card">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="bar-chart" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Monthly Sample Received</h5>
							</div>
						</div>

						<div class="card-body">
							<div id="monthly-sales1" class="apex-charts"></div>
						</div>
						
					</div>
				</div>

				<div class="col-md-6 col-xl-4">
					

					<div class="card" style="height:410px;overflow-y: scroll;">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="table" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Sample Tested</h5>
							</div>
						</div>

						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-traffic mb-0">
									<tbody>

										<thead>
											<tr>
												<th>Month</th>
												<th>Sample Tested</th>
												
											</tr>
										</thead>

										<tbody>
    <?php 
  
    $current_month = $_SESSION['month'];
    $current_year = $_SESSION['year']; 

 
    for ($i = 0; $i < 12; $i++) {
  
        $month = date("m", strtotime("-$i month", strtotime("$current_year-$current_month-01")));
        $year = date("Y", strtotime("-$i month", strtotime("$current_year-$current_month-01")));

  
        $sample_tested = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $month, $year);

        ?>
        <tr>
            <td>
                <?php 
           
                echo date("F Y", strtotime("$year-$month-01"));
                ?>
            </td>
            <td>
                <?php 
       
                echo isset($sample_tested[3]['total']) ? $sample_tested[3]['total'] : '0'; 
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>


								
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- End Monthly Sales -->

			<!-- Start Monthly Sales -->
			<div class="row">
				<div class="col-md-6 col-xl-4">
					

					<div class="card" style="height:410px;overflow-y: scroll;">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="table" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Revenue Tested</h5>
							</div>
						</div>

						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-traffic mb-0">
									<tbody>

										<thead>
											<tr>
												<th>Month</th>
												<th>Revenue Tested</th>
												
											</tr>
										</thead>

									 <?php 
  
    $current_month = $_SESSION['month'];
    $current_year = $_SESSION['year']; 

 
    for ($i = 0; $i < 12; $i++) {
  
        $month = date("m", strtotime("-$i month", strtotime("$current_year-$current_month-01")));
        $year = date("Y", strtotime("-$i month", strtotime("$current_year-$current_month-01")));

  
        $revenue_tested = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $month, $year);

        ?>
        <tr>
            <td>
                <?php 
           
                echo date("F Y", strtotime("$year-$month-01"));
                ?>
            </td>
            <td>
                <?php 
       
                echo isset($revenue_tested[6]['rev_total']) ? $revenue_tested[6]['rev_total'] : '0'; 
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>

								</table>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-6 col-xl-8">
					<div class="card">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="bar-chart" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Monthly Revenue Received</h5>
							</div>
						</div>

						<div class="card-body">
							<div id="monthly-sales2" class="apex-charts"></div>
						</div>
						
					</div>
				</div>

				
			</div>
			
		</div> <!-- container-fluid -->
	</div> <!-- content -->

	<?php  require('footer1.php'); ?>

	<?php
$months = [];
$data = [];

$current_month = $_SESSION['month']; 
$current_year = $_SESSION['year'];

for ($i = 0; $i < 12; $i++) {

    $current_time = strtotime("-$i month", strtotime("$current_year-$current_month-01"));
    $month = date("m", $current_time);
    $year = date("Y", $current_time);

    $sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $month, $year);
    $revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $month, $year);
    $manpower_received = $db->getCurrentManpowerUtilisation($db, $db->con, $user_id, $month, $year);

    if (!empty($sample_received)) {
        $total = $sample_received[1]['total'];
    } else {
        $total = 0; 
    }

    if (!empty($revenue_received)) {
        $rev_total = $revenue_received[2]['rev_total'];
    } else {
        $rev_total = 0; 
    }

    if (!empty($manpower_received)) {

	$total_a = ($manpower_received[0]['technical_manpower']*$manpower_received[0]['working_day'])+$manpower_received[0]['extra_man_day']+$manpower_received[0]['addtional_working'];

	$total_b = $manpower_received[0]['special_work']+$manpower_received[0]['deputation']+$manpower_received[0]['leave_day'];

	$total_c = $total_a - $total_b;

	$average_op = number_format($manpower_received[0]['total_s']/$total_c ,2);
	$average_pm = number_format($manpower_received[0]['total_p']/$total_c ,2);

        $manpower_total = $average_op;
        $manpower_total1 = $average_pm;
    } else {
        $manpower_total = 0; 
        $manpower_total1 = 0; 
    }

    $month_label = date("Y-m", strtotime("$year-$month-01"));

    $months[] = $month_label;
    $data[] = $total;
    $rev_data[] = $rev_total;
    $manpower_data[] = $manpower_total;
     $manpower_data1[] = $manpower_total1;

}
?>

<script type="text/javascript">
    console.log(<?php echo json_encode($months); ?>);
    console.log(<?php echo json_encode($data); ?>);

    var options = {
        chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 45,
            sparkline: { enabled: true },
            animations: { enabled: false },
        },
        dataLabels: { enabled: false },
        fill: { opacity: .16, type: 'solid' },
        stroke: { width: 2, lineCap: "round", curve: "smooth" },
        series: [{
            name: "Amount",
            data: <?php echo json_encode($data); ?>
        }],
        tooltip: { theme: 'light' },
        grid: { strokeDashArray: 4 },
        xaxis: {
            labels: { padding: 0 },
            tooltip: { enabled: false },
            axisBorder: { show: false },
            type: 'datetime',
            categories: <?php echo json_encode($months); ?>
        },
        yaxis: { labels: { padding: 4 } },
        legend: { show: false },
        colors: ["#537AEF"],
    };


    var chart = new ApexCharts(document.querySelector("#website-visitors1"), options);
    chart.render();


    // Conversion Chart
var options = {
    chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 45,
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: .16,
        type: 'solid'
    },
    stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
    },
    series: [{
        name: "Amount",
        data: <?php echo json_encode($rev_data); ?>
    }],
    tooltip: {
        theme: 'light'
    },
    grid: {
        strokeDashArray: 4,
    },
    xaxis: {
        labels: { padding: 0 },
            tooltip: { enabled: false },
            axisBorder: { show: false },
            type: 'datetime',
            categories: <?php echo json_encode($months); ?>
    },
    yaxis: {
        labels: {
            padding: 4
        },
    },
    colors: ["#ec8290"],
    legend: {
        show: false,
    },
};
var chart = new ApexCharts(document.querySelector("#conversion-visitors1"), options);
chart.render();



// Monthly Sales
var options = {
    chart: {
        type: "bar",
        height: 307,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
    },
    colors: ["#537AEF"],
    series: [{
        name: 'Amount',
        data: <?php echo json_encode($data); ?>
    }],
    fill: {
        opacity: 1,
    },
    plotOptions: {
        bar: {
            columnWidth: "50%",
            borderRadius: 4,
            borderRadiusApplication: 'end',
            borderRadiusWhenStacked: 'last',
            dataLabels: {
                position: 'top',
                orientation: 'vertical',
            }
        },
    },
    grid: {
        strokeDashArray: 4,
        padding: {
            top: -20,
            right: 0,
            bottom: -4
        },
        xaxis: {
            lines: {
                show: true
            }
        }
    },
    xaxis: {
        type: 'datetime',
        categories: <?php echo json_encode($months); ?>,
        axisTicks: {
            color: "#f0f4f7",
        },
    },
    yaxis: {
        title: {
            text: 'Number of Sample Received',
            style: {
                fontSize: '12px',
                fontWeight: 600,
            }
        },
    },
    tooltip: {
        theme: 'light'
    },
    legend: {
        position: 'top',
        show: true,
        horizontalAlign: 'center',
    },
    stroke: {
        width: 0
    },
    dataLabels: {
        enabled: false,
    },
    theme: {
        mode: 'light'
    },
};
var chartOne = new ApexCharts(document.querySelector('#monthly-sales1'), options);
chartOne.render();


// Monthly Sales
var options = {
    chart: {
        type: "bar",
        height: 307,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
    },
    colors: ["#537AEF"],
    series: [{
        name: 'Amount',
        data: <?php echo json_encode($rev_data); ?>
    }],
    fill: {
        opacity: 1,
    },
    plotOptions: {
        bar: {
            columnWidth: "50%",
            borderRadius: 4,
            borderRadiusApplication: 'end',
            borderRadiusWhenStacked: 'last',
            dataLabels: {
                position: 'top',
                orientation: 'vertical',
            }
        },
    },
    grid: {
        strokeDashArray: 4,
        padding: {
            top: -20,
            right: 0,
            bottom: -4
        },
        xaxis: {
            lines: {
                show: true
            }
        }
    },
    xaxis: {
        type: 'datetime',
        categories: <?php echo json_encode($months); ?>,
        axisTicks: {
            color: "#f0f4f7",
        },
    },
    yaxis: {
        title: {
            text: 'Number of Revenue Received',
            style: {
                fontSize: '12px',
                fontWeight: 600,
            }
        },
    },
    tooltip: {
        theme: 'light'
    },
    legend: {
        position: 'top',
        show: true,
        horizontalAlign: 'center',
    },
    stroke: {
        width: 0
    },
    dataLabels: {
        enabled: false,
    },
    theme: {
        mode: 'light'
    },
};
var chartOne = new ApexCharts(document.querySelector('#monthly-sales2'), options);
chartOne.render();


// Session Chart
var options = {
    chart: {
        type: "line",
        height: 45,
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },
    },
    fill: {
        opacity: 1,
    },
    stroke: {
        width: [2],
        dashArray: [0, 3],
        lineCap: "round",
        curve: "smooth",
    },
    series: [{
        name: "Mandays",
       data: <?php echo json_encode($manpower_data); ?>
    }],
    tooltip: {
        theme: 'light'
    },
    grid: {
        strokeDashArray: 4,
    },
    xaxis: {
        labels: {
            padding: 0,
        },
        tooltip: {
            enabled: false
        },
        type: 'datetime',
         categories: <?php echo json_encode($months); ?>
    },
    yaxis: {
        labels: {
            padding: 4
        },
    },
    colors: ["#537AEF", "#343a40"],
    legend: {
        show: false,
    },
};
var chart = new ApexCharts(document.querySelector("#session-visitors1"), options);
chart.render();


// Active Users
var options = {
    series: [
        {
            name: "Mandays",
       data: <?php echo json_encode($manpower_data1); ?>
        },
    ],
    chart: {
        height: 45,
        type: "bar",
        sparkline: {
            enabled: true,
        },
        animations: {
            enabled: false
        },
    },
    colors: ["#537AEF"],
    plotOptions: {
        bar: {
            columnWidth: "35%",
            borderRadius: 3,
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: 1,
    },
    grid: {
        strokeDashArray: 4,
    },
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    xaxis: {
        crosshairs: {
            width: 1,
        },
         categories: <?php echo json_encode($months); ?>
    },
    yaxis: {
        labels: {
            padding: 4
        },
    },
    tooltip: {
        theme: 'light'
    },
    legend: {
        show: false,
    },
};
var chartOne = new ApexCharts(document.querySelector('#active-users1'), options);
chartOne.render();


</script>
