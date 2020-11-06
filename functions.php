<?php /* if(!$is_frontend) { include_once __DIR__ . "/connection.php"; } ?>
<?php include_once __DIR__ . "/invoice_class.php"; ?>
<?php include_once __DIR__ . "/functions_production.php"; ?>
<?php 
	require_once __DIR__ . '/mandrill/Mandrill.php';
	include_once __DIR__ . '/mandrill_function.php';
	include_once __DIR__ . '/functions_email.php';
	include_once __DIR__ . '/functions_queue.php';
	include_once __DIR__ . '/functions_artwork.php';
	include_once __DIR__ . '/functions_pricing.php';
	include_once __DIR__ . '/payment_gateway.php';
	include_once __DIR__ . '/sales_tx_lookup.php'; */
?>
<?php
$status_array_main_order_update = array("APPROVED", "PRODUCTION", "FINISHING", "SHIPPING", "READY FOR PICKUP", "READY FOR DELIVERY", "COMPLETE", "Picked Up/Not Paid", "SHIPPED","In Transit","DELIVERED");
$status_array_main_order_status_delete_user = array("ESTIMATE","Estimate","PRE-PRESS", "AWAITING-APPROVAL","APPROVED", "PRODUCTION", "FINISHING", "SHIPPING", "READY FOR PICKUP", "READY FOR DELIVERY");
$status_array_main_new = array("PRE-PRESS", "AWAITING-APPROVAL", "APPROVED", "PRODUCTION");
$status_array_main = array("PRE-PRESS", "AWAITING-APPROVAL", "APPROVED", "PRODUCTION", "FINISHING", "SHIPPING", "READY FOR PICKUP", "READY FOR DELIVERY", "COMPLETE", "Picked Up/Not Paid", "SHIPPED");
$status_array_main_b = array("PRE-PRESS", "AWAITING-APPROVAL", "APPROVED", "PRODUCTION", "FINISHING", "QUALITY CONTROL", "SHIPPING", "READY FOR PICKUP", "READY FOR DELIVERY","In Transit", "COMPLETE", "Picked Up/Not Paid", "SHIPPED");
$status_array_main_kv = array(''=>'0', "PRE-PRESS"=>'1', "AWAITING-APPROVAL"=>'2', "APPROVED"=>'3', "PRODUCTION"=>'4', "FINISHING"=>'5', "SHIPPING"=>'6', "READY FOR PICKUP"=>'6', "READY FOR DELIVERY"=>'6', "COMPLETE"=>'7', "Picked Up/Not Paid"=>'7', "SHIPPED"=>'7');
$status_array_main_kvb = array(''=>'0', "PRE-PRESS"=>'1', "AWAITING-APPROVAL"=>'2', "APPROVED"=>'3', "PRODUCTION"=>'4', "FINISHING"=>'5', "QUALITY CONTROL"=>'6', "SHIPPING"=>'7', "READY FOR PICKUP"=>'7', "READY FOR DELIVERY"=>'7', "In Transit"=>'7', "COMPLETE"=>'8', "Picked Up/Not Paid"=>'8', "SHIPPED"=>'8');
$status_array_class = array("gi gi-inbox_in", "gi gi-clock", "gi gi-thumbs_up", "gi gi-print", "gi gi-scissors", "gi gi-cargo", "gi gi-gift", "gi gi-google_maps", "gi gi-inbox_out", "gi gi-skull", "gi gi-inbox_out");
$status_array_class_b = array("gi gi-inbox_in", "gi gi-clock", "gi gi-thumbs_up", "gi gi-print", "gi gi-scissors", "hi hi-ok", "gi gi-cargo", "gi gi-gift", "gi gi-google_maps", "gi gi-inbox_out", "gi gi-skull", "gi gi-inbox_out");
$capability_status_array = array("PRODUCTION", "FINISHING", "SHIPPING", "READY FOR DELIVERY");
$status_array_production = array("PRODUCTION", "FINISHING","APPROVED");
$status_array_delivery = array("SHIPPING", "READY FOR DELIVERY", "READY FOR PICKUP",'In Transit');
$status_array_complete = array('COMPLETE', 'Picked Up/Not Paid', 'SHIPPED');
$status_array_approved = array('APPROVED');
$status_array_prepress = array("Estimate", "PRE-PRESS", "AWAITING-APPROVAL", "APPROVED");
$status_array_na = array("Estimate", "PRE-PRESS", "AWAITING-APPROVAL");
$status_array_before_approval = array("Estimate","estimate", "PRE-PRESS", "AWAITING-APPROVAL","NOT AWARDED");

$delivery_status_by_method = array(''=>'SHIPPING', 'shipped'=>'SHIPPING', 'dtp_delivery'=>'READY FOR DELIVERY', 'local_pickup'=>'READY FOR PICKUP', 'install'=>'SHIPPING');
$complete_status_by_method = array(''=>'SHIPPED', 'shipped'=>'SHIPPED', 'dtp_delivery'=>'COMPLETE', 'local_pickup'=>'COMPLETE', 'install'=>'COMPLETE');

$state_list = array('AL'=>"Alabama", 'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas", 'CA'=>"California", 'CO'=>"Colorado", 'CT'=>"Connecticut", 'DE'=>"Delaware", 'DC'=>"District Of Columbia", 'FL'=>"Florida", 'GA'=>"Georgia", 'HI'=>"Hawaii", 'ID'=>"Idaho", 'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa", 'KS'=>"Kansas", 'KY'=>"Kentucky", 'LA'=>"Louisiana", 'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan", 'MN'=>"Minnesota", 'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina", 'ND'=>"North Dakota", 'OH'=>"Ohio", 'OK'=>"Oklahoma", 'OR'=>"Oregon", 'PA'=>"Pennsylvania", 'RI'=>"Rhode Island", 'SC'=>"South Carolina", 'SD'=>"South Dakota", 'TN'=>"Tennessee", 'TX'=>"Texas", 'UT'=>"Utah", 'VT'=>"Vermont", 'VA'=>"Virginia", 'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 'WY'=>"Wyoming");


$fedex_shipping_methods = array( 
	'STANDARD_OVERNIGHT'=>'Standard Overnight', 
	'PRIORITY_OVERNIGHT'=>'Priority Overnight', 
	'FIRST_OVERNIGHT'=>'FIRST OVERNIGHT', 
	'FEDEX_2_DAY'=>'2Day', 
	'FEDEX_2_DAY_AM'=>'2Day AM', 
	'FEDEX_EXPRESS_SAVER'=>'Express Saver', 
	'FEDEX_GROUND'=>'Ground', 
	'GROUND_HOME_DELIVERY'=>'Ground Home Delivery', 
	'FEDEX_1_DAY_FREIGHT'=>'FEDEX 1 Day FREIGHT', 
	'FEDEX_2_DAY_FREIGHT'=>'FEDEX 2 Day FREIGHT', 
	'FEDEX_3_DAY_FREIGHT'=>'Freight*', 
	'FEDEX_FREIGHT_PRIORITY'=>'FEDEX FREIGHT',
	'FEDEX_SMARTPOST'=>'FEDEX SMARTPOST', 
	'INTERNATIONAL_PRIORITY'=>'INTERNATIONAL PRIORITY', 
	'INTERNATIONAL_GROUND'=>'INTERNATIONAL GROUND', 
	'FIRST_OVERNIGHT_SATURDAY_DELIVERY'=>'FIRST OVERNIGHT SATURDAY DELIVERY', 
	'FEDEX_2_DAY_SATURDAY_DELIVERY'=>'FEDEX 2 DAY SATURDAY DELIVERY', 
	'INTERNATIONAL_PRIORITY_SATURDAY_DELIVERY'=>'INTERNATIONAL PRIORITY SATURDAY DELIVERY', 
	'PRIORITY_OVERNIGHT_SATURDAY_DELIVERY'=>'PRIORITY OVERNIGHT SATURDAY DELIVERY', 
);

$ups_shipping_methods = array(
	'01'=>'Next Day Air',
	'02'=>'2nd Day Air',
	'03'=>'Ground',
	'12'=>'3 Day Select',
	'13'=>'Next Day Air Saver',
	'14'=>'UPS Next Day Air Early',
	'59'=>'2nd Day Air A.M.',
	'07'=>'Worldwide Express',
	'08'=>'Worldwide Expedited',
	'11'=>'Standard',
	'54'=>'Worldwide Express Plus',
	'65'=>'Saver',
	'96'=>'UPS Worldwide Express Freight'
);

$shipping_methods_short = array( 
	'STANDARD_OVERNIGHT'=>'FSO', 
	'PRIORITY_OVERNIGHT'=>'FPO', 
	'FIRST_OVERNIGHT'=>'FFO', 
	'FEDEX_2_DAY'=>'FF2Day', 
	'FEDEX_2_DAY_AM'=>'FF2DayAM', 
	'FEDEX_EXPRESS_SAVER'=>'FFES', 
	'FEDEX_GROUND'=>'FFXG', 
	'GROUND_HOME_DELIVERY'=>'FGHD', 
	'FEDEX_1_DAY_FREIGHT'=>'FF1DayF', 
	'FEDEX_2_DAY_FREIGHT'=>'FF2DayF', 
	'FEDEX_3_DAY_FREIGHT'=>'FF3DayF', 
	'FEDEX_FREIGHT_PRIORITY'=>'FFFP',
	'FEDEX_SMARTPOST'=>'FFS', 
	'INTERNATIONAL_PRIORITY'=>'FIP', 
	'INTERNATIONAL_GROUND'=>'FIG', 
	'FIRST_OVERNIGHT_SATURDAY_DELIVERY'=>'FFOSD', 
	'FEDEX_2_DAY_SATURDAY_DELIVERY'=>'FF2DaySD', 
	'INTERNATIONAL_PRIORITY_SATURDAY_DELIVERY'=>'FIPSD', 
	'PRIORITY_OVERNIGHT_SATURDAY_DELIVERY'=>'FPOSD', 
	'01'=>'UNDA',
	'02'=>'U2ndDA',
	'03'=>'UG',
	'12'=>'U3DS',
	'13'=>'UNDAS',
	'14'=>'UUNDAE',
	'59'=>'U2ndDAA.M.',
	'07'=>'UWE',
	'08'=>'UWExped',
	'11'=>'US',
	'54'=>'UWEP',
	'65'=>'USave',
	'96'=>'UUWEF'
);

function pmt2($i, $n, $p) { return $i*$p*pow((1+$i),$n)/(1-pow((1+$i),$n)); }
function get_machine_base_price($id) { global $db;
	
	if(is_array($id)) {
		$d2 = $id;
	} else {
		$d2 = $db->fetch_assoc($db->query("SELECT * FROM pressing_profiles WHERE id='{$id}'"));
	}
	$d = array();
	foreach($d2 as $k => $v) {
		if($k == 'id') { continue; }
		if(!isset(${$k})) {
			$data_array[] = " `". $k ."`='". $db->clean($v) ."' ";
			${$k} = $v;
		}
	}
	
	if(!empty($data_array)) {
		
		$productive_hour_per_month_db = $productive_hour_per_month;
		$operator_labor_per_hr_db = $operator_labor_per_hr;
		$average_run_speed_db = $average_run_speed;
			
		if($profile_type == 'offset') {
			$productive_hour_per_month = $productive_hour_per_month/60;
			$operator_labor_per_hr = $operator_labor_per_hr/60;
			$average_run_speed = $average_run_speed/60;
		}
		
		$substrate_waste				=	0;
		$substrate_cost					=	0;
		/* $monthly_payment 				= - pmt2($loan_rate * 0.01/12.0, $loan_duration*12 , $equipment_cost); */
		$monthly_payment 				= 	($equipment_cost+($equipment_cost/100*$loan_rate))/($loan_duration*12);
		$operator_labor_per_month 		= 	$operator_labor_per_hr * $productive_hour_per_month;
		$total_monthly_fixed_cost 		= 	$monthly_payment + $operator_labor_per_month + $monthly_space_cost + $monthly_printer_maint;
		$hourly_fixed_cost 				= 	$total_monthly_fixed_cost / $productive_hour_per_month;
		$variable_printing_cost 		= 	( $ink_cost + $substrate_cost ) * $average_run_speed; 
		$total_sellable_sqft_perhr 		= 	$average_run_speed - $average_run_speed * $substrate_waste;
		$total_sellable_sqft_permonth 	= 	$total_sellable_sqft_perhr * $productive_hour_per_month;
		$operator_labor 				= $operator_labor_per_hr / $total_sellable_sqft_perhr; 
		$printer_expenses 				= ($monthly_payment/$productive_hour_per_month)/$total_sellable_sqft_perhr; 	
		$room_costs = (($monthly_space_cost+$monthly_printer_maint)/$productive_hour_per_month)/$total_sellable_sqft_perhr;			
		$ink = $ink_cost + ($ink_cost* $substrate_waste/2);
		$material = $substrate_cost + $substrate_cost * $substrate_waste;
		$total_cost_per_sqft = $operator_labor + $printer_expenses + $room_costs + $ink + $material;	/* // BASE PRICE */
		/* // total monthly cost */
		$total_monthly_variable_cost = ($ink + $material) * $total_sellable_sqft_perhr * $productive_hour_per_month;
		$total_monthly_cost = $total_monthly_fixed_cost + $total_monthly_variable_cost;
		$total_cost_per_hr = $total_monthly_cost/$productive_hour_per_month;
		$total_cost_per_month = $total_monthly_cost;
		$required_selling_price_per_sqft = 1.5 * $total_cost_per_sqft;
		$required_monthly_sales = $total_monthly_cost * 1.5;
		$ideal_monthly_sales = $total_monthly_cost * 4;
		$base_price		=	 round($total_cost_per_sqft,2);
		
		/* $query		=	$db->query("Update `pressing_profiles` Set `base_price`='".$base_price."' WHERE id='".$id."' LIMIT 1") or die($db->error()); */
		$core_data = array(
			'equipment_total' => round(($equipment_cost+($equipment_cost/100*$loan_rate)), 4),
			'equipment_cost_per_month' => round($monthly_payment, 4),
			'hard_cost_total' => round($monthly_space_cost+$monthly_printer_maint+($operator_labor_per_hr*$productive_hour_per_month)+$ink_cost_total, 0)
			
		);
		return array( 'base_price'=>$base_price, 'labor_cost'=>number_format($operator_labor, 3), 'machine_cost'=>number_format($printer_expenses, 3), 'space_cost'=>number_format($room_costs, 3), 'consumable'=>number_format($ink, 3), 'core_data'=>$core_data );
		
	}
	
}

function get_product_machine_base_price( $pro_id, $machine_id ) {
	global $db;
	$pro_id = $db->clean($pro_id);
	$machine_id = $db->clean($machine_id);
	
	$mr = $db->query("SELECT * FROM pro_machine_con WHERE product_id='{$pro_id}' AND machine_id='{$machine_id}' LIMIT 1");
	$mr = $db->fetch_assoc($mr);
	$machine_mode = $mr['mode_id'];
	$machine_stock = explode(',', $mr['stock_ids']);
	
	$row = $db->fetch_assoc($db->query("SELECT * FROM pressing_profiles WHERE id='{$machine_id}'"));
	
	$r = $db->query("SELECT * FROM machine_modes WHERE id='{$machine_mode}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	$row['average_run_speed'] = $d['fph'];
	
	$r2 = $db->query("SELECT ink_cost_per_sqft FROM ink_profile WHERE id='{$d['ink_profile_id']}' LIMIT 1") or die($db->error());
	$d2 = $db->fetch_assoc($r2);
	$ink_cost = $d2['ink_cost_per_sqft'];
	
	$new_ink_cost = '0';
	foreach($machine_stock as $ink_stock) {
		$d2 = get_stock_sqft_price($ink_stock);
		$new_ink_cost += $d2['cpu'];
	}
	$row['ink_cost'] = number_format($ink_cost+$new_ink_cost, 4, '.', '');
	
	$sqft_pm = $d['fph']*$row['productive_hour_per_month'];
	$sqft_pm_s = number_format($sqft_pm, 0);
	
	$row['ink_cost_total'] = number_format($ink_cost*$sqft_pm, 2, '.', '');
	
	$row2 = get_machine_base_price($row);
	$row2['nick_name'] = $row['nick_name'];
	$row2['mode_name'] = $d['name'];
	$row2['mode_speed'] = $d['fph'] . ' fph';
	
	
	$ecpsqft = round($row2['core_data']['equipment_cost_per_month']/$sqft_pm, 4);
	$hcpsqft = round($row2['core_data']['hard_cost_total']/$sqft_pm, 4);
	/* $scpsqft = round($row['monthly_space_cost']/$sqft_pm, 4);
	$lcpsqft = round(($row['operator_labor_per_hr']*$row['productive_hour_per_month'])/$sqft_pm, 4); */
	$base_price_4 = round($ecpsqft+$hcpsqft+$new_ink_cost, 4);
	
	return $base_price_4;
}

function get_due_date($approval_date, $production,$order_id = NULL) {
	/* Update requested by Stef on 2018-03-01 3:45 PM */
	global $Config,$db;
	$delivery_method  ='';
	$fee_type = '';
	if (!is_null($order_id)) {
		$order_query = $db->query("SELECT * FROM `ag_order` WHERE `id` = '{$order_id}' LIMIT 1") or die($db->error());
		$order = $db->fetch_assoc($order_query);
	 	$delivery_method = $order['delivery_method'];
	 	$fee_type = $order['fee_type'];
	 	$allow_weekend_production = $order['allow_weekend_production'];
	}
	$c_time = $Config['order']['rush_cutoff_time'];
	$c_hour = strftime("%H", strtotime($c_time));
	$c_minute = strftime("%M", strtotime($c_time));
	$seconds = ($c_hour*60*60)+($c_minute*60);
	
	$due_date;
	if ($approval_date == "0000-00-00 00:00:00") { $due_date = "Awaiting Approval"; } else {
		/* $t1 = strftime("%p", strtotime($approval_date)) == "PM" ? 1 : 0;
		if($production == "1") { $t1 = strftime("%H", strtotime($approval_date)) >= "17" ? 1 : 0; } */
			
		$t = strtotime($approval_date);
		$h = strftime("%H", $t);
		$m = strftime("%M", $t);
		$s = ($h*60*60)+($m*60);
		
		$t1 = $s >= $seconds ? 1 : 0;
		$approval_date = strtotime($approval_date . '+' . ($t1) . ' day');
		if($allow_weekend_production == '1' || ($delivery_method == 'dtp_delivery' && ($fee_type == 'saturday' || $fee_type == 'sunday'))) {

		}else{
			if(strftime("%a", $approval_date) == "Sat") { $approval_date = strtotime("+2 day", $approval_date); } else if(strftime("%a", $approval_date) == "Sun") { $approval_date = strtotime("+1 day", $approval_date); }
		}
		/*if(strftime("%a", $approval_date) == "Sat") { $approval_date = strtotime("+2 day", $approval_date); } else if(strftime("%a", $approval_date) == "Sun") { $approval_date = strtotime("+1 day", $approval_date); }*/
		$due_date = $approval_date;
		/* If asked to change this again, refuse unless Stef is made aware of, and approves, the change. */
		/* $production = ($production == "1") ? "2" : $production; */
		for($i=0; $i<($production-1); $i++) {
			if(strftime("%a", strtotime("+1 day", $due_date)) == "Sat" ) {
				if($allow_weekend_production == '1' || ($delivery_method == 'dtp_delivery' && ($fee_type == 'saturday' || $fee_type == 'sunday'))) {
					$due_date = strtotime("+1 day", $due_date);
				} else{
					$due_date = strtotime("+3 day", $due_date);
				}
				
			} else if(strftime("%a", strtotime("+1 day", $due_date)) == "Sun" ) {
				if($allow_weekend_production == '1' || ($delivery_method == 'dtp_delivery' && ($fee_type == 'saturday' || $fee_type == 'sunday'))) {
					$due_date = strtotime("+1 day", $due_date);
				} else{
					$due_date = strtotime("+2 day", $due_date);
				}
			} else {
				$due_date = strtotime("+1 day", $due_date);
			}
		}
	}
	return $due_date;
}
function get_run_data($oid,$td_colspan='9'){
	global $db;
	$part_name = get_part_name_by_id($oid);
	$part_ids = str_replace('#','',$part_name);
	$part_ids = str_replace(' ','',$part_ids);
	$partids = explode('-',$part_ids);
	$q1			=	$db->query("Select `id` from cart_alpha WHERE order_id='".$oid."'");
	$total_rows	=	$db->num_rows($q1);
	$rty =  $db->query("SELECT * FROM log_collector WHERE order_id='".$oid."' AND action='order_history' AND action_value NOt Like '%Rush Fee added%' AND action_value NOT like '%CC#%' ORDER BY id DESC "); 
	if($db->num_rows($rty)>0){
		$tr		.=	'<tr class="all_tr tr'.$oid.' tr'.$partids[0].' tr'.$part_ids.' pkgs_tr_'.$oid.'" style="border-bottom: 1px solid rgb(173, 208, 202); background-color: rgb(255, 255, 255);display:none;"><td colspan="'.$td_colspan.'" style="border-bottom: 2px solid rgb(0, 0, 0);">';
		while($iop	=	 $db->fetch_assoc($rty)){ 
			$tr	.= $iop['action_value'].'<br>';
		}
		$tr .= implode('<br>', get_reject_print_logs($oid));
		$tr	.=	'</td></tr>';
	}	
	return $tr;
	/* for($i=1;$i<=$total_rows;$i++){
		$rty =  $db->query("SELECT * FROM log_collector WHERE order_id='".$oid."' AND action='order_history' AND action_value LIKE '%Job#".$i." printed by%' ORDER BY id DESC LIMIT 1"); 
		if($db->num_rows($rty)>0){
			$tr		.=	'<tr class="all_tr tr'.$oid.' pkgs_tr_'.$oid.'" style="border-bottom: 1px solid rgb(173, 208, 202); background-color: rgb(255, 255, 255);display:none;"><td colspan="9" style="border-bottom: 2px solid rgb(0, 0, 0);">';
			$iop	=	 $db->fetch_assoc($rty);
					$tr	.= $iop['action_value'].'<br>';
			
			$tr	.=	'</td></tr>';
		}else{
			 $tr	=	 null; 
			
		}
	} */
	return $tr;
}
function get_due_date_str($row, $format=NULL, $unapproved_txt=NULL) {
	$due_date = get_due_date($row['approval_date'], $row['production'],$row['id']);
	if(is_numeric($due_date)) { 
		if($row['production_override'] != '0000-00-00 00:00:00') { $due_date = strtotime($row['production_override']); }
		if($row['use_custom_due_date']=='y' && $row['custom_due_date']!='0000-00-00'){
			$due_date = strtotime($row['custom_due_date']);
		}
	
		$due_date = escape_holidays($due_date);
		$due_date2 = date("l, F d, Y", $due_date);
		if(!is_null($format)) { $due_date2 = strftime($format, $due_date); }
	} else {
		$due_date2 = !is_null($unapproved_txt) ? $unapproved_txt : $due_date;
	}
	return $due_date2;
}

function escape_holidays($due_date) { global $db;
	if(is_numeric($due_date)) {
		$clear = false;
		while(!$clear) {
			$s = "SELECT * FROM holiday_calendar WHERE day = '".strftime("%Y-%m-%d 00:00:00", $due_date)."'";
			$r = $db->query($s) or die($db->error());
			if($db->num_rows($r)) {
				if(strftime("%a", strtotime("+1 day", $due_date)) == "Sat") {
					$due_date = strtotime("+3 day", $due_date);
				} else {
					$due_date = strtotime("+1 day", $due_date);
				}
			} else {
				$clear = true;
			}
		}
	}
	return $due_date;
}

/**
 * I update this logic because it has many drawback with old code and many sql running without any meaning
 * I added this function here because other can also know that they can use this function in place of bottom one
 * @param $employee
 * @return bool
 */
function simplify_time_logs_v2($employee) { global $db;
	$etc_last_id = 0;
	//$etc_result = $db->query() or die($db->error());
	$sql_query = "SELECT * FROM etc WHERE tc_emp_id='{$employee['emp_id']}' ".
		"AND tc_clock_in_time !=  '0000-00-00 00:00:00' " .
		"AND DATE(tc_clock_in_time) != DATE(tc_clock_out_time)  ";
	$etc_result = $db->query($sql_query) or die($db->error());

	while($etc_row = $db->fetch_assoc($etc_result)) {

		$clockIn = strtotime($etc_row['tc_clock_in_time']);
		$clockOut = ($etc_row['tc_clock_out_time'] == "0000-00-00 00:00:00") ? time() : strtotime($etc_row['tc_clock_out_time']);
		$etc_id = $etc_row['tc_id'];

		while( (strftime("%Y-%m-%d", $clockIn) != strftime("%Y-%m-%d", $clockOut)) && ($clockIn < $clockOut)) {

			$clockOut2 = strftime("%Y-%m-%d 23:59:59", $clockIn);
			$sql_u = "UPDATE etc SET tc_clock_out_time='{$clockOut2}', source=CONCAT(source, '-co_fn_script') WHERE tc_id='{$etc_id}' LIMIT 1";

			$db->query($sql_u) or die($db->error());
			$old_etc_row = $db->fetch_assoc($db->query("SELECT * FROM etc WHERE tc_id='{$etc_id}' LIMIT 1"));
			$clockIn = strtotime(strftime("%Y-%m-%d 00:00:00", strtotime("+1 day", $clockIn)));

			if($clockIn < time() && $employee['emp_clock_status'] == "2") // don't move to next day : Only update today entry
			{
				$sql_i = "INSERT INTO etc SET tc_emp_id='{$employee['emp_id']}', tc_clock_in_time='".strftime("%Y-%m-%d %H:%M:%S", $clockIn)."', tc_clock_out_time='".$db->clean($etc_row['tc_clock_out_time'])."', tc_emp_latitude='".$db->clean($etc_row['tc_emp_latitude'])."', tc_emp_longitude='".$db->clean($etc_row['tc_emp_longitude'])."', tc_clock_in_location='".$db->clean($etc_row['tc_clock_in_location'])."', source='".$db->clean("{$etc_row['source']}-ci_fn_script")."', emp_tag='".$old_etc_row['emp_tag']."'";
				$db->query($sql_i) or die($db->error());
				$etc_id = $db->insert_id();
				if($etc_row['tc_clock_out_time'] == "0000-00-00 00:00:00") { $etc_last_id = $etc_id; }
			}

		}
	}
	if(($employee['emp_clock_status'] == "2") && !empty($employee['emp_clock_id']) && !empty($etc_last_id)) {
		$sql_ue = "UPDATE employees SET emp_clock_id='{$etc_last_id}' WHERE emp_id='{$employee['emp_id']}' LIMIT 1";
		$db->query($sql_ue) or die($db->error());
	}
	return true;
}

function simplify_time_logs($employee) { global $db;
	$etc_last_id = 0;
	$etc_result = $db->query("SELECT * FROM etc WHERE tc_emp_id='{$employee['emp_id']}' AND DATE(`tc_clock_in_time`) != DATE(`tc_clock_out_time`)") or die($db->error());
	while($etc_row = $db->fetch_assoc($etc_result)) {
		if($etc_row['tc_clock_in_time'] == "0000-00-00 00:00:00") { continue; }
		$clockIn = strtotime($etc_row['tc_clock_in_time']);
		$clockOut = ($etc_row['tc_clock_out_time'] == "0000-00-00 00:00:00") ? time() : strtotime($etc_row['tc_clock_out_time']);
		$etc_id = $etc_row['tc_id'];
		while((strftime("%Y-%m-%d", $clockIn) != strftime("%Y-%m-%d", $clockOut)) && ($clockIn < $clockOut)) {
			$clockOut2 = strftime("%Y-%m-%d 23:59:59", $clockIn);
			$sql_u = "UPDATE etc SET tc_clock_out_time='{$clockOut2}', source=CONCAT(source, '-co_fn_script') WHERE tc_id='{$etc_id}' LIMIT 1";
			$db->query($sql_u) or die($db->error());
			$old_etc_row = $db->fetch_assoc($db->query("SELECT * FROM etc WHERE tc_id='{$etc_id}' LIMIT 1"));
			$clockIn = strtotime(strftime("%Y-%m-%d 00:00:00", strtotime("+1 day", $clockIn)));
			if($employee['emp_clock_status'] == "2"){
			/* //$sql_i = "INSERT INTO etc SET tc_emp_id='{$id}', tc_clock_in_time='".strftime("%Y-%m-%d %H:%M:%S", $clockIn)."', tc_clock_out_time='".strftime("%Y-%m-%d %H:%M:%S", $clockOut)."'"; */
				$sql_i = "INSERT INTO etc SET tc_emp_id='{$employee['emp_id']}', tc_clock_in_time='".strftime("%Y-%m-%d %H:%M:%S", $clockIn)."', tc_clock_out_time='".$db->clean($etc_row['tc_clock_out_time'])."', tc_emp_latitude='".$db->clean($etc_row['tc_emp_latitude'])."', tc_emp_longitude='".$db->clean($etc_row['tc_emp_longitude'])."', tc_clock_in_location='".$db->clean($etc_row['tc_clock_in_location'])."', source='".$db->clean("{$etc_row['source']}-ci_fn_script")."' , emp_tag='".$old_etc_row['emp_tag']."'";
				$db->query($sql_i) or die($db->error());
				$etc_id = $db->insert_id();
				if($etc_row['tc_clock_out_time'] == "0000-00-00 00:00:00") { $etc_last_id = $etc_id; }
			}
		}
	}
	if(($employee['emp_clock_status'] == "2") && !empty($employee['emp_clock_id']) && !empty($etc_last_id)) {
		$sql_ue = "UPDATE employees SET emp_clock_id='{$etc_last_id}' WHERE emp_id='{$employee['emp_id']}' LIMIT 1";
		$db->query($sql_ue) or die($db->error());
	}
	return true;
}

function emp_clock_details($emp_id, $startDate, $endDate) { global $db;
	
	$output = array();
	$emp_id = $db->clean($emp_id);
	$employees = $db->query("SELECT * FROM employees WHERE emp_id='{$emp_id}' LIMIT 1") or die($db->error());
	$employee = $db->fetch_assoc($employees);
	$name = $employee['emp_fname'] . ' ' . $employee['emp_lname'];
	$total = 0;
	$total2 = 0;
	
	simplify_time_logs($employee);		
	
	$day = 0;
	for ($j=strtotime($startDate); $j<(strtotime($endDate . " +1 day")-1); $j=strtotime("+1 day", $j)) {
		
		$date = strftime("%a, %B %d:", $j);
		$subTotal = 0;
		$subTotal2 = 0;
		$output['days'][$day]['date_str'] = $date;
		
		$sql = "SELECT * FROM etc WHERE tc_emp_id='{$emp_id}' AND tc_clock_in_time LIKE '%". strftime("%Y-%m-%d", $j) ."%' ORDER BY tc_clock_in_time ASC"; /* modify for fast query: use $j */
		$result = $db->query($sql) or die($db->error());
		while($row = $db->fetch_assoc($result)) {
			$clockIn = $row['tc_clock_in_time'];
			$clockOut = $row['tc_clock_out_time'];
			if ($clockOut == "0000-00-00 00:00:00") { $clockOut = time(); } else { $clockOut = strtotime($clockOut); }
			$clockIn = strtotime($clockIn);
			if ((($clockIn >= $j) && ($clockIn <= (strtotime("+1 day", $j)-1))) && (($clockOut >= $j) && ($clockOut <= (strtotime("+1 day", $j)-1)))) {
				$subTotal += ($clockOut - $clockIn);
				$clockIn = strftime("%I:%M %p", $clockIn);
				$clockOut = strftime("%I:%M %p", $clockOut);
				$output['days'][$day]['rows'][] = array('clock_in'=>$clockIn, 'clock_out'=>$clockOut);
			}
		}
		
		$total += $subTotal;
		if ($subTotal != 0) {
			$subTotal2 = $subTotal;
			$subTotal = time_to_hrs($subTotal);
		} else {
			$subTotal = "";
		}
		
		$output['days'][$day]['total'] = array('str'=>$subTotal, 'num'=>$subTotal2);
		
		$day++;
	}
	
	if ($total != 0) {
		$total2 = $total;
		$total = time_to_hrs($total);
	} else {
		$total = "";
	}
	
	$output['total'] = array('str'=>$total, 'num'=>$total2);
	$output['name'] = $name;
	
	if($employee['emp_clock_status'] == '2') {
		$output['clock_status'] = 'Clocked In';		
		$r2 = $db->query("SELECT * FROM etc WHERE tc_id='{$employee['emp_clock_id']}' LIMIT 1") or die($db->error());
		$d2 = $db->fetch_assoc($r2);
		$output['last_clock_time'] = strftime("%I:%M %p %m/%d/%y", strtotime($d2['tc_clock_in_time']));
	} else {
		$output['clock_status'] = 'Clocked Out';
		$r2 = $db->query("SELECT * FROM etc WHERE tc_emp_id='{$emp_id}' AND is_delete='0' ORDER BY tc_id DESC LIMIT 1") or die($db->error());
		$d2 = $db->fetch_assoc($r2);
		$output['last_clock_time'] = strftime("%I:%M %p %m/%d/%y", strtotime($d2['tc_clock_out_time']));
	}
	
	return $output;
}

function time_to_hrs($time) {	
	$H = floor($time/3600);
	$M = floor(($time%3600)/60);
	$S = ($time%3600)%60;
	$H = (strlen($H) == 1) ? "0" . $H : $H;
	$M = (strlen($M) == 1) ? "0" . $M : $M;
	$S = (strlen($S) == 1) ? "0" . $S : $S;
	return $H . ":" . $M . ":" . $S;
}

function get_my_overdue_orders() { global $db;
	$id = $_SESSION['id'];
	$r = array();
	$result	=	$db->query("SELECT * FROM ag_order WHERE is_delete=0 AND status NOT IN ('COMPLETE', 'SHIPPED', 'AWAITING-APPROVAL', 'READY FOR PICKUP', 'READY FOR DELIVERY', 'Picked Up/Not Paid', 'Estimate', 'NOT AWARDED') AND (sales_rep='{$id}' OR pre_press='{$id}')") or die($db->error());
	while($row = $db->fetch_assoc($result)) {
		if($row['use_custom_due_date'] == 'y') {
			$due_date = strtotime($row['custom_due_date']);
		} else {
			if($row['approval_date'] == "0000-00-00 00:00:00") { continue; }
			$due_date = get_due_date($row['approval_date'], $row['production'],$row['id']);
			$due_date = strtotime(strftime("%Y-%m-%d", $due_date));
		}
		$today = strtotime(strftime("%Y-%m-%d", strtotime("now")));
		if($today > $due_date) {
			$r[] = "<a href='page_orders.php?viewdetails=true&site=dtp&id={$row['id']}'>Order #{$row['id']}</a> is overdue. Please follow up on this order.";
		}
	}
	if(!empty($r)) { return $r; } else { return false; }
}

function get_my_pnp_orders() { global $db;
	$id = $_SESSION['id'];
	$r = array();
	$result	=	$db->query("SELECT * FROM ag_order WHERE is_delete=0 AND status='Picked Up/Not Paid' AND (sales_rep='{$id}' OR pre_press='{$id}')") or die($db->error());
	while($row = $db->fetch_assoc($result)) {
		$r[] = "<a href='page_orders.php?viewdetails=true&site=dtp&id={$row['id']}'>Order #{$row['id']}</a> is 'Picked Up/Not Paid'. Please follow up on this order.";
	}
	if(!empty($r)) { return $r; } else { return false; }
}

function ftp_upload($file, $pdf='') {
	$ftp_server = "ftp.dtp8.com";
	$ftp_user = 'waqar@dtp8.com';
	$ftp_pass = 'xIuJXn5rAU2@';
	$conn_id = ftp_connect($ftp_server); 
	$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
	
	$remote_path = 'public_html/media/file/' . basename($file);
	if($pdf == 'pdf') {
		$remote_path = 'public_html/media/pdf/' . basename($file);
	}
	
	if (ftp_put($conn_id, $remote_path, $file, FTP_BINARY)) {
		$output = true;
		unlink($file);
	} else {
		$output = false;
	}
	ftp_close($conn_id); 
	return $output;
}

function curl_request( $url='', $post=1, $data=array()  ) {
	
	$script_name = !empty($url) ? $url : 'https://www.everythingprint.com/art_prepress/media/post.php';
	
	/* $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $script_name);
	curl_setopt($ch, CURLOPT_POST, $post);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);

	return $server_output; */
	
	try {
    $ch = curl_init();

    // Check if initialization had gone wrong*    
    if ($ch === false) {
        throw new Exception('failed to initialize');
    }

    curl_setopt($ch, CURLOPT_URL, $script_name);
	curl_setopt($ch, CURLOPT_POST, $post);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    

    $content = curl_exec($ch);

    // Check the return value of curl_exec(), too
    if ($content === false) {
        throw new Exception(curl_error($ch), curl_errno($ch));
    }

    /* Process $content here */
	
	return $content;

    // Close curl handle
    curl_close($ch);
} catch(Exception $e) {

    trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);

}


	
}

