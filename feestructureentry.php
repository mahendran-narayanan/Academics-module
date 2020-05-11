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
	
	$degree = $_POST['degree'];
	$semester = $_POST['semester'];
	$hostelblock = $_POST['hostelblock'];

	$query = "SELECT * from feestructureentry";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE feestructureentry (
		degree varchar(20),
		semester varchar(20),
		hostelblock varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "feestructureentry created. ";
	}
	
	$sql = "INSERT INTO feestructureentry (degree,semester,hostelblock) VALUES ('$degree','$semester','$hostelblock')";

	if ($conn->query($sql) === TRUE) {
	    echo "feestructureentry successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>