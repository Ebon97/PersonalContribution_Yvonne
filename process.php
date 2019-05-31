<?php
	session_start();

	$mysqli =  new mysqli('localhost','root','','salon') or die (mysqli_error($mysqli));

	$update = false;
	$id = 0;

	$fname= '';
	$lname= '';
	$email= '';
	$contact= '';
	$gender= '';
	$dob= '';
	$joined= '';
	$salary= '';
	$position= '';

	if(isset($_POST['save']))
	{
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$email= $_POST['email'];
		$contact= $_POST['contact'];
		$gender= $_POST['gender'];
		$dob= $_POST['dob'];
		$joined= $_POST['joined'];
		$salary= $_POST['salary'];
		$position= $_POST['position'];

		$mysqli->query("INSERT INTO staff (fname, lname, email, contact, gender, dob, joined, salary, position) VALUES ('$fname','$lname','$email','$contact','$gender','$dob','$joined','$salary', '$position')") or die($mysqli->error);

		$_SESSION['message'] = "Saved!";
		$_SESSION['msg_type'] = "success";

		header('location: testingStaff.php');

	}

	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];

		$mysqli->query("DELETE FROM staff WHERE id = $id") or die($mysqli->error);

		$_SESSION['message'] = "Deleted!";
		$_SESSION['msg_type'] = "danger";

		header('location: testingStaff.php');
	}

	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update = true;
		$results = $mysqli->query("SELECT * FROM staff WHERE id = $id") or die ($mysqli->error);

		if($results->num_rows)
		{
			$row = $results->fetch_array();

			$fname= $row['fname'];
			$lname= $row['lname'];
			$email= $row['email'];
			$contact= $row['contact'];
			$gender= $row['gender'];
			$dob= $row['dob'];
			$joined= $row['joined'];
			$salary= $row['salary'];
			$position= $row['position'];
		}
	}

	//UPDATE 
	if(isset($_POST['update']))
	{
		$id = $_POST['id'];

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$joined = $_POST['joined'];
		$salary = $_POST['salary'];
		$position = $_POST['position'];

		$mysqli->query("UPDATE staff SET fname='$fname', lname='$lname', email='$email', contact='$contact', gender='$gender', dob='$dob', joined='$joined', salary='$salary', position='$position' WHERE id = $id") or die($mysqli->error);

		$_SESSION['message'] = "Updated!";
		$_SESSION['msg_type'] = "warning";

		header('location: testingStaff.php');

	}
?>