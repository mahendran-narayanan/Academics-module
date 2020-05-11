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
	$rollnumber = $_POST['rollnumber'];
	$degree = $_POST['degree'];
	$semester = $_POST['semester'];


	$query = "SELECT * from finalgradecardprinting";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE finalgradecardprinting (
		name varchar(20),
		rollnumber varchar(20),
		degree varchar(20),
		semester varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "finalgradecardprinting table created. ";
	}
	
	$sql = "INSERT INTO finalgradecardprinting (name,rollnumber,degree,semester) VALUES ('$name','$rollnumber','$degree','$semester')";

	if ($conn->query($sql) === TRUE) {
	    echo "finalgradecardprinting booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>