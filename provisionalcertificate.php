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
	$semester = $_POST['semester'];
	$degree = $_POST['degree'];
	$coursecodes = $_POST['coursecodes'];
	$coursesattended = $_POST['coursesattended'];


	$query = "SELECT * from provisionalcertificate";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE provisionalcertificate (
		name varchar(20),
		rollnumber varchar(20),
		semester varchar(20),
		degree varchar(20),
		coursecodes varchar(20),
		coursesattended varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "provisionalcertificate table created. ";
	}
	
	$sql = "INSERT INTO provisionalcertificate (name,rollnumber,semester,degree,coursecodes,coursesattended) VALUES ('$name','$rollnumber','$semester','$degree','$coursecodes','$coursesattended')";

	if ($conn->query($sql) === TRUE) {
	    echo "provisionalcertificate booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>