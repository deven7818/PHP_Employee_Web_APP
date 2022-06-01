<?php

include '../php/databasecon.php';

if (isset($_POST['done'])) {

  $id = $_GET['update_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $salary = $_POST['salary'];

  $q = " UPDATE empWage set id=$id, name='$name', address='$address', phone='$phone', email= '$email', salary= '$salary' where id=$id  ";

  $query = mysqli_query($con, $q);

  header('location:../page/homepage.php');
}
?>

<?php
$update = false;
$name = "";
$address = "";
$phone = "";
$email = "";
$salary = "";
$id = 0;
if (isset($_GET['update_id'])) {
  $id = $_GET['update_id'];
  $update = true;
  include '../php/databasecon.php';
  $result = mysqli_query($con, "SELECT * FROM empWage WHERE id='$id'");
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $address = $row['address'];
    $phone = $row['phone'];
    $email = $row['email'];
    $salary = $row['salary'];
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="col-lg-6 m-auto">

    <form method="post">

      <br><br>
      <div class="card">

        <div class="card-header bg-dark">
          <h1 class="text-white text-center"> Employee Application </h1>
        </div><br>

        <label> Name </label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"> <br>

        <label> Address </label>
        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>"> <br>

        <label> Phone </label>
        <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>"> <br>

        <label> Email </label>
        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"> <br>


        <label> Salary </label>
        <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>"> <br>

        <button class="btn btn-success" type="submit" name="done"> Update </button><br>

      </div>
    </form>
  </div>
</body>

</html>