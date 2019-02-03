
<?php
	include "../config/mysql.config.php";
	$connString = mysqli_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD, SQL_DBN) or die("Connection failed: " . mysqli_connect_error());
	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Products($connString);

	switch($action) {
	 case 'add':
		$empCls->insertProduct($params);
	 break;
	 case 'edit':
		$empCls->updateProduct($params);
	 break;
	 case 'delete':
		$empCls->deleteProduct($params);
	 break;
	 default:
	 $empCls->getProduct($params);
	 return;
	}

	class Products {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getProduct($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}
	function insertProduct($params) {
		$data = array();;
		//TODO: Just complete this Shit, This is tooooooooooooooooooo much, i have done the half.   :( -> Lol.Thanks bruh!
		$sql = "INSERT INTO `products` (pname, pbrand, punit, pcategory, psubcategory, pksu, pquantity, pweight, ptaxapplicable, ptaxtype, cgstgroup, sgstgroup, igstgroup, pamountexcludingtax, pamountincludingtax, pmarginamout, psellingprice)
		VALUES('" . $params["pname"] . "', '" . $params["pbrand"] . "','" . $params["punit"] . "','" . $params["pcategory"] . "','" . $params["psubcategory"] . "','" . $params["pksu"] . "','" . $params["pquantity"] . "','" . $params["pweight"] . "','" . $params["ptaxapplicable"] . "','" . $params["cgstgroup"] . "','" . $params["sgstgroup"] . "','" . $params["igstgroup"] . "','" . $params["pamountexcludingtax"] . "','" . $params["pamountincludingtax"] . "','" . $params["pmarginamout"] . "','" . $params["psellingprice"] . "');  ";

		echo $result = mysqli_query($this->conn, $sql) or die("error while inserting user data");

	}


	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;

		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };
        $start_from = ($page-1) * $rp;

		$sql = $sqlRec = $sqlTot = $where = '';

		if( !empty($params['searchPhrase']) ) {
			$where .=" WHERE ";
			$where .=" ( pname LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR pbrand LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR punit LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR pcategory LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR psubcategory LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR pksu LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `products` ";
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
		$sql = "Update `products` set fullname = '" . $params["edit_fullname"] . "', username='" . $params["edit_username"]."', email='" . $params["edit_email"] . "', password='" . $params["edit_password"] . "', role='" . $params["edit_role"] . "' WHERE id='".$_POST["edit_id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error while updating user data");
	}

	function deleteUsers($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `products` WHERE id='".$params["id"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error while deleting user data");
	}
}
?>
