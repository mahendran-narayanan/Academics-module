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
	$yearjoined = $_POST['yearjoined'];

	$query = "SELECT * from degreecertificateprinting";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE degreecertificateprinting (
		name varchar(20),
		rollnumber varchar(20),
		degree varchar(20),
		yearjoined varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "degreecertificateprinting table created. ";
	}
	
	$sql = "INSERT INTO degreecertificateprinting (name,rollnumber,degree,yearjoined) VALUES ('$name','$rollnumber','$degree','$yearjoined')";

	if ($conn->query($sql) === TRUE) {
	    echo "degreecertificateprinting booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>