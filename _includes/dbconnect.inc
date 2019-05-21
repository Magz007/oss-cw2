<?php
	//  replace mysqllogin and mysqlpassword with your own
//	$conn = mysqli_connect("localhost", "root", "", "bnu.bseen.co.server");
	$conn = mysqli_connect("localhost", "21707722", "mysqluser", "db3_21707722");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

?>
