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
	$name = $_POST['name'];
	$degree = $_POST['degree'];
	$year = $_POST['year'];
	$towhom = $_POST['to'];
	$about = $_POST['about'];
	$description = $_POST['description'];


	$query = "SELECT * from specialpermission";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE specialpermission (
		rollnumber varchar(20),
		name varchar(20),
		degree varchar(20),
		year varchar(20),
		towhom varchar(20),
		about varchar(20),
		description varchar(20)
		)";
		$result = mysqli_query($conn, $query);
		echo "specialpermission table created. ";
	}
	
	$sql = "INSERT INTO specialpermission (rollnumber,name,degree,year,towhom,about,description) VALUES ('$rollnumber','$name','$degree','$year','$towhom','$about','$description')";

	if ($conn->query($sql) === TRUE) {
	    echo "specialpermission booked successfully...";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();


	

?>