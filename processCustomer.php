<?php
	session_start();

	$mysqli =  new mysqli('localhost','root','','salon') or die (mysqli_error($mysqli));

	$update = false;
	$id = 0;

	$fname= '';
	$lname= '';
	$email= '';
	$contact= '';
	$address= '';
	$gender= '';
	$dob= '';
	$status= '';

	if(isset($_POST['save']))
	{
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$email= $_POST['email'];
		$contact= $_POST['contact'];
		$address= $_POST['address'];
		$gender= $_POST['gender'];
		$dob= $_POST['dob'];
		$status= $_POST['status'];

		$mysqli->query("INSERT INTO customer (fname, lname, email, contact, address, gender, dob, status) VALUES ('$fname','$lname','$email','$contact','$address','$gender','$dob','$status')") or die($mysqli->error);

		$_SESSION['message'] = "Saved!";
		$_SESSION['msg_type'] = "success";

		header('location: testingCustomer.php');
		echo "HI";

	}

	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];

		$mysqli->query("DELETE FROM customer WHERE id = $id") or die($mysqli->error);

		$_SESSION['message'] = "Deleted!";
		$_SESSION['msg_type'] = "danger";

		header('location: testingCustomer.php');
	}

	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update = true;
		$results = $mysqli->query("SELECT * FROM customer WHERE id = $id") or die ($mysqli->error);

		if($results->num_rows)
		{
			$row = $results->fetch_array();

			$fname= $row['fname'];
			$lname= $row['lname'];
			$email= $row['email'];
			$contact= $row['contact'];
			$address= $row['address'];
			$gender= $row['gender'];
			$dob= $row['dob'];
			$status= $row['status'];
		}
	}

	//UPDATE 
	if(isset($_POST['update']))
	{
		$id = $_POST['id'];

		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$email= $_POST['email'];
		$contact= $_POST['contact'];
		$address= $_POST['address'];
		$gender= $_POST['gender'];
		$dob= $_POST['dob'];
		$status= $_POST['status'];

		$mysqli->query("UPDATE customer SET fname='$fname', lname='$lname', email='$email', contact='$contact', address='$address', gender='$gender', dob='$dob', status='$status' WHERE id = $id") or die($mysqli->error);

		$_SESSION['message'] = "Updated!";
		$_SESSION['msg_type'] = "warning";

		header('location: testingCustomer.php');

	}
?>