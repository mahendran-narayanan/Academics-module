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
	
	$facultyname = $_POST['facultyname'];
	$facultyid = $_POST['facultyid'];
	$coursecode = $_POST['coursecode'];
	$coursecredits = $_POST['coursecredits'];
	$degree = $_POST['degree'];
	$semester = $_POST['semester'];


	$query = "SELECT * from teacherallocation";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE teacherallocation (
		facultyname varchar(20),
		facultyid varchar(20),
		coursecode varchar(20),
		coursecredits varchar(20),
		degree varchar(20),
		semester varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "Faculty table created. ";
	}
	
	$sql = "INSERT INTO teacherallocation (facultyname,facultyid,coursecode,coursecredits,degree,semester) VALUES ('$facultyname','$facultyid','$coursecode','$coursecredits','$degree','$semester')";

	if ($conn->query($sql) === TRUE) {
	    echo "teacherallocation successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>