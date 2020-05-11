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
	
	$rollnumber = $_POST['rollnumber'];
	$name = $_POST['name'];
	$degree = $_POST['degree'];
	$semester = $_POST['semester'];
	$digitalsignature = $_POST['digitalsignature'];


	$query = "SELECT * from semesterregistration";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE semesterregistration (
		rollnumber varchar(20),
		name varchar(20),
		degree varchar(20),
		semester varchar(20),
		digitalsignature varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "semesterregistration table created. ";
	}
	
	$sql = "INSERT INTO semesterregistration (rollnumber,name,degree,semester,digitalsignature) VALUES ('$rollnumber','$name','$degree','$semester','$digitalsignature')";

	if ($conn->query($sql) === TRUE) {
	    echo "semesterregistration booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>