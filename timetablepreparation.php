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
	
	$facultyid = $_POST['facultyid'];
	$courseduration = $_POST['courseduration'];
	$test1 = $_POST['test1'];
	$test2 = $_POST['test2'];
	$assignments = $_POST['assignments'];
	$projects = $_POST['projects'];
	$midsem = $_POST['midsem'];
	$endsem = $_POST['endsem'];

	$query = "SELECT * from timetablepreparation";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE timetablepreparation (
		facultyid  varchar(20),
		courseduration varchar(20),
		test1 varchar(20),
		test2 varchar(20),
		assignments varchar(20),
		projects varchar(20),
		midsem varchar(20),
		endsem varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "Faculty table created. ";
	}
	
	$sql = "INSERT INTO timetablepreparation (facultyid,courseduration,test1,test2,assignments,projects,midsem,endsem) VALUES ('$facultyid','$courseduration','$test1','$test2','$assignments','$projects','$midsem','$endsem')";

	if ($conn->query($sql) === TRUE) {
	    echo "timetablepreparation  successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>