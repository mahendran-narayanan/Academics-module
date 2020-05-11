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
	$degree = $_POST['degree'];
	$semesterfee = $_POST['semesterfee'];
	$messfee = $_POST['messfee'];
	$hostelfee = $_POST['hostelfee'];


	$query = "SELECT * from feedemandgeneration";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE feedemandgeneration (
		rollnumber varchar(20),
		degree varchar(15),
		semesterfee varchar(10),
		messfee varchar(15),
		hostelfee varchar(10)
		)";
		$result = mysqli_query($conn, $query);
		echo "feedemandgeneration table created. ";
	}
	
	$sql = "INSERT INTO feedemandgeneration (rollnumber,degree,semesterfee,messfee,hostelfee) VALUES ('$rollnumber','$degree','$semesterfee','$messfee','$hostelfee')";

	if ($conn->query($sql) === TRUE) {
	    echo "feedemandgeneration booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>