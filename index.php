
<?php require('header.php');

 $getMonth=$db->getAllMonth($db, $db->con); 

 $getroname = $db->getallRoName($db, $db->con);

if(isset($_POST['btntest'])){

	  // print_r($_POST['month']);die();

$_SESSION['month']=$_POST['month'];
$_SESSION['year']=$_POST['year'];
$month= $_SESSION['month'];
$year = $_SESSION['year'];

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

}

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
										<div class="fs-22 mb-0 me-2 fw-semibold text-black"><?php echo $sample_received[1]['total'] ?></div>
										<div class="me-auto">
											<span class="text-primary d-inline-flex align-items-center">
												<?php $sample_percent = round((($sample_received[1]['total']-$prev_sample_received[1]['total'])/ $prev_sample_received[1]['total']) * 100,0); 
												echo $sample_percent;
											?>%

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
										<div class="fs-22 mb-0 me-2 fw-semibold text-black"><?php echo $revenue_received[2]['rev_total'] ?></div>
										<div class="me-auto">
											<span class="text-danger d-inline-flex align-items-center">
												<?php $revenue_percent = round((($revenue_received[2]['rev_total']-$prev_revenue_received[2]['rev_total'])/ $prev_revenue_received[2]['rev_total']) * 100,0); 
												echo $revenue_percent;
											?>%
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
				<div class="col-md-6 col-xl-7">
					<div class="card">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="bar-chart" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Monthly Sales</h5>
							</div>
						</div>

						<div class="card-body">
							<div id="monthly-sales" class="apex-charts"></div>
						</div>
						
					</div>
				</div>

				<div class="col-md-6 col-xl-5">
					

					<div class="card overflow-hidden">
						
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="border border-dark rounded-2 me-2 widget-icons-sections">
									<i data-feather="table" class="widgets-icons"></i>
								</div>
								<h5 class="card-title mb-0">Most Visited Pages</h5>
							</div>
						</div>

						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-traffic mb-0">
									<tbody>

										<thead>
											<tr>
												<th>Page name</th>
												<th>Visitors</th>
												<th>Unique</th>
												<th colspan="2">Bounce rate</th>
											</tr>
										</thead>

										<tr>
											<td>
												/home
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>5,896</td>
											<td>3,654</td>
											<td>82.54%</td>
											<td class="w-25">
												<div id="sparkline-bounce-1" class="apex-charts"></div>
											</td>
										</tr>

										<tr>
											<td>
												/about.html
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>3,898</td>
											<td>3,450</td>
											<td>76.29%</td>
											<td class="w-25">
												<div id="sparkline-bounce-2" class="apex-charts"></div>
											</td>
										</tr>

										<tr>
											<td>
												/index.html 
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>3,057</td>
											<td>2,589</td>
											<td>72.68%</td>
											<td class="w-25">
												<div id="sparkline-bounce-3" class="apex-charts"></div>
											</td>
										</tr>

										<tr>
											<td>
												/invoice.html
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>867</td>
											<td>795</td>
											<td>44.78%</td>
											<td class="w-25">
												<div id="sparkline-bounce-4" class="apex-charts"></div>
											</td>
										</tr>

										<tr>
											<td>
												/docs/
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>958</td>
											<td>801</td>
											<td>41.15%</td>
											<td class="w-25">
												<div id="sparkline-bounce-5" class="apex-charts"></div>
											</td>
										</tr>

										<tr>
											<td>
												/service.html
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>658</td>
											<td>589</td>
											<td>32.65%</td>
											<td class="w-25">
												<div id="sparkline-bounce-6" class="apex-charts"></div>
											</td>
										</tr>

										<tr>
											<td>
												/analytical.html
												<a href="#" class="ms-1" aria-label="Open website">
													<i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
												</a>
											</td>
											<td>457</td>
											<td>859</td>
											<td>32.65%</td>
											<td class="w-25">
												<div id="sparkline-bounce-7" class="apex-charts"></div>
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

</script>
