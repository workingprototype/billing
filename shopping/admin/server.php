<?php
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'u306375126_john', 'password' , 'u306375126_bill');
 
	$sql = $conn->prepare("SELECT * FROM supplier WHERE productcompany LIKE ?");
	$sql->bind_param("s",$search_param);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["productcompany"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>
