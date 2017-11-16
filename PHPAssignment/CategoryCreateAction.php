<?php
require("ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier </title>
</head>

<body>
<div class="container">
<?php
	// create connection
	if($_POST['cname']!="")
	{
		$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		//echo $mysqli->host_info . "\n";
			// create SQL statement 
			$sql = "INSERT INTO category(Name)
					VALUES('". $_POST['cname'] . "')";

		// execute SQL statement and get results 
		if (!$mysqli->query($sql)) {
			echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{
			echo "Category created successfully";
		}
		
	}
	else
	{
		echo "Required field is missing.";
		trigger_error("No data supplied", E_USER_ERROR);
	}
?>
</div>
</body>
</html>
