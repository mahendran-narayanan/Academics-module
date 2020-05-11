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
	$required = $_POST['required'];
	$mentor = $_POST['mentor'];
	$numberofdays = $_POST['numberofdays'];

	$query = "SELECT * from nodemandcertificate";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE nodemandcertificate (
		name varchar(20),
		rollnumber varchar(20),
		required varchar(20),
		mentor varchar(20),
		numberofdays varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "nodemandcertificate table created. ";
	}
	
	$sql = "INSERT INTO nodemandcertificate (name,rollnumber,required,mentor,numberofdays) VALUES ('$name','$rollnumber','$required','$mentor','$numberofdays')";

	if ($conn->query($sql) === TRUE) {
	    echo "nodemandcertificate booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>