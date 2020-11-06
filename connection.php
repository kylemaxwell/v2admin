<?php
$protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

if (substr($_SERVER['HTTP_HOST'], 0, 4) !== 'www.') {
    header('Location: '.$protocol.'www.'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI']);
    exit;
}
/* error_reporting(E_ALL);
ini_set('display_errors', 1); */

ini_set('display_errors', 0);


$id = session_id();

if (is_null($id) || strcmp($id, "") == 0) {

	$cookie_timeout = (60 * 60) * 10; /* // in seconds */
	$garbage_timeout = $cookie_timeout + 600;
	ini_set('session.gc_maxlifetime', $garbage_timeout);
	@session_start();
}
@session_start();

// main server config changes

	/* $host_server = "localhost"; */
	$host_server = "192.168.34.88";
	$user_server = "designto";
	$passwd_server = "wVCD{tq6VvML";
	if (isset($_GET['site_y'])) {
		$_SESSION['db_select'] = base64_decode($_GET['site_y']);
	}
	if (isset($_SESSION['db_select']) && $_SESSION['db_select'] != '') {
		$dbname_server = $_SESSION['db_select'];
	} else {
		$dbname_server = "designto_dtp";
	}




/* $cxn = mysql_connect('localhost', $user_server, $passwd_server) or die ("couldn't connect to server");
mysql_select_db($dbname_server, $cxn); */

/* include_once "/home/dtpadmin/public_html/timezone.php"; */
include_once __DIR__ . "/db_class_i.php";

$db = new MySQLDatabase($host_server, $user_server, $passwd_server, $dbname_server);

$time_zone = $db->fetch_assoc($db->query("SELECT * FROM time_zone WHERE active=1"));
date_default_timezone_set($time_zone['name']);

/*
if(file_exists("./ga_logs-add.php")) { include_once "./ga_logs-add.php"; }
*/

include_once __DIR__ . '/functions.php';
/* include_once __DIR__ . '/functions_html.php'; */
set_session_child_site();
$Config = get_config();

include_once __DIR__ . '/constants.php';


$Company_Info = $db->fetch_assoc($db->query("SELECT * FROM company_info WHERE `tag_site`='".$db->clean($_SESSION['child_site'])."' LIMIT 1"));
$Company_Info2 = $db->fetch_assoc($db->query("SELECT * FROM company_info WHERE id='1' LIMIT 1"));
$User_Info = $db->fetch_assoc($db->query("SELECT * FROM settings WHERE id='{$_SESSION['adminlvl']}' LIMIT 1"));

$Company_Info['web_url_org'] = 'https://www.filesupload.designtoprint.com';
$Company_Info['files_url'] = 'https://www.filesupload.designtoprint.com';
$Company_Info['admin_url_org'] = 'https://www.dtpadmin.com';
$Company_Info['art_url_org'] = 'https://www.artuploader.com';
$Company_Info['dashboard_header'] = $Company_Info2['dashboard_header'];
$Company_Info['avatar'] = $Company_Info2['avatar'];
$Company_Info['background_color'] = $Company_Info2['background_color'];
$Company_Info['login_background'] = $Company_Info2['login_background'];
$Company_Info['admin_logo'] = $Company_Info2['admin_logo'];
$Company_Info['brand_name'] = $Company_Info2['brand_name'];
define("main_site_url","https://www.dtpadmin.com");

if (isset($_GET['test_db'])) {
	$sql = "SELECT * FROM admin_access_types WHERE id='1' LIMIT 1";
	$r = $db->query($sql) or die($db->error());
	if ($db->num_rows($r)) {
		$d = $db->fetch_assoc($r);
		var_dump($d);
		echo 'true';
	} else {
		echo 'false';
	}
	echo $sql;
	/* print_r($_SESSION); */
}
