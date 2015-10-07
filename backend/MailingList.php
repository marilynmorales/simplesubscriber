<?php 
class MailingList extends mysqli {
	public $timezone = 'America/Los_Angeles';
	public $tableName = 'Subscribers';
	private $email = '';
	public function __construct($dbConnect) {
		if(!isset($dbConnect['host']) || !isset($dbConnect['username']) || !isset($dbConnect['password']) || !isset($dbConnect['name'])){
			die('Please make sure you\'ve specified the host, database name, database username, and database password.');
		}		
		parent::init();
		parent::real_connect($dbConnect['host'], $dbConnect['username'], $dbConnect['password'], $dbConnect['name']);
		if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
	}
	public function init() {
		$this->createTable('id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
		email VARCHAR (150) UNIQUE NOT NULL, signed DATETIME');
		$action = $_GET['action'];
		if(isset($action)) {
			$this->email = $_POST['email'];
			if(isset($this->email) && $this->email != '') {
				if($action == 'subscribe'){
					$this->subscribe();
				} else if($action == 'unsubscribe'){
					$this->unsubscribe();					
				} else {
					die('Oops, looks like that action does not exit.');
				}
			}		
		}
	}
	public function subscribe() {
		date_default_timezone_set($this->timezone);
		$time = date('c');
		$this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
		$this->email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
		$alreadySubscribed = $this->checkIfValIsNew('email', $this->email);
		if($alreadySubscribed['isNew'] == TRUE) {
			$this->insert('email,signed', '\'' . $this->email . '\', \''. $time . '\'');
		} else {
			$toObj = array('alreadyRegistered' => TRUE);
			echo json_encode($toObj);
		}
	}

	public function unsubscribe(){
		$query = "DELETE FROM " . $this->tableName . " WHERE email='" . $this->email . "'";
		mysqli::query($query);
		$toObj = array();
		$toObj['deleted'] = TRUE;
		echo json_encode($toObj);	
	}

	protected function createTable($settings){
		$this->setTableName($this->tableName);
		$settings 	= htmlspecialchars($settings);
		$query 		= "CREATE TABLE " . $this->tableName . " (" . $settings . ")";		
		mysqli::query($query);
	}
	protected function checkIfValIsNew($col, $val) {
		$query 	= "SELECT * FROM " . $this->tableName . " WHERE " . $col . "='" . $val . "'";
		$toArr 	= array();
		$result = mysqli::query($query);
		$result = $result->fetch_assoc();
		if($result) {
			$toArr['isNew'] = FALSE;
		} else {
			$toArr['isNew'] = TRUE;			
		}
		return $toArr;
	}
	protected function insert($cols, $vals) {
		$query = "INSERT INTO " . $this->tableName . " (" . $cols . ")" . " VALUES (" . $vals . ")";
		$toObj = array();
		if (mysqli::query($query) == TRUE) {
			$toObj['isAccepted'] = TRUE;
		} else {
			$toObj['isAccepted'] = FALSE;
		}
		echo json_encode($toObj);
	}
	public function setTableName($name) {
		$name = htmlspecialchars(preg_filter('/(\d*)(\W*)/', '', $name));
		$name = ucfirst(strtolower($name));
		$this->tableName = $name;
	}
	public function setTimezone($name) {
		$name = htmlspecialchars($name);
		$name = ucfirst(strtolower($name));
		$this->timezone = $name;
	}
}
