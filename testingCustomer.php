<!DOCTYPE html>
<html>
	<head>
		<title>Customer Testing</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" >
		<link rel="stylesheet" type="text/css" href="testing.css" >

	</head>

	<body>
		<?php require_once 'processCustomer.php'; ?>

		<div class="container-full" >
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="#">Smile and Style Salon</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="homepage.html">Home <span class="sr-only">(current)</span></a>
						</li>
						<li></li>
						<li class="nav-item dropdown">
			    			<a class="nav-link dropdown-toggle" href="testingStaff.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff</a>
			    			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						        <a class="dropdown-item" href="testingStaff.php">Staff Form</a>
						        <a class="dropdown-item" href="#">Staff List</a>
						    </div>
						</li>
						<li></li>
						<li class="nav-item">
			    			<a class="nav-link" href="testingCustomer.php">Customer</a>
						</li>
						<li></li>
						<li class="nav-item">
			    			<a class="nav-link" href="#">Inventory</a>
						</li>
						<li></li>
						<li class="nav-item dropdown">
			    			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>

						    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						        <a class="dropdown-item" href="#">Sales Report</a>
						        <a class="dropdown-item" href="#">Staff Performance Report</a>
						    </div>
						</li>
						<li></li>
						<li class="nav-item">
			    			<a class="nav-link" href="#">Appointment</a>
						</li>
						<li></li>
						<li class="nav-item">
			    			<a class="nav-link" href="#">Services</a>
						</li>
						<li></li>
						<li class="nav-item">
			    			<a class="nav-link" href="aboutUs.html">About Us</a>
						</li>
					</ul>
				</div>
			</nav>
        </div>

		<!--Message-->
		<?php if(isset($_SESSION['message'])): ?>
			<div class="offset-sm-5">
				<div class="alert alert-<?=$_SESSION['msg_type']?> message">
					<strong>
						<?php 
							echo $_SESSION['message'];
							unset($_SESSION['message']);
						?>
					</strong>
				</div>
			</div>
		<?php endif ?>

        <div>
			<div class="col-md-6 offset-sm-3 _form">
				<form method="post" action="processCustomer.php" class="shadow p-4 mb-4 bg-white rounded staffForm">
					<input type="hidden" name="id" value="<?php echo $id; ?>">

					<div class="form-group row">
						<div class="col">
							<label>First Name</label>
							<input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>">
						</div>

						<div class="col">
							<label>Last Name</label>
							<input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class="col">
							<label>Email</label>
							<input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
						</div>

						<div class="col">
							<label>Contact</label>
							<input class="form-control" type="number" name="contact" value="<?php echo $contact; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class="col">
							<label>Address</label>
							<input class="form-control" type="text" name="address" value="<?php echo $address; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class="col">
							<label>Gender</label>
							<input class="form-control" type="text" name="gender" value="<?php echo $gender; ?>">
						</div>

						<div class="col">
							<label>Date of Birth</label>
							<input class="form-control" type="date" name="dob" value="<?php echo $dob; ?>">
						</div>

						<div class="col">
							<label>Status</label>
							<input class="form-control" type="text" name="status" value="<?php echo $status; ?>">
						</div>
					</div>

					<div class="form-group">
						<?php if($update == true): ?>
							<button class="btn btn-info btn-lg offset-sm-4 button" type="submit" name="update">Update</button>
						<?php else: ?>
							<button class="btn btn-primary btn-lg offset-sm-4 button" type="submit" name="save">Save</button>
						`<?php endif; ?>
					</div>
				</form>
			</div>
		</div>

		<div class="container-fluid">
			<?php 
				$mysqli =  new mysqli('localhost','root','','salon') or die (mysqli_error($mysqli));

				$results = $mysqli->query("SELECT * FROM customer") or die ($mysqli->error);
			?>

			<div class="row justify-content-center">
				<table class="table table-striped staffTable">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th>Status</th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $results-> fetch_assoc()): ?>
							<tr>
								<td class="align-middle"><?php echo $row['id'] ?></td>
								<td class="align-middle"><?php echo $row['fname'] ?></td>
								<td class="align-middle"><?php echo $row['lname'] ?></td>
								<td class="align-middle"><?php echo $row['email'] ?></td>
								<td class="align-middle"><?php echo $row['contact'] ?></td>
								<td class="align-middle"><?php echo $row['address'] ?></td>
								<td class="align-middle"><?php echo $row['gender'] ?></td>
								<td class="align-middle"><?php echo $row['dob'] ?></td>
								<td class="align-middle"><?php echo $row['status'] ?></td>
								<td class="align-middle">
									<a href="testingCustomer.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>

									<a href="processCustomer.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php endwhile; ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
</html>