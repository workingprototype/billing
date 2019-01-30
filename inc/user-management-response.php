
<?php
	include "../config/mysql.config.php";
	$connString = mysqli_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD, SQL_DBN) or die("Connection failed: " . mysqli_connect_error());
	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Users($connString);

	switch($action) {
	 case 'add':
		$empCls->insertUsers($params);
	 break;
	 case 'edit':
		$empCls->updateUsers($params);
	 break;
	 case 'delete':
		$empCls->deleteUsers($params);
	 break;
	 default:
	 $empCls->getUsers($params);
	 return;
	}

	class Users {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getUsers($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}
	function insertUsers($params) {
		$data = array();;
		$sql = "INSERT INTO `users` (fullname, username, email, password, role) VALUES('" . $params["fullname"] . "', '" . $params["username"] . "','" . $params["email"] . "','" . $params["password"] . "','" . $params["role"] . "');  ";

		echo $result = mysqli_query($this->conn, $sql) or die("error while inserting user data");

	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = '';

		if( !empty($params['searchPhrase']) ) {
			$where .=" WHERE ";
			$where .=" ( fullname LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR username LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR email LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR role LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `users` ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;

		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;


		$qtot = mysqli_query($this->conn, $sqlTot) or die("error while fetching user data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error while fetching user data");

		while( $row = mysqli_fetch_assoc($queryRecords) ) {
			$data[] = $row;
		}

		$json_data = array(
			"current"            => intval($params['current']),
			"rowCount"            => 10,
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);

		return $json_data;
	}
	function updateUsers($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "Update `users` set fullname = '" . $params["edit_fullname"] . "', username='" . $params["edit_username"]."', email='" . $params["edit_email"] . "', password='" . $params["edit_password"] . "', role='" . $params["edit_role"] . "' WHERE id='".$_POST["edit_id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error while updating user data");
	}

	function deleteUsers($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `users` WHERE id='".$params["id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error while deleting user data");
	}
}
?>
