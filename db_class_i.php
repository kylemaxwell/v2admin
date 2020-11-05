<?php
@session_start();
$blacklist_array = array('7099');

function check_sql($sql) { global $blacklist_array;
	$test1 = stripos(trim($sql), 'UPDATE');
	$test2 = stripos(trim($sql), 'DELETE');
	$test3 = stripos(trim($sql), 'etc');
	$test4 = stripos(trim($sql), 'employees');
	$test5 = preg_match("/UPDATE.*WHERE.*=''/i", $sql);
	if(($test1 === 0) || ($test2 === 0)) {
		/* if($test5 !== false) { return false; } */
		if(isset($_SESSION['id']) && in_array($_SESSION['id'], $blacklist_array)) {
			return false;
		} else {
			return true;
		}
	} else { return true; }
}

class MySQLDatabase {

	private $con;
	public $sql;
	
	public function __construct($host = NULL, $username = NULL, $password = NULL, $dbname = NULL) {
		if(!is_null($host)) {

			$this->con = mysqli_connect($host, $username, $password) or die("Database connection failed");
			mysqli_select_db($this->con, $dbname) or die("Database selection failed");
		}
	}
	
	public function close($con = NULL) { return mysqli_close($this->con); }
	
	public function connect($host, $username, $password) {
		$this->con = mysqli_connect($host, $username, $password) or die("Database connection failed");
		return $this->con;
	}
	
	public function select_db($dbname, $con = NULL) { return mysqli_select_db($this->con, $dbname) or die("Database selection failed"); }
	
	public function query($sql, $con = NULL) {
		$this->sql = $sql;
		if(check_sql($sql)) {
			$this->log($sql);
			$result = mysqli_query($this->con, $this->sql);
			return $result;
		} else { return false; }
	}
	
	public function error2($con = NULL) { return "Error: " . __LINE__ . " " . mysqli_error($this->con); }
	
	public function error($con = NULL) { return mysqli_error($this->con) . $_SESSION['id'] . $this->sql; }
	
	public function fetch_assoc($resource) { return mysqli_fetch_assoc($resource); }
	
	public function fetch_array($resource) { return mysqli_fetch_array($resource); }
	
	public function insert_id($con = NULL) { return mysqli_insert_id($this->con); }
	
	public function num_rows($resource) { return mysqli_num_rows($resource); }
	
	public function affected_rows($con = NULL) { return mysqli_affected_rows($this->con); }
	
	public function data_seek($resource, $rn) { return mysqli_data_seek($resource, $rn); }
	
	public function clean($value, $con = NULL) { return mysqli_real_escape_string($this->con, trim($value)); }
	
	private function confirm_query($resource) {
		if(!$resource) {
			die("Mysql query failed");
		}
		return true;
	}
	
	private function log($sql) {
		$sql = trim($sql);
		if((stripos($sql, "global_admin_logs") === false) && ((stripos($sql, "Select") === false) || (stripos($sql, "Select") !== 0))) {
			$sql_i = "INSERT INTO global_admin_logs2 (user_id, req_sql, from_to, req_date, req_ip) VALUES ('{$_SESSION['id']}', '". $this->clean($sql) ."', '". $this->clean("{$_SERVER['HTTP_REFERER']}___{$_SERVER['REQUEST_URI']}") ."', '". strftime("%F %T") ."', '{$_SERVER['REMOTE_ADDR']}')";
			$result = mysqli_query($this->con, $sql_i);
		}
	}
	
}

$db = new MySQLDatabase();

?>