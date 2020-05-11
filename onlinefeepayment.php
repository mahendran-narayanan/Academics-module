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
	$semester = $_POST['semester'];
	$semesterfee = $_POST['semesterfee'];
	$hostelfee = $_POST['hostelfee'];
	$messfee = $_POST['messfee'];
	$additionalfee = $_POST['additionalfee'];
	$due = $_POST['due'];

	$query = "SELECT * from onlinefeepayment";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE onlinefeepayment (
		rollnumber varchar(20),
		degree varchar(20),
		semester varchar(20),
		semesterfee varchar(20),
		hostelfee varchar(20),
		messfee varchar(20),
		additionalfee varchar(20),
		due varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "onlinefeepayment table created. ";
	}
	
	$sql = "INSERT INTO onlinefeepayment (rollnumber,degree,semester,semesterfee,hostelfee,messfee,additionalfee,due) VALUES ('$rollnumber','$degree','$semester','$semesterfee','$hostelfee','$messfee','$additionalfee','$due')";

	if ($conn->query($sql) === TRUE) {
	    echo "onlinefeepayment booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>