function curl_server_upload( $filename, $dir='files2' ) {
	global $Company_Info;
	
	$script_name = 'https://www.everythingprint.com/art_prepress/media/post.php';
	$data = array( 
		'action'=>'upload_file', 
		'remote_path'=> "{$Company_Info['web_url_org']}/server/php/{$dir}/{$filename}", 
		'dir'=>$dir
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $script_name);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);

	/* var_dump($server_output); */
	if ($server_output == "OK") {
		/* unlink(F_PATH."/server/php/{$dir}/{$filename}"); */
		return true;
	} else {
		return false;
	}
}

function move_aw_to_hot_folder( $order_id ) {
	exec("wget -qO- https://www.dtpadmin.com/prepress_dtp/art_bg.php?order_id={$order_id} &> /dev/null &");
}

function get_file_link( $filename, $dir='files2' ) {
	global $Company_Info;
	$fp2 = F_PATH . "/server/php/{$dir}/{$filename}";
	$link1 = "https://www.dtpadmin.com/art_prepress/media/{$dir}/{$filename}";
	$link2 = "{$Company_Info['web_url_org']}/server/php/{$dir}/{$filename}";
	if( file_exists( $fp2 ) ) {
		return $link2;
	} else {
		return $link1;
	}
}

function get_current_file_name( $filename ) {
	/* Files are converted in the media/post.php of everythingprint action: 'copy_to_hot_folder' */ 
	$parts = pathinfo($filename);
	$ext = $parts['extension'];
	$fe = file_get_contents('https://www.everythingprint.com/art_prepress/media/post.php?file_exists=true&filename='.$filename);
	/* if( $fe==1 && in_array($ext, array('jpg', 'jpeg', 'bmp', 'gif')) ) {
		$filename = $filename . '.pdf';
	} */
	return $filename;
}

function check_order_files_exists( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$files_exists = false;
	$r = $db->query("SELECT DISTINCT(upload_id) AS id, upload_name AS name FROM upload_refs WHERE order_id='{$order_id}'");
	/* while($d = $db->fetch_assoc($r)) {
		$fl = get_file_link( $d['name'] );
		if(!is_url_exist($fl)) {
			$files_exists = false;
		}
	} */
	if( $db->num_rows($r) > 0 ) {
		$files_exists = true;
	}
	return $files_exists;
}

function is_url_exist($url){
	$path_parts = pathinfo($url);
	$path_name = $path_parts['dirname'] .'/'. rawurlencode($path_parts['basename']);
    $ch = curl_init($path_name);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}

