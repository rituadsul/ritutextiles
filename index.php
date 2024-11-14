
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


if($month =='01'|| $month =='1'){
$prevmonth = '12';
$prevYear = $year - 1;
$prev_sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id,  $prevmonth, $prevYear); 

$prev_revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth, $prevYear);

}else{
$prevmonth = $month - 1;

$prev_sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id,  $prevmonth, $year); 

$prev_revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $prevmonth, $year);
}

$sample_received = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']); 

$revenue_received = $db->getCurrentRevenueTransaction($db, $db->con, $user_id,  $_SESSION['month'], $_SESSION['year']);

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
										<div class="fs-14 mb-1">Manpower Availability</div>
									</div>

									<div class="d-flex align-items-baseline mb-2">
										<div class="fs-22 mb-0 me-2 fw-semibold text-black">90</div>
										<div class="me-auto">
											<span class="text-success d-inline-flex align-items-center">
												25%
												<i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
											</span>
										</div>
									</div>
									<div id="session-visitors" class="apex-charts"></div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="fs-14 mb-1">Manpower Utilisation</div>
									</div>

									<div class="d-flex align-items-baseline mb-2">
										<div class="fs-22 mb-0 me-2 fw-semibold text-black">2,986</div>
										<div class="me-auto">
											<span class="text-success d-inline-flex align-items-center">
												4%
												<i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
											</span>
										</div>
									</div>
									<div id="active-users" class="apex-charts"></div>
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

										$sample_tested = $db->getCurrentSampleTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']); 

										
										 ?>
										<tr>
											<td>
    <?php 
    echo isset($sample_tested[3]['month']) ? $sample_tested[3]['month'] : 'N/A'; 
    echo '&nbsp;-&nbsp;';
    echo isset($sample_tested[3]['year']) ? $sample_tested[3]['year'] : 'N/A'; 
    ?>
</td>
<td>
    <?php echo isset($sample_tested[3]['total']) ? $sample_tested[3]['total'] : '0'; ?>
</td>

										</tr>
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

									<tbody>
										<?php 

										$revenue_tested = $db->getCurrentRevenueTransaction($db, $db->con, $user_id, $_SESSION['month'], $_SESSION['year']); 

										
										 ?>
										<tr>
    <td>
        <?php 
        echo isset($revenue_tested[6]['month']) ? $revenue_tested[6]['month'] : 'N/A'; 
        echo '&nbsp;-&nbsp;';
        echo isset($revenue_tested[6]['year']) ? $revenue_tested[6]['year'] : 'N/A'; 
        ?>
    </td>
    <td>
        <?php echo isset($revenue_tested[6]['rev_total']) ? $revenue_tested[6]['rev_total'] : '0'; ?>
    </td>
</tr>

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
			<!-- End Monthly Sales -->
			<div class="row">
				<div class="col-md-6 col-xl-6">
					<div class="card">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="minus-square" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Audiences By Time Of Day</h5>
							</div>
						</div>

						<div class="card-body">
							<div id="audiences-daily" class="apex-charts mt-n3"></div>
						</div>
						
					</div>
				</div>

				<div class="col-md-6 col-xl-6">
					<div class="card overflow-hidden">

						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="tablet" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Best Traffic Source</h5>
							</div>
						</div>

						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-traffic mb-0">
									<tbody>
										<thead>
											<tr>
												<th>Network</th>
												<th colspan="2">Visitors</th>
											</tr>
										</thead>

										<tr>
											<td>Instagram</td>
											<td>3,550</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-danger" style="width: 80.0%"></div>
												</div>
											</td>
										</tr>

										<tr>
											<td>Facebook</td>
											<td>1,245</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-primary" style="width: 55.9%"></div>
												</div>
											</td>
										</tr>

										<tr>
											<td>Twitter</td>
											<td>1,798</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-secondary" style="width: 67.0%"></div>
												</div>
											</td>
										</tr>

										<tr>
											<td>YouTube</td>
											<td>986</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-success" style="width: 38.72%"></div>
												</div>
											</td>
										</tr>

										<tr>
											<td>Pinterest</td>
											<td>854</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-danger" style="width: 45.08%"></div>
												</div>
											</td>
										</tr>

										<tr>
											<td>Linkedin</td>
											<td>650</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-warning" style="width: 68.0%"></div>
												</div>
											</td>
										</tr>

										<tr>
											<td>Nextdoor</td>
											<td>420</td>
											<td class="w-50">
												<div class="progress progress-md mt-0">
													<div class="progress-bar bg-info" style="width: 56.4%"></div>
												</div>
											</td>
										</tr>

									</tbody>
								</table>
							</div>
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

    $month_label = date("Y-m", strtotime("$year-$month-01"));

    $months[] = $month_label;
    $data[] = $total;
    $rev_data[] = $rev_total;

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


</script>
