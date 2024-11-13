<?php 
require 'dbfile.php';

define('SERVERNAME', $db_host);
define('USERNAME', $db_user);
define('PASSWORD', $db_password);
define('DBNAME', $db_dbname);
define("BASEPATH", $base_path);


$db=new DB();


class DB
{
	public $con;
	

	public function __construct()
	{
		try {
			$this->con = new PDO("mysql:host=".SERVERNAME.";dbname=".DBNAME , USERNAME , PASSWORD);
    				// set the PDO error mode to exception
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		}//end of construction

		
		public function setData($con, $query, $bind) {
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $con->prepare($query);
			try {
				return $stmt->execute($bind);
			} catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}




public function getAssoc($con,$query,$bind) 
{
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $con->prepare($query);
	// print_r($stmt);die();
	$stmt ->execute($bind);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;


		}//end of function


		


		public function executeQuery($con, $query, $bind) 
		{
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $con->prepare($query);
			return $stmt->execute($bind);
		}


		//this function is used for to upload
		public function upload($name, $temp_name, $path)
		{
			
			$target_file=$path.basename($name);
			$type=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if(move_uploaded_file($temp_name, $target_file))
			{
				return $name;
			}else
			{
				
				return "";
			}
			/*end of if*/

		}//end of function


		

		public function formatIndianRupees($input)
		{
			$dec = "";
			$pos = strpos($input, ".");
			if ($pos === FALSE)
			{
					//no decimals
			}
			else
			{
				//decimals
				$dec   = substr(round(substr($input, $pos), 2), 1);
				$input = substr($input, 0, $pos);
			}
        	$num   = substr($input, -3);    // get the last 3 digits
        	$input = substr($input, 0, -3); // omit the last 3 digits already stored in $num
        	// loop the process - further get digits 2 by 2
        	while (strlen($input) > 0)
        	{
        		$num   = substr($input, -2).",".$num;
        		$input = substr($input, 0, -2);
        	}
        	
        	return $num.$dec;
        	
        	
        }

        

        public function moneyFormatIndia($num) 
        {
        	$explrestunits= "" ;

        	if($num==0.00){
        		return 0;
        	}

        	else if((strlen(explode(".", $num)[0])>3) )
        	{
        		$lastthree = substr($num, strpos($num,".")-3, strlen($num));
				$restunits = substr($num, 0, strpos($num, $lastthree)); // extracts the last three digits
				$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.

				$expunit = str_split($restunits, 2);

				for($i=0; $i<sizeof($expunit); $i++) 
				{
					// creates each of the 2's group and adds a comma to the end
					if($i==0) 
					{
					  		$explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
					  	} 
					  	else 
					  	{
					  		$explrestunits .= $expunit[$i].",";
					  	}
					  }

					  $thecash = $explrestunits.$lastthree;
					} 
					else 
					{
						$thecash = $num;
					}

			return $thecash; // writes the final format where $currency is the currency symbol.
		}

		/*

		/*function calcFY($startDate,$endDate) {

				    $prefix = 'FY-';

				    $ts1 = strtotime($startDate);
				    $ts2 = strtotime($endDate);

				    $year1 = date('Y', $ts1);
				    $year2 = date('Y', $ts2);

				    $month1 = date('m', $ts1);
				    $month2 = date('m', $ts2);

				    //get months
				    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

				    /**
				     * if end month is greater than april, consider the next FY
				     * else dont consider the next FY
				     */
				    /*$total_years = ($month2 > 4)?ceil($diff/12):floor($diff/12);

				    $fy = array();

				    while($total_years >= 0) {

				        $prevyear = $year1 - 1;

				        //We dont need 20 of 20** (like 2014)
				        $fy[] = $prefix.substr($prevyear,-2).'-'.substr($year1,-2);

				        $year1 += 1;

				        $total_years--;
				    }
				    /**
				     * If start month is greater than or equal to april, 
				     * remove the first element
				     */
				    /*if($month1 >= 4) {
				        unset($fy[0]);
				    }
				    /* Concatenate the array with ',' */
				    /*return implode(',',$fy);
				}*/



				


		//Normal List of labels

				public function getAllMonth($db, $con)
				{
					$sqlstr="SELECT `month_id`, `month_title` FROM `month`";

					$getMonth=$db->getAssoc($con, $sqlstr, array());

					return $getMonth;
					
				}

				public function getMonthTitle($db, $con, $month_id)
				{
					$sqlstr="SELECT `month_title` FROM `month` WHERE `month_id`=:month_id";

					$getMonth=$db->getAssoc($con, $sqlstr, array('month_id'=>$month_id));

					if($getMonth){
						return $getMonth[0]['month_title'];	
					}
					
					
				}

				public function getAllRo($db, $con)
				{
					$sqlstr="SELECT `ro_id`, `ro_name`, `state_id`, `publish_date`, `modify_date`, `is_active` FROM `ro_master` WHERE `is_active`=:is_active ORDER BY ro_name";

					$getRo=$db->getAssoc($con, $sqlstr, array('is_active'=>'Y'));

					return $getRo;
					
				}

				public function getUserIdFromRoid($db, $con, $ro_id)
				{
					$str="";
					$sqlstr="SELECT `user_id`  FROM `users` WHERE `ro_id`=:ro_id";
					$getUserId=$db->getAssoc($con, $sqlstr, array('ro_id'=>$ro_id) );
					if ($getUserId) {
						$str=$getUserId[0]['user_id'];
					}
					return $str;
				}

				public function getRoName($db, $con, $ro_id)
				{
					$str="SELECT `ro_name` FROM `ro_master` WHERE `ro_id`=:ro_id";

					$getRoName=$db->getAssoc($con, $str, array('ro_id'=>$ro_id));

					if($getRoName){
						return $getRoName[0]['ro_name'];
					}
				}

				public function getallRoName($db, $con)
				{
					$str="SELECT * FROM `ro_master`";

					$getRoName=$db->getAssoc($con, $str, array());

					if($getRoName){
						return $getRoName;
					}
				}


				public function labelList($db, $con)
				{
					$str="SELECT `sample_id`, `sample_name`, `is_active`, `is_commercial`, `publish_date`, `modify_date`, `user_id` FROM `sample` WHERE `is_active`=:is_active";
					$getSampleList=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getSampleList){
						return $getSampleList;
					}
				}

