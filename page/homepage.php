<!DOCTYPE html>
<html>

<head>
	<title>Employee Application</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>


<div class="col-lg-8 m-auto">

<form method="post">

	<br>
	<div class="card">

		<div class="card-header bg-light">
			<h3 class="text-dark text-center">Employee Details</h3>
		</div><br>
		<table>
			<thead>
				<tr  class="text-center">
					<th>Name</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Email</th>
					<th >Salary</th>
					<th >Action</th>
				</tr>
			</thead>

			<tbody>
				<?php
				include '../php/databasecon.php';
				$q = "SELECT * FROM empWage";
				$query = mysqli_query($con, $q);
				while ($row = mysqli_fetch_array($query)) { ?>
					<tr  class="text-center">
						<td class="name"> <?php echo $row['name']; ?> </td>
						<td class="address"> <?php echo $row['address']; ?> </td>
						<td class="phone"> <?php echo $row['phone']; ?> </td>
						<td class="email text-center"> <?php echo $row['email']; ?> </td>
						<td class="salary"> <?php echo $row['salary']; ?> </td>
						<td class="edit_delete text-center">
							<button class="btn btn-primary" formaction="../php/update.php?update_id=<?php echo $row['id'] ?>">Edit</button>
							<button class="btn btn-danger" formaction="../php/delete.php?delete_id=<?php echo $row['id'] ?>">Delete</button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="#addbook" class=" h6 text-center"><button class="btn btn-success">ADD NEW Employee</a> <br>
	</div>
	<br>
</form>
</div>
<br>


	<div id="addbook">
		<div class="col-lg-8 m-auto">

			<form method="post">

				<br>
				<div class="card">

					<div class="card-header bg-light">
						<h1 class="text-dark text-center"> Employee Application </h1>
					</div><br>

					<label> Name </label>
					<input type="text" name="empName" class="form-control" 
						pattern="[A-Z]{1}[a-z]{2,}" title="Name -first letter should be capital and all small, min=2)"
						placeholder="Enter Name"/>
						<br>

					<label> Address </label>
					<input type="text" name="address" class="form-control" 
						pattern="[A-Za-z0-9]{1,15}[\.\-\s\,]{1,}[A-Za-z0-9]{1,15}" 
						placeholder="Enter address" 
						title="Combination of numbers and characters" /> 
						<br>

					<label> Phone </label>
					<input type="text" name="phone" class="form-control"
						pattern="\+[0-9]{2}-[0-9]{10}" 
						placeholder="Enter Phone Number" 
						title="Phone Number EX: +91-9405828376"  /> 
						<br>

					<label> Email </label>
					<input type="text" name="email" class="form-control" 
						pattern="[a-z0-9]+([_+-.][0-9a-z]+)*@[a-z]+.[a-z]{2,3}" 
						placeholder="Enter Email" 
						title="Email EX: deven7818@gmail.com or abcd123@gmail.co.in"  /> 
						<br>


					<label> Salary </label>
					<input type="text" name="salary" class="form-control" 
						title="Error:Only numbers are allowed" 
						pattern="[0-9]*" 
						placeholder="Enter Salary in INR" />
						<br>

					<button class="btn btn-success" formaction="../php/submit.php" value="submit" type="submit" name="done" id="add_btn">Add</button>
					<br>

				</div>
		</div>
		</form>
	</div>

</body>

</html>