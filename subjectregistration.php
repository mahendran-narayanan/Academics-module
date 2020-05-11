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
	$coursecode = $_POST['coursecode'];
	$coursetitle = $_POST['coursetitle'];
	$semester = $_POST['semester'];
	$degree = $_POST['degree'];
	$credits = $_POST['credits'];
	$digitalsignature = $_POST['digitalsignature'];


	$query = "SELECT * from subjectregistration";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE subjectregistration (
		rollnumber varchar(20),
		coursecode varchar(20),
		coursetitle varchar(20),
		semester varchar(20),
		degree varchar(20),
		credits varchar(20),
		digitalsignature varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "subjectregistration table created. ";
	}
	
	$sql = "INSERT INTO subjectregistration (rollnumber,coursecode,coursetitle,semester,degree,credits,digitalsignature) VALUES ('$rollnumber','$coursecode','$coursetitle','$semester','$degree','$credits','$digitalsignature')";

	if ($conn->query($sql) === TRUE) {
	    echo "subjectregistration booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>