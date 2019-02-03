
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
		$data = array();
		$sql = "INSERT INTO `products` (`pid`, `pname`, `pbrand`, `punit`, `pcategory`, `psubcategory`, `psku`, `pquantity`, `pweight`, `ptaxapplicable`, `cgstgroup`, `sgstgroup`, `igstgroup`, `pamountexcludingtax`, `pamountincludingtax`, `pmarginamount`, `psellingprice`, `ptimestamp`)
		 VALUES ('', 'qweqw', 'qweq', 'qweq', 'qweq', 'qweq', 'qwe', 'qweq', 'qweq', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'CURRENT_TIMESTAMP(6).000000')";
		echo $result = mysqli_query($this->conn, $sql) or die("error while inserting product data");

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
			$where .=" OR pquantity LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR pweight LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR ptaxtype LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR cgstgroup LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR sgstgroup LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR igstgroup LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR pamountexcludingtax LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR pamountincludingtax LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR pmarginamout LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR psellingprice LIKE '".$params['searchPhrase']."%' )";
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
	function updateProduct($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "Update `products` set pname = '" . $params["pname_edit"] . "', pbrand='" . $params["pbrand_edit"]."', punit='"
		 . $params["punit_edit"] . "', pcategory='" . $params["pcategory_edit"]
		  . "', psubcategory='" . $params["psubcategory_edit"]."', psku='" . $params["psku_edit"]."',
			 pquantity='" . $params["pquantity_edit"]."',
			  pweight='" . $params["pweight_edit"]."',
				 ptaxapplicable='" . $params["ptaxapplicable_edit"]."',
 				 cgstgroup='" . $params["cgstgroup_edit"]."',
 				 sgstgroup='" . $params["sgstgroup_edit"]."',
 				 igstgroup='" . $params["igstgroup_edit"]."',
 				 pamountexcludingtax='" . $params["pamountexcludingtax"]."',
 				 pamountincludingtax='" . $params["pamountincludingtax_edit"]."',
 				 pmarginamout='" . $params["pmarginamount_edit"]."',
				  psellingprice='" . $params["psellingprice_edit"]
			 . "' WHERE pid='".$_POST["pid_edit"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error while updating user data");
	}

	function deleteProduct($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `products` WHERE pid='".$params["pid"]."'";

		echo $result = mysqli_query($this->conn, $sql) or die("error while deleting product data");
	}
}
?>