				public function UserList($db, $con)
				{
					$str="SELECT * FROM `users` WHERE `is_active`=:is_active";
					$getUserList=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getUserList){
						return $getUserList;
					}
				}

				public function searchUserList($db, $con, $searchTerm)
				{
					$str = "SELECT * FROM `users` WHERE (`name` LIKE :searchTerm OR `email` LIKE :searchTerm) AND `is_active` = :is_active";
					$searchTermWithWildcards = '%' . $searchTerm . '%';
					$getUserList = $db->getAssoc($con, $str, array('searchTerm' => $searchTermWithWildcards, 'is_active' => 'Y'));

					if ($getUserList) {
						return $getUserList;
					}

				}

				public function labelList1($db, $con,$user_id, $month, $year)
				{
					$str="SELECT `sample_id`, `sample_name`, `is_active`, `is_commercial`, `publish_date`, `modify_date`, `user_id` FROM `sample` WHERE `is_active`=:is_active";
					$getSampleList=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getSampleList){
						return $getSampleList;
					}
				}

				public function activityList($db, $con)
				{
					$str="SELECT `activity_id`, `activity_name` FROM `activity` WHERE `is_active`=:is_active";
					$getActivityList=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getActivityList){
						return $getActivityList;
					}
				}

				public function getactivitybytraining($db, $con,$activity_id)
				{
					$str="SELECT `activity_id`, `activity_name` FROM `activity` WHERE `is_active`=:is_active and `activity_id`=:activity_id";
					$getActivityList=$db->getAssoc($con, $str, array('is_active'=>'Y','activity_id'=>$activity_id));

					if($getActivityList){
						return $getActivityList;
					}
				}

				public function disposeList($db, $con)
				{
					$str="SELECT `dispose_item_id`, `dispose_item_name`  FROM `dispose_item` WHERE `is_active`=:is_active";
					$getDisposeList=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getDisposeList){
						return $getDisposeList;
					}
				}

				public function expenditureLabel($db, $con)
				{
					$str="SELECT `expenditure_label_id`, `expenditure_label_name`  FROM `expenditure_label` WHERE `is_active`=:is_active";

					$getExpenditureLabel=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getExpenditureLabel){
						return $getExpenditureLabel;
					}
				}


				public function stockLabel($db, $con)
				{
					$str="SELECT `stock_position_label_id`, `stock_position_label_name` FROM `stock_position_label` WHERE  `is_active`=:is_active";

					$getStockLabel=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getStockLabel){
						return $getStockLabel;
					}

				}

				public function equipmentList($db, $con, $user_id)
				{
					$str="SELECT `equipment_id`, `equipment_name`, `parameter_name`, `is_active`, `user_id`, `publish_date`, `modify_date` FROM `equipment` WHERE `is_active`=:is_active AND user_id=:user_id";

					$getEquipementList=$db->getAssoc($con, $str, array('is_active'=>'Y', 'user_id'=>$user_id));

					if($getEquipementList){
						return $getEquipementList;
					}

				}

				public function equipment_transaction_List($db, $con, $user_id,$month,$year)
				{
					$str="SELECT `equipment_transaction_id`, `equipment_name`, `parameter_name`, `user_id`, `publish_date`, `modify_date` FROM `equipment_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";

					$getEquipementList=$db->getAssoc($con, $str, array('user_id'=>$user_id,'month'=>$month, 'year'=>$year));

					if($getEquipementList){
						return $getEquipementList;
					}

				}

				public function designationList($db, $con)
				{
					$str="SELECT `designation_id`, `designation_name`, `is_active`, `is_count`, `publish_date`, `modify_date` FROM `designation` WHERE is_active=:is_active";

					$getDesignationList=$db->getAssoc($con, $str, array('is_active'=>'Y'));

					if($getDesignationList){
						return $getDesignationList;
					}

				}




		//Current Month Single User

		//

				public function getCurrentSampleTransaction($db, $con, $user_id, $month, $year)
				{
					$str="SELECT st.sample_transaction_id, st.sample_id, SUM(st.qua_nonreg)as qua_nonreg, SUM(st.eco_nonreg)as eco_nonreg, SUM(st.qua_reg)as qua_reg, SUM(st.eco_reg)as eco_reg, SUM(st.total)as total, st.month, st.year, st.publish_date, st.modify_date, st.user_id, st.ro_id, s.sample_name, s.is_commercial  
					FROM sample_transaction as st LEFT JOIN sample as s ON st.sample_id=s.sample_id WHERE st.user_id=:user_id AND st.month=:month AND st.year=:year
					Group BY st.sample_id order by st.sample_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						
						$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}



					if($getSampleTransaction){
						return $getSampleTransaction;
					}


				}


				public function getCurrentSampleTransactionfinal($db, $con, $user_id, $month, $year)
				{
					$str="SELECT st.*, s.sample_name FROM sample_transaction_final as st LEFT JOIN sample as s ON st.sample_id=s.sample_id WHERE st.user_id=:user_id AND st.month=:month AND st.year=:year Group BY st.sample_id";

					 // echo $str;
					 // echo $user_id;
					 // echo $month;
					// echo $year;
					// die();

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
					}

					if($getSampleTransaction){
						return $getSampleTransaction;
					}else{
						 // echo "ddg";
					}


				}

				public function getCurrentSampleTransactionfinal1($db, $con, $user_id, $month, $year)
				{
					$str="SELECT st.*,s.sample_name  FROM sample_transaction_final as st LEFT JOIN sample as s ON st.sample_id=s.sample_id WHERE st.user_id=:user_id AND st.month=:month AND st.year=:year Group BY st.sample_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						
						$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getSampleTransaction){
						return $getSampleTransaction;
					}


				}

				function getUserIdByRoId($db, $con,$ro_id) {
					$sql = "SELECT user_id FROM users WHERE ro_id = :ro_id";
					$getro=$db->getAssoc($con, $sql, array('ro_id'=>$ro_id));

					 // print_r($getro);die();
					return $getro;



				}

				public function getCurrentRevenueTransaction($db, $con, $user_id, $month, $year)
				{
					$str="SELECT rt.revenue_transaction_id, rt.revenue_label_id, r.revenue_label_name, ROUND((rt.rev_qua_nonreg),2)as rev_qua_nonreg, 
					ROUND((rt.rev_eco_nonreg),2 )as rev_eco_nonreg, ROUND((rt.rev_qua_reg),2)as rev_qua_reg , ROUND((rt.rev_eco_reg),2)as rev_eco_reg,
					ROUND((rt.rev_total), 2)as rev_total, rt.month, rt.year, rt.publish_date, rt.modify_date, rt.user_id, rt.ro_id
					FROM revenue_transaction as rt
					LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id WHERE rt.user_id=:user_id AND rt.month=:month AND rt.year=:year GROUP BY rt.revenue_label_id  order by r.revenue_label_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{


						$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getRevenueTransaction)
					{
						return $getRevenueTransaction;
					}
				}


				public function getCurrentRevenueTransactionfinal($db, $con, $user_id, $month, $year)
				{
					$str="SELECT rt.*,r.* FROM revenue_transaction_final as rt
					LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id WHERE rt.user_id=:user_id AND rt.month=:month AND rt.year=:year GROUP BY rt.revenue_label_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{


						$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getRevenueTransaction)
					{
						return $getRevenueTransaction;
					}
				}

				public function getCurrentRevenueTransaction1($db, $con, $user_id, $month, $year)
				{
					// $str="SELECT rt.revenue_transaction_id, rt.revenue_label_id, r.revenue_label_name, ROUND((rt.rev_qua_nonreg),2)as rev_qua_nonreg, 
					// ROUND((rt.rev_eco_nonreg),2 )as rev_eco_nonreg, ROUND((rt.rev_qua_reg),2)as rev_qua_reg , ROUND((rt.rev_eco_reg),2)as rev_eco_reg,
					// ROUND((rt.rev_total), 2)as rev_total, rt.month, rt.year, rt.publish_date, rt.modify_date, rt.user_id, rt.ro_id
					// FROM revenue_transaction as rt
					// LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id WHERE rt.user_id=:user_id AND rt.month=:month AND rt.year=:year GROUP BY rt.revenue_label_id";

					$str = "SELECT rt.*,r.* FROM revenue_transaction as rt
					LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id WHERE rt.user_id=:user_id AND rt.month=:month AND rt.year=:year GROUP BY rt.revenue_label_id order by r.revenue_label_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getRevenueTransaction)
					{
						return $getRevenueTransaction;
					}
				}

				public function getCurrentTrainingList($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `training_program_id`, `organisation_name`, `training_date`, `participant_no`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `training_program` WHERE `user_id`=:user_id AND month=:month AND year=:year";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getTrainingList=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getTrainingList=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getTrainingList){
						return $getTrainingList;
					}
				}
				

				public function getCurrentActivityTransactionList($db, $con, $user_id, $month, $year)
				{
					$str="SELECT at.activity_transaction_id, at.activity_id, at.name_of_units,at.organisation_name, at.date_of_commencement, at.date_of_completion, at.remark, at.amount, at.gst_amount, at.training_program, at.month, at.year, at.publish_date, at.modify_date, at.user_id
					FROM `activity_transaction` as at LEFT JOIN activity as a ON a.activity_id=at.activity_id WHERE at.user_id=:user_id AND at.month=:month AND at.year=:year";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getActivityList=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getActivityList=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
					}

					if($getActivityList){
						return $getActivityList;
					}
				}

				public function getCurrentMeetTransactionList($db, $con, $user_id, $month, $year)
				{
					$str="SELECT mt.meet_transaction_id, mt.meet_id, mt.meet_date, mt.place, mt.participant, mt.remark, mt.description, mt.month, mt.year, mt.publish_date, mt.modify_date, mt.user_id, m.meet_name
					FROM meet_transaction as mt
					LEFT JOIN meet as m ON m.meet_id=mt.meet_id WHERE mt.user_id=:user_id AND mt.month=:month AND mt.year=:year";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getMeetList=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getMeetList=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getMeetList){
						return $getMeetList;
					}
				}

				public function getCurrentTechnicalConsultancy($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `technical_consultancy_id`, `name_of_sme`, `consultancy_type`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `technical_consultancy` WHERE `user_id`=:user_id AND month=:month AND year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getConsultancyList=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{


						$getConsultancyList=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getConsultancyList){
						return $getConsultancyList;
					}
				}

				public function getCurrentDisposeTransaction($db, $con, $user_id, $month, $year)
				{
					$str="SELECT dt.dispose_item_transaction_id, dt.dispose_item_id, dt.date_of_dispose, dt.date_of_after_dispose, dt.amount, dt.remark, dt.month, dt.year, dt.publish_date, dt.modify_date, dt.user_id, d.dispose_item_name
					FROM dispose_item_transaction as dt
					LEFT JOIN dispose_item as d ON dt.dispose_item_id=d.dispose_item_id WHERE dt.user_id=:user_id AND dt.month=:month AND dt.year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getDisposeTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getDisposeTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getDisposeTransaction){
						return $getDisposeTransaction;
					}
				}		
				

				public function getCurrentExpenditureTransaction($db, $con, $user_id, $month, $year)
				{
					$str="SELECT et.expenditure_transaction_id, et.expenditure_label_id, SUM(et.amount)as amount, GROUP_CONCAT(et.remark)as remark, et.month, et.year, et.publish_date, et.modify_date, et.user_id, e.expenditure_label_name
					FROM expenditure_transaction as et
					LEFT JOIN expenditure_label as e 
					ON e.expenditure_label_id=et.expenditure_label_id 
					WHERE et.user_id=:user_id AND et.month=:month AND et.year=:year GROUP BY et.expenditure_label_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getExpenditureTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getExpenditureTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getExpenditureTransaction){
						return $getExpenditureTransaction;
					}
				}
				

				public function getCurrentStockPosition($db, $con, $user_id, $month, $year)
				{
					$str="SELECT st.stock_position_transaction_id, st.stock_position_label_id, st.stock_position_adequate, st.action, st.month, st.year, st.publish_date, st.modify_date, st.user_id, s.stock_position_label_name
					FROM stock_position_transaction as st
					LEFT JOIN stock_position_label as s on s.stock_position_label_id=st.stock_position_label_id
					WHERE st.user_id=:user_id AND st.month=:month AND st.year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getStockTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getStockTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getStockTransaction){
						return $getStockTransaction;
					}
				}

				

				public function getCurrentEquipmentTransaction($db, $con, $user_id, $month, $year)
				{
					$str="SELECT et.equipment_transaction_id, et.equipment_name,  et.test_performed, et.remark, et.month, et.year, et.publish_date, et.modify_date, et.user_id, et.parameter_name
					FROM equipment_transaction as et
					
					WHERE et.user_id=:user_id AND et.month=:month AND et.year=:year";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getEquipmentTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getEquipmentTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getEquipmentTransaction){
						return $getEquipmentTransaction;
					}
				}


				public function getCurrentNonWorkingEquipment($db, $con, $user_id, $month, $year)
				{
					$str="SELECT ew.equipment_nonworking_id, ew.equipment_id, ew.problem, ew.action, ew.month, ew.year, ew.user_id, ew.publish_date, ew.modify_date, e.equipment_name 
					FROM equipment_nonworking as ew
					LEFT JOIN equipment_transaction as e On ew.equipment_id=e.equipment_transaction_id
					WHERE ew.user_id=:user_id AND ew.month=:month AND ew.year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getEquipmentTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getEquipmentTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getEquipmentTransaction){
						return $getEquipmentTransaction;
					}
				}

				public function getCurrentCustomer($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `customer_id`, `customer_name`, `test_sample`, `amount`, `month`, `year`, `user_id`, `publish_date`, `modify_date` FROM `customer`  
					WHERE user_id=:user_id AND month=:month AND year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getCustomer){
						return $getCustomer;
					}
				}

				public function getCurrentBulkCustomer($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `bulk_customer_id`, `bulk_customer_name`, `sample_received`, `sample_reported`, `sample_pending`, `testing_charges`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `bulk_customer` 
					WHERE user_id=:user_id AND month=:month AND year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{


						$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getCustomer){
						return $getCustomer;
					}
				}

				public function getCurrentTatkalCustomer($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `tatkal_customer_id`, `tatkal_customer_name`, `tatkal_sample_reported`, `tatkal_testing_charges`, `tatkal_remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `tatkal_customer`  
					WHERE user_id=:user_id AND month=:month AND year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getCustomer){
						return $getCustomer;
					}
				}



				public function getCurrentMarketingActivity($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `marketing_activity_id`, `company_name`, `company_type`, `contact_person`, `contact_number`, `email`, `visited_date`, `sample_received`, `customer_response`, `specific_requirement`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `marketing_activity` WHERE user_id=:user_id AND month=:month AND year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getMarketingActivity=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{


						$getMarketingActivity=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getMarketingActivity){
						return $getMarketingActivity;
					}
				}

				

				public function getCurrentDesignationList($db, $con, $user_id, $month, $year)
				{
					$str="SELECT mp.manpower_available_id, mp.designation_id, SUM(mp.from_lab)as from_lab, SUM(mp.from_other) as from_other, SUM(mp.from_lab+mp.from_other) as total, mp.month, mp.year, mp.user_id, mp.publish_date, mp.modify_date, d.designation_name
					FROM manpower_available as mp
					LEFT JOIN designation as d ON mp.designation_id=d.designation_id 
					WHERE mp.user_id=:user_id AND mp.month=:month AND mp.year=:year 
					GROUP BY mp.designation_id";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getCurrentDesignationList=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{

						$getCurrentDesignationList=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getCurrentDesignationList){
						return $getCurrentDesignationList;
					}

				}

				public function getCurrentManpowerUtilisation($db, $con, $user_id, $month, $year)
				{
					$str="SELECT `manpower_transaction_id`, `technical_manpower`, `working_day`, `extra_man_day`, `addtional_working`, `total_a`, `special_work`, `deputation`, `leave_day`, `total_b`, `total_c`, `total_s`, `average_op`, `total_p`, `average_pm`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `manpower_transaction` WHERE user_id=:user_id AND month=:month AND year=:year ";

					if($user_id=='1'){

						$ro_id = $_SESSION['ro_id'];

						$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

						$getCurrentDesignationUtil=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

					}else{


						$getCurrentDesignationUtil=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					}

					if($getCurrentDesignationUtil){
						return $getCurrentDesignationUtil;
					}

				}

		//All RO single month
				/*-----------------------------------------------*/


		//Current Month 

				public function getAllRoSampleTransaction($db, $con, $month, $year)
				{
					$str="SELECT st.sample_transaction_id, st.sample_id, SUM(st.qua_nonreg)as qua_nonreg, SUM(st.eco_nonreg)as eco_nonreg, SUM(st.qua_reg)as qua_reg, SUM(st.eco_reg)as eco_reg, SUM(st.total)as total, st.month, st.year, st.publish_date, st.modify_date, st.user_id, st.ro_id, s.sample_name, s.is_commercial  
					FROM sample_transaction as st LEFT JOIN sample as s ON st.sample_id=s.sample_id WHERE  st.month=:month AND st.year=:year
					GROUP BY st.sample_id";

					$getSampleTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getSampleTransaction){
						return $getSampleTransaction;
					}
				}

				public function getAllRoRevenueTransaction($db, $con,  $month, $year)
				{
					$str="SELECT rt.revenue_transaction_id, rt.revenue_label_id, r.revenue_label_name, ROUND(SUM(rt.rev_qua_nonreg),2)as rev_qua_nonreg, 
					ROUND(SUM(rt.rev_eco_nonreg),2 )as rev_eco_nonreg, ROUND(SUM(rt.rev_qua_reg),2)as rev_qua_reg , ROUND(SUM(rt.rev_eco_reg),2)as rev_eco_reg,
					ROUND(SUM(rt.rev_total), 2)as rev_total, rt.month, rt.year, rt.publish_date, rt.modify_date, rt.user_id, rt.ro_id
					FROM revenue_transaction as rt
					LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id WHERE rt.month=:month AND rt.year=:year GROUP BY rt.revenue_label_id";

					$getRevenueTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getRevenueTransaction)
					{
						return $getRevenueTransaction;
					}
				}

				public function getAllRoTrainingList($db, $con,  $month, $year)
				{
					$str="SELECT `training_program_id`, `organisation_name`, `training_date`, `participant_no`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `training_program` WHERE month=:month AND year=:year";

					$getTrainingList=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getTrainingList){
						return $getTrainingList;
					}
				}
				

				public function getAllRoActivityTransactionList($db, $con,  $month, $year)
				{
					$str="SELECT at.activity_transaction_id, at.activity_id, at.consultancy_name, at.date_of_commencement,at.organisation_name, at.date_of_completion, at.remark, at.amount, at.gst_amount, at.month, at.year, at.publish_date, at.modify_date, at.user_id, a.activity_name 
					FROM `activity_transaction` as at LEFT JOIN activity as a ON a.activity_id=at.activity_id WHERE at.month=:month AND at.year=:year";

					$getActivityList=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getActivityList){
						return $getActivityList;
					}
				}

				public function getAllRoMeetTransactionList($db, $con,  $month, $year)
				{
					$str="SELECT mt.meet_transaction_id, mt.meet_id, mt.meet_date, mt.place, mt.participant, mt.remark, mt.description, mt.month, mt.year, mt.publish_date, mt.modify_date, mt.user_id, m.meet_name
					FROM meet_transaction as mt
					LEFT JOIN meet as m ON m.meet_id=mt.meet_id WHERE  mt.month=:month AND mt.year=:year";

					$getMeetList=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getMeetList){
						return $getMeetList;
					}
				}

				public function getAllRoTechnicalConsultancy($db, $con, $month, $year)
				{
					$str="SELECT `technical_consultancy_id`, `name_of_sme`, `consultancy_type`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `technical_consultancy` WHERE month=:month AND year=:year ";

					$getConsultancyList=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getConsultancyList){
						return $getConsultancyList;
					}
				}

				public function getAllRoDisposeTransaction($db, $con,  $month, $year)
				{
					$str="SELECT dt.dispose_item_transaction_id, dt.dispose_item_id, dt.date_of_dispose, dt.date_of_after_dispose, dt.amount, dt.remark, dt.month, dt.year, dt.publish_date, dt.modify_date, dt.user_id, d.dispose_item_name
					FROM dispose_item_transaction as dt
					LEFT JOIN dispose_item as d ON dt.dispose_item_id=d.dispose_item_id WHERE  dt.month=:month AND dt.year=:year ";

					$getDisposeTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getDisposeTransaction){
						return $getDisposeTransaction;
					}
				}		
				

				public function getAllRoExpenditureTransaction($db, $con,  $month, $year)
				{
					$str="SELECT et.expenditure_transaction_id, et.expenditure_label_id, SUM(et.amount)as amount, GROUP_CONCAT(et.remark)as remark, et.month, et.year, et.publish_date, et.modify_date, et.user_id, e.expenditure_label_name
					FROM expenditure_transaction as et
					LEFT JOIN expenditure_label as e 
					ON e.expenditure_label_id=et.expenditure_label_id 
					WHERE  et.month=:month AND et.year=:year GROUP BY et.expenditure_label_id";

					$getExpenditureTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getExpenditureTransaction){
						return $getExpenditureTransaction;
					}
				}
				

				public function getAllRoStockPosition($db, $con,  $month, $year)
				{
					$str="SELECT st.stock_position_transaction_id, st.stock_position_label_id, st.stock_position_adequate, st.action, st.month, st.year, st.publish_date, st.modify_date, st.user_id, s.stock_position_label_name
					FROM stock_position_transaction as st
					LEFT JOIN stock_position_label as s on s.stock_position_label_id=st.stock_position_label_id
					WHERE  st.month=:month AND st.year=:year ";

					$getStockTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getStockTransaction){
						return $getStockTransaction;
					}
				}

				

				public function getAllRoEquipmentTransaction($db, $con,  $month, $year)
				{
					$str="SELECT et.equipment_transaction_id, et.equipment_id,  et.test_performed, et.remark, et.month, et.year, et.publish_date, et.modify_date, et.user_id, e.equipment_name, e.parameter_name
					FROM equipment_transaction as et
					LEFT JOIN equipment as e ON et.equipment_id=e.equipment_id
					WHERE  et.month=:month AND et.year=:year AND e.equipment_id IS NOT NULL";

					$getEquipmentTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getEquipmentTransaction){
						return $getEquipmentTransaction;
					}
				}


				public function getAllRoNonWorkingEquipment($db, $con,  $month, $year)
				{
					$str="SELECT ew.equipment_nonworking_id, ew.equipment_id, ew.problem, ew.action, ew.month, ew.year, ew.user_id, ew.publish_date, ew.modify_date, e.equipment_name 
					FROM equipment_nonworking as ew
					LEFT JOIN equipment as e On ew.equipment_id=e.equipment_id
					WHERE  ew.month=:month AND ew.year=:year ";

					$getEquipmentTransaction=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getEquipmentTransaction){
						return $getEquipmentTransaction;
					}
				}

				public function getAllRoCustomer($db, $con,  $month, $year)
				{
					$str="SELECT `customer_id`, `customer_name`, `test_sample`, `amount`, `month`, `year`, `user_id`, `publish_date`, `modify_date` FROM `customer`  
					WHERE  month=:month AND year=:year ";

					$getCustomer=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCustomer){
						return $getCustomer;
					}
				}

				public function getAllRoBulkCustomer($db, $con,  $month, $year)
				{
					$str="SELECT `bulk_customer_id`, `bulk_customer_name`, `sample_received`, `sample_reported`, `sample_pending`, `testing_charges`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `bulk_customer` 
					WHERE  month=:month AND year=:year ";

					$getCustomer=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCustomer){
						return $getCustomer;
					}
				}

				public function getAllRoTatkalCustomer($db, $con,  $month, $year)
				{
					$str="SELECT `tatkal_customer_id`, `tatkal_customer_name`, `tatkal_sample_reported`, `tatkal_testing_charges`, `tatkal_remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `tatkal_customer`
					WHERE  month=:month AND year=:year ";

					$getCustomer=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCustomer){
						return $getCustomer;
					}
				}

				public function getAllRoMarketingActivity($db, $con,  $month, $year)
				{
					$str="SELECT `marketing_activity_id`, `company_name`, `company_type`, `contact_person`, `contact_number`, `email`, `visited_date`, `sample_received`, `customer_response`, `specific_requirement`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `marketing_activity` WHERE  month=:month AND year=:year ";

					$getMarketingActivity=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getMarketingActivity){
						return $getMarketingActivity;
					}
				}

				

				public function getAllRoDesignationList($db, $con,  $month, $year)
				{
					$str="SELECT mp.manpower_available_id, mp.designation_id, SUM(mp.from_lab)as from_lab, SUM(mp.from_other) as from_other, SUM(mp.from_lab+mp.from_other) as total, mp.month, mp.year, mp.user_id, mp.publish_date, mp.modify_date, d.designation_name
					FROM manpower_available as mp
					LEFT JOIN designation as d ON mp.designation_id=d.designation_id 
					WHERE  mp.month=:month AND mp.year=:year 
					GROUP BY mp.designation_id";

					$getCurrentDesignationList=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCurrentDesignationList){
						return $getCurrentDesignationList;
					}

				}

				public function getAllRoManpowerUtilisation($db, $con, $month, $year)
				{
					$str="SELECT manpower_transaction_id, SUM(technical_manpower)as technical_manpower, SUM(working_day)as working_day, SUM(extra_man_day)as extra_man_day, SUM(addtional_working)as addtional_working, SUM(total_a)as total_a, SUM(special_work)as special_work, SUM(deputation)as deputation, SUM(leave_day)as leave_day, SUM(total_b)as total_b, SUM(total_c)as total_c, SUM(total_s)as total_s, SUM(average_op)as average_op, SUM(total_p)as total_p, SUM(average_pm)as average_pm, month, year, publish_date, modify_date, user_id FROM manpower_transaction  WHERE  month=:month AND year=:year ";

					$getCurrentDesignationUtil=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCurrentDesignationUtil){
						return $getCurrentDesignationUtil;
					}

				}



		//ALL RO Calculation Count



		//Calculation Part
				/*-------------------------All RO Wise Calculating COunt----------------------------*/
				public function getCurrentSampleCountAllRo($db, $con,  $month, $year)
				{
					$val=0;
					$str="SELECT SUM(total) as  total FROM `sample_transaction` WHERE sample_id IN(4,6,7,8,9) AND  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						$val= $getCount[0]['total'];
					}
					return $val;
				}


				public function getCurrentSampleCountTypewiseAllRo($db, $con,  $month, $year, $req)
				{
					$val=0;

					if($req=='Y')
					{

						$str="SELECT COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND  st.month=:month AND st.year=:year AND st.sample_id IN(4) ";

					}
					else{

						$str="SELECT COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND  st.month=:month AND st.year=:year ";

					}

					

					$getCount=$db->getAssoc($con, $str, array('is_commercial'=>$req , 'month'=>$month, 'year'=>$year));

					if($getCount){
						$val= $getCount[0]['total'];
					}
					return $val;

				}



				public function getCurrentRevenueCountAllRo($db, $con,  $month, $year)
				{
					$val=0;


					$str="SELECT COALESCE(SUM(round(rev_qua_nonreg/100000,2)),0) +
					COALESCE(sum(round(rev_eco_nonreg/100000,2)),0) +
					COALESCE(SUM(round(rev_qua_reg/100000,2)),0) +
					COALESCE(sum(round(rev_eco_reg/100000,2)),0) as total FROM `revenue_transaction` WHERE revenue_label_id IN(7) AND  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						$val= $getCount[0]['total'];
					}
					return $val;

				}

				public function getCurrentRevenueCountNotionalAllRo($db, $con,  $month, $year)
				{
					$val=0;
					
					$str="SELECT  SUM(rt.rev_total) as total FROM revenue_transaction as rt LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  WHERE  rt.month=:month AND rt.year=:year AND r.is_commercial=:is_commercial";

					$getCount=$db->getAssoc($con, $str, array('month'=>$month, 'year'=>$year, 'is_commercial'=>'N' ));

					if($getCount){
						$val= $getCount[0]['total'];
					}
					return $val;

				}

				public function getCurrentTrainingCountAllRo($db, $con,  $month, $year)
				{	
					$str="SELECT  SUM(participant_no) as participant_no, SUM(amount) as amount FROM `training_program` WHERE    month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}
				}

				public function getCurrentActivityCountAllRo($db, $con, $month, $year)
				{	
					$str="SELECT SUM(amount)as amount, SUM(gst_amount) as gst_amount FROM `activity_transaction`  WHERE month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array('month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}
				}

				public function getCurrentTechnicalConsultingCountAllRo($db, $con,  $month, $year)
				{	
					$str="SELECT SUM(amount)as amount, SUM(gst_amount)as gst_amount  FROM `technical_consultancy` WHERE   month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}
				}

				public function getCurrentMeetCountAllRO($db, $con,  $month, $year)
				{
					
					
					$str="SELECT  SUM(participant) as participant FROM `meet_transaction` WHERE month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}		
				}

				public function getCurrentDisposeCountAllRo($db, $con,  $month, $year)
				{
					
					
					$str="SELECT SUM(amount) as amount FROM `dispose_item_transaction` WHERE month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}		

				}	


				public function getCurrentExpenditureCountAllRo($db, $con,  $month, $year)
				{
					$val=0;
					$str="SELECT SUM(amount) as  total FROM `expenditure_transaction` WHERE  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						$val= $getCount[0]['total'];
					}
					return $val;
				}



				public function getCurrentEquipmentAllRo($db, $con,  $month, $year)
				{
					$str="SELECT SUM(et.test_performed)as total 
					FROM equipment_transaction as et
					LEFT JOIN equipment as e ON et.equipment_id=e.equipment_id 
					WHERE et.month=:month AND et.year=:year AND e.equipment_id IS NOT NULL ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						return $getCount[0]['total'];
					}

				}

				public function getCurrentCustomerCountAllRo($db, $con, $month, $year)
				{
					
					
					$str="SELECT  SUM(test_sample) as test_sample, SUM(amount)as amount FROM `customer` WHERE  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}		
				}

				public function getCurrentMarketingCountAllRo($db, $con,  $month, $year)
				{
					
					
					$str="SELECT SUM(sample_received) as sample_receive FROM `marketing_activity` WHERE  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}		
				}

				public function getCurrentBulkCountAllRo($db, $con,  $month, $year)
				{			
					
					$str="SELECT SUM(sample_reported) as sample_reported, SUM( testing_charges)as testing_charges  FROM `bulk_customer` WHERE  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}		
				}

				public function getCurrentTatkalCountAllRo($db, $con,  $month, $year)
				{			
					
					$str="SELECT SUM(tatkal_sample_reported) as tatkal_sample_reported, SUM( tatkal_testing_charges)as tatkal_testing_charges  FROM `tatkal_customer` WHERE  month=:month AND year=:year ";

					$getCount=$db->getAssoc($con, $str, array( 'month'=>$month, 'year'=>$year));

					if($getCount){
						
						return $getCount;
					}		
				}



				public function rowiseSampleReceivedCAll($db, $con)
				{
			//Can be received as non regulatory, regulatory, total sample received and reported
					$str="SELECT SUM(`qua_nonreg`+`eco_nonreg`)as nonreg, SUM(`qua_reg`+`eco_reg`)as reg, SUM(`total`)as total  FROM `sample_transaction` WHERE sample_id=4 ";

					$getSample=$db->getAssoc($con, $str, array());

					if($getSample){
						return $getSample;
					}

				}

				public function rowiseSampleReceivedNCAll($db, $con)
				{
			//Can be received as non regulatory, regulatory, total sample received and reported
					$str="SELECT SUM(`qua_nonreg`+`eco_nonreg`)as nonreg, SUM(`qua_reg`+`eco_reg`)as reg, SUM(`total`)as total  FROM `sample_transaction` WHERE sample_id IN (6,7,8,9)";

					$getSample=$db->getAssoc($con, $str, array());

					if($getSample){
						return $getSample;
					}

				}

				public function rowiseRevenueReceivedCAll($db, $con)
				{
			//Can be received as non regulatory, regulatory, total sample received and reported
					$str="SELECT SUM(`rev_qua_nonreg`+`rev_eco_nonreg`)as nonreg, SUM(`rev_qua_reg`+`rev_eco_reg`)as reg, ROUND(SUM(`rev_total`),2)as total  FROM `revenue_transaction` WHERE revenue_label_id=7 ";

					$getSample=$db->getAssoc($con, $str, array());

					if($getSample){
						return $getSample;
					}

				}

				public function rowiseRevenueReceivedNCAll($db, $con)
				{
					

			//Can be received as non regulatory, regulatory, total sample received and reported
					$str="SELECT SUM(rt.rev_qua_nonreg+rt.rev_eco_nonreg)as nonreg, SUM(rt.rev_qua_reg+rt.rev_eco_reg)as reg,  ROUND(SUM(rt.rev_total),2) as total FROM revenue_transaction as rt LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  WHERE  r.is_commercial=:is_commercial";

					$getSample=$db->getAssoc($con, $str, array('is_commercial'=>'N'));

					if($getSample){
						return $getSample;
					}

				}




				





				/*---------------------------------------------------*/


		//Between Range...............................
		//..............................................
		//..............................................


				public function getRangeSampleTransaction($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT st.sample_transaction_id, st.sample_id, SUM(st.qua_nonreg)as qua_nonreg, SUM(st.eco_nonreg)as eco_nonreg, SUM(st.qua_reg)as qua_reg, SUM(st.eco_reg)as eco_reg, SUM(st.total)as total, st.month, st.year, st.publish_date, st.modify_date, st.user_id, st.ro_id, s.sample_name FROM sample_transaction as st LEFT JOIN sample as s ON st.sample_id=s.sample_id WHERE st.user_id=:user_id AND st.enter_date BETWEEN $start_date and $end_date
					GROUP BY st.sample_id";

					$getSampleTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getSampleTransaction){
						return $getSampleTransaction;
					}
				}
				
				public function getRangeRevenueTransaction($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT rt.revenue_transaction_id, rt.revenue_label_id, r.revenue_label_name, ROUND(SUM(rt.rev_qua_nonreg),2)as rev_qua_nonreg,
					ROUND(SUM(rt.rev_eco_nonreg),2 )as rev_eco_nonreg, 
					ROUND(SUM(rt.rev_qua_reg),2)as rev_qua_reg , 
					ROUND(SUM(rt.rev_eco_reg),2)as rev_eco_reg,
					ROUND(SUM(rt.rev_total), 2)as rev_total, 
					rt.month, rt.year, rt.publish_date, rt.modify_date, rt.user_id, rt.ro_id
					FROM revenue_transaction as rt
					LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id WHERE rt.user_id=:user_id AND rt.enter_date BETWEEN $start_date and $end_date GROUP BY rt.revenue_label_id";

					$getRevenueTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getRevenueTransaction)
					{
						return $getRevenueTransaction;
					}
				}
				
				public function getRangeTrainingList($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT `training_program_id`, `organisation_name`, `training_date`, `participant_no`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `training_program` WHERE `user_id`=:user_id AND enter_date BETWEEN $start_date and $end_date";

					$getTrainingList=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getTrainingList){
						return $getTrainingList;
					}
				}
				
				
				public function getRangeActivityTransactionList($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT at.activity_transaction_id, at.activity_id, at.organisation_name, at.date_of_commencement, at.date_of_completion, at.remark, at.amount, at.gst_amount, at.month, at.year, at.publish_date, at.modify_date, at.user_id, a.activity_name 
					FROM `activity_transaction` as at LEFT JOIN activity as a ON a.activity_id=at.activity_id WHERE at.user_id=:user_id AND at.enter_date BETWEEN $start_date and $end_date";

					$getActivityList=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getActivityList)
					{
						return $getActivityList;
					}
				}
				
				public function getRangeMeetTransactionList($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT mt.meet_transaction_id, mt.meet_id, mt.meet_date, mt.place, mt.participant, mt.remark, mt.description, mt.month, mt.year, mt.publish_date, mt.modify_date, mt.user_id, m.meet_name
					FROM meet_transaction as mt
					LEFT JOIN meet as m ON m.meet_id=mt.meet_id WHERE mt.user_id=:user_id AND mt.enter_date BETWEEN $start_date and $end_date";

					$getMeetList=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getMeetList){
						return $getMeetList;
					}
				}
				
				public function getRangeTechnicalConsultancy($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT `technical_consultancy_id`, `name_of_sme`, `consultancy_type`, `amount`, `gst_amount`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `technical_consultancy` WHERE `user_id`=:user_id AND enter_date BETWEEN $start_date and $end_date ";

					$getConsultancyList=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getConsultancyList){
						return $getConsultancyList;
					}
				}
				
				public function getRangeDisposeTransaction($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT dt.dispose_item_transaction_id, dt.dispose_item_id, dt.date_of_dispose, dt.date_of_after_dispose, dt.amount, dt.remark, dt.month, dt.year, dt.publish_date, dt.modify_date, dt.user_id, d.dispose_item_name
					FROM dispose_item_transaction as dt
					LEFT JOIN dispose_item as d ON dt.dispose_item_id=d.dispose_item_id WHERE dt.user_id=:user_id AND dt.enter_date BETWEEN $start_date and $end_date ";

					$getDisposeTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getDisposeTransaction){
						return $getDisposeTransaction;
					}
				}		
				
				
				public function getRangeExpenditureTransaction($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT et.expenditure_transaction_id, et.expenditure_label_id, SUM(et.amount)as amount, GROUP_CONCAT(et.remark)as remark, et.month, et.year, et.publish_date, et.modify_date, et.user_id, e.expenditure_label_name
					FROM expenditure_transaction as et
					LEFT JOIN expenditure_label as e 
					ON e.expenditure_label_id=et.expenditure_label_id 
					WHERE et.user_id=:user_id AND et.enter_date BETWEEN $start_date and $end_date GROUP BY et.expenditure_label_id";

					$getExpenditureTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getExpenditureTransaction){
						return $getExpenditureTransaction;
					}
				}
				
				
				public function getRangeStockPosition($db, $con, $user_id, $start_date, $end_date)
				{
					$str="SELECT st.stock_position_transaction_id, st.stock_position_label_id, st.stock_position_adequate, st.action, st.month, st.year, st.publish_date, st.modify_date, st.user_id, s.stock_position_label_name
					FROM stock_position_transaction as st
					LEFT JOIN stock_position_label as s on s.stock_position_label_id=st.stock_position_label_id
					WHERE st.user_id=:user_id AND et.enter_date BETWEEN $start_date and $end_date";

					$getStockTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id));

					if($getStockTransaction){
						return $getStockTransaction;
					}
				}

				
		/*
		public function getCurrentEquipmentTransaction($db, $con, $user_id, $month, $year)
		{
			$str="SELECT et.equipment_transaction_id, et.equipment_id, et.parameter_name, et.test_performed, et.remark, et.month, et.year, et.publish_date, et.modify_date, et.user_id, e.equipment_name
				FROM equipment_transaction as et
				LEFT JOIN equipment as e ON et.equipment_id=e.equipment_id
				WHERE et.user_id=:user_id AND et.month=:month AND et.year=:year ";

			$getEquipmentTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getEquipmentTransaction){
				return $getEquipmentTransaction;
			}
		}


		public function getCurrentNonWorkingEquipment($db, $con, $user_id, $month, $year)
		{
			$str="SELECT ew.equipment_nonworking_id, ew.equipment_id, ew.problem, ew.action, ew.month, ew.year, ew.user_id, ew.publish_date, ew.modify_date, e.equipment_name 
				FROM equipment_nonworking as ew
				LEFT JOIN equipment as e On ew.equipment_id=e.equipment_id
				WHERE ew.user_id=:user_id AND ew.month=:month AND ew.year=:year ";

			$getEquipmentTransaction=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getEquipmentTransaction){
				return $getEquipmentTransaction;
			}
		}

		public function getCurrentCustomer($db, $con, $user_id, $month, $year)
		{
			$str="SELECT `customer_id`, `customer_name`, `test_sample`, `amount`, `month`, `year`, `user_id`, `publish_date`, `modify_date` FROM `customer`  
				WHERE user_id=:user_id AND month=:month AND year=:year ";

			$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getCustomer){
				return $getCustomer;
			}
		}

		public function getCurrentBulkCustomer($db, $con, $user_id, $month, $year)
		{
			$str="SELECT `bulk_customer_id`, `bulk_customer_name`, `sample_received`, `sample_reported`, `sample_pending`, `testing_charges`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` FROM `bulk_customer` 
				WHERE user_id=:user_id AND month=:month AND year=:year ";

			$getCustomer=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getCustomer){
				return $getCustomer;
			}
		}

		public function getCurrentMarketingActivity($db, $con, $user_id, $month, $year)
		{
			$str="SELECT `marketing_activity_id`, `company_name`, `company_type`, `contact_person`, `contact_number`, `email`, `visited_date`, `sample_received`, `customer_response`, `specific_requirement`, `remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date` FROM `marketing_activity` WHERE user_id=:user_id AND month=:month AND year=:year ";

			$getMarketingActivity=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getMarketingActivity){
				return $getMarketingActivity;
			}
		}

		

		public function getCurrentDesignationList($db, $con, $user_id, $month, $year)
		{
			$str="SELECT mp.manpower_available_id, mp.designation_id, SUM(mp.from_lab)as from_lab, SUM(mp.from_other) as from_other, SUM(mp.from_lab+mp.from_other) as total, mp.month, mp.year, mp.user_id, mp.publish_date, mp.modify_date, d.designation_name
				FROM manpower_available as mp
				LEFT JOIN designation as d ON mp.designation_id=d.designation_id 
				WHERE mp.user_id=:user_id AND mp.month=:month AND mp.year=:year 
				GROUP BY mp.designation_id";

			$getCurrentDesignationList=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getCurrentDesignationList){
				return $getCurrentDesignationList;
			}

		}

		public function getCurrentManpowerUtilisation($db, $con, $user_id, $month, $year)
		{
			$str="SELECT `manpower_transaction_id`, `technical_manpower`, `working_day`, `extra_man_day`, `addtional_working`, `total_a`, `special_work`, `deputation`, `leave_day`, `total_b`, `total_c`, `total_s`, `average_op`, `total_p`, `average_pm`, `month`, `year`, `publish_date`, `modify_date`, `user_id` FROM `manpower_transaction` WHERE user_id=:user_id AND month=:month AND year=:year ";

			$getCurrentDesignationUtil=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getCurrentDesignationUtil){
				return $getCurrentDesignationUtil;
			}

		}





		*/
		//...........................................................
		//...........................................................
		public function addPageHistory($db, $con, $user_id, $page_name, $enter_date)
		{

			$getRecord=$db->getAssoc($con, "SELECT page_name from page_history WHERE page_name=:page_name AND user_id=:user_id AND enter_date=:enter_date ", array('page_name'=>$page_name, 'user_id'=>$user_id, 'enter_date'=>$enter_date));

			if($getRecord)
			{
				
			}
			else
			{

				$str="INSERT INTO `page_history`(`page_name`, `month`, `year`, `enter_date`, `user_id`, `publish_date`) VALUES (:page_name, :month, :year, :enter_date, :user_id, :publish_date)";

				$valarray=array(
					'page_name'=>$page_name, 
					'month'=>date("m", strtotime($enter_date)),
					'year'=>date("Y", strtotime($enter_date)),
					'enter_date'=>$enter_date,
					'user_id'=>$user_id,
					'publish_date'=>date("Y-m-d H:i:s")
				);

				$addPageHistory=$db->setData($con, $str, $valarray);

			}

			
		}




		//Calculation Part
		public function getCurrentCount($db, $con, $user_id, $month, $year)
		{
			$str="SELECT   SUM(mp.from_lab+mp.from_other) as total
			FROM manpower_available as mp
			LEFT JOIN designation as d ON mp.designation_id=d.designation_id 
			WHERE mp.user_id=:user_id AND mp.month=:month AND mp.year=:year AND d.is_count=:is_count ";

			$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year, 'is_count'=>'Y'));

			if($getCount){
				return $getCount[0]['total'];
			}

		}

		public function getCurrentSampleCount($db, $con, $user_id, $month, $year)
		{
			$val=0;
			$str="SELECT SUM(total) as  total FROM `sample_transaction` WHERE sample_id IN(4,6,7,8,9) AND user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			}

			if($getCount){
				$val= $getCount[0]['total'];
			}
			return $val;
		}


		public function getCurrentSampleCountTypewise($db, $con, $user_id, $month, $year, $req)
		{
			$val=0;

			if($req=='Y')
			{

				$str="SELECT COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND st.user_id=:user_id AND st.month=:month AND st.year=:year AND st.sample_id IN(4) ";

			}
			else{

				$str="SELECT COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND st.user_id=:user_id AND st.month=:month AND st.year=:year ";

			}


			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('is_commercial'=>$req ,'user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{


				$getCount=$db->getAssoc($con, $str, array('is_commercial'=>$req ,'user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				$val= $getCount[0]['total'];
			}
			return $val;

		}



		public function getCurrentRevenueCount($db, $con, $user_id, $month, $year)
		{
			$val=0;
			
			$str="SELECT  COALESCE(SUM(rev_total),0) as total FROM `revenue_transaction` WHERE revenue_label_id IN(7) AND user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{


				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				$val= $getCount[0]['total'];
			}
			return $val;

		}

		public function getCurrentRevenueCountNotional($db, $con, $user_id, $month, $year)
		{
			$val=0;
			
			$str="SELECT  COALESCE(SUM(rt.rev_total),0) as total FROM revenue_transaction as rt LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  WHERE rt.user_id=:user_id AND rt.month=:month AND rt.year=:year AND r.is_commercial=:is_commercial";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year, 'is_commercial'=>'N'));

			}else{



				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year, 'is_commercial'=>'N' ));

			}

			if($getCount){
				$val= $getCount[0]['total'];
			}
			return $val;

		}

		public function getCurrentTrainingCount($db, $con, $user_id, $month, $year)
		{	
			$str="SELECT  SUM(participant_no) as participant_no, SUM(amount) as amount FROM `training_program` WHERE   user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{


				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}
		}

		public function getCurrentActivityCount($db, $con, $user_id, $month, $year)
		{	
			$str="SELECT SUM(amount)as amount, SUM(gst_amount) as gst_amount FROM `activity_transaction` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{



				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			}

			if($getCount){
				
				return $getCount;
			}
		}

		public function getCurrentTechnicalConsultingCount($db, $con, $user_id, $month, $year)
		{	
			$str="SELECT SUM(amount)as amount, SUM(gst_amount)as gst_amount  FROM `technical_consultancy` WHERE  user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{


				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}
		}

		public function getCurrentMeetCount($db, $con, $user_id, $month, $year)
		{
			
			
			$str="SELECT  SUM(participant) as participant FROM `meet_transaction` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{


				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}		
		}

		public function getCurrentDisposeCount($db, $con, $user_id, $month, $year)
		{
			
			
			$str="SELECT SUM(amount) as amount FROM `dispose_item_transaction` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}		

		}	


		public function getCurrentExpenditureCount($db, $con, $user_id, $month, $year)
		{
			$val=0;
			$str="SELECT SUM(amount) as  total FROM `expenditure_transaction` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				$val= $getCount[0]['total'];
			}
			return $val;
		}



		public function getCurrentEquipment($db, $con, $user_id, $month, $year)
		{
			$str="SELECT SUM(test_performed) as total
			FROM equipment_transaction 
			WHERE  user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			}

			// print_r($getCount);die();

			if($getCount){
				return $getCount[0]['total'];
			}

		}

		public function getCurrentCustomerCount($db, $con, $user_id, $month, $year)
		{
			
			
			$str="SELECT  SUM(test_sample) as test_sample, SUM(amount)as amount FROM `customer` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}		
		}

		public function getCurrentMarketingCount($db, $con, $user_id, $month, $year)
		{
			
			
			$str="SELECT SUM(sample_received) as sample_receive FROM `marketing_activity` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			}

			if($getCount){
				
				return $getCount;
			}		
		}

		public function getCurrentBulkCount($db, $con, $user_id, $month, $year)
		{
			$str="SELECT SUM(sample_reported) as sample_reported, SUM( testing_charges)as testing_charges  FROM `bulk_customer` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}		
		}

		public function getCurrentTatkalCount($db, $con, $user_id, $month, $year)
		{
			$str="SELECT SUM(tatkal_sample_reported) as tatkal_sample_reported, SUM( tatkal_testing_charges)as tatkal_testing_charges  FROM `tatkal_customer` WHERE user_id=:user_id AND month=:month AND year=:year ";

			if($user_id=='1'){

				$ro_id = $_SESSION['ro_id'];

				$user_id1=$db->getUserIdByRoId($db, $con,$ro_id);

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id1[0]['user_id'], 'month'=>$month, 'year'=>$year));

			}else{

				$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			}

			if($getCount){
				
				return $getCount;
			}		
		}




		public function rowiseSampleReceivedC($db, $con, $user_id)
		{
			//Can be received as non regulatory, regulatory, total sample received and reported
			$str="SELECT SUM(`qua_nonreg`+`eco_nonreg`)as nonreg, SUM(`qua_reg`+`eco_reg`)as reg, SUM(`total`)as total  FROM `sample_transaction` WHERE sample_id=4 AND user_id=:user_id";

			$getSample=$db->getAssoc($con, $str, array('user_id'=>$user_id));

			if($getSample){
				return $getSample;
			}

		}

		public function rowiseSampleReceivedNC($db, $con, $user_id)
		{
			//Can be received as non regulatory, regulatory, total sample received and reported
			//SELECT SUM(`qua_nonreg`+`eco_nonreg`)as nonreg, SUM(`qua_reg`+`eco_reg`)as reg, SUM(`total`)as total  FROM `sample_transaction` WHERE sample_id=4 AND user_id=:user_id
			$str="SELECT SUM(`qua_nonreg`+`eco_nonreg`)as nonreg, SUM(`qua_reg`+`eco_reg`)as reg, SUM(`total`)as total  FROM `sample_transaction` WHERE user_id=:user_id AND sample_id IN (6,7,8,9)";

			$getSample=$db->getAssoc($con, $str, array('user_id'=>$user_id));

			if($getSample){
				return $getSample;
			}

		}

		public function rowiseRevenueReceivedC($db, $con, $user_id)
		{
			//Can be received as non regulatory, regulatory, total sample received and reported
			$str="SELECT SUM(`rev_qua_nonreg`+`rev_eco_nonreg`)as nonreg, SUM(`rev_qua_reg`+`rev_eco_reg`)as reg, ROUND(SUM(`rev_total`),2)as total  FROM `revenue_transaction` WHERE revenue_label_id=7 AND user_id=:user_id";

			$getSample=$db->getAssoc($con, $str, array('user_id'=>$user_id));

			if($getSample){
				return $getSample;
			}

		}

		public function rowiseRevenueReceivedNC($db, $con, $user_id)
		{
			//SELECT  SUM(rt.rev_total) as total FROM revenue_transaction as rt LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  WHERE rt.user_id=:user_id AND rt.month=:month AND rt.year=:year AND r.is_commercial=:is_commercial

			//Can be received as non regulatory, regulatory, total sample received and reported
			$str="SELECT SUM(rt.rev_qua_nonreg+rt.rev_eco_nonreg)as nonreg, SUM(rt.rev_qua_reg+rt.rev_eco_reg)as reg,  ROUND(SUM(rt.rev_total),2) as total FROM revenue_transaction as rt LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  WHERE rt.user_id=:user_id AND  r.is_commercial=:is_commercial";

			$getSample=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'is_commercial'=>'N'));

			if($getSample){
				return $getSample;
			}

		}



		public function checkPageExist($db, $con, $user_id, $page_name, $enter_date)
		{
			$val = 0;
			$conditions = [];
			$bind = [];

			if ($page_name) {
				$conditions[] = 'page_name = :page_name';
				$bind['page_name'] = $page_name;
			}
			if ($user_id) {
				$conditions[] = 'user_id = :user_id';
				$bind['user_id'] = $user_id;
			}
			if ($enter_date) {
				$conditions[] = 'enter_date = :enter_date';
				$bind['enter_date'] = $enter_date;
			}

			$str = 'SELECT `page_history_id`, `page_name`, `month`, `year`, `enter_date`, `user_id`, `publish_date`, `modify_date` FROM `page_history` WHERE ' . implode(' AND ', $conditions);

			$getRecord = $db->getAssoc($con, $str, $bind);

			// print_r($getRecord);die();

			if ($getRecord) {
				$val = 1;
			}

			// print_r($val);die();

			return $val;
		}


		public function checkSubmitted($db, $con, $user_id, $month, $year)
		{
			$val=0;
			$str="SELECT `finalsubmit_id`,  `publish_date` FROM `finalsubmit` WHERE `user_id`=:user_id AND  `month`=:month AND  `year`=:year";

			$chkFinal=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($chkFinal){
				$val=1;
			}
			return $val;
		}

		public function checkAccepted($db, $con, $user_id, $month, $year)
		{
			
			$str="SELECT is_accepted FROM `finalsubmit` WHERE `user_id`=:user_id AND  `month`=:month AND  `year`=:year";

			$chkAccept=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($chkAccept)
			{
				return $chkAccept[0]['is_accepted'];
			}
			
		}



		public function deleteAllRecord($db, $con, $user_id, $month, $year)
		{
			$val=0;

			$str="DELETE FROM `sample_transaction`  WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `revenue_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `training_program` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `activity_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `meet_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `technical_consultancy` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `dispose_item_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `expenditure_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `stock_position_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `equipment_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `equipment_nonworking` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `customer` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `marketing_activity` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `bulk_customer` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `tatkal_customer` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `manpower_available` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));
			$str="DELETE FROM `manpower_transaction` WHERE user_id=:user_id AND month=:month AND year=:year";
			$val=$db->setData($db->con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($val){
				return 1;
			}
		}

		public function clearPageHistory($db, $con, $user_id, $month, $year)
		{
			$val=0;
			$str="DELETE FROM `page_history` WHERE `user_id`=:user_id AND `month`=:month AND `year`=:year";

			$clearPageHistory=$db->setData($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($clearPageHistory){
				$val=1;
			}

			return $val;
		}

		public function clearManpower($db, $con, $user_id, $month, $year)
		{
			$val=0;
			$str="DELETE FROM `manpower_available` WHERE `user_id`=:user_id AND `month`=:month AND `year`=:year";

			$clearDegignation=$db->setData($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($clearDegignation)
			{
				$str2="DELETE FROM `manpower_transaction` WHERE `user_id`=:user_id AND `month`=:month AND `year`=:year";

				$clearTransaction=$db->setData($con, $str2, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

				if($clearTransaction){

					$str3="DELETE FROM `page_history` WHERE `page_name`=:page_name AND `user_id`=:user_id AND `month`=:month AND `year`=:year";

					$clearPage=$db->setData($con, $str3, array('page_name'=>'manpower.php', 'user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

					if($clearPage){
						$val=1;
					}


				}

			}

			return $val;

		}


		public function getSampleCountReportOne($db, $con, $user_id, $month, $year, $req)
		{

			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}			

			

			if($req=='Y')
			{

				$str="SELECT COALESCE(SUM(st.qua_nonreg+st.eco_nonreg),0)as nonreg,
				COALESCE(SUM(st.qua_reg+st.eco_reg),0)as reg,
				COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND st.user_id=:user_id AND st.sample_id IN(4) AND st.enter_date Between :s_date AND :enter_date";

			}
			else{

				$str="SELECT COALESCE(SUM(st.qua_nonreg+st.eco_nonreg),0)as nonreg,
				COALESCE(SUM(st.qua_reg+st.eco_reg),0)as reg,
				COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND st.user_id=:user_id  AND st.enter_date Between :s_date AND :enter_date";

			}			

			$getCount=$db->getAssoc($con, $str, array('is_commercial'=>$req ,'user_id'=>$user_id, 's_date'=>$s_date, 'enter_date'=>$enter_date));

			if($getCount){
				return $getCount;
			}
			

		}

		public function getSampleCountReportOneAllRO($db, $con,  $month, $year, $req)
		{
			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}			

			

			if($req=='Y')
			{//commercial
				
				$str="SELECT COALESCE(SUM(st.qua_nonreg+st.eco_nonreg),0)as nonreg,
				COALESCE(SUM(st.qua_reg+st.eco_reg),0)as reg,
				COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial AND  st.sample_id IN(4) AND st.enter_date Between :s_date AND :enter_date";

			}
			else{
			//non-commercial

				$str="SELECT COALESCE(SUM(st.qua_nonreg+st.eco_nonreg),0)as nonreg,
				COALESCE(SUM(st.qua_reg+st.eco_reg),0)as reg,
				COALESCE(SUM(st.total),0) as  total FROM sample_transaction as st LEFT JOIN sample as s ON s.sample_id=st.sample_id WHERE s.is_commercial=:is_commercial  AND st.enter_date Between :s_date AND :enter_date";

			}			

			$getCount=$db->getAssoc($con, $str, array('is_commercial'=>$req ,'s_date'=>$s_date, 'enter_date'=>$enter_date));

			if($getCount){
				return $getCount;
			}
			
		}


		public function getRevenueCountReportOne($db, $con, $user_id, $month, $year)
		{

			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}

			$str="SELECT 
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0)as nonreg,
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as reg,
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0) +
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as total 
			FROM revenue_transaction as rt 						
			WHERE rt.revenue_label_id IN(7) AND rt.user_id=:user_id  AND rt.enter_date BETWEEN :s_date AND :enter_date ";

			//$str="SELECT 
			//			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)+round(rt.rev_eco_nonreg/100000,2)),0)as nonreg,
			//			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)+round(rt.rev_eco_reg/100000,2)), 0)as reg,
			//			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)+round(rt.rev_eco_nonreg/100000,2)),0)+COALESCE(SUM(round(rt.rev_qua_reg/100000,2)+round(rt.rev_eco_reg/100000,2)), 0) as total 
			//			FROM revenue_transaction as rt 						
			//			WHERE rt.revenue_label_id IN(7) AND rt.user_id=:user_id  AND rt.enter_date BETWEEN :s_date AND :enter_date ";

			
			$getCount=$db->getAssoc($con, $str, array( 'user_id'=>$user_id, 's_date'=>$s_date, 'enter_date'=>$enter_date));

			if($getCount){
				return $getCount;
			}
			

		}

		public function getRevenueCountReportOneAllRo($db, $con, $month, $year)
		{
			
			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}

			$str="SELECT 
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0)as nonreg,
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as reg,
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0) +
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as total 
			FROM revenue_transaction as rt 						
			WHERE rt.revenue_label_id IN(7) AND rt.enter_date BETWEEN :s_date AND :enter_date";

			$getCount=$db->getAssoc($con, $str, array('s_date'=>$s_date, 'enter_date'=>$enter_date) );

			if($getCount){
				return $getCount;
			}
			

		}

		public function getRevenueCountReportOneNR($db, $con, $user_id, $month, $year)
		{

			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}

			
			$str="SELECT 
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0) as nonreg,
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as reg,
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0) +
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as total 
			FROM revenue_transaction as rt 
			LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  
			WHERE rt.user_id=:user_id AND  r.is_commercial=:is_commercial AND rt.enter_date BETWEEN :s_date AND :enter_date";

			$getCount=$db->getAssoc($con, $str, array( 'user_id'=>$user_id, 'is_commercial'=>'N', 's_date'=>$s_date, 'enter_date'=>$enter_date));

			if($getCount){
				return $getCount;
			}
			

		}

		public function getRevenueCountReportOneAllRoNR($db, $con, $month, $year)
		{
			
			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}
			


			$str="SELECT 
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0) as nonreg,
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as reg,
			COALESCE(SUM(round(rt.rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_nonreg/100000,2)),0) +
			COALESCE(SUM(round(rt.rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rt.rev_eco_reg/100000,2)),0) as total
			FROM revenue_transaction as rt 
			LEFT JOIN revenue_label as r ON r.revenue_label_id=rt.revenue_label_id  
			WHERE r.is_commercial=:is_commercial AND rt.enter_date BETWEEN :s_date AND :enter_date";

			$getCount=$db->getAssoc($con, $str, array('is_commercial'=>'N','s_date'=>$s_date, 'enter_date'=>$enter_date) );

			if($getCount){
				return $getCount;
			}
			

		}



		public function getReportCurrentRevenueCount($db, $con, $user_id, $month, $year)
		{
			$val=0;
			



			$str="SELECT  COALESCE(SUM(round(rev_qua_nonreg/100000,2)),0) +
			COALESCE(sum(round(rev_eco_nonreg/100000,2)),0) +
			COALESCE(SUM(round(rev_qua_reg/100000,2)),0) +
			COALESCE(sum(round(rev_eco_reg/100000,2)),0) as total FROM `revenue_transaction` WHERE revenue_label_id IN(7) AND user_id=:user_id AND month=:month AND year=:year ";

			$getCount=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'month'=>$month, 'year'=>$year));

			if($getCount){
				$val= $getCount[0]['total'];
			}
			return $val;

		}

		public function getNotifications($db, $con, $user_id)
		{

			$str="SELECT `notification_id`, `notification_msg`, `user_id`, `month`, `year`, `is_active`, `publish_date`, `modify_date` FROM `notification` WHERE `user_id`=:user_id AND is_active=:is_active";

			$notification=$db->getAssoc($con, $str, array('user_id'=>$user_id, 'is_active'=>'Y'));

			if($notification)
			{
				return $notification;
			}
		}

		public function nicetime($date)
		{
			if(empty($date)) {
				return "No date provided";
			}

			$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
			$lengths         = array("60","60","24","7","4.35","12","10");

			$now             = time();
			$unix_date         = strtotime($date);

       		// check validity of date
			if(empty($unix_date)) 
			{   
				return "Bad date";
			}

    		// is it future date or past date
			if($now > $unix_date) 
			{   
				$difference     = $now - $unix_date;
				$tense         = "ago";

			} 
			else 
			{
				$difference     = $unix_date - $now;
				$tense         = "from now";
			}

			for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
				$difference /= $lengths[$j];
			}

			$difference = round($difference);

			if($difference != 1) {
				$periods[$j].= "s";
			}

			return "$difference $periods[$j] {$tense}";
		}

		public function getKVICCount($db, $con, $user_id, $month, $year)
		{
			$str="SELECT `bulk_customer_id`, `bulk_customer_name`,  
			COALESCE ((sample_reported), 0) as sample_reported, 
			COALESCE ((testing_charges), 0) as   testing_charges,  
			`remark`, `month`, `year`, `user_id`, `publish_date`, `modify_date`, `enter_date` 
			FROM `bulk_customer` 
			WHERE user_id=:user_id AND  month=:month AND year=:year AND  `bulk_customer_name` LIKE '%kvic' ";

			$valarray=array(
				'user_id'=>$user_id,
				'month'=>$month,
				'year'=>$year
			);

			$getKVIC=$db->getAssoc($con, $str, $valarray);

			if($getKVIC){
				return $getKVIC;
			}
		}

		public function getKVICCountAllRo($db, $con, $user_id, $month, $year)
		{

			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$enter_date=date(($year).'-'.$month.'-'.$d, strtotime('last day of previous month'));

			if($month==1 || $month==2 || $month==3)
			{
				$s_date=($year-1)."-04-30";
				$year=($year-1);
			}
			else
			{
				$s_date=($year)."-04-30";
			}

			$str="SELECT  COALESCE (SUM(sample_reported), 0) as sample_reported,  
			COALESCE (SUM(testing_charges), 0) as   `testing_charges`, 
			GROUP_CONCAT(remark) as remark 
			FROM bulk_customer 
			WHERE user_id=:user_id AND  enter_date BETWEEN :s_date AND :enter_date AND  `bulk_customer_name` LIKE '%kvic' ";

			$valarray=array(
				'user_id'=>$user_id,
				's_date'=>$s_date,
				'enter_date'=>$enter_date
			);

			$getKVIC=$db->getAssoc($con, $str, $valarray);

			if($getKVIC){
				return $getKVIC;
			}
		}





	}//end of class

?>	