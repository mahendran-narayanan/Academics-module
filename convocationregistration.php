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
	$department = $_POST['department'];

	$query = "SELECT * from convocationregistration";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE convocationregistration (
		rollnumber varchar(20),
		name varchar(20),
		degree varchar(20),
		department varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "convocationregistration table created. ";
	}
	
	$sql = "INSERT INTO convocationregistration (rollnumber,name,degree,department) VALUES ('$rollnumber','$name','$degree','$department')";

	if ($conn->query($sql) === TRUE) {
	    echo "convocationregistration booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>