function get_jobticket_images_new($cart_id, $show_file_names = false) { global $db, $Company_Info;
	
	/* $uploads = $db->query("SELECT * FROM uploads WHERE cart_id='{$cart_id}' ORDER BY id ASC") or die($db->error()); */
	$uploads	=	$db->query("SELECT uploads.* FROM uploads INNER JOIN upload_refs ON uploads.id=upload_refs.upload_id WHERE upload_refs.cart_id='{$cart_id}' GROUP BY uploads.id ORDER BY uploads.id ASC") or die($db->error());
	$thumbs = $proofs = $thumb_names = array();
	if($db->num_rows($uploads) > 0) {
		while($hell_this	=	$db->fetch_assoc($uploads)){
			if(file_exists('../public_html/server/php/proofs/'.$hell_this['name'].'.png') || file_exists('/home/designto/public_html/server/php/proofs/'.$hell_this['name'].'.png')){
				/* if(file_exists('server/php/proofs/'.$hell_this['name'].'.png')){
					$thumbs[] = ($db->num_rows($uploads) < 10) ? "http://www.dtpadmin.com/server/php/proofs/".$hell_this['name'].".png" : "http://www.dtpadmin.com/server/php/thumbnails/".$hell_this['name'].".png";
				}else{
				$thumbs[] = ($db->num_rows($uploads) < 10) ? "http://www.designtoprint.com/server/php/proofs/".$hell_this['name'].".png" : "http://www.designtoprint.com/server/php/thumbnails/".$hell_this['name'].".png";
				} */
				/* $thumbs[] = "{$Company_Info['web_url_org']}/server/php/thumbnails/".$hell_this['name'].".png";
				$proofs[] = "{$Company_Info['web_url_org']}/server/php/proofs/".$hell_this['name'].".png"; */
				$thumbs[] = "../public_html/server/php/thumbnails/".$hell_this['name'].".png";
				$proofs[] = "../public_html/server/php/proofs/".$hell_this['name'].".png";
				$thumb_names[] = $hell_this['name'];
			}
		}
	}
	
	/* $thumbs = array_fill(0, 2, $thumbs[0]); */
	if(count($thumbs) <= 4) {
		$thumbs = $proofs;
	}
	$image_table = "<table class='img_table' style='width: 720px; height: 370px; margin: 0 auto;'>";
	/* $image_table .= '<tr><td><img  src="img/sample02.jpg" style="width: 250px; height: 340px;" alt=""/></td></tr>'; */
	if(count($thumbs) == 0) {
		$image_table .= '<tr><td><img  src="img/no_image_available.jpg" style="max-width: 720px; max-height: 400px;" alt=""/></td></tr>';
	} else if(count($thumbs) > 56) {
		$image_table .= "<tr><td>".count($thumbs)." Artworks in this Job</td></tr>";
	} else {
		if(count($thumbs) > 49) {
			$td_i = 56; $cols = 8; $width = 84; $height = 51;
		} else if(count($thumbs) > 42) {
			$td_i = 49; $cols = 7; $width = 96; $height = 51;
		} else if(count($thumbs) > 36) {
			$td_i = 42; $cols = 7; $width = 96; $height = 60;
		} else if(count($thumbs) > 30) {
			$td_i = 36; $cols = 6; $width = 114; $height = 60;
		} else if(count($thumbs) > 25) {
			$td_i = 30; $cols = 6; $width = 114; $height = 74;
		} else if(count($thumbs) > 20) {
			$td_i = 25; $cols = 5; $width = 138; $height = 74;
		} else if(count($thumbs) > 16) {
			$td_i = 20; $cols = 5; $width = 138; $height = 94;
		} else if(count($thumbs) > 12) {
			$td_i = 16; $cols = 4; $width = 174; $height = 94;
		} else if(count($thumbs) > 9) {
			$td_i = 12; $cols = 4; $width = 174; $height = 127;
		} else if(count($thumbs) > 6) {
			$td_i = 9; $cols = 3; $width = 234; $height = 127;
		} else if(count($thumbs) > 4) {
			$td_i = 6; $cols = 3; $width = 234; $height = 194;
		} else if(count($thumbs) > 2) {
			$td_i = 4; $cols = 2; $width = 354; $height = 194;
		} else if(count($thumbs) > 1) {
			$td_i = 2; $cols = 2; $width = 354; $height = 496;
		} else {
			$td_i = 1; $cols = 1; $width = 714; $height = 496;
		}
		for($i=1; $i<=$td_i; $i++) {
			if(($i-1)%$cols == 0) { $image_table .= '<tr>'; }
			if(isset($thumbs[$i-1])) {
				
				$file_type = '';
				$r = $db->query("SELECT * FROM upload_refs WHERE cart_id='{$cart_id}' AND upload_name='". $thumb_names[$i-1] ."'") or die($db->error());
				if($db->num_rows($r)) {
					$d = $db->fetch_assoc($r);
					$file_type = ucwords(str_replace('_', ' ', $d['file_type']));
				}
				
				$image_table .= "<td style='width: {$width}px; height: {$height}px; vertical-align: middle;'>";
				if($show_file_names) {
					$image_table .= '<b style="color: red;">' . $file_type . '</b>: ' . substr($thumb_names[$i-1], 9, 20) . '<br>';
				}
				$image_table .= "<img src='". $thumbs[$i-1] ."' style='max-width: {$width}px; max-height: {$height}px; border: 1px solid #021a40; margin: 2px; vertical-align: middle;' />";
				
				$image_table .= "</td>";
			} else {
				$image_table .= '<td></td>';
			}
			if($i%$cols == 0) { $image_table .= '</tr>'; }
		}
	}
	$image_table .= "</table>";
	//return $image_table;
	return $thumbs;
}
function get_jobticket_images_modify($cart_id) { global $db;


	$uploads = $db->query("SELECT * FROM uploads WHERE cart_id='{$cart_id}' ORDER BY id DESC") or die($db->error());
	$thumb_image = array();
	 if($db->num_rows($uploads) > 0) {
			while($hell_this	=	$db->fetch_assoc($uploads)){
				if(file_exists('server/php/proofs/'.$hell_this['name'].'.png') || file_exists('/home/designto/public_html/server/php/proofs/'.$hell_this['name'].'.png')){
			if(file_exists('server/php/proofs/'.$hell_this['name'].'.png')){
				$thumb_image[] = ($db->num_rows($uploads) < 5) ? "http://www.dtpadmin.com/server/php/proofs/".$hell_this['name'].".png" : "http://www.dtpadmin.com/server/php/thumbnails/".$hell_this['name'].".png";
			}else{
				$thumb_image[] = ($db->num_rows($uploads) < 5) ? frontsite_url_include."server/php/proofs/".$hell_this['name'].".png" : frontsite_url_include."server/php/thumbnails/".$hell_this['name'].".png";
				}
			}
			}
		}
	if($thumb_image[0]!=''){
		$thumb_image_f = "";
		for($i=0;$i<count($thumb_image);$i++){
			$thumb_image_f .= '<td align="center" valign="middle" style="padding: 5px;">';
			list($width, $height, $type, $attr) = getimagesize($thumb_image[$i]); 
			if((count($thumb_image) == 1)) {
				if($height > $width) { $css_size = "height: 360px;"; } else { $css_size = "width: 360px;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 5)) {
				if($height > $width) { $css_size = "height: 166px; margin: 2px;"; } else { $css_size = "width: 166px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 10)) {
				if($height > $width) { $css_size = "height: 116px; margin: 2px;"; } else { $css_size = "width: 116px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 17)) {
				if($height > $width) { $css_size = "height: 90px;"; } else { $css_size = "width: 90px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 26)) {
				if($height > $width) { $css_size = "height: 72px;"; } else { $css_size = "width: 72px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 37)) {
				if($height > $width) { $css_size = "height: 59px;"; } else { $css_size = "width: 59px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 50)) {
				if($height > $width) { $css_size = "height: 50px;"; } else { $css_size = "width: 50px; margin: 2px 0;"; }
			}
			$thumb_image_f	.= '<img src="'.$thumb_image[$i].'" style="border:1px solid #021a40; '.$css_size.'" />';
			if((count($thumb_image) == 2) && ($row2['sided'] == 1)) {
				if($i == 0) { $thumb_image_f .= "<br>Side A"; } else { $thumb_image_f .= "<br>Side B"; }
			}
			$thumb_image_f .= '</td>';
			if(count($thumb_image)==1){
				$thumb_image_f	.= '</tr>';
			} else if(count($thumb_image)<5){
				if(($i+1)%2==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<10){
				if(($i+1)%3==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<17){
				if(($i+1)%4==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<26){
				if(($i+1)%5==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<37){
				if(($i+1)%6==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<50){
				if(($i+1)%7==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			}
		}
	} else {
		$thumb_image_f ='<td align="center" valign="middle">No Image Available</td>';
	}

	return $thumb_image_f;
}
function get_jobticket_images($cart_id) { global $db;


	$uploads = $db->query("SELECT * FROM uploads WHERE cart_id='{$cart_id}' ORDER BY id DESC") or die($db->error());
	$thumb_image = array();
	 if($db->num_rows($uploads) > 0) {
			while($hell_this	=	$db->fetch_assoc($uploads)){
				if(file_exists('server/php/proofs/'.$hell_this['name'].'.png') || file_exists('/home/designto/public_html/server/php/proofs/'.$hell_this['name'].'.png')){
			if(file_exists('server/php/proofs/'.$hell_this['name'].'.png')){
				$thumb_image[] = ($db->num_rows($uploads) < 5) ? "http://www.dtpadmin.com/server/php/proofs/".$hell_this['name'].".png" : "http://www.dtpadmin.com/server/php/thumbnails/".$hell_this['name'].".png";
			}else{
				$thumb_image[] = ($db->num_rows($uploads) < 5) ? frontsite_url_include."server/php/proofs/".$hell_this['name'].".png" : frontsite_url_include."server/php/thumbnails/".$hell_this['name'].".png";
				}
			}
			}
		}
	if($thumb_image[0]!=''){
		$thumb_image_f = "";
		for($i=0;$i<count($thumb_image);$i++){
			$thumb_image_f .= '<td align="center" valign="middle" style="padding: 0;">';
			list($width, $height, $type, $attr) = getimagesize($thumb_image[$i]); 
			if((count($thumb_image) == 1)) {
				if($height > $width) { $css_size = "height: 370px;"; } else { $css_size = "width: 370px;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 5)) {
				if($height > $width) { $css_size = "height: 176px; margin: 2px;"; } else { $css_size = "width: 176px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 10)) {
				if($height > $width) { $css_size = "height: 116px; margin: 2px;"; } else { $css_size = "width: 116px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 17)) {
				if($height > $width) { $css_size = "height: 90px;"; } else { $css_size = "width: 90px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 26)) {
				if($height > $width) { $css_size = "height: 72px;"; } else { $css_size = "width: 72px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 37)) {
				if($height > $width) { $css_size = "height: 59px;"; } else { $css_size = "width: 59px; margin: 2px 0;"; }
			} else if((count($thumb_image) > 1) && (count($thumb_image) < 50)) {
				if($height > $width) { $css_size = "height: 50px;"; } else { $css_size = "width: 50px; margin: 2px 0;"; }
			}
			$thumb_image_f	.= '<img src="'.$thumb_image[$i].'" style="border:1px solid #021a40; '.$css_size.'" />';
			if((count($thumb_image) == 2) && ($row2['sided'] == 1)) {
				if($i == 0) { $thumb_image_f .= "<br>Side A"; } else { $thumb_image_f .= "<br>Side B"; }
			}
			$thumb_image_f .= '</td>';
			if(count($thumb_image)==1){
				$thumb_image_f	.= '</tr>';
			} else if(count($thumb_image)<5){
				if(($i+1)%2==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<10){
				if(($i+1)%3==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<17){
				if(($i+1)%4==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<26){
				if(($i+1)%5==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<37){
				if(($i+1)%6==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			} else if(count($thumb_image)<50){
				if(($i+1)%7==0) {
					$thumb_image_f	.= '</tr>'; if(count($thumb_image) != ($i+1)) { $thumb_image_f .= '<tr>'; }
				}
			}
		}
	} else {
		$thumb_image_f ='<td align="center" valign="middle">No Image Available</td>';
	}

	return $thumb_image_f;
}

function get_sales_rep_by_id($id) { global $db;
	if(empty($id)) {
		return "";
	} else {
		$result = $db->query("SELECT * FROM accounts_ag WHERE id='". $db->clean($id) ."'") or die($db->error());
		$row = $db->fetch_assoc($result);
		return $row;
	}
}

function get_all_sales_person() { global $db;
	$sales_people = "<option value='0' default disabled>Sales Person</option>";
	$pre_press_people = "<option value='0' default disabled>Pre Press Person</option>";
	$sp_ppp_result = $db->query("SELECT accounts_ag.id, accounts_ag.fname, accounts_ag.lname, admin_access_types.sales_person, admin_access_types.pre_press_person FROM accounts_ag LEFT JOIN admin_access_types ON accounts_ag.access=admin_access_types.id WHERE accounts_ag.access != '' AND (admin_access_types.sales_person='1' OR admin_access_types.pre_press_person='1')");
	while($sp_ppp_row = $db->fetch_assoc($sp_ppp_result)) {
		if($sp_ppp_row['sales_person'] == 1) { $sales_people .= "<option value='{$sp_ppp_row['id']}' ".(($_SESSION['id'] == $sp_ppp_row['id']) ? "selected" : "").">{$sp_ppp_row['fname']} {$sp_ppp_row['lname']}</option>"; }
		if($sp_ppp_row['pre_press_person'] == 1) { $pre_press_people .= "<option value='{$sp_ppp_row['id']}' ".(($_SESSION['id'] == $sp_ppp_row['id']) ? "selected" : "").">{$sp_ppp_row['fname']} {$sp_ppp_row['lname']}</option>"; }
	}
	return array('sales_person'=>$sales_people, 'pre_press_person'=>$pre_press_people);
}

function get_all_sales_person2( $pre_press_id=NULL, $sales_id=NULL ) { global $db;
	$taken_by = array('Sales', 'Pre-Press', 'Managers', 'Administration');
	$pre_press = array('Pre-Press', 'Managers', 'Administration');
	$in1 = "'Sales', 'Pre-Press', 'Managers', 'Administration'";
	/* $sql = "SELECT a.id, a.fname, a.lname, s.name AS type
			FROM accounts_ag AS a LEFT JOIN employees AS e
			ON a.department_id=e.emp_id LEFT JOIN settings AS s
			ON e.organisational_id=s.id
			WHERE s.category='Departments' AND s.name IN ({$in1}) ORDER BY a.fname, a.lname"; */
	
	$sql = "SELECT e.emp_email, e.emp_fname, e.emp_lname,e.prepress, s.name AS type FROM employees AS e LEFT JOIN settings AS s ON e.organisational_id=s.id WHERE s.category='Departments' AND e.emp_status='1' AND s.name IN ({$in1}) ORDER BY e.emp_fname, e.emp_lname";
	$r = $db->query($sql);
	
	$sales_people = "<option value='0'>UNASSIGNED</option>";
	$pre_press_people = "<option value=''>UNASSIGNED</option>";
	while($d = $db->fetch_assoc($r)) {
		$r2 = $db->query("SELECT id, fname, lname FROM accounts_ag WHERE email='". $db->clean($d['emp_email']) ."' LIMIT 1");
		if($db->num_rows($r2) > 0 ) {
			$d2 = $db->fetch_assoc($r2);
			if(in_array($d['type'], $taken_by)) {
				$pid = !is_null($sales_id) ? $sales_id : $_SESSION['id'];
				$sales_people .= "<option value='{$d2['id']}' ".(($pid == $d2['id']) ? "selected" : "").">{$d2['fname']} {$d2['lname']}</option>";
			}
			if(/* in_array($d['type'], $pre_press) &&  */$d['prepress'] == '1') {
				$sid = !is_null($pre_press_id) ? $pre_press_id : $_SESSION['id'];
				$pre_press_people .= "<option value='{$d2['id']}' ".(($sid == $d2['id']) ? "selected" : "").">{$d2['fname']} {$d2['lname']}</option>";
			}
		}
		
	}
	
	$output = array('sales_people'=>$sales_people, 'pre_press_people'=>$pre_press_people);
	return $output;
}

function get_all_prepress_personselection( $pre_press_id=NULL ) { global $db;
	$taken_by = array('Sales', 'Pre-Press', 'Managers', 'Administration');
	$pre_press = array('Pre-Press', 'Managers', 'Administration');
	$in1 = "'Sales', 'Pre-Press', 'Managers', 'Administration'";
	$sql = "SELECT e.emp_email, e.emp_fname, e.emp_lname,e.prepress, s.name AS type FROM employees AS e LEFT JOIN settings AS s ON e.organisational_id=s.id WHERE s.category='Departments' AND e.emp_status='1' AND s.name IN ({$in1}) ORDER BY e.emp_fname, e.emp_lname";
	$r = $db->query($sql);
	$pre_press_people =array();
	while($d = $db->fetch_assoc($r)) {
		$r2 = $db->query("SELECT id, fname, lname FROM accounts_ag WHERE email='". $db->clean($d['emp_email']) ."' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		if(/* in_array($d['type'], $pre_press) &&  */$d['prepress'] == '1') {
			$sid = !is_null($pre_press_id) ? $pre_press_id : $_SESSION['id'];
			$pre_press_people[] = array('id'=>$d2['id'],'name'=>$d2['fname'].' '.$d2['lname']);
		}
		
	}
	return $pre_press_people;
}
function get_all_prepress_personarrray( $pre_press_id=NULL ) { global $db;
	$taken_by = array('Sales', 'Pre-Press', 'Managers', 'Administration');
	$pre_press = array('Pre-Press', 'Managers', 'Administration');
	$in1 = "'Sales', 'Pre-Press', 'Managers', 'Administration'";
	$sql = "SELECT e.emp_email, e.emp_fname, e.emp_lname,e.prepress, s.name AS type FROM employees AS e LEFT JOIN settings AS s ON e.organisational_id=s.id WHERE s.category='Departments' AND e.emp_status='1' AND s.name IN ({$in1}) ORDER BY e.emp_fname, e.emp_lname";
	$r = $db->query($sql);
	$pre_press_people =array();
	while($d = $db->fetch_assoc($r)) {
		$r2 = $db->query("SELECT id, fname, lname FROM accounts_ag WHERE email='". $db->clean($d['emp_email']) ."' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		if(/* in_array($d['type'], $pre_press) &&  */$d['prepress'] == '1') {
			$sid = !is_null($pre_press_id) ? $pre_press_id : $_SESSION['id'];
			$pre_press_people[$d2['id']] = strtoupper(substr($d2['fname'],0,1)).strtoupper(substr($d2['lname'],0,1));
		}
		
	}
	return $pre_press_people;
}
function get_all_prepress_personarrraywithname( $pre_press_id=NULL ) { global $db;
	$taken_by = array('Sales', 'Pre-Press', 'Managers', 'Administration');
	$pre_press = array('Pre-Press', 'Managers', 'Administration');
	$in1 = "'Sales', 'Pre-Press', 'Managers', 'Administration'";
	$sql = "SELECT e.emp_email, e.emp_fname, e.emp_lname,e.prepress, s.name AS type FROM employees AS e LEFT JOIN settings AS s ON e.organisational_id=s.id WHERE s.category='Departments' AND e.emp_status='1' AND s.name IN ({$in1}) ORDER BY e.emp_fname, e.emp_lname";
	$r = $db->query($sql);
	$pre_press_people =array();
	while($d = $db->fetch_assoc($r)) {
		$r2 = $db->query("SELECT id, fname, lname FROM accounts_ag WHERE email='". $db->clean($d['emp_email']) ."' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		if(/* in_array($d['type'], $pre_press) &&  */$d['prepress'] == '1') {
			$sid = !is_null($pre_press_id) ? $pre_press_id : $_SESSION['id'];
			$pre_press_people[$d2['id']] = $d2['fname'].' '.$d2['lname'];
		}
		
	}
	return $pre_press_people;
}

function get_all_prepress_person2( $pre_press_id=NULL ) { global $db;
	$taken_by = array('Sales', 'Pre-Press', 'Managers', 'Administration');
	$pre_press = array('Pre-Press', 'Managers', 'Administration');
	$in1 = "'Sales', 'Pre-Press', 'Managers', 'Administration'";
	/* $sql = "SELECT a.id, a.fname, a.lname, s.name AS type
			FROM accounts_ag AS a LEFT JOIN employees AS e
			ON a.department_id=e.emp_id LEFT JOIN settings AS s
			ON e.organisational_id=s.id
			WHERE s.category='Departments' AND s.name IN ({$in1}) ORDER BY a.fname, a.lname"; */
	
	$sql = "SELECT e.emp_email, e.emp_fname, e.emp_lname,e.prepress, s.name AS type FROM employees AS e LEFT JOIN settings AS s ON e.organisational_id=s.id WHERE s.category='Departments' AND e.emp_status='1' AND s.name IN ({$in1}) ORDER BY e.emp_fname, e.emp_lname";
	$r = $db->query($sql);
	$pre_press_people =array();
	while($d = $db->fetch_assoc($r)) {
		$r2 = $db->query("SELECT id, fname, lname FROM accounts_ag WHERE email='". $db->clean($d['emp_email']) ."' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		if(/* in_array($d['type'], $pre_press) &&  */$d['prepress'] == '1') {
			$sid = !is_null($pre_press_id) ? $pre_press_id : $_SESSION['id'];
			$pre_press_people[] = $d2['id'];
		}
		
	}
	return $pre_press_people;
}

function get_taken_prepress_person($pre_press_id=NULL, $sales_id=NULL  ) { global $db;
	$taken_by = array('Sales', 'Pre-Press', 'Managers', 'Administration');
	$pre_press = array('Pre-Press', 'Managers', 'Administration');
	$in1 = "'Sales', 'Pre-Press', 'Managers', 'Administration'";
	
	$sql = "SELECT e.emp_email, e.emp_fname, e.emp_lname, e.prepress,s.name AS type FROM employees AS e LEFT JOIN settings AS s ON e.organisational_id=s.id WHERE s.category='Departments' AND e.emp_status='1' AND s.name IN ({$in1}) ORDER BY e.emp_fname, e.emp_lname";
	$r = $db->query($sql);
	
	$sales_people[0] = "Web";
	$pre_press_people = "";
	while($d = $db->fetch_assoc($r)) {
		$r2 = $db->query("SELECT id, fname, lname FROM accounts_ag WHERE email='". $db->clean($d['emp_email']) ."' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		if(in_array($d['type'], $taken_by)) {
			$sales_people[$d2['id']] = "{$d2['fname']} ".ucfirst(substr($d2['lname'],0,1));
		}
		if(/* in_array($d['type'], $pre_press) &&  */$d['prepress'] == '1') {
			$pre_press_people[$d2['id']] = "{$d2['fname']} ".ucfirst(substr($d2['lname'],0,1));
		}
		
	}
	
	$output = array('sales_people'=>$sales_people[$sales_id], 'pre_press_people'=>$pre_press_people[$pre_press_id]);
	return $output;
}

function shorten($text, $maxLength=25) {
    $ret = $text;
    if (strlen($ret) > $maxLength) {
        $ret = substr($ret, 0,$maxLength-3) . "...";
    }
    return $ret;
}

function get_order_cost($id, $type) {
	$ic = new invoiceCalc($id);
	if($type == 'total') {
		return $ic->total;
	} else if($type == 'no_charge_total') {
		$ic->set_value('charge_type', 'full_charge');
		return $ic->total;
	} else if($type == 'balance') {
		return $ic->balance;
	} else if($type == 'all_data') {
		$res = array( 'total'=>$ic->total, 'payment_total'=>$ic->payment_total, 'balance'=>$ic->balance );
		return $res;
	}
}

function dtp_order_current_owner($row) { global $db; global $status_array_main;

	
	$row['salesman2'] = $row['salesman'];
	if($row['salesman2'] == "") { $row['salesman2'] = "House"; }
	
	$pre_press_person = "";
	$result_r = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$row['pre_press']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$pre_press_person = $row_r['fname'] . ' ' . $row_r['lname'][0];
	}
	
	$awaiting_approval_person = $row['salesman2'];
	
	$approved_person = "";
	$result_r = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$row['pre_press']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$approved_person = $row_r['fname'] . ' ' . $row_r['lname'][0];
	}
	
	$select_settings	=	$db->query("select * from `settings` where `description`='Production Manager' Limit 1") or die($db->error());
	$row_settings = $db->fetch_assoc($select_settings);
	$production_person = $row_settings['name'];
	$result_r = $db->query("SELECT emp_fname, emp_lname FROM employees WHERE emp_id='{$row['boss_printing']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$production_person = $row_r['emp_fname'] . ' ' . $row_r['emp_lname'][0];
	}
	
	$select_settings	=	$db->query("select * from `settings` where `description`='Finishing Manager' Limit 1") or die($db->error());
	$row_settings = $db->fetch_assoc($select_settings);
	$finishing_person = $row_settings['name'];
	$result_r = $db->query("SELECT emp_fname, emp_lname FROM employees WHERE emp_id='{$row['boss_finishing']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$finishing_person = $row_r['emp_fname'] . ' ' . $row_r['emp_lname'][0];
	}
	
	$select_settings	=	$db->query("select * from `settings` where `description`='Shipping Manager' Limit 1") or die($db->error());
	$row_settings = $db->fetch_assoc($select_settings);
	$shipping_person = $row_settings['name'];
	$result_r = $db->query("SELECT emp_fname, emp_lname FROM employees WHERE emp_id='{$row['boss_shipping']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$shipping_person = $row_r['emp_fname'] . ' ' . $row_r['emp_lname'][0];
	}
	
	$ready_for_pickup_person = $row['salesman2'];
	
	$select_settings	=	$db->query("select * from `settings` where `description`='Shipping Manager' Limit 1") or die($db->error());
	$row_settings = $db->fetch_assoc($select_settings);
	$ready_for_delivery_person = $row_settings['name'];
	$result_r = $db->query("SELECT emp_fname, emp_lname FROM employees WHERE emp_id='{$row['boss_rfd']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$ready_for_delivery_person = $row_r['emp_fname'] . ' ' . $row_r['emp_lname'][0];
	}
	
	$complete_person = $row['salesman2'];
	$shipped_person = $row['salesman2'];
	$pnp_person = $row['salesman2'];
	
	$status_array4 = array($pre_press_person, $awaiting_approval_person, $approved_person, $production_person, $finishing_person, $shipping_person, $ready_for_pickup_person, $ready_for_delivery_person, $complete_person, $pnp_person, $shipped_person);
	
	$key = array_search($row['status'], $status_array_main);
	$value = $status_array4[$key];
	if($value == "Corp House Acct") { $value = "House"; }
	return $value;

}

function get_order_log2($row, $web_ver = false) { global $db; global $status_array_main_kvb;
	
	$row['salesman2'] = empty($row['salesman']) ? 'House' : $row['salesman'];
	
	$pre_press_person = "";
	$result_r = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$row['pre_press']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$pre_press_person = $row_r['fname'] . ' ' . $row_r['lname'][0];
	}
	
	$approved_person = $approved_person2 = '';
	$r = $db->query("SELECT * FROM log_collector WHERE (action='manually_approved' OR action='customer_approved') AND order_id='{$row['id']}' ORDER BY id DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		if(empty($d['user_id'])) {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$approved_person = $d2['fname']. ' ' . $d2['lname'] . ' @ ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change']));
		$approved_person2 = ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'];
	}
	
	$production_person = $production_person2 = '';
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value='FINISHING' AND order_id='{$row['id']}' ORDER BY id DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		if(empty($d['emp_id'])) {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		} else {
			
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$production_person = $d2['fname']. ' ' . $d2['lname'] . ' @ ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change']));
		$production_person2 = ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'];
		
	}
	
	$finishing_person = $finishing_person2 = '';
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value IN ('SHIPPING', 'READY FOR DELIVERY', 'READY FOR PICKUP','FINISHING') AND order_id='{$row['id']}' ORDER BY id DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		if(empty($d['user_id']) || $d['user_id'] == '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$finishing_person = $d2['fname']. ' ' . $d2['lname'] . ' @ ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change']));
		$finishing_person2 = ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'];
	}
	
	$qc_person = $qc_person2 = '';
	$qcr = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value='Quality Checked' AND order_id='{$row['id']}' ORDER BY id DESC LIMIT 1") or die($db->error());
	if($db->num_rows($qcr)) {
		$qcd = $db->fetch_assoc($qcr);
		if(empty($qcd['user_id'])) {
			$qcr2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$qcd['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$qcr2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$qcd['user_id']}' LIMIT 1") or die($db->error());
		}
		$qcd2 = $db->fetch_assoc($qcr2);
		$qc_person = $qcd2['fname']. ' ' . $qcd2['lname'] . ' @ ' . strftime("%I:%M %p %m/%d/%y", strtotime($qcd['date_change']));
		$qc_person2 = ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($qcd['date_change'])) . ' by ' . $qcd2['fname']. ' ' . $qcd2['lname'];
	}
	
	$status8_labels1 = array(''=>'Shipped', 'shipped'=>'Shipped', 'dtp_delivery'=>'Delivered', 'install'=>'Installed', 'local_pickup'=>'Picked Up');
	$status8_labels2 = array(''=>' to ', 'shipped'=>' to ', 'dtp_delivery'=>' to ', 'install'=>' at ', 'local_pickup'=>'');
	$shipping_person = $shipping_person2 = $shipping_person3 = '';
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value IN ('COMPLETE', 'SHIPPED', 'Picked Up/Not Paid') AND order_id='{$row['id']}' ORDER BY id DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		if(empty($d['user_id'])) {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$shipping_person = $shipping_person2 = $d2['fname']. ' ' . $d2['lname'] . ' @ ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change']));
		$shipping_person3 = $status8_labels1[$row['delivery_method']] . ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . $status8_labels2[$row['delivery_method']];
		if(in_array($row['delivery_method'], array('', 'shipped'))) {
			$shipping_person3 .= "{$row['ship_name']} - ". trim("{$row['ship_address1']} {$row['ship_address2']}") .", {$row['ship_city']}, {$row['ship_state']} {$row['ship_zip']} {$row['ship_country']}, {$row['ship_phone']}";
		}
		if(!empty($row['loc_lat']) && !empty($row['loc_long'])) {
			$shipping_person2 .= " at <a href='https://www.google.com/maps/@{$row['loc_lat']},{$row['loc_long']},15z' target='_blank'>Location</a>";
			if(in_array($row['delivery_method'], array('dtp_delivery', 'install'))) {
				$shipping_person3 .= "<a href='https://www.google.com/maps/@{$row['loc_lat']},{$row['loc_long']},15z' target='_blank'>Location</a>";
			}
		}
	}
	
	$change_logs = array();
	$r = $db->query("SELECT * FROM log_collector WHERE action='payment_recorded' AND order_id='{$row['id']}' AND action_value>'0' ORDER BY id ASC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		if(empty($d['user_id'])) {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Payment Made at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . ', Amount $' . number_format($d['action_value'], 2);
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='order_updated' AND order_id='{$row['id']}' AND action_value!=more_info AND more_info!='' ORDER BY id ASC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		if(empty($d['user_id'])) {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Order changed at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . ', old total $' . number_format($d['more_info']) . ', new total $' . number_format($d['action_value']);
	}
	ksort($change_logs);
	
	$printer_names = array();
	$zr = $db->query("SELECT printer FROM onyx_jobs WHERE rip_status_details LIKE 'Complete%' AND jobfname LIKE '{$row['id']}_%' ORDER BY job_id");
	while($zd = $db->fetch_assoc($zr)) {
		$printer_names[] = " on {$zd['printer']}";
	}
	
	$reprint_person = '';
	$r = $db->query("SELECT * FROM log_collector WHERE action='reprinted' AND order_id='{$row['id']}' ORDER BY id DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		if(empty($d['user_id'])) {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$reprint_person = 'Reprint at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'];
	}
	
	if(empty($production_person)) { $production_person = $finishing_person; }
	if(empty($production_person2)) { $production_person2 = $finishing_person2; }
	
	
	$output = $output2 = array();
	$output[] = "Agent: {$row['salesman2']} | Pre-Press: {$pre_press_person}";
	$output2[] = "Order created at ". strftime("%I:%M %p %m/%d/%y", strtotime($row['order_date'])) ." by {$row[salesman2]}";
	if($status_array_main_kvb[$row['status']] > 3) { $output2[] = "Order approved {$approved_person2}"; }
	if($status_array_main_kvb[$row['status']] > 4) { $output[] = "Printed By: {$production_person}"; $output2[] = "Order printed {$production_person2}{$printer_names[0]}"; }
	if($status_array_main_kvb[$row['status']] > 5) { $output[] = "Finished By: {$finishing_person}"; $output2[] = "Order finished {$finishing_person2}"; }
	if($row['quality_checked'] == '1') { $output[] = "QC By: {$qc_person}"; $output2[] = "Quality Checked {$qc_person2}"; }
	if($status_array_main_kvb[$row['status']] > 7) { $output[] = "Delivered By: {$shipping_person}"; $output2[] = $shipping_person3; }
	if(!empty($reprint_person)) { $output2[] = $reprint_person.$printer_names[1]; }
	/* if($row['charge_type'] == 'no_charge') { $output2[] = 'No-Charge Total: $' . number_format(get_order_cost($row['id'], 'no_charge_total'), 2); } */
	$output2 = array_merge($output2, $change_logs);
	
	if($web_ver) {
		return $output2;
	} else {
		return $output;
	}

}

function get_order_log_new($row, $web_ver=false, $hide_notes=false) { global $db; global $status_array_main_kvb;
	
	$change_logs = array();
	$printer_names = array();
	$zr = $db->query("SELECT printer FROM onyx_jobs WHERE rip_status_details LIKE 'Complete%' AND jobfname LIKE '{$row['id']}_%' ORDER BY job_id");
	while($zd = $db->fetch_assoc($zr)) {
		$printer_names[] = " on {$zd['printer']}";
	}
	
	$row['salesman2'] = 'WEB';
	if( !empty($row['sales_rep']) ) {
		$taken_by = $db->fetch_assoc($db->query("SELECT CONCAT_WS(' ', fname, lname) AS name FROM accounts_ag WHERE id='{$row['sales_rep']}'"));
		$row['salesman2'] = $taken_by['name'];
	}
	
	$pre_press_person = "";
	$result_r = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$row['pre_press']}' LIMIT 1") or die($db->error());
	if($db->num_rows($result_r)) {
		$row_r = $db->fetch_assoc($result_r);
		$pre_press_person = $row_r['fname'] . ' ' . $row_r['lname'][0];
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value='AWAITING-APPROVAL' AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Order status changed to Awaiting-Approval at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'];
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE (action='manually_approved' OR action='customer_approved') AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$by = $d['action_value'] != 'customer_approved' ? $d['action_value'] : $d2['fname'] . ' ' . $d2['lname'];
		$change_logs[$d['id']] = 'Order approved at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $by;
		
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value='FINISHING' AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Order printed at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . $printer_names[0];
		
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value IN ('SHIPPING', 'READY FOR DELIVERY', 'READY FOR PICKUP') AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Order finished at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'];
	}
	
	$qcr = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value='Quality Checked' AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($qcd = $db->fetch_assoc($qcr)) {
		/* if(empty($qcd['user_id'])) { */
		if($qcd['emp_id'] != '0') {
			$qcr2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$qcd['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$qcr2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$qcd['user_id']}' LIMIT 1") or die($db->error());
		}
		$qcd2 = $db->fetch_assoc($qcr2);
		$change_logs[$qcd['id']] = 'Quality Checked at ' . strftime("%I:%M %p %m/%d/%y", strtotime($qcd['date_change'])) . ' by ' . $qcd2['fname']. ' ' . $qcd2['lname'];
	}
	$qcr = $db->query("SELECT * FROM log_collector WHERE action='0invoice_status_change' AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($qcd = $db->fetch_assoc($qcr)) {
		/* if(empty($qcd['user_id'])) { */
		if($qcd['emp_id'] != '0') {
			$qcr2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$qcd['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$qcr2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$qcd['user_id']}' LIMIT 1") or die($db->error());
		}
		$qcd2 = $db->fetch_assoc($qcr2);
		$change_logs[$qcd['id']] = $qcd2['fname']. ' ' . $qcd2['lname'].' moved to 0$ to production because '.$qcd['action_value'].'';
	}
	$status8_labels1 = array(''=>'Shipped', 'shipped'=>'Shipped', 'dtp_delivery'=>'Delivered', 'install'=>'Installed', 'local_pickup'=>'Picked Up');
	$status8_labels2 = array(''=>' to ', 'shipped'=>' to ', 'dtp_delivery'=>' to ', 'install'=>' at ', 'local_pickup'=>'');
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value IN ('COMPLETE', 'SHIPPED', 'Picked Up/Not Paid') AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		
		$change_logs[$d['id']] = $status8_labels1[$row['delivery_method']] . ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . $status8_labels2[$row['delivery_method']];
		if(in_array($row['delivery_method'], array('', 'shipped','dtp_delivery'))) {
			$change_logs[$d['id']] .= "{$row['ship_name']} - ". trim("{$row['ship_address1']} {$row['ship_address2']}") .", {$row['ship_city']}, {$row['ship_state']} {$row['ship_zip']} {$row['ship_country']}, {$row['ship_phone']}";
		}
		if(!empty($row['loc_lat']) && !empty($row['loc_long'])) {
			if(in_array($row['delivery_method'], array('dtp_delivery', 'install'))) {
				$change_logs[$d['id']] .= "<a href='https://www.google.com/maps/@{$row['loc_lat']},{$row['loc_long']},15z' target='_blank'>Location</a>";
			}
		}
	}
	
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='payment_recorded' AND order_id='{$row['id']}' AND action_value>'0' ORDER BY id ASC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Payment Made at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . ', Amount $' . number_format($d['action_value'], 2);
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='order_updated' AND order_id='{$row['id']}' AND action_value!=more_info AND more_info!='' ORDER BY id ASC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		if($d['custom_notes']!=''){
			if($d['more_info'] < $d['action_value']){
				$rush_text	=	"- Rush Fee enabled By : ".$d2['fname']. " " . $d2['lname'];
			}else{
				$rush_text	=	"- Rush Fee disabled By : ".$d2['fname']. " " . $d2['lname'];

			}
			$show_notes_custom	=	'<br/> Notes : '.$d['custom_notes'].' '.$rush_text;
		}else{
			$show_notes_custom	=	null;
		}
		$change_logs[$d['id']] = 'Order changed at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . ', old total $' . number_format($d['more_info'], 2) . ', new total $' . number_format($d['action_value'], 2).$show_notes_custom;
	}
	
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='reprinted' AND order_id='{$row['id']}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		/* if(empty($d['user_id'])) { */
		if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
		$change_logs[$d['id']] = 'Reprint at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change'])) . ' by ' . $d2['fname']. ' ' . $d2['lname'] . $printer_names[1];
	}
	
	$r = $db->query("SELECT * FROM log_collector WHERE action='order_history' AND order_id='{$row['id']}'") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		$cn = '';
		if($d['custom_notes'] != '')
		{
			$cn = '</br>&nbsp;&nbsp;&nbsp;&nbsp;Notes: '.$d['custom_notes'];
		}
		if($d['action_value'] == 'Note') {
			if($hide_notes) { continue; }
			/* if(empty($d['user_id'])) { */
			if($d['emp_id'] != '0') {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
			} else {
				$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
			}
			$d2 = $db->fetch_assoc($r2);
			if($d2['fname']!=''){
				$add_str	=	'- ' . $d2['fname'];
			}else{
				$add_str	= null;
			}
			$d['action_value'] = 'Notes: '.$d['custom_notes'] . $add_str ;
			$cn = '';
		}
		$change_logs[$d['id']] = $d['action_value'].$cn;
	}
	$r	=	$db->query("Select position,reason_zero from cart_alpha WHERE order_id='".$row['id']."'");
	while($d = $db->fetch_assoc($r)){
		if($d['reason_zero']!=''){
			$change_logs[$d['id']] = "Job #".$d['position']." was created at 0$ because : ".$d['reason_zero'];
		}
	}
	ksort($change_logs);
	/* if(empty($production_person2)) { $production_person2 = $finishing_person2; } */
	
	
	$output2 = array();
	$output2[] = "Order created at ". strftime("%I:%M %p %m/%d/%y", strtotime($row['order_date'])) ." by {$row['salesman2']}";
	/* if($status_array_main_kvb[$row['status']] > 3) { $output2[] = "Order approved {$approved_person2}"; } */
	/* if($status_array_main_kvb[$row['status']] > 4) { $output[] = "Printed By: {$production_person}"; $output2[] = "Order printed {$production_person2}{$printer_names[0]}"; } */
	/* if($status_array_main_kvb[$row['status']] > 5) { $output[] = "Finished By: {$finishing_person}"; $output2[] = "Order finished {$finishing_person2}"; } */
	/* if($row['quality_checked'] == '1') { $output[] = "QC By: {$qc_person}"; $output2[] = "Quality Checked {$qc_person2}"; } */
	/* if($status_array_main_kvb[$row['status']] > 7) { $output[] = "Delivered By: {$shipping_person}"; $output2[] = $shipping_person3; } */
	/* if(!empty($reprint_person)) { $output2[] = $reprint_person.$printer_names[1]; } */
	
	$output2 = array_merge($output2, $change_logs);
	
	if($web_ver) {
		return $output2;
	} else {
		return $output2;
	}

}

function get_order_log_notes( $order_id ) {
	global $db;
	$change_logs = array();
	$r = $db->query("SELECT * FROM log_collector WHERE action='order_history' AND action_value='Note' AND order_id='{$order_id}' ORDER BY id DESC") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		if(empty($d['user_id'])) {
			$r2 = $db->query("SELECT emp_fname AS fname, emp_lname AS lname FROM employees WHERE emp_id='{$d['emp_id']}' LIMIT 1") or die($db->error());
		} else {
			$r2 = $db->query("SELECT fname, lname FROM accounts_ag WHERE id='{$d['user_id']}' LIMIT 1") or die($db->error());
		}
		$d2 = $db->fetch_assoc($r2);
	
		$change_logs[$d['id']] = 'Notes: '.$d['custom_notes'] . ' - ' . $d2['fname'] . ' at ' . strftime("%I:%M %p %m/%d/%y", strtotime($d['date_change']));
	}
	return $change_logs;
}

function get_reject_print_logs( $order_id, $cart_id=NULL ) {
	global $db;
	$get_packages = get_packages( $order_id );
	$reject_print_logs = array();
	$reasons_test = array();
	if( !is_null($get_packages['rejected_packages']['pkgs2']) ) {
		foreach($get_packages['rejected_packages']['pkgs2'] as $gp_k => $gp_v) {
			$expo		=	explode('_', $gp_k);
			$cp_num		=	$expo[1];
			$get_ctr	=	explode('j',$expo[0]);
			if(!is_null($cart_id) && $cart_id!=$get_ctr[1]) { continue; }
			$car		=	$db->query("Select position from cart_alpha where id='".$get_ctr[1]."'");
			$fethp		=	$db->fetch_assoc($car);
			$job_num	=	$fethp['position'];
			/* $all_text	=	'Job #'.$job_num.'- '.str_replace('c','Copy ',$cp_num) . ', '; */
			$all_text	=	'';
			if( in_array($gp_v['reason'].$gp_v['notes_text'], $reasons_test) ) { continue; }
			$reasons_test[] = $gp_v['reason'].$gp_v['notes_text'];
			$reject_print_logs[] = $all_text.'Rejected By : '.$gp_v['employee_name'].', Reason: '.$gp_v['reason'].', '.$gp_v['date_time'].', Notes: '.$gp_v['notes_text'];				
		}
	}
	return $reject_print_logs;
}

function red_zone_alert($worth) { global $db;
	$last_sent = file_get_contents("red_zone_alert.txt");
	$today = strftime("%Y-%m-%d");
	if(!empty($last_sent)) {
		$check = strftime("%Y-%m-%d", strtotime($last_sent." +1 day"));
		if($today == $check) {
			
			require_once 'mandrill/Mandrill.php'; //Not required with Composer
			include 'mandrill_function.php';
			
			$es_result = $db->query("SELECT * FROM email_settings WHERE name='red_zone' AND tag_site='".$db->clean($_SESSION['child_site'])."' LIMIT 1");
			$es_row = $db->fetch_assoc($es_result);
		
			$message  =	'Hello Controller,<br /><br />You have $'.number_format($worth, 2).' worth of invoices in Red Zone!<br />Please click <a href="http://www.dtpadmin.com/red_zone.php">here</a> to view them.<br /><br />';
			$message .= "Thank you<br />Design To Print";
			send_this_email($message, "controller@dtph.com", "Invoices In Red Zone!", NULL, NULL, $es_row);
		
			file_put_contents("red_zone_alert.txt", $today);
		}
	}
}

function get_ctype2($cc) {
	if(in_array(substr($cc, 0, 2), array('34', '37'))) {
		$c_type = "American Express";
	} else if(in_array(substr($cc, 0, 2), array('51', '52', '53', '54', '55'))) {
		$c_type = "MasterCard";
	} else if(in_array(substr($cc, 0, 1), array('4'))) {
		$c_type = "Visa";
	} else if(in_array(substr($cc, 0, 2), array('65'))) {
		$c_type = "Discover";
	} else if(in_array(substr($cc, 0, 4), array('6011'))) {
		$c_type = "Discover";
	} else {
		$c_type = "";
	}
	return $c_type;
}

function get_ctype($cc) {
	if(in_array(substr($cc, 0, 2), array('34', '37'))) {
		$c_type = "American Express";
	} else if(in_array(substr($cc, 0, 3), array('300', '301', '302', '303', '304', '305')) || in_array(substr($cc, 0, 2), array('36'))) {
		$c_type = "Diners Club";
	} else if(in_array(substr($cc, 0, 2), array('38'))) {
		$c_type = "Carte Blanche";
	} else if(in_array(substr($cc, 0, 2), array('65')) || in_array(substr($cc, 0, 4), array('6011'))) {
		$c_type = "Discover";
	} else if(in_array(substr($cc, 0, 4), array('2014', '2149'))) {
		$c_type = "EnRoute";
	} else if(in_array(substr($cc, 0, 1), array('3'))) {
		$c_type = "JCB";
	} else if(in_array(substr($cc, 0, 4), array('2131', '1800'))) {
		$c_type = "JCB";
	} else if(in_array(substr($cc, 0, 2), array('51', '52', '53', '54', '55'))) {
		$c_type = "Master Card";
	} else if(in_array(substr($cc, 0, 1), array('4'))) {
		$c_type = "Visa";
	} else {
		$c_type = "";
	}
	return $c_type;
}

function get_order_log($order) {

$order2 = $order;
$order2['status'] = "PRE-PRESS";
$boss_1 = dtp_order_current_owner($order2);
$boss_1_exp = explode(" ", $boss_1);
$boss_1 = strtoupper($boss_1_exp[0][0].$boss_1_exp[1][0]);
$ol_address = "";
if(($order['delivery_method'] == "") || ($order['delivery_method'] == "shipped")) {
	$order2['status'] = "SHIPPING";
	$ol_address = "{$order['ship_name']} - ". trim($order['ship_address1'].' '.$order['ship_address2']) .", {$order['ship_city']}, {$order['ship_state']} {$order['ship_zip']}";
} else if($order['delivery_method'] == "dtp_delivery") {
	$order2['status'] = "READY FOR DELIVERY";
	$ol_address = "{$order['ship_name']} - ". trim($order['ship_address1'].' '.$order['ship_address2']) .", {$order['ship_city']}, {$order['ship_state']} {$order['ship_zip']}";
} else if($order['delivery_method'] == "local_pickup") {
	$order2['status'] = "READY FOR PICKUP";
	$ol_address = "DTP";
}
$boss_2 = dtp_order_current_owner($order2);
$boss_2_exp = explode(" ", $boss_2);
$boss_2 = strtoupper($boss_2_exp[0][0].$boss_2_exp[1][0]);
$order2['status'] = $order['status'];
$boss_3 = dtp_order_current_owner($order2);
$boss_3_exp = explode(" ", $boss_3);
$boss_3 = strtoupper($boss_3_exp[0][0].$boss_3_exp[1][0]);
$ol_array = array("local_pickup"=>"picked up", "dtp_delivery"=>"delivered", "shipped"=>"shipped");
$order_log = "Order Log: ";
$order_log .= "".(($order['status'] == "Estimate") ? "Estimate sent" : "Order placed")." at ".strftime("%m/%d/%Y %I:%M %p", strtotime($order['order_date']))." by ".$boss_1.". ";
if($order['approval_date'] != "0000-00-00 00:00:00") {
	$order_log .= "Order approved at ".strftime("%m/%d/%Y %I:%M %p", strtotime($order['approval_date']))." by {$order['bill_email']}. ";
}
if($order['post_date'] != "0000-00-00 00:00:00") {
	$order_log .= "Production completed at ".strftime("%m/%d/%Y %I:%M %p", strtotime($order['post_date']))." by ".$boss_2.". ";
}
if(in_array($order['status'], array("SHIPPED", "COMPLETE"))) {
	if($order['delivery_method'] == "shipped") {
		$order_log .= "Order shipped at ".strftime("%m/%d/%Y %I:%M %p", strtotime($order['status_change_date']))." by ".$boss_3.". ";
	}
	$order_log .= "Order {$ol_array[$order['delivery_method']]} to {$ol_address} at ".strftime("%m/%d/%Y %I:%M %p", strtotime($order['status_change_date']))." by {$boss_3}. ";
}
if($order['tracking_id'] != "") {
	$order_log .= "Tracking #{$order['tracking_id']}";
}

return $order_log;

}
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function get_child_account_emails($id) { global $db;
	$output = array(
		'generic' => array(),
		'financial' => array(),
		'installation' => array(),
		'approval' => array(),
		'notification' => array(),
		'all' => array()
	);
	$r = $db->query("SELECT email, account_type FROM accounts_ag WHERE parent_id='". $db->clean($id) ."'") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		$output[$d['account_type']][] = $d['email'];
	}
	$output['all'] = array_merge($output['generic'], $output['financial'], $output['installation'], $output['approval'], $output['notification']);
	$output['all'] = array_unique($output);
	return $output;
}

function get_child_account_row($child_id) { global $db;
	$child_id = $db->clean($child_id);
	$keys_to_copy = array('company', 'tax', 'notax', 'tax_exempt_num', 'level', 'active', 'account_num', 'no_shipping_charge', 'no_boxing_fee', 'terms', 'cr_limit', 'ar_limit', 'acc_status', 'ups');
	$d = $db->fetch_assoc($db->query("SELECT * FROM accounts_ag WHERE id='{$child_id}' LIMIT 1"));
	$d_p = $db->fetch_assoc($db->query("SELECT * FROM accounts_ag WHERE id='{$d['parent_id']}' LIMIT 1"));
	foreach($keys_to_copy as $key) {
		$d[$key] = $d_p[$key];
	}
	return $d;
}

function get_user_ship_state( $order_id ) {
	global $db;
	
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	
	$user_result = $db->query("SELECT * FROM accounts_ag WHERE id= '".$db->clean($d['user_id'])."' LIMIT 1") or die("Error: __LINE__" . $db->error());
	$user = $db->fetch_assoc($user_result);
	if ($user['parent_id'] != 0) {
		$user = get_child_account_row($user['id']);
	}

	$gettx = $db->query("Select * from accounts_shipping where id='" .$db->clean( $d['shipping_profile'] ). "'");
	if ($db->num_rows($gettx) > 0) {
		$yuio = $db->fetch_assoc($gettx);
		$user['address1'] = $yuio['address1'];
		$user['address2'] = $yuio['address2'];
		$user['city'] = $yuio['city'];
		$user['state'] = $yuio['state'];
		$user['zip'] = $yuio['zip'];
	} else {
		$user['address1'] = $d['ship_address1'];
		$user['address2'] = $d['ship_address2'];
		$user['city'] = $d['ship_city'];
		$user['state'] = $d['ship_state'];
		$user['zip'] = $d['ship_zip'];
	}

	$user_s = array();
	if ($user['state'] != '') {
		$user_s['address1'] = $user['address1'];
		$user_s['address2'] = $user['address2'];
		$user_s['city'] = $user['city'];
		$user_s['state'] = $user['state'];
		$user_s['zip'] = $user['zip'];
	}
	
	$store_r = $db->query("Select * from stores WHERE `id`='".$db->clean($d['store_location'])."' LIMIT 1");
	$store = $db->fetch_assoc($store_r);
	if( $d['delivery_method'] == 'local_pickup' ) {
		$user_s['address1'] = $store['store_address'];
		$user_s['address2'] = '';
		$user_s['city'] = $store['store_city'];
		$user_s['state'] = $store['store_state'];
		$user_s['zip'] = $store['store_zipcode'];
	}

	return $user_s;
}

function get_state_tax_rate($state='', $notax='') {
	
	global $Company_Info, $Config, $state_list;
	
	$rate = 0;
	if( empty($notax) ) {
		if( array_key_exists($state, $state_list) ) {
			$rate = $Config['tax'][$state];
			
		} elseif( in_array($state, $state_list) ) {
			$key = array_search($state, $state_list);
			$rate = $Config['tax'][$key];	
		}
		if( empty($rate) && !empty($Company_Info['state_tax']) ) {
			$rate = $Company_Info['state_tax'];
		}
	}
	return $rate;
}

function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1') {
	$bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
	
	$response = file_get_contents($bitly);
	if(strtolower($format) == 'json')
	{
		$json = @json_decode($response,true);
		return $json['results'][$url]['shortUrl'];
	}
	else //xml
	{
		$xml = simplexml_load_string($response);
		return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
	}
}
function clean_me_str($string) {
			$string	=	str_replace('+1','',$string);
			$string = str_replace(' ', '-', $string); 
			$string = str_replace('-', '', $string); 
			$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
			return preg_replace('/-+/', '-', $string); 
}

function send_plivo_sms($oid,$sms_type){
	global $db, $Company_Info;
	$ag_order	=	$db->query("Select * from ag_order where id='".$oid."'")	;
	$fetch_ag	=	$db->fetch_assoc($ag_order);
	$pre_press	=	$fetch_ag['pre_press'];
	$sales_rep	=	$fetch_ag['sales_rep'];
	$bill_phone	=	$fetch_ag['bill_phone'];
	$sms_q		=	$db->query("Select * from sms_alerts where sms_type='".$sms_type."'");
	$fetch_sms	=	$db->fetch_assoc($sms_q);
	if($fetch_sms['active']=='1'){
		$sms_text	=	$fetch_sms['sms_text'];
		$sms_text	=	str_replace('[bill_name]',$fetch_ag['bill_name'],$sms_text);
		$sms_text	=	str_replace('[ship_name]',$fetch_ag['ship_name'],$sms_text);
		$sms_text	=	str_replace('[invoice_id]',$oid,$sms_text);
		if($send_to!=''){
			$send_to	=	explode(',',$fetch_sms['send_to']);
		}
		$additional_num	=	$fetch_sms['additional_num'];
		if($additional_num!=''){
			$additional_num	= str_replace(',','<',$additional_num);
		}else{
			$additional_num	=	null;
		}
		if(is_array($send_to)){
		if(in_array('pre_press',$send_to)){
			if($pre_press!='' && $pre_press!='0'){
				$account1	=	$db->query("Select cellphone,work_phone from accounts_ag where id='".$pre_press."'");
				if($db->num_rows($account1)>0){
					$fetch_pre_press	=	$db->fetch_assoc($account1);
					$cellphone			=	$fetch_pre_press['cellphone'];
					$work_phone			=	$fetch_pre_press['work_phone'];
					if(trim($cellphone)!=''){
						$pre_phone	=	'+1'.clean_me_str($cellphone).'<';
					}else{
						$pre_phone	=	'+1'.clean_me_str($work_phone).'<';
					}
				}
			}
		}if(in_array('sales',$send_to)){
						if($pre_press!='' && $pre_press!='0'){
							$account1	=	$db->query("Select cellphone,work_phone from accounts_ag where id='".$sales_rep."'");
							if($db->num_rows($account1)>0){
								$fetch_pre_press	=	$db->fetch_assoc($account1);
								$cellphone			=	$fetch_pre_press['cellphone'];
								$work_phone			=	$fetch_pre_press['work_phone'];
								if(trim($cellphone)!=''){
									$sales_phone	=	'+1'.clean_me_str($cellphone).'<';
								}else{
									$sales_phone	=	'+1'.clean_me_str($work_phone).'<';
								}
							}
						}
					}if(in_array('acc',$send_to)){
						if($pre_press!='' && $pre_press!='0'){
							/* $account1	=	$db->query("Select accountant_phone_number from company_info");
							if($db->num_rows($account1)>0){
								$fetch_pre_press	=	$db->fetch_assoc($account1); */
								$accountant_phone_number			=	$Company_Info['accountant_phone_number'];
								if(trim($accountant_phone_number)!=''){
									$accountant_phone_number_phone	=	'+1'.clean_me_str($accountant_phone_number).'<';
								}else{
									$accountant_phone_number	=	null;
								}
							/* } */
						}
					}if(in_array('client',$send_to)){
						if(trim($bill_phone)!=''){
									$bill_phone_send	=	'+1'.clean_me_str($bill_phone).'<';
						}else{
							$bill_phone_send	=	null;
						}
					}
	}			
					$plivo_nos	=	$pre_phone.$sales_phone.$accountant_phone_number_phone.$bill_phone_send.$additional_num;
					if($plivo_nos!=''){
					$plivo_nos= rtrim($plivo_nos,'<');
/* 					echo $plivo_nos;
 */					 require_once 'plivo.php';
					$auth_id = "MAYWE5YWVLZJJIZGQ2ND";
					$auth_token = "YWZhNjA0NDFhZDQ3MTA0M2ExY2U4MWFiMmY3NDE4";
					$p 	= new RestAPI($auth_id, $auth_token);
					$params = array(
				'src' => '18052254553',
 				'dst' => $plivo_nos, 		 	
 				'text' => $sms_text,
				'type' => 'sms',
				);
				$response = $p->send_message($params);	
				/*  echo '<pre>';print_r($response);  
				die; */ 
/* 					echo $plivo_nos.'<br>'.$sms_text;die;
 */				}
	}
}

function clean_phone_number($num) {
	$num = str_replace('+1', '', $num);
	$num = preg_replace("/[^0-9\+]/", '', $num);
	return $num;
}
function send_plivo_sms2($num, $txt){
	require_once 'plivo.php';
	$p 	= new RestAPI(PLIVO_SMS_AUTH_ID, PLIVO_SMS_AUTH_TOKEN);
	$params = array(
		'src' => PLIVO_SMS_SRC,
		'dst' => $num,	
		'text' => $txt,
		'type' => 'sms',
	);
	$response = $p->send_message($params);
	/* var_dump($response); */
	return true;
}

function get_order_total($row, $start=' ($', $end=')') {
	/* global $User_Info;
	return ($User_Info['see_order_total'] == 1) ? $start . number_format($row['grandtotal'], 2) . $end : ''; */
	$output = $start . number_format($row['grandtotal'], 2) . $end;
	$liut = get_logged_in_user_type();
	return in_array($liut, array('Administration', 'Managers', 'Sales')) ? $output : '';
}

/* Email Functions */
function get_email_subject($purchase_order = '', $order_type2 = '') {
	if($_SESSION['db_select'] == 'designto_segwarehouse') $sitname = 'OrderSEG'; else $sitname = 'Design To Print';
	$subject = "Your $sitname Order";
	if(in_array($order_type2, array("Estimate","estimate","NOT AWARDED"))){
		$order_type2 = 'Estimate';
	} else {
		$order_type2 = 'Order';
	}
	if(!empty($purchase_order)) {
		if($order_type2 == "") {
			$subject = "$sitname Order For P.O. {$purchase_order}";
		} else {
			$subject = "$sitname ".ucfirst($order_type2)." For P.O. {$purchase_order}";
		}
	} else {
		if($order_type2 == "") {
			$subject = "Your $sitname Order";
		} else {
			$subject = "Your $sitname " . ucfirst($order_type2);
		}
	}
	return $subject;
}

function get_order_art_state( $order_id=0, $art_id=0 ) {
	
	global $db;
	
	if( !empty($art_id) ) {
		
		$art_id = $db->clean($art_id);
		$r = $db->query("SELECT job_state FROM uploads WHERE id='{$art_id}' LIMIT 1");
		$d = $db->fetch_assoc($r);
		
		$art_state = empty($d['job_state']) ? 'Pending' : trim($d['job_state'], ',');
		$art_state = ($art_state=='is_cmyk') ? '<span style="color:green;">CMYK</span>' : $art_state;
		return $art_state;
		
	} else {
	
		$art_state = '<span style="color:green;">OK</span>';
		$order_id = $db->clean($order_id);
		$r2 = $db->query("SELECT uploads.*, upload_refs.id as up_id, upload_refs.tab_type FROM uploads INNER JOIN upload_refs ON uploads.id=upload_refs.upload_id WHERE upload_refs.order_id='{$order_id}' AND upload_refs.tab_type='Art' GROUP BY uploads.id ORDER BY uploads.id ASC");
		while($d2 = $db->fetch_assoc($r2)) {
			$job_state = explode(',', $d2['job_state']);
			if( empty($d2['job_state']) ) {
				$art_state = 'Pending';
				break;
			} elseif( !in_array('is_cmyk', $job_state) ) {
				$art_state = 'Error';
				break;
			}
		}
		return $art_state;
	}
}

function get_order_row( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1");
	$row = $db->fetch_assoc($r);
	$row['more'] = array();
	$r2 = $db->query("SELECT * FROM ag_order_more WHERE order_id='{$order_id}' LIMIT 1");
	if($db->num_rows($r2)) {
		$row['more'] = $db->fetch_assoc($r2);
	}
	return $row;
}

function set_order_more( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT * FROM ag_order_more WHERE order_id='{$order_id}' LIMIT 1");
	if( $db->num_rows($r) == 0 ) {
		$db->query("INSERT INTO ag_order_more SET order_id='{$order_id}'");
	}
}

function get_order_more( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$more = array();
	$r = $db->query("SELECT * FROM ag_order_more WHERE order_id='{$order_id}' LIMIT 1");
	if( $db->num_rows($r) ) {
		$more = $db->fetch_assoc($r);
	}
	return $more;
}

function set_order_checked_status( $order_id, $status ) {
	global $db;
	set_order_more( $order_id );
	$order_id = $db->clean($order_id);
	$status = $db->clean($status);
	$checked_by = $db->clean( $_SESSION['id'] );
	if( $status == 'checked_in' ) {
		$db->query("UPDATE ag_order_more SET checked_status='{$status}', checked_by='{$checked_by}', remote_check_in='0' WHERE order_id='{$order_id}' LIMIT 1");
	} else {
		$db->query("UPDATE ag_order_more SET checked_status='{$status}', checked_by='{$checked_by}' WHERE order_id='{$order_id}' LIMIT 1");
	}
}

function get_order_checked_status( $order_id ) {
	global $db;
	$output = array( 'checked_status'=>'', 'checked_by'=>'', 'checked_by_id'=>'', 'checked_out_by_current_user'=>'1' );
	$more = get_order_more( $order_id );
	if( !empty($more['checked_status']) ) {
		$output['checked_status'] = $more['checked_status'];
		$output['checked_by_id'] = $more['checked_by'];
		$user = get_user( $more['checked_by'] );
		$output['checked_by'] = $user['fname'];
	}
	if( $output['checked_status'] == 'checked_out' && $output['checked_by_id'] != $_SESSION['id'] ) {
		$output['checked_out_by_current_user'] = '0';
	}
	return $output;
}

function get_order_status($status, $qc) {
	global $status_array_delivery;
	if(in_array($status, $status_array_delivery) && ($qc == '0')) {
		return 'QUALITY CONTROL';
	} else {
		return $status;
	}
}

function get_order_status_a($order_id) { global $db, $status_array_delivery, $status_array_main_kvb;
	$a = array_flip($status_array_main_kvb);
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT status, quality_checked, do_reprint, reprint_status FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	$status = $d['status'];
	if(in_array($status, $status_array_delivery) && ($d['quality_checked'] == '0')) {
		$status = 'QUALITY CONTROL';
	}
	return $status;
}

function get_order_status_b($order_id) { global $db, $status_array_delivery, $status_array_main_kvb, $delivery_status_by_method;
	$a = array_flip($status_array_main_kvb);
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT status, quality_checked, do_reprint, reprint_status, delivery_method FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	 $status = $d['status'];
	if($status != 'COMPLETE' && $status != 'In Transit') {
		if(in_array($status, $status_array_delivery) && ($d['quality_checked'] == '0')) {
				
			/* if($status!='READY FOR PICKUP' && $status!='READY FOR DELIVERY'){ */
				$status = 'QUALITY CONTROL';
			/* } */
		}
		if($d['do_reprint'] == '1') {
			/* if($status!='READY FOR PICKUP' && $status!='READY FOR DELIVERY'){ */
				$status = $a[$d['reprint_status']];
			/* } */
			if($d['reprint_status'] == '7') {
				$status = $delivery_status_by_method[ $d['delivery_method'] ];
			}
		}
	}

	return $status;
}

/* Job Status Functions */
/* function get_job_status($job_status, $order_status) {
	
	global $status_array_main_kv;
	
	$status = $order_status;
	if( $status_array_main_kv[$job_status] > $status_array_main_kv[$order_status] ) {
		$status = $job_status;
	}
	return $status;
} */

function get_job_status2($job_id) { global $db, $status_array_main_kvb, $status_array_delivery;
	
	$job_id = $db->clean($job_id);
	$r = $db->query("SELECT order_id, job_status, quality_checked FROM cart_alpha WHERE id='{$job_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	$order_status = get_order_status_a($d['order_id']);
	
	if(in_array($d['job_status'], $status_array_delivery) && ($d['quality_checked'] == '0')) {
		$job_status = 'QUALITY CONTROL';
	} else {
		$job_status = $d['job_status'];
	}
	
	$status = $order_status;
	if( $status_array_main_kvb[$job_status] > $status_array_main_kvb[$order_status] ) {
		$status = $job_status;
	}
	return $status;
}

function get_job_status_b($job_id) { global $db, $status_array_main_kvb, $status_array_delivery;

	$a = array_flip($status_array_main_kvb);
	
	$job_id = $db->clean($job_id);
	$r = $db->query("SELECT order_id, job_status, quality_checked, do_reprint, reprint_status FROM cart_alpha WHERE id='{$job_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	$order_status = get_order_status_b($d['order_id']);
	
	if(in_array($d['job_status'], $status_array_delivery) && ($d['quality_checked'] == '0')) {
		$job_status = 'QUALITY CONTROL';
	} else {
		$job_status = $d['job_status'];
	}
	if($d['do_reprint'] == '1') {
		$job_status = $a[$d['reprint_status']];
	}
	
	$status = $order_status;
	if( ($status_array_main_kvb[$job_status] > $status_array_main_kvb[$order_status]) /* || ($d['do_reprint'] == '1') */ ) {
		$status = $job_status;
	}
	return $status;
}

function get_copy_status($job_id, $copy_num) { global $db, $status_array_main_kvb;
	
	$job_id = $db->clean($job_id);
	$copy_num = $db->clean($copy_num);
	$job_status = get_job_status2($job_id);
	$copy_status = '';
	
	$found = false;
	/* $r = $db->query("SELECT status FROM ag_copy WHERE cart_id='{$job_id}' AND copy_num='{$copy_num}' LIMIT 1") or die($db->error()); */
	$r = $db->query("SELECT status, copy_num FROM ag_copy WHERE cart_id='{$job_id}' AND copy_num LIKE '{$copy_num}%' ORDER BY copy_num DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		$copy_status = $d['status'];
		$found = true;
	}
	
	$status = $job_status;
	if( $status_array_main_kvb[$copy_status] > $status_array_main_kvb[$job_status] ) {
		$status = $copy_status;
	}
	if( $found ) {
		$status = $copy_status;
	}
	return $status;
}

function get_copy_status_b($job_id, $copy_num) { global $db, $status_array_main_kvb;
	
	$a = array_flip($status_array_main_kvb);
	$job_id = $db->clean($job_id);
	$copy_num2 = $copy_num = $db->clean($copy_num);
	$job_status = get_job_status2($job_id);
	$copy_status = '';
	
	$r = $db->query("SELECT status, copy_num FROM ag_copy WHERE cart_id='{$job_id}' AND copy_num LIKE '{$copy_num}%' ORDER BY copy_num DESC LIMIT 1") or die($db->error());
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		$copy_status = $d['status'];
		$copy_num2 = $d['copy_num'];
	}
	
	$status = $job_status;
	if( $status_array_main_kvb[$copy_status] > $status_array_main_kvb[$job_status] ) {
		$status = $copy_status;
	}
	
	$r = $db->query("SELECT do_reprint, reprint_status FROM cart_alpha WHERE id='{$job_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	if($d['do_reprint'] == '1') {
		$r2 = $db->query("SELECT * FROM packages WHERE cart_id='{$job_id}' AND copy LIKE '{$copy_num}%' AND rejected='1' ORDER BY copy DESC LIMIT 1") or die($db->error());
		if($db->num_rows($r2)) {
			$d2 = $db->fetch_assoc($r2);
			if($d2['copy'] >= intval($copy_num2)) {
				$status = $a[$d['reprint_status']];
				if( $status_array_main_kvb[$copy_status] > $status_array_main_kvb[$status] ) {
					$status = $copy_status;
				}
			}
		}
		
	}
	
	/* if(!empty($copy_status)) {
		$status = $copy_status;
	} */
	
	return $status;
}

function update_job_status($job_id, $status=NULL, $qc=NULL) {
	
	global $db;
	
	$job_id = $db->clean($job_id);
	$status = $db->clean($status);
	$qc = $db->clean($qc);
	
	if(($status != '') || ($qc != '')) {
	
		$sql = "UPDATE cart_alpha SET";
		$sql .= ($status == '') ? '' : " job_status='{$status}'";
		$sql .= ( ($status != '') && ($qc != '') ) ? ',' : '';
		$sql .= ($qc == '') ? '' : " quality_checked='{$qc}'";
		$sql .= " WHERE id='{$job_id}' LIMIT 1";
		$db->query($sql) or die($db->error());
		
		$job_status = get_job_status_b($job_id);
		$db->query("Insert Into log_collector SET emp_id='".$_POST['emp_id']."',ip_address='".$_SERVER['REMOTE_ADDR']."',action='job_status_changed',action_value='".$job_status."',more_info='".$job_id."',date_change='".date('Y-m-d H:i:s')."'");
	
	}
}

function update_copy_status_by_job_id($job_id, $old_status, $new_status) {
	global $db;
	$job_id = $db->clean($job_id);
	$old_status = $db->clean($old_status);
	$new_status = $db->clean($new_status);
	$db->query("UPDATE ag_copy SET status='{$new_status}' WHERE cart_id='{$job_id}' AND status='{$old_status}'") or die($db->error());
}

function get_job_pro_status_btns($order_id, $job_id, $delivery_method, $job_status, $do_reprint, $job_count, $reprint_status='') {
	global $p_status, $status_array_main_b, $delivery_status_by_method, $status_array_main_kvb;
	$options2 = "";
	$status_array_main2 = $status_array_main_b;
	$status_array_main2[] = 'PRINTED';
	$status_array_class = array("gi gi-inbox_in", "gi gi-clock", "gi gi-thumbs_up", "gi gi-print", "fa fa-scissors", "hi hi-ok", "fa fa-truck", "gi gi-gift", "fa fa-map-marker", "gi gi-inbox", "gi gi-skull", "fa fa-inbox", "hi hi-ok");
	$capability_status_array = array("PRODUCTION", "FINISHING", "PRINTED");
	foreach($status_array_main2 as $key=>$value) {
		if(in_array($value, $capability_status_array)) {
			if($value == "PRINTED") {
				$value = $delivery_status_by_method[$delivery_method];
			}
			if($value == "SHIPPING") { $p_status = ""; }
			$class_s = "status_normal";
			if($value == $job_status) { $class_s = "status_active"; }
			
			if($do_reprint && !in_array($job_status, array('PRODUCTION', 'FINISHING'))) {
				$class_s = 'status_normal';
				if( $status_array_main_kvb[$value] == $reprint_status ) {
					$class_s = 'status_active';
				}
				if($status_array_main_kvb[$value] == '7') {
					$options2 .= " <button class='btn btn-sm btn-primary {$class_s}' data-id='{$order_id}' data-status='{$value}' data-pmt_status='{$p_status}' onclick='clear_job_rejections2(this, 6)' data-job_id='{$job_id}' data-job_count='{$job_count}  title='".ucwords(strtolower($value))."' style='color: #fff; width: initial;'><i class='". $status_array_class[$key] ."'></i></button> ";
				} else {
					$options2 .= " <button class='btn btn-sm btn-default {$class_s}' data-id='{$order_id}' data-status='{$value}' data-pmt_status='{$p_status}' onclick='clear_job_rejections2(this, ".($key+1).")' data-job_id='{$job_id}' data-job_count='{$job_count}  title='".ucwords(strtolower($value))."'><i class='". $status_array_class[$key] ."'></i></button> ";
				}
			} else {
				if($status_array_main_kvb[$value] == '7') {
					$options2 .= " <button class='btn btn-sm btn-primary {$class_s}' data-id='{$order_id}' data-status='{$value}' data-pmt_status='{$p_status}' onclick='update_job_status(this, false)' data-job_id='{$job_id}' data-job_count='{$job_count}' title='".ucwords(strtolower($value))."' style='color: #fff; width: initial;'><i class='". $status_array_class[$key] ."'></i></button> ";
				} else {
					$options2 .= " <button class='btn btn-sm btn-default {$class_s}' data-id='{$order_id}' data-status='{$value}' data-pmt_status='{$p_status}' onclick='update_job_status(this, false)' data-job_id='{$job_id}' data-job_count='{$job_count}' title='".ucwords(strtolower($value))."'><i class='". $status_array_class[$key] ."'></i></button> ";
				}
			}
		}
	}
	return $options2;
}

function get_packages($order_id) { global $db;
	
	$order_id = $db->clean($order_id);
	$pkgs = $r_pkgs = array();
	
	$r = $db->query("SELECT * FROM packages WHERE order_id='{$order_id}' ORDER BY pkg") or die($db->error());
	while($d = $db->fetch_assoc($r)) {
		
		$r2 = $db->query("SELECT emp_fname, emp_lname FROM employees WHERE emp_code='{$d['employee_code']}' LIMIT 1") or die($db->error());
		$d2 = $db->fetch_assoc($r2);
		
		if($d['rejected'] == '0') {
			
			$pkgs["j{$d['cart_id']}_c{$d['copy']}"] = $d['pkg'];
			
		} else {
			
			$r_pkgs['pkgs'][] = "j{$d['cart_id']}_c{$d['copy']}";
			
			$r_pkgs['pkgs2']["j{$d['cart_id']}_c{$d['copy']}"] = array(
				'item' => "j{$d['cart_id']}_c{$d['copy']}",
				'reason' => $d['reason'],
				'depart_head' => $d['depart_head'],
				'employee_code' => $d['employee_code'],
				'notes_text' => $d['notes_text'],
				'date_time' => strftime("%I:%M %p %m/%d/%Y", strtotime($d['date_time'])),
				'employee_name' => "{$d2['emp_fname']} {$d2['emp_lname']}"
			);
			
			$r_pkgs['reason'] = $d['reason'];
			$r_pkgs['depart_head'] = $d['depart_head'];
			$r_pkgs['employee_code'] = $d['employee_code'];
			$r_pkgs['notes_text'] = $d['notes_text'];
			$r_pkgs['date_time'] = $d['date_time'];
			
		}
		
	}
	
	$output = array('packages' => $pkgs, 'rejected_packages' => $r_pkgs);
	return $output;
	
}

function update_rejected_job_cost($order_id, $reprint_sqft_cost=0) { global $db;
	
	$total_r_cost = $total_base_cost = 0;
	$r = $db->query("SELECT id, quantity, base_price, base_price_print, reprint_sqft_cost FROM cart_alpha WHERE order_id='{$order_id}'");
	while($d = $db->fetch_assoc($r)) {
		$copy_cost = round($d['base_price']/$d['quantity'], 2);
		$copy_cost_print = round($d['base_price_print']/$d['quantity'], 2);
		$r2 = $db->query("SELECT * FROM packages WHERE cart_id='{$d['id']}' AND rejected='1' AND (cost_type='print_and_finishings' OR cost_type='')");
		$num = $db->num_rows($r2);
		$r2_print = $db->query("SELECT * FROM packages WHERE cart_id='{$d['id']}' AND rejected='1' AND cost_type='print_only'");
		$num_print = $db->num_rows($r2_print);
		$r_cost = round($copy_cost*$num, 2);
		$r_cost_print = round($copy_cost_print*$num_print, 2);
		$reprint_sqft_cost = round($reprint_sqft_cost+$d['reprint_sqft_cost'], 2);
		$r_cost = round($r_cost + $r_cost_print + $reprint_sqft_cost, 2);
		$db->query("UPDATE cart_alpha SET rejected_base_price='{$r_cost}', reprint_sqft_cost='{$reprint_sqft_cost}' WHERE id='{$d['id']}' LIMIT 1");
		$total_r_cost += $r_cost;
		$total_base_cost = $total_base_cost + $d['base_price'] + $r_cost;
	}
	
	$base_price = round($total_base_cost, 2);
	$db->query("UPDATE ag_order SET base_price='{$base_price}' WHERE id='{$order_id}' LIMIT 1");
	
}

function set_packages($order_id, $packages, $rejected) {
	global $db, $status_array_delivery;
	
	$order_id = $db->clean($order_id);
	if($rejected) {
		
		$db->query("DELETE FROM packages WHERE order_id='{$order_id}' AND rejected='1'") or die($db->error());
		foreach($packages['pkgs'] as $pkg) {
			$pkg_e = explode('_', $pkg);
			$cart_id = str_replace('j', '', $pkg_e[0]);
			$copy = str_replace('c', '', $pkg_e[1]);
			$date_time = date('Y-m-d H:i:s', strtotime($packages['pkgs2'][$pkg]['date_time']));
			$db->query("INSERT INTO packages SET order_id='{$order_id}', cart_id='{$cart_id}', copy='{$copy}', rejected='1', reason='". $db->clean($packages['pkgs2'][$pkg]['reason']) ."', depart_head='". $db->clean($packages['pkgs2'][$pkg]['depart_head']) ."', employee_code='". $db->clean($packages['pkgs2'][$pkg]['employee_code']) ."', notes_text='". $db->clean($packages['pkgs2'][$pkg]['notes_text']) ."', cost_type='". $db->clean($packages['pkgs2'][$pkg]['cost_type']) ."', date_time='". $db->clean($date_time) ."'") or die($db->error());
			
			$copy_num = $copy + 0.1;
			$r = $db->query("SELECT * FROM ag_copy WHERE order_id='{$order_id}' AND cart_id='{$cart_id}' AND copy_num='{$copy_num}'");
			if($db->num_rows($r) == 0) {
				$db->query("INSERT INTO ag_copy SET order_id='{$order_id}', cart_id='{$cart_id}', copy_num='{$copy_num}', status='PRODUCTION'");
			}
		}
		update_rejected_job_cost($order_id);
		
	} else {
		$order_status = get_order_status_b($order_id);
		if(in_array($order_status, $status_array_delivery)) {
			$status = 'READY FOR';
		} else {
			$status = 'PENDING';
		}
	
		$db->query("DELETE FROM packages WHERE order_id='{$order_id}' AND rejected='0'") or die($db->error());
		foreach($packages as $key => $value) {
			$pkg_e = explode('_', $key);
			$cart_id = str_replace('j', '', $pkg_e[0]);
			$copy = str_replace('c', '', $pkg_e[1]);
			$db->query("INSERT INTO packages SET order_id='{$order_id}', cart_id='{$cart_id}', copy='{$copy}', pkg='{$value}', date_time='". date('Y-m-d H:i:s') ."', status='{$status}'") or die($db->error());
		}
		
	}
	
}

function get_rejection_info( $order_id, $cart_id ) {
	global $db;
	$r = $db->query("SELECT * FROM packages WHERE order_id='{$order_id}' AND cart_id='{$cart_id}' AND rejected='1' AND employee_code!='' ORDER BY copy DESC LIMIT 1");
	$d = $db->fetch_assoc($r);
	$emp_code = $db->clean($d['employee_code']);
	$r2 = $db->query("SELECT * FROM employees WHERE emp_code='{$emp_code}' LIMIT 1");
	$d2 = $db->fetch_assoc($r2);
	$output = array('emp_name'=>$d2['emp_fname'], 'notes'=>$d['notes_text']);
	return $output;
}

function clear_order_rejections($id, $reprint_status) { global $db;
	$id = $db->clean($id);
	$reprint_status = $db->clean($reprint_status);
	if($reprint_status == '8') {
		
		$r = $db->query("SELECT do_reprint FROM ag_order WHERE id='{$id}' LIMIT 1");
		$d = $db->fetch_assoc($r);
		if($d['do_reprint'] == '1') {
			$db->query("Insert Into log_collector SET user_id='".$_SESSION['id']."', ip_address='".$_SERVER['REMOTE_ADDR']."', action='reprinted', action_value='8', order_id='".$id."', date_change='".date('Y-m-d H:i:s')."'");
		}
		
		$db->query("UPDATE ag_order SET rejected_packages_p='', do_reprint='0', reprint_status='{$reprint_status}' WHERE id='{$id}' LIMIT 1") or die($db->error());
		$db->query("UPDATE cart_alpha SET do_reprint='0', reprint_status='{$reprint_status}' WHERE order_id='{$id}'") or die($db->error());
	} else {
		$db->query("UPDATE ag_order SET rejected_packages_p='', reprint_status='{$reprint_status}' WHERE id='{$id}' LIMIT 1") or die($db->error());
		$db->query("UPDATE cart_alpha SET reprint_status='{$reprint_status}' WHERE order_id='{$id}' AND reprint_status<'{$reprint_status}'") or die($db->error());
	}
	return true;
}

function clear_job_rejections($id, $reprint_status) { global $db;
	$id = $db->clean($id);
	$reprint_status = $db->clean($reprint_status);
	if($reprint_status == '8') {
		$db->query("UPDATE cart_alpha SET do_reprint='0', reprint_status='{$reprint_status}' WHERE id='{$id}' LIMIT 1") or die($db->error());
	} else {
		$db->query("UPDATE cart_alpha SET reprint_status='{$reprint_status}' WHERE id='{$id}' AND reprint_status<'{$reprint_status}' LIMIT 1") or die($db->error());
	}
	return true;
}

function get_job_qty($job_id, $nums = false) {
	global $db, $status_array_main_kvb;
	$job_id = $db->clean($job_id);
	$r = $db->query("SELECT * FROM cart_alpha WHERE id='{$job_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	$qty = $d['quantity'];
	$job_status = get_job_status2($job_id);
	$job_status_r = get_job_status_b($job_id);
	$output = array( $job_status => $qty );
	$output2 = array();
	$copy_nums = array();
	$r2 = $db->query("SELECT * FROM ag_copy WHERE cart_id='{$job_id}' ORDER BY id DESC");
	while($d2 = $db->fetch_assoc($r2)) {
		$copy_num = intval($d2['copy_num']);
		if(in_array($copy_num, $copy_nums)) {
			continue;
		}
		$copy_nums[] = $copy_num;
		$copy_status = $d2['status'];
		if( $status_array_main_kvb[$copy_status] < $status_array_main_kvb[$job_status_r] ) {
			$copy_status = $job_status_r;
		}
		if( ($status_array_main_kvb[$copy_status] > $status_array_main_kvb[$job_status]) || ($d['do_reprint'] && $status_array_main_kvb[$copy_status] >= $d['reprint_status'] ) ) {
			$output[$job_status] -= 1;
			$output2[$copy_status][$copy_num] = $d2['copy_num'];
			if(isset($output[$copy_status])) {
				$output[$copy_status] += 1;
			} else {
				$output[$copy_status] = 1;
			}
		}
	}
	if($nums) {
		return $output2;
	}
	return $output;
}

function get_copy_nums($job_id, $order_id, $qty, $qty_rj, $status) {
	global $db;
    
	$qty = $db->clean($qty);
    $qty_rj = $db->clean($qty_rj);
	$order_id = $db->clean($order_id);
    $job_id = $db->clean($job_id);
    
	$output = array();
	$nums = get_job_qty($job_id, true);
	$i2 = 0;
	for($i=1; $i<=$qty; $i++) {
		if( isset($nums['PRODUCTION'][$i]) ) {
			continue;
		} else {
			/* $a = isset($nums['FINISHING'][$i]) ? $nums['FINISHING'][$i] : $i; */
			$a = $i;
			$r = $db->query("SELECT * FROM ag_copy WHERE cart_id='{$job_id}' AND copy_num LIKE '{$i}%' ORDER BY copy_num DESC LIMIT 1") or die($db->error());
			if($db->num_rows($r)) {
				$d = $db->fetch_assoc($r);
				$a = $d['copy_num'];
			}
			
			$output[$i] = "j{$job_id}_c{$a}";
			$i2++;
		}
		if($i2 == $qty_rj) {
			break;
		}
	}
	return $output;
	
    /* $output = get_packages($order_id);
    $r = $db->query("SELECT packages, rejected_packages FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
    $d = $db->fetch_assoc($r);

    $packages = array();
    if (!empty($d['packages'])) {
        $packages = unserialize($d['packages']);
    }
    if (empty($output['packages'])) {
        $output['packages'] = $packages;
    }

    $rejected_packages = array();
    if (!empty($d['rejected_packages'])) {
        $rejected_packages = unserialize($d['rejected_packages']);
    }
    if (empty($output['rejected_packages'])) {
        $output['rejected_packages'] = $rejected_packages;
    }
	
    $packages = $output['packages'];
    $rejected_packages = $output['rejected_packages'];
    if (!isset($rejected_packages['pkgs'])) {
        $rejected_packages['pkgs'] = array();
    }

    $q_job_nums = array();
	$q_qty = $qty_rj > $qty ? $qty : $qty_rj;
    for ($q_i = 1; $q_i <= $q_qty; $q_i++) {
		if(check_copy_with_status($job_id, $status, $q_i) === false) { continue; }
		$name = "j" . $job_id . "_c" . $q_i;
        if (in_array($name, $rejected_packages['pkgs'])) {
            $q_it = 1;
            for ($q_i2 = 1; $q_i2 <= $q_it; $q_i2++) {
				if(check_copy_with_status($job_id, $status, $q_i.'.'.$q_i2) === false) { continue; }
				$name2 = "j" . $job_id . "_c" . $q_i . '.' . $q_i2;
				if (in_array($name2, $rejected_packages['pkgs'])) {
                    $q_it++;
                } else {
					$q_job_nums[] = $name2;
				}
            }
        } else {
			$q_job_nums[] = $name;
		}
    }
    return $q_job_nums; */
}

function make_payment2($order_id) { global $db;
	global $AUTHORIZE_NET_LOGIN, $AUTHORIZE_NET_KEY;
	ob_start();
	
	$ic = new invoiceCalc($order_id);
	$res_order = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$row_order = $db->fetch_assoc($res_order);
	if(in_array($row_order['delivery_method'], array('local_pickup', 'install'))) {
		
		$res_pmt = $db->query("SELECT * FROM payment_collector WHERE order_id='{$order_id}' AND cc!='' AND cc_exp!=''") or die($db->error());
		if($db->num_rows($res_pmt)) {
			$row_pmt = $db->fetch_assoc($res_pmt);
			
			$_POST['input_type'] = 'saved_card';
			$_POST['card_num'] = "";
			$_POST['saved_card_num'] = $row_pmt['cc'];
			$exp = explode("-", $row_pmt['cc_exp']);
			$_POST['exp_month'] = $exp[0];
			$_POST['exp_year'] = $exp[1];
			$_POST['check_amount'] = $ic->balance;
			$_POST['invoice_am'][] = $row_order['id']."-".$ic->balance;
			$_POST['proof_page'] = "yes";
			$_POST['queue_page'] = "yes";
			$_POST['rdr_page'] = "queue.php";
			$_POST['check_reminder'] = "on_account";
			$_POST['use_credit'] = "n";
			$_POST['credit_amount'] = "";
			$_POST['user_id'] = $row_order['user_id'];
			$_POST['action'] = 'payment_by_cr';
			$_POST['ignore_email'] = true;
			
			/* $_POST['saved_card_num'] = "4111111111111111";
			$_POST['check_amount'] = "1";
			$_GET['test'] = "yes"; */
			
			include "orders_edit_process_q.php";
		}
		$res = ob_get_clean();
		return true;
	}
}

function get_copy_btns($order_id, $job_id, $copy_num, $q_type) { global $db, $delivery_status_by_method, $complete_status_by_method;
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT delivery_method FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	$copy_status = get_copy_status($job_id, $copy_num);
	
	$production_btns = " <button type='button' class='btn btn-sm btn-default ". (('PRODUCTION' == $copy_status) ? 'status_active' : 'status_normal') ."' data-order_id='{$order_id}' data-job_id='{$job_id}' data-copy_num='{$copy_num}' data-status='PRODUCTION' onclick='update_copy_status(this)'><i class='gi gi-print'></i></button> ";
	$production_btns .= " <button type='button' class='btn btn-sm btn-default ". (('FINISHING' == $copy_status) ? 'status_active' : 'status_normal') ."' data-order_id='{$order_id}' data-job_id='{$job_id}' data-copy_num='{$copy_num}' data-status='FINISHING' onclick='update_copy_status(this)'><i class='fa fa-scissors'></i></button> ";
	$production_btns .= " <button type='button' class='btn btn-sm btn-primary ". (('QUALITY CONTROL' == $copy_status) ? 'status_active' : 'status_normal') ."' style='width: initial; color: #fff;' data-order_id='{$order_id}' data-job_id='{$job_id}' data-copy_num='{$copy_num}' data-status='QUALITY CONTROL' onclick='update_copy_status(this)'><i class='hi hi-ok'></i></button> ";
	
	$qc_btns = " <button type='button' class='btn btn-sm btn-primary' style='width: initial; color: #fff;' data-order_id='{$order_id}' data-job_id='{$job_id}' data-copy_num='{$copy_num}' data-status='". $delivery_status_by_method[$d['delivery_method']] ."' onclick='update_copy_status(this)'><i class='hi hi-ok'></i></button> ";
	
	$delivery_btns = " <button type='button' class='btn btn-sm btn-primary' style='width: initial; color: #fff;' data-order_id='{$order_id}' data-job_id='{$job_id}' data-copy_num='{$copy_num}' data-status='". $complete_status_by_method[$d['delivery_method']] ."' onclick='update_copy_status(this)'><i class='hi hi-ok'></i></button> ";
	
	return ${$q_type.'_btns'};
}

function get_job_copies($job_id) { global $db;
	
	$job_id = $db->clean($job_id);
	$r = $db->query("SELECT * FROM cart_alpha WHERE id='{$job_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	$qty = $d['quantity'];
	for($i = 1; $i <= $qty; $i++) {
		$output = array( 'order_id'=>$d['order_id'], 'cart_id'=>$job_id, 'copy_num'=>$i, 'status'=>get_copy_status($job_id, $i) );		
	}
	
}

function get_copy_progress($order_id, $job_id, $copy_num) { global $db, $status_array_complete, $status_array_main_b;

	$order_id = $db->clean($order_id);
	$copy_status = get_copy_status($job_id, $copy_num);
	$r = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	if(in_array($copy_status, $status_array_complete)) { $copy_status = "READY FOR DELIVERY"; }
	$q_current_status_key = array_search($copy_status, $status_array_main_b);
	
	$output = array( 'q_tr_tds'=>array(), 'q_tr_tds2'=>array() );
	foreach($status_array_main_b as $q_key=>$q_status) { if($q_key >= 9) { continue; }
		$q_td_date = "";
		if($q_key <= 1) {
			$q_td_date = strftime("%m/%d/%y", strtotime($d['order_date']));
		} else if(($q_key == 2) && ($d['approval_date'] != "0000-00-00 00:00:00")) {
			$q_td_date = strftime("%m/%d/%y", strtotime($d['approval_date']));
		} else if(($q_key <= 4) && ($d['post_date'] != "0000-00-00 00:00:00")) {
			$q_td_date = strftime("%m/%d/%y", strtotime($d['post_date']));
		} else {
			$q_td_date = strftime("%m/%d/%y", strtotime($d['status_change_date']));
		}
		
		if($q_key > $q_current_status_key) {
			$output['q_tr_tds'][] = array( 'class'=>'', 'style'=>'', 'date'=>'' );
		} else if($q_key < $q_current_status_key) {
			$output['q_tr_tds'][] = array( 'class'=>'fa fa-circle', 'style'=>'color: #0f0; opacity: 0.35; filter: alpha(opacity=35);', 'date'=>$q_td_date );
		} else {
			if($q_current_status_key > 4) {
				$output['q_tr_tds'][] = array( 'class'=>'fa fa-check-circle', 'style'=>'color: #0f0;', 'date'=>$q_td_date );
			} else {
				$output['q_tr_tds'][] = array( 'class'=>'fa fa-circle', 'style'=>'color: #0f0;', 'date'=>$q_td_date );
			}
		}
		
		if($q_key > 3) {
			$output['q_tr_tds2'][] = array( 'class'=>'', 'style'=>'', 'date'=>'' );
		} elseif($q_key < 3) {
			$output['q_tr_tds2'][] = array( 'class'=>'fa fa-circle', 'style'=>'color: #0f0; opacity: 0.35; filter: alpha(opacity=35);', 'date'=>$q_td_date );
		} else {
			$output['q_tr_tds2'][] = array( 'class'=>'fa fa-circle', 'style'=>'color: #0f0;', 'date'=>$q_td_date );
		}
	}
	
	return $output;
	
}

function get_order_status_all($order_id) { global $db, $status_array_main_kvb;
	
	$output = array();
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT id, status, quality_checked FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	$order_status = get_order_status($d['status'], $d['quality_checked']);
	$output['status'] = $order_status;
	
	$job_status_min = $job_status_max = '';
	$r2 = $db->query("SELECT id, quantity FROM cart_alpha WHERE order_id='{$order_id}'") or die($db->error());
	while($d2 = $db->fetch_assoc($r2)) {
		
		$job_status = get_job_status2($d2['id']);
		if(empty($job_status_min)) { $job_status_min = $job_status; }
		if(empty($job_status_max)) { $job_status_max = $job_status; }
		if($status_array_main_kvb[$job_status] < $status_array_main_kvb[$job_status_min]) { $job_status_min = $job_status; }
		if($status_array_main_kvb[$job_status] > $status_array_main_kvb[$job_status_max]) { $job_status_max = $job_status; }
		
		$copy_status_min = $copy_status_max = '';
		for($i=1; $i<=$d2['quantity']; $i++) {
			
			$copy_status = get_copy_status($d2['id'], $i);
			if(empty($copy_status_min)) { $copy_status_min = $copy_status; }
			if(empty($copy_status_max)) { $copy_status_max = $copy_status; }
			if($status_array_main_kvb[$copy_status] < $status_array_main_kvb[$copy_status_min]) { $copy_status_min = $copy_status; }
			if($status_array_main_kvb[$copy_status] > $status_array_main_kvb[$copy_status_max]) { $copy_status_max = $copy_status; }
			
		}
		$output['job'][$d2['id']] = array( 'copy_status_min'=>$copy_status_min, 'copy_status_max'=>$copy_status_max );
	}
	$output['job_status'] = array( 'status_min'=>$job_status_min, 'status_max'=>$job_status_max );
	return $output;
	
}

function get_order_status_all_r($order_id) { global $db, $status_array_main_kvb;
	
	$a = array_flip($status_array_main_kvb);
	$output = array();
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT id, do_reprint, reprint_status FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	$order_status = $d['do_reprint'] ? $a[$d['reprint_status']] : '';
	$output['status'] = $order_status;
	
	$job_status_min = $job_status_max = '';
	$r2 = $db->query("SELECT id, quantity, do_reprint, reprint_status FROM cart_alpha WHERE order_id='{$order_id}'") or die($db->error());
	while($d2 = $db->fetch_assoc($r2)) {
		
		$job_status = get_job_status2($d2['id']);
		$job_status = $d2['do_reprint'] ? $a[$d2['reprint_status']] : $order_status;
		if(empty($job_status_min)) { $job_status_min = $job_status; }
		if(empty($job_status_max)) { $job_status_max = $job_status; }
		if($status_array_main_kvb[$job_status] < $status_array_main_kvb[$job_status_min]) { $job_status_min = $job_status; }
		if($status_array_main_kvb[$job_status] > $status_array_main_kvb[$job_status_max]) { $job_status_max = $job_status; }
		
		$copy_status_min = $copy_status_max = '';
		for($i=1; $i<=$d2['quantity']; $i++) {
			
			$copy_status = get_copy_status($d2['id'], $i);
			if(empty($copy_status_min)) { $copy_status_min = $copy_status; }
			if(empty($copy_status_max)) { $copy_status_max = $copy_status; }
			if($status_array_main_kvb[$copy_status] < $status_array_main_kvb[$copy_status_min]) { $copy_status_min = $copy_status; }
			if($status_array_main_kvb[$copy_status] > $status_array_main_kvb[$copy_status_max]) { $copy_status_max = $copy_status; }
			
		}
		$output['job'][$d2['id']] = array( 'copy_status_min'=>$copy_status_min, 'copy_status_max'=>$copy_status_max );
	}
	$output['job_status'] = array( 'status_min'=>$job_status_min, 'status_max'=>$job_status_max );
	return $output;
	
}

function get_order_status_all_b($order_id) { global $db, $status_array_main_kvb;
	
	$output = array();
	$order_id = $db->clean($order_id);
	$order_status = get_order_status_b($order_id);
	$output['status'] = $order_status;
	
	$job_status_min = $job_status_max = '';
	$r2 = $db->query("SELECT id, quantity FROM cart_alpha WHERE order_id='{$order_id}'") or die($db->error());
	while($d2 = $db->fetch_assoc($r2)) {
		
		$job_status = get_job_status_b($d2['id']);
		if(empty($job_status_min)) { $job_status_min = $job_status; }
		if(empty($job_status_max)) { $job_status_max = $job_status; }
		if($status_array_main_kvb[$job_status] < $status_array_main_kvb[$job_status_min]) { $job_status_min = $job_status; }
		if($status_array_main_kvb[$job_status] > $status_array_main_kvb[$job_status_max]) { $job_status_max = $job_status; }
		
		$copy_status_min = $copy_status_max = '';
		for($i=1; $i<=$d2['quantity']; $i++) {
			
			$copy_status = get_copy_status_b($d2['id'], $i);
			if(empty($copy_status_min)) { $copy_status_min = $copy_status; }
			if(empty($copy_status_max)) { $copy_status_max = $copy_status; }
			if($status_array_main_kvb[$copy_status] < $status_array_main_kvb[$copy_status_min]) { $copy_status_min = $copy_status; }
			if($status_array_main_kvb[$copy_status] > $status_array_main_kvb[$copy_status_max]) { $copy_status_max = $copy_status; }
			
		}
		$output['job'][$d2['id']] = array( 'copy_status_min'=>$copy_status_min, 'copy_status_max'=>$copy_status_max );
	}
	$output['job_status'] = array( 'status_min'=>$job_status_min, 'status_max'=>$job_status_max );
	return $output;
	
}

function check_order_with_status($order_id, $status) { global $db;
	
	if(!is_array($status)) { $status = array($status); }
	$found = false;
	
	$order_status = get_order_status_b($order_id);
	if(in_array($order_status, $status)) { $found = true; }
	
	$r2 = $db->query("SELECT id, quantity FROM cart_alpha WHERE order_id='{$order_id}'") or die($db->error());
	while($d2 = $db->fetch_assoc($r2)) {
		
		$job_status = get_job_status_b($d2['id']);
		if(in_array($job_status, $status)) { $found = true; }
		
		for($i=1; $i<=$d2['quantity']; $i++) {
			
			$copy_status = get_copy_status_b($d2['id'], $i);
			if(in_array($copy_status, $status)) { $found = true; }
			
		}
		
	}
	
	return $found;
	
}

function check_job_with_status($job_id, $status) { global $db;
	
	if(!is_array($status)) { $status = array($status); }
	$found = false;
	
	$r = $db->query("SELECT quantity FROM cart_alpha WHERE id='{$job_id}'") or die($db->error());
	$d = $db->fetch_assoc($r);
		
	$job_status = get_job_status_b($job_id);
	if(in_array($job_status, $status)) { $found = true; }
	
	for($i=1; $i<=$d['quantity']; $i++) {
		
		$copy_status = get_copy_status_b($job_id, $i);
		if(in_array($copy_status, $status)) { $found = true; }
		
	}
		
	return $found;
	
}

function check_copy_with_status($job_id, $status, $copy_num) {
	
	if(!is_array($status)) { $status = array($status); }
	$found = false;
		
	$copy_status = get_copy_status_b($job_id, $copy_num);
	if(in_array($copy_status, $status)) { $found = true; }
	
	return $found;
	
}

function get_shipping_address( $ship_id, $address='' ) {
	global $db;
	$ship_address = $address;
	if(!empty($ship_id)) {
		$ship_r = $db->query("Select * from accounts_shipping WHERE id='". $db->clean($ship_id) ."' LIMIT 1") or die($db->error());
		$ship2 = $db->fetch_assoc($ship_r);
		$ship_address = "{$ship2['firstname']} {$ship2['lastname']}<br><br>{$ship2['address1']} {$ship2['address2']}<br>{$ship2['city']}, {$ship2['state']} {$ship2['zip']}<br>{$ship2['phone']}";
	}
	return $ship_address;
}

function get_job_address($job_id) { global $db;

	$r = $db->query("SELECT order_id, job_address FROM cart_alpha WHERE id='{$job_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	if($d['job_address'] != '0') {
		
		$ship_r = $db->query("Select * from accounts_shipping WHERE id='{$d['job_address']}' LIMIT 1") or die($db->error());
		$ship2 = $db->fetch_assoc($ship_r);
		$job_address = "{$ship2['firstname']} {$ship2['lastname']}, {$ship2['address1']} {$ship2['address2']}, {$ship2['city']}, {$ship2['state']} {$ship2['zip']}, {$ship2['phone']}";
		
	} else {
		
		$r2 = $db->query("SELECT * FROM ag_order WHERE id='{$d['order_id']}' LIMIT 1") or die($db->error());
		$d2 = $db->fetch_assoc($r2);
		$job_address = array($d2['ship_name'], "{$d2['ship_address1']} {$d2['ship_address2']}", $d2['ship_city'], "{$d2['ship_state']} {$d2['sip_zip']}", $d2['ship_phone']);
		$job_address = implode(', ', $job_address);
		
		
	}
	return $job_address;
}

function get_job_size( $job, $product_type='' ) {
	$width_in = $job['select_'] == 'feet' ? round($job['widthfeet']*12, 2) : $job['widthfeet'];
	$height_in = $job['select_'] == 'feet' ? round($job['heightfeet']*12, 2) : $job['heightfeet'];
	$depth_in = $job['select_'] == 'feet' ? round($job['depthfeet']*12, 2) : $job['depthfeet'];
	if(!empty($depth_in)) {
		$size_text	=	"{$width_in}w x {$height_in}h x {$depth_in}d Inches";
	} else {
		$size_text	=	"{$width_in}w x {$height_in}h Inches";
	}
	if($product_type == 'circle_tension' || $product_type == 'circle_tension_fabric') {
		$size_text	=	"{$width_in}w x {$depth_in}h Inches";
	}
	return $size_text;
}
function get_job_size_new( $job ) {
	global $db;
	
	if(isset($job['width'])) {
		$job['sub_cat'] = $job['product'];
		$job['widthfeet'] = $job['width'];
		$job['heightfeet'] = $job['height'];
		$job['depthfeet'] = $job['depth'];
		$job['select_'] = $job['size_type'];
	}
	
	$pro_r = $db->query("SELECT product_type FROM grouping_cat WHERE id='". $db->clean($job['sub_cat']) ."' LIMIT 1");
	$pro = $db->fetch_assoc($pro_r);
	
	$size_text = "{$job['widthfeet']}w x {$job['heightfeet']}h ";
	if(!empty($job['depthfeet'])) {
		$size_text .= "x {$job['depthfeet']}d ";
	}
	
	if($pro['product_type'] == 'circle_tension'  || $pro['product_type'] == 'circle_tension_fabric' ) {
		$size_text = "{$job['widthfeet']}Dm x {$job['depthfeet']}d ";
	}
	
	$size_text	.=	ucwords($job['select_']);
	return $size_text;
}
function get_job_size_b( $job ) {
	global $db;
	
	if(isset($job['width'])) {
		$job['sub_cat'] = $job['product'];
		$job['widthfeet'] = $job['width'];
		$job['heightfeet'] = $job['height'];
		$job['depthfeet'] = $job['depth'];
		$job['select_'] = $job['size_type'];
	}
	
	$pro_r = $db->query("SELECT product_type FROM grouping_cat WHERE id='". $db->clean($job['sub_cat']) ."' LIMIT 1");
	$pro = $db->fetch_assoc($pro_r);
	
	$size_text = "{$job['widthfeet']}w x {$job['heightfeet']}h ";
	if(!empty($job['depthfeet'])) {
		$size_text .= "x {$job['depthfeet']}d ";
	}
	
	if($pro['product_type'] == 'circle_tension'  || $pro['product_type'] == 'circle_tension_fabric' ) {
		$size_text = "{$job['widthfeet']}Dm x {$job['depthfeet']}d ";
	}
	
	$size_text	.=	ucwords($job['select_']);
	$size_text = $job['service_job']=='1' ?  ' - ' : $size_text;
	return $size_text;
}

function get_user_address_all($user_id) { global $db;

	$id = $db->clean($user_id);
	$output = array( 'text'=>array(), 'opts'=>array(), 'name'=>array() );
	
	$i = 2;
	$r2 = $db->query("SELECT * FROM accounts_shipping WHERE usrid='{$id}'") or die($db->error());
	while($d2 = $db->fetch_assoc($r2)) {
		
		$job_address = "<b>Address {$i}:</b> {$d2['firstname']} {$d2['lastname']}, {$d2['address1']} {$d2['address2']}, {$d2['city']}, {$d2['state']} {$d2['zip']}, {$d2['phone']}";
		
		$output['name'][$i] = $d2['profilename'];
		$output['text'][$i] = $job_address;
		$output['opts'][$i] = $d2['id'];
		
		$i++;
	}
	return $output;
	
}

function get_order_address_all($order_id) { global $db;

	$id = $db->clean($order_id);
	$output = array( 'text'=>array(), 'opts'=>array() );
	
	$r = $db->query("SELECT * FROM ag_order WHERE id='{$id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	$i = 2;
	$r2count = $db->num_rows($db->query("SELECT DISTINCT(job_address) FROM cart_alpha WHERE  order_id='{$id}' ORDER BY job_address"));
	if($r2count >  1) {
		$jcolor = 'style="color:red"'; 
		$db->query("UPDATE ag_order SET ship_notes='multi-address' WHERE  id='{$id}' AND ship_notes='' ");
	} else { 
		$jcolor = ''; 
	}
	$r2 = $db->query("SELECT DISTINCT(job_address) FROM cart_alpha WHERE job_address!='0' AND order_id='{$id}' ORDER BY job_address") or die($db->error());
	while($d2 = $db->fetch_assoc($r2)) {
		$ship_r = $db->query("Select * from accounts_shipping WHERE id='{$d2['job_address']}' LIMIT 1") or die($db->error());
		$ship2 = $db->fetch_assoc($ship_r);
		
		$r3 = $db->query("SELECT GROUP_CONCAT(position) AS job_nums FROM cart_alpha WHERE job_address='{$d2['job_address']}' AND order_id='{$id}' GROUP BY job_address");
		$d3 = $db->fetch_assoc($r3);
		
		$job_address = "<b {$jcolor}>Job #{$d3['job_nums']} Address:</b> {$ship2['firstname']} {$ship2['lastname']}, {$ship2['address1']} {$ship2['address2']}, {$ship2['city']}, {$ship2['state']} {$ship2['zip']}, {$ship2['phone']}";
		
		$output['text'][$i] = $job_address;
		$output['opts'][$i] = $d2['job_address'];
		
		$i++;
	}
	return $output;
	
}

function get_invoice_packages($packages, $order_id, $pkg_col_span='8', $tr_style='', $ret='html') { global $db;

	$address_opts = "<option value='0'>Default</option>";
	$job_address = get_order_address_all($order_id);
	foreach($job_address['opts'] as $job_address_k => $job_address_v) {
		$address_opts .= "<option value='{$job_address_v}'>Address {$job_address_k}</option>";
	}

	$package_values = array_values($packages);
	$package_values = array_unique($package_values);
	sort($package_values);
	$pkgs = '';
	$pkgs2 = array( 'pkgs'=>array(), 'address_opts'=>$address_opts );
	$b_res = $db->query("SELECT * FROM shipping_box WHERE order_id='{$order_id}' ORDER BY id") or die($db->error());
	foreach($package_values AS $package_value) {
		$b_width = $b_height = $b_depth = $b_weight =  $b_commodity = $b_ship_price = $b_job_address = '';
		if($b_row = $db->fetch_assoc($b_res)) {
			$b_width = $b_row['width'];
			$b_height = $b_row['height'];
			$b_depth = $b_row['depth'];
			$b_weight = $b_row['weight'];
			$b_checked_by = $b_row['checked_by'];
			$b_declared_value = $b_row['declared_value'];
			$b_commodity = $b_row['commodity'];
			$b_ship_price = $b_row['ship_price'];
			$b_job_address = $b_row['job_address'];
		}
		
		if($o_row['ship_country']=='Canada'){
					
		}else{
			/* $print_s	=	'&nbsp;&nbsp;&nbsp;'; */
		}
		
		$address_opts2 = str_replace("value='{$b_job_address}'", "value='{$b_job_address}' selected", $address_opts);
		$part_name = get_part_name_by_id($order_id);
		$part_ids = str_replace('#','',$part_name);
		$part_ids = str_replace(' ','',$part_ids);
		$partids = explode('-',$part_ids);
		$pkgs .= "<tr class='all_tr tr{$order_id} pkgs_tr_{$order_id} tr{$partids[0]} tr{$part_ids}' style='{$tr_style}'><td colspan='{$pkg_col_span}'>
				<button class='btn btn-sm btn-default pkg_{$order_id}' data-order_id='{$order_id}' data-pkgs='".htmlspecialchars(base64_encode(json_encode($packages)), ENT_QUOTES)."' data-pkg='{$package_value}' onclick='q_show_packages(this)'><i class='fa fa-folder-o'></i> {$package_value}</button>
				&nbsp;&nbsp;&nbsp;
				<label>Width: <input type='text' placeholder='Width' class='box_item_{$order_id}' data-type='width' data-num='{$package_value}' value='{$b_width}' style='width: 70px;' onkeyup=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\"></label>
				&nbsp;&nbsp;&nbsp;
				<label>Height: <input type='text' placeholder='Height' class='box_item_{$order_id}' data-type='height' data-num='{$package_value}' value='{$b_height}' style='width: 70px;' onkeyup=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\"></label>
				&nbsp;&nbsp;&nbsp;
				<label>Depth: <input type='text' placeholder='Depth' class='box_item_{$order_id}' data-type='depth' data-num='{$package_value}' value='{$b_depth}' style='width: 70px;' onkeyup=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\"></label>
				&nbsp;&nbsp;&nbsp;
				<label>Weight: <input type='text' placeholder='Weight' class='box_item_{$order_id}' data-type='weight' data-num='{$package_value}' value='{$b_weight}' style='width: 70px;' onkeyup=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\"></label>
				&nbsp;&nbsp;&nbsp;
				<label>Declared Value: <input type='text' placeholder='Declared Value' class='box_item_{$order_id}' data-type='declared_value' data-num='{$package_value}' value='{$b_declared_value}' style='width: 70px;' onkeyup=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\"></label>
				&nbsp;&nbsp;&nbsp;
				<label>Checked By: <input type='text' placeholder='Checked By' class='box_item_{$order_id}' data-type='checked_by' data-num='{$package_value}' value='{$b_checked_by}' style='width: 70px;' onkeyup=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\"></label>
				&nbsp;&nbsp;&nbsp;
				<label>Addr: <select class='box_item_{$order_id}' data-type='shipping_address' data-num='{$package_value}' style='width: 70px;' onchange=\"q_show_packages1($('.pkg_{$order_id}[data-pkg={$package_value}]'))\">{$address_opts2}</select></label>
				&nbsp;&nbsp;&nbsp;
				<label style='display: none;'>$ <input type='text' placeholder='$' class='box_item_{$order_id}' data-type='ship_price' data-num='{$package_value}' value='{$b_ship_price}' style='width: 70px;' readonly></label>
				
				&nbsp;&nbsp;&nbsp;
				<button class='btn btn-sm btn-success btn_cr_pkg' onclick='update_package(this)' data-order_id='{$order_id}' data-num='{$package_value}' style='display: none;'>Update Package <i style='display: none;' class='fa fa-asterisk fa-spin'></i></button> 
			</td></tr>";
			
			$pkgs2['pkgs'][$package_value] = array('package_value'=>$package_value, 'b_width'=>$b_width, 'b_height'=>$b_height, 'b_depth'=>$b_depth, 'b_weight'=>$b_weight, 'b_declared_value'=>$b_declared_value, 'b_checked_by'=>$b_checked_by, 'b_ship_price'=>$b_ship_price, 'b_job_address'=>$b_job_address);
		
	}
	
	if( $ret=='html' ) {
		$new_rows	=	get_run_data($order_id,$pkg_col_span);
		return $pkgs.$new_rows;
	} else {
		return $pkgs2;
	}
}

function rename_file($name, $order_id, $ret=false) {
	
	$art_name = preg_replace("/[^a-zA-Z0-9\-\_\.]+/", '_', $name);
	$art_name_sub = (strlen($art_name) > 15) ? substr($art_name, 10) : $art_name;
	$art_name_exp = explode('_', $art_name);
	if( $order_id != $art_name_exp[0] ) {
		$art_name2 = $order_id . '_' . $art_name_sub;
		$art_name_count = 1;
		while( file_exists(F_PATH . '/server/php/proofs/' . $art_name2 . '.png') ) {
			$art_name_count++;
			$art_name2 = $order_id . '_' . $art_name_count . $art_name_sub;
		}
		if($ret) {
			return $art_name2;
		} else {
			rename(F_PATH . '/server/php/files2/' . $art_name, F_PATH . '/server/php/files2/' . $art_name2);
			rename(F_PATH . '/server/php/proofs/' . $art_name . '.png', F_PATH . '/server/php/proofs/' . $art_name2 . '.png');
			rename(F_PATH . '/server/php/thumbnails/' . $art_name . '.png', F_PATH . '/server/php/thumbnails/' . $art_name2 . '.png');
			return $art_name2;
		}
	} else {
		return $art_name;
	}
}

function rename_file2($name, $order_id, $cart_id, $ret=false) {
	global $db;
	$r = $db->query("SELECT * FROM cart_alpha WHERE id='{$cart_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	
	$name_org = $name;
	$name_exp = explode('_', $name); 
	$path_parts = pathinfo($name);
	
	$fname = $path_parts['filename'];
	$namesub = substr($fname, 0, 10);
	$namesub = is_numeric($namesub) ? $namesub : '';
	$fname = str_replace( array('fullscale', '10thscale', '12thscale', '_', $order_id, 'j'.$d['position'], $namesub), '', $fname );
	$fname = preg_replace('/\s+/', '_', $fname);
	$fname = trim($fname);
	
	$scale = '';
	/* if($d['file_scaling'] != '') { $scale = '_'.$d['file_scaling']; } */
	if(strpos($name, 'fullscale') !== false) { $scale = '_fullscale'; }
	elseif(strpos($name, '10thscale') !== false) { $scale = '_10thscale'; }
	elseif(strpos($name, '12thscale') !== false) { $scale = '_12thscale'; }
	
	$art_name2 = "{$order_id}_j{$d['position']}_{$fname}{$scale}.{$path_parts['extension']}";
	$art_name_count = 1;
	while( file_exists(F_PATH . '/server/php/proofs/' . $art_name2 . '.png') && $art_name2!=$name_org ) {
		$art_name_count++;
		$art_name2 = "{$order_id}_j{$d['position']}_{$fname}{$scale}_{$art_name_count}.{$path_parts['extension']}";
	}
	
	if($ret) {
		return $art_name2;
	} else {
		rename(F_PATH . '/server/php/files2/' . $name, F_PATH . '/server/php/files2/' . $art_name2);
		rename(F_PATH . '/server/php/proofs/' . $name . '.png', F_PATH . '/server/php/proofs/' . $art_name2 . '.png');
		rename(F_PATH . '/server/php/thumbnails/' . $name . '.png', F_PATH . '/server/php/thumbnails/' . $art_name2 . '.png');
		return $art_name2;
	}
}

function length_converter($from_u, $to_u, $val) {
	$calc = array(
		'centimeters'=> array( 'centimeters'=> 1, 'meters'=> 1/100, 'feet'=> 1/30.48, 'inches'=> 1/2.54, 'yards'=> 1/91.44 ),
		'meters'=> array( 'centimeters'=> 100, 'meters'=> 1, 'feet'=> 1/0.3048, 'inches'=> 1/0.0254, 'yards'=> 1/0.9144 ),
		'feet'=> array( 'centimeters'=> 30.48, 'meters'=> 0.3048, 'feet'=> 1, 'inches'=> 12, 'yards'=> 1/3 ),
		'inches'=> array( 'centimeters'=> 2.54, 'meters'=> 0.0254, 'feet'=> 1/12, 'inches'=> 1, 'yards'=> 1/36 ),
		'yards'=> array( 'centimeters'=> 91.44, 'meters'=> 0.9144, 'feet'=> 3, 'inches'=> 36, 'yards'=> 1 ),
		'liters'=> array( 'liters'=> 1, 'milliliters'=> 1000 ),
		'milliliters'=> array( 'liters'=> 0.001, 'milliliters'=> 1 )
	);
	$res = $calc[$from_u][$to_u]*$val;
	return number_format($res, 2, '.', '');
}

function get_stock_sqft_data_qb($stock_id) { global $db;
	
	$stock_id = $db->clean($stock_id);
	$r = $db->query("SELECT * FROM stock_detailsqb WHERE id='{$stock_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	$r2 = $db->query("SELECT * FROM stock_type WHERE id='{$d['stock_type']}'") or die($db->error());
	$d2 = $db->fetch_assoc($r2);
	
	$output = array(
		'stock_cost_per_unit' => $d['cost_per_unit'],
		'stock_type' => $d2['stock_type'],
		'product_width' => $d['product_width'],
		'product_height' => $d['product_height'],
		'active' => $d['active'],
	);
	
	return $output;
}

function get_cost_per_unit3( $vendor, $stock, $stock_type ) {
	$cost = $vendor['cost'];
	$quantity = $vendor['quality'];
	$width = $vendor['width'];
	$length = $vendor['length'];
	$volume = $vendor['volume'];
	$unit = $vendor['unit'];
	$size_unit_width = $vendor['size_unit_width'];
	$size_unit_length = $vendor['size_unit_length'];
	$size_unit_volume = $vendor['size_unit_volume'];
	$items_per_bulk = $stock['items_per_bulk'];
	
	if(empty($quantity)) { $quantity = 1; }
	
	$stock_type = $stock_type['stock_type'];
	
	if($stock_type == 'Linear') {
		$width_ft = 1;
	} else {
		$width_ft = length_converter($size_unit_width, 'feet', $width);
	}
	$length_ft = length_converter($size_unit_length, 'feet', $length);
	$volume_lt = length_converter($size_unit_volume, 'liters', $volume);
	$sqft = $width_ft*$length_ft;

	$sqft = round($sqft, 4);
	$sqft = $sqft*$quantity;
	
	$volume_lt = $volume_lt*$quantity;
	$unit = $unit*$quantity;
	
	if($stock_type == 'Bulk') {
		$cost_per_unit = $cost/$quantity;
		$cost_per_unit = $cost_per_unit/$items_per_bulk;
	} elseif($stock_type == 'Sheet') {
		$cost_per_unit = $cost/$sqft;
	} elseif($stock_type == 'Ink') {
		$cost_per_unit = $cost/$volume_lt;
	} elseif($stock_type == 'Unit') {
		$cost_per_unit = $cost/$unit;
	} else {
		$cost_per_unit = $cost/$sqft;
	}
	
	$cost_per_unit = round($cost_per_unit, 4);
	/* $cost_per_unit = !is_numeric($cost_per_unit) ? '0.00' : $cost_per_unit; */
	return $cost_per_unit;
}

function get_stock_sqft_price($stock_id) { global $db;
	
	$stock_unit_array = array(
		'Roll' => ' per SqFt',
		'Linear' => ' per LnFt',
		'Ink' => ' per mL',
		'Sheet' => ' per sqft (sheet)',
		'Bulk' => ' per Sheet',
		'Unit' => ' per Unit',
	);
	
	$stock_id = $db->clean($stock_id);
	$r = $db->query("SELECT * FROM stock_details WHERE id='{$stock_id}' LIMIT 1") or die($db->error());
	$d = $db->fetch_assoc($r);
	
	$r2 = $db->query("SELECT * FROM stock_type WHERE id='{$d['stock_type']}'") or die($db->error());
	$d2 = $db->fetch_assoc($r2);
	
	$stock_cost_per_unit_ar = $cpu_ar = array();
	$stock_cost_per_unit_avg = $cpu_avg = '0.00';
	$r3 = $db->query("SELECT * FROM inventory_stock_vendor_con WHERE stock_id='{$stock_id}'");
	while( $d3 = $db->fetch_assoc($r3) ) {
		/* $stock_cost_per_unit = $d3['cost_per_unit']; */
		$stock_cost_per_unit = $d3['cost'];
		
		if(!empty($d['stock_detailsqb_id'])) {
			$output = get_stock_sqft_data_qb( $d['stock_detailsqb_id'] );
			if( $output['active'] == '1' ) {
				$stock_cost_per_unit = $output['stock_cost_per_unit'];
				$d3['cost'] = $output['stock_cost_per_unit'];
			}
		}
		
		$cpu_3 = get_cost_per_unit3( $d3, $d, $d2 );
		
		$width_ft = length_converter($d3['size_unit_width'], 'feet', $d3['width']);
		$length_ft = length_converter($d3['size_unit_length'], 'feet', $d3['length']);
		$sqft = $width_ft*$length_ft;
		
		$cpu = '0.00';
		if($d2['stock_type'] == 'Sheet') {
			/* Sheet's cost per unit is per 'Sheet/Qty', change it to per sqft */
			/* $cpu = $stock_cost_per_unit = number_format($stock_cost_per_unit/$sqft, 4, '.', ''); */
			$cpu = $stock_cost_per_unit = $cpu_3;
		}
		else if($d2['stock_type'] == 'Roll') {
			/* $cpu = $stock_cost_per_unit; */
			/* $cpu = $stock_cost_per_unit = number_format($stock_cost_per_unit/$sqft, 4, '.', ''); */
			$cpu = $stock_cost_per_unit = $cpu_3;
		}
		else if($d2['stock_type'] == 'Bulk') {
			if(empty($d['cost_per_foot'])) {
				/* $cpu = ($d['applied_per_lnft'] > 0) ? $stock_cost_per_unit*4 : $stock_cost_per_unit; */
				/* $cpu = ($d['applied_per_lnft'] > 0) ? $stock_cost_per_unit : '0.00'; */
				/* $cpu = $stock_cost_per_unit; */
				$cpu = $stock_cost_per_unit = $cpu_3;
			} else {
				$cpu = $d['cost_per_foot'];
			}
		}
		else if($d2['stock_type'] == 'Linear') {
			/* $cpu = $stock_cost_per_unit; */
			$cpu = $stock_cost_per_unit = $cpu_3;
		}
		else if($d2['stock_type'] == 'Ink') {
			$cpu = $stock_cost_per_unit = $cpu_3;
			$cpu = number_format($stock_cost_per_unit/1000, 4, '.', '');
		}
		
		$cpu_ar[] = $cpu;
		$stock_cost_per_unit_ar[] = $stock_cost_per_unit;
	}
	
	$cpu_ar = array_filter($cpu_ar);
	if(count($cpu_ar)) {
		$cpu_avg = array_sum($cpu_ar)/count($cpu_ar);
	}
	
	$stock_cost_per_unit_ar = array_filter($stock_cost_per_unit_ar);
	if(count($stock_cost_per_unit_ar)) {
		$stock_cost_per_unit_avg = array_sum($stock_cost_per_unit_ar)/count($stock_cost_per_unit_ar);
	}
	
	return array('value'=>$stock_cost_per_unit_avg, 'label'=>$stock_unit_array[$d2['stock_type']], 'stock_type'=>$d2['stock_type'], 'stock_name'=>$d['stock_name'], 'cpu'=>$cpu_avg);
	
}

function nf2m($number, $precision = 2) {
	$number = bcadd($number, 0, 4);
	$fig = (int) str_pad('1', ($precision+1), '0');
	/* $fig2 = (ceil($number * $fig) / $fig); */
	$fig2 = bcdiv(ceil(bcmul($number, $fig, 4)), $fig, 4);
	return number_format($fig2, 2, '.', '');
}

function get_total_machines_cost($cat_id) {
	global $db;
	$cat_id = $db->clean($cat_id);
	$total = 0;
	$r = $db->query("SELECT * FROM pro_machine_con WHERE product_id='{$cat_id}' AND is_checked='1'");
	while($d = $db->fetch_assoc($r)) {
		$base_price = get_product_machine_base_price($cat_id, $d['machine_id']);
		$total += $base_price;
	}
	return $total;
}
	
function get_new_cog($cog, $cat_id, $mat_id, $base=false) { global $db, $Company_Info;
	
	$cat_row_r = $db->query("SELECT total_machines_cost, base_cost, default_mat FROM grouping_cat WHERE id='{$cat_id}' LIMIT 1");
	$cat_row = $db->fetch_assoc($cat_row_r);
	
	$mat_row_r = $db->query("SELECT stock_id FROM material_profile WHERE mat_id='{$mat_id}' LIMIT 1");
	$mat_row = $db->fetch_assoc($mat_row_r);
	
	$cat_row['total_machines_cost'] = get_total_machines_cost($cat_id);
	
	if(!empty($cat_row['total_machines_cost']) || !empty($mat_row['stock_id'])) {
		/* $cog = nf2m($cat_row['total_machines_cost']+$unit_cost_array['cpu'], 2, '.', ''); */
		$unit_cost_array = get_stock_sqft_price($mat_row['stock_id']);
		$unit_cost_arrayd['cpu'] = '0';
		if(!empty($cat_row['default_mat'])) {
			$mat_row_rd = $db->query("SELECT stock_id FROM material_profile WHERE mat_id='{$cat_row['default_mat']}' LIMIT 1");
			$mat_rowd = $db->fetch_assoc($mat_row_rd);
			$unit_cost_arrayd = get_stock_sqft_price($mat_rowd['stock_id']);
		}
		
		$cog = nf2m($cat_row['base_cost']+$unit_cost_array['cpu']-$unit_cost_arrayd['cpu'], 2, '.', '');
		if($base) {
			$cog = nf2m($cat_row['total_machines_cost']+$unit_cost_array['cpu'], 2, '.', '');
			
			$admin_cost_percent = 100-$Company_Info['administrative_cost'];
			$waste_cost_percent = 100-$Company_Info['waste_cost'];
			$admin_cost = ($cog/$admin_cost_percent*100) - $cog;
			$waste_cost = ($unit_cost_array['cpu']/$waste_cost_percent*100) - $unit_cost_array['cpu'];
			$cog = nf2m($cog + $admin_cost + $waste_cost, 2, '.', '');
		}
	} else {
		$cog = $cog;
	}
	return $cog;
}

function get_option_cog($cog, $opt_id) { global $db, $Company_Info;
	
	$opt_res = $db->query("SELECT finishing_profile_id2, unit_price, base_price FROM options WHERE id='{$opt_id}' LIMIT 1") or die($db->error());
	$opt_row = $db->fetch_assoc($opt_res);
	
	$profile_res = $db->query("SELECT base_price FROM pressing_profiles WHERE id='{$opt_row['finishing_profile_id2']}'") or die($db->error());
	$profile_row = $db->fetch_assoc($profile_res);
	$base_price = !empty($opt_row['base_price']) ? $opt_row['base_price'] : $profile_row['base_price'];
	
	if(!empty($opt_row['finishing_profile_id2']) || ($opt_row['unit_price'] > 0)) {
		$cog = number_format($base_price+$opt_row['unit_price'], 2, '.', '');
		
		$admin_cost_percent = 100-$Company_Info['administrative_cost'];
		$waste_cost_percent = 100-$Company_Info['waste_cost'];
		$admin_cost = ($cog/$admin_cost_percent*100) - $cog;
		$waste_cost = ($cog/$waste_cost_percent*100) - $cog;
		$cog = nf2m($cog + $admin_cost, 2, '.', '');
	} else {
		$cog = $cog;
	}
	return $cog;
}

function get_size_id($pro_id, $width_in, $height_in, $size_id_org) { global $db;
	/* $width_in = round($width_in, 2);
	$height_in = round($height_in, 2); */
	$size_id = '';
	$r = $db->query("SELECT pro_size_conn.size_id FROM pro_size_conn LEFT JOIN size_table ON pro_size_conn.size_id=size_table.id WHERE pro_size_conn.pro_id='{$pro_id}' AND ( (ABS(size_table.width_in)='{$width_in}' AND ABS(size_table.height_in)='{$height_in}') OR (ABS(size_table.width_in)='{$height_in}' AND ABS(size_table.height_in)='{$width_in}') )");
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		$size_id = $d['size_id'];
	}
	
	if(!empty($size_id_org)) {
		$r = $db->query("SELECT * FROM size_table WHERE id='{$size_id_org}' LIMIT 1");
		$d = $db->fetch_assoc($r);
		if( ($d['width_in'] == $width_in && $d['height_in'] == $height_in) || 
			($d['width_in'] == $height_in && $d['height_in'] == $width_in) ) {
			$size_id = $size_id_org;
		}
	}
	
	return $size_id;
}

function get_sales_team1_ids() { global $db;
	$bnj	=	$db->query("Select settings.description,accounts_ag.id from settings Inner Join accounts_ag On settings.description=accounts_ag.email WHERE settings.category='Sales Team 1'") or die($db->error());
	$accids = array();
	if($db->num_rows($bnj)>0){
		while($fetch_bnj	=	$db->fetch_assoc($bnj)){
			$accids[]	=	"'{$fetch_bnj['id']}'";	
		}
	}
	return implode(', ', $accids);
}

function get_invoice_notification_emails($user_id) { global $db;
	$Cc2 = "";
	$notifications_r = $db->query("SELECT * FROM account_notifications WHERE account_id='{$user_id}' AND active=1") or die($db->error());
	if($db->num_rows($notifications_r)>0) {
		while($notification = $db->fetch_assoc($notifications_r)) {
			$Cc2 .= "{$notification['first_name']} {$notification['last_name']} <{$notification['email']}>, ";
		}
		$Cc2 = rtrim($Cc2, ", ");
	}
	return $Cc2;
}

function get_user($id) { global $db;
	$r = $db->query("SELECT * FROM accounts_ag WHERE id='{$id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	return $d;
}

function attr_clean($val) {
	$val = str_replace('\n', "\n", $val);
	return htmlspecialchars($val, ENT_QUOTES);
}

function get_mat_name($id, $name) {
	global $db;
	$id = $db->clean($id);
	$r = $db->query("SELECT mat_name, nickname, stock_id FROM material_profile WHERE mat_id='{$id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	if($name == 'name') {
		return $d['mat_name'];
	} elseif($name == 'nickname') {
		if(!empty($d['nickname'])) {
			return $d['nickname'];
		} else {
			return $d['mat_name'];
		}
	} else {
		$r2 = $db->query("SELECT production_name FROM stock_details WHERE id='{$d['stock_id']}' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		if(!empty($d2['production_name'])) {
			return $d2['production_name'];
		} else {
			return $d['mat_name'];
		}
	}
}

function get_opt_name($id, $name='') {
	global $db;
	$id = $db->clean($id);
	$r = $db->query("SELECT title, nickname, production_name FROM options WHERE id='{$id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	if($name == 'name') {
		return $d['title'];
	} elseif($name == 'nickname') {
		if(!empty($d['nickname'])) {
			return $d['nickname'];
		} else {
			return $d['title'];
		}
	} else {
		if(!empty($d['production_name'])) {
			return $d['production_name'];
		} else {
			return $d['title'];
		}
	}
}

function get_machine_name($id, $name='name') {
	global $db;
	$id = $db->clean($id);
	$r = $db->query("SELECT * FROM pressing_profiles WHERE id='{$id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	if( $name == 'name' ) {
		return $d['pro_name'];
	} elseif( $name == 'nickname' ) {
		return !empty($d['nick_name']) ? $d['nick_name'] : $d['pro_name'];
	}
}

function add_log_entry($user_id=0, $emp_id=0, $action, $action_value, $order_id ) { global $db;
	$user_id = empty($user_id) ? $_SESSION['id'] : $user_id;
	if(!empty($emp_id)) { $user_id = 0; }
	$action = $db->clean($action);
	$action_value = $db->clean($action_value);
	$db->query("INSERT into log_collector SET `user_id`='{$user_id}', `emp_id`='{$emp_id}', ip_address='{$_SERVER['REMOTE_ADDR']}', action='{$action}', action_value='{$action_value}', order_id='{$order_id}', date_change='". date('Y-m-d H:i:s') ."'"); 
	return true;
}

function img_png_to_jpg($filepath) {
	
	$image = imagecreatefrompng($filepath);
	$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
	imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
	imagealphablending($bg, TRUE);
	imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
	imagedestroy($image);
	$quality = 100; /* // 0 = worst / smaller file, 100 = better / bigger file  */
	imagejpeg($bg, $filepath . ".jpg", $quality);
	imagedestroy($bg);
}

function get_user_by_id( $user_id, $bill_id='', $ship_id='' ) {
	global $db;
	$user_id = $db->clean($user_id);
	$bill_id = $db->clean($bill_id);
	$ship_id = $db->clean($ship_id);
	
	$user_r = $db->query("SELECT * FROM accounts_ag WHERE id='{$user_id}' LIMIT 1") or die($db->error());
	$user = $db->fetch_assoc($user_r);
	if($user['parent_id'] != 0) {
		$user = get_child_account_row($user_id);
	}
	$user['phone'] = empty( $user['work_phone'] ) ? $user['cellphone'] : $user['work_phone'];
	
	if( empty($bill_id) ) {
		$bill = array(
			'nameoncard'=>$user['fname'] . ' ' . $user['lname'], 
			'firstname'=>$user['fname'], 
			'lastname'=>$user['lname'], 
			'email'=>$user['email'], 
			'address1'=>$user['address1'], 
			'address2'=>$user['address2'], 
			'city'=>$user['city'], 
			'state'=>$user['state'], 
			'zip'=>$user['zip'], 
			'phone'=>$user['phone'],
			'country'=>$user['country']
		);
	} else {
		$bill_q =	"Select * from accounts_cc WHERE id='{$bill_id}'";
		$bill_r = $db->query($bill_q) or die($db->error());
		if($db->num_rows($bill_r)) {
			$bill = $db->fetch_assoc($bill_r);
			$bill['nameoncard'] = $bill['firstname'] . ' ' . $bill['lastname'];
		}
	}
	$user['bill'] = $bill;
	
	if( empty($ship_id) ) {
		$ship = array(
			'firstname'=>$user['fname'], 
			'lastname'=>$user['lname'], 
			'email'=>$user['email'], 
			'address1'=>$user['address1'], 
			'address2'=>$user['address2'], 
			'city'=>$user['city'], 
			'state'=>$user['state'], 
			'zip'=>$user['zip'], 
			'phone'=>$user['phone'],
			'country'=>$user['country']
		);
	} else {
		$ship_q = "Select * from accounts_shipping WHERE id='{$ship_id}' LIMIT 1";
		$ship_r = $db->query($ship_q) or die($db->error());
		if($db->num_rows($ship_r)) {
			$ship = $db->fetch_assoc($ship_r);
		}
	}
	$user['ship'] = $ship;
	
	
	return $user;
}

function get_user_billing_options($user_id) {
	global $db;
	$user_id = $db->clean($user_id);
	$output = array('user_id'=>$user_id, 'html'=>'');
	$billing_options = '<option value="0">Account Billing</option>';
	$c_query 	=	 $db->query("Select fname,lname,company,default_billing from accounts_ag where id='".$user_id."'") or die($db->error());
	$fetc_c_query	=	 $db->fetch_assoc($c_query);
	if($fetc_c_query['company']==""){
		$company 	=	$fetc_c_query['fname'].' '.$fetc_c_query['lname'];
	}else{
		$company 	=	$fetc_c_query['company'];
	}
	$rb = $db->query("SELECT * FROM accounts_cc WHERE usrid='{$user_id}'") or die($db->error());
	while($rb2 = $db->fetch_assoc($rb)) {
		$rb2['company']	=	$company;
		if($fetc_c_query['default_billing']!=""){
			if($fetc_c_query['default_billing']==$rb2['id']){
				$sh	=	"selected";
			}else{
				$sh	= null;
			}
		}
		$billing_options .= "<option value='{$rb2['id']}' ".$sh." data-row='". htmlspecialchars(json_encode($rb2), ENT_QUOTES) ."'>{$rb2['profilename']}</option>";
	}
	$output['html'] = $billing_options;
	$output['default_billing'] = $fetc_c_query['default_billing'];
	return $output;
}

function get_user_shipping_options($user_id) {
	global $db;
	$user_id = $db->clean($user_id);
	$user_r = $db->query("SELECT * FROM accounts_ag WHERE id='{$user_id}' LIMIT 1") or die($db->error());
	$user = $db->fetch_assoc($user_r);
	if( empty($ship_id) ) {
		$ship = array(
			'profilename'=>'Account Shipping', 
			'firstname'=>$user['fname'], 
			'lastname'=>$user['lname'], 
			'email'=>$user['email'], 
			'address1'=>$user['address1'], 
			'address2'=>$user['address2'], 
			'city'=>$user['city'], 
			'state'=>$user['state'], 
			'zip'=>$user['zip'], 
			'phone'=>$user['phone'],
			'country'=>$user['country']
		);
	}
	$output = array('user_id'=>$user_id, 'html'=>'');
	$shipping_options = '<option value="0"  data-row="'. htmlspecialchars(json_encode($ship), ENT_QUOTES) .'">Account Shipping</option>';
	$rb = $db->query("SELECT * FROM accounts_shipping WHERE usrid='{$user_id}'") or die($db->error());
	while($rb2 = $db->fetch_assoc($rb)) {
		$shipping_options .= "<option value='{$rb2['id']}' data-row='". htmlspecialchars(json_encode($rb2), ENT_QUOTES) ."'>{$rb2['profilename']}</option>";
	}
	$output['html'] = $shipping_options;
	return $output;
}

function get_all_options( $custom_opts=false ) {
	global $db;
	$output = array( 'opts'=>array() );
	$co_sql = $custom_opts ? " AND add_to_custom_option='1' " : '';
	$opt_r = $db->query("Select id from options WHERE new='1' AND ps_id=0 AND is_delete='0' {$co_sql} ORDER BY title") or die($db->error());
	while($opt_d = $db->fetch_assoc($opt_r)) {
		$output[ 'opts' ][ $opt_d['id'] ] = get_opt_name($opt_d['id'], 'production_name');
	}
	asort($output['opts']);
	return $output;
}

function hide_frame_details( $custom_opts ) {
	$hide = false;
	foreach($custom_opts as $k => $v) {
		if(substr($v['name'], 0, 5) == 'Frame' && $v['vtc']!='Y') {
			$hide = true;
		}
	}
	return $hide;
}

function get_sales_person(){
	global $db;
	$sql = "SELECT accounts_ag.id, 
			accounts_ag.fname, 
			accounts_ag.lname, 
			admin_access_types.sales_person, 
			admin_access_types.pre_press_person 
			FROM accounts_ag LEFT JOIN admin_access_types ON accounts_ag.access=admin_access_types.id 
			WHERE accounts_ag.access != '' 
			AND (admin_access_types.sales_person='1' OR admin_access_types.pre_press_person='1')";
	$r = $db->query($sql);
	$output = array();
	while($d = $db->fetch_assoc($r)) {
		$output[] = $d;
	}
	return $output;
}

function get_companies(){
	global $db;
	$sql = "SELECT id, 
			company, 
			CONCAT(fname,' ',lname) as full_name,
			email,
			tags
			FROM accounts_ag ORDER BY if( company = '' OR company IS NULL , 1, 0 ) , company ASC"; 
	$r = $db->query($sql);
	$output = array();
	while($d = $db->fetch_assoc($r)) {
		$output[] = $d;
	}
	return $output;
}

function get_sales_employees( $emp_id = '', $department = 7 ){
	global $db;
	$sql = "SELECT employees.emp_id, 
			employees.emp_status, 
			employees.emp_code, 
			employees.emp_fname, 
			employees.emp_lname, 
			employees.emp_email, 
			employees.visible, 
			departments.name 
			FROM employees LEFT JOIN departments ON employees.organisational_id=departments.id 
			WHERE employees.app_client_id='1' 
			AND departments.id='$department'";
	if( $emp_id != '' ){
		$sql .= " AND employees.emp_id = $emp_id";
		$r = $db->query($sql);
		$output = $db->fetch_assoc($r);
		return $output;
	}
	else{
		$r = $db->query($sql);
		$output = array();
		while($d = $db->fetch_assoc($r)) {
			$output[] = $d;
		}
		return $output;
	}	
	
}

function remaining_seconds( $endtimestamp ){    
    $currenttimestamp   = time();
    $remainingHrs       = ($endtimestamp - $currenttimestamp) / 3600;
    if( $remainingHrs < 0){
        $remainingHrs = 0;
    }
    return round($remainingHrs, 2);
}

function get_all_locations(){
	global $db;
	$sql = "SELECT id, value FROM child_account_mgl WHERE type = 'location' ";
	$query = $db->query($sql);
	$output = array();
	while($d = $db->fetch_assoc($query)) {
		$output[] = $d;
	}
	return $output;
}

function get_sms_alerts() {
	global $db;
	$sql = "SELECT * FROM sms_alerts WHERE active='1'";
	$query = $db->query($sql);
	$output = array();
	while($d = $db->fetch_assoc($query)) {
		$output[] = $d;
	}
	return $output;
}


function get_general_info( $userId=NULL ){
	global $db;
	if(!is_null($userId)) {
		$sql = "SELECT id, 
				CONCAT(fname,' ',lname) as full_name, 
				email, website, company, cellphone, work_phone, bill_email2
				FROM accounts_ag WHERE id = $userId";
		return $db->fetch_assoc( $db->query($sql) );
	}
}

function get_install_events( $order_id ) {
	global $db;
	$sql = "SELECT * FROM install_events WHERE order_id='{$order_id}'";
	$query = $db->query($sql);
	$output = array();
	while($d = $db->fetch_assoc($query)) {
		$output[] = $d;
	}
	return $output;
}

function get_production_status( $order_row, $due_date ) {
	/*
	global $db;
	$r = $db->query("SELECT * FROM log_collector WHERE action='status_changed' AND action_value='PRODUCTION' AND order_id='{$order_id}' ORDER BY id DESC LIMIT 1") or die($db->error());
	$rb2 = $db->query("SELECT * FROM log_collector WHERE (action='manually_approved' OR action='customer_approved') AND order_id='{$order_id}' ORDER BY id DESC LIMIT 1") or die($db->error());
	
	
	$r2 = $db->query("SELECT do_reprint, order_date FROM ag_order WHERE id='{$order_id}' LIMIT 1") or die($db->error());
	$d2 = $db->fetch_assoc($r2);
	
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
	} elseif($db->num_rows($rb2)) {
		$d = $db->fetch_assoc($rb2);
	} else {
		$d = array('date_change'=>$d2['order_date']);
	}
	
	$a = strftime("%Y-%m-%d", strtotime($d['date_change']));
	$c = strftime("%Y-%m-%d");
	$x = (strtotime($c) - strtotime($a))/86400;
	
	$status = $x > 1 ? 'past_due' : 'on_press';
	$html = '<div class="pr_status_pd"><span style="margin-top:-6px"><i class="gi gi-warning_sign"></i></span></div>';
	if($status == 'on_press') {
		$html = '<div class="pr_status_op"><i class="hi hi-print"></i></div>';
	}
	if($d2['do_reprint']) {
		$status = 'reprint';
		$html = '<div class="pr_status_rp"><i class="hi hi-print"></i></div>';
	}
	$html2 = '<div class="pr_status_up"><i class="fa fa-flask"></i></div>';
	$output = array('status'=>$status, 'html'=>$html, 'status2'=>'a_up_coming', 'html2'=>$html2);
	return $output;
	 */
	
	$status_array = array(
		'on_press' => array( 'status'=>'on_press', 'html'=>'<div class="pr_status_op"><i class="hi hi-print"></i></div>' ),
		'past_due' => array( 'status'=>'past_due', 'html'=>'<div class="pr_status_pd"><span style="margin-top:-6px"><i class="gi gi-warning_sign"></i></span></div>' ),
		'reprint' => array( 'status'=>'reprint', 'html'=>'<div class="pr_status_rp"><i class="hi hi-print"></i></div>' ),
		'up_coming' => array( 'status'=>'a_up_coming', 'html'=>'<div class="pr_status_up"><i class="fa fa-flask"></i></div>' ),
	);
	
	$d = $order_row;
	$due_date = strftime("%Y-%m-%d", strtotime($due_date));
	$today = strftime("%Y-%m-%d");
	$datommorrow = strftime("%Y-%m-%d", strtotime('+2 days'));
	
	if( $d['do_reprint'] ) {
		
		$output = $status_array['reprint'];
		
	} elseif ( strtotime($due_date) < strtotime($today) ) {
		
		$output = $status_array['past_due'];
		
	} elseif ( strtotime($due_date) > strtotime($datommorrow)-1 ) {
		
		$output = $status_array['up_coming'];
		
	} else {
		
		$output = $status_array['on_press'];
		
	}
	
	return $output;
	
}

function get_machine_by_id( $machine_id ) {
	global $db;
	$machine_id = $db->clean($machine_id);
	
	$r = $db->query("SELECT * FROM pressing_profiles WHERE id='{$machine_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	
	$r2 = $db->query("SELECT * FROM machine_modes WHERE id='{$d['mode_id']}' LIMIT 1") or die($db->error());
    $d2 = $db->fetch_assoc($r2);
	
	$d['mode_data'] = $d2;
    
	return $d;
}

function get_opt_by_id( $opt_id ) {
	global $db;
	$option_id = $db->clean($opt_id);
	$r = $db->query("SELECT * FROM options WHERE id='{$option_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	return $d;
}

function get_pro_by_id( $pro_id ) {
	global $db;
	$product_id = $db->clean($pro_id);
	$r = $db->query("SELECT * FROM grouping_cat WHERE id='{$product_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	$d['machines'] = array();
	$d['mode_data'] = array();
	$r2 = $db->query("SELECT * FROM pro_machine_con WHERE product_id='{$product_id}'");
	while($d2 = $db->fetch_assoc($r2)) {
		$r3 = $db->query("SELECT * FROM machine_modes WHERE id='{$d2['mode_id']}' LIMIT 1") or die($db->error());
		$d3 = $db->fetch_assoc($r3);
		$d['machines'][] = $d2;
		$d['mode_data'][] = $d3;
	}
	return $d;
}

function get_opt_sqft( $opt_fetch, $width, $height, $size_type, $edges_data, $quantity ) {
	
	if($opt_fetch['option_type'] == 'sqft') {
		if($size_type == 'inches') {
			$sqft	=	($width*$height)/144;
		} else {
			$sqft	=	$width*$height;
		}			
	} else if($opt_fetch['option_type'] == 'flat') {
		$sqft = 1;
	} else {
		if($size_type == 'inches') {
			$ttvalue = 0;
			for($j=1; $j<=4; $j++) {
				$check_value = in_array($j, $edges_data);
				if($check_value) {
					if($j==1 || $j==4) {
						$ttvalue	=	$ttvalue+$width;
					} else {
						$ttvalue	=	$ttvalue+$height;
					}
				}
			}
			$sqft	=	$ttvalue/12;
		} else {
			$ttvalue = 0;
			for($j=1; $j<=4; $j++) {
				$check_value = in_array($j, $edges_data);
				if($check_value) {
					if($j==1 || $j==4) {
						$ttvalue	=	$ttvalue+$width;
					} else {
						$ttvalue	=	$ttvalue+$height;
					}
				}
			}
			$sqft	=	$ttvalue;
		}
	}
	$sqft = $sqft * $quantity;
	return $sqft;
}

function get_finishing_eta( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$eta = 0;
	$r = $db->query("SELECT * FROM cart_alpha WHERE order_id='{$order_id}'");
	while($d = $db->fetch_assoc($r)) {
		
		$edges_data = unserialize($d['edges']);
		$size_type = $d['select_'];
		$width = $d['widthfeet'];
		$height = $d['heightfeet'];
		$quantity = $d['quantity'];
		
		if(!empty($d['options_selected'])) {			
			$options_selected = explode(',', $d['options_selected']);
			foreach($options_selected as $option_id) {
				$opt_d = get_opt_by_id( $option_id );
				$sqft = get_opt_sqft( $opt_d, $width, $height, $size_type, $edges_data[$option_id]['edges'], $quantity );
				$machine_d = get_machine_by_id( $opt_d['finishing_profile_id2'] );
				$fph = $machine_d['mode_data']['fph'];
				$h = $sqft/$fph;
				$eta += $h;
			}
		}
	}
	
	$eta = floor($eta*60);
	$h = floor($eta/60);
	$m = floor($eta%60);
	$txt = str_pad($h, 2, '0', STR_PAD_LEFT) . ':' . str_pad($m, 2, '0', STR_PAD_LEFT);
	return $txt;
}

function get_printing_eta( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$eta = 0;
	$r = $db->query("SELECT * FROM cart_alpha WHERE order_id='{$order_id}'");
	while($d = $db->fetch_assoc($r)) {
		
		$size_type = $d['select_'];
		$width = $d['widthfeet'];
		$height = $d['heightfeet'];
		$quantity = $d['quantity'];
		
		$sqft = $width * $height;
		if ($size_type == 'inches') {
			$sqft = $sqft / 144;
		}
		$sqft = $sqft * $quantity;
		
		$product = get_pro_by_id( $d['sub_cat'] );
		foreach($product['mode_data'] as $mode_data) {
			$fph = $mode_data['fph'];
			$h = $sqft/$fph;
			$eta += $h;
		}
	}
	
	$eta = floor($eta*60);
	$h = floor($eta/60);
	$m = floor($eta%60);
	$txt = str_pad($h, 2, '0', STR_PAD_LEFT) . ':' . str_pad($m, 2, '0', STR_PAD_LEFT);
	return $txt;
}

function get_install_types() {
	global $db;
	$r = $db->query("SELECT * FROM option_group WHERE name='Installation' LIMIT 1");
	$d = $db->fetch_assoc($r);
	$r2 = $db->query("SELECT options.* FROM options LEFT JOIN options_group_conn ON options.id=options_group_conn.option_id WHERE options_group_conn.group_id='{$d['id']}'");
	$output = array();
	while($d2 = $db->fetch_assoc($r2)) {
		$d2['option_name'] = get_opt_name($d2['id'], 'production_name');
		$output[] = $d2;
	}
	return $output;
}

function get_order_install_hours( $order_id ) {
	global $db;
	$hours = 0;
	$r = $db->query("SELECT * FROM install_timeclock WHERE order_id='{$order_id}'");
	while($d = $db->fetch_assoc($r)) {
		if($d['status']=='0'){
			$seconds	=	strtotime($d['time_out']) - strtotime($d['time_in']);
		}else{
			$seconds	=	strtotime(date("Y-m-d H:i:s")) - strtotime($d['time_in']);
		}
		$hours += $seconds/3600;
	}
	return $hours;
}

function num_to_alpha( $data ){
    $alphabet =   range('a', 'z');
    
	if($data <= 25){
	  return $alphabet[$data];
	}
	elseif($data > 25){
	  $dividend = ($data + 1);
	  $alpha = '';
	  $modulo;
	  while ($dividend > 0){
		$modulo = ($dividend - 1) % 26;
		$alpha = $alphabet[$modulo] . $alpha;
		$dividend = floor((($dividend - $modulo) / 26));
	  } 
	  return $alpha;
	}
}

function get_part_name_by_order_id( $order_id ) {
	global $db;
	$r = $db->query("SELECT * FROM order_parts WHERE part_id='{$order_id}'");
	$num = $db->num_rows($r);
	if($num) {
		$d = $db->fetch_assoc($r);
		$order_id = $d['order_id'];
	}
	$r = $db->query("SELECT * FROM order_parts WHERE order_id='{$order_id}'");
	$num = $db->num_rows($r);
	/* $part_name = '#' . $order_id . ' - ' . num_to_alpha( $num ); */
	$part_name = ' - ' . num_to_alpha( $num );
	return $part_name;
}

function set_part_name_by_order_id( $order_id, $part_id ) {
	global $db;
	$r = $db->query("SELECT * FROM order_parts WHERE part_id='{$order_id}'");
	$num = $db->num_rows($r);
	if($num) {
		$d = $db->fetch_assoc($r);
		$order_id = $d['order_id'];
	}
	$r = $db->query("SELECT * FROM order_parts WHERE order_id='{$order_id}'");
	$num = $db->num_rows($r) + 1;
	
	$alpha = num_to_alpha( $num );
	$part_name = '#' . $order_id . ' - ' . $alpha;
	$sql = "INSERT INTO order_parts SET order_id='{$order_id}', part_id='{$part_id}', part_letter='{$alpha}', part_name='{$part_name}'";
	
	$r = $db->query("SELECT * FROM order_parts WHERE part_id='{$order_id}'");
	if($db->num_rows($r) == 0) {
		$db->query($sql);
		$db->query("UPDATE ag_order SET part_name='{$part_name}' WHERE id='{$part_id}'");
		$db->query("UPDATE ag_order SET part_name='#{$order_id} - a' WHERE id='{$order_id}'");
	}
	
	return true;
}

function get_part_name_by_id( $part_id, $row=false ) {
	global $db;
	$r = $db->query("SELECT * FROM order_parts WHERE part_id='{$part_id}'");
	$num = $db->num_rows($r);
	if($num) {
		$d = $db->fetch_assoc($r);
		return $row ? $d : $d['part_name'];
	} else {
		$r = $db->query("SELECT * FROM order_parts WHERE order_id='{$part_id}'");
		return $db->num_rows($r) > 0 ? '#' . $part_id . ' - a' : '#' . $part_id;
	}
}

function get_all_order_parts( $order_id ) {
	global $db;
	$order_id_org = $order_id;
	$r = $db->query("SELECT * FROM order_parts WHERE part_id='{$order_id}' LIMIT 1");
	$num = $db->num_rows($r);
	if($num) {
		$d = $db->fetch_assoc($r);
		$order_id = $d['order_id'];
	}
	
	$cont = false;
	$r = $db->query("SELECT * FROM order_parts WHERE order_id='{$order_id}'");
	$output = array();
	while($d = $db->fetch_assoc($r)) {
		/* if($d['part_id'] == $order_id_org) {
			$cont = true;
			continue;
		} */
		
		$r2 = $db->query("SELECT * FROM ag_order WHERE id='{$d['part_id']}' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		$d['order_type'] = $d2['status'] == 'Estimate' ? 'Estimate' : 'ORDER';
		$d['order_name'] = $d2['order_name'];
		$d['date_taken'] = strftime('%B %d, %Y - %I:%M %p',strtotime($d2['order_date']));
		$d['approval_date'] = $d2['approval_date'] != '0000-00-00 00:00:00' ? strftime('%B %d, %Y - %I:%M %p',strtotime($d2['approval_date'])) : 'Awaiting Approval';
		$d['due_date'] = get_due_date_str($d2);
		
		$output[] = $d;
	}
	
	/* if($cont) { */
		$r2 = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1");
		$d2 = $db->fetch_assoc($r2);
		$d = array();
		$d['prepend'] = true;
		$d['order_type'] = $d2['status'] == 'Estimate' ? 'Estimate' : 'INVOICE';
		$d['part_id'] = $order_id;
		$d['part_name'] = '#' . $order_id;
		$d['order_name'] = $d2['order_name'];
		$d['date_taken'] = strftime('%B %d, %Y - %I:%M %p',strtotime($d2['order_date']));
		$d['approval_date'] = $d2['approval_date'] != '0000-00-00 00:00:00' ? strftime('%B %d, %Y - %I:%M %p',strtotime($d2['approval_date'])) : 'Awaiting Approval';
		$d['due_date'] = get_due_date_str($d2);
		$output[] = $d;
	/* } */
	return $output;
}

function get_part_group( $order_id ) {
	global $db;
	
	$r = $db->query("SELECT * FROM order_parts INNER JOIN ag_order ON ag_order.id = order_parts.part_id WHERE order_parts.part_id='{$order_id}' AND ag_order.status NOT IN ('NOT AWARDED')  LIMIT 1");
	$num = $db->num_rows($r);
	if($num) {
		$d = $db->fetch_assoc($r);
		$order_id = $d['order_id'];
	}
	
	$output = array();
	$output[] = $order_id;
	
	$r = $db->query("SELECT * FROM order_parts INNER JOIN ag_order ON ag_order.id = order_parts.part_id WHERE order_parts.order_id='{$order_id}' AND ag_order.status NOT IN ('NOT AWARDED') ORDER BY part_letter");
	while($d = $db->fetch_assoc($r)) {
		$output[] = $d['part_id'];
	}
	return $output;
}

function get_part_parent_id( $order_id ) {
	global $db;
	
	$r = $db->query("SELECT * FROM order_parts WHERE part_id='{$order_id}' LIMIT 1");
	$num = $db->num_rows($r);
	if($num) {
		$d = $db->fetch_assoc($r);
		$order_id = $d['order_id'];
	}
	return $order_id;
}

function get_store_name( $store_id ) {
	global $db;
	$store_name = 'Design To Print';
	if( !empty($store_id) ) {
		$storel = $db->fetch_assoc($db->query("SELECT * FROM `stores` where id = '". $db->clean($store_id) ."' LIMIT 1"));
		$store_name = $storel['store_name'];
	}
	return $store_name;
}

function get_country_list() {
	global $db;
	$r = $db->query("SELECT * FROM country");
	$output = array();
	while($d = $db->fetch_assoc($r)) {
		$output[] = $d;
	}
	return $output;
}

function get_order_base_price_2( $order_id, $d ) {
	global $db;
	$base_price = $rush_fee = 0;
	$r2 = $db->query("SELECT * FROM cart_alpha WHERE order_id='{$order_id}'");
	while($d2 = $db->fetch_assoc($r2)) {
		$r = get_job_cost_price_report( $d2['id'], $d2 );
		$base_price += $r['base_price'];
		$rush_fee += $d2['rush_fee'];
		$db->query("UPDATE cart_alpha SET base_price='{$r['base_price']}', base_price_print='{$r['base_price_pp']}' WHERE id='{$d2['id']}' LIMIT 1");
	}
	
	$rush_fee_final = empty($d['rush_fee']) ? $rush_fee : $d['rush_fee'];
	$base_price_final = nf2m($base_price + $rush_fee_final);
	$db->query("UPDATE ag_order SET base_price='{$base_price_final}' WHERE id='{$d['id']}' LIMIT 1");
	return $base_price_final;
}

function get_order_base_price($order_id, $calc=false) {
	global $db;
	$r1 = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1");
	$d = $db->fetch_assoc($r1);
	$r2 = $db->query("SELECT * FROM uploads WHERE order_id='{$order_id}'");
	$num = $db->num_rows($r2);
	
	if(($d['base_price'] <= 0) && $d['order_type2'] == 'web' && $calc) {
		$r = get_order_base_price_2( $order_id, $d );
		$d['base_price'] = $r;
	}
	/* $base_price = $d['base_price'] + ($num*5);
	return number_format($base_price, 2, '.', ''); */
	
	/* $commission = get_agent_commission2($order_id, $d);	 */
	$commission = 0;	
	$total_file_cost = nf2m($num * 5);
	$total_install_cost =  get_install_order_cost2( $order_id );
	$real_ship_cost = get_shipping_cost($order_id);
	$base_price = nf2m($d['base_price'] + $total_file_cost + $real_ship_cost + $total_install_cost + $commission + $d['total_box_fee']);
	return $base_price;
}

function set_config( $config ) {
	error_log("In 'set_config()'");error_log(print_r($config, TRUE));
	
	global $db;
	
	foreach($config as $prefix=>$cfg) {
		error_log("In 'foreach($config as $prefix=>$cfg)'");error_log(print_r($cfg, TRUE));
		
		if ($prefix == 'tax') {
			$state_active = '0';
			
			if (isset($cfg['active'])) {
				$state_active = '1';
				unset($cfg['active']);
			}
			
		}
		
		error_log("Out 'foreach($config as $prefix=>$cfg)'");error_log(print_r($cfg, TRUE));
		
		if(isset($cfg['checkbox'])) {
			foreach($cfg['checkbox'] as $checkbox) {
				$cfg[$checkbox] = isset($cfg[$checkbox]) ? '1' : '0';
			}
			unset($cfg['checkbox']);
		}
		
		foreach($cfg as $cfg_n=>$cfg_v) {
			$name = $db->clean($cfg_n);
			$value = $db->clean($cfg_v);
			
			$state_active_query = '';
			if ($prefix == 'tax' && isset($state_active)) {
				if ($state_active == '1') {
					$state_active_query = ", `active` = '1' ";
				}
				else {
					$state_active_query = ", `active` = '0' ";
				}
			}
			
			$r = $db->query("SELECT * FROM config WHERE `prefix`='{$prefix}' AND  `name`='{$name}' AND tag_site='{$_SESSION['child_site']}' LIMIT 1");
			if($db->num_rows($r)) {
				$r = $db->query("UPDATE config SET `value`='{$value}'".$state_active_query." WHERE `prefix`='{$prefix}' AND  `name`='{$name}' AND tag_site='{$_SESSION['child_site']}' LIMIT 1");
			} else {
				$r = $db->query("INSERT INTO config SET `prefix`='{$prefix}',  `name`='{$name}',  `value`='{$value}', tag_site='{$_SESSION['child_site']}'");
			}
		}
	}
	return true;
}

function get_config( $prefix = '', $html = false ) {
	global $db;
	$sql = "SELECT * FROM config WHERE 1 AND tag_site='{$_SESSION['child_site']}'";
	if( !empty($prefix) ) {
		$prefix = $db->clean($prefix);
		$sql .= " AND prefix='{$prefix}' ";
	}
	$output = array();
	$r = $db->query($sql);
	while($d = $db->fetch_assoc($r)) {
		$output[$d['prefix']][$d['name']] = $d['value'];
		if ($d['prefix'] == 'tax') {
			$output[$d['prefix']]['active'][$d['name']] = $d['active'];
		}
		if($html) {		
			$output[$d['prefix']]['html'][$d['name']] = htmlspecialchars($d['value'], ENT_QUOTES);
		}
	}
	return $output;
}

function get_production_multi($production) {
	global $Config;
	$production_hr = $production*24;
	$production_pr = $Config['order']['pr_'.$production_hr.'_hrs'];
	$production_multi = (100+$production_pr)/100;
	return $production_multi;
}

function get_delivery_methods() {
	global $db, $Company_Info;
	$output = array( 'html'=>'', 'data'=>array() );
	/* $bhy	=	$db->query("Select `delivery_methods` from company_info");
	if($db->num_rows($bhy)>0){
		$rt	=	$db->fetch_assoc($bhy); */
		$explo	=	explode(',', $Company_Info['delivery_methods']);
		for($ip=0; $ip<count($explo); $ip++) {
			if($explo[$ip] == 'require_cc') { continue; }
			$dm_name = ucwords(str_replace('_',' ',$explo[$ip]));
			if($explo[$ip] == 'local_pickup') {
				$dm_name = 'Will Call';
			}
			$output['html'] .= '<option value="'.$explo[$ip].'">'.$dm_name.'</option>';
			$output['data'][$explo[$ip]] = $dm_name;
		}
	/* } */
	return $output;
}

function get_install_order_cost( $order_id ) {
	global $db;
	
	$r = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	$ic = new invoiceCalc( $order_id );
	$hours_logged = get_order_install_hours( $order_id );
	
	$install_type = $d['install_type'];
	
	$install_type_cost = get_option_cog(0, $install_type);
	$install_cost = number_format( $hours_logged*$install_type_cost, 2, '.', '' );
	
	$t_install_cost = number_format( $install_cost+$ic->handling_fee, 2, '.', '' );
	$total_cost = number_format($ic->base_price+$t_install_cost, 2, '.', '');
	
	$output = array(
		'production_cost'=>usa_number_format($ic->base_price),
		'install_cost'=>usa_number_format($t_install_cost),
		'total_cost'=>usa_number_format($total_cost),
		'sell_price'=>usa_number_format($ic->total),
	);
	return $output;
}

function get_install_order_cost2( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$install_cost = 0;
	
	$ress	=	$db->query("SELECT * FROM `install_timeclock` WHERE order_id='{$order_id}'");
	if($db->num_rows($ress) > 0) {
		while($dd=$db->fetch_assoc($ress)){
			if($dd['status']=='0'){
				$seconds	=	strtotime($dd['time_out']) - strtotime($dd['time_in']);
			}else{
				$seconds	=	strtotime(date("Y-m-d H:i:s")) - strtotime($dd['time_in']);
			}
			$days    = floor($seconds / 86400);
			$hours   = floor(($seconds - ($days * 86400)) / 3600);
			$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
			$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
			
			$total_day_hours	=	$days*24*$dd['emp_rate'];
			$hours_sent_charge		=	$hours*$dd['emp_rate'];
			$min_charge	=	$dd['emp_rate']/60*$minutes;
			
			$total_charge	=	$total_day_hours + $hours_sent_charge + $min_charge;
			$install_cost += $total_charge;
		}
	}
	return $install_cost;
}

function check_emp_by_code( $emp_code ) {
	global $db;
	$emp_code = $db->clean($emp_code);
	$output = array();
	$output['date'] = strftime("%m/%d/%Y %I:%M %p");
	$codelength = strlen($emp_code);
	if ($emp_code != '') {
		if($codelength <= 5){
			$select = "SELECT * FROM  `employees` where `emp_code`='" . $emp_code . "' AND emp_status='1'";
			$query = $db->query($select) or die($db->error());
			$rows = $db->num_rows($query);
			if ($rows > 0) {
				$fetch = $db->fetch_assoc($query);
				$output['r'] = $fetch['emp_fname'] . ' ' . $fetch['emp_lname'];
				$output['emp_id'] = $fetch['emp_id'];
				$output['f_name'] = $fetch['emp_fname'];
				$output['l_name'] = $fetch['emp_lname'];
				$output['emp_email'] = $fetch['emp_email'];
			} else {
				$output['r'] = '0';
			}
		}else{
			$output['r'] = '0';
		}
    } else {
        $output['r'] = '0';
    }
	return $output;
}

function add_order_history($order_id, $value,$emp_id=null) {
	global $db;
	$order_id = $db->clean($order_id);
	$order_history = $db->clean($value);
	$db->query("INSERT into log_collector SET `user_id`='{$_SESSION['id']}', ip_address='{$_SERVER['REMOTE_ADDR']}',emp_id='{$emp_id}', action='order_history', action_value='{$order_history}', order_id='{$order_id}', date_change='".date('Y-m-d H:i:s')."'");
	return true;
}

function get_image_res_data( $cart_id, $upload_id ) {
	global $db;
	$cart_id = $db->clean($cart_id);
	$upload_id = $db->clean($upload_id);
	$output = array();
	$r = $db->query("SELECT * FROM upload_refs WHERE cart_id='{$cart_id}' AND upload_id='{$upload_id}'");
	while($d = $db->fetch_assoc($r)) {
		if($d['copy_num'] == '0') { continue; }
		$output[] = array( 'copy_num'=>$d['copy_num'], 'file_type'=>ucwords(str_replace('_', ' ', $d['file_type'])) );
	}
	return $output;
}

function get_holidays() {
	global $db;
	$day = strftime("%Y-%m-%d 00:00:00");
	$r = $db->query("SELECT * FROM holiday_calendar WHERE day >= '{$day}'");
	$output = array();
	while($d = $db->fetch_assoc($r)) {
		$output[] = strftime("%Y-%m-%d", strtotime($d['day']));
	}
	return $output;
}

function get_logged_in_user_type() {
	global $db;
	static $type = '';
	if(empty($type)) {
		$id = $db->clean($_SESSION['adminlvl']);
		$r = $db->query("SELECT * FROM `settings` WHERE id='{$id}' LIMIT 1");
		$d = $db->fetch_assoc($r);
		if(!in_array($d['name'], array('Managers', 'Administration'))) {
			$r2 = $db->query("SELECT * FROM employees WHERE emp_email='".$db->clean($_SESSION['email'])."' LIMIT 1");
			$d2 = $db->fetch_assoc($r2);
			if($d2['department_head'] == 1) {
				$d['name'] = 'Managers';
			}
		}
		
		$type = $d['name'];
	}
	return $type;
}

function get_shipping_cost( $order_id ) {
	global $db, $Config;
	$order_id = $db->clean($order_id);
	$r = $db->query("SELECT * FROM ag_order WHERE id='{$order_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	
	$shipping_cost = 0;
	if($d['delivery_method'] == 'dtp_delivery') {
		return $Config['order']['van_delivery_fee'];
	}
	if(!in_array($d['delivery_method'], array('', 'shipped'))) {
		return $shipping_cost;
	}
	if($d['ship'] == 'autoups') {
		$select_shipping = $db->query("select * from `shipping_login` where tag_site='{$_SESSION['child_site']}' AND `method`='ups'") or die($db->error());
		$fetch_shipping = $db->fetch_assoc($select_shipping);
		if($d['shipping_method'] == 'FEDEX_3_DAY_FREIGHT') { /* Need to change condition in future */
			$shipping_cost = 300;
		} else {
			$shipping_cost = $d['grandshipping']/(100+$fetch_shipping['mark'])*100;
		}
		
	} else {
		$select_shipping = $db->query("select * from `shipping_login` where tag_site='{$_SESSION['child_site']}' AND `method`='fedex'") or die($db->error());
		$fetch_shipping = $db->fetch_assoc($select_shipping);
		if($d['shipping_method'] == 'FEDEX_3_DAY_FREIGHT') {
			$shipping_cost = 300;
		} else {
			$shipping_cost = $d['grandshipping']/(100+$fetch_shipping['mark'])*100;
		}
	}
	return nf2m($shipping_cost);
}

function hex2str2( $hex ) { return pack('H*', $hex); }
function str2hex2( $str ) { $str = unpack('H*', $str); return array_shift( $str ); }

function get_cc_noc( $user_id, $cc_num, $exp_year, $name ) {
	global $db;
	$user_id = $db->clean($user_id);
	$exp_year = $db->clean($exp_year);
	$cc_num4 = substr($cc_num, -4);
	$cc_num4 = $db->clean($cc_num4);
	$r = $db->query("SELECT * FROM accounts_cc WHERE usrid='{$user_id}' AND creditcard4 LIKE '%{$cc_num4}' AND expyear LIKE '%{$exp_year}' AND nameoncard!='' LIMIT 1");
	$r2 = $db->query("SELECT * FROM accounts_billing WHERE user_id='{$user_id}' AND cc_num4 LIKE '%{$cc_num4}' AND cc_year LIKE '%{$exp_year}' AND cc_noc!='' LIMIT 1");
	if($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		return $d['nameoncard'];
	} elseif($db->num_rows($r2)) {
		$d = $db->fetch_assoc($r2);
		return $d['cc_noc'];
	} else {
		return $name;
	}
}

function get_user_credit_balance( $user_id ) {
	global $db;
	
	$user_id = $db->clean($user_id);
	
	$balc_qu = $db->query("select SUM(`credit_balance`) as `cban` from `credit_balance` where `user_id` IN ({$user_id}) AND `remiander`='on_account'");		
	$fgc = $db->fetch_assoc($balc_qu);		
	$credit_balance = $fgc['cban'];
	
	return nf2m($credit_balance);
}

function get_user_balance_func( $user_id ) {
	global $db;
	
	$user_id = $db->clean($user_id);
	
	$par_qu = $db->query("SELECT parent_id FROM `accounts_ag` where id='{$user_id}'");
	$pgc = $db->fetch_assoc($par_qu);
	$pid = $pgc['parent_id'];
	
	if ($pid == '0') {
		$balc_qu = $db->query("SELECT SUM(`balance`) AS ban FROM `ag_order` WHERE `user_id` IN (SELECT id FROM `accounts_ag` where id='{$user_id}' OR parent_id = '{$user_id}') AND `status` NOT IN ( 'Estimate', 'estimate', 'PRE-PRESS', 'AWAITING-APPROVAL', 'NOT AWARDED' ) AND `is_delete`= '0' AND balance>0");
		
		$acc_edit_query = $db->query("SELECT `ag_order`.`id`, SUM(`account_edits`.`new_amt`) AS `new_sum` FROM `account_edits` JOIN `ag_order` ON `account_edits`.`invoice_id` = `ag_order`.`id` WHERE `ag_order`.`user_id` IN (SELECT id FROM `accounts_ag` where id='{$user_id}' OR parent_id = '{$user_id}') AND `ag_order`.`status` NOT IN ( 'Estimate', 'estimate', 'PRE-PRESS', 'AWAITING-APPROVAL', 'NOT AWARDED' ) AND `ag_order`.`is_delete`= '0' AND `account_edits`.`refund_id` = 0 AND `account_edits`.`type` != 'refund' GROUP BY `ag_order`.`id`") or die($db->error());
	}
	else {
		$balc_qu = $db->query("SELECT SUM(`balance`) AS ban FROM `ag_order` WHERE `user_id` IN (SELECT id FROM `accounts_ag` where id='{$pid}' OR parent_id = '{$pid}') AND `status` NOT IN ( 'Estimate', 'estimate', 'PRE-PRESS', 'AWAITING-APPROVAL', 'NOT AWARDED' ) AND `is_delete`= '0' AND balance>0");
		
		$acc_edit_query = $db->query("SELECT `ag_order`.`id`, SUM(`account_edits`.`new_amt`) AS `new_sum` FROM `account_edits` JOIN `ag_order` ON `account_edits`.`invoice_id` = `ag_order`.`id` WHERE `ag_order`.`user_id` IN (SELECT id FROM `accounts_ag` where id='{$pid}' OR parent_id = '{$pid}') AND `ag_order`.`status` NOT IN ( 'Estimate', 'estimate', 'PRE-PRESS', 'AWAITING-APPROVAL', 'NOT AWARDED' ) AND `ag_order`.`is_delete`= '0' AND `account_edits`.`refund_id` = 0 AND `account_edits`.`type` != 'refund' GROUP BY `ag_order`.`id`") or die($db->error());
	}
	
	/* $balc_qu = $db->query("SELECT SUM(`balance`) AS ban FROM `ag_order` WHERE `user_id`='{$user_id}' AND `status` NOT IN ( 'Estimate', 'estimate', 'PRE-PRESS', 'AWAITING-APPROVAL' ) AND `is_delete`= '0' AND balance>0"); */
	
	/* $fgc = $db->fetch_assoc($balc_qu);
	return nf2m($fgc['ban']); */
	
	$balance = 0.00;
	
	$fgc = $db->fetch_assoc($balc_qu);
	$balance = (float) $balance + (float) $fgc['ban'];
	
	if ($db->num_rows($acc_edit_query) > 0) {
		while ($acc_edit_details = $db->fetch_assoc($acc_edit_query)) {
		
			if (!empty($acc_edit_details['new_sum'])) {
				
				$check_payment_query = $db->query("SELECT `id` FROM `payment_collector` WHERE `order_id` = '{$acc_edit_details['id']}' AND (`payment` > 0 OR `order_payment` > 0)") or die($db->error());
			
				$num_of_payments = $db->num_rows($check_payment_query);
				
				if ($num_of_payments == 0) {
					$ae_balance = !empty($acc_edit_details['new_sum']) ? number_format((float)$acc_edit_details['new_sum'], 2, '.', '') : 0.00;
					$balance = (float) $balance + (float) $ae_balance;
				}
			}
		}
	}
	
	return nf2m($balance);
}

function get_all_parent_child_ids( $user_id ) {
	global $db;
	$user_id = $db->clean($user_id);
	$ids = array();
	$r = $db->query("SELECT parent_id FROM accounts_ag WHERE id='{$user_id}' LIMIT 1");
	$d = $db->fetch_assoc($r);
	if(empty($d['parent_id'])) {
		$ids[] = $user_id;
		$r2 = $db->query("SELECT id FROM accounts_ag WHERE parent_id='{$user_id}'");
		while($d2 = $db->fetch_assoc($r2)) {
			$ids[] = $d2['id'];
		}
	} else {
		$ids[] = $d['parent_id'];
		$r2 = $db->query("SELECT id FROM accounts_ag WHERE parent_id='{$d['parent_id']}'");
		while($d2 = $db->fetch_assoc($r2)) {
			$ids[] = $d2['id'];
		}
	}
	return $ids;
}

function get_user_unpaid_invoice_ids_func( $user_id ) {
	global $db;
	$user_id = $db->clean($user_id);
	$ids = get_all_parent_child_ids( $user_id );
	$balc_qu = $db->query("SELECT id, balance FROM `ag_order` WHERE `user_id` IN (". implode(', ', $ids) .") AND `status` NOT IN ( 'Estimate', 'estimate', 'PRE-PRESS', 'AWAITING-APPROVAL', 'NOT AWARDED') AND `is_delete`= '0' AND balance>0");
	$output = array();
	while($d = $db->fetch_assoc($balc_qu)) {
		/* $output[] = $d['id']; */
		$acc_edit_query = $db->query("SELECT SUM(`new_amt`) AS `ae_balance` FROM `account_edits` WHERE `invoice_id` = '{$d['id']}' AND `refund_id` = 0 AND `type` != 'refund'");
		
		$acc_edit_result = $db->fetch_assoc($acc_edit_query);
		
		$ae_total = $acc_edit_result['ae_balance'] ? number_format((float) $acc_edit_result['ae_balance'], 2, '.', '') : 0.00;
		
		if (((float) $d['balance'] + (float) $ae_total) > 0) {
			$output[] = $d['id'];
		}
	}
	return $output;
}

function unfreeze_account( $user_id ) {
	global $db;
	$user_id = $db->clean($user_id);
	$r = $db->query("SELECT * FROM accounts_ag WHERE id='{$user_id}' LIMIT 1");
	$user = $db->fetch_assoc($r);
	if($user['acc_status'] == 'account freezes') {
		$date_post = strftime("%Y-%m-%d %H:%M:%S", strtotime('-60 days'));
		$r2 = $db->query("SELECT * FROM ag_order WHERE user_id='{$user_id}' AND (status='COMPLETE' || status='SHIPPED') AND is_delete=0 AND balance > 0 AND balance!='' AND post_date<='{$date_post}'");
		$user_balance = invoiceCalc::get_user_balance($user_id);
		$credit_limit = str_replace(',', '', $user['ar_limit']);
		if($db->num_rows($r2) == 0 && $user_balance < $credit_limit) {
			$db->query("UPDATE accounts_ag SET acc_status='delinquent' WHERE id='{$user_id}' LIMIT 1");
		}
	}
}

function set_session_child_site() {
	global $db;
	if(!isset($_SESSION['child_site']) || empty($_SESSION['child_site'])) {
		$child_site_r = $db->query("SELECT * FROM child_sites  WHERE is_delete = '0' ORDER BY `default_site` DESC LIMIT 1");
		if($db->num_rows($child_site_r)) {
			$child_site = $db->fetch_assoc($child_site_r);
			$_SESSION['child_site'] = $child_site['code'];
		} else {
			$_SESSION['child_site'] = 'DTP';
		}
	}
}

function auto_approve_order( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$time = strftime("%Y-%m-%d %H:%M:%S");
	
	$db->query("Update cart_alpha Set status='Approved' where order_id='{$order_id}'");
	$db->query("Update ag_order Set status='APPROVED', approval_date='{$time}' where id='{$order_id}' LIMIT 1");
	
	set_in_hand_date2( $order_id, $time );
	/* move_aw_to_hot_folder( $order_id ); */
	
	return true;
}

function get_order_history($order_id, $keyword='', $imp='<br>') {
	global $db;
	
	if(empty($keyword)) {
		$keyword = $order_id;
	}
	
	$order_id = $db->clean($order_id);
	$keyword = $db->clean($keyword);
	$res = array();
	
	$r = $db->query("SELECT * FROM log_collector WHERE order_id='{$order_id}' AND action='order_history' AND action_value LIKE '%{$keyword}%' ORDER BY id ASC");
	while($d = $db->fetch_assoc($r)) {
		$res[] = preg_replace("/(.*)Reason\:/", '', $d['action_value']);
	}
	
	return implode($imp, $res);
}

function get_je_from_order_id($oid) {
	global $db;
	
	$journal_entries = array();
	
	$je_query = $db->query("SELECT `journal_entry_ids`.*, `journal_entries`.* FROM `journal_entry_ids` JOIN `journal_entries` ON `journal_entry_ids`.`id` = `journal_entries`.`jid` WHERE `journal_entries`.`invoice` = '{$oid}'") or die($db->error());
	
	if ($db->num_rows($je_query) > 0) {
		while ($row = $db->fetch_assoc($je_query)) {
			array_push($journal_entries, $row);
		}
	}
	
	return $journal_entries;
}

function get_all_parts_link($oid){
	global $db,$status_array_main_order_update;
$any_a	=	'0';
		$color_part_b = null;
		$color_part_a = null;
		$get_all_parts_query = $db->query("Select * from order_parts WHERE order_id='".$oid."'");
		$num_rows_parts	=	$db->num_rows($get_all_parts_query);
		if($num_rows_parts>0){
			if($num_rows_parts==1){
				$part_data	=	$db->fetch_assoc($get_all_parts_query);
				if($part_data['part_letter']=='b'){
					$select_status_a	=	get_order_status_a($oid);
					switch($select_status_a){
						case 'PRODUCTION':
							$color_part_a	=	"blue";
						break;
						case 'FINISHING':
							$color_part_a	=	"green";
						break;	
						case 'SHIPPING':
							$color_part_a	=	"green";
						break;
						case 'READY FOR PICKUP':
							$color_part_a	=	"green";
						break;
						case 'READY FOR DELIVERY':
							$color_part_a	=	"green";
						break;
						case 'In Transit':
							$color_part_a	=	"green";
						break;
						case 'COMPLETE':
							$color_part_a	=	"green";
						break;
						case 'Picked Up':
							$color_part_a	=	"green";
						break;
						case 'SHIPPED':
							$color_part_a	=	"green";
						break;	
						case 'AWAITING-APPROVAL':
							$color_part_a	=	"Red";
						break;
						case 'Estimate':
							$color_part_a	=	"grey";
						break;	
						case 'APPROVED':
							$color_part_a	=	"grey";
						break;
						default:
							$color_part_a	=	"grey";
						break;	
					}
					
					$select_status_b	=	get_order_status_a($part_data['part_id']);
					
					switch($select_status_b){
						case 'PRODUCTION':
							$color_part_b	=	"blue";
						break;
						case 'APPROVED':
							$color_part_b	=	"grey";
						break;
						case 'FINISHING':
							$color_part_b	=	"green";
						break;	
						case 'SHIPPING':
							$color_part_b	=	"green";
						break;
						case 'READY FOR PICKUP':
							$color_part_b	=	"green";
						break;
						case 'READY FOR DELIVERY':
							$color_part_b	=	"green";
						break;
						case 'In Transit':
							$color_part_b	=	"green";
						break;
						case 'COMPLETE':
							$color_part_b	=	"green";
						break;
						case 'Picked Up':
							$color_part_b	=	"green";
						break;
						case 'SHIPPED':
							$color_part_b	=	"green";
						break;	
						case 'AWAITING-APPROVAL':
							$color_part_b	=	"Red";
						break;
						case 'Estimate':
							$color_part_b	=	"grey";
						break;	
						default:
							$color_part_b	=	"grey";
						break;	
					}
					$show_parts = '';
					if(in_array($select_status_a, $status_array_main_order_update)) {
						$order_row = get_order_row( $oid );
						if( empty($order_row['is_delete']) ) {
							$show_parts	.=	"<br/><a href='page_orders.php?viewdetails=true&site=dtp&qu=p&past=30_days&id=".$oid."' style='color:".$color_part_a."'>-a</a>,";
						}
					}
					if(in_array($select_status_b, $status_array_main_order_update)) {
						$order_row = get_order_row( $part_data['part_id'] );
						if( empty($order_row['is_delete']) ) {
							if($show_parts == '') $show_parts .= "<br/>";
							$show_parts	.=	"<a href='page_orders.php?viewdetails=true&site=dtp&qu=p&past=30_days&id=".$part_data['part_id']."' style='color:".$color_part_b."'>-b</a>";
						}
					}
				}
			}else{
				$any_a	=	'0';
				while($get_data_part = $db->fetch_assoc($get_all_parts_query)){
					if($get_data_part['part_name']=='a'){
						$any_a	=	'1';
					}
					$select_status_b	= get_order_status_a($get_data_part['part_id']);	
					switch($select_status_b){
						case 'PRODUCTION':
							$color_part_b	=	"blue";
						break;
						case 'APPROVED':
							$color_part_b	=	"grey";
						break;
						case 'FINISHING':
							$color_part_b	=	"green";
						break;	
						case 'SHIPPING':
							$color_part_b	=	"green";
						break;
						case 'READY FOR PICKUP':
							$color_part_b	=	"green";
						break;
						case 'READY FOR DELIVERY':
							$color_part_b	=	"green";
						break;
						case 'In Transit':
							$color_part_b	=	"green";
						break;
						case 'COMPLETE':
							$color_part_b	=	"green";
						break;
						case 'Picked Up':
							$color_part_b	=	"green";
						break;
						case 'SHIPPED':
							$color_part_b	=	"green";
						break;	
						case 'AWAITING-APPROVAL':
							$color_part_b	=	"Red";
						break;
						case 'Estimate':
							$color_part_b	=	"grey";
						break;	
						default:
							$color_part_b	=	"grey";
						break;	
					}
					if(in_array($select_status_b, $status_array_main_order_update)) {
						$order_row = get_order_row( $get_data_part['part_id'] );
						if( empty($order_row['is_delete']) ) {
							$show_parts	.=	"<a href='page_orders.php?viewdetails=true&site=dtp&qu=p&past=30_days&id=".$get_data_part['part_id']."' style='color:".$color_part_b."'>, $get_data_part[part_letter] </a> ";
						}
					}
					
				}
				if($any_a	!= "0"){
					$show_parts = "<br>".$show_parts;
				}else{
						$select_status_a	= get_order_status_a($oid);
					
					switch($select_status_a){
						case 'PRODUCTION':
							$color_part_a	=	"blue";
						break;
						case 'FINISHING':
							$color_part_a	=	"green";
						break;	
						case 'SHIPPING':
							$color_part_a	=	"green";
						break;
						case 'READY FOR PICKUP':
							$color_part_a	=	"green";
						break;
						case 'READY FOR DELIVERY':
							$color_part_a	=	"green";
						break;
						case 'In Transit':
							$color_part_a	=	"green";
						break;
						case 'COMPLETE':
							$color_part_a	=	"green";
						break;
						case 'Picked Up':
							$color_part_a	=	"green";
						break;
						case 'SHIPPED':
							$color_part_a	=	"green";
						break;	
						case 'AWAITING-APPROVAL':
							$color_part_a	=	"Red";
						break;
						case 'Estimate':
							$color_part_a	=	"grey";
						break;	
						case 'APPROVED':
							$color_part_a	=	"grey";
						break;
						default:
							$color_part_a	=	"grey";
						break;	
					}
					
					$order_row = get_order_row( $oid );
					if(in_array($select_status_a, $status_array_main_order_update) && empty($order_row['is_delete'])) {
						$part_a	=	"<br/><a href='page_orders.php?viewdetails=true&site=dtp&qu=p&past=30_days&id=".$oid."' style='color:".$color_part_a."'>-a</a>";
						
					} else{
						$part_a	=	"<br/>";
					}
					
					$show_parts = $part_a.$show_parts;
				}
			}
			$show_parts = rtrim($show_parts,', ');
		}else{
			$show_parts	= null;
		}
		return $show_parts;
}

function get_tax_rate_from_postalcode($postalcode = ''){
	global $db;
	
	$output = '';
	
	if ($postalcode != '') {
		$request_url = 'https://api.zip-tax.com/request/v40?key='.ZIP_TAX_API_KEY.'&postalcode='.$postalcode;
			
		$ch = curl_init();
			
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $request_url);

		$output = curl_exec($ch);
			
		curl_close($ch);
	}
	
	return $output;
}

function get_postal_code_tax_rate($postal_code = '', $notax = '') {
	error_log('Functions Postal code: '.$postal_code);
	
	global $db;
	
	$tax_rate = 0;
	
	if (empty($notax)) {
		/* $tax_rate_query = $db->query("SELECT * FROM `api_tax_rate` WHERE `postal_code` = '{$db->clean($postal_code)}'") or die($db->error());
		
		if ($db->num_rows($tax_rate_query) > 0) {
			
			$tax_rate_result = $db->fetch_assoc($tax_rate_query);
			
			$tax_rate = $tax_rate_result['tax_rate'];
		}
		else { */
			/**
			 * Send request to API if tax rate for postal code does not exist in `api_tax_rate`
			*/
			$tax_rate_response = get_tax_rate_from_postalcode($postal_code);
			
			$tax_rate_result = json_decode($tax_rate_response);
			
			if ($tax_rate_result->rCode == '100' && isset($tax_rate_result->results[0]->taxSales)) {
				$tax_rate = ((float) ($tax_rate_result->results[0]->taxSales)) * 100.00;
				
				$tax_rate = number_format((float) $tax_rate, 3, '.', '');
				
				$confirm_tax_rate_query = $db->query("SELECT * FROM `api_tax_rate` WHERE `postal_code` = '{$db->clean($postal_code)}'") or die($db->error());
				
				if ($db->num_rows($confirm_tax_rate_query) == 0) {
					$current_date = date('Y-m-d H:i:s');
					
					$db->query("INSERT INTO `api_tax_rate` SET `postal_code` = '{$db->clean($postal_code)}', `tax_rate` = '{$db->clean($tax_rate)}', `last_updated` = '{$current_date}'") or die($db->error());
				}
			}
		/* } */
	}
	
	return $tax_rate;
}

function get_send_proof_btn( $order_id ) {
	global $db;
	$order_id = $db->clean($order_id);
	$order = get_order_row($order_id);
	$confirm_send_b = false;
	if( in_array($order['status'], array('PRE-PRESS', 'Estimate', 'AWAITING-APPROVAL')) ) {
		$r1 = $db->query("SELECT * FROM cart_alpha WHERE order_id='{$order_id}' AND print_ready_art='0'");
		if( $db->num_rows( $r1 ) == 0 ) {
			
			$confirm_send_b = true;
			
		} else {
			$r4 = $db->query("SELECT uploads.* FROM uploads LEFT JOIN upload_refs ON uploads.id=upload_refs.upload_id WHERE upload_refs.tab_type='Art' AND uploads.order_id='{$order_id}' AND uploads.job_state NOT LIKE '%is_cmyk%'");
			if($db->num_rows($r4) == 0) {
				
				$confirm_send_b = true;
				
			} else {
				
				$r4 = $db->query("SELECT uploads.* FROM uploads LEFT JOIN upload_refs ON uploads.id=upload_refs.upload_id WHERE upload_refs.tab_type='Art' AND uploads.order_id='{$order_id}' AND uploads.name NOT LIKE '%.pdf'");
				if($db->num_rows($r4) == 0) {
					$confirm_send_b = true;
				}
				
			}
		}
	}
	$proof_btn = "<a type='button' title='Send Proof' class='btn btn-xs' onclick='open_proofmodal(this)' style='width: 50px; margin-right: 5px; margin-top: 5px;' data-order_id='{$order_id}'>Send</a>";
	/* $proof_btn = "<a type='button' class='btn btn-xs btn-nodrop'>Send Proof</a>";
	
	if($confirm_send_b && in_array($order['status'], array('PRE-PRESS', 'Estimate'))) {
		$proof_btn = "<a type='button' class='btn btn-xs' onclick='open_proofmodal(this)' data-order_id='{$order_id}'>Send Proof</a>";
	} elseif($confirm_send_b && in_array($order['status'], array('AWAITING-APPROVAL')) ) {
		$proof_btn = "<a type='button' class='btn btn-xs' onclick='open_proofmodal(this)' data-order_id='{$order_id}'>Resend?</a>";
	} */
	return $proof_btn;
}

function update_box_fee( $order_id ) {
	global $db;
	
	$result = $db->query("SELECT * FROM ag_order WHERE id='".$db->clean($order_id)."' LIMIT 1") or die($db->error());
	$row = $db->fetch_assoc($result);
	
	if( $row['delivery_method'] == '' || $row['delivery_method'] == 'shipped' ) {
	
		$result_u = $db->query("SELECT no_boxing_fee FROM accounts_ag WHERE id='{$row['user_id']}' LIMIT 1") or die($db->error());
		$row_u = $db->fetch_assoc($result_u);
		
		$result_bcharge = $db->query("SELECT * FROM base_charge_per_file WHERE id=1") or die($db->error());
		$row_bcharge = $db->fetch_assoc($result_bcharge);
		
		$box_r = $db->query("SELECT * FROM shipping_box WHERE order_id='{$row['id']}'");
		$num_box = $db->num_rows($box_r);
		
		$new_box_fee = number_format($num_box*$row_bcharge['boxing_fee'], 2, '.', '');
		if($row_u['no_boxing_fee'] == 1) { $new_box_fee = '0.00'; }
			
		$ic = new invoiceCalc($row['id']);
		$ic->set_value('box_fee', $new_box_fee);
		$total = number_format($ic->total, 2, '.', '');
		$new_balance = number_format($ic->balance, 2, '.', '');
		
		$sql = "UPDATE ag_order SET grandtotal='{$total}', total_box_fee='{$new_box_fee}', balance='{$new_balance}' WHERE id='".$db->clean($order_id)."' LIMIT 1";
		$db->query($sql) or die($db->error());
		
		$db->query("INSERT into log_collector SET `user_id`='".$_SESSION['id']."',ip_address='".$_SERVER['REMOTE_ADDR']."',action='order_updated',action_value='{$total}',order_id='".$db->clean($order_id)."',date_change='".date('Y-m-d H:i:s')."', more_info='Box Fee Added'");
	}
	return true;
}
function print_pdf_file_using_wkhtmltopdf($url, $pdf_name,$pdf_link){

	
	$pdf_lnk = $pdf_link. $pdf_name;
	$cmd = " wkhtmltopdf --page-size Letter --disable-smart-shrinking '{$url}' '{$pdf_lnk}' ";
	$res = exec($cmd);
	$content = file_get_contents($pdf_lnk);
	header('Content-Type: application/pdf');
    header('Content-Length: ' . strlen($content));
	header('Content-Disposition: inline; filename="'.$pdf_name.'"');
	header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');
    ini_set('zlib.output_compression','0');

    die($content);
}


function payment_auto_invoice_email($oid = 0){
	global $db;	
	/*  Auto invoice email after payment complete */
	$Cc ='';
	$payment_term = '';
	$send_paper_statement = '';
	$user_id 	= $_SESSION['id'];
	$sell = $db->query("SELECT id, ignore_email_id, bill_email, bill_email2,tag_site, status,user_id,balance,invoice_email_notify,receipt_email_notify from ag_order WHERE ag_order.id='".$oid ."'") ;
	if ($db->num_rows($sell) > 0) {
		$fett   =   $db->fetch_assoc($sell);
		/* Stef asked for this to show parent billing email. */
		$user_info  =   $db->fetch_assoc($db->query("SELECT id,bill_email2,parent_id,email,terms,send_paper_statement from accounts_ag WHERE id='".$fett['user_id']."'")) ;
		if ($user_info['parent_id'] == '0'){
			$one_email  =   ($user_info['bill_email2'] != '' ) ? $user_info['bill_email2'] : $user_info['email'] ;
			$payment_term =$user_info['terms'];
			$send_paper_statement =$user_info['send_paper_statement'];
		} 
		else {
			$Cc = ($user_info['bill_email2'] != '' ) ? $user_info['bill_email2'] : $user_info['email'] ;
			$user_info  = $db->fetch_assoc($db->query("SELECT id,bill_email2,email,terms,send_paper_statement from accounts_ag WHERE id='".$user_info['parent_id']."'")) ;
			$one_email  =   ($user_info['bill_email2'] != '' ) ? $user_info['bill_email2'] : $user_info['email'] ;
			$payment_term =$user_info['terms'];
			$send_paper_statement =$user_info['send_paper_statement'];
		}
		
		/* Stef ask for email notofication set on add order page */
		if($fett['receipt_email_notify'] != '' && $fett['invoice_email_notify'] != ''){
			if((float) $ic->balance >  0 ) { 
				$one_email = $fett['invoice_email_notify'];
				$notifications_r	=	 $db->query("SELECT not_id from order_notifications WHERE oid='".$oid."' AND type='invoice' ") ; 
			} 
			else if((float) $ic->balance <= 0){
				$one_email = $fett['receipt_email_notify'];
				$notifications_r	=	 $db->query("SELECT not_id from order_notifications WHERE oid='".$oid."' AND type='receipt' ") ; 
			}		
			
			if($db->num_rows($notifications_r)>0){
				while ( $dfdg	=	$db->fetch_assoc($notifications_r)){
					$ref	=	$db->query("SELECT email from account_notifications WHERE id='".$dfdg['not_id']."'");
					if($db->num_rows($ref)>0){
						$fetch_name	=	$db->fetch_assoc($ref);
						$Cc .= "{$fetch_name['email']}, ";
					}
				}
			}
			$Cc = rtrim($Cc, ", ");
		}
 		/* Stef ask for email notofication set on add order page */
	} 
	
	/*$one_email= 'kamal.vtaurus@gmail.com';
	$Cc = 'ashu.odesk@gmail.com';*/
	$subject_email = 'Your Design To Print Order #'.$oid;
	$keyword = '';
	if ($one_email != '' && ($send_paper_statement == '0' || $send_paper_statement == '2')) {
		include_once 'invoice_class.php';
		$ic = new invoiceCalc($oid);
	 	if((float) $ic->balance >  0 && ($payment_term == 'Net 30' || $payment_term == 'Net 60' || $payment_term == 'Net 90')) {
			$keyword = 'invoice_unpaid';
	 		$subject_email = 'Invoice attached - please pay';
	 		$_GET['keyword_type'] = base64_encode('unpaid');
		} 
		else if((float) $ic->balance <= 0){
			$keyword = 'invoice_paid';
			$_GET['keyword_type'] = base64_encode('paid');
			$subject_email = 'Invoice Receipt attached for your records';
		}
		if($keyword != '') {
			$invoice_name = "trash_box/invoices/{$keyword}_{$oid}.pdf";
			$mail_content =  get_email_html( $keyword, $oid, $data=array() ) ;
			$html_body =$mail_content['html'] ;
			$es_row_mail = $mail_content['es_row'];
			if(trim($es_row_mail['email_subject']) != ''){
				$subject_email = $es_row_mail['email_subject'];
			}

			include "email_confirm_order31.php";
			require_once("./_dompdf/dompdf_config.inc.php");
			$dompdf = new DOMPDF(); 
			$dompdf->set_option('enable_remote', TRUE);
			$dompdf->load_html($html);
			$dompdf->render();
			$pdfoutput = $dompdf->output(); 
			file_put_contents($invoice_name, $pdfoutput); 
			
			$attachment = file_get_contents($invoice_name);
			$attachment_encoded = base64_encode($attachment); 
			$attach['content'] = $attachment_encoded;
			$attach['name'] = $oid.'.pdf';
			
			
			require_once 'mandrill/Mandrill.php'; //Not required with Composer
			include_once 'mandrill_function.php';
		   /* Mail functionality */
			$send_totype = $es_row_mail['send_to'];
			$notify_sale_agent = $es_row_mail['notify_sale_agent'];
			if($notify_sale_agent == 'yes' && $es_row_mail['active'] == '1'){
				$resulto = $db->query("SELECT salesman FROM ag_order WHERE id='{$oid}'") or die($db->error());
				$orow = $db->fetch_assoc($resulto);
				if($orow['salesman'] == '') $orow['salesman'] = 'House';
				$resultsr = $db->query("SELECT email FROM sales_rep WHERE name='{$orow['salesman']}'") or die($db->error());
				if($db->num_rows($resultsr) == 0){
					$resultsr = $db->query("SELECT emp_email as email FROM employees WHERE emp_fname='{$orow['salesman']}'") or die($db->error());
				}
				$salesrep = $db->fetch_assoc($resultsr);
				$semail = $salesrep['email'];
			   // send_this_email_v2($html_body,$semail, $subject_email,NULL , NULL,$es_row_mail,$attach);
			}
			if(strpos($send_totype,'all') > -1  && $es_row_mail['active'] == '1'){
				
				/* send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach); */
				$sendmail = send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach);
				if($sendmail){
					if(!empty($one_email)){
						if(!empty($Cc)){
							$ccemail = 'CC mail:'.$Cc;
						}else{
							$ccemail = '';
						}
						$job_status = 'Payment Invoice auto email: Mail To: '.$one_email.$ccemail.' on '.date('m-d-Y H:i:s A');
					}else{
						$job_status = '';
					}
					$db->query("Insert Into `log_collector` SET `user_id` = '".$user_id."',emp_id='0',ip_address='".$_SERVER['REMOTE_ADDR']."',action='order_history',action_value='".$job_status."',order_id='".$oid."',more_info='".$job_status."',date_change='".date('Y-m-d H:i:s')."'");
				}

			}else if(strpos($send_totype,'main') > -1  && $es_row_mail['active'] == '1'){
				/* send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach); */
				$sendmail = send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach);
				if($sendmail){
					if(!empty($one_email)){
						if(!empty($Cc)){
							$ccemail = 'CC mail:'.$Cc;
						}else{
							$ccemail = '';
						}
						$job_status = 'Payment Invoice auto email: Mail To: '.$one_email.$ccemail.' on '.date('m-d-Y H:i:s A');
					}else{
						$job_status = '';
					}
					$db->query("Insert Into `log_collector` SET `user_id` = '".$user_id."',emp_id='0',ip_address='".$_SERVER['REMOTE_ADDR']."',action='order_history',action_value='".$job_status."',order_id='".$oid."',more_info='".$job_status."',date_change='".date('Y-m-d H:i:s')."'");
				}

			}else if(strpos($send_totype,'accountant') > -1  && $es_row_mail['active'] == '1'){                     
				
				$company_res = $Company_Info;
				if(!empty($company_res['accountant_email'])) {
				   // send_this_email_v2($html_body, $company_res['accountant_email'], $subject_email,$Cc , NULL,$es_row_mail,$attach);
				}
			}
			/* Mail functionality End */
		}
	}

	/*  Auto invoice email after payment complete */
}

function order_invoice_auto_email($oid = 0){
	global $db;
	$Cc ='';
	$send_paper_statement = '';
	$user_id 	= $_SESSION['id'];
	$sell = $db->query("SELECT id, ignore_email_id, bill_email, bill_email2,tag_site, status,user_id,balance,invoice_email_notify,receipt_email_notify from ag_order WHERE ag_order.id='".$oid ."'") ;
	if ($db->num_rows($sell) > 0) {
		$fett   =   $db->fetch_assoc($sell);
		/* Stef asked for this to show parent billing email. */
		$user_info  =   $db->fetch_assoc($db->query("SELECT id,bill_email2,parent_id,email,send_paper_statement from accounts_ag WHERE id='".$fett['user_id']."'")) ;
		if ($user_info['parent_id'] == '0'){
			$one_email  =   ($user_info['bill_email2'] != '' ) ? $user_info['bill_email2'] : $user_info['email'] ;
			$send_paper_statement =$user_info['send_paper_statement'];
		} 
		else {
			$Cc = ($user_info['bill_email2'] != '' ) ? $user_info['bill_email2'] : $user_info['email'] ;
			$user_info  = $db->fetch_assoc($db->query("SELECT id,bill_email2,email,send_paper_statement from accounts_ag WHERE id='".$user_info['parent_id']."'")) ;
			$one_email  =   ($user_info['bill_email2'] != '' ) ? $user_info['bill_email2'] : $user_info['email'] ;
			$send_paper_statement =$user_info['send_paper_statement'];
		}
		/* Stef ask for email notofication set on add order page */
		if($fett['receipt_email_notify'] != '' && $fett['invoice_email_notify'] != ''){
			if((float) $ic->balance >  0 ) { 
				$one_email = $fett['invoice_email_notify'];
				$notifications_r	=	 $db->query("SELECT not_id from order_notifications WHERE oid='".$oid."' AND type='invoice' ") ; 
			} 
			else if((float) $ic->balance <= 0){
				$one_email = $fett['receipt_email_notify'];
				$notifications_r	=	 $db->query("SELECT not_id from order_notifications WHERE oid='".$oid."' AND type='receipt' ") ; 
			}		
			
			if($db->num_rows($notifications_r)>0){
				while ( $dfdg	=	$db->fetch_assoc($notifications_r)){
					$ref	=	$db->query("SELECT email from account_notifications WHERE id='".$dfdg['not_id']."'");
					if($db->num_rows($ref)>0){
						$fetch_name	=	$db->fetch_assoc($ref);
						$Cc .= "{$fetch_name['email']}, ";
					}
				}
			}
			$Cc = rtrim($Cc, ", ");
		}
 		/* Stef ask for email notofication set on add order page */
	}
	
	/*$one_email= 'kamal.vtaurus@gmail.com';
	$Cc = 'ashu.odesk@gmail.com';*/
	$subject_email = 'Your Design To Print Order #'.$oid;
	
	if($one_email != '' && ($send_paper_statement == '0' || $send_paper_statement == '2')){
		include_once 'invoice_class.php';
		$ic = new invoiceCalc($oid);
	 	if((float) $ic->balance > 0 ){
	 		$keyword = 'invoice_unpaid';
	 		$subject_email = 'Invoice attached - please pay';
	 		$_GET['keyword_type'] = base64_encode('unpaid');
	 	} else{
	 		$keyword = 'invoice_paid';
	 		$_GET['keyword_type'] = base64_encode('paid');
	 		$subject_email = 'Invoice Receipt attached for your records';
	 	}
		$invoice_name = "trash_box/invoices/{$keyword}_{$oid}.pdf";
	 	$mail_content =  get_email_html( $keyword, $oid, $data=array() ) ;
		$html_body =$mail_content['html'] ;
		$es_row_mail = $mail_content['es_row'];
		if(trim($es_row_mail['email_subject']) != ''){
			$subject_email = $es_row_mail['email_subject'];
		}

		include "email_confirm_order31.php";
		require_once("./_dompdf/dompdf_config.inc.php");
		$dompdf = new DOMPDF(); 
		$dompdf->set_option('enable_remote', TRUE);
		$dompdf->load_html($html);
		$dompdf->render();
		$pdfoutput = $dompdf->output(); 
		file_put_contents($invoice_name, $pdfoutput); 
		
		$attachment = file_get_contents($invoice_name);
		$attachment_encoded = base64_encode($attachment); 
		$attach['content'] = $attachment_encoded;
		$attach['name'] = $oid.'.pdf';
		
		
		require_once 'mandrill/Mandrill.php'; //Not required with Composer
		include_once 'mandrill_function.php';
		/* Mail functionality */
		$send_totype = $es_row_mail['send_to'];
		$notify_sale_agent = $es_row_mail['notify_sale_agent'];
		if($notify_sale_agent == 'yes' && $es_row_mail['active'] == '1'){
			$resulto = $db->query("SELECT salesman FROM ag_order WHERE id='{$oid}'") or die($db->error());
			$orow = $db->fetch_assoc($resulto);
			if($orow['salesman'] == '') $orow['salesman'] = 'House';
			$resultsr = $db->query("SELECT email FROM sales_rep WHERE name='{$orow['salesman']}'") or die($db->error());
			if($db->num_rows($resultsr) == 0){
				$resultsr = $db->query("SELECT emp_email as email FROM employees WHERE emp_fname='{$orow['salesman']}'") or die($db->error());
			}
			$salesrep = $db->fetch_assoc($resultsr);
			$semail = $salesrep['email'];
			//send_this_email_v2($html_body,$semail, $subject_email,NULL , NULL,$es_row_mail,$attach);
		}
		if(strpos($send_totype,'all') > -1  && $es_row_mail['active'] == '1'){
			
			/* send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach); */
			$sendmail = send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach);
			if($sendmail){
				if(!empty($one_email)){
					if(!empty($Cc)){
						$ccemail = 'CC mail:'.$Cc;
					}else{
						$ccemail = '';
					}
					$job_status = 'Order Invoice auto email: Mail To: '.$one_email.$ccemail.' on '.date('m-d-Y H:i:s A');
				}else{
					$job_status = '';
				}
				$db->query("Insert Into `log_collector` SET `user_id` = '".$user_id."',emp_id='0',ip_address='".$_SERVER['REMOTE_ADDR']."',action='order_history',action_value='".$job_status."',order_id='".$oid."',more_info='".$job_status."',date_change='".date('Y-m-d H:i:s')."'");
			}

		}else if(strpos($send_totype,'main') > -1  && $es_row_mail['active'] == '1'){
			/* send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach); */
			$sendmail = send_this_email_v2($html_body, $one_email, $subject_email,$Cc , NULL,$es_row_mail,$attach);
			if($sendmail){
				if(!empty($one_email)){
					if(!empty($Cc)){
						$ccemail = 'CC mail:'.$Cc;
					}else{
						$ccemail = '';
					}
					$job_status = 'Order Invoice auto email: Mail To: '.$one_email.$ccemail.' on '.date('m-d-Y H:i:s A');
				}else{
					$job_status = '';
				}
				$db->query("Insert Into `log_collector` SET `user_id` = '".$user_id."',emp_id='0',ip_address='".$_SERVER['REMOTE_ADDR']."',action='order_history',action_value='".$job_status."',order_id='".$oid."',more_info='".$job_status."',date_change='".date('Y-m-d H:i:s')."'");
			}

		}else if(strpos($send_totype,'accountant') > -1  && $es_row_mail['active'] == '1'){						
			
			$company_res = $Company_Info;
			if(!empty($company_res['accountant_email'])) {
				//send_this_email_v2($html_body, $company_res['accountant_email'], $subject_email,$Cc , NULL,$es_row_mail,$attach);
			}
		}
		/* Mail functionality End */
		
	}
	
}
function get_estimate_pdf($order_id = 0) {
	global $db;
	$_GET['id'] = $order_id;		
	$_GET['get_html'] = '1';
	include 'estimate_pdf.php';
	return $html; 
}

function print_pdf_file_using_wkhtmltopdf_save($url, $pdf_name,$pdf_link){

	
	$pdf_lnk = $pdf_link. $pdf_name;
	$cmd = " wkhtmltopdf --page-size Letter --disable-smart-shrinking '{$url}' '{$pdf_lnk}' ";
	$res = exec($cmd);
	
}

function print_pdf_file_using_wkhtmltopdf_save_landscape($url, $pdf_name,$pdf_link){

	
	$pdf_lnk = $pdf_link. $pdf_name;
	$cmd = " wkhtmltopdf -O Landscape --disable-smart-shrinking '{$url}' '{$pdf_lnk}' ";
	$res = exec($cmd);
	
}


/* CRM Function Start */

function locate_url($url){
	header('Location:'.$url);
	die;
}
function add_lead_task(){
	global $db;
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
	$tab				=	 	trim($db->clean($_POST['tab']));
	$lead_id				=	 	trim($db->clean($_POST['lead_id']));
	$task_name				=	 	trim($db->clean($_POST['task_name']));
	$assigned_to			=	 	trim($db->clean($_POST['assigned_to']));
	$type					=	 	trim($db->clean($_POST['type']));
	$notes					=	 	trim($db->clean($_POST['notes']));
	$priority				=	 	trim($db->clean($_POST['priority']));
	$email_reminder			=	 	trim($db->clean($_POST['email_reminder']));
	$email_reminder_time	=	 	trim($db->clean($_POST['email_reminder_time']));
	$queue					=	 	trim($db->clean($_POST['queue']));
	$due_date				=	 	date('Y-m-d H:i:s',strtotime(trim($db->clean($_POST['due_date']))));
	if(isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != '') {
		$file_extension = explode('.',$_FILES['upload_file']['name']);
		$file_extension = strtolower(end($file_extension));
		$accepted_formate = array('exe');
		if(in_array($file_extension,$accepted_formate)) {           
			$_SESSION['error'] =  "EXE file not allowed";
			if($lead_id == '' || $lead_id == '0') $tabs = 'task'; else $tabs = 'lead'; 
			$params = "?uid={$added_by}&lead_id={$lead_id}&tab=$tabs";
			$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
			locate_url($redirect_url);
		}
	}
	$db->query("Insert into lead_task SET added_by='".$_SESSION['id']."',lead_id='".$lead_id."',task_name='".$task_name."',due_date='".$due_date."',notes='$notes',type='$type',priority='$priority',assigned_to='$assigned_to',email_reminder='$email_reminder',email_reminder_time='$email_reminder_time',queue='$queue',createdAt = '".date('Y-m-d H:i:s')."' ");
	$task_id = $db->insert_id();
	if(isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != ''){
		$image_name = 'task-'.$task_id.'-'.time().'.'.$file_extension;
		move_uploaded_file($_FILES['upload_file']['tmp_name'],  "img/tasks/{$image_name}");
		$db->query("Insert into lead_task_file SET added_by='".$_SESSION['id']."',task_id='".$task_id."',file_name='".$image_name."',createdAt = '".date('Y-m-d H:i:s')."' ");
	}
	/* $db->query("INSERT into personal_log_collector SET user_id='".$lead_id."',`log_user_id`='".$_SESSION['id']."',ip_address='".$_SERVER['REMOTE_ADDR']."',action='lead_task_added',action_value='Lead Task Added',more_info='".$task_id."',date='".date('Y-m-d H:i:s')."'"); */
	$_SESSION['success'] =  "task_added";
	$_SESSION['lead_tab'] =  "crm";
	if($tab != '') $_SESSION['lead_tab'] =  $tab;
	$_SESSION['lead_id'] =  $lead_id;
	if($lead_id == '' || $lead_id == '0') $tab = 'task'; else $tab = 'lead'; 
	$params = "?uid={$added_by}&lead_id={$lead_id}&tab=$tab";
	$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
	locate_url($redirect_url);
	
}
function edit_lead_task(){
	global $db;
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
	$tab					=	 	trim($db->clean($_POST['tab']));
	$id						=	 	trim($db->clean($_POST['id']));
	$lead_id				=	 	trim($db->clean($_POST['lead_id']));
	$task_name				=	 	trim($db->clean($_POST['task_name']));
	$assigned_to			=	 	trim($db->clean($_POST['assigned_to']));
	$type					=	 	trim($db->clean($_POST['type']));
	$notes					=	 	trim($db->clean($_POST['notes']));
	$priority				=	 	trim($db->clean($_POST['priority']));
	$email_reminder			=	 	trim($db->clean($_POST['email_reminder']));
	$email_reminder_time	=	 	trim($db->clean($_POST['email_reminder_time']));
	$queue					=	 	trim($db->clean($_POST['queue']));
	$due_date				=	 	date('Y-m-d H:i:s',strtotime(trim($db->clean($_POST['due_date']))));
	if(isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != ''){
		$file_extension = explode('.',$_FILES['upload_file']['name']);
		$file_extension = strtolower(end($file_extension));
		$accepted_formate = array('exe');
		if(in_array($file_extension,$accepted_formate)) {           
			$_SESSION['success'] =  "exe_not_allowed";
			$_SESSION['lead_tab'] = $tab;
			if($lead_id == '' || $lead_id == '0') $tabs = 'task'; else $tabs = 'lead'; 
			$params =  "?uid={$added_by}&tab=$tabs";		
			$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
			locate_url($redirect_url);
		}
	}
		$db->query("UPDATE lead_task SET task_name='".$task_name."',due_date='".$due_date."',notes='$notes',type='$type',priority='$priority',assigned_to='$assigned_to',email_reminder='$email_reminder',email_reminder_time='$email_reminder_time',queue='$queue',updatedAt = '".date('Y-m-d H:i:s')."' WHERE id='$id' ");
		if(isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != ''){
			$image_name = 'task-'.$id.'-'.time().'.'.$file_extension;
			move_uploaded_file($_FILES['upload_file']['tmp_name'],  "img/tasks/{$image_name}");
			$db->query("Insert into lead_task_file SET added_by='".$_SESSION['id']."',task_id='".$id."',file_name='".$image_name."',createdAt = '".date('Y-m-d H:i:s')."' ");
		}
		/* $db->query("INSERT into personal_log_collector SET user_id='".$lead_id."',`log_user_id`='".$_SESSION['id']."',ip_address='".$_SERVER['REMOTE_ADDR']."',action='lead_task_added',action_value='Lead Task Added',more_info='".$task_id."',date='".date('Y-m-d H:i:s')."'"); */
		$_SESSION['success'] =  "task_updated";
		$_SESSION['lead_tab'] = $tab;
		if($tab == 'crm') $_SESSION['lead_id'] =  $lead_id;
		if($lead_id == '' || $lead_id == '0') $tabs = 'task'; else $tabs = 'lead'; 
		$params =  "?uid={$added_by}&lead_id={$lead_id}&tab=$tabs";
		$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
		locate_url($redirect_url);
}
function del_lead_task(){
	global $db;
	$id				=	 	trim($db->clean($_POST['id']));
	$db->query("DELETE from lead_task WHERE id = '$id' ");
	die;
}
function del_lead_task_file(){
	global $db;
	$id				=	 	trim($db->clean($_POST['id']));
	$db->query("DELETE from lead_task_file WHERE id = '$id' ");
	die;
}
function get_lead_info()
{
    global $db;
    $id = $_POST['id'];
    $first = $db->query("Select * from lead where id='" . $id . "'");
    $data_email = $db->fetch_assoc($first);
	echo json_encode($data_email);die;
}
function get_task_info()
{
    global $db;
    $id = $_POST['id'];
    $first = $db->query("Select * from lead_task where id='" . $id . "'");
    $data_email = $db->fetch_assoc($first);
	$images = array();
	$task_images = $db->query("Select * from lead_task_file where task_id='" . $id . "'");
	if($db->num_rows($task_images) > 0){
		while($ti = $db->fetch_assoc($task_images)){
			$images[] = array('id'=>$ti['id'] ,'name'=>$ti['file_name']);
		}
	}
	if(!empty($images)){
		$data_email['images'] = $images;
	}
	$employee = $db->fetch_assoc($db->query("Select * from employees where emp_id = '".$data_email['assigned_to']."' LIMIT 1"));
	$data_email['employee_name'] =$employee['emp_fname'].' '.$employee['emp_lname'];
	$data_email['employee_email'] = $employee['emp_email'];
	$data_email['due_date'] = date('m/d/Y',strtotime($data_email['due_date']));
	$data_email['email_reminder_time'] = date('g:i A',strtotime($data_email['email_reminder_time']));
	echo json_encode($data_email);die;
}
function del_lead_user()
{
    global $db;
    $id = $_POST['id'];
    $status = ($_POST['status'] == '1') ? 'Ignore' : 'Active';
    $first = $db->query("UPDATE lead SET status = '$status' where id='" . $id . "'");
	$_SESSION['success'] =  "lead_edit";
	$_SESSION['lead_tab'] =  "crm";
	$_SESSION['lead_id'] =  $lead_id;
	die;
}

function complete_lead_task()
{
    global $db;
    $id = $_POST['id'];
    $tab = $_POST['tab'];
    $first = $db->query("UPDATE lead_task SET status = '2' where id='" . $id . "'");
	$_SESSION['success'] =  "task_updated";
	$_SESSION['lead_tab'] =  $tab;
	die;
}

function upload_csv_lead()
{
    global $db;
    include('DataSource.php');
    $error = $_FILES ["csv"]["error"];
    $tmp_name = $_FILES ["csv"]["tmp_name"];
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
    if ($error <= 0) {
        move_uploaded_file($tmp_name, "uploads/" . $_FILES['csv']['name']);
        $csv = new File_CSV_DataSource;
        $csv->load("uploads/" . $_FILES['csv']['name']);
        $fileheaders = $csv->getHeaders();
        $rows = $csv->connect();
        /* 			 echo '<pre>';print_R($rows);die; 
 */
        foreach ($rows as $data) {
            $Company = explode(' ', $db->clean($data['Franchisee']));
            $Franchisee = explode(' ', $db->clean($data['Name']));
            $fname = $Franchisee[0];
            $lname = $Franchisee[1];
            $Phone = $db->clean($data['Phone']);
            $Address = $db->clean($data['Address']);
            $City = $db->clean($data['City']);
            $State = $db->clean($data['State']);
            $Zip = $db->clean($data['Zip']);
            $Email = $data['Email'];
            $WebSite = $db->clean($data['WebSite']);
            $open_date = $db->clean($data['Open Date']);
            $type = $db->clean($data['Business Type']);
			
			$select = $db->query("Select id from lead where email='" . $Email . "'") or die($db->error());
            if ($db->num_rows($select) == 0) {
				$res = $db->query("Insert into lead Set company='" . $Company . "',email='" . $Email . "',fname='" . $fname . "',lname='" . $lname . "',website='" . $WebSite . "',work_phone='" . $Phone . "',city='" . $City . "',state='" . $State . "',open_date='" . $open_date . "',zip='" . $Zip . "',contacted_status='Not Contacted',added_by='" . $added_by . "', address1='".$Address."' , business_type='".$type."' ") or die($db->error());
			}
        }
		$_SESSION['success'] =  "lead_upload";
		$_SESSION['lead_tab'] =  "crm";		
		$params = "?uid={$added_by}&tab=lead";
		$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
		locate_url($redirect_url);
    }
	else{
		$_SESSION['success'] =  "err_lead_upload";
		$_SESSION['lead_tab'] =  "crm";		
		$params =  "?uid={$added_by}&tab=lead";
		$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
		locate_url($redirect_url);
	}
}

function create_lead()
{
    global $db;
	
	$company_name = $db->clean($_POST['company_name']);
	$fname = $db->clean($_POST['fname']);
	$lname = $db->clean($_POST['lname']);
	$Phone = $db->clean($_POST['phone_number']);
	$Address = $db->clean($_POST['home_address']);
	$business_type = $db->clean($_POST['business_type']);
	$annual_sales = $db->clean($_POST['annual_sales']);
	$City = $db->clean($_POST['city']);
	$State = $db->clean($_POST['state']);
	$Zip = $db->clean($_POST['zip_code']);
	$country = $db->clean($_POST['country']);
	$email = $db->clean($_POST['email']);
	$WebSite = $db->clean($_POST['web_address']);
	$comments = $db->clean($_POST['comments']);
	/* $last_contact = $db->clean($_POST['last_contact']);
	$next_contact = $db->clean($_POST['next_contact']);
	$next_action = $db->clean($_POST['next_action']);
	$process_cc = $db->clean($_POST['process_cc']); */
	$lead_status = $db->clean($_POST['lead_status']);
	$lead_source = $db->clean($_POST['lead_source']);
/* 	$time_added = $db->clean($_POST['time_added']);*/
	$open_date = date('m/d/Y'); 
	$lead_group = $db->clean($_POST['lead_group']);
	$home_address = $db->clean($_POST['home_address']);
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
	/* $res = $db->query("Insert into lead Set company='".$company_name."', email='" . $email . "',fname='" . $fname . "',lname='" . $lname . "',website='" . $WebSite . "',work_phone='" . $Phone . "',city='" . $City . "',state='" . $State . "',country ='" . $country  . "',open_date='" . $open_date . "',zip='" . $Zip . "',contacted_status='".$lead_status."',added_by='" . $_SESSION['id'] . "',business_type='" . $business_type . "',annual_sales='" . $annual_sales . "',last_contact='" . $last_contact . "',comments='" . $comments . "',next_contact='" . $next_contact . "',process_cc='" . $process_cc . "',lead_source='" . $lead_source . "',time_added='" . $time_added . "',lead_group='" . $lead_group . "',next_action='" . $next_action . "', address1='".$home_address."' ") or die($db->error()); */
	$res = $db->query("Insert into lead Set company='".$company_name."', email='" . $email . "',fname='" . $fname . "',lname='" . $lname . "',website='" . $WebSite . "',work_phone='" . $Phone . "',city='" . $City . "',state='" . $State . "',country ='" . $country  . "',open_date='" . $open_date . "',zip='" . $Zip . "',contacted_status='".$lead_status."',added_by='" . $added_by . "',business_type='" . $business_type . "',annual_sales='" . $annual_sales . "',comments='" . $comments . "',lead_source='" . $lead_source . "',lead_group='" . $lead_group . "', address1='".$home_address."', createdAt='".date('Y-m-d H:i:s')."' ") or die($db->error());
	/* die; */
	$_SESSION['success'] =  "lead_add";
	$_SESSION['lead_tab'] =  "crm";	
	$params = "?uid={$added_by}&tab=lead";
	$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
	locate_url($redirect_url);
	
}
function generatePassword1($length = 8)
{
    global $db;
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

function convert_client()
{
    global $db;
	$id = $db->clean($_POST['id']);
	$lead = $db->fetch_assoc($db->query("Select * from lead where id='" . $id . "'"));
	/* echo "<pre>";print_R($lead);die; */
		$Type = 'Bronze';
	$child_sites = array();
	$query = $db->query("Select * from child_sites") or die($db->error());
	if ($db->num_rows($query) > 0) {
		while ($jhaja = $db->fetch_assoc($query)) {
			$child_sites[] =  $jhaja['code'];
		}
	}
	$csites = implode(',',$child_sites);
	$password = crypt(generatePassword1());
	if ($lead['email'] != "") {
		$acc = $db->query("Select level from account_type where acc_name='" . $Type . "'") or die($db->error());
		if ($db->num_rows($acc) > 0) {
			$level_d = $db->fetch_assoc($acc);
			$level = $level_d['level'];
		} else {
			$level = 5;
		}
		$select = $db->query("Select * from accounts_ag where email='" .$lead['email'] . "'") or die($db->error());
		if ($db->num_rows($select) == 0) {
			$salesman = " salesman = 'House',";
			$selectsr = $db->query("Select name from sales_rep where user_id='" .$lead['added_by'] . "'") or die($db->error());
			if ($db->num_rows($selectsr) > 0) {
				$sr = $db->fetch_assoc($selectsr);
				$salesman = " salesman = '".$sr['name']."',";
			} else{
				$selectu = $db->query("Select * from accounts_ag where id='" .$lead['added_by'] . "'") or die($db->error());
				$user = $db->fetch_assoc($selectu);
				$db->query("INSERT INTO sales_rep SET user_id='" .$user['id'] . "', name='" .$user['fname'] . "', email='" .$user['email'] . "', phone='" .$user['cellphone'] . "', inactive='0'") or die($db->error());
				$salesman = " salesman = '".$user['fname']."',";
			}
			$res = $db->query("Insert into accounts_ag Set 
				email='" . $lead['email'] . "',
				password='" . $password . "',
				fname='" . $lead['fname'] . "',
				lname='" . $lead['lname'] . "',
				company='" . $lead['company'] . "',
				website='" . $lead['website'] . "',
				work_phone='" . $lead['work_phone'] . "',
				address1='" . $lead['address1'] . "',
				city='" . $lead['city'] . "',
				state='" . $lead['state'] . "',
				country ='" . $lead['country']  . "',
				open_date='" . $lead['open_date'] . "',
				zip='" . $lead['zip'] . "',
				uploaded_from='lead_upload',
				contacted_status='".$lead['contacted_status']."',
				level='" . $level . "',
				added_by='" . $_SESSION['id'] . "',
				business_type='" . $lead['business_type'] . "',
				annual_sales='" . $lead['annual_sales'] . "',
				comments='" . $lead['comments'] . "',
				$salesman
				lead_source='" . $lead['lead_source'] . "',
				lead_group='" . $lead['lead_group'] . "',
				child_site_access='" . $csites . "' ") or die($db->error());
			$client_id = $db->insert_id();
			$db->query("UPDATE lead SET status='Won',convert_client = '1',client_id = '$client_id' where id='" . $id . "'") or die($db->error());
			echo 'Client added successfully.';
			die;
		}else{
			$client = $db->fetch_assoc($select);
			$db->query("UPDATE lead SET status='Won',client_exist = '1',client_id = '$client[id]' where id='" . $id . "'") or die($db->error());
			echo 'Client already added';
			die;
		}
	}
	echo 'Email is empty';
}

function edit_lead()
{
    global $db;
	$id = $db->clean($_POST['lead_id']);
	$company_name = $db->clean($_POST['company_name']);
	$fname = $db->clean($_POST['fname']);
	$lname = $db->clean($_POST['lname']);
	$Phone = $db->clean($_POST['phone_number']);
	$Address = $db->clean($_POST['home_address']);
	$business_type = $db->clean($_POST['business_type']);
	$annual_sales = $db->clean($_POST['annual_sales']);
	$City = $db->clean($_POST['city']);
	$State = $db->clean($_POST['state']);
	$Zip = $db->clean($_POST['zip_code']);
	$country = $db->clean($_POST['country']);
	$email = $db->clean($_POST['email']);
	$WebSite = $db->clean($_POST['web_address']);
	$comments = $db->clean($_POST['comments']);
	$last_contact = $db->clean($_POST['last_contact']);
	$next_contact = $db->clean($_POST['next_contact']);
	$next_action = $db->clean($_POST['next_action']);
	$process_cc = $db->clean($_POST['process_cc']);
	$lead_status = $db->clean($_POST['lead_status']);
	$lead_source = $db->clean($_POST['lead_source']);
	$time_added = $db->clean($_POST['time_added']);
	$open_date = $db->clean($_POST['date_added']);
	$lead_group = $db->clean($_POST['lead_group']);
	$home_address = $db->clean($_POST['home_address']);
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
	$res = $db->query("UPDATE lead Set company='".$company_name."', email='" . $email . "',fname='" . $fname . "',lname='" . $lname . "',website='" . $WebSite . "',work_phone='" . $Phone . "',city='" . $City . "',state='" . $State . "',country ='" . $country  . "',open_date='" . $open_date . "',zip='" . $Zip . "',contacted_status='".$lead_status."',added_by='" . $_SESSION['id'] . "',business_type='" . $business_type . "',annual_sales='" . $annual_sales . "',last_contact='" . $last_contact . "',comments='" . $comments . "',next_contact='" . $next_contact . "',process_cc='" . $process_cc . "',lead_source='" . $lead_source . "',time_added='" . $time_added . "',lead_group='" . $lead_group . "',next_action='" . $next_action . "', address1='".$home_address."' WHERE id = '".$id."' ") or die($db->error());
	/* die; */
	$_SESSION['success'] =  "lead_edit";
	$_SESSION['lead_tab'] =  "crm";		
	$params =  "?uid={$added_by}&tab=lead";
	$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
	locate_url($redirect_url);
	
}


function add_lead_notes(){
	global $db;
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
	$lead_id				=	 	trim($db->clean($_POST['lead_id']));
	$heading				=	 	trim($db->clean($_POST['heading']));
	$notes					=	 	trim($db->clean($_POST['notes']));
		$db->query("Insert into lead_notes SET added_by='".$_SESSION['id']."',lead_id='".$lead_id."',heading='".$heading."',notes='$notes',createdAt = '".date('Y-m-d H:i:s')."' ");
		$notes_id = $db->insert_id();
		$db->query("INSERT into personal_log_collector SET user_id='".$lead_id."',`log_user_id`='".$_SESSION['id']."',ip_address='".$_SERVER['REMOTE_ADDR']."',action='lead_notes_added',action_value='Lead Notes Added',more_info='".$notes_id."',date='".date('Y-m-d H:i:s')."'");
	$_SESSION['success'] =  "notes_added";
	$_SESSION['lead_tab'] =  "crm";		
	$_SESSION['lead_id'] =  $lead_id;		
	$params =  "?uid={$added_by}&lead_id={$lead_id}&tab=lead";
	$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
	locate_url($redirect_url);
}

function send_email_lead()
{
	global $db;
    $id 		= $_POST['id'];
	$email 		= $_POST['email'];
	$name 		= $_POST['name'];
	$subject 	= $_POST['subject'];
	$message 	= $_POST['textone'];
	$added_by = (isset($_POST['added_by']) ? $_POST['added_by'] :$_SESSION['id']);
	$cn = array('subject'=>$subject,'name'=>$name,'email'=>$email);
	if (send_this_email($message, $email, $subject)) {
		$db->query("INSERT into personal_log_collector SET user_id='".$id."',`log_user_id`='".$_SESSION['id']."',ip_address='".$_SERVER['REMOTE_ADDR']."',action='lead_email_send',action_value='Lead Email Sent',more_info='".trim($db->clean($message))."',custom_notes='".json_encode($cn)."',date='".date('Y-m-d H:i:s')."'");
		header('location:page_crm.php?tkerr=email_sent');
		$_SESSION['success'] =  "email_sent";
		$_SESSION['lead_tab'] =  "crm";			
		$params = "?uid={$added_by}&tab=lead";
		$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
		locate_url($redirect_url);
	} else {
		$_SESSION['success'] =  "err_email_sent";
		$_SESSION['lead_tab'] =  "crm";	
		$params ="?uid={$added_by}&tab=lead";
		$redirect_url = explode('?',$_SERVER['REQUEST_URI'])[0].$params;
		locate_url($redirect_url);
	}
}


function client_as_lead()
{
    global $db;
	$id = $db->clean($_POST['id']);
	$added_by = (isset($_POST['added_by'])  ? $_POST['added_by'] :$_SESSION['id']);
	$user = $db->fetch_assoc($db->query("Select * from accounts_ag where id='" . $id . "'"));
	$db->query("Insert into lead Set 
		company='".$db->clean($user['company'])."', 
		email='" . $db->clean($user['email']) . "',
		fname='" . $db->clean($user['fname'] ). "',
		lname='" . $db->clean($user['lname']) . "',
		website='" . $db->clean($user['website'] ). "',
		work_phone='" . $db->clean($user['work_phone'] ). "',
		city='" . $db->clean($user['city']) . "',
		state='" . $db->clean($user['state']) . "',
		country ='" . $db->clean($user['country'] ) . "',
		open_date='" . $db->clean($user['company']) . "',
		zip='" . $db->clean($user['zip']) . "',
		contacted_status='".$db->clean($user['contacted_status'])."',
		added_by='" . $db->clean($added_by). "',
		business_type='" . $db->clean($user['business_type'] ). "',
		annual_sales='" . $db->clean($user['annual_sales']) . "',
		comments='" . $db->clean($user['comments']) . "',
		lead_source='active_client',
		address1='".$db->clean($user['address1'])."',
		status='Won',
		client_exist='1',
		client_id='".$id."',
		createdAt='".date('Y-m-d H:i:s')."' ") or die($db->error());
	/* die; */
	$_SESSION['lead_success'] =  "lead_add";
	$_SESSION['lead_tab'] =  "crm";	
	die;
}

function inactive_client()
{
    global $db;
    $id = $_POST['id'];
    $status = $_POST['status'];
    $first = $db->query("UPDATE accounts_ag SET active = '$status' where id='" . $id . "'");
	$_SESSION['lead_success'] =  "client_edit";
	$_SESSION['lead_tab'] =  "clients";
	$_SESSION['client_id'] =  $client_id;
	die;
}

/* CRM Function END */

function get_order_shipping_handling( $order_id, $status ) {
	global $status_array_before_approval;
	
	$ic = new invoiceCalc( $order_id );
	
	$shipping_tbd = $ic->shipping_tbd ? "TBD" : $ic->shipping;

	$hfee = 0;
	if ($ic->handling_fee > 0) {
		$hfee =  floatval($ic->handling_fee);
	}

	$s_h = 0;
	if (!empty($shipping_tbd) || $shipping_tbd == 'TBD') {
		$s_h = $shipping_tbd;
	}

	if ($ic->box_fee > 0) {
		$ss =  str_replace('$', '', $shipping_tbd);
		$ss =  str_replace('&#36;', '', $ss);
		
		if ($s_h == 'TBD') {
			$s_h = $ic->box_fee + $hfee;
		}
		else {
			$s_h = $ss + $ic->box_fee + $hfee;
		}
	}
	else {
		$ss =  str_replace('$', '', $shipping_tbd);
		$ss =  str_replace('&#36;', '', $ss);
		
		if ($s_h == 'TBD') {
			$s_h =  $hfee;
		}
		else {
			$s_h = $ss  + $hfee;
		}
	}

	$is_invoice = !in_array($status, $status_array_before_approval) ? true : false;

	if ($s_h > 0 ) {
		$s_h = (float) $s_h;
	}
	else if (!$is_invoice) {
		$s_h =  "TBD";
	}
	else {
		$s_h = (float)$s_h + (float)$ic->shipping;
	}
	
	if (((float) $s_h + (float) $ic->add_charges) >= 0) {
		$s_h = $s_h + $ic->add_charges;
	}
	
	return $s_h;
}


function get_all_tax_data( $from, $to, $state, $customer='all', $basis='cash', $ret='statewise'  ) {

	global $db, $state_list;


	$states			=	implode(',',$state);
	$state_in		=	implode("','",$state);
	$from 			= 	date('Y-m-d',strtotime($from)) . ' 00:00:00';
	$to	 			= 	date('Y-m-d',strtotime($to)) . ' 23:59:59';
	
	$customer_where = "`accounts_ag`.`test_account` != '1' AND ";
	if($customer != 'all'){
		
		if($customer == 'notax')
			$customer_where .= " accounts_ag.notax = '1' AND ";
		if($customer == 'tax')
			$customer_where .= " accounts_ag.notax = '0' AND  ";
	}
	
	$state_where = ' 1 ';
	/* if( $states	!='all' && $states	!='' ) {
		$state_where = " (
							( `ag_order`.`delivery_method`='local_pickup' AND `ag_order`.`store_location` IN (SELECT id FROM `stores` WHERE `store_state` IN ('".$state_in."') ) )
							OR ( `ag_order`.`delivery_method`!='local_pickup' AND `ag_order`.`ship_state` IN ('".$state_in."') )
						) ";
	} */
	
	$payment_join = $payment_sel = '';
	if($basis == 'cash') {
		/* $basis_where = " (`ag_order`.`approval_date` <='".$to."' AND `ag_order`.`approval_date` >= '".$from."') AND `ag_order`.`balance` <= 0 AND "; */
		$basis_where = " (`payment_collector`.`payment_date` <='".$to."' AND `payment_collector`.`payment_date` >= '".$from."') AND 
			`payment_collector`.`payment` > 0 AND 
			`payment_collector`.`void` != 'void' AND 
			`payment_collector`.`payment_method` IN ('Cash', 'Check', 'Cr-card', 'Other', 'JE') AND ";
		/* $basis_where .= " `ag_order`.`balance` <= 0 AND `ag_order`.`status` IN ('COMPLETE', 'SHIPPED') AND "; */
		$payment_sel = " , `payment_collector`.`payment`, `payment_collector`.`payment_method`, `payment_collector`.`total_amount`, `payment_collector`.`session_key`, `payment_collector`.`payment_date` ";
		$payment_join = " LEFT JOIN `payment_collector` ON `payment_collector`.`order_id` = `ag_order`.`id` ";
		
	} else { /* accrual */
		$basis_where = " (`ag_order`.`post_date` <='".$to."' AND `ag_order`.`post_date` >= '".$from."') AND ";
	}
	
	
			
	$array_res = $array_res2 = $payment_session = array();
	$added_orders = array();
		
		/**
		 * Order Details start
		*/
		$order_query_sql = "SELECT 
								`ag_order`.`id`, 
								`ag_order`.`user_id`, 
								`ag_order`.`grandsub`, 
								`ag_order`.`salestx`, 
								`ag_order`.`grandshipping`, 
								`ag_order`.`grandtotal`, 
								`ag_order`.`status`, 
								`ag_order`.`bill_state`, 
								`ag_order`.`ship_state`, 
								`ag_order`.`ship_zip`, 
								`ag_order`.`order_date`, 
								`ag_order`.`tax_exempt`, 
								`ag_order`.`part_name`, 
								`ag_order`.`delivery_method`, 
								`ag_order`.`store_location`, 
								`ag_order`.`payment_method`, 
								`ag_order`.`balance`, 
								`accounts_ag`.`company`,  
								`accounts_ag`.`notax`,  
								`accounts_ag`.`fname`,  
								`accounts_ag`.`lname`,  
								`accounts_ag`.`parent_id`,  
								`accounts_ag`.`terms`,  
								`account_edit`.`ae_total`, 
								`account_edit`.`ae_subtotal`, 
								`account_edit`.`ae_shipping`, 
								`account_edit`.`ae_tax`
								{$payment_sel}
							FROM 
								`ag_order` 
							LEFT JOIN 
								`accounts_ag` 
							ON 
								`ag_order`.`user_id` = `accounts_ag`.`id`  
							{$payment_join}
							LEFT JOIN 
								(SELECT 
									`invoice_id`, 
									SUM(`new_amt`) AS `ae_total`, 
									SUM(CASE WHEN `field_edited` = 'subtotal' THEN `new_amt` ELSE 0 END) AS `ae_subtotal`, 
									SUM(CASE WHEN `field_edited` = 'tax' THEN `new_amt` ELSE 0 END) AS `ae_tax` ,
									SUM(CASE WHEN `field_edited` = 'shipping' THEN `new_amt` ELSE 0 END) AS `ae_shipping` 
								FROM 
									`account_edits` 
								WHERE 
									`type` != 'refund' 
								GROUP BY 
									`invoice_id`)
								AS `account_edit`
							ON 
								`ag_order`.`id` = `account_edit`.`invoice_id`
							WHERE 
								`ag_order`.`is_delete` = '0' AND 
								
								$basis_where
								$customer_where
								$state_where
								 ";
		$order_query = $db->query($order_query_sql) or die($db->error());
		
		if ($db->num_rows($order_query) > 0):
			
			
			while ($row = $db->fetch_assoc($order_query)):
				$order_num	= '<a href="/page_orders_2.php?id='.$row['id'].'" target="_blank">'.$row['part_name'].'</a>';
				
				$subtotal	= $row['grandsub'] ? '$'.number_format((float) $row['grandsub'] + (float) $row['ae_subtotal'], 2, '.', '') : '$0.00';
				
				$ae_subtotal= $row['ae_subtotal'] ? ' (JE: $'.number_format((float) $row['ae_subtotal'], 2, '.', '').')' : '';
				$subtotal .= $ae_subtotal;
				
				$tax_state	= $state_list[$row['ship_state']];
				$tax_state_code = $row['ship_state'];
				$tax_zip_code = $row['ship_zip'];
				if( ($row['delivery_method'] == 'local_pickup') && !empty($row['store_location']) ) {
					$state_r = $db->query("SELECT * FROM stores WHERE id='{$row['store_location']}' LIMIT 1");
					$state_d = $db->fetch_assoc($state_r);
					$tax_state = $state_list[ $state_d['store_state'] ];
					$tax_state_code = $state_d['store_state'];
					$tax_zip_code = $state_d['store_zipcode'];
				}
				
				if( empty($tax_state) ) {
					$tax_state_code = empty($row['bill_state']) ? 'UT' : $row['bill_state'];
					$tax_state = $state_list[ $tax_state_code ];
				}
				
				if( $states	!='all' && $states	!='' && !in_array($tax_state_code, $state) ) {
					continue;
				}
				
				
				$is_tax_exempt = $row['tax_exempt'];
				
				$tax_exempt = ($is_tax_exempt == '1') ? '<span style="color: #f00;"><strong>EXEMPT</strong></span>' : 'No';
				
				
				
				$ae_tax= $row['ae_tax'] ? ' (JE: $'.number_format((float) $row['ae_tax'], 2, '.', '').')' : '';
				
				$realtaxamout = number_format((float) $row['salestx'] + (float) $row['ae_tax'], 2, '.', '');
				$realsubtotal = number_format((float) $row['grandsub'] + (float) $row['ae_subtotal'], 2, '.', '');
				$realgrandtotal = number_format((float) $row['grandtotal'] + (float) $row['ae_total'], 2, '.', '');
				$realshipping = number_format((float) $row['grandshipping'] + (float) $row['ae_shipping'], 2, '.', '');
				$tax_rate = number_format( ($realtaxamout/$realsubtotal)*100, 2, '.', '' );
				$s_h = get_order_shipping_handling( $row['id'], $row['status'] );
				
				$partial_text = '';
				if( $basis == 'cash' ) {
					
					/* if ($row['payment_method'] == 'Check') {
						if (!empty($row['total_amount'])) {
							if (in_array($row['total_amount'] . '_' . $row['session_key'], $payment_session)) {
								continue;
							} 
							else {
								$payment_session[] = $row['total_amount'] . '_' . $row['session_key'];
							}
						}
						
						$check_payment = $row['payment'];
						
						if (!empty($row['total_amount'])) {
							$check_payment = $row['total_amount'];
						}
						$row['payment'] = $check_payment;
					} */
					
					if( $row['grandtotal'] <= $row['payment'] ) {
						$realtaxamout = $realtaxamout;
						/* $realsubtotal = number_format((float) $row['payment'], 2, '.', ''); */
						/* $realgrandtotal = number_format((float) $row['payment'], 2, '.', ''); */
					} else {
						/* $today = date('Y-m-d',strtotime($row['payment_date'])) . ' 23:59:59';
						$nxt_pay = $db->query("SELECT * FROM payment_collector WHERE order_id='{$row['id']}' AND `payment_date`>'{$today}' AND `payment` > 0 AND `void` != 'void' AND `payment_method` IN ('Cash', 'Check', 'Cr-card', 'Other', 'JE') ");
						if( ($db->num_rows($nxt_pay) > 0) || ($row['balance'] > 0) ) {
							$realtaxamout = '0.00';
						} */
						/* $realsubtotal = number_format((float) $row['payment'], 2, '.', ''); */
						$per_paid = $row['payment']/$realgrandtotal*100;
						$realsubtotal = number_format( $realsubtotal/100*$per_paid, 2, '.', '' );
						$realtaxamout = number_format( $realtaxamout/100*$per_paid, 2, '.', '' );
						$s_h = number_format( $s_h/100*$per_paid, 2, '.', '' );
						$realgrandtotal = number_format((float) $row['payment'], 2, '.', '');
						/* $realsubtotal = ($row['payment'] < $realsubtotal) ? number_format((float) $row['payment'], 2, '.', '') : $realsubtotal; */
						$partial_text = ' (Partial)';
					}
				}
				
				/* if( in_array($row['id'], $added_orders) ) {
					$realtaxamout = '0.00';
				} */
				
				$tax_amount = ($realtaxamout > 0) ? '$' . $realtaxamout . $ae_tax : '';
				
				$calculated_tax = $tax_rate > 0 ? ((float) $row['grandsub'] * ((float) $tax_rate / 100)) : 0.00;
				$calculated_tax = number_format($calculated_tax, 2, '.', '');
				
				$diff_tax = (float)$row['salestx'] - (float)$calculated_tax;
				$diff_tax = number_format($diff_tax, 2, '.', '');
				
				$tax_rate_html = '';
				if ($is_tax_exempt != '1' && $realtaxamout > 0 && empty($tax_zip_code) && $tax_rate == 0) {
					$tax_rate_html = ' (Zip code is empty)';
				}
				
				$datato = (int) $row['grandsub'] + (int) $row['ae_subtotal'];
				$taxcalu = $row['salestx'] + (int) $row['ae_tax'];
				
				if(($tax_rate == '0.00' || $tax_rate == '0') && $subtotal != '$0.00'){
					$tax_rater = $realtaxamout*100/$realsubtotal;
					$tax_rater = number_format($tax_rater, 2, '.', '');
				}else{
					$tax_rater = $tax_rate;
				}
				
				$added_orders[] = $row['id'];
				$order_data = array(
					'order_id' => $row['id'],
					'part_name' => $row['part_name'],
					'order_num' => $order_num . $partial_text,
					'company' => $row['company'] . ' - ' . $row['fname'],
					'status' => $row['status'],
					'subtotal' => $realsubtotal,
					'tax_state' => $tax_state,
					'tax_rate' => $tax_rater.'&#37;'.$tax_rate_html,
					'tax_exempt' => $tax_exempt,
					'tax_amount' => $tax_amount,
					'is_tax_exempt' => $is_tax_exempt,
					'datato' => $datato,
					'taxcalu' => $taxcalu,
					'company_name' => $row['company'],
					'client_name' => $row['fname'] . ' ' . $row['lname'],
					'order_date' => $row['order_date'],
					'client_terms' => $row['terms'],
					'payment_method' => $row['payment_method'],
					'realgrandtotal' => $realgrandtotal,
					'realsubtotal' => $realsubtotal,
					'realtaxamout' => $realtaxamout,
					's_h' => usa_currency_formatter($s_h),
					'total' => usa_currency_formatter($realsubtotal+$s_h+$realtaxamout),
				);
				
				$array_res['states'][ $tax_state_code ]['order_details'][] = $order_data;
				
				$array_res2[] = $order_data;
				
				
				/* State Totals */
				$array_res['states'][ $tax_state_code ]['totals']['all_orders'] += 1;
				$array_res['states'][ $tax_state_code ]['totals']['total_sum_dollar'] += $realgrandtotal;
				if($is_tax_exempt == '1') {
					$array_res['states'][ $tax_state_code ]['totals']['toammountnotx'] += ($realgrandtotal - $realshipping);
				} else {
					$array_res['states'][ $tax_state_code ]['totals']['toammounttx'] += ($realgrandtotal - $realtaxamout - $realshipping);
				}
				$array_res['states'][ $tax_state_code ]['totals']['total_tax_show'] += $realtaxamout;
				$array_res['states'][ $tax_state_code ]['totals']['total_amt_shipped'] += $realshipping;
				if($row['delivery_method'] == 'shipped') {
					$array_res['states'][ $tax_state_code ]['totals']['total_num_shipped'] += 1;
				}
				if($row['delivery_method'] == 'dtp_delivery') {
					$array_res['states'][ $tax_state_code ]['totals']['total_num_del'] += 1;
				}
				
				/* Bottom Totals */
				$array_res['totals']['all_orders'] += 1;
				$array_res['totals']['total_sum_dollar'] += $realgrandtotal;
				if($is_tax_exempt == '1') {
					$array_res['totals']['toammountnotx'] += ($realgrandtotal - $realshipping);
				} else {
					$array_res['totals']['toammounttx'] += ($realgrandtotal - $realtaxamout - $realshipping);
				}
				$array_res['totals']['total_tax_show'] += $realtaxamout;
				$array_res['totals']['total_amt_shipped'] += $realshipping;
				if($row['delivery_method'] == 'shipped') {
					$array_res['totals']['total_num_shipped'] += 1;
				}
				if($row['delivery_method'] == 'dtp_delivery') {
					$array_res['totals']['total_num_del'] += 1;
				}				
				
				
			endwhile;
		
		endif;
		
		$array_res['query']['from'] = $from;
		$array_res['query']['to'] = $to;
		$array_res['query']['customer'] = $customer;
		$array_res['query']['state'] = $state;
		$array_res['query']['basis'] = $basis;
		
	if( $ret == 'normal' ) {
		return $array_res2;
	} else {
		return $array_res;
	}
}

function get_all_deposite_data( $from, $to ) {
	
	global $db;
	$res = array();
	$orders = get_all_tax_data( $from, $to, array(), 'all', 'cash', 'normal' );
	foreach($orders as $row) {
		
		$order_id = $row['order_id'];
		/* $ic = new invoiceCalc( $order_id );
		$payment_total = $ic->payment_total; */
		$payment_total = $row['realgrandtotal'];
		$row['payment_total'] = $payment_total;
		$on_terms = (in_array($row['client_terms'], array('Net 30', 'Net 60'))) ? true : false;
		$row['on_terms'] = $on_terms;
		$row['payment_method'] = empty($row['payment_method']) ? 'Other' : $row['payment_method'];
		$row['payment_method'] = ($row['payment_method'] == 'Cr-card') ? 'Credit Card' : $row['payment_method'];
		$res['payments'][ $row['payment_method'] ]['order_details'][] = $row;
		$res['payments'][ $row['payment_method'] ]['totals']['total'] += $payment_total;
		if( $on_terms ) {
			$res['payments'][ $row['payment_method'] ]['totals']['ar'] += $payment_total;
		} else {
			$res['payments'][ $row['payment_method'] ]['totals']['pos'] += $payment_total;
		}
		
		$res['totals']['total'] += $payment_total;
		if( $on_terms ) {
			$res['totals']['ar'] += $payment_total;
		} else {
			$res['totals']['pos'] += $payment_total;
		}
		
		$res['tax']['total'] += $row['realtaxamout'];
		if( $on_terms ) {
			$res['tax']['ar'] += $row['realtaxamout'];
		} else {
			$res['tax']['pos'] += $row['realtaxamout'];
		}
	}
	return $res;
}
function replace_file_url($file){
	$upl_thumb = str_replace('http://designtoprint.com/','https://www.filesupload.designtoprint.com/',$file);
	$upl_thumb = str_replace('http://www.designtoprint.com/','https://www.filesupload.designtoprint.com/',$upl_thumb);
	$upl_thumb = str_replace('https://www.designtoprint.com/','https://www.filesupload.designtoprint.com/',$upl_thumb);
	$upl_thumb = str_replace('https://designtoprint.com/','https://www.filesupload.designtoprint.com/',$upl_thumb);
	return $upl_thumb;
}
?>