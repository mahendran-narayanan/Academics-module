<?php

	$servername = "localhost";
	$username = "abcd";
	$password = "Asdfdsa_1";
	$dbname = "academics";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	

	$name = $_POST['name'];
	$degree = $_POST['degree'];
	$report = $_POST['report'];
	$digitalsignature = $_POST['digitalsignature'];

	$query = "SELECT * from awardeecitationreport";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE awardeecitationreport (
		name varchar(20),
		degree varchar(20),
		report varchar(200),
		digitalsignature varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "awardeecitationreport table created. ";
	}
	
	$sql = "INSERT INTO awardeecitationreport (name,degree,report,digitalsignature) VALUES ('$name','$degree','$report','$digitalsignature')";

	if ($conn->query($sql) === TRUE) {
	    echo "awardeecitationreport booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>