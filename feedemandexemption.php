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
	$messfee = $_POST['messfee'];
	$hostelfee = $_POST['hostelfee'];
	$semesterfee = $_POST['semesterfee'];

	$query = "SELECT * from feedemandexemption";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE feedemandexemption (
		rollnumber varchar(20),
		messfee varchar(20),
		hostelfee varchar(20),
		semesterfee varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "feedemandexemption table created. ";
	}
	
	$sql = "INSERT INTO feedemandexemption (rollnumber,messfee,hostelfee,semesterfee) VALUES ('$rollnumber','$messfee','$hostelfee','$semesterfee')";

	if ($conn->query($sql) === TRUE) {
	    echo "feedemandexemption booